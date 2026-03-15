<?php

namespace App\Http\Controllers;

use App\Models\Mainuppd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class MainuppdController extends Controller
{
   function __construct()
    {
         $this->middleware('permission:mod-menuutamauppd-list|mod-menuutamauppd-create|mod-menuutamauppd-edit|mod-menuutamauppd-delete', ['only' => ['index','show']]);
         $this->middleware('permission:mod-menuutamauppd-create', ['only' => ['create','store']]);
         $this->middleware('permission:mod-menuutamauppd-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:mod-menuutamauppd-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $main = DB::table('uppd_main_menu')
            ->leftjoin('users', 'users.id', '=', 'uppd_main_menu.user_id')
            ->select('uppd_main_menu.*', 'users.name')
            ->orderBy('order','asc')
            ->get();
            // $stored = session()->all();
            // print_r($stored);
        return view('uppd.mainmenu.index',compact('main'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent = DB::table('uppd_main_menu')
        ->where('jenis_konten','=',0)
        
        ->get();
        $rs = DB::table('uppd_main_menu')->get();
        $iduser = Auth::user()->id;
        $role = Auth::user()->roles;
       
        foreach ($role as $x){
           $role_id =$x->pivot->role_id;
           
       }
        // echo json_encode($role);
        // dd($role);
        return view('uppd.mainmenu.create',compact('parent','rs','iduser','role_id'));
    
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
           
        ]);
 
        
        

        $save = new Mainuppd;

        if ($request->jenis_konten == 3) {
        request()->validate([
            'title' => 'required',
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
             $save->status = $request->status;
            $save->role_id = $request->role_id;
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
       return redirect()->route('uppdmain.index')
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
        $main =  DB::table('uppd_main_menu')->find($id);
        $parent = DB::table('uppd_main_menu')
        	->where('jenis_konten',0)
            ->get();
        $jenis = DB::table('uppd_main_menu')
        	
            ->where('jenis_konten','>',0)
            ->get();
        $iduser = Auth::user()->id;
        $role = Auth::user()->roles;
       
        foreach ($role as $x){
           $role_id =$x->pivot->role_id;
           
        }
        
        return view('uppd.mainmenu.edit',compact('main','parent','jenis','iduser','role_id'));
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
       
        $save = Mainuppd::find($id);
       
        if ($request->jenis_konten == 3) {

        request()->validate([
            'title' => 'required',
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
       
       return redirect()->route('uppdmain.index')
                        ->with('success', 'Menu Updated successfully');
    }

     public function updateOrder(Request $request){
        foreach ($request->order as $key => $order) {
            $post = Mainuppd::find($order['id'])->update(['order' => $order['order']]);
        }

        return response('Update Successfully.', 200);
    }

    public function multipledelete(Request $request)
	{
		$ids = $request->ids;
        DB::table("uppd_main_menu")->whereIn('id',explode(",",$ids))->delete();
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
        DB::table('uppd_main_menu')->where('id', $id)->delete();
    //      // $Posts->delete();
    //   Mainmenu::find($id)->delete(); 
    
        return redirect()->route('uppdmain.index')
                        ->with('success','Menu deleted successfully');
    }
}
