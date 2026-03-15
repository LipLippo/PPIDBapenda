<?php

namespace App\Http\Controllers;

use App\Models\Tautan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TautanController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:mod-tautan-index|mod-tautan-create|mod-tautan-edit|mod-tautan-delete', ['only' => ['index','show']]);
         $this->middleware('permission:mod-tautan-create', ['only' => ['create','store']]);
         $this->middleware('permission:mod-tautan-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:mod-tautan-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $tautan = DB::table('tautan')
                        ->orderBy('order', 'asc')
                        ->get();
         return view('tautan.index',compact('tautan'))
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
        $rs = DB::table('tautan')->get();
        $role = Auth::user()->roles;
        foreach ($role as $x){
           $role_id =$x->pivot->role_id;
           
        }
        return view('tautan.create',compact('iduser','rs','role_id'));
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
        'jnstautan' => 'required',
        'title' => 'required',
        'foto' => 'required',
        'target' => 'required', 
        'order' => 'required',
       

       ]);
       

    //    DB::table('tautan')->insert($request->except(['_token','MAX_FILE_SIZE']));
        $save = new Tautan;
        $filename = time().'.'.$request->foto->extension();  
        $path = $request->foto->move(public_path('packages/upload/galeri'), $filename);

            
            $save->title = $request->title;
            $save->url = $request->url;
            $save->jnstautan = $request->jnstautan;
            $save->flag = $request->flag;
            $save->target = $request->target;
            $save->order = $request->order;
            $save->foto = $filename;
            $save->user_id = $request->user_id;
            $save->role_id = $request->role_id;
        
        
            $save->save();
       
       return redirect()->route('tautans.index')
                        ->with('success', 'tautan created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tautan  $tautan
     * @return \Illuminate\Http\Response
     */
    public function show(Tautan $tautan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tautan  $tautan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tautan =  DB::table('tautan')->find($id);
        $iduser = Auth::user()->id;
        $role = Auth::user()->roles;
        foreach ($role as $x){
           $role_id =$x->pivot->role_id;
           
        }
        
        return view('tautan.edit',compact('tautan','iduser','role_id'));
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
        'jnstautan' => 'required',
        'title' => 'required',
        'foto' => 'mimes:jpg,png,svg|max:2048',
        'target' => 'required',
        'order' => 'required',
       

       ]);

       $save = Tautan::find($id);

         if($request->hasFile('foto')){
            $filename = time().'.'.$request->foto->extension();  
            $path = $request->foto->move(public_path('packages/upload/galeri'), $filename);

            
            $save->title = $request->title;
            $save->url = $request->url;
            $save->jnstautan = $request->jnstautan;
            $save->flag = $request->flag;
            $save->target = $request->target;
            $save->order = $request->order;
            $save->foto = $filename;
            $save->user_id = $request->user_id;
            $save->role_id = $request->role_id;
            $save->updated_at = date('Y-m-d H:i:s');
        
            $save->save();
         }else{

            
            $save->title = $request->title;
            $save->url = $request->url;
            $save->jnstautan = $request->jnstautan;
            $save->flag = $request->flag;
            $save->target = $request->target;
            $save->order = $request->order;
            $save->user_id = $request->user_id;
            $save->role_id = $request->role_id;
            $save->updated_at = date('Y-m-d H:i:s');
        
        
            $save->save(); 
         }
    //    DB::table('tautan')
    //    ->where('id', $id)
    //    ->update($request->except(['_token','MAX_FILE_SIZE','_method','response']));
       
       return redirect()->route('tautans.index')
                        ->with('success', 'tautan Updated successfully');
    }

     public function SortOrder(Request $request){
        foreach ($request->order as $key => $order) {
            $post = Tautan::find($order['id'])->update(['order' => $order['order']]);
        }
                // print_r($post);
        return response('Update Successfully.', 200);
    }

    public function multipledelete(Request $request)
	{
		$ids = $request->ids;
        DB::table("tautan")->whereIn('id',explode(",",$ids))->delete();
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
        DB::table('tautan')->where('id', $id)->delete();
        return redirect()->route('tautans.index')
                        ->with('success','tautan deleted successfully');
    }
}
