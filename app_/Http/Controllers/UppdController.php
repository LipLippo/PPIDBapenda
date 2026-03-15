<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View, Validator, Input, Session, Redirect, Auth;
use Illuminate\Support\Facades\DB;

class UppdController extends Controller
{
    public function getIndex($id){

       

        $uppd = "UPPD ".strtoupper(str_replace('-', ' ', $id));
        
        $roles = DB::table('roles')->where('name', $uppd)->first();
        if (!empty($roles)) {
            return View::make("portal.uppd_index",array(
                'url' => $id,
                'uppd' => $uppd,
                'uppd_id' => $roles->id,
            ));
        } else {
            return Redirect::to('/');
            // echo "gagal";
        }
        
	}	
	
    public function getPage($id, $page_id){

        

        $uppd = "UPPD ".strtoupper(str_replace('-', ' ', $id));
        
        $roles = DB::table('roles')->where('name', $uppd)->first();
        if (!empty($roles)) {
            return View::make("portal.uppd_page",array(
                'url' => $id,
                'uppd' => $uppd,
                'uppd_id' => $roles->id,
                'page_id' => $page_id
            ));
        } else {
            return Redirect::to('/');
        }
        
	}	
}
