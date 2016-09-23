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
use App\Prc_catalogue;
use App\Prc_product;

class Prc_productController extends Controller
{
    public function product_manage($product_id)
    {
        if (Sentinel::check()) {
            // Getting all table data
            $userRoles = Sentinel::getRoles()->lists('name', 'id')->all();
//            $master_product = Ct_product::find($product_id);
            $master_product = Ct_product::where('id', '=', $product_id)->with('ct_categories')->with('ct_quantities')->with('prc_products')->first();
//            $slave_product =  Ct_product::where('id', '=', $product_id)->with('ct_categories')->with('ct_quantities')->with('prc_products')->get();
            $catalogues = Prc_catalogue::select('*')->get();

            return View('backend.pages.modules.pricing.product_manage', compact('userRoles', 'master_product', 'catalogues'));
        } else {
            return Redirect::to('backend/');
        }

    }

    public function store()
    {
        // Getting all post data
        if (Request::ajax()) {
            $data = Input::all();

            if(Input::has('product_price_id')){
                // find the bear
                $product = Prc_product::find(Input::get('product_price_id'));
                // change the attribute

                $product->product       =       Input::get('product_action_id');
                $product->quantity      =       Input::get('product_quantity_id');
                $product->catalogue     =       Input::get('product_catalogue_id');
                $product->price         =       Input::get('product_price');
                $product->discount      =       Input::get('product_discount');

                // save to our database
                $product->save();
                return Input::get('product_price_id');
            } else {
                $product = Prc_product::firstOrCreate(array(
                    'product'	            => Input::get('product_action_id'),
                    'quantity'	            => Input::get('product_quantity_id'),
                    'catalogue'             => Input::get('product_catalogue_id'),
                    'price'	                => Input::get('product_price'),
                    'discount'	            => Input::get('product_discount'),
                ));
                $last_inserted_id = $product->id;
                return $last_inserted_id;
            }
        }
    }
}
