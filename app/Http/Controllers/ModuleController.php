<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

// Viveed
use App\Setting;
use Sentinel;

class ModuleController extends Controller
{
    public function modulist(){

        if(Sentinel::check()){
            $userRoles = Sentinel::getRoles()->lists('name', 'id')->all();
            $modules = Setting::Select('*')->get();
            return view('backend.pages.modules', compact('modules', 'userRoles'));
        } else {
            return Redirect::to('backend/');
        }
    }
}
