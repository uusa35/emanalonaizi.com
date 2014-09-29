@extends('site.layouts._two_column')
@section('content')

<div class="page-header">
    <h1>{{{ Lang::get('auth.login.forgot_password') }}}</h1>
</div>
<form method="POST" action="{{ URL::action('AuthController@postForgot') }}" accept-charset="UTF-8">
    <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">

    <div class="form-group">
        <label for="email">{{{ Lang::get('confide.e_mail') }}}</label>
        <div class="input-append input-group">
            <input class="form-control" placeholder="{{{ Lang::get('confide.e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">
            <span class="input-group-btn">
                <input class="btn btn-default" type="submit" value="{{{ Lang::get('confide.forgot.submit') }}}">
            </span>
        </div>
    </div>

    @if ( Session::get('error') )
    <div class="alert alert-error alert-danger">{{{ Session::get('error') }}}</div>
    @endif

    @if ( Session::get('notice') )
    <div class="alert">{{{ Session::get('notice') }}}</div>
    @endif
</form>

@stop
