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

Route::get('/backend/home', array('as' => 'home', 'uses' => 'BackendController@showhome'));

Route::post('/store', 'SessionController@store');

Route::get('/data', 'SessionController@data');
Route::post('/data', 'SessionController@data');

Route::get('/backend/settings', function () {
    return view('backend.pages.settings');
});








//Routes for sessions
Route::group(array('prefix' => 'backend/'), function () {
    Route::get('schedule/sessions/', array('as' => 'sessions', 'uses' => 'SessionController@show_sessions'));
    Route::post('schedule/sessions/store', 'SessionController@store');
    Route::post('schedule/sessions/delete', 'SessionController@delete');
    Route::get('schedule/sessions/speakers', 'SessionController@speakers');
    Route::get('schedule/sessions/session_list', 'SessionController@session_list');
    Route::get('schedule/sessions/speaker_list', 'SessionController@speaker_list');
});
//--------------------



//Routes for speakers
Route::group(array('prefix' => 'backend/'), function () {

    //Dashboard section
    Route::get('schedule/dashboard/', array('as' => 'cnf_dashboard', 'uses' => 'Cnf_moduleController@show_dashboard'));

    Route::get('schedule/speakers/', array('as' => 'speakers', 'uses' => 'SpeakerController@show_speakers'));
    Route::get('schedule/speakers/speaker_list', 'SpeakerController@speaker_list');
    Route::post('schedule/speakers/store', 'SpeakerController@store');
    Route::post('schedule/speakers/delete', 'SpeakerController@delete');
});
//--------------------



//Routes for settings
Route::group(array('prefix' => 'backend/'), function () {
    Route::get('schedule/settings/', array('as' => 'settings', 'uses' => 'SettingController@show'));
    Route::post('schedule/settings/store', 'SettingController@store');
    Route::post('schedule/settings/data', 'SettingController@data');
    //Route::get('schedule/settings/data', 'SettingController@data');
});
//-------------------




