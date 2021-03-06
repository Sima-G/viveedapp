<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

// Viveed;
use Input;
use Request;
use Sentinel;
use App\Ctr_product;
use App\Prc_catalogue;
use App\Prc_product;

class Prc_productController extends Controller
{
    public function product_manage($product_id)
    {
        if (Sentinel::check()) {
            // Getting all table data
            $userRoles = Sentinel::getRoles()->lists('name', 'id')->all();
//            $master_product = Ctr_product::where('id', '=', $product_id)->with('ctr_categories')->with('ctr_quantities')->with('prc_products')->first();
            $master_product = Ctr_product::where('id', '=', $product_id)->with('ctr_categories')->with('ctr_quantities')->with('prc_catalogues')->first();
//            $data = Ctr_product::select('*')->with('ctr_categories')->with('ctr_quantities')->with('prc_catalogues')->get();
            $catalogues = Prc_catalogue::select('*')->get();
            $prices = Prc_product::where('product', '=', $product_id)->get();

            return View('backend.pages.modules.pricing.product_manage', compact('userRoles', 'master_product', 'catalogues', 'prices'));
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

//                $product->product       =       Input::get('product_action_id');
//                $product->quantity      =       Input::get('product_quantity_id');
//                $product->catalogue     =       Input::get('product_catalogue_id');
                $product->price         =       Input::get('product_price');
                $product->discount      =       Input::get('product_discount');
                $product->init          =       Input::get('product_init');
                $product->status        =       Input::get('product_status');
                $product->state         =       Input::get('product_state');

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
                    'init'                  => Input::get('product_init'),
                    'status'	            => Input::get('product_status'),
                    'state'	                => Input::get('product_state'),
                ));
                $last_inserted_id = $product->id;
                return $last_inserted_id;
            }
        }
    }

    /*public function store()
    {
        // Getting all post data
        if (Request::ajax()) {
            $data = Input::all();

            $product_action       =       Input::get('product_action_id');
            $quantity      =       Input::get('product_quantity_id');
            $catalogue     =       Input::get('product_catalogue_id');
            $price         =       Input::get('product_price');
            $discount      =       Input::get('product_discount');
            $init          =       Input::get('product_init');
            $status        =       Input::get('product_status');
            $state         =       Input::get('product_state');

            $catalogue = 13;

            $product = Ctr_product::find(Input::get('product_action_id'));

            if(Input::has('product_price_id')){
                $product->prc_catalogues()->detach();
            }
                $product->prc_catalogues()->attach([$catalogue =>['product'=>$product_action, 'quantity'=>$quantity, 'price'=>$price, 'discount'=>$discount, 'init'=>$init, 'status'=>$status, 'state'=>$state]]);




        }
    }*/
}
