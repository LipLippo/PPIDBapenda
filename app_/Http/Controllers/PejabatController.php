<?php

namespace App\Http\Controllers;

use App\Models\Pejabat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class PejabatController extends Controller
{
     function __construct()
    {
         $this->middleware('permission:mod-pejabat-index|mod-pejabat-create|mod-pejabat-edit|mod-pejabat-delete', ['only' => ['index','show']]);
         $this->middleware('permission:mod-pejabat-create', ['only' => ['create','store']]);
         $this->middleware('permission:mod-pejabat-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:mod-pejabat-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pejabat = DB::table('sotk_pejabat')
                    ->leftJoin('a_golruang','a_golruang.idgolru', '=','sotk_pejabat.idgol')
                     ->leftJoin('sotk','sotk.id', '=','sotk_pejabat.idjab')
                    ->select('a_golruang.*','sotk_pejabat.*','sotk.parent','sotk.jabatan')
                    ->get();
        $gol = DB::table('a_golruang')->orderBy('idgolru', 'asc')->get();
        $sotk = DB::table('sotk')->orderBy('id', 'asc')->get();
        return view('pejabat.index',compact('pejabat','sotk','gol'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $iduser = Auth::user()->id;
        $pejabat = DB::table('sotk_pejabat')->orderBy('id', 'asc')->get();
        $gol = DB::table('a_golruang')->orderBy('idgolru', 'asc')->get();
        $sotk = DB::table('sotk')->orderBy('id', 'asc')->get();
        $role = Auth::user()->roles;
        foreach ($role as $x){
           $role_id =$x->pivot->role_id;
           
        }
        return view('pejabat.create',compact('iduser','pejabat','gol','sotk','role_id'));
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
            'nama' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
 
        
        $imageName = time().'.'.$request->photo->extension();  
     
        // $request->image->move(public_path('images'), $imageName);
        $path = $request->photo->move(public_path('packages/upload/pejabat'), $imageName);
        $nip = $request->get('nip');
        $nama = $request->get('nama');
        $idjab = $request->get('idjab');
        $idgol = $request->get('idgol');
        $flag = $request->get('flag');
        $user_id = $request->get('user_id');
        $role_id = $request->get('role_id');
        
       
        $save = new Pejabat;
        $save->nip = $nip;
        $save->nama = $nama;
        $save->idjab = $idjab;
        $save->idgol = $idgol;
        $save->flag = $flag;
        $save->user_id = $user_id;
        $save->role_id = $role_id;
        $save->photo = $imageName;
        // $save->path = $path;
        $save->save();

    //     DB::table('sotk_pejabat')
    //    ->insert( $request->except(['_token','MAX_FILE_SIZE']));
       
       return redirect()->route('sotk_pejabat.index')
                        ->with('success', 'Pejabat created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pejabat  $Pejabat
     * @return \Illuminate\Http\Response
     */
    public function show(Pejabat $pejabat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pejabat  $Pejabat
     * @return \Illuminate\Http\Response
     */
   public function edit(Pejabat $pejabat, $id)
    {
        
        $pejabat = Pejabat::find($id);
        $iduser = Auth::user()->id;
        $gol = DB::table('a_golruang')->orderBy('idgolru', 'asc')->get();
        $sotk = DB::table('sotk')->orderBy('id', 'asc')->get();
        $role = Auth::user()->roles;
        foreach ($role as $x){
           $role_id =$x->pivot->role_id;
           
        }
        
        return view('pejabat.edit',compact('pejabat','iduser','gol','sotk','role_id'));
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
            'nama' => 'required',
            'photo' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
           
        ]);
 
      
        $post = Pejabat::find($id);
        if($request->hasFile('photo')){
           
             $imageName = time().'.'.$request->photo->extension();  
     
            // $request->image->move(public_path('images'), $imageName);
            $path = $request->photo->move(public_path('packages/upload/pejabat'), $imageName);
            // $path = $request->file('photo')->store('public/pejabat');
            $post->photo = $imageName;
            $post->nip = $request->nip;
            $post->nama = $request->nama;
            $post->idjab = $request->idjab;
            $post->idgol = $request->idgol;
            $post->flag = $request->flag;
            $post->user_id = $request->user_id;
            $post->role_id = $request->role_id;
            $post->updated_at = date('Y-m-d H:i:s');
            $post->save();

    //    dd($post);
        }else{
            $post->nip = $request->nip;
            $post->nama = $request->nama;
            $post->idjab = $request->idjab;
            $post->idgol = $request->idgol;
            $post->flag = $request->flag;
            $post->user_id = $request->user_id;
            $post->role_id = $request->role_id;
            $post->updated_at = date('Y-m-d H:i:s');
            $post->save();
        }
       
    //    DB::table('sotk_pejabat')
    //    ->where('id', $id)
    //    ->update($request->except(['_token','MAX_FILE_SIZE','_method','response']));
       
       return redirect()->route('sotk_pejabat.index')
                        ->with('success', 'Pejabat Updated successfully');

    
    
    }

    public function multipledelete(Request $request)
	{
		$ids = $request->ids;
        DB::table("sotk_pejabat")->whereIn('id',explode(",",$ids))->delete();
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
        DB::table('sotk_pejabat')->where('id', $id)->delete();
        return redirect()->route('sotk_pejabat.index')
                        ->with('success','Sotk deleted successfully');
    }
}
