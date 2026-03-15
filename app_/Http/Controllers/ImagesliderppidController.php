<?php

namespace App\Http\Controllers;

use App\Models\Imagesliderppid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class ImagesliderppidController extends Controller
{
     function __construct()
    {
         $this->middleware('permission:mod-sliderimage-index|mod-sliderimage-create|mod-sliderimage-edit|mod-sliderimage-delete', ['only' => ['index','show']]);
         $this->middleware('permission:mod-sliderimage-create', ['only' => ['create','store']]);
         $this->middleware('permission:mod-sliderimage-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:mod-sliderimage-delete', ['only' => ['destroy']]);
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = DB::table('ppid_image_slider')
                        ->orderBy('order', 'asc')
                        ->get();
         return view('ppid.slider.index',compact('slider'))
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
         $rs = DB::table('ppid_image_slider')->get();
         $role = Auth::user()->roles;
       
        foreach ($role as $x){
           $role_id =$x->pivot->role_id;
           
       }
        return view('ppid.slider.create',compact('iduser','rs','role_id'));
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
        'caption' => 'required',
        'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'flag' => 'required',
        'order' => 'required',
       

       ]);

        $imageName = time().'.'.$request->img->extension();  
     
        // $request->image->move(public_path('images'), $imageName);
        $path = $request->img->move(public_path('packages/upload/slider'), $imageName);
        $caption = $request->get('caption');
        $order = $request->get('order');
        $flag = $request->get('flag');
        $flag_portal = $request->get('flag_portal');
        $user_id = $request->get('user_id');
        $role_id = $request->get('role_id');
        
       
        $save = new Imagesliderppid();
        $save->caption = $caption;
        $save->order = $order;
        $save->flag = $flag;
        $save->flag_portal = $flag_portal;
        $save->user_id = $user_id;
        $save->role_id = $role_id;
        
        $save->img = $imageName;
        // $save->path = $path;
        $save->save();


    //    DB::table('ppid_image_slider')->insert($request->except(['_token','MAX_FILE_SIZE']));
       
       return redirect()->route('sliderppid.index')
                        ->with('success', 'slider created successfully');
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
        $slider =  DB::table('ppid_image_slider')->find($id);
        $iduser = Auth::user()->id;
         $rs = DB::table('main_menu')->get();
         $role = Auth::user()->roles;
       
        foreach ($role as $x){
           $role_id =$x->pivot->role_id;
           
       }
        
        return view('ppid.slider.edit',compact('slider','iduser','role_id'));
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
            'caption' => 'required',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'flag' => 'required',
            'order' => 'required',
        ]);
 
      
        $post = Imagesliderppid::find($id);
        if($request->hasFile('img')){
           
             $imageName = time().'.'.$request->img->extension();  
     
            // $request->image->move(public_path('images'), $imageName);
            $path = $request->img->move(public_path('packages/upload/slider'), $imageName);
            // $path = $request->file('img')->store('public/pejabat');
            $post->img = $imageName;
            $post->caption = $request->caption;
            $post->flag_portal = $request->flag_portal;
            $post->flag = $request->flag;
            $post->order = $request->order;
            $post->user_id = $request->user_id;
            $post->role_id = $request->role_id;
            $post->save();

    //    dd($post);
        }else{
            $post->caption = $request->caption;
            $post->flag_portal = $request->flag_portal;
            $post->flag = $request->flag;
            $post->order = $request->order;
            $post->user_id = $request->user_id;
            $post->role_id = $request->role_id;
            $post->save();
        }
       
       
       return redirect()->route('sliderppid.index')
                        ->with('success', 'slider Updated successfully');
    }

     public function updateOrder(Request $request){
        foreach ($request->order as $key => $order) {
            $post = Imagesliderppid::find($order['id'])->update(['order' => $order['order']]);
        }

        return response('Update Successfully.', 200);
    }

    public function multipledelete(Request $request)
	{
		$ids = $request->ids;
        DB::table("ppid_image_slider")->whereIn('id',explode(",",$ids))->delete();
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
        DB::table('ppid_image_slider')->where('id', $id)->delete();
        return redirect()->route('sliderppid.index')
                        ->with('success','Slider deleted successfully');
    }
}
