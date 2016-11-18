<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

//Viveed
use App\Cnf_setting;
use App\Cnf_session;
use App\Cnf_speaker;
use App\User;
use Sentinel;
use Schema;
//use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
//        view()->composer('backend/partials.nav', function($view){
//            $view -> with('schedule_settings', Setting::where('type', '=', 'schedule')->first())
//                    -> with('session_count', Session::count())
//                    -> with('speaker_count', Speaker::count());
//        });
        if(Schema::hasTable('cnf_settings')){
            if (Cnf_setting::where('type', '=', 'schedule')->exists()) {
                view()->share('session_count', Cnf_session::count());
                view()->share('speaker_count', Cnf_speaker::count());
                view()->share('config', Cnf_setting::where('type', '=', 'schedule')->first());
                view()->share('schedule_config', Cnf_setting::where('type', '=', 'schedule')->first());
                view()->share('speakers', Cnf_speaker::get());
            }
        }

        view()->share('roles', 'sasasa');

//        if ($user = Sentinel::check()){
////        if (Sentinel::check()) {
////            $uid = Sentinel::getUser()->id;
//        $uid = Sentinel::getUser()->first_name;
//            view()->share('roles', $uid);
//            $userRoles = Sentinel::getRoles()->lists('name', 'id')->all();
//            view()->share('roles', 'sasasa2222');
////        }
//        }

        if(Sentinel::check()){

            $userRoles = Sentinel::getRoles()->lists('name', 'id')->all();
            view()->share('userRoles', $userRoles);
        }

        /*view()->composer('frontend/partials.timeline', function($view){
//            $date = Input::get('date');
            $view -> with('sessions', Session::where('date', '=', '2016-07-18')->get());
        });*/

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
