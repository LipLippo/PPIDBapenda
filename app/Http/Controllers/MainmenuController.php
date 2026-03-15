<?php

namespace App\Http\Controllers;
use App\Models\Mainmenu;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class MainmenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:mod-mainmenu-index|mod-mainmenu-create|mod-mainmenu-edit|mod-mainmenu-delete', ['only' => ['index','show']]);
         $this->middleware('permission:mod-mainmenu-create', ['only' => ['create','store']]);
         $this->middleware('permission:mod-mainmenu-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:mod-mainmenu-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $main = DB::table('main_menu')
            ->leftjoin('users', 'users.id', '=', 'main_menu.user_id')
            ->select('main_menu.*', 'users.name')
            ->orderBy('order','asc')
            ->get();
            // $stored = session()->all();
            // print_r($stored);
        return view('mainmenu.index',compact('main'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent = DB::table('main_menu')
            // ->where('id_parent','=',0)
            ->where('jenis_konten','=',0)
            ->get();
        $rs = DB::table('main_menu')->get();
        $iduser = Auth::user()->id;
        $role = Auth::user()->roles;
       
        foreach ($role as $x){
           $role_id =$x->pivot->role_id;
           
       }
        
        // dd($allSessions);
        return view('mainmenu.create',compact('parent','rs','iduser','role_id'));
    
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

        $save = new Mainmenu;

        if ($request->jenis_konten == 2) {
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
            $save->title_english = $request->title_english;
            $save->id_parent = $request->id_parent;
            $save->jenis_konten = $request->jenis_konten;
            $save->user_id = $request->user_id;
            $save->konten1 = $request->konten1;
            $save->konten1_english = $request->konten1_english;
            $save->konten2 = $request->konten2;
            $save->konten2_english = $request->konten2_english;
            $save->order = $request->order;
            $save->role_id = $request->role_id;
            $save->pdf = $filename;
            $save->status = $request->status;
            $save->target = $request->target;
            $save->status_english = $request->status_english;
            $save->user_id = $request->user_id;
        
        }elseif($request->jenis_konten == 3){

            $save->title = $request->title;
            $save->title_english = $request->title_english;
            $save->id_parent = $request->id_parent;
            $save->jenis_konten = $request->jenis_konten;
            $save->user_id = $request->user_id;
            $save->url = $request->url;
            $save->target = $request->target;
            $save->order = $request->order;
            $save->role_id = $request->role_id;
            $save->status = $request->status;
            $save->url = $request->url;
            $save->status_english = $request->status_english;
            $save->user_id = $request->user_id;

        }elseif($request->jenis_konten == 1){
            $judul = strtolower(preg_replace('/\s+/', '_', $save->title = $request->title));
        
            $save->url = substr($judul, 0,75);
            $save->title = $request->title;
            $save->title_english = $request->title_english;
            $save->id_parent = $request->id_parent;
            $save->jenis_konten = $request->jenis_konten;
            $save->user_id = $request->user_id;
            $save->konten = $request->konten;
            $save->konten_english = $request->konten_english;
            $save->order = $request->order;
            $save->role_id = $request->role_id;
            $save->status = $request->status;
            $save->target = $request->target;
            $save->status_english = $request->status_english;
            $save->user_id = $request->user_id;
            
        }else{
            $judul = strtolower(preg_replace('/\s+/', '_', $save->title = $request->title));
        
            $save->url = substr($judul, 0,75);
            $save->title = $request->title;
            $save->title_english = $request->title_english;
            $save->id_parent = $request->id_parent;
            $save->jenis_konten = $request->jenis_konten;
            $save->user_id = $request->user_id;
            $save->konten = $request->konten;
            $save->konten_english = $request->konten_english;
            $save->order = $request->order;
            $save->role_id = $request->role_id;
            $save->status = $request->status;
            $save->target = $request->target;
            $save->status_english = $request->status_english;
            $save->user_id = $request->user_id;
        }
        $save->save();

    //    DB::table('main_menu')->insert($request->except(['_token','MAX_FILE_SIZE']));
       
       return redirect()->route('main.index')
                        ->with('success', 'Menu created successfully');
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
        $main =  DB::table('main_menu')->find($id);
        $parent = DB::table('main_menu')
        	->where('jenis_konten',0)
            ->get();
        $jenis = DB::table('main_menu')
            ->where('jenis_konten','>',0)
            ->get();
        $iduser = Auth::user()->id;
        $role = Auth::user()->roles;
       
        foreach ($role as $x){
           $role_id =$x->pivot->role_id;
           
       }
         
        return view('mainmenu.edit',compact('main','parent','jenis','iduser','role_id'));
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
        'id_parent' => 'required',
        'jenis_konten' => 'required',

       ]);

        $save = Mainmenu::find($id);
       
        if ($request->jenis_konten == 2) {

        request()->validate([
            'title' => 'required',
            'id_parent' => 'required',
            'jenis_konten' => 'required',
            'pdf' => 'mimes:pdf,xlx,csv|max:2048',
        ]);
            if($request->hasFile('pdf')){
           
                $filename = time().'.'.$request->pdf->extension();  
                $path = $request->pdf->move(public_path('packages/upload/file'), $filename);
               
                $judul = strtolower(preg_replace('/\s+/', '_', $save->title = $request->title));
            
                $save->url = substr($judul, 0,75);
                
                $save->title = $request->title;
                $save->title_english = $request->title_english;
                $save->id_parent = $request->id_parent;
                $save->jenis_konten = $request->jenis_konten;
                $save->user_id = $request->user_id;
                $save->konten1 = $request->konten1;
                $save->konten1_english = $request->konten1_english;
                $save->konten2 = $request->konten2;
                $save->konten2_english = $request->konten2_english;
                $save->order = $request->order;
                $save->role_id = $request->role_id;
                $save->pdf = $filename;
                $save->status = $request->status;
                $save->target = $request->target;
                $save->status_english = $request->status_english;
                $save->user_id = $request->user_id;
                $save->updated_at = date('Y-m-d H:i:s');
            //    dd($save);

            }else{
                $judul = strtolower(preg_replace('/\s+/', '_', $save->title = $request->title));
            
                $save->url = substr($judul, 0,75);
                
                $save->title = $request->title;
                $save->title_english = $request->title_english;
                $save->id_parent = $request->id_parent;
                $save->jenis_konten = $request->jenis_konten;
                $save->user_id = $request->user_id;
                $save->konten1 = $request->konten1;
                $save->konten1_english = $request->konten1_english;
                $save->konten2 = $request->konten2;
                $save->konten2_english = $request->konten2_english;
                $save->order = $request->order;
                $save->role_id = $request->role_id;
                // $save->pdf = $filename;
                $save->status = $request->status;
                $save->target = $request->target;
                $save->status_english = $request->status_english;
                $save->user_id = $request->user_id;
                $save->updated_at = date('Y-m-d H:i:s');
            }
        
        }elseif($request->jenis_konten == 3){

            $save->title = $request->title;
            $save->title_english = $request->title_english;
            $save->id_parent = $request->id_parent;
            $save->jenis_konten = $request->jenis_konten;
            $save->user_id = $request->user_id;
            $save->url = $request->url;
            $save->target = $request->target;
            $save->order = $request->order;
            $save->role_id = $request->role_id;
            $save->status = $request->status;
            $save->url = $request->url;
            $save->status_english = $request->status_english;
            $save->user_id = $request->user_id;
            $save->updated_at = date('Y-m-d H:i:s');

        }elseif($request->jenis_konten == 1){
            $judul = strtolower(preg_replace('/\s+/', '_', $save->title = $request->title));
        
            $save->url = substr($judul, 0,75);
            $save->title = $request->title;
            $save->title_english = $request->title_english;
            $save->id_parent = $request->id_parent;
            $save->jenis_konten = $request->jenis_konten;
            $save->user_id = $request->user_id;
            $save->konten = $request->konten;
            $save->konten_english = $request->konten_english;
            $save->order = $request->order;
            $save->role_id = $request->role_id;
            $save->status = $request->status;
            $save->target = $request->target;
            $save->status_english = $request->status_english;
            $save->user_id = $request->user_id;
            $save->updated_at = date('Y-m-d H:i:s');
            
        }else{
            $judul = strtolower(preg_replace('/\s+/', '_', $save->title = $request->title));
        
            $save->url = substr($judul, 0,75);
            $save->title = $request->title;
            $save->title_english = $request->title_english;
            $save->id_parent = $request->id_parent;
            $save->jenis_konten = $request->jenis_konten;
            $save->user_id = $request->user_id;
            $save->konten = $request->konten;
            $save->konten_english = $request->konten_english;
            $save->order = $request->order;
            $save->role_id = $request->role_id;
            $save->status = $request->status;
            $save->target = $request->target;
            $save->status_english = $request->status_english;
            $save->user_id = $request->user_id;
            $save->updated_at = date('Y-m-d H:i:s');
        }
        $save->save();
       
       

    //    DB::table('main_menu')->insert($request->except(['_token','MAX_FILE_SIZE']));
       
       return redirect()->route('main.index')
                        ->with('success', 'Menu created successfully');
    }

   public function updateOrder(Request $request){
        foreach ($request->order as $key => $order) {
            $post = Mainmenu::find($order['id'])->update(['order' => $order['order']]);
        }

        return response('Update Successfully.', 200);
    }

    public function multipledelete(Request $request)
	{
		$ids = $request->ids;
        DB::table("main_menu")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Products Deleted successfully."]);
	}

    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
        
            $request->file('upload')->move(public_path('images'), $fileName);
   
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/'.$fileName); 
            $msg = 'Image uploaded successfully'; 
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
               
            @header('Content-type: text/html; charset=utf-8'); 
            echo $response;
        }
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('main_menu')->where('id', $id)->delete();
        return redirect()->route('main.index')
                        ->with('success','Menu deleted successfully');
    }
}
