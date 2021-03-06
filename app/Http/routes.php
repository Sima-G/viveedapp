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

# ======================================================================================================================
# ================                       ===============================================================================
# ================     Frontend Routes   ===============================================================================
# ================                       ===============================================================================
# ======================================================================================================================

Route::get('/', array('as' => 'home', function(){
    return view('frontend.pages.home');
}));

# Frontend Regular Responses
Route::group(array('prefix' => 'frontend/'), function () {




    # Frontend Conference Module
    Route::group(array('prefix' => 'conference/'), function () {
        # Frontend Conference Module (Material)
//        Route::group(array('prefix' => Config::get('app.theme')), function () {

            Route::get('/', array('as' => 'dashboard', function(){
                return view('frontend.pages.modules.conference.'.Config::get('app.template').'.home');
            }));
            Route::get('/', array('as' => 'preview', function () {
                return view('frontend.pages.modules.conference.'.Config::get('app.template').'.home');
//                return view('frontend.pages.modules.conference.home');
            }));
            #Response for home
            Route::get('/home', array('as' => 'home', function(){
                return view('frontend.pages.modules.conference.'.Config::get('app.template').'.home');
            }));
            #Response for timeline
            Route::get('/timeline/{date}', array('as' => 'timeline', 'uses' => 'FrontendController@timeline'));

            #Response for timeline
            Route::get('/sessions', array('as' => 'sessions', 'uses' => 'FrontendController@sessions'));

            #Response for about section
            Route::get('/about', array('as' => 'about', function () {
                return view('frontend.pages.modules.conference.'.Config::get('app.template').'.about');
            }));
            #Response for speaker_list
            Route::get('/speaker_list', array('as' => 'speaker_list', function () {
                return view('frontend.pages.modules.conference.'.Config::get('app.template').'.speakers');
            }));
            Route::get('/session_list', array('as' => 'session_list', function () {
                return view('frontend.pages.modules.conference.'.Config::get('app.template').'.sessions');
            }));
//        });

        # Frontend Conference Module (Bootstrap)
        /*Route::group(array('prefix' => 'boostrap/'), function () {
            Route::get('/', array('as' => 'dashboard', function(){
                return view('frontend.pages.home');
            }));

            Route::get('/', array('as' => 'preview', function () {
                return view('frontend.pages.modules.conference.home');
            }));

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
                return view('frontend.pages.modules.conference.about');
                //        return view('frontend.pages.about');
            }));
            #Response for speaker_list
            Route::get('/speaker_list', array('as' => 'speaker_list', function () {
                return view('frontend.pages.speakers');
            }));
            Route::get('/session_list', array('as' => 'session_list', function () {
                return view('frontend.pages.sessions');
            }));
        });*/
    });
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


# ======================================================================================================================
# ======================================================================================================================
# ======================================================================================================================
# ======================================================================================================================
# ======================================================================================================================


# ======================================================================================================================
# ================                       ===============================================================================
# ================     Authenticate      ===============================================================================
# ================                       ===============================================================================
# ======================================================================================================================

# Routes for authentications
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

# ======================================================================================================================
# ======================================================================================================================
# ======================================================================================================================
# ======================================================================================================================
# ======================================================================================================================





/*Route::get('/backend', array('as' => 'login', function () {
    return view('backend.pages.login');
}));*/

//Route::get('/backend/home', array('as' => 'home', 'uses' => 'BackendController@showhome'));

Route::post('/store', 'Cnf_sessionController@store');

Route::get('/data', 'Cnf_sessionController@data');
Route::post('/data', 'Cnf_sessionController@data');

/*Route::get('/backend/settings', function () {
    return view('backend.pages.settings');
});*/








//Routes for sessions
/*Route::group(array('prefix' => 'backend/'), function () {
    Route::get('schedule/sessions/', array('as' => 'sessions', 'uses' => 'SessionController@show_sessions'));
    Route::post('schedule/sessions/store', 'SessionController@store');
    Route::post('schedule/sessions/delete', 'SessionController@delete');
    Route::get('schedule/sessions/speakers', 'SessionController@speakers');
    Route::get('schedule/sessions/session_list', 'SessionController@session_list');
    Route::get('schedule/sessions/speaker_list', 'SessionController@speaker_list');
});*/
//--------------------



//Routes for speakers
/*Route::group(array('prefix' => 'backend/'), function () {

    //Dashboard section
    Route::get('schedule/dashboard/', array('as' => 'cnf_dashboard', 'uses' => 'Cnf_moduleController@show_dashboard'));

    Route::get('schedule/speakers/', array('as' => 'speakers', 'uses' => 'SpeakerController@show_speakers'));
    Route::get('schedule/speakers/speaker_list', 'SpeakerController@speaker_list');
    Route::post('schedule/speakers/store', 'SpeakerController@store');
    Route::post('schedule/speakers/delete', 'SpeakerController@delete');
});*/
//--------------------



//Routes for settings
/*Route::group(array('prefix' => 'backend/'), function () {
    Route::get('schedule/settings/', array('as' => 'settings', 'uses' => 'SettingController@show'));
    Route::post('schedule/settings/store', 'SettingController@store');
    Route::post('schedule/settings/data', 'SettingController@data');
    //Route::get('schedule/settings/data', 'SettingController@data');
});*/
//-------------------




//Routes for settings

# ======================================================================================================================
# ================                       ===============================================================================
# ================     Backend Routes    ===============================================================================
# ================                       ===============================================================================
# ======================================================================================================================
Route::group(array('prefix' => 'backend/'), function () {

    //Routes for admin
    Route::get('', array('as' => 'login', function () {
        return view('backend.pages.login');
    }));
    Route::get('home', array('as' => 'home', 'uses' => 'BackendController@showhome'));
    Route::get('settings', function () {
        return view('backend.pages.settings');
    });


    //Routes for modules
    Route::group(array('prefix' => 'modules/'), function () {


        //Routes for Conference module
        Route::group(array('prefix' => 'conference/'), function () {
            //Dashboard section
            Route::get('dashboard/', array('as' => 'cnf_dashboard', 'uses' => 'Cnf_moduleController@show_dashboard'));


            Route::group(array('prefix' => 'sessions'), function () {
                Route::get('/', array('as' => 'sessions', 'uses' => 'Cnf_sessionController@show_sessions'));
                Route::post('/store', 'Cnf_sessionController@store');
                Route::post('/delete', 'Cnf_sessionController@delete');
                Route::get('/speakers', 'Cnf_sessionController@speakers');
                Route::get('/session_list', 'Cnf_sessionController@session_list');
                Route::get('/speaker_list', 'Cnf_sessionController@speaker_list');
            });

            //Speakers section
            Route::group(array('prefix' => 'speakers'), function () {
                Route::get('/', array('as' => 'speakers', 'uses' => 'Cnf_speakerController@show_speakers'));
                Route::get('/speaker_list', 'Cnf_speakerController@speaker_list');
                Route::post('/store', 'Cnf_speakerController@store');
                Route::post('/delete', 'Cnf_speakerController@delete');
            });
            //Settings section
            Route::group(array('prefix' => 'settings'), function () {
                Route::get('/', array('as' => 'settings', 'uses' => 'Cnf_settingController@show'));
                Route::post('/store', 'Cnf_settingController@store');
                Route::post('/data', 'Cnf_settingController@data');
            });
        });


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
            //Catalogue section
            Route::group(array('prefix' => 'orders'), function () {
                Route::get('/', array('as' => 'prc_orders', 'uses' => 'Prc_orderController@show_orders'));
                Route::get('/order_list', array('as' => 'prc_order_list', 'uses' => 'Prc_orderController@order_list'));
                Route::get('/make', array('as' => 'prc_ordering', 'uses' => 'Prc_orderController@make_orders'));
                Route::post('/store', 'Prc_orderController@store');
                Route::post('/delete', 'Prc_orderController@delete');
                Route::get('/order_stats', 'Prc_moduleController@order_stats');
            });
        });

        //Routes for Catering module
        Route::group(array('prefix' => 'catering/'), function () {
            //Dashboard section
            Route::get('dashboard/', array('as' => 'ctr_dashboard', 'uses' => 'Ctr_moduleController@show_dashboard'));
            Route::get('catering_stats/', array('as' => 'ct_dashboard', 'uses' => 'Ctr_moduleController@catering_stats'));

            //Product section
            Route::group(array('prefix' => 'products'), function () {
                // Product creation section
                Route::get('/manage', array('as' => 'ctr_product_create', 'uses' => 'Ctr_productController@product_create'));
                Route::post('/store_product', 'Ctr_productController@store_product');
                //Product overview section
                Route::get('/show', array('as' => 'ctr_products', 'uses' => 'Ctr_productController@show_products'));
                Route::get('/product_list', array('as' => 'ctr_product_list', 'uses' => 'Ctr_productController@product_list'));
                // Product management section
                Route::get('/{id}/manage', array('as' => 'ctr_product_manage', 'uses' => 'Ctr_productController@product_manage'));
                Route::get('/{id}/show', array('as' => 'ctr_product_show', 'uses' => 'Ctr_productController@product_show'));
                Route::post('/delete', 'Ctr_productController@delete');
                Route::get('/category_list', 'Ctr_productController@category_list');
                // Product quantity section
                Route::post('/store_quantity', 'Ctr_productController@store_quantity');
                Route::post('/delete_quantity', 'Ctr_productController@delete_quantity');
                Route::get('/{id}/quantity_list', 'Ctr_productController@quantity_list');
                Route::get('/{id}/product_quantity_list', array('as' => 'ctr_product_quantity_list', 'uses' => 'Ctr_productController@product_quantity_list'));

                // Product group section
                Route::post('/store_group', 'Ctr_productController@store_group');
                Route::get('/{id}/group_list', 'Ctr_productController@group_list');
                Route::get('/{id}/product_group_list', 'Ctr_productController@product_group_list');
                // Product ingredient section
                Route::post('/store_ingredient', 'Ctr_productController@store_ingredient');
                Route::get('/{id}/ingredient_list', 'Ctr_productController@ingredient_list');
                Route::get('/{id}/product_ingredient_list', 'Ctr_productController@product_ingredient_list');
            });

            //Category section
            Route::group(array('prefix' => 'categories'), function () {
                Route::get('/', array('as' => 'ct_categories', 'uses' => 'Ct_categoryController@show_categories'));
                Route::get('/category_list', 'Ct_categoryController@category_list');
                Route::get('/{category_id}/category_parent_field', 'Ct_categoryController@category_parent_field');
                Route::post('/store', 'Ct_categoryController@store');
                Route::post('/delete', 'Ct_categoryController@delete');
                Route::get('/category_stats', 'Ct_moduleController@category_stats');
            });
            //Quantity section
            Route::group(array('prefix' => 'quantities'), function () {
                Route::get('/', array('as' => 'ctr_quantities', 'uses' => 'Ctr_quantityController@show_quantities'));
                Route::get('/category_list', 'Ctr_quantityController@category_list');
                Route::get('/quantity_list', 'Ctr_quantityController@quantity_list');
                Route::get('/{quantity_id}/quantity_parent_field', 'Ctr_quantityController@quantity_parent_field');
                Route::post('/store', 'Ctr_quantityController@store');
                Route::post('/delete', 'Ctr_quantityController@delete');
                Route::get('/quantity_stats', 'Ct_moduleController@quantity_stats');
            });
            //Group section
            Route::group(array('prefix' => 'groups'), function () {
                Route::get('/', array('as' => 'ctr_groups', 'uses' => 'Ctr_groupController@show_groups'));
                Route::get('/category_list', 'Ctr_groupController@category_list');
                Route::get('/group_list', 'Ctr_groupController@group_list');
                Route::get('/{group_id}/group_parent_field', 'Ctr_groupController@group_parent_field');
                Route::post('/store', 'Ctr_groupController@store');
                Route::post('/delete', 'Ctr_groupController@delete');
                Route::get('/group_stats', 'Ct_moduleController@group_stats');
            });
            //Ingredient section
            Route::group(array('prefix' => 'ingredients'), function () {
                Route::get('/', array('as' => 'ctr_ingredients', 'uses' => 'Ctr_ingredientController@show_ingredients'));
                Route::get('/group_list', 'Ctr_ingredientController@group_list');
                Route::get('/ingredient_list', 'Ctr_ingredientController@ingredient_list');
                Route::get('/{ingredient_id}/ingredient_parent_field', 'Ctr_ingredientController@ingredient_parent_field');
                Route::post('/store', 'Ctr_ingredientController@store');
                Route::post('/delete', 'Ctr_ingredientController@delete');
                Route::get('/ingredient_stats', 'Ct_moduleController@ingredient_stats');
            });
        });

    });




    //Product
    Route::get('modules/catering/products/product_stats', 'Ct_moduleController@product_stats');
//    Route::get('modules/catering/product/{id}/manage', array('as' => 'ct_product_manage', 'uses' => 'Ct_productController@product_manage'));
//    Route::get('modules/catering/product/{id}/show', array('as' => 'ct_product_show', 'uses' => 'Ct_productController@product_show'));
//    Route::post('modules/catering/product/delete', 'Ct_productController@delete');


    //Product block lists
    Route::get('modules/catering/product/{id}/inquantity_list', array('as' => 'ct_inquantity_list', 'uses' => 'Ct_inquantityController@inquantity_list'));
    Route::get('modules/catering/product/{id}/ingroup_list', array('as' => 'ct_ingroup_list', 'uses' => 'Ct_ingroupController@ingroup_list'));
//    Route::get('modules/catering/product/{id}/quantity_list', array('as' => 'ct_quantity_list', 'uses' => 'Ct_quantityController@quantity_list'));
    Route::get('modules/catering/product/{id}/ingredient_list', array('as' => 'ct_ingredient_list', 'uses' => 'Ct_ingredientController@ingredient_list'));
    //-------------------


//    Route::get('modules/catering/product/manage', array('as' => 'ct_product_create', 'uses' => 'Ct_productController@product_manage'));
   // Ct_product
//    Route::get('modules/catering/product/manage', array('as' => 'ct_product_create', 'uses' => 'Ct_productController@product_create'));
//    Route::get('modules/catering/products/show', array('as' => 'ct_products', 'uses' => 'Ct_productController@show_products'));
//    Route::get('modules/catering/products/product_list', array('as' => 'ct_product_list', 'uses' => 'Ct_productController@product_list'));


    //Product block store
//    Route::post('modules/catering/products/store_product', 'Ct_productController@store_product');
    Route::post('modules/catering/products/store_ingroup', 'Ct_ingroupController@store');
    Route::post('modules/catering/products/store_inquantity', 'Ct_inquantityController@store');
//    Route::post('modules/catering/products/store_ingredient', 'Ct_ingredientController@store');
//    Route::post('modules/catering/products/store_quantity', 'Ct_quantityController@store');


    //Product block delete
    Route::post('modules/catering/products/delete_ingroup', 'Ct_ingroupController@delete');
    Route::post('modules/catering/products/delete_inquantity', 'Ct_inquantityController@delete');
//    Route::post('modules/catering/products/delete_quantity', 'Ct_quantityController@delete');
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