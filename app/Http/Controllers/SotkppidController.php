<?php

namespace App\Http\Controllers;

use App\Models\Sotkppid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SotkppidController extends Controller
{
     function __construct()
    {
         $this->middleware('permission:mod-sotkppid-index|mod-sotkppid-create|mod-sotkppid-edit|mod-sotkppid-delete', ['only' => ['index','show']]);
         $this->middleware('permission:mod-sotkppid-create', ['only' => ['create','store']]);
         $this->middleware('permission:mod-sotkppid-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:mod-sotkppid-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sotk = DB::table('ppid_sotk')->get();
        return view('ppid.sotk.index',compact('sotk'));
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
        return view('ppid.sotk.create',compact('iduser','parent','role_id'));
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
        'id' => 'required',
         'parent' => 'required',
       

       ]);
       

       DB::table('ppid_sotk')->insert($request->except(['_token','MAX_FILE_SIZE']));
       
       return redirect()->route('sotkppid.index')
                        ->with('success', 'Sotk created successfully');
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
        $sotk = DB::table('ppid_sotk')->find($id);
        $iduser = Auth::user()->id;
        $parent = DB::table('ppid_sotk')->orderBy('id', 'asc')->get();
         $role = Auth::user()->roles;
        foreach ($role as $x){
           $role_id =$x->pivot->role_id;
           
        }
        
        return view('ppid.sotk.edit',compact('sotk','iduser','parent','role_id'));
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
        'id' => 'required',
       
       

       ]);
       
       DB::table('ppid_sotk')
       ->where('id', $id)
       ->update($request->except(['_token','MAX_FILE_SIZE','_method','response']));
       
       return redirect()->route('sotkppid.index')
                        ->with('success', 'Sotk Updated successfully');
    }
    
     public function multipledelete(Request $request)
	{
		$ids = $request->ids;
        DB::table("ppid_sotk")->whereIn('id',explode(",",$ids))->delete();
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
        DB::table('ppid_sotk')->where('id', $id)->delete();
        return redirect()->route('sotkppid.index')
                        ->with('success','Sotk deleted successfully');
    }
}
