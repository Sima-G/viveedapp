<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

// Viveed;
use Input;
use Request;
use Sentinel;
use Redirect;
use App\Ctr_product;
use App\Ct_category;
use App\Ctr_quantity;
use App\Ctr_group;
use App\Ctr_ingredient;

class Ctr_productController extends Controller
{
    public function product_manage($product_id)
    {
        if (Sentinel::check()) {

            $userRoles = Sentinel::getRoles()->lists('name', 'id')->all();
//            $product = Ctr_product::find($product_id);
//            $product = Ctr_product::find($product_id)->with('ctr_groups')->get();
//            $product = Ctr_product::find($product_id)->ctr_groups()->first();
            $product = Ctr_product::find($product_id)->with('ctr_quantities')->with('ctr_groups')->with('ctr_ingredients')->first();


            if ( ! empty($product_id)){
                $product_action = "edit";
            } else {
                $product_action = "create";
            }

            return View('backend.pages.modules.catering.product_manage', compact('userRoles', 'product_action', 'product'));

        } else {

            return Redirect::to('backend/');

        }

    }

    /*public function ct_productManage($product_id) {

        if ( ! empty($product_id)){
            $product_action = "manage";
        } else {
            $product_action = "create";
        }

        return View('backend.pages.modules.catering.product_manage', compact('userRoles', 'product_action'));
    }*/

    /*public function product_show($product_id)
    {
        if (Sentinel::check()) {

            $userRoles = Sentinel::getRoles()->lists('name', 'id')->all();
            $product = Ctr_product::find($product_id);
            $product_action = 2;

            return View('backend.pages.modules.catering.product_manage', compact('userRoles', 'product_action', 'product'));

        } else {

            return Redirect::to('backend/');

        }

    }*/

    /*public function product_show_block($product_id)
    {

        $product = Ctr_product::find($product_id);

        $product_action = 2;

        return View('backend.pages.modules.catering.product_manage', compact('product_action', 'product_view'));

    }*/



    public function product_create()
    {
        if (Sentinel::check()) {
            $userRoles = Sentinel::getRoles()->lists('name', 'id')->all();
            $product_action = "create";
            $category_selection = "single";
            $categories = Ct_category::select('*')->get();
            return View('backend.pages.modules.catering.product_manage', compact('userRoles', 'product_action', 'categories', 'category_selection'));
        } else {
            return Redirect::to('backend/');
        }
    }



    public function store_product()
    {

        if (Request::ajax()) {
            $data = Input::all();
            if(Input::has('product_action_id')){

                $product = Ctr_product::find(Input::get('product_action_id'));

                $product->title = Input::get('product_title');
                $product->description = Input::get('product_description');
                $product->category = Input::get('product_category');
                $product->status = Input::get('product_status');
                $product->state = Input::get('product_state');

                $product->save();

                return Input::get('product_action_id');

            } else {
                $product = Ctr_product::firstOrCreate(array(
                    'title'	        => Input::get('product_title'),
                    'description'	=> Input::get('product_description'),
                    'category'	    => Input::get('product_category'),
                    'status'	    => Input::get('product_status'),
                    'state'	        => Input::get('product_state'),
                ));
                $last_inserted_id = $product->id;
                return $last_inserted_id;
            }
        }
    }

    public function store_quantity()
    {
        // Getting all post data
        if (Request::ajax()) {
            $data = Input::all();

            if(Input::has('quantity_action_id')){
                $product = Ctr_product::find(Input::get('product_action_id'));

//                User::find(1)->roles()->updateExistingPivot($roleId, $attributes);



                $quantity_action_id = Input::get('quantity_action_id');
                $quantity_id = Input::get('quantity_id');
                $quantity = Input::get('quantity_quantity');
                $status = Input::get('quantity_status');
                $state = Input::get('quantity_state');

                Ctr_product::find(Input::get('product_action_id'))->ctr_quantities()->wherePivot('id', $quantity_action_id)->updateExistingPivot($quantity_id, ['quantity'=>$quantity, 'status'=>$status, 'state'=>$state], false);
//
//
//                $product->quantity = Input::get('quantity_quantity');
//                $product->status = Input::get('quantity_status');
//                $product->state = Input::get('quantity_state');
//
//                $product->save();
//
//                $product->ctr_quantities()->wherePivot('id', $quantity_action_id)->detach();
//                $product->ctr_quantities()->attach([$quantity_id =>['quantity'=>$quantity, 'status'=>$status, 'state'=>$state]]);

            } else {
                $product = Ctr_product::find(Input::get('product_action_id'));
                $quantity_id = Input::get('quantity_id');
                $quantity = Input::get('quantity_quantity');
                $status = Input::get('quantity_status');
                $state = Input::get('quantity_state');

                $product->ctr_quantities()->attach([$quantity_id =>['quantity'=>$quantity, 'status'=>$status, 'state'=>$state]]);

            }
        }
    }

