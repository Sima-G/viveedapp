<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

// Viveed
//use App\Cnf_setting;
use App\Module;
use Sentinel;
//use Jenssegers\Date\Date;

class ModuleController extends Controller
{
    public function modulist(){

        if(Sentinel::check()){
            $userRoles = Sentinel::getRoles()->lists('name', 'id')->all();
//            $modules = Cnf_setting::Select('*')->get();

            $modules = Module::Select('*')->get();

            return view('backend.pages.modules', compact('modules', 'userRoles'));
        } else {
            return Redirect::to('backend/');
        }
    }
}
