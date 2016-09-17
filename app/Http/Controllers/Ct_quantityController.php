<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

// Viveed
use Request;
use Input;
use Sentinel;
use App\Ct_quantity;

class Ct_quantityController extends Controller
{
    public function store()
    {
        // Getting all post data
        if (Request::ajax()) {
            $data = Input::all();

            if(Input::has('quantity_action_id')){
                // find the bear
                $quantity = Ct_quantity::find(Input::get('quantity_action_id'));
                // change the attribute
                $quantity->product = Input::get('product_action_id');
                $quantity->unit = Input::get('quantity_unit');
                $quantity->quantity = Input::get('quantity_quantity');
                $quantity->status = Input::get('quantity_status');
                $quantity->state = Input::get('quantity_state');

                // save to our database
                $quantity->save();
                return Input::get('quantity_action_id');
            } else {
                $category = Ct_quantity::firstOrCreate(array(
                    'product'	    => Input::get('product_action_id'),
                    'unit'	        => Input::get('quantity_unit'),
                    'quantity'	    => Input::get('quantity_quantity'),
                    'status'	    => Input::get('quantity_status'),
                    'state'	        => Input::get('quantity_state'),
                ));
                $last_inserted_id = $category->id;
                return $last_inserted_id;
            }
        }
    }

    public function delete()
    {
        if (Request::ajax()) {
            $data = Input::all();
            if(Input::has('ct_quantity_action_id')) {
                Ct_quantity::destroy(Input::get('ct_quantity_action_id'));
                return Input::get('ct_quantity_action_id');
            }
        }
    }

    public function quantity_list($product_id)
    {
        // Getting all table data
        $quantities = Ct_quantity::where('product', '=', $product_id)->orderBy('id', 'ASC')->get();
        $userRoles = Sentinel::getRoles()->lists('name', 'id')->all();
        return View('backend.partials.modules.catering.quantity_list', compact('userRoles', 'quantities'));
    }
}
