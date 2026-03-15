<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
     function __construct()
    {
         $this->middleware('permission:mod-video-index|mod-video-create|mod-video-edit|mod-video-delete', ['only' => ['index','show']]);
         $this->middleware('permission:mod-video-create', ['only' => ['create','store']]);
         $this->middleware('permission:mod-video-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:mod-video-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $video = DB::table('video')
                        ->orderBy('order', 'asc')
                        ->get();
         return view('video.index',compact('video'))
          ->with('i', (request()->input('page', 1) - 1) * 5);
           
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $iduser = Auth::user()->id;
        $rs = DB::table('video')->get();
        $role = Auth::user()->roles;
        foreach ($role as $x){
           $role_id =$x->pivot->role_id;
           
        }
        return view('video.create',compact('iduser','rs','role_id'));
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
        'keterangan' => 'required',
        'url' => 'required',
        'foto' => 'required|mimes:jpg,png,svg|max:2048',
        'flag' => 'required',
        'order' => 'required',
       ]);
       
        $save = new Video;
        $filename = time().'.'.$request->foto->extension();  
        $path = $request->foto->move(public_path('packages/upload/galeri'), $filename);

            
            $save->keterangan = $request->keterangan;
            $save->url = $request->url;
            $save->headline = $request->headline;
            $save->flag = $request->flag;
            $save->flag_portal = $request->flag_portal;
            $save->order = $request->order;
            $save->foto = $filename;
            $save->user_id = $request->user_id;
            $save->role_id = $request->role_id;
        
        
            $save->save();
    //    DB::table('video')->insert($request->except(['_token','MAX_FILE_SIZE']));
       
       return redirect()->route('videos.index')
                        ->with('success', 'video created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Imageslider  $imageslider
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Imageslider  $imageslider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video =  DB::table('video')->find($id);
        $iduser = Auth::user()->id;
        $role = Auth::user()->roles;
        foreach ($role as $x){
           $role_id =$x->pivot->role_id;
           
        }
        
        return view('video.edit',compact('video','iduser','role_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Imageslider  $imageslider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         request()->validate([
        'keterangan' => 'required',
        'url' => 'required',
        'foto' => 'mimes:jpg,png,svg|max:2048',
        'flag' => 'required',
        'order' => 'required',
       ]);

       $save = Video::find($id);

         if($request->hasFile('foto')){
            $filename = time().'.'.$request->foto->extension();  
            $path = $request->foto->move(public_path('packages/upload/galeri'), $filename);

            
            $save->keterangan = $request->keterangan;
            $save->url = $request->url;
            $save->headline = $request->headline;
            $save->flag = $request->flag;
            $save->flag_portal = $request->flag_portal;
            $save->order = $request->order;
            $save->foto = $filename;
            $save->user_id = $request->user_id;
            $save->role_id = $request->role_id;
            $save->updated_at = date('Y-m-d H:i:s');
        
            $save->save();
         }else{

            
           $save->keterangan = $request->keterangan;
            $save->url = $request->url;
            $save->headline = $request->headline;
            $save->flag = $request->flag;
            $save->flag_portal = $request->flag_portal;
            $save->order = $request->order;
            $save->user_id = $request->user_id;
            $save->role_id = $request->role_id;
            $save->updated_at = date('Y-m-d H:i:s');
        
        
            $save->save();
         }
    //    DB::table('video')
    //    ->where('id', $id)
    //    ->update($request->except(['_token','MAX_FILE_SIZE','_method','response']));
       
       return redirect()->route('videos.index')
                        ->with('success', 'video Updated successfully');
    }

    public function SortOrder(Request $request){
        foreach ($request->order as $key => $order) {
            $post = Video::find($order['id'])->update(['order' => $order['order']]);
        }
                // print_r($post);
        return response('Update Successfully.', 200);
    }

    public function multipledelete(Request $request)
	{
		$ids = $request->ids;
        DB::table("video")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Deleted successfully."]);
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Imageslider  $imageslider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('video')->where('id', $id)->delete();
        return redirect()->route('videos.index')
                        ->with('success','video deleted successfully');
    }

}
