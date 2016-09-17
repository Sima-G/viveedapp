<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

// Viveed
use Request;
use Input;
use Sentinel;
use App\Ct_ingredient;

class Ct_ingredientController extends Controller
{
    public function store()
    {
        // Getting all post data
        if (Request::ajax()) {
            $data = Input::all();

            if(Input::has('ingredient_action_id')){
                // find the bear
                $ingredient = Ct_ingredient::find(Input::get('ingredient_action_id'));
                // change the attribute
                $ingredient->product = Input::get('product_action_id');
                $ingredient->title = Input::get('ingredient_title');
                $ingredient->description = Input::get('ingredient_description');
                $ingredient->unit = Input::get('ingredient_unit');
                $ingredient->quantity = Input::get('ingredient_quantity');
                $ingredient->status = Input::get('ingredient_status');
                $ingredient->state = Input::get('ingredient_state');

                // save to our database
                $ingredient->save();
                return Input::get('quantity_action_id');
            } else {
                $ingredient = Ct_ingredient::firstOrCreate(array(
                    'product'	    => Input::get('product_action_id'),
                    'title'	        => Input::get('ingredient_title'),
                    'description'	=> Input::get('ingredient_description'),
                    'unit'	        => Input::get('ingredient_unit'),
                    'quantity'	    => Input::get('ingredient_quantity'),
                    'status'	    => Input::get('ingredient_status'),
                    'state'	        => Input::get('ingredient_state'),
                ));
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
                Ct_ingredient::destroy(Input::get('ingredient_action_id'));
                return Input::get('ingredient_action_id');
            }
        }
    }

    public function ingredient_list($product_id)
    {
        // Getting all table data
        $ingredients = Ct_ingredient::where('product', '=', $product_id)->orderBy('id', 'ASC')->get();
        $userRoles = Sentinel::getRoles()->lists('name', 'id')->all();
        return View('backend.partials.modules.catering.ingredient_list', compact('userRoles', 'ingredients'));
    }
}
