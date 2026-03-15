<?php

namespace App\Http\Controllers;

use App\Models\Sotk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SotkController extends Controller
{
     function __construct()
    {
         $this->middleware('permission:mod-sotk-index|mod-sotk-create|mod-sotk-edit|mod-sotk-delete', ['only' => ['index','show']]);
         $this->middleware('permission:mod-sotk-create', ['only' => ['create','store']]);
         $this->middleware('permission:mod-sotk-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:mod-sotk-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sotk = DB::table('sotk')->get();
        return view('sotk.index',compact('sotk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $iduser = Auth::user()->id;
        $parent = DB::table('sotk')->orderBy('id', 'asc')->get();
        $role = Auth::user()->roles;
        foreach ($role as $x){
           $role_id =$x->pivot->role_id;
           
        }
        return view('sotk.create',compact('iduser','parent','role_id'));
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
        'id' => 'required',
       

       ]);
       

       DB::table('sotk')->insert($request->except(['_token','MAX_FILE_SIZE']));
       
       return redirect()->route('sotk.index')
                        ->with('success', 'Sotk created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sotk  $sotk
     * @return \Illuminate\Http\Response
     */
    public function show(Sotk $sotk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sotk  $sotk
     * @return \Illuminate\Http\Response
     */
   public function edit($id)
    {
        $sotk = DB::table('sotk')->find($id);
        $iduser = Auth::user()->id;
        $parent = DB::table('sotk')->orderBy('id', 'asc')->get();
        $role = Auth::user()->roles;
        foreach ($role as $x){
           $role_id =$x->pivot->role_id;
           
        }
        
        return view('sotk.edit',compact('sotk','iduser','parent','role_id'));
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
        'id' => 'required',
       
       

       ]);
       
       DB::table('sotk')
       ->where('id', $id)
       ->update($request->except(['_token','MAX_FILE_SIZE','_method','response']));
       
       return redirect()->route('sotk.index')
                        ->with('success', 'Sotk Updated successfully');
    }

     public function multipledelete(Request $request)
	{
		$ids = $request->ids;
        DB::table("sotk")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>" Deleted successfully."]);
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('sotk')->where('id', $id)->delete();
        return redirect()->route('sotk.index')
                        ->with('success','Sotk deleted successfully');
    }
}