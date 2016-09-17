<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

// Viveed;
use Request;
use Sentinel;
use App\Prc_catalogue;

class Prc_moduleController extends Controller
{
    public function show_dashboard()
    {
        if (Sentinel::check()) {
            // Getting all table data
            $userRoles = Sentinel::getRoles()->lists('name', 'id')->all();
            return View('backend.pages.modules.pricing.dashboard', compact('userRoles'));
        } else {
            return Redirect::to('backend/');
        }

    }
}
