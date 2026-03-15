<?php

namespace App\Http\Controllers;

use App\Models\Sotkppid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PermohonanInformasiController extends Controller
{
     function __construct()
    {
        //  $this->middleware('permission:mod-permohonaninformasi-index|mod-permohonaninformasi-create|mod-permohonaninformasi-edit|mod-permohonaninformasi-delete', ['only' => ['index','show']]);
        //  $this->middleware('permission:mod-permohonaninformasi-create', ['only' => ['create','store']]);
        //  $this->middleware('permission:mod-permohonaninformasi-edit', ['only' => ['edit','update']]);
        //  $this->middleware('permission:mod-permohonaninformasi-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informasi = DB::table('ppid_permohonan_informasi')->get();
        return view('ppid.permohonan-informasi.index',compact('informasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $iduser = Auth::user()->id;
        $parent = DB::table('ppid_sotk')->orderBy('id', 'asc')->get();
        $role = Auth::user()->roles;
        foreach ($role as $x){
           $role_id =$x->pivot->role_id;
           
        }
        return view('ppid.permohonan-informasi.create',compact('iduser','parent','role_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'tanggal' => 'required',
            'nama' => 'required',
            'informasi' => 'required',
            'status' => 'required'
        ]);
        
        if(empty($request->keterangan)){
            $request->keterangan = '';
        }
       

       DB::table('ppid_permohonan_informasi')->insert($request->except(['_token','MAX_FILE_SIZE']));
       
       return redirect()->route('permohonan-informasi.index')
                        ->with('success', 'Permohonan Informasi created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sotkppid  $sotkppid
     * @return \Illuminate\Http\Response
     */
    public function show(Sotkppid $sotkppid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sotkppid  $sotkppid
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $informasi = DB::table('ppid_permohonan_informasi')->find($id);
        $iduser = Auth::user()->id;
        $parent = DB::table('ppid_sotk')->orderBy('id', 'asc')->get();
        $role = Auth::user()->roles;
        foreach ($role as $x){
           $role_id =$x->pivot->role_id;
           
        }
        
        return view('ppid.permohonan-informasi.edit',compact('informasi','iduser','parent','role_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'tanggal' => 'required',
            'nama' => 'required',
            'informasi' => 'required',
            'status' => 'required'
        ]);
        
        if(empty($request->keterangan)){
            $request->keterangan = '';
        }
       
       DB::table('ppid_permohonan_informasi')
       ->where('id', $id)
       ->update($request->except(['_token','MAX_FILE_SIZE','_method','response']));
       
       return redirect()->route('permohonan-informasi.index')
                        ->with('success', 'Permohonan informasi Updated successfully');
    }
    
     public function multipledelete(Request $request)
	{
		$ids = $request->ids;
        DB::table("permohonan_informasi")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>" Deleted successfully."]);
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('ppid_permohonan_informasi')->where('id', $id)->delete();
        return redirect()->route('permohonan-informasi.index')
                        ->with('success','Permohonan informasi deleted successfully');
    }
}
