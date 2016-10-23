<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

// Viveed;
use Request;
use Sentinel;
use App\Ct_category;
use App\Ct_product;

use App\Ct_ingredient;
use App\Ctr_group;
use App\Ctr_quantity;

class Ct_moduleController extends Controller
{
    public function category_stats()
    {
        $new_categories_cnt = Ct_category::where('status', '=', '1')->count();
        $enabled_categories_cnt = Ct_category::where('state', '=', '1')->count();
        $disabled_categories_cnt = Ct_category::where('state', '=', '0')->count();
//        $total_subcategories_cnt = Ct_category::where('parent', '<>', NULL)->count();
//        $total_categories_cnt = Ct_category::select('*')->count();
        $total_subcategories_cnt = Ct_category::whereNULL('parent')->count();
        $total_categories_cnt = Ct_category::wherenotNULL('parent')->count();
        return View('backend.partials.modules.catering.category_stats', compact('new_categories_cnt', 'enabled_categories_cnt', 'disabled_categories_cnt', 'total_categories_cnt', 'total_subcategories_cnt'));
    }

    public function product_stats()
    {
        $new_products_cnt = Ct_product::where('status', '=', '1')->count();
        $enabled_products_cnt = Ct_product::where('state', '=', '1')->count();
        $disabled_products_cnt = Ct_product::where('state', '=', '0')->count();
        $total_products_cnt = Ct_category::select('*')->count();
        return View('backend.partials.modules.catering.product_stats', compact('new_products_cnt', 'enabled_products_cnt', 'disabled_products_cnt', 'total_products_cnt'));
    }

    public function catering_stats()
    {
        $active_products_cnt    = Ct_product::where('state', '=', '1')->count();
        $active_categories_cnt  = Ct_category::where('state', '=', '1')->count();
        $active_quantities_cnt  = Ctr_quantity::where('state', '=', '1')->count();
        $active_groups_cnt      = Ctr_group::where('state', '=', '1')->count();
        $active_ingredients_cnt = Ct_ingredient::where('state', '=', '1')->count();

        return View('backend.partials.modules.catering.stats.catering_stats', compact('active_product_cnt', 'active_categories_cnt', 'active_quantities_cnt', 'active_groups_cnt', 'active_ingredients_cnt'));
    }

    public function show_dashboard()
    {
        if (Sentinel::check()) {
            // Getting all table data
            $userRoles = Sentinel::getRoles()->lists('name', 'id')->all();
            return View('backend.pages.modules.catering.dashboard', compact('userRoles'));
        } else {
            return Redirect::to('backend/');
        }

    }

}
