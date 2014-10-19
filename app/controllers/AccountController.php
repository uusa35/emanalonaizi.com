<?php

class AccountController extends \BaseController {



    public function getSignUp() {
        return View::make('site.auth.signup');
    }

    public function postSignUp () {
        //{"_token":"pS3dKY2fnJxPycZWCz1KpLOTKanWEZESIRosbGR6","first_name":"","last_name":"","username":"","email":"","password":"","password_confirmation":"","mobile":"","instagram":"","facebook":"","twitter":""}
        $validator = Validator::make(Input::all(),User::$signupRules);
        if($validator->fails()) {
            return Redirect::back()->with('messages','error')->withErrors($validator);
        }
/*        User::create([
            'first_name'    => Input::get('first_name'),
            'last_name'     => Input::get('last_name'),
            'username'      => Input::get('username'),
            'email'         => Input::get('email'),
            'password'      => Hash::make(Input::get('password')),
            'mobile'        => Input::get('mobile'),
            'instagram'     => Input::get('instagram'),
            'facebook'      => Input::get('facebook'),
            'twitter'       => Input::get('twitter')
        ]);*/
        $user = new User;
        $user->fill(Input::except('password_confirmation'));
        if($user->save()) {
        return Redirect::back()->with(['messages'=>'success','successMsg'=>Lang::get('messages.signup_success')]);
        }
        return Redirect::back()->with(['messages'=> 'error','errorMsg'=>Lang::get('messages.signup_error')]);
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
        $user = User::where('email','=',$email)->first();
        $new_password = Str::random($length = 5);
        $hashed_new = Hash::make($new_password);
        $user->update(['password'=>  $hashed_new]);
        if($user) {
            Mail::queue('emails.forgotpassword',['username'=>$user->username, 'new_password'=> $new_password, 'email'=> $user->email], function($message) use ($user){
                $message->to($user->email, $user->username)->subject('ForgotPassword | Eman Al-Onaizi Blog');
            });
            return Redirect::back()->with(['messages'=>'success','successMsg'=>Lang::get('messages.forgotpassword_success')]);
        }
        return Redirect::back()->with(['messages'=>'error','successMsg'=>Lang::get('messages.forgotpassword_error')]);
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
            return Redirect::back()->with(['messages'=>'success','successMsg' => Lang::get('messages.reset_success')]);
            }
        }
        return Redirect::to('account/reset')->with(['messages'=>'error','errorMsg'=>Lang::get('messages.reset_error')]);
    }


    // login form checkin function
	public function postSignIn() {
        $credentials = ['username'=> Input::get('username'), 'password'=> Input::get('password'),'active'=>'1'];
        $validator = Validator::make($credentials,User::$signinRules);
        if($validator->passes()) {
            $rememberMe = Input::get('remember_me') ? 'true' : 'false';
            $user = Auth::attempt($credentials, $rememberMe);
            if($user) {
                return Redirect::back()->with(['messages'=>'success','successMsg'=>Lang::get('messages.signin_success')]);
            }
        }
        return Redirect::back()->with(['messages'=>'error','errorMsg'=> Lang::get('messages.signin_success')])->withErrors($validator);
    }



    // logout btn
    public function logOut() {
        Auth::logout();
        return Redirect::home();
    }
}