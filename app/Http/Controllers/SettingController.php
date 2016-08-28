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

use Validator;
use Redirect;

use DatePeriod;
use DateTime;
use DateInterval;

use Sentinel;


class SettingController extends Controller
{
    public function store()
    {
        // Getting all post data
        if (Request::ajax()) {

            $rules = array(
                'schedule_title' => 'required',
                'schedule_description' => 'required',
                'schedule_date_starts' => 'required',
                'schedule_date_ends' => 'required',
                'schedule_init_status' => 'required',
            );

            $data = Input::all();

            // Create a new validator instance from our validation rules
            $validator = Validator::make($data, $rules);

            if ($validator->fails()) {
                return redirect::Route('settings')
                    ->withErrors($validator)
                    ->withInput();
            } else {

                $setting = Setting::where('type', '=', 'schedule')->first();

                // change the attribute
                $setting->title = Input::get('schedule_title');
                $setting->logo = 'no_logo.png';
                $setting->description = Input::get('schedule_description');
                $setting->start_date = Carbon\Carbon::createFromFormat('d/m/Y', Input::get('schedule_date_starts'));
                $setting->end_date = Carbon\Carbon::createFromFormat('d/m/Y', Input::get('schedule_date_ends'));


                $date_range_format = "d/m/Y";
                $begin = new DateTime($setting->start_date);
                $end = new DateTime($setting->end_date);
                $end->modify('+1 day');
                $interval = new DateInterval('P1D'); // 1 Day
                $dateRange = new DatePeriod($begin, $interval, $end);
                $date_range = [];
                foreach ($dateRange as $key => $date) {

                    $date_range[] =
                        array(
                            'id' => $key,
                            'date' => $date->format($date_range_format)
                        );
                }

                $setting->date_range = json_encode($date_range);


                switch (Input::get('schedule_init_status')) {
                    case '0':
                        $setting->init = 1;
                        break;
                    case '1':
                        $setting->init = 2;
                        break;
                    case '2':
                        $setting->init = 2;
                        break;
                    default:
                        $setting->init = 2;
                }

                if (!$setting->save()) {
                    abort(404);
                }

                print_r($data);
            }

            die;
        }
    }

    public function data()
    {
        $settings = Setting::where('type', '=', 'schedule')->firstOrFail();
        return json_encode($settings);
    }

    public function show()
    {
        $settings = Setting::where('type', '=', 'schedule')->firstOrFail();
        if (!empty($settings->start_date)) {
            $settings->start_date = Carbon\Carbon::createFromFormat('Y-m-d', $settings->start_date)->format('d/m/Y');
        }
        if (!empty($settings->end_date)) {
            $settings->end_date = Carbon\Carbon::createFromFormat('Y-m-d', $settings->end_date)->format('d/m/Y');
        }
        if (Sentinel::check()) {
            $userRoles = Sentinel::getRoles()->lists('name', 'id')->all();
            return View('backend.pages.settings', compact('settings', 'userRoles'));
        } else {
            return Redirect::to('backend/');
        }
    }
}
