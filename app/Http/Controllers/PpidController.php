<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View, Validator, Input, Session, Redirect, Auth;

class PpidController extends Controller
{
    public function getIndex(){

        
        return View::make("portal.ppid_index");
	}	
}
