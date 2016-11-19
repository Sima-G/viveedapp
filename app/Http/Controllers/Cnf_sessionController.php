<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

// Viveed;

use App\Cnf_speaker;
use Input;
use Request;

use DateTime;

use App\Cnf_session;
use App\Cnf_setting;
use DateInterval;
use DatePeriod;

use Carbon;
use Sentinel;

class Cnf_sessionController extends Controller
{
    public function store()
    {
        // Getting all post data
        if (Request::ajax()) {
            $data = Input::all();

            if(Input::has('session_action_id')) {
                // find the bear
                $session = Cnf_session::find(Input::get('session_action_id'));

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

            print_r($data);
            die;
        }
    }

    public function show_sessions(){
        if (Sentinel::check()) {
            // Getting all table data
            $userRoles = Sentinel::getRoles()->lists('name', 'id')->all();
            return View('backend.pages.modules.conference.sessions', compact('userRoles'));
        } else {
            return Redirect::to('backend/');
        }
    }

    public function session_list()
    {
        $settings = Cnf_setting::where('type', '=', 'schedule')->firstOrFail();
        $begin = new DateTime($settings->start_date);
        $end = new DateTime($settings->end_date);
        $end->modify('+1 day');
        $interval = DateInterval::createFromDateString('1 day');
        $period = new DatePeriod($begin, $interval, $end);
        $sessions = Cnf_session::select('*')->orderBy('start_time', 'ASC')->get();
        $userRoles = Sentinel::getRoles()->lists('name', 'id')->all();
        return View('backend.partials.modules.conference.lists.session_list', compact('userRoles', 'begin', 'end', 'end', 'interval', 'period', 'sessions'));
    }

    public function speakers()
    {
        $speakers = Cnf_speaker::select('*')->get();
        $speakarray = array();
        foreach($speakers AS $speaker){
            $speakarray[] = array('id'=>$speaker->id, 'text'=>$speaker->full_name);
        }

        return json_encode($speakarray);
    }

    public function speaker_list()
    {
        $speakers = Cnf_speaker::select('*')->get();
        return View('backend.partials.modules.conference.fields.speaker_field', compact('speakers'));

    }

    public function delete()
    {
        if (Request::ajax()) {
            $data = Input::all();
            if(Input::has('session_action_id')) {
                Cnf_session::destroy(Input::get('session_action_id'));
                return Input::get('session_action_id');
            }
        }
    }

}
