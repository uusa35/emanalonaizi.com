@extends('site.layouts._one_col')
@section('content')

<div class="col-md-1"></div>
<div class="col-md-10">
    <div class="page-header">
        <h1>{{{ Lang::get('forms.forgot_password') }}}</h1>
    </div>
    <form method="POST" action="{{ URL::action('AccountController@postForgotPassword') }}" accept-charset="UTF-8">
        <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">

        <div class="form-group">
            <label for="email">{{{ Lang::get('forms.email') }}}</label>
            <div class="input-append input-group">
                <input class="form-control" placeholder="{{{ Lang::get('forms.email') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">
                <span class="input-group-btn">
                    <input class="btn btn-danger" type="submit" value="{{{ Lang::get('forms.forgot_submit') }}}">
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
</div>
<div class="col-md-1"></div>
@stop
