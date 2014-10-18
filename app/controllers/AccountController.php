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
        $email = Input::get('email');
        $validator = Validator::make(Input::all(),User::$forgotPasswordRules );
        if($validator->fails()) {
            return Redirect::back()->with('messages','error')->withErrors($validator);
        }
        $user = User::where('email','=',$email);
        $new_password = Str::random($length = 5);
        $user->password = Hash::make($new_password);
        $user->save();
        if($user) {
            $this->successMsg(Lang::get('forgotpassword_success'));
            Mail::queue('emails.forgotpassword',['sender_email'=>$user->email, 'new_password'=> $new_password], function($message) use ($user){
                $message->to('uusa35@gmail.com', 'Test Name from Inside ContactUs Controller')->subject('ForgotPassword | Eman Al-Onaizi Blog');
            });
            return Redirect::back()->with('messages','success');
        }
        $this->successMsg(Lang::get('forgotpassword_error'));
        return Redirect::back()->with('messages','error');
    }

    public function getResetPassword() {

        return View::make('site.auth.reset');
    }

    public function postResetPassword() {
        $validator = Validator::make(Input::all(),User::$resetRules);
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->with('messages','error');
        }
        $user = Auth::user();
        $old_password = Input::get('old_password');
        $new_password = Input::get('new_password');
        /*return 'from db==== : '.$user->getAuthPassword().'<br> form pass : '.Hash::make(Input::get('old_password'));*/

        if(Hash::check($old_password, $user->getAuthPassword())) {
            $user->password = Hash::make($new_password);
            if($user->save()) {
            $this->successMsg(Lang::get('messages.reset_success'));
            return Redirect::back()->with('messages','success');
            }
        }
        $this->errorMsg(Lang::get('messages.reset_error'));
        return Redirect::to('account/reset')->with('messages','error');
    }


    // login form checkin function
	public function postSignIn() {
        $credentials = ['username'=> Input::get('username'), 'password'=> Input::get('password'),'active'=>'1'];
        $validator = Validator::make($credentials,User::$signinRules);
        if($validator->passes()) {
            $rememberMe = Input::get('remember_me') ? 'true' : 'false';
            $user = Auth::attempt($credentials, $rememberMe);
            if($user) {
                $this->successMsg(Lang::get('messages.signin_success'));
                return Redirect::back()->with('messages','success');
            }
        }
        $this->errorMsg(Lang::get('messages.signin_error'));
        return Redirect::back()->with('messages','error')->withErrors($validator);
    }



    // logout btn
    public function logOut() {
        Auth::logout();
        return Redirect::home();
    }
}