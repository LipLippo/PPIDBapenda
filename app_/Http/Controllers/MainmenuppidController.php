<?php

namespace App\Http\Controllers;
use App\Models\Mainmenuppid;
use App\Models\Roles;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class MainmenuppidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:mod-menuutama-list|mod-menuutama-create|mod-menuutama-edit|mod-menuutama-delete', ['only' => ['index','show']]);
         $this->middleware('permission:mod-menuutama-create', ['only' => ['create','store']]);
         $this->middleware('permission:mod-menuutama-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:mod-menuutama-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $main = DB::table('ppid_main_menu')
            ->leftjoin('users', 'users.id', '=', 'ppid_main_menu.user_id')
            ->select('ppid_main_menu.*', 'users.name')
            ->orderBy('order','asc')
            ->get();
       
        
        // dd($pr);
        return view('ppid.mainmenu.index',compact('main'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent = DB::table('ppid_main_menu')
        ->where('jenis_konten','=',0)
        ->get();
        $rs = DB::table('ppid_main_menu')->get();
        $iduser = Auth::user()->id;
        $role = Auth::user()->roles;
       
        foreach ($role as $x){
           $role_id =$x->pivot->role_id;
           
       }

        // dd($role);
        return view('ppid.mainmenu.create',compact('parent','rs','iduser','role_id'));
    
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
            'title' => 'required',
            'id_parent' => 'required',
            'jenis_konten' => 'required',
           
        ]);
 
        $save = new Mainmenuppid;

        if ($request->jenis_konten == 3) {
        request()->validate([
            'title' => 'required',
            'id_parent' => 'required',
            'jenis_konten' => 'required',
            'pdf' => 'required|mimes:pdf,xlx,csv|max:2048',
        ]);

        $filename = time().'.'.$request->pdf->extension();  
        $path = $request->pdf->move(public_path('packages/upload/file'), $filename);

            $judul = strtolower(preg_replace('/\s+/', '_', $save->title = $request->title));
            $save->url = substr($judul, 0,75);
            $save->title = $request->title;
            $save->id_parent = $request->id_parent;
            $save->jenis_konten = $request->jenis_konten;
            $save->user_id = $request->user_id;
            $save->konten1 = $request->konten1;
            $save->konten2 = $request->konten2;
            $save->order = $request->order;
            $save->role_id = $request->role_id;
             $save->status = $request->status;
            $save->pdf = $filename;
        
        }elseif($request->jenis_konten == 2){

            $save->title = $request->title;
            $save->id_parent = $request->id_parent;
            $save->jenis_konten = $request->jenis_konten;
            $save->user_id = $request->user_id;
            $save->url = $request->url;
            $save->target = $request->target;
            $save->order = $request->order;
             $save->status = $request->status;
            $save->role_id = $request->role_id;

        }elseif($request->jenis_konten == 1){

            $judul = strtolower(preg_replace('/\s+/', '_', $save->title = $request->title));
            $save->url = substr($judul, 0,75);
            $save->title = $request->title;
            $save->id_parent = $request->id_parent;
            $save->jenis_konten = $request->jenis_konten;
            $save->user_id = $request->user_id;
            $save->konten = $request->konten;
            $save->order = $request->order;
             $save->status = $request->status;
            $save->role_id = $request->role_id;
            
            
        }else{
             $judul = strtolower(preg_replace('/\s+/', '_', $save->title = $request->title));
            $save->url = substr($judul, 0,75);
            $save->title = $request->title;
            $save->id_parent = $request->id_parent;
            $save->jenis_konten = $request->jenis_konten;
            $save->user_id = $request->user_id;
            $save->konten = $request->konten;
            $save->order = $request->order;
             $save->status = $request->status;
            $save->role_id = $request->role_id;
        }
        $save->save();
    //    dd($save);
       return redirect()->route('mainppid.index')
                        ->with('success', 'created successfully');
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
        $main =  DB::table('ppid_main_menu')->find($id);
        $parent = DB::table('ppid_main_menu')
        	->where('jenis_konten',0)
            ->get();
            
        $jenis = DB::table('ppid_main_menu')
            ->where('jenis_konten','>',0)
            ->get();
        $iduser = Auth::user()->id;
        $role = Auth::user()->roles;
       
        foreach ($role as $x){
           $role_id =$x->pivot->role_id;
           
       }
        
        return view('ppid.mainmenu.edit',compact('main','parent','jenis','iduser','role_id'));
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
        'title' => 'required',
       
        'jenis_konten' => 'required',

       ]);
       

        $save = Mainmenuppid::find($id);
       
        if ($request->jenis_konten == 3) {

        request()->validate([
            'title' => 'required',
            'jenis_konten' => 'required',
            'pdf' => 'mimes:pdf,xlx,csv|max:2048',
        ]);
            if($request->hasFile('pdf')){
           
                $filename = time().'.'.$request->pdf->extension();  
                $path = $request->pdf->move(public_path('packages/upload/file'), $filename);
               
                $judul = strtolower(preg_replace('/\s+/', '_', $save->title = $request->title));
                $save->url = substr($judul, 0,75);
                $save->title = $request->title;
                $save->id_parent = $request->id_parent;
                $save->jenis_konten = $request->jenis_konten;
                $save->konten1 = $request->konten1;
                $save->konten2 = $request->konten2;
                $save->order = $request->order;
                $save->role_id = $request->role_id;
                $save->user_id = $request->user_id;
                 $save->status = $request->status;
                $save->pdf = $filename;
                $save->updated_at = date('Y-m-d H:i:s');
            //    dd($save);

            }else{
               $judul = strtolower(preg_replace('/\s+/', '_', $save->title = $request->title));
                $save->url = substr($judul, 0,75);
                $save->title = $request->title;
                $save->id_parent = $request->id_parent;
                $save->jenis_konten = $request->jenis_konten;
                $save->konten1 = $request->konten1;
                $save->konten2 = $request->konten2;
                $save->order = $request->order;
                $save->role_id = $request->role_id;
                $save->user_id = $request->user_id;
                 $save->status = $request->status;
                $save->updated_at = date('Y-m-d H:i:s');
               
            }
        
        }elseif($request->jenis_konten == 2){

            $save->title = $request->title;
            $save->id_parent = $request->id_parent;
            $save->jenis_konten = $request->jenis_konten;
            $save->user_id = $request->user_id;
            $save->url = $request->url;
            $save->target = $request->target;
            $save->order = $request->order;
            $save->role_id = $request->role_id;
             $save->status = $request->status;
            $save->updated_at = date('Y-m-d H:i:s');

        }elseif($request->jenis_konten == 1){
             $judul = strtolower(preg_replace('/\s+/', '_', $save->title = $request->title));
                $save->url = substr($judul, 0,75);
                $save->title = $request->title;
                $save->id_parent = $request->id_parent;
                $save->jenis_konten = $request->jenis_konten;
                $save->konten = $request->konten;
                $save->order = $request->order;
                $save->role_id = $request->role_id;
                $save->user_id = $request->user_id;
                 $save->status = $request->status;
                $save->updated_at = date('Y-m-d H:i:s');
                
            
        }else{
                $judul = strtolower(preg_replace('/\s+/', '_', $save->title = $request->title));
                $save->url = substr($judul, 0,75);
                $save->title = $request->title;
                $save->id_parent = $request->id_parent;
                $save->jenis_konten = $request->jenis_konten;
                $save->konten = $request->konten;
                $save->order = $request->order;
                $save->role_id = $request->role_id;
                $save->user_id = $request->user_id;
                 $save->status = $request->status;
                $save->updated_at = date('Y-m-d H:i:s');
        }
        $save->save();
    //    DB::table('main_menu')
    //    ->where('id', $id)
    //    ->update($request->except(['_token','MAX_FILE_SIZE','_method','response']));
       
       return redirect()->route('mainppid.index')
                        ->with('success', 'Menu Updated successfully');
    }

    public function updateOrder(Request $request){
        foreach ($request->order as $key => $order) {
            $post = Mainmenuppid::find($order['id'])->update(['order' => $order['order']]);
        }

        return response('Update Successfully.', 200);
    }

    public function multipledelete(Request $request)
	{
		$ids = $request->ids;
        DB::table("ppid_main_menu")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Deleted successfully."]);
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('ppid_main_menu')->where('id', $id)->delete();
    //      // $Posts->delete();
    //   Mainmenu::find($id)->delete(); 
    
        return redirect()->route('mainppid.index')
                        ->with('success','Menu deleted successfully');
    }
}
