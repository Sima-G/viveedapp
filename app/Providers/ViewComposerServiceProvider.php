<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

//Viveed
use App\Setting;
use App\Session;
use App\Speaker;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('backend/partials.nav', function($view){
            $view -> with('schedule_settings', Setting::where('type', '=', 'schedule')->first())
                    -> with('session_count', Session::count())
                    -> with('speaker_count', Speaker::count());
        });
        view()->share('config', Setting::where('type', '=', 'schedule')->first());
        view()->share('schedule_config', Setting::where('type', '=', 'schedule')->first());
        view()->share('speakers', Speaker::get());

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
