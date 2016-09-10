<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

// Viveed;

use Request;
use App\Ct_category;

class Ct_dashboardController extends Controller
{
    public function category_stats()
    {
        $new_categories_cnt = Ct_category::where('status', '=', '1')->count();
        $enabled_categories_cnt = Ct_category::where('state', '=', '1')->count();
        $disabled_categories_cnt = Ct_category::where('state', '=', '0')->count();
        $total_categories_cnt = Ct_category::select('*')->count();
        return View('backend.partials.modules.catering.category_stats', compact('new_categories_cnt', 'enabled_categories_cnt', 'disabled_categories_cnt', 'total_categories_cnt'));
    }
}
