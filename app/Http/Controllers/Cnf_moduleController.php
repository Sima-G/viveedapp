<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

// Viveed;
use Request;
use Sentinel;

class Cnf_moduleController extends Controller
{
    public function show_dashboard()
    {
        if (Sentinel::check()) {
            // Getting all table data
            $userRoles = Sentinel::getRoles()->lists('name', 'id')->all();
            return View('backend.pages.modules.conference.dashboard', compact('userRoles'));
        } else {
            return Redirect::to('backend/');
        }

    }
}