    public function store_group()
    {
        // Getting all post data
        if (Request::ajax()) {
            $data = Input::all();

            $product = Ctr_product::find(Input::get('product_action_id'));
            $group_id = Input::get('ingroup_id');
            $status = Input::get('ingroup_status');
            $state = Input::get('ingroup_state');

            if(Input::has('product_action_id')){
                $product->ctr_groups()->detach();
            }

                $product->ctr_groups()->attach([$group_id =>['status'=>$status, 'state'=>$state]]);
        }
    }

    public function store_ingredient()
    {
        // Getting all post data
        if (Request::ajax()) {
            $data = Input::all();

            $product = Ctr_product::find(Input::get('product_action_id'));
            $ingredient_id = Input::get('ingredient_title');
            $ingredient_description = Input::get('ingredient_description');
            $ingredient_quantity = Input::get('ingredient_quantity');
            $status = Input::get('ingredient_status');
            $state = Input::get('ingredient_state');

            /*if(Input::has('product_action_id')){
                $product->ctr_ingredients()->detach();
            }*/

            $product->ctr_ingredients()->attach([$ingredient_id =>['description'=>$ingredient_description, 'quantity'=>$ingredient_quantity, 'status'=>$status, 'state'=>$state]]);
        }
    }

    public function delete_quantity(){
        $quantity_action_id = Input::get('quantity_action_id');
        Ctr_product::find(Input::get('product_action_id'))->ctr_quantities()->wherePivot('id', $quantity_action_id)->detach();
//        Ctr_product::find(2)->ctr_quantities()->wherePivot('id', 12)->detach();
    }

    public function product_quantity_list($product_id)
    {
        // Getting all table data
        $products = Ctr_product::find($product_id)->with('ctr_quantities')->get();
        return View('backend.partials.modules.catering.lists.product_quantity_list', compact('products'));
    }

    public function product_group_list($product_id)
    {
        // Getting all table data
        $products = Ctr_product::find($product_id)->with('ctr_groups')->get();
        return View('backend.partials.modules.catering.lists.product_group_list', compact('products'));
    }

    public function product_ingredient_list($product_id)
    {
        // Getting all table data
        $products = Ctr_product::find($product_id)->with('ctr_ingredients')->get();
        return View('backend.partials.modules.catering.lists.product_ingredient_list', compact('products'));
    }




    public function category_list()
    {
        $target_selection = "single";
        $categories = Ct_category::select('*')->get();
        return View('backend.partials.modules.catering.fields.category_field', compact('categories', 'target_selection'));
    }

    public function quantity_list($category_id)
    {
        $source_type = "collection";
        $target_selection = "single";
        $categories = Ct_category::where('id', '=', $category_id)->with('ctr_quantities')->with('ctr_groups')->get();
        return View('backend.partials.modules.catering.fields.quantity_field', compact('categories', 'source_type', 'target_selection'));
    }

    public function group_list($category_id)
    {
        $source_type = "collection";
        $target_selection = "single";
        $categories = Ct_category::where('id', '=', $category_id)->with('ctr_quantities')->with('ctr_groups')->get();
        return View('backend.partials.modules.catering.fields.group_field', compact('categories', 'source_type', 'target_selection'));
    }

    public function ingredient_list($group_id)
    {
        $source_type = "collection";
        $target_selection = "single";
        $groups = Ctr_group::where('id', '=', $group_id)->with('ctr_ingredients')->get();
        return View('backend.partials.modules.catering.fields.ingredient_field', compact('groups', 'source_type', 'target_selection'));
    }


    public function product_list (){

        $products = Ctr_product::select('*')->get();
        return View('backend.partials.modules.catering.product_list', compact('products'));

    }

    public function show_products()
    {
        if (Sentinel::check()) {

            $userRoles = Sentinel::getRoles()->lists('name', 'id')->all();
            return View('backend.pages.modules.catering.products', compact('userRoles'));
        } else {
            return Redirect::to('backend/');
        }

    }

    /*public function delete()
    {
        if (Request::ajax()) {
            $data = Input::all();
            if(Input::has('product_id')) {
                Ctr_product::destroy(Input::get('product_id'));
                return Input::get('product_id');
            }
        }
    }*/
}
