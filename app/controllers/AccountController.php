<?php

class AccountController extends \BaseController {


    // login form checkin function
	public function checkAccount() {
        $credentials = ['username'=> Input::get('username'), 'password'=> Input::get('password')];
        $rememberMe = Input::get('remember_me') ? 'true' : 'false';
         $user = Auth::attempt($credentials, $rememberMe);
        return Redirect::back();
    }


    public function getDashBoard () {

       return View::make('admin.layouts.home');
    }

    // logout btn
    public function logOut() {
        Auth::logout();
        return Redirect::back();
    }
}