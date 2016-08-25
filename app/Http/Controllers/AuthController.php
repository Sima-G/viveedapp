<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//Viveed
//use Illuminate\Support\Facades\Redirect;
use Sentinel;
use Redirect;
use Validator;
use Input;
use Lang;

class AuthController extends Controller
{
    public function getSignin()
    {
        // Is the user logged in?
        if (Sentinel::check()) {
            return Redirect::route('home');
        }

        // Show the page
        return View('backend.pages.home');
    }
    public function postSignin()
    {
        // Declare the rules for the form validation
        $rules = array(
            'email'    => 'required|email',
            'password' => 'required|between:3,32',
        );

        // Create a new validator instance from our validation rules
        $validator = Validator::make(Input::all(), $rules);

        // If validation fails, we'll exit the operation now.
        if ($validator->fails()) {
            // Ooops.. something went wrong
            return back()->withInput()->withErrors($validator);
        }

        try {
            // Try to log the user in
            if(Sentinel::authenticate(Input::only('email', 'password'), Input::get('remember-me', false)))
            {
                $uid = Sentinel::getUser()->id;

                // Redirect to the dashboard page
                return Redirect::route('home')->with('success', Lang::get('auth/message.signin.success'));
            }

//            $this->messageBag->add('email', Lang::get('auth/message.account_not_found'));

        } catch (NotActivatedException $e) {
            $this->messageBag->add('email', Lang::get('auth/message.account_not_activated'));
        } catch (ThrottlingException $e) {
            $delay = $e->getDelay();
            $this->messageBag->add('email', Lang::get('auth/message.account_suspended', compact('delay' )));
        }

        // Ooops.. something went wrong
//        return back()->withInput()->withErrors($this->messageBag);
    }

    public function getLogout()
    {
        // Log the user out
        Sentinel::logout();

        // Redirect to the users page
        return Redirect::to('backend/')->with('success', 'Αποσυνδεθήκατε με επιτυχία!');
    }

}
