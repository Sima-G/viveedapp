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

            if(Input::has('catalogue_action_id')){
                // find the bear
                $catalogue = Prc_catalogue::find(Input::get('category_action_id'));
                // change the attribute
                $catalogue->title       =       Input::get('category_title');
                $catalogue->description =       Input::get('category_description');
                $catalogue->start_date  =       Input::get('category_title');
                $catalogue->end_date    =       Input::get('category_description');
                $catalogue->day         =       Input::get('category_title');
                $catalogue->start_hour  =       Input::get('category_description');
                $catalogue->title       =       Input::get('category_title');
                $catalogue->description =       Input::get('category_description');
                $catalogue->status      =       Input::get('category_status');
                $catalogue->state       =       Input::get('category_state');

                // save to our database
                $catalogue->save();
                return Input::get('category_action_id');
            } else {
                $catalogue = Prc_catalogue::firstOrCreate(array(
                    'title'	            => Input::get('catalogue_title'),
                    'description'	    => Input::get('catalogue_description'),
                    'start_date'        => Input::get('catalogue_start_date'),
                    'end_date'	        => Input::get('catalogue_end_date'),
                    'day'	            => Input::get('catalogue_dates'),
                    'start_hour'        => Input::get('catalogue_start_hour'),
                    'end_hour'          => Input::get('catalogue_end_hour'),
                    'status'            => Input::get('catalogue_status'),
                    'state'	            => Input::get('catalogue_state'),
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
            if(Input::has('prc_catalogue_action_id')) {
                Prc_catalogue::destroy(Input::get('prc_catalogue_action_id'));
                return Input::get('prc_catalogue_action_id');
            }
        }
    }
}
