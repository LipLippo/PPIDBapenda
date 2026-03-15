<?php

namespace App\Http\Controllers;
    
use App\Models\Posts;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

    
class PostsController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:mod-posts-index|mod-posts-create|mod-posts-edit|mod-posts-delete', ['only' => ['index','show']]);
         $this->middleware('permission:mod-posts-create', ['only' => ['create','store']]);
         $this->middleware('permission:mod-posts-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:mod-posts-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::leftjoin('users', 'posts.user_id', '=', 'users.id')
                        ->leftjoin('posts_cat','posts_cat.post_id','=','posts.id')
                        ->leftjoin('category','category.id','=','posts_cat.cat_id')
                        ->leftjoin('roles','roles.id','=','posts.role_id')
                        // ->where('category.category','=','posts_cat.id')
                        ->get(['posts.*', 'users.name','category.category as kategori','roles.name as rolename']);

       
        // $posts = Posts::latest()->paginate(1000);
        return view('posts.index',compact('posts'))
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
        $role = Auth::user()->roles;
        $cat = DB::table('category')->get();
        foreach ($role as $x){
           $role_id =$x->pivot->role_id;
           
        }
        return view('posts.create',compact('iduser','role_id','cat'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $save = new Posts;

       
        request()->validate([
            'titel' => 'required',
            'desc' => 'required',
            'content' => 'required',
            'fav' => 'required|mimes:jpg,png,svg|max:2048',
        ]);

        $filename = time().'.'.$request->fav->extension();  
        $path = $request->fav->move(public_path('packages/photo'), $filename);

            $save->isadmin = 1;
            $save->titel = $request->titel;
            $save->titel_english = $request->titel_english;
            $save->desc = $request->desc;
            $save->desc_english = $request->desc_english;
            $save->url = $request->url;
            $save->content = $request->content;
            $save->content_english = $request->content_english;
            $save->fav = $filename;
            $save->headline = $request->headline;
            $save->publish = $request->publish;
            $save->publish_english = $request->publish_english;
            $save->tgl_publish = $request->tgl_publish;
            $save->view = 1;
            $save->response = $request->response;
            $save->hits = $request->hits;
            $save->user_id = $request->user_id;
            $save->role_id = $request->role_id;
        
        
            $save->save();
            $glo = Posts::find($save->id);
            
            // $glo = json_encode($glo);
            if($glo){
                $detail = array();
                foreach ($request->cat_id as $id_kat){
                    $detail[] = array('post_id' => $glo->id,'cat_id' => $id_kat);
                }
                if(count($detail) > 0){
                    DB::table('posts_cat')->insert($detail);
                    // dd($detail);
                }
            }   
            // dd(json_decode($glo));
        return redirect()->route('post.index')
                        ->with('success','Posts created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Posts  $Posts
     * @return \Illuminate\Http\Response
     */
    public function show(Posts $Posts)
    {
        return view('posts.show',compact('Posts'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Posts  $Posts
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $iduser = Auth::user()->id;
        $role = Auth::user()->roles;
        $cat = DB::table('category')->get();
        foreach ($role as $x){
           $role_id =$x->pivot->role_id;
           
        }
        $postcat = DB::table('posts_cat')->where('post_id',$id)
            ->get();
           
            $arr_cat = array();
                        foreach($postcat as $c){
                            $arr_cat[] = $c->cat_id;
                        }
            // dd($arr_cat,$postcat);
                                                     
        $posts = Posts::find($id);
        return view('posts.edit',compact('posts','iduser','role_id','cat','arr_cat'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Posts  $Posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'titel' => 'required',
            'desc' => 'required',
            'content' => 'required',
            'fav' => 'mimes:jpg,png,svg|max:2048',
        ]);
         $save = Posts::find($id);

         if($request->hasFile('fav')){
         $filename = time().'.'.$request->fav->extension();  
            $path = $request->fav->move(public_path('packages/photo'), $filename);

            $save->isadmin = 1;
            $save->titel = $request->titel;
            $save->titel_english = $request->titel_english;
            $save->desc = $request->desc;
            $save->desc_english = $request->desc_english;
            $save->url = $request->url;
            $save->content = $request->content;
            $save->content_english = $request->content_english;
            $save->fav = $filename;
            $save->headline = $request->headline;
            $save->publish = $request->publish;
            $save->publish_english = $request->publish_english;
            $save->tgl_publish = $request->tgl_publish;
            $save->view = 1;
            $save->response = $request->response;
            $save->hits = $request->hits;
            $save->user_id = $request->user_id;
            $save->role_id = $request->role_id;
            $save->updated_at = date('Y-m-d H:i:s');
        
            $save->save();
         }else{

            $save->isadmin = 1;
            $save->titel = $request->titel;
            $save->titel_english = $request->titel_english;
            $save->desc = $request->desc;
            $save->desc_english = $request->desc_english;
            $save->url = $request->url;
            $save->content = $request->content;
            $save->content_english = $request->content_english;
            // $save->fav = $request->fav;
            $save->headline = $request->headline;
            $save->publish = $request->publish;
            $save->publish_english = $request->publish_english;
            $save->tgl_publish = $request->tgl_publish;
            $save->view = 1;
            $save->response = $request->response;
            $save->hits = $request->hits;
            $save->user_id = $request->user_id;
            $save->role_id = $request->role_id;
            $save->updated_at = date('Y-m-d H:i:s');
        
        
            $save->save();
         }
        // $Posts->update($request->all());
    
        return redirect()->route('post.index')
                        ->with('success','Posts updated successfully');
    }
    
     public function multipledelete(Request $request)
	{
		$ids = $request->ids;
        DB::table("posts")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Posts Deleted successfully."]);
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Posts  $Posts
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $Posts->delete();
      Posts::find($id)->delete(); 
    
        return redirect()->route('post.index')
                        ->with('success','Posts deleted successfully');
    }
}
