@extends('site.layouts._one_col')
@section('content')

<div class="page-header">
    <h1>{{ Lang::get('forms.change_password') }}</h1>
</div>
<div class="col-md-8 col-md-offset-2">

    {{ Form::open(['action' => 'AccountController@postResetPassword', 'method' => 'post']) }}
    <div class="form-group">
        <label for="password">{{{ Lang::get('buttons.password') }}}</label>
        {{ Form::password('old_password', ['class' => 'form-control', 'placeholder' =>Lang::get('forms.old_password') ]) }}
    </div>
    <div class="form-group">
        <label for="password">{{{ Lang::get('buttons.password') }}}</label>
        {{ Form::password('new_password', ['class' => 'form-control', 'placeholder' =>Lang::get('forms.new_password') ]) }}
    </div>
    <div class="form-group">
        <label for="password_confirmation">{{{ Lang::get('forms.pass_confirm') }}}</label>
        {{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' =>Lang::get('forms.pass_confirm') ]) }}
    </div>

    @if ( Session::get('error') )
    <div class="alert alert-error alert-danger">{{{ Session::get('error') }}}</div>
    @endif

    @if ( Session::get('notice') )
    <div class="alert">{{{ Session::get('notice') }}}</div>
    @endif

    <div class="form-actions form-group pull-left">
        <button type="submit" class="btn btn-primary">{{{ Lang::get('forms.change_password') }}}</button>
    </div>
    {{ Form::close() }}
</div>
@stop
