<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

//Viveed
use App\Setting;
use App\Session;
use App\Speaker;
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
        if(Schema::hasTable('settings')){
            if (Setting::where('type', '=', 'schedule')->exists()) {
                view()->share('session_count', Session::count());
                view()->share('speaker_count', Speaker::count());
                view()->share('config', Setting::where('type', '=', 'schedule')->first());
                view()->share('schedule_config', Setting::where('type', '=', 'schedule')->first());
                view()->share('speakers', Speaker::get());
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
