<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

// Viveed;
use Input;
use Request;
use Sentinel;
use App\Prc_catalogue;

class Prc_catalogueController extends Controller
{
    public function store()
    {
        // Getting all post data
        if (Request::ajax()) {
            $data = Input::all();

            $catalogue_days = Input::get('catalogue_days');
            if (empty($catalogue_days)){
                $catalogue_days = null;
            }

            if(Input::has('catalogue_action_id')){
                // find the bear
                $catalogue = Prc_catalogue::find(Input::get('catalogue_action_id'));
                // change the attribute
//                $catalogue->title       =       Input::get('catalogue_title');
//                $catalogue->description =       Input::get('catalogue_description');
//                $catalogue->start_date  =       Input::get('catalogue_start_date');
//                $catalogue->end_date    =       Input::get('catalogue_end_date');
//                $catalogue->day         =       $catalogue_days;
//                $catalogue->start_hour  =       Input::get('catalogue_start_hour');
//                $catalogue->end_hour    =       Input::get('catalogue_end_hour');
//                $catalogue->status      =       Input::get('catalogue_status');
//                $catalogue->state       =       Input::get('catalogue_state');

                $catalogue->title       =       empty(Input::get('catalogue_title')) ? null : Input::get('catalogue_title');
                $catalogue->description =       empty(Input::get('catalogue_description')) ? null : Input::get('catalogue_description');
                $catalogue->start_date  =       empty(Input::get('catalogue_start_date')) ? null : Input::get('catalogue_start_date');
                $catalogue->end_date    =       empty(Input::get('catalogue_end_date')) ? null : Input::get('catalogue_end_date');
                $catalogue->day         =       empty(Input::get('catalogue_days')) ? null : Input::get('catalogue_days');
                $catalogue->start_hour  =       empty(Input::get('catalogue_start_hour')) ? null : Input::get('catalogue_start_hour');
                $catalogue->end_hour    =       empty(Input::get('catalogue_end_hour')) ? null : Input::get('catalogue_end_hour');
                $catalogue->status      =       empty(Input::get('catalogue_status')) ? null : Input::get('catalogue_status');
                $catalogue->state       =       empty(Input::get('catalogue_state')) ? null : Input::get('catalogue_state');

                // save to our database
                $catalogue->save();
                return Input::get('catalogue_action_id');
            } else {
                $catalogue = Prc_catalogue::firstOrCreate(array(
                    /*'title'	            => Input::get('catalogue_title'),
                    'description'	    => Input::get('catalogue_description'),
                    'start_date'        => Input::get('catalogue_start_date'),
                    'end_date'	        => Input::get('catalogue_end_date'),
                    'day'	            => $catalogue_days,
                    'start_hour'        => Input::get('catalogue_start_hour'),
                    'end_hour'          => Input::get('catalogue_end_hour'),
                    'status'            => Input::get('catalogue_status'),
                    'state'	            => Input::get('catalogue_state'),*/

                    'title'	            => empty(Input::get('catalogue_title')) ? null : Input::get('catalogue_title'),
                    'description'	    => empty(Input::get('catalogue_description')) ? null : Input::get('catalogue_description'),
                    'start_date'        => empty(Input::get('catalogue_start_date')) ? null : Input::get('catalogue_start_date'),
                    'end_date'	        => empty(Input::get('catalogue_end_date')) ? null : Input::get('catalogue_end_date'),
                    'day'	            => empty(Input::get('catalogue_days')) ? null : Input::get('catalogue_days'),
                    'start_hour'        => empty(Input::get('catalogue_start_hour')) ? null : Input::get('catalogue_start_hour'),
                    'end_hour'          => empty(Input::get('catalogue_end_hour')) ? null : Input::get('catalogue_end_hour'),
                    'status'            => empty(Input::get('catalogue_status')) ? null : Input::get('catalogue_status'),
                    'state'	            => empty(Input::get('catalogue_state')) ? null : Input::get('catalogue_state'),
                ));
                $last_inserted_id = $catalogue->id;
                return $last_inserted_id;
            }
        }
    }

    public function show_catalogues()
    {
        if (Sentinel::check()) {
            // Getting all table data
            $userRoles = Sentinel::getRoles()->lists('name', 'id')->all();
            $catalogues = Prc_catalogue::Select('*')->get();
            return View('backend.pages.modules.pricing.catalogues', compact('userRoles', 'catalogues'));
        } else {
            return Redirect::to('backend/');
        }

    }

    public function catalogue_list()
    {
        // Getting all table data
        $catalogues = Prc_catalogue::select('*')->orderBy('id', 'ASC')->get();
        $userRoles = Sentinel::getRoles()->lists('name', 'id')->all();
        return View('backend.partials.modules.pricing.catalogue_list', compact('userRoles', 'catalogues'));
    }

    public function delete()
    {
        if (Request::ajax()) {
            $data = Input::all();
            if(Input::has('catalogue_action_id')) {
                Prc_catalogue::destroy(Input::get('catalogue_action_id'));
                return Input::get('catalogue_action_id');
            }
        }
    }
}
