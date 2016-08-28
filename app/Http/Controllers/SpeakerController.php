<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

// Viveed;

use Input;
use Request;

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

    public function data()
    {
        // Getting all table data
        $speaker = Speaker::find(Input::get('speaker_action_id'));
                echo "<div id=\"widget_" . $speaker->id . "\" class=\"col-sm-6 col-lg-4\">";
                echo "<div class=\"widget\">";
                echo "<div class=\"widget-simple\">";
                echo "<h4 class=\"widget-content text-right\">";
                echo "<span class=\"btn-group\">";
                echo "<a href=\"#\" id=" . $speaker->id . " class=\"btn btn-xs btn-primary speaker_edit\" data-toggle=\"tooltip\" title=\"" . @trans('schedule/speakers.speaker_edit') . "\"><i class=\"fa fa-pencil\"></i></a>";
                if(empty(json_decode($speaker->sessions, true))){
                    echo "<a href=\"javascript:void(0)\" id=" . $speaker->id . " class=\"btn btn-xs btn-primary speaker_delete\" data-toggle=\"tooltip\" title=\"" . @trans('schedule/speakers.speaker_delete') . "\"><i class=\"fa fa-times\"></i></a>";
                }
                echo "</span>";
                echo "</h4>";
                echo "<h4 class=\"widget-content text-left\"><strong><span id=\"firstname_" . $speaker->id . "\">" . $speaker->firstname . "</span> <span id=\"lastname_" . $speaker->id . "\">" . $speaker->lastname . "</span></strong></h4>";
                echo "<div class=\"row\">";
                echo "<div class=\"col-md-12\">";
                echo $speaker->description;
                echo "<h4 class=\"widget-content text-right\">";
                echo "<span class=\"btn-group\">";
                echo "<a href=\"javascript:void(0)\" class=\"btn btn-xs btn-default\" data-toggle=\"tooltip\" title=\"" . trans('schedule/speakers.speaker_email') . "\"><span id=\"email_" . $speaker->id . "\">" . $speaker->email . "</a>";
                echo "</span>";
                echo "</h4>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
    }

    public function show()
    {

        // Getting all table data
        $speakers = Speaker::select('*')->get();
        if ($speakers->count()) {
            foreach($speakers AS $speaker){
                echo "<div id=\"widget_" . $speaker->id . "\" class=\"col-sm-6 col-lg-4\">";
                echo "<div class=\"widget\">";
                echo "<div class=\"widget-simple\">";
                echo "<h4 class=\"widget-content text-right\">";
                echo "<span class=\"btn-group\">";
                echo "<a href=\"#\" id=" . $speaker->id . " class=\"btn btn-xs btn-primary speaker_edit\" data-toggle=\"tooltip\" title=\"" . @trans('schedule/speakers.speaker_edit') . "\"><i class=\"fa fa-pencil\"></i></a>";
                if(empty(json_decode($speaker->sessions, true))){
                    echo "<a href=\"javascript:void(0)\" id=" . $speaker->id . " class=\"btn btn-xs btn-primary speaker_delete\" data-toggle=\"tooltip\" title=\"" . @trans('schedule/speakers.speaker_delete') . "\"><i class=\"fa fa-times\"></i></a>";
                }
                echo "</span>";
                echo "</h4>";
                echo "<h4 class=\"widget-content text-left\"><strong><span id=\"firstname_" . $speaker->id . "\">" . $speaker->firstname . "</span> <span id=\"lastname_" . $speaker->id . "\">" . $speaker->lastname . "</span></strong></h4>";



                echo "<div class=\"row\">";
                echo "<div class=\"col-md-12\">";
                echo "<span id=\"description_" . $speaker->id . "\">";
                echo $speaker->description;
                echo  "</span>";
                echo "<h4 class=\"widget-content text-right\">";
                echo "<span class=\"btn-group\">";
                echo "<a href=\"javascript:void(0)\" class=\"btn btn-xs btn-default\" data-toggle=\"tooltip\" title=\"" . trans('schedule/speakers.speaker_email') . "\"><span id=\"email_" . $speaker->id . "\">" . $speaker->email . "</span></a>";
                echo "</span>";
                echo "</h4>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<div class=\"row\">";
            echo "<div class=\"col-md-12\">";
            echo "<h3 class=\"text-center\">" . @trans('schedule/speakers.speakers_list_is_empty') . "</h3>";
            echo "</div>";
            echo "</div>";
        }
    }

    public function show_speakers()
    {

        // Getting all table data
        $speakers = Speaker::select('*')->get();

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
