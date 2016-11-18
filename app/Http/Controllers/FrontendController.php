<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//Viveed
use App\Cnf_speaker;
use App\Cnf_session;
use App\Cnf_setting;
use View;

use DateTime;
use DateInterval;
use DatePeriod;

class FrontendController extends Controller
{

    public function sessions_formated()
    {
        /*$sessions = Speaker::select('*')->get();*/
        $sessions = Cnf_session::select('*')->orderBy('start_time', 'ASC')->get();
        $sessarray = array();

        foreach($sessions AS $session){
            $sessarray[] = array('id'=>$session->id, 'title'=>$session->title);
        }
        return json_encode($sessarray);
    }



    /*public function jsessions()
    {
        $sessions = Session::select('*')->with('speakers')->get();
        return json_encode($sessions);
    }*/

    public function sessions_simple()
    {
        $sessions = Cnf_session::select('*')->with('speakers')->orderBy('start_time', 'ASC')->get();
        return json_encode($sessions);
    }




    public function speakers_simple()
    {
        $speakers = Cnf_speaker::select('*')->get();
        $speakarray = array();
        foreach($speakers AS $speaker){
            $speakarray[] = array('id'=>$speaker->id, 'full_name'=>$speaker->full_name, 'email'=>$speaker->email, 'text'=>$speaker->description);
        }
        return json_encode($speakarray);
    }

    public function speakers_full()
    {
        $speakers = Cnf_speaker::select('*')->get();
        return json_encode($speakers);
    }

    public function speakers_lite()
    {
        $speakers = Cnf_speaker::all()->lists('full_name', 'id');
        return json_encode($speakers);
    }

    public function timeline($date = ''){
        if ($date) {
            $sessions = Cnf_session::where('date', '=', $date)->orderBy('start_time', 'ASC')->get();
            $sessions_cnt = $sessions->count();
//            return View::make('frontend/partials.timeline', $sessions);
            return View::make('frontend/partials/modules/conference/'.\Config::get('app.template').'.timeline', compact('sessions', 'date', 'sessions_cnt'));
        }
    }

    public function about_sessions()
    {
        $sessions = Cnf_setting::where('type', '=', 'schedule')->first();
        return json_encode($sessions);
    }

    public function sessions(){
        $sessions = Cnf_session::Select('*')->orderBy('start_time', 'ASC')->get();
        $sessions_cnt = $sessions->count();

        $settings = Cnf_setting::where('type', '=', 'schedule')->firstOrFail();
        $begin = new DateTime($settings->start_date);
        $end = new DateTime($settings->end_date);
        $end->modify('+1 day');
        $interval = DateInterval::createFromDateString('1 day');
        $period = new DatePeriod($begin, $interval, $end);

        return View::make('frontend/partials/modules/conference/'.\Config::get('app.template').'.sessionlist', compact('sessions', 'sessions_cnt', 'period'));
    }

    public function sessions_list(){
            $sessions = Cnf_session::Select('*')->orderBy('start_time', 'ASC')->get();
            return json_encode($sessions);
    }

}
