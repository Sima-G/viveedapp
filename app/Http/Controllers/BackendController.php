<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//Viveed
use Illuminate\Support\Facades\Redirect;
use Sentinel;

class BackendController extends Controller
{
    public function showhome()
    {
        if(Sentinel::check()){

            $userRoles = Sentinel::getRoles()->lists('name', 'id')->all();
            return view('backend.pages.home', compact('userRoles'));
        } else {
            return Redirect::to('backend/');
        }
    }
}
