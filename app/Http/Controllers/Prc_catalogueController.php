<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

// Viveed;
use Input;
use Request;
use Sentinel;
use App\Prc_catalogue;

class Prc_catalogueController extends Controller
{
    public function store()
    {
        // Getting all post data
        if (Request::ajax()) {
            $data = Input::all();

            $parent_category_id = Input::get('category_parent');
            if (empty($parent_category_id)){
                $parent_category_id = Null;
            }

            if(Input::has('category_action_id')){
                // find the bear
                $category = Ct_category::find(Input::get('category_action_id'));
                // change the attribute
                $category->title = Input::get('category_title');

//                $category->parent = Input::get('category_parent');
                $category->parent = $parent_category_id;

                $category->description = Input::get('category_description');
                $category->status = Input::get('category_status');
                $category->state = Input::get('category_state');

                // save to our database
                $category->save();
                return Input::get('category_action_id');
            } else {
                $category = Ct_category::firstOrCreate(array(
                    'title'	        => Input::get('category_title'),
                    'parent'	    => Input::get('category_parent'),
                    'description'	=> Input::get('category_description'),
                    'status'	    => Input::get('category_status'),
                    'state'	        => Input::get('category_state'),
                ));
                $last_inserted_id = $category->id;
                return $last_inserted_id;
            }
        }
    }

    public function show_catalogues()
    {
        if (Sentinel::check()) {
            // Getting all table data
            $userRoles = Sentinel::getRoles()->lists('name', 'id')->all();
            $catalogues = Prc_catalogue::Select('*')->get();
            return View('backend.pages.modules.pricing.catalogues', compact('userRoles', 'catalogues'));
        } else {
            return Redirect::to('backend/');
        }

    }

    public function category_list()
    {
        // Getting all table data
        $categories = Ct_category::select('*')->orderBy('id', 'ASC')->get();
        $userRoles = Sentinel::getRoles()->lists('name', 'id')->all();
        return View('backend.partials.modules.catering.category_list', compact('userRoles', 'categories'));
    }

    public function delete()
    {
        if (Request::ajax()) {
            $data = Input::all();
            if(Input::has('ct_category_action_id')) {
                Ct_category::destroy(Input::get('ct_category_action_id'));
                return Input::get('ct_category_action_id');
            }
        }
    }
}