//Routes for settings
Route::group(array('prefix' => 'backend/'), function () {




    //Routes for modules
    Route::group(array('prefix' => 'modules/'), function () {





        //Routes for Pricing module
        Route::group(array('prefix' => 'pricing/'), function () {
            //Dashboard section
            Route::get('dashboard/', array('as' => 'prc_dashboard', 'uses' => 'Prc_moduleController@show_dashboard'));
            //Catalogue section
            Route::group(array('prefix' => 'catalogues'), function () {
                Route::get('/', array('as' => 'prc_catalogues', 'uses' => 'Prc_catalogueController@show_catalogues'));
                Route::get('/catalogue_list', array('as' => 'prc_catalogue_list', 'uses' => 'Prc_catalogueController@catalogue_list'));
                Route::post('/store', 'Prc_catalogueController@store');
                Route::post('/delete', 'Prc_catalogueController@delete');
                Route::get('/catalogue_stats', 'Prc_moduleController@catalogue_stats');
            });
            //Product price section
            Route::group(array('prefix' => 'products'), function () {
//                Route::get('/', array('as' => 'prc_catalogues', 'uses' => 'Prc_productController@show_catalogues'));
                Route::get('/{id}/manage', array('as' => 'prc_product_manage', 'uses' => 'Prc_productController@product_manage'));
                Route::post('/store', 'Prc_productController@store');
//                Route::get('/catalogue_list', array('as' => 'prc_catalogue_list', 'uses' => 'Prc_catalogueController@catalogue_list'));
//                Route::post('/store', 'Prc_catalogueController@store');
//                Route::post('/delete', 'Prc_catalogueController@delete');
//                Route::get('/catalogue_stats', 'Prc_moduleController@catalogue_stats');
            });
        });

        //Routes for Catering module
        Route::group(array('prefix' => 'catering/'), function () {
            //Dashboard section
            Route::get('dashboard/', array('as' => 'ct_dashboard', 'uses' => 'Ct_moduleController@show_dashboard'));
            //Category section
            Route::group(array('prefix' => 'categories'), function () {
                Route::get('/', array('as' => 'ct_categories', 'uses' => 'Ct_categoryController@show_categories'));
                Route::get('/category_list', 'Ct_categoryController@category_list');
                Route::get('/{category_id}/category_parent_field', 'Ct_categoryController@category_parent_field');
                Route::post('/store', 'Ct_categoryController@store');
                Route::post('/delete', 'Ct_categoryController@delete');
                Route::get('/category_stats', 'Ct_moduleController@category_stats');
            });

        });

    });


    //Product section

    //Product block

    //Quantity block

    //Ingredient block


    //Product
    Route::get('modules/catering/products/product_stats', 'Ct_moduleController@product_stats');
    Route::get('modules/catering/product/{id}/manage', array('as' => 'ct_product_manage', 'uses' => 'Ct_productController@product_manage'));
    Route::get('modules/catering/product/{id}/show', array('as' => 'ct_product_show', 'uses' => 'Ct_productController@product_show'));
    Route::post('modules/catering/product/delete', 'Ct_productController@delete');


    //Product block lists
    Route::get('modules/catering/product/{id}/inquantity_list', array('as' => 'ct_inquantity_list', 'uses' => 'Ct_inquantityController@inquantity_list'));
    Route::get('modules/catering/product/{id}/ingroup_list', array('as' => 'ct_ingroup_list', 'uses' => 'Ct_ingroupController@ingroup_list'));
    Route::get('modules/catering/product/{id}/quantity_list', array('as' => 'ct_quantity_list', 'uses' => 'Ct_quantityController@quantity_list'));
    Route::get('modules/catering/product/{id}/ingredient_list', array('as' => 'ct_ingredient_list', 'uses' => 'Ct_ingredientController@ingredient_list'));
    //-------------------


//    Route::get('modules/catering/product/manage', array('as' => 'ct_product_create', 'uses' => 'Ct_productController@product_manage'));
    Route::get('modules/catering/product/manage', array('as' => 'ct_product_create', 'uses' => 'Ct_productController@product_create'));
    Route::get('modules/catering/products/show', array('as' => 'ct_products', 'uses' => 'Ct_productController@show_products'));
    Route::get('modules/catering/products/product_list', array('as' => 'ct_product_list', 'uses' => 'Ct_productController@product_list'));


    //Product block store
    Route::post('modules/catering/products/store_product', 'Ct_productController@store_product');
    Route::post('modules/catering/products/store_ingroup', 'Ct_ingroupController@store');
    Route::post('modules/catering/products/store_inquantity', 'Ct_inquantityController@store');
    Route::post('modules/catering/products/store_ingredient', 'Ct_ingredientController@store');
    Route::post('modules/catering/products/store_quantity', 'Ct_quantityController@store');


    //Product block delete
    Route::post('modules/catering/products/delete_ingroup', 'Ct_ingroupController@delete');
    Route::post('modules/catering/products/delete_inquantity', 'Ct_inquantityController@delete');
    Route::post('modules/catering/products/delete_quantity', 'Ct_quantityController@delete');
    Route::post('modules/catering/products/delete_ingredient', 'Ct_ingredientController@delete');


    //Product views
        Route::get('modules/catering/products/product_create_block', array('as' => 'ct_product_create_block', function () {
            return view('backend.partials.modules.catering.product_create_block');
        }));
        Route::get('modules/catering/products/{id}/product_view_block', array('as' => 'ct_product_view_block', function () {
            return view('backend.partials.modules.catering.product_view_block');
        }));
        Route::get('modules/catering/products/{id}/product_manage_block', array('as' => 'ct_product_manage_block', function () {
            return view('backend.partials.modules.catering.product_manage_block');
        }));

    //Ingredient views
    Route::get('modules/catering/products/ingredient_view_block', array('as' => 'ct_ingredient_view_block', function () {
        return view('backend.partials.modules.catering.ingredient_view_block');
    }));
    Route::get('modules/catering/products/{id}/ingredient_manage_block', array('as' => 'ct_ingredient_manage_block', function () {
        return view('backend.partials.modules.catering.ingredient_manage_block');
    }));
});
//-------------------

//Routes for users
//Route::get('/backend/users/', array('as' => 'users', function()
//{
//    return view('backend.pages.users');
//}));

Route::get('/backend/users/', array('as' => 'users', 'uses' => 'UserController@userlist'));
//-------------------

//Routes for modules
Route::get('/backend/modules/', array('as' => 'modules', 'uses' => 'ModuleController@modulist'));
//-------------------


//Routes for login
Route::group(array('prefix' => 'backend/'), function () {
    Route::get('signin', array('as' => 'signin', 'uses' => 'AuthController@getSignin'));
    Route::post('signin', 'AuthController@postSignin');
    # Logout
    Route::get('logout', array('as' => 'logout','uses' => 'AuthController@getLogout'));
});
//-----------------