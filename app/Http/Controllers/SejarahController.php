<?php

namespace App\Http\Controllers;

use App\Models\Sejarah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SejarahController extends Controller
{
     function __construct()
    {
         $this->middleware('permission:mod-sejarah-index|mod-sejarah-create|mod-sejarah-edit|mod-sejarah-delete', ['only' => ['index','show']]);
         $this->middleware('permission:mod-sejarah-create', ['only' => ['create','store']]);
         $this->middleware('permission:mod-sejarah-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:mod-sejarah-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response 
     */
    public function index()
    {
        
        $sejarah = Sejarah::all();
        return view('sejarah.index',compact('sejarah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $iduser = Auth::user()->id;
         $role = Auth::user()->roles;
        foreach ($role as $x){
           $role_id =$x->pivot->role_id;
           
        }
        return view('sejarah.create',compact('iduser','role_id'));
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
        $path = $request->photo->move(public_path('packages/upload/sejarah'), $imageName);
        $nama = $request->get('nama');
        $awal = $request->get('tahun_awal');
        $akhir = $request->get('tahun_akhir');
        $flag = $request->get('flag');
        $user_id = $request->get('user_id');
         $role_id = $request->get('role_id');
        
       
        $save = new Sejarah;
        $save->nama = $nama;
        $save->tahun_awal = $awal;
        $save->tahun_akhir = $akhir;
        $save->flag = $flag;
        $save->user_id = $user_id;
        $save->role_id = $role_id;
        $save->photo = $imageName;
        // $save->path = $path;
        $save->save();

    //     DB::table('sotk_pejabat')
    //    ->insert( $request->except(['_token','MAX_FILE_SIZE']));
       
       return redirect()->route('sotksejarah.index')
                        ->with('success', 'created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sejarah  $sejarah
     * @return \Illuminate\Http\Response
     */
    public function show(Sejarah $sejarah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sejarah  $sejarah
     * @return \Illuminate\Http\Response
     */
    public function edit(Sejarah $sejarah, $id)
    {
        $sejarah = Sejarah::find($id);
        $iduser = Auth::user()->id;
        $role = Auth::user()->roles;
        foreach ($role as $x){
           $role_id =$x->pivot->role_id;
           
        }
        
        return view('sejarah.edit',compact('sejarah','iduser','role_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sejarah  $sejarah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sejarah $sejarah,$id)
    {
        request()->validate([
            'nama' => 'required',
            'photo' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
           
        ]);
 
      
        $post = Sejarah::find($id);
        if($request->hasFile('photo')){
           
             $imageName = time().'.'.$request->photo->extension();  
     
            // $request->image->move(public_path('images'), $imageName);
            $path = $request->photo->move(public_path('packages/upload/sejarah'), $imageName);
            // $path = $request->file('photo')->store('public/pejabat');
            $post->photo = $imageName;
            $post->nama = $request->nama;
            $post->tahun_awal = $request->tahun_awal;
            $post->tahun_akhir = $request->tahun_akhir;
            $post->flag = $request->flag;
            $post->user_id = $request->user_id;
            $post->role_id = 1;
            $post->updated_at = date('Y-m-d H:i:s');
            $post->save();

    //    dd($post);
        }else{
            $post->nama = $request->nama;
            $post->tahun_awal = $request->tahun_awal;
            $post->tahun_akhir = $request->tahun_akhir;
            $post->flag = $request->flag;
            $post->user_id = $request->user_id;
            $post->role_id = 1;
            $post->updated_at = date('Y-m-d H:i:s');
            $post->save();
        }
   
       
       return redirect()->route('sotksejarah.index')
                        ->with('success', 'Updated successfully');
    }

    public function multipledelete(Request $request)
	{
		$ids = $request->ids;
        DB::table("sotk_sejarah")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>" Deleted successfully."]);
	}


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sejarah  $sejarah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sejarah $sejarah,$id)
    {
        DB::table('sotk_sejarah')->where('id', $id)->delete();
        return redirect()->route('sotksejarah.index')
                        ->with('success','deleted successfully');
    }
}
