<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

// Viveed
use Input;
use Request;
use Sentinel;
use App\Ctr_quantity;
use App\Ct_category;

class Ctr_quantityController extends Controller
{

    public function store()
    {
        // Getting all post data
        if (Request::ajax()) {
            $data = Input::all();

            if(Input::has('quantity_action_id')){
                $quantity = Ctr_quantity::find(Input::get('quantity_action_id'));

                $quantity->title = Input::get('quantity_title');
                $quantity->description = Input::get('quantity_description');
                $quantity->decimal = Input::get('quantity_decimal');
                $quantity->status = Input::get('quantity_status');
                $quantity->state = Input::get('quantity_state');

                // save to our database
                $quantity->save();

                $quantity->ct_categories()->detach();
                $quantity->ct_categories()->attach(Input::get('quantity_categories'));

                return Input::get('quantity_action_id');
            } else {
                $quantity = Ctr_quantity::firstOrCreate(array(
                    'title'	        => Input::get('quantity_title'),
                    'description'	=> Input::get('quantity_description'),
                    'decimal'	    => Input::get('quantity_decimal'),
                    'status'	    => Input::get('quantity_status'),
                    'state'	        => Input::get('quantity_state'),
                ));

                $quantity->ct_categories()->attach(Input::get('quantity_categories'));

                $last_inserted_id = $quantity->id;
                return $last_inserted_id;
            }
        }
    }

    public function delete()
    {
        if (Request::ajax()) {
            $data = Input::all();
            if(Input::has('quantity_action_id')) {
                Ctr_quantity::destroy(Input::get('quantity_action_id'));
                return Input::get('quantity_action_id');
            }
        }
    }

    public function show_quantities()
    {
        if (Sentinel::check()) {
            // Getting all table data
            $userRoles = Sentinel::getRoles()->lists('name', 'id')->all();
            $quantities = Ctr_quantity::Select('*')->get();
            return View('backend.pages.modules.catering.quantities', compact('userRoles', 'quantities'));
        } else {
            return Redirect::to('backend/');
        }

    }

    public function quantity_list()
    {
        // Getting all table data
        $quantities = Ctr_quantity::select('*')->orderBy('id', 'ASC')->get();
        return View('backend.partials.modules.catering.lists.quantity_list', compact('quantities'));
    }

    public function category_list()
    {
        $categories = Ct_category::select('*')->get();
        return View('backend.partials.modules.catering.fields.category_field', compact('categories'));

    }
}