<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

// Viveed
use App\Ct_ingroup;
use Request;
use Input;
use Sentinel;



class Ct_ingroupController extends Controller
{
    public function store()
    {
        // Getting all post data
        if (Request::ajax()) {
            $data = Input::all();

            if(Input::has('ingroup_action_id')){
                // find the bear
                $ingroup = Ct_ingroup::find(Input::get('ingroup_action_id'));
                // change the attribute
                $ingroup->product       = Input::get('product_action_id');
                $ingroup->title         = Input::get('ingroup_title');
                $ingroup->selection     = Input::get('ingroup_selection');
                $ingroup->status        = Input::get('ingroup_status');
                $ingroup->state         = Input::get('ingroup_state');

                // save to our database
                $ingroup->save();
                return Input::get('ingroup_action_id');
            } else {
                $ingroup = Ct_ingroup::firstOrCreate(array(
                    'product'	    => Input::get('product_action_id'),
                    'title'	        => Input::get('ingroup_title'),
                    'selection'	    => Input::get('ingroup_selection'),
                    'status'	    => Input::get('ingroup_status'),
                    'state'	        => Input::get('ingroup_state'),
                ));
                $last_inserted_id = $ingroup->id;
                return $last_inserted_id;
            }
        }
    }

    public function delete()
    {
        if (Request::ajax()) {
            $data = Input::all();
            if(Input::has('ingroup_action_id')) {
                Ct_ingroup::destroy(Input::get('ingroup_action_id'));
                return Input::get('ingroup_action_id');
            }
        }
    }

    public function ingroup_list($product_id)
    {
        // Getting all table data
        $ingroups = Ct_ingroup::where('product', '=', $product_id)->orderBy('id', 'ASC')->get();
        $userRoles = Sentinel::getRoles()->lists('name', 'id')->all();
        return View('backend.partials.modules.catering.ingroup_list', compact('userRoles', 'ingroups'));
    }
}
