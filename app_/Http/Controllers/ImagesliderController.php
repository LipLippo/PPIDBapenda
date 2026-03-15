<?php

namespace App\Http\Controllers;

use App\Models\Imageslider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ImagesliderController extends Controller
{
     function __construct()
    {
         $this->middleware('permission:mod-imageslider-index|mod-imageslider-create|mod-imageslider-edit|mod-imageslider-delete', ['only' => ['index','show']]);
         $this->middleware('permission:mod-imageslider-create', ['only' => ['create','store']]);
         $this->middleware('permission:mod-imageslider-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:mod-imageslider-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = DB::table('image_slider')
                        ->orderBy('order', 'asc')
                        ->get();
         return view('slider.index',compact('slider'))
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
        $rs = DB::table('image_slider')->get();
        $role = Auth::user()->roles;
        foreach ($role as $x){
           $role_id =$x->pivot->role_id;
           
        }
        return view('slider.create',compact('iduser','role_id','rs'));
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
        'img' => 'required|mimes:jpg,png,svg|max:2048',
        'flag' => 'required',
        'order' => 'required',
       

       ]);
       

        $save = new Imageslider;
        $filename = time().'.'.$request->img->extension();  
        $path = $request->img->move(public_path('packages/upload/slider'), $filename);

            
            $save->caption = $request->caption;
            $save->flag = $request->flag;
            $save->flag_portal = $request->flag_portal;
            $save->order = $request->order;
            $save->img = $filename;
            $save->user_id = $request->user_id;
            $save->role_id = $request->role_id;
        
        
            $save->save();

    //    DB::table('image_slider')->insert($request->except(['_token','MAX_FILE_SIZE']));
       
       return redirect()->route('sliders.index')
                        ->with('success', 'slider created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Imageslider  $imageslider
     * @return \Illuminate\Http\Response
     */
    public function show(Imageslider $imageslider)
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
        $slider =  DB::table('image_slider')->find($id);
        $iduser = Auth::user()->id;
         $role = Auth::user()->roles;
        foreach ($role as $x){
           $role_id =$x->pivot->role_id;
           
        }
        return view('slider.edit',compact('slider','iduser','role_id'));
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
        'img' => 'mimes:jpg,png,svg|max:2048',
        'flag' => 'required',
        'order' => 'required',
       

       ]);
       $save = Imageslider::find($id);

         if($request->hasFile('img')){
            $filename = time().'.'.$request->img->extension();  
            $path = $request->img->move(public_path('packages/upload/slider'), $filename);

            
            $save->caption = $request->caption;
            $save->flag = $request->flag;
            $save->flag_portal = $request->flag_portal;
            $save->order = $request->order;
            $save->img = $filename;
            $save->user_id = $request->user_id;
            $save->role_id = $request->role_id;
            $save->updated_at = date('Y-m-d H:i:s');
        
            $save->save();
         }else{

            
            $save->caption = $request->caption;
            $save->flag = $request->flag;
            $save->flag_portal = $request->flag_portal;
            $save->order = $request->order;
            $save->user_id = $request->user_id;
            $save->role_id = $request->role_id;
            $save->updated_at = date('Y-m-d H:i:s');
        
        
            $save->save();
         }
    //    DB::table('image_slider')
    //    ->where('id', $id)
    //    ->update($request->except(['_token','MAX_FILE_SIZE','_method','response']));
       
       return redirect()->route('sliders.index')
                        ->with('success', 'slider Updated successfully');
    }

    public function SortOrder(Request $request){
        foreach ($request->order as $key => $order) {
            $post = Imageslider::find($order['id'])->update(['order' => $order['order']]);
        }
                // print_r($post);
        return response('Update Successfully.', 200);
    }

    public function multipledelete(Request $request)
	{
		$ids = $request->ids;
        DB::table("image_slider")->whereIn('id',explode(",",$ids))->delete();
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
        DB::table('image_slider')->where('id', $id)->delete();
        return redirect()->route('sliders.index')
                        ->with('success','Slider deleted successfully');
    }
}
