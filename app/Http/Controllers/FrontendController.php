<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//Viveed
use App\Speaker;
use App\Session;
use App\Setting;
use View;

class FrontendController extends Controller
{

    public function sessions_formated()
    {
        /*$sessions = Speaker::select('*')->get();*/
        $sessions = Session::select('*')->orderBy('start_time', 'ASC')->get();
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
        $sessions = Session::select('*')->with('speakers')->orderBy('start_time', 'ASC')->get();
        return json_encode($sessions);
    }




    public function speakers_simple()
    {
        $speakers = Speaker::select('*')->get();
        $speakarray = array();
        foreach($speakers AS $speaker){
            $speakarray[] = array('id'=>$speaker->id, 'full_name'=>$speaker->full_name, 'email'=>$speaker->email, 'text'=>$speaker->description);
        }
        return json_encode($speakarray);
    }

    public function speakers_full()
    {
        $speakers = Speaker::select('*')->get();
        return json_encode($speakers);
    }

    public function speakers_lite()
    {
        $speakers = Speaker::all()->lists('full_name', 'id');
        return json_encode($speakers);
    }

    public function timeline($date = ''){
        if ($date) {
            $sessions = Session::where('date', '=', $date)->orderBy('start_time', 'ASC')->get();
            $sessions_cnt = $sessions->count();
//            return View::make('frontend/partials.timeline', $sessions);
            return View::make('frontend/partials.timeline', compact('sessions', 'date', 'sessions_cnt'));
        }
    }

    public function about_sessions()
    {
        $sessions = Setting::where('type', '=', 'schedule')->first();
        return json_encode($sessions);
    }

    public function sessions(){
        $sessions = Session::Select('*')->orderBy('start_time', 'ASC')->get();
        $sessions_cnt = $sessions->count();
        return View::make('frontend/partials.sessionlist', compact('sessions', 'sessions_cnt'));
    }

    public function sessions_list(){
            $sessions = Session::Select('*')->orderBy('start_time', 'ASC')->get();
            return json_encode($sessions);
    }

}
