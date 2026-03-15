<?php

namespace App\Http\Controllers;

use App\Models\Statistikperizinan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use View, Input;

class StatistikperizinanController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:mod-statistikperizinan-index|mod-statistikperizinan-create|mod-statistikperizinan-edit|mod-statistikperizinan-delete', ['only' => ['index','show']]);
         $this->middleware('permission:mod-statistikperizinan-create', ['only' => ['create','store']]);
         $this->middleware('permission:mod-statistikperizinan-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:mod-statistikperizinan-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perizinan = Statistikperizinan::get();
        return view('perizinan.statistikperizinan.index',compact('perizinan'));
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
        
        return view('perizinan.statistikperizinan.create',compact('iduser','role_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
        if(isset($_POST['rows1_'])) 
            {
                $x  = 0; $label = ''; $value = ''; $count = count($_POST['rows1_']);
                foreach ($_POST['rows1_'] as $key => $counts)
                {
                    $x++;
                    $mark = ($x != $count)?';':'';
                    $label .= $request->get('nama_'.$counts).$mark;
                    $value .= $request->get('nilai_'.$counts).$mark;
                }

                $data['label'] = $label;
                $data['value'] = $value;
            }else{
                $data['label'] = '';
                $data['value'] = '';
            }

            $data['title'] = $request->get('title');
            $data['xaxis'] = $request->get('xaxis');
            $data['yaxis'] = $request->get('yaxis');
            $data['tanggal'] = date('Y-m-d', strtotime($request->get('tanggal')));
            $data['user_id'] = $request->get('user_id');
            $data['role_id'] = $request->get('role_id');
            // $Save->save();
            
            Statistikperizinan::create($data);
            return redirect()->route('statizin.index')
                        ->with('success','created successfully');
       

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Statistikperizinan  $statistikperizinan
     * @return \Illuminate\Http\Response
     */
    public function show(Statistikperizinan $statistikperizinan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Statistikperizinan  $statistikperizinan
     * @return \Illuminate\Http\Response
     */
    public function edit(Statistikperizinan $statistikperizinan, $id)
    {
        $stat = Statistikperizinan::find($id);
        $iduser = Auth::user()->id;
        $role = Auth::user()->roles;
       
        foreach ($role as $x){
           $role_id =$x->pivot->role_id;
           
       }
        
        return view('perizinan.statistikperizinan.edit',compact('stat','iduser','role_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Statistikperizinan  $statistikperizinan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Statistikperizinan $statistikperizinan, $id)
    {
       
        if(isset($_POST['rows1_'])) 
            {
                $x  = 0; $label = ''; $value = ''; $count = count($_POST['rows1_']);
                foreach ($_POST['rows1_'] as $key => $counts)
                {
                    $x++;
                    $mark = ($x != $count)?';':'';
                    $label .= $request->get('nama_'.$counts).$mark;
                    $value .= $request->get('nilai_'.$counts).$mark;
                }

                $data['label'] = $label;
                $data['value'] = $value;
            }else{
                $data['label'] = '';
                $data['value'] = '';
            }

            $data['title'] = $request->get('title');
            $data['xaxis'] = $request->get('xaxis');
            $data['yaxis'] = $request->get('yaxis');
            $data['tanggal'] = date('Y-m-d', strtotime($request->get('tanggal')));
            $data['user_id'] = $request->get('user_id');
            $data['role_id'] = $request->get('role_id');
            // $Save->save();
            $statistikperizinan = Statistikperizinan::find($id);
            $statistikperizinan->update($data);
            return redirect()->route('statizin.index')
                        ->with('success','created successfully');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Statistikperizinan  $statistikperizinan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Statistikperizinan $statistikperizinan, $id)
    {
         DB::table('statistik_perizinan')->where('id', $id)->delete();
        return redirect()->route('statizin.index')
                        ->with('success','deleted successfully');
    }
}
