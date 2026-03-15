<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Image;

class GaleriController extends Controller
{
     function __construct()
    {
         $this->middleware('permission:mod-galeri-index|mod-galeri-create|mod-galeri-edit|mod-galeri-delete', ['only' => ['index','show']]);
         $this->middleware('permission:mod-galeri-create', ['only' => ['create','store']]);
         $this->middleware('permission:mod-galeri-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:mod-galeri-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $role = Auth::user()->roles;
       
        foreach ($role as $x){
           $role_id =$x->pivot->role_id;
           
        }
        if ($role_id <= 3) {
             $galeri = DB::table('galeri')
                ->leftjoin('album', 'album.id', '=', 'galeri.id_album')
                ->orderBy('galeri.order', 'asc')
                ->get(['galeri.*', 'album.album']);

        } elseif ($role_id >= 3) {
           $galeri = DB::table('galeri')
                ->leftjoin('album', 'album.id', '=', 'galeri.id_album')
                ->where('galeri.role_id',$role_id)
                ->orderBy('galeri.order', 'asc')
                ->get(['galeri.*', 'album.album']);
        } 
       
        return view('galeri.index',compact('galeri'))
        ->with('i', (request()->input('page', 1) - 1) * 5);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $iduser = Auth::user()->id;

        $album = DB::table('album')
         ->get();
        $role = Auth::user()->roles;
        $rs = DB::table('galeri')->get();
       
        foreach ($role as $x){
           $role_id =$x->pivot->role_id;
           
        }
        return view('galeri.create',compact('iduser','album','role_id','rs')); 
    
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
        'id_album' => 'required',
        'foto' => 'required|mimes:jpg,png,svg|max:2048',
        'flag' => 'required',
        'order' => 'required',
       

       ]);
        $save = new Galeri;
        $filename = time().'.'.$request->foto->extension();  
        $path = $request->foto->move(public_path('packages/upload/galeri'), $filename);

            
            $save->id_album = $request->id_album;
            $save->keterangan = $request->keterangan;
            $save->flag = $request->flag;
            $save->order = $request->order;
            $save->foto = $filename;
            $save->user_id = $request->user_id;
            $save->role_id = $request->role_id;
        
        
            $save->save();


    //    DB::table('galeri')->insert($request->except(['_token','MAX_FILE_SIZE']));
       
       return redirect()->route('galeris.index')
                        ->with('success', 'galeri created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $galeri = DB::table('galeri')->find($id);
        $iduser = Auth::user()->id;
        $album  = DB::table('album')
        ->get();
        
        $role = Auth::user()->roles;
       
        foreach ($role as $x){
           $role_id =$x->pivot->role_id;
           
        }
        
        return view('galeri.edit',compact('galeri','iduser','album','role_id'));
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
        'id_album' => 'required',
        'foto' => 'mimes:jpg,png,svg|max:2048',
        'flag' => 'required',
        'order' => 'required',

       ]);

       $save = Galeri::find($id);

         if($request->hasFile('foto')){
            $filename = time().'.'.$request->foto->extension();  
            $path = $request->foto->move(public_path('packages/upload/galeri'), $filename);

            
            $save->id_album = $request->id_album;
            $save->keterangan = $request->keterangan;
            $save->flag = $request->flag;
            $save->order = $request->order;
            $save->foto = $filename;
            $save->user_id = $request->user_id;
            $save->role_id = $request->role_id;
            $save->updated_at = date('Y-m-d H:i:s');
        
            $save->save();
         }else{

            
            $save->id_album = $request->id_album;
            $save->keterangan = $request->keterangan;
            $save->flag = $request->flag;
            $save->order = $request->order;
            $save->user_id = $request->user_id;
            $save->role_id = $request->role_id;
            $save->updated_at = date('Y-m-d H:i:s');
        
        
            $save->save();
         }


    //    DB::table('galeri')
    //    ->where('id', $id)
    //    ->update($request->except(['_token','MAX_FILE_SIZE','_method','response']));
       
       return redirect()->route('galeris.index')
                        ->with('success', 'galeri Updated successfully');
    }

    public function SortOrder(Request $request){
        foreach ($request->order as $key => $order) {
            $post = Galeri::find($order['id'])->update(['order' => $order['order']]);
        }
                // print_r($post);
        return response('Update Successfully.', 200);
    }

    public function multipledelete(Request $request)
	{
		$ids = $request->ids;
        DB::table("galeri")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"galeri Deleted successfully."]);
	}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('galeri')->where('id', $id)->delete();
        return redirect()->route('galeris.index')
                        ->with('success','galeri deleted successfully');
    }
}
