<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

// Viveed;

use App\Speaker;
use Input;
use Request;

use DateTime;

use App\Session;
use App\Setting;
use DateInterval;
use DatePeriod;

use Carbon;

class SessionController extends Controller
{
    public function store()
    {
        // Getting all post data
        if (Request::ajax()) {
            $data = Input::all();

//            if(Input::has('$session_action_id')){

            if(Input::has('speaker_action_id')) {
                // find the bear
                $session = Session::find(Input::get('session_action_id'));

                // change the attribute
                $session->title = Input::get('session_title');
                $session->description = Input::get('session_description');
                $session->start_time = Input::get('session_starts');
                $session->end_time = Input::get('session_ends');
                $session->date = Carbon\Carbon::createFromFormat('d/m/Y', Input::get('session_date'));

                // save to our database
                $session->save();

                $session->speakers()->detach();
                $session->speakers()->attach(Input::get('session_speakers'));
                return $session->id;
            } else {
                $session = Session::Create(array(
                    'title'         => Input::get('session_title'),
                    'description'   => Input::get('session_description'),
                    'start_time'    => Input::get('session_starts'),
                    'end_time'      => Input::get('session_ends'),
                    'date'          => Carbon\Carbon::createFromFormat('d/m/Y', Input::get('session_date')),
                ));

                $session->speakers()->attach(Input::get('session_speakers'));

                $last_inserted_id = $session->id;
                return $last_inserted_id;
            }

//                $session_resparray = array();
//                $session_resparray[] = array('last_inserted_id'=>$session->id, 'action'=>'new');
//                return json_encode($session_resparray[]);

//                return "session_added";

            /*} else {

                $session = Session::Create(array(
                    'title' => Input::get('session_title'),
                    'description' => Input::get('session_description'),
                    'start_time' => Input::get('session_starts'),
                    'end_time' => Input::get('session_ends'),
                    'date' => Carbon\Carbon::createFromFormat('d/m/Y', Input::get('session_date')),
                ));

                $session->speakers()->attach(Input::get('session_speakers'));

                $last_inserted_id = $session->id;
                return $last_inserted_id;
            }*/

            print_r($data);
            die;
        }
    }

    public function data()
    {

            // Getting all table data
            $data = Input::all();

            $session = Session::find(Input::get('session_id'));

            $start_time = strtotime($session->start_time);
            $end_time = strtotime($session->end_time);
            $duration = $end_time - $start_time;

            $speakarray = array();
            foreach ($session->speakers AS $speaker) {
                $speakarray[] = array('id' => $speaker->id, 'text' => $speaker->full_name);
            }


            echo "<div id=\"something\" data-json=\"encodeURIComponent(JSON.stringify({\"name\":\"John\"}))\"></div>";

            echo "<li id=\"session_" . $session->id . "\">";
            echo "<span id=\"speakers\" value=\"\"></span>";
            echo "<div class=\"timeline-icon\"><i class=\"fa fa-circle fa-stack-2x\"></i><i class=\"fa fa-inverse fa-stack-1x\">" . abs($duration / 60) . "'</i></div>";
            echo "<div class=\"timeline-time\">&nbsp;" . date('H:i', $start_time) . "-" . date('H:i', $end_time) . "</div>";
            echo "<div class=\"timeline-content\">";
            echo "<p class=\"push-bit\"><h3>$session->title</h3></p>";
            echo "<p class=\"push-bit\">$session->description</p>";
            echo "<p class=\"push-bit\"><strong>Ομιλητές:</strong> ";
            foreach ($session->speakers as $key => $speaker) {
                if ($key > 0) {
                    echo ", ";
                }
                echo "<span id=\"" . $speaker->id . "\" class=\"speaker_" . $session->id . "\" value=\"" . $speaker->full_name . "\">";
                echo $speaker->full_name;
                echo "</span>";
            }
            echo "</p><p>";
            echo "<a href=\"#\" id='" . $session->id . "' class=\"btn btn-xs btn-default session_edit\"><i class=\"fa fa-pencil-square-o\"></i> " . trans('schedule/sessions.session_edit') . "</a>&nbsp;";
            echo "<a href=\"javascript:void(0)\" id='" . $session->id . "' class=\"btn btn-xs btn-default session_delete\"><i class=\"fa fa-times-circle-o\"></i> " . trans('schedule/sessions.session_delete') . "</a>";
            echo "</p>";
            echo "</div>";
            echo "</li>";

    }

