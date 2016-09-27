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

    public function catalogue_stats()
    {
        /*$active_catalogues_by_date_cnt  =    Prc_catalogue::where('start_date', '>=', date("Y-m-d"))
                                                        ->where('end_date', '>=', date("Y-m-d"))
                                                        ->count();

        $active_catalogues_by_day_cnt =     Prc_catalogue::where('day', '&', date("d"), '>', 0)
                                                        ->count();

        $active_catalogues_by_hour_cnt =    Prc_catalogue::where('start_hour', '>=', date("H:i:s"))
                                                    ->where('end_hour', '>=', date("H:i:s"))
                                                    ->count();*/

        /*$active_catalogues = Prc_catalogue::where('start_date', '=<', NOW)
                                            ->orwhere('start_date', '=<', NOW);*/
//        $active_catalogues_cnt = Prc_catalogue::where('active_catalogue', '=', 'active')->count();
        $active_catalogues_cnt = 0;
        $total_catalogues_cnt = 0;
        $new_catalogues_cnt = Prc_catalogue::where('status', '=', '1')->count();
        $enabled_catalogues_cnt = Prc_catalogue::where('state', '=', '1')->count();
        $total_catalogues_cnt = Prc_catalogue::select('*')->get()->where('active_catalogue', '4')->count();

        /*foreach ($total_catalogues AS $active_catalogue){
            $total_catalogues_cnt++;
            if ($active_catalogue->active_catalogue = "active"){
                $active_catalogues_cnt++;
            }
        }*/
        return View('backend.partials.modules.pricing.catalogue_stats', compact('active_catalogues_cnt', 'new_catalogues_cnt', 'enabled_catalogues_cnt', 'total_catalogues_cnt'));
    }
}
