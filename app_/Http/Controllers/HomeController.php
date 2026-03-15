<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View, Validator, Input, Session, Redirect, Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Posts;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $count =  Posts::select(
        DB::raw('count(id) as jml'),
        DB::raw('year(tgl_publish) as year'),
        DB::raw('month(tgl_publish) as month'),
       
        )
        // ->where(DB::raw('date(tgl_publish)'), '>=', "2010-01-01")
        ->groupBy('year')
        ->groupBy('month')
        ->get();
        // ->toArray();

        
        
        // dd($count);
        return view('home',compact('count'));
    }
     /*function menampilkan data profil*/
   

}
