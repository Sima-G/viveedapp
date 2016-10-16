<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

// Viveed;
use Input;
use Request;
use Sentinel;
use App\Ct_product;
use App\Prc_catalogue;
use App\Prc_product;

class Prc_orderController extends Controller
{
    public function make_orders()
    {
        if (Sentinel::check()) {
            // Getting all table data
            $userRoles = Sentinel::getRoles()->lists('name', 'id')->all();
//            $categories = Ct_category::Select('*')->get();
            return View('backend.pages.modules.pricing.orders', compact('userRoles'));
        } else {
            return Redirect::to('backend/');
        }

    }
}