    public function show()
    {
        $settings = Setting::where('type', '=', 'schedule')->firstOrFail();

        $begin = new DateTime($settings->start_date);
//        $begin = $settings->start_date;
        $end = new DateTime($settings->end_date);
        $end->modify('+1 day');

        $interval = DateInterval::createFromDateString('1 day');
        $period = new DatePeriod($begin, $interval, $end);

        foreach ( $period as $dt ){

//            echo $dt->format( "l Y-m-d H:i:s\n" );

            echo "<div class=\"timeline block-content-full\">";
            echo "<h3 class=\"timeline-header\">$settings->title <small><strong>" . $dt->format("d/m/Y") . "</strong></small></h3>";
            echo "<ul class=\"timeline-list timeline-hover\" id=\"" . $dt->format("Y-m-d") . "\">";

            // Getting all table data
            $sessions = Session::where('date', '=', $dt->format("Y-m-d"))->orderBy('start_time', 'ASC')->get();
            foreach($sessions AS $session){
                $start_time = strtotime($session->start_time);
                $end_time = strtotime($session->end_time);
                $duration = $end_time - $start_time;
                echo "<li id=\"session_" . $session->id . "\">";
                echo "<div id=\"title_" . $session->id . "\" style=\"display: none;\">" . $session->title . "</div>";
                echo "<div id=\"start_time_" . $session->id . "\" style=\"display: none;\">" . $session->start_time . "</div>";
                echo "<div id=\"end_time_" . $session->id . "\" style=\"display: none;\">" . $session->end_time . "</div>";
                echo "<div id=\"date_" . $session->id . "\" style=\"display: none;\">" . $dt->format("d/m/Y") . "</div>";
                echo "<div id=\"description_" . $session->id . "\" style=\"display: none;\">" . $session->description . "</div>";
                echo "<div class=\"timeline-icon\"><i class=\"fa fa-circle fa-stack-2x\"></i><i class=\"fa fa-inverse fa-stack-1x\">" . abs($duration/60) . "'</i></div>";
                echo "<div class=\"timeline-time\">&nbsp;" . date('H:i', $start_time) . "-" . date('H:i', $end_time) . "</div>";
                echo "<div class=\"timeline-content\">";
                echo "<h3 class=\"push-bit\">$session->title</h3>";
                echo "<span class=\"push-bit\">$session->description</span>";
                echo "<p class=\"push-bit\"><strong>" . trans('schedule/sessions.session_speakers') . ":</strong> ";
                    /*foreach($session->speakers as $speaker){
                            echo $speaker->full_name;
                    }*/

                foreach ($session->speakers as $key => $speaker) {
                    if ($key > 0) {
                        echo ", ";
                    }
                    echo "<span id=\"" . $speaker->id . "\" class=\"speaker_" . $session->id . "\" value=\"" . $speaker->full_name . "\">";
                    echo $speaker->full_name;
                    echo "</span>";
                }

                echo "</p><p>";
                echo "<a href=\"#\" id='" . $session->id . "' class=\"btn btn-xs btn-default session_edit\"><i class=\"fa fa-pencil-square-o\"></i> " . trans('schedule/sessions.session_edit') . "</a>&nbsp;";
                echo "<a href=\"javascript:void(0)\" id='" . $session->id . "' class=\"btn btn-xs btn-default session_delete\"><i class=\"fa fa-times-circle-o\"></i> " . trans('schedule/sessions.session_delete') . "</a>";
                echo "</p>";
                echo "</div>";
                echo "</li>";
            }

            echo "</ul>";
            echo "</div>";
            echo "<div class='block-title'><hr></div>";

        }



    }

    public function speakers()
    {
//        $speakers = Speaker::Select('id')->get();
        $speakers = Speaker::all()->lists('full_name', 'id');
        $speakers = Speaker::select(array('id' , 'firstname'))->get(['id AS value']);
//        $speakers = Speaker::select('')->get();
        $speakers = Speaker::select('*')->get();

        $speakarray = array();

        foreach($speakers AS $speaker){
            $speakarray[] = array('id'=>$speaker->id, 'text'=>$speaker->full_name);
        }


//        $speakers = Speaker::find(1);

//        foreach ( $speakers as $speaker ){
//            echo "<option value=\"" . $speaker->id . "\">" . $speaker->lastname . " " . $speaker->firstname . "</option>";
//        }
/*        Speaker::all()->each(function($row){
            $row->setHidden(array('id' , 'firstname'));
        });
        return json_encode($row);*/
//        return $speakers->full_name;



        return json_encode($speakarray);
    }

    public function speaker_list()
    {

        $speakers = Speaker::select('*')->get();
        foreach($speakers AS $speaker){
            echo "<option value=\"" . $speaker->id . "\">" . $speaker->full_name . "</option>";
        }

    }

    public function delete()
    {
        if (Request::ajax()) {
            $data = Input::all();
            if(Input::has('session_action_id')) {
                Session::destroy(Input::get('session_action_id'));
                return Input::get('session_action_id');
            }
        }
    }

}
