<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

// Viveed;
use Input;
use Request;
use Sentinel;
use App\Ct_product;

class Ct_productController extends Controller
{

    public function product_manage($product_id)
    {
        if (Sentinel::check()) {
            // Getting all table data
            $userRoles = Sentinel::getRoles()->lists('name', 'id')->all();
            $product = Ct_product::find($product_id);

            if ( ! empty($product_id)){
                $product_action = "edit";
            } else {
                $product_action = "create";
            }

//            $product_action = 3;
            return View('backend.pages.modules.catering.product_manage', compact('userRoles', 'product_action', 'product'));
        } else {
            return Redirect::to('backend/');
        }

    }

    public function ct_productManage($product_id) {
        if ( ! empty($product_id)){
            $product_action = "manage";
        } else {
            $product_action = "create";
        }

//            $product_action = 3;
        return View('backend.pages.modules.catering.product_manage', compact('userRoles', 'product_action'));
    }

    public function product_show($product_id)
    {
        if (Sentinel::check()) {
            // Getting all table data
            $userRoles = Sentinel::getRoles()->lists('name', 'id')->all();
            $product = Ct_product::find($product_id);
            $product_action = 2;
            return View('backend.pages.modules.catering.product_manage', compact('userRoles', 'product_action', 'product'));
        } else {
            return Redirect::to('backend/');
        }

    }

    public function product_show_block($product_id)
    {
            $product = Ct_product::find($product_id);
            $product_action = 2;
            return View('backend.pages.modules.catering.product_manage', compact('product_action', 'product_view'));
    }

    public function product_create()
    {
        if (Sentinel::check()) {
            // Getting all table data
            $userRoles = Sentinel::getRoles()->lists('name', 'id')->all();
            $product_action = "create";
            return View('backend.pages.modules.catering.product_manage', compact('userRoles', 'product_action'));
        } else {
            return Redirect::to('backend/');
        }

    }

    public function store_product()
    {
        // Getting all post data
        if (Request::ajax()) {
            $data = Input::all();
            if(Input::has('product_action_id')){
                // find the bear
                $product = Ct_product::find(Input::get('product_action_id'));
                // change the attribute
                $product->title = Input::get('product_title');
                $product->description = Input::get('product_description');
//                $product->unit = Input::get('product_unit');
//                $product->quantity = Input::get('product_quantity');
                $product->status = Input::get('product_status');
                $product->state = Input::get('product_state');

                // save to our database
                $product->save();
                return Input::get('product_action_id');
            } else {
                $product = Ct_product::firstOrCreate(array(
                    'title'	        => Input::get('product_title'),
                    'description'	=> Input::get('product_description'),
//                    'unit'	        => Input::get('product_unit'),
//                    'quantity'	    => Input::get('product_quantity'),
                    'status'	    => Input::get('product_status'),
                    'state'	        => Input::get('product_state'),
                ));
                $last_inserted_id = $product->id;
                return $last_inserted_id;
            }
        }
    }

    public function product_list (){

        $products = Ct_product::select('*')->get();
        return View('backend.partials.modules.catering.product_list', compact('products'));

    }

    public function show_products()
    {
        if (Sentinel::check()) {
            // Getting all table data
            $userRoles = Sentinel::getRoles()->lists('name', 'id')->all();
            return View('backend.pages.modules.catering.products', compact('userRoles'));
        } else {
            return Redirect::to('backend/');
        }

    }

    public function delete()
    {
        if (Request::ajax()) {
            $data = Input::all();
            if(Input::has('product_id')) {
                Ct_product::destroy(Input::get('product_id'));
                return Input::get('product_id');
            }
        }
    }

}
