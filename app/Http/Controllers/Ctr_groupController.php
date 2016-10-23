<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

// Viveed
use Input;
use Request;
use Sentinel;
use App\Ctr_group;
use App\Ct_category;

class Ctr_groupController extends Controller
{
    public function store()
    {
        // Getting all post data
        if (Request::ajax()) {
            $data = Input::all();

            if(Input::has('group_action_id')){
                $group = Ctr_group::find(Input::get('group_action_id'));

                $group->title = Input::get('group_title');
                $group->description = Input::get('group_description');
                $group->selection = Input::get('group_selection');
                $group->status = Input::get('group_status');
                $group->state = Input::get('group_state');

                // save to our database
                $group->save();

                $group->ct_categories()->detach();
                $group->ct_categories()->attach(Input::get('group_categories'));

                return Input::get('group_action_id');
            } else {
                $group = Ctr_group::firstOrCreate(array(
                    'title'	        => Input::get('group_title'),
                    'description'	=> Input::get('group_description'),
                    'selection'	    => Input::get('group_selection'),
                    'status'	    => Input::get('group_status'),
                    'state'	        => Input::get('group_state'),
                ));

                $group->ct_categories()->attach(Input::get('group_categories'));

                $last_inserted_id = $group->id;
                return $last_inserted_id;
            }
        }
    }

    public function delete()
    {
        if (Request::ajax()) {
            $data = Input::all();
            if(Input::has('group_action_id')) {
                Ctr_group::destroy(Input::get('group_action_id'));
                return Input::get('group_action_id');
            }
        }
    }

    public function show_groups()
    {
        if (Sentinel::check()) {
            // Getting all table data
            $userRoles = Sentinel::getRoles()->lists('name', 'id')->all();
            $groups = Ctr_group::Select('*')->get();
            return View('backend.pages.modules.catering.groups', compact('userRoles', 'groups'));
        } else {
            return Redirect::to('backend/');
        }

    }

    public function group_list()
    {
        // Getting all table data
        $groups = Ctr_group::select('*')->orderBy('id', 'ASC')->get();
        return View('backend.partials.modules.catering.lists.group_list', compact('groups'));
    }

    public function category_list()
    {
        $categories = Ct_category::select('*')->get();
        return View('backend.partials.modules.catering.fields.category_field', compact('categories'));

    }
}
