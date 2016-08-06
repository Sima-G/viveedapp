<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



# Frontend Regular Responses
Route::group(array('prefix' => 'frontend'), function () {

    #Response for home
    Route::get('/home', array('as' => 'home', function(){
        return view('frontend.pages.home');
    }));
    #Response for timeline
    Route::get('/timeline/{date}', array('as' => 'timeline', 'uses' => 'FrontendController@timeline'));
    #Response for timeline
    Route::get('/sessions', array('as' => 'sessions', 'uses' => 'FrontendController@sessions'));
    #Response for about section
    Route::get('/about', array('as' => 'about', function () {
        return view('frontend.pages.about');
    }));
    #Response for speaker_list
    Route::get('/speaker_list', array('as' => 'speaker_list', function () {
        return view('frontend.pages.speakers');
    }));

});


# Frontend JSON Responses
Route::group(array('prefix' => 'frontend/json'), function () {

    #Returns a list with sessions
    Route::get('/timeline_custom/{date}', array('as' => 'timeline_custom', 'uses' => 'FrontendController@timeline_custom'));
    #Returns a list with sessions
    Route::get('/sessions_simple', array('as' => 'sessions', 'uses' => 'FrontendController@sessions_simple'));
    #Returns a list with sessions
    Route::get('/sessions_formated', array('as' => 'sessions_formated', 'uses' => 'FrontendController@sessions_formated'));
    #Returns a list with speakers
    Route::get('/speakers_simple', array('as' => 'speakers_simple', 'uses' => 'FrontendController@speakers_simple'));
    #Returns a list with speakers with fullnames
    Route::get('/speakers_full', array('as' => 'speakers_full', 'uses' => 'FrontendController@speakers_full'));
    #Returns a lite list with only speakers name
    Route::get('/speakers_lite', array('as' => 'speakers_lite', 'uses' => 'FrontendController@speakers_lite'));

    #Returns a list with speakers with fullnames
    Route::get('/about_sessions', array('as' => 'about_sessions', 'uses' => 'FrontendController@about_sessions'));

    Route::get('/sessions_list', array('as' => 'sessions_list', 'uses' => 'FrontendController@sessions_list'));
});












Route::get('/frontend/session_list', array('as' => 'session_list', function () {
    return view('frontend.pages.sessions');
}));

/*Route::get('frontend/timeline/{date}', function ($date) {
    return view($name_view);
});*/

//Route::get('/frontend/timeline/{date}', array('as' => 'timeline', 'uses' => 'FrontendController@timeline'));



Route::get('/', array('as' => 'dashboard', function(){
    return view('frontend.pages.home');
}));

/*# JSON Responses */




/*# Regular Responses */




















//Route::get('/', function () {
//    return view('welcome');
//});

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);



Route::get('/', array('as' => 'preview', function () {
    return view('frontend.pages.home');
}));



Route::get('/backend', array('as' => 'login', function () {
    return view('backend.pages.login');
}));

Route::get('/backend/home', array('as' => 'home', function () {
    return view('backend.pages.home');
}));

Route::post('/store', 'SessionController@store');

Route::get('/data', 'SessionController@data');
Route::post('/data', 'SessionController@data');

Route::get('/backend/settings', function () {
    return view('backend.pages.settings');
});






//Routes for sessions

Route::get('/backend/schedule/sessions/', array('as' => 'sessions', function()
{
    return view('backend.pages.sessions');
}));

//Route::get('/backend/schedule/sessions/', 'SessionController@show');
//Route::get('/backend/schedule/sessions/', function () {
//    return view('backend.pages.sessions');
//});
Route::post('/backend/schedule/sessions/', 'SessionController@show');

Route::post('/backend/schedule/sessions/store', 'SessionController@store');
Route::get('/backend/schedule/sessions/data', 'SessionController@data');
Route::post('/backend/schedule/sessions/data', 'SessionController@data');

Route::get('/backend/schedule/sessions/speaker_list', 'SessionController@speaker_list');

Route::get('/backend/schedule/sessions/speakers', 'SessionController@speakers');
Route::post('/backend/schedule/sessions/delete', 'SessionController@delete');






//Routes for speakers

//Route::get('dashboard', array('as' => 'dashboard', 'uses' => 'PagesController@showDashboard'));

Route::get('/backend/schedule/speakers/', array('as' => 'speakers', function()
{
    return view('backend.pages.speakers');
}));
//Route::get('/backend/schedule/speakers/', function () {
//    return view('backend.pages.speakers');
//});

Route::get('/backend/schedule/speakers/show', 'SpeakerController@show');
//Route::get('/backend/schedule/speakers/', 'SpeakerController@show');
Route::post('/backend/schedule/speakers/store', 'SpeakerController@store');
Route::get('/backend/schedule/speakers/data', 'SpeakerController@data');

Route::post('/backend/schedule/speakers/data', 'SpeakerController@data');
Route::post('/backend/schedule/speakers/delete', 'SpeakerController@delete');




//Routes for settings
Route::get('/backend/schedule/settings/', array('as' => 'settings', 'uses' => 'SettingController@show'));
Route::post('/backend/schedule/settings/store', 'SettingController@store');
Route::post('/backend/schedule/settings/data', 'SettingController@data');






Route::get('/backend/schedule/settings/data', 'SettingController@data');
Route::get('/backend/schedule/sessions/show', 'SessionController@show');

Route::get('/backend/users/', array('as' => 'users', function()
{
    return view('backend.pages.users');
}));