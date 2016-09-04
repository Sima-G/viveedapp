<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

// Viveed
use App\User;
use Sentinel;

class UserController extends Controller
{
    public function userlist(){

        if(Sentinel::check()){
            $userRoles = Sentinel::getRoles()->lists('name', 'id')->all();
            $users = User::Select('*')->get();
            $test = Sentinel::getUserRepository();
            return view('backend.pages.users', compact('users', 'userRoles', 'test'));
        } else {
            return Redirect::to('backend/');
        }
    }
}
