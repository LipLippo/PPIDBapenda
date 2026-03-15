<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:mod-category-index|mod-category-create|mod-category-edit|mod-category-delete', ['only' => ['index','show']]);
         $this->middleware('permission:mod-category-create', ['only' => ['create','store']]);
         $this->middleware('permission:mod-category-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:mod-category-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = DB::table('category')
            ->leftjoin('users', 'users.id', '=', 'category.user_id')
            ->select('category.*', 'users.name')
            ->get();
       
        return view('category.index',compact('category'))
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
       
        foreach ($role as $x){
           $role_id =$x->pivot->role_id;
           
       }
        return view('category.create',compact('iduser','role_id'));
    
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
        'category' => 'required',
       

       ]);
       

       DB::table('category')->insert($request->except(['_token','MAX_FILE_SIZE']));
       
       return redirect()->route('category.index')
                        ->with('success', 'Category created successfully');
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
        $category =  DB::table('category')->find($id);
        $iduser = Auth::user()->id;
        $role = Auth::user()->roles;
       
        foreach ($role as $x){
           $role_id =$x->pivot->role_id;
           
       }
        
        return view('category.edit',compact('category','iduser','role_id'));
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
        'category' => 'required',

       ]);
       
       DB::table('category')
       ->where('id', $id)
       ->update($request->except(['_token','MAX_FILE_SIZE','_method','response']));
       
       return redirect()->route('category.index')
                        ->with('success', 'Category Updated successfully');
    }

     public function multipledelete(Request $request)
	{
		$ids = $request->ids;
        DB::table("category")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Category Deleted successfully."]);
	}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('category')->where('id', $id)->delete();
    
        return redirect()->route('category.index')
                        ->with('success','Category deleted successfully');
    }
}
