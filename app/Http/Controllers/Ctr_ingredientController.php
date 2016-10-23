<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

// Viveed
use Input;
use Request;
use Sentinel;
use App\Ct_category;
use App\Ctr_ingredient;
use App\Ctr_group;

class Ctr_ingredientController extends Controller
{
    public function store()
    {
        // Getting all post data
        if (Request::ajax()) {
            $data = Input::all();

            if(Input::has('ingredient_action_id')){
                $ingredient = Ctr_ingredient::find(Input::get('ingredient_action_id'));

                $ingredient->title = Input::get('ingredient_title');
                $ingredient->description = Input::get('ingredient_description');
                $ingredient->selection = Input::get('ingredient_selection');
                $ingredient->status = Input::get('ingredient_status');
                $ingredient->state = Input::get('ingredient_state');

                // save to our database
                $ingredient->save();

                $ingredient->ctr_groups()->detach();
                $ingredient->ctr_groups()->attach(Input::get('ingredient_groups'));

                return Input::get('ingredient_action_id');
            } else {
                $ingredient = Ctr_ingredient::firstOrCreate(array(
                    'title'	        => Input::get('ingredient_title'),
                    'description'	=> Input::get('ingredient_description'),
                    'selection'	    => Input::get('ingredient_selection'),
                    'status'	    => Input::get('ingredient_status'),
                    'state'	        => Input::get('ingredient_state'),
                ));

                $ingredient->ctr_groups()->attach(Input::get('ingredient_groups'));

                $last_inserted_id = $ingredient->id;
                return $last_inserted_id;
            }
        }
    }

    public function delete()
    {
        if (Request::ajax()) {
            $data = Input::all();
            if(Input::has('ingredient_action_id')) {
                Ctr_ingredient::destroy(Input::get('ingredient_action_id'));
                return Input::get('ingredient_action_id');
            }
        }
    }

    public function show_ingredients()
    {
        if (Sentinel::check()) {
            // Getting all table data
            $userRoles = Sentinel::getRoles()->lists('name', 'id')->all();
            $ingredients = Ctr_ingredient::Select('*')->get();
            return View('backend.pages.modules.catering.ingredients', compact('userRoles', 'ingredients'));
        } else {
            return Redirect::to('backend/');
        }

    }

    public function ingredient_list()
    {
        // Getting all table data
        $source_type = "collection";
        $target_selection = "single";
        $ingredients = Ctr_ingredient::select('*')->orderBy('id', 'ASC')->get();
        return View('backend.partials.modules.catering.lists.ingredient_list', compact('ingredients', 'source_type', 'target_selection'));
    }

    public function group_list()
    {
        $source_type = "collection";
        $category_selection = "single";
//        $groups = Ctr_group::select('*')->get();
        $categories = Ct_category::select('*')->get();
        return View('backend.partials.modules.catering.fields.group_field', compact('categories', 'source_type', 'category_selection'));

    }
}
