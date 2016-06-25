<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

// Viveed;

use Input;
use Request;

use App\Setting;
use Carbon;

class SettingController extends Controller
{
    public function store()
    {
        // Getting all post data
        if (Request::ajax()) {
            $data = Input::all();

//            $setting = Setting::Create(array(
//                'type'	            => 'schedule',
//                'title'		        => Input::get('schedule_title'),
//                'logo'			    => 'no_logo.png',
//                'description'	    => Input::get('schedule_description'),
//                'start_date'        => Carbon\Carbon::createFromFormat('d/m/Y', Input::get('schedule_date_starts')),
//                'end_date'          => Carbon\Carbon::createFromFormat('d/m/Y', Input::get('schedule_date_ends')),
//            ));


            $setting = Setting::where('type', '=', 'schedule')->first();

            // change the attribute
            $setting->title             = Input::get('schedule_title');
            $setting->logo              = 'no_logo.png';
            $setting->description       = Input::get('schedule_description');
            $setting->start_date        = Carbon\Carbon::createFromFormat('d/m/Y', Input::get('schedule_date_starts'));
            $setting->end_date          = Carbon\Carbon::createFromFormat('d/m/Y', Input::get('schedule_date_ends'));

            // save to our database
            $setting->save();

            print_r($data);
            die;
        }
    }

    public function data()
    {
        // Getting all table data

//        $settings = Setting::select('*')->firstOrFail();
        $settings = Setting::where('type', '=', 'schedule')->firstOrFail();

        return json_encode($settings);

    }

    public function show()
    {
        $settings = Setting::where('type', '=', 'schedule')->firstOrFail();
        $settings->start_date = Carbon\Carbon::createFromFormat('Y-m-d', $settings->start_date)->format('d/m/Y');
        $settings->end_date = Carbon\Carbon::createFromFormat('Y-m-d', $settings->end_date)->format('d/m/Y');
        return View('backend.pages.settings', compact('settings'));
    }
}
