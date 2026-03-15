<?php

namespace App\Http\Controllers;

use App\Models\Modal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ModalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $modal = Modal::all();
        // return view('modal.index',compact('modal'));
         return view('modal.index',compact('modal'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
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
        foreach ($role as $x){
           $role_id =$x->pivot->role_id;
           
        }
        return view('modal.create',compact('iduser','role_id'));
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
            'publish' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
 
        
        $imageName = time().'.'.$request->image->extension();  
     
        // $request->image->move(public_path('images'), $imageName);
        $path = $request->image->move(public_path('packages/upload/modal'), $imageName);
        $publish = $request->get('publish');
        
        $user_id = $request->get('user_id');
        $role_id = $request->get('role_id');
        
       
        $save = new Modal;
        $save->publish = $publish;
        
        $save->user_id = $user_id;
        $save->role_id = $role_id;
        $save->image = $imageName;
        // $save->path = $path;
        $save->save();

    //     DB::table('sotk_pejabat')
    //    ->insert( $request->except(['_token','MAX_FILE_SIZE']));
       
       return redirect()->route('modals.index')
                        ->with('success', 'created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sejarah  $sejarah
     * @return \Illuminate\Http\Response
     */
    public function show(Modal $sejarah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sejarah  $sejarah
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $modal = Modal::find($id);
        $iduser = Auth::user()->id;
        $role = Auth::user()->roles;
        foreach ($role as $x){
           $role_id =$x->pivot->role_id;
           
        }
        
        return view('modal.edit',compact('modal','iduser','role_id'));
    }
     

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sejarah  $sejarah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        request()->validate([
            'publish' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
 
      
        $post = Modal::find($id);
        if($request->hasFile('image')){
           
            $imageName = time().'.'.$request->image->extension();  
     
            // $request->image->move(public_path('images'), $imageName);
            $path = $request->image->move(public_path('packages/upload/modal'), $imageName);
            // $path = $request->file('photo')->store('public/pejabat');
            $post->image = $imageName;
            $post->publish = $request->publish;
            $post->user_id = $request->user_id;
            $post->role_id = $request->role_id;
            $post->updated_at = date('Y-m-d H:i:s');
            $post->save();

    //    dd($post);
        }else{
            $post->publish = $request->publish;
            $post->user_id = $request->user_id;
            $post->role_id = $request->role_id;
            $post->updated_at = date('Y-m-d H:i:s');
            $post->save();
        }
   
       
       return redirect()->route('modals.index')
                        ->with('success', 'Updated successfully');
    }

    public function multipledelete(Request $request)
	{
		$ids = $request->ids;
        DB::table("sotk_sejarah")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>" Deleted successfully."]);
	}


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sejarah  $sejarah
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('modal')->where('id', $id)->delete();
        return redirect()->route('modals.index')
                        ->with('success','deleted successfully');
    }
}
