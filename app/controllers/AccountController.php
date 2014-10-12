<?php

class AccountController extends \BaseController {



    public function getSignUp() {
        return View::make('site.auth.signup');
    }

    public function postSignUp () {
        return 'this is from inside post sign up';
    }

    public function getForgotPassword() {
        return View::make('site.auth.forgot');
    }

    public function postForgotPassword() {
        return 'post forget passw';
    }

    public function getResetPassword() {
        return 'get reset pass';
    }

    public function postResetPassword() {
        return 'post reset password';
    }


    // login form checkin function
	public function postSignIn() {
        $credentials = ['username'=> Input::get('username'), 'password'=> Input::get('password')];
        $rememberMe = Input::get('remember_me') ? 'true' : 'false';
         $user = Auth::attempt($credentials, $rememberMe);
        return Redirect::back();
    }



    // logout btn
    public function logOut() {
        Auth::logout();
        return Redirect::home();
    }
}