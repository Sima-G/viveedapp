<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

// Viveed;

use Input;
use Request;

use Sentinel;

use App\Speaker;

class SpeakerController extends Controller
{

    public function store()
    {
        // Getting all post data
        if (Request::ajax()) {
            $data = Input::all();
            if(Input::has('speaker_action_id')){
                // find the bear
                $speaker = Speaker::find(Input::get('speaker_action_id'));
                // change the attribute
                $speaker->firstname = Input::get('speaker_firstname');
                $speaker->lastname = Input::get('speaker_lastname');
                $speaker->description = Input::get('speaker_description');
                $speaker->email = Input::get('speaker_email');
                // save to our database
                $speaker->save();
                return Input::get('speaker_action_id');
            } else {
                $speaker = Speaker::firstOrCreate(array(
                    'firstname'	    => Input::get('speaker_firstname'),
                    'lastname'		=> Input::get('speaker_lastname'),
                    'description'	=> Input::get('speaker_description'),
                    'email'		    => Input::get('speaker_email'),
                ));
                $last_inserted_id = $speaker->id;
            return $last_inserted_id;
            }
        }
    }

    public function show_speakers()
    {
        if (Sentinel::check()) {
            // Getting all table data
            $userRoles = Sentinel::getRoles()->lists('name', 'id')->all();
            return View('backend.pages.speakers', compact('userRoles'));
        } else {
            return Redirect::to('backend/');
        }

    }

    public function speaker_list()
    {
        // Getting all table data
        $speakers = Speaker::select('*')->get();
        $userRoles = Sentinel::getRoles()->lists('name', 'id')->all();
        return View('backend.partials.speaker_list', compact('userRoles', 'speakers'));
    }

    public function delete()
    {
        if (Request::ajax()) {
            $data = Input::all();
            if(Input::has('speaker_action_id')) {
                Speaker::destroy(Input::get('speaker_action_id'));
                return Input::get('speaker_action_id');
            }
        }
    }
}
