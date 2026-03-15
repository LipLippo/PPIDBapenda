<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:mod-album-index|mod-album-create|mod-album-edit|mod-album-delete', ['only' => ['index','show']]);
         $this->middleware('permission:mod-album-create', ['only' => ['create','store']]);
         $this->middleware('permission:mod-album-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:mod-album-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $album = DB::table('album')
                ->orderBy('order', 'asc')
                ->get();
       
        return view('album.index',compact('album'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

   /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $rs = DB::table('album')->get();
        $iduser = Auth::user()->id;
        $role = Auth::user()->roles;
       
        foreach ($role as $x){
           $role_id =$x->pivot->role_id;
           
       }
        return view('album.create',compact('iduser','rs','role_id'));
    
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
        'album' => 'required',
        'order' =>'required'
       

       ]);
       

       DB::table('album')->insert($request->except(['_token','MAX_FILE_SIZE']));
       
       return redirect()->route('album.index')
                        ->with('success', 'Album created successfully');
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
        $album =  DB::table('album')->find($id);
        $iduser = Auth::user()->id;
        $role = Auth::user()->roles;
       
        foreach ($role as $x){
           $role_id =$x->pivot->role_id;
           
       }
        
        return view('album.edit',compact('album','iduser','role_id'));
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
        'album' => 'required',
         'order' =>'required'

       ]);
       
       DB::table('album')
       ->where('id', $id)
       ->update($request->except(['_token','MAX_FILE_SIZE','_method','response']));
       
       return redirect()->route('album.index')
                        ->with('success', 'Album Updated successfully');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function SortOrder(Request $request){
        foreach ($request->order as $key => $order) {
            $post = Album::find($order['id'])->update(['order' => $order['order']]);
        }
                // print_r($post);
        return response('Update Successfully.', 200);
    }
    public function multipledelete(Request $request)
	{
		$ids = $request->ids;
        DB::table("album")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Album Deleted successfully."]);
	}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('album')->where('id', $id)->delete();
    
        return redirect()->route('album.index')
                        ->with('success','Album deleted successfully');
    }
}
