<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

// Viveed;

use Input;
use Request;

use DateTime;

use App\Session;
use App\Setting;
use DateInterval;
use DatePeriod;

class SessionController extends Controller
{
    public function store()
    {
        // Getting all post data
        if (Request::ajax()) {
            $data = Input::all();

            $session = Session::Create(array(
                'title'	            => Input::get('session_title'),
                'description'		=> Input::get('session_description'),
                'start_time'		=> Input::get('session_starts'),
                'end_time'	        => Input::get('session_ends'),
                'date'	            => Input::get('session_date'),
            ));

            print_r($data);
            die;
        }
    }

    public function data()
    {
        // Getting all table data
        $sessions = Session::select('*')->get();


            foreach($sessions AS $session){
//                $start_time = new DateTime($session->start_time);
//                $end_time = new DateTime($session->end_time);
//                $duration = $start_time->diff($end_time);

                $start_time = strtotime($session->start_time);


                $end_time = strtotime($session->end_time);

                $duration = $end_time - $start_time;

                echo "<li>";
                echo "<div class=\"timeline-icon\"><i class=\"fa fa-circle fa-stack-2x\"></i><i class=\"fa fa-inverse fa-stack-1x\">" . abs($duration/60) . "'</i></div>";
                echo "<div class=\"timeline-time\">&nbsp;" . date('H:i', $start_time) . "-" . date('H:i', $end_time) . "</div>";
                echo "<div class=\"timeline-content\">";
                echo "<p class=\"push-bit\"><h3>$session->title</h3></p>";
                echo "<p class=\"push-bit\">$session->description</p>";
                echo "<p class=\"push-bit\"><strong>Ομιλητές:</strong></p>";
                echo "<p>";
                echo "<a href=\"javascript:void(0)\" class=\"btn btn-xs btn-default\"><i class=\"fa fa-pencil-square-o\"></i> Επεξεργασία</a>";
                echo "<a href=\"javascript:void(0)\" class=\"btn btn-xs btn-default\"><i class=\"fa fa-times-circle-o\"></i> Διαγραφή</a>";
                echo "<a href=\"javascript:void(0)\" class=\"btn btn-xs btn-default\"><i class=\"fa fa-share-square-o\"></i> Share</a>";
                echo "</p>";
                echo "</div>";
                echo "</li>";
            }

    }

    public function show()
    {
        $settings = Setting::where('type', '=', 'schedule')->firstOrFail();

        $begin = new DateTime($settings->start_date);
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
            $sessions = Session::where('date', '=', $dt->format("Y-m-d"))->get();
            foreach($sessions AS $session){
                $start_time = strtotime($session->start_time);
                $end_time = strtotime($session->end_time);
                $duration = $end_time - $start_time;
                echo "<li>";
                echo "<div id=\"title_" . $session->id . "\" style=\"display: none;\">" . $session->title . "</div>";
                echo "<div id=\"start_time_" . $session->id . "\" style=\"display: none;\">" . $session->start_time . "</div>";
                echo "<div id=\"end_time_" . $session->id . "\" style=\"display: none;\">" . $session->end_time . "</div>";
                echo "<div id=\"date_" . $session->id . "\" style=\"display: none;\">" . $dt->format("d/m/Y") . "</div>";
                echo "<div id=\"description_" . $session->id . "\" style=\"display: none;\">" . $session->description . "</div>";
                echo "<div class=\"timeline-icon\"><i class=\"fa fa-circle fa-stack-2x\"></i><i class=\"fa fa-inverse fa-stack-1x\">" . abs($duration/60) . "'</i></div>";
                echo "<div class=\"timeline-time\">&nbsp;" . date('H:i', $start_time) . "-" . date('H:i', $end_time) . "</div>";
                echo "<div class=\"timeline-content\">";
                echo "<p class=\"push-bit\"><h3>$session->title</h3></p>";
                echo "<p class=\"push-bit\">$session->description</p>";
                echo "<p class=\"push-bit\"><strong>" . trans('schedule/sessions.session_speakers') . ":</strong></p>";
                echo "<p>";
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

}
