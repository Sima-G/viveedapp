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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function () {
    return view('backend.pages.sessions');
});

Route::get('/backend', function () {
    return view('backend.master');
});

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



//Routes for settings
Route::get('/backend/schedule/settings/', array('as' => 'settings', 'uses' => 'SettingController@show'));
Route::post('/backend/schedule/settings/store', 'SettingController@store');
Route::post('/backend/schedule/settings/data', 'SettingController@data');






Route::get('/backend/schedule/settings/data', 'SettingController@data');
Route::get('/backend/schedule/sessions/show', 'SessionController@show');