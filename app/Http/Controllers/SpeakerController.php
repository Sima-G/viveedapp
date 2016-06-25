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

            $speaker = Speaker::Create(array(
                'firstname'	    => Input::get('speaker_firstname'),
                'lastname'		=> Input::get('speaker_lastname'),
                'description'	=> Input::get('speaker_description'),
                'email'		    => Input::get('speaker_email'),
            ));
            $last_inserted_id = $speaker->id;
//            return Response::json(array('success' => true, 'last_insert_id' => $data->id), 200);
            return $last_inserted_id;
//            return json_encode(array('success' => true, 'last_insert_id' => $data->id), 200);
//            print_r($data);
//            die;
        }
    }

    public function data()
    {
        // Getting all table data
        $speakers = Speaker::select('*')->get();

        foreach($speakers AS $speaker){
            echo "<div class=\"col-sm-6 col-lg-4\">";
            echo "<div class=\"widget\">";
            echo "<div class=\"widget-simple\">";
            echo "<h4 class=\"widget-content text-left\"><strong>" . $speaker->firstname . " " . $speaker->lastname . "</strong></h4>";
            echo "<div class=\"row\">";
            echo "<div class=\"col-md-12\">";
            echo $speaker->description;
            echo "<h4 class=\"widget-content text-right\">";
            echo "<span class=\"btn-group\">";
            echo "<a href=\"javascript:void(0)\" class=\"btn btn-xs btn-default\" data-toggle=\"tooltip\" title=\"" . trans('schedule/speakers.speaker_email') . "\">" . $speaker->email . "</a>";
            echo "<a href=\"javascript:void(0)\" class=\"btn btn-xs btn-primary\" data-toggle=\"tooltip\" title=\"@\"><i class=\"fa fa-at\"></i></a>";
            echo "</span>";
            echo "</h4>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }

    }

    public function show()
    {

        // Getting all table data
        $speakers = Speaker::select('*')->get();

        foreach($speakers AS $speaker){
            echo "<div class=\"col-sm-6 col-lg-4\">";
            echo "<div class=\"widget\">";
            echo "<div class=\"widget-simple\">";
            echo "<h4 class=\"widget-content text-left\"><strong>" . $speaker->firstname . " " . $speaker->lastname . "</strong></h4>";
            echo "<div class=\"row\">";
            echo "<div class=\"col-md-12\">";
            echo $speaker->description;
            echo "<h4 class=\"widget-content text-right\">";
            echo "<span class=\"btn-group\">";
            echo "<a href=\"javascript:void(0)\" class=\"btn btn-xs btn-default\" data-toggle=\"tooltip\" title=\"" . trans('schedule/speakers.speaker_email') . "\">" . $speaker->email . "</a>";
            echo "<a href=\"javascript:void(0)\" class=\"btn btn-xs btn-primary\" data-toggle=\"tooltip\" title=\"@\"><i class=\"fa fa-at\"></i></a>";
            echo "</span>";
            echo "</h4>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    }
}
