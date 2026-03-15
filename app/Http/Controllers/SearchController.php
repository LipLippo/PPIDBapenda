<?php

namespace App\Http\Controllers;

use App\Models\Search;
use Illuminate\Http\Request;
use App\Models\Posts;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $users = Posts::select("id", "titel", "desc")
                       ->where(function ($q) use ($search) {
                            $q->orWhere('titel', 'like', "%{$search}%")
                              ->orWhere('desc', 'like', "%{$search}%");
                        })
                       ->get();
  
        dd($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $search = $request->input('search');
        $posts = Posts::leftjoin('users','users.id','=','posts.user_id')
                       ->join('posts_cat','posts_cat.post_id','=','posts.id')
                        ->join('category','category.id','=','posts_cat.cat_id')
                        ->select('posts.*','users.name','category.category')
                       ->where(function ($q) use ($search) {
                            $q->orWhere('posts.titel', 'like', "%{$search}%")
                              ->orWhere('posts.desc', 'like', "%{$search}%");
                        })
                        // ->paginate(100);
                       ->get();
        // dd($posts);
        return view('portal.search',compact('posts','search'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Search  $search
     * @return \Illuminate\Http\Response
     */
    public function show(Search $search)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Search  $search
     * @return \Illuminate\Http\Response
     */
    public function edit(Search $search)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Search  $search
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Search $search)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Search  $search
     * @return \Illuminate\Http\Response
     */
    public function destroy(Search $search)
    {
        //
    }
}
