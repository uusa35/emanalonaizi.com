@extends('site.layouts._one_col')

@section('content')
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div class="alert alert-info">{{ Lang::get('messages.warning_msg')}}</div>
    {{ Form::open(array('method' => 'POST', 'action'=>array('AccountController@postSignUp'),'class'=>'form')) }}
    <div class="row">

        <div class="col-xs-6 col-md-6 form-group">
            {{ Form::text('first_name',NULL,array('class'=>'form-control input-lg','placeholder'=>Lang::get('forms.first_name'))) }}
        </div>
        <div class="col-xs-6 col-md-6 form-group">
            {{ Form::text('last_name',NULL,array('class'=>'form-control input-lg','placeholder'=> Lang::get('forms.last_name'))) }}
        </div>
        <div class="col-xs-6 col-md-6 form-group">
        {{ Form::text('username',NULL,array('class' => 'form-control input-lg','placeholder' => Lang::get('forms.user_name'))) }}
        </div>
        <div class="col-xs-6 col-md-6 form-group">
        {{ Form::text('email',NULL,array('class' => 'form-control input-lg','placeholder' => Lang::get('forms.email'))) }}
        </div>
        <div class="col-xs-6 col-md-6 form-group">
        {{ Form::password('password',array('class' => 'form-control input-lg','placeholder' => Lang::get('forms.password'))) }}
        </div>
        <div class="col-xs-6 col-md-6 form-group">
        {{ Form::password('password_confirmation',array('class' => 'form-control input-lg','placeholder' => Lang::get('forms.pass_confirm'))) }}
        </div>
        <div class="col-xs-6 col-md-6 form-group">
            {{ Form::text('mobile',NULL,array('id'=> 'mobile','class'=>'form-control input-lg','placeholder'=> Lang::get('forms.mobile'), 'style'=>'float: none;  border-radius: 10px; text-indent: 25px;')) }}
        </div>
        <div class="col-xs-6 col-md-6 form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-fw fa-instagram"></i></span>
            {{ Form::text('instagram',NULL,array('class'=>'form-control input-lg','placeholder'=>Lang::get('forms.instagram'))) }}
            </div>
        </div>
        <div class="col-xs-6 col-md-6 form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-fw fa-facebook"></i></span>
            {{ Form::text('facebook',NULL,array('class'=>'form-control input-lg','placeholder'=> Lang::get('forms.facebook'))) }}
             </div>
        </div>
        <div class="col-xs-6 col-md-6 form-group">
            <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-fw fa-twitter"></i></span>
            {{ Form::text('twitter',NULL,array('class'=>'form-control input-lg','placeholder'=> Lang::get('forms.twitter'))) }}
            </div>
        </div>
        <div class="col-xs-12 col-md-12 form-group">
        {{ Form::submit(Lang::get('buttons.create_user'), ['class'=> 'input-group btn btn-lg btn-primary btn-block signup-btn form-group'])}}
         </div>
        {{ Form::close() }}
        </div>
    </div>
    <div class="col-md-1"></div>



@stop
@section('javascript')
@parent
        {{ HTML::script(asset('js/intlTelInput.min.js')); }}
        <script>
          $("#mobile").intlTelInput();
        </script>
@stop
