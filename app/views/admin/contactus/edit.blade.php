@extends('admin.layouts.home')

@section('content')
<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-8"><h4>{{ Lang::get('general.contactus') }}</h4></div>
        </div>
    </div>
    <div class="panel-body">
        {{ Form::model($info, ['action' => ['AdminContactUsController@update'],'class'=>'form']) }}
        <div class="row">
            <div class="col-xs-8 col-md-8 col-md-offset-2">
                <div class="form-group">
                    {{ Form::label('name', Lang::get('general.admin.name')) }}
                    {{ Form::text('name',NULL,['class'=>'form-control input-lg']) }}
                </div>
            </div>
            <div class="col-xs-8 col-md-8 col-md-offset-2">
                <div class="form-group">
                    {{ Form::label('email', Lang::get('general.admin.email')) }}
                    {{ Form::text('email',NULL,['class'=>'form-control input-lg']) }}
                </div>
            </div>
            <div class="col-xs-8 col-md-8 col-md-offset-2">
                <div class="form-group">
                    {{ Form::label('address', Lang::get('general.admin.address')) }}
                    {{ Form::text('address',NULL,['class'=>'form-control input-lg']) }}
                </div>
            </div>
            <div class="col-xs-8 col-md-8 col-md-offset-2">
                <div class="form-group">
                    {{ Form::label('address', Lang::get('general.admin.tel')) }}
                    {{ Form::text('tel',NULL,['class'=>'form-control input-lg']) }}
                </div>
            </div>
            <div class="col-xs-8 col-md-8 col-md-offset-2">
                <div class="form-group">
                    {{ Form::label('mobile', Lang::get('general.admin.mobile')) }}
                    {{ Form::text('mobile',NULL,['class'=>'form-control input-lg']) }}
                </div>
            </div>
            <div class="col-xs-8 col-md-8 col-md-offset-2">
                <div class="form-group">
                    {{ Form::label('facebook', Lang::get('forms.facebook')) }}
                    {{ Form::text('facebook',NULL,['class'=>'form-control input-lg']) }}
                </div>
            </div>
            <div class="col-xs-8 col-md-8 col-md-offset-2">
                <div class="form-group">
                    {{ Form::label('instagram', Lang::get('forms.instagram')) }}
                    {{ Form::text('instagram',NULL,['class'=>'form-control input-lg']) }}
                </div>
            </div>
            <div class="col-xs-8 col-md-8 col-md-offset-2">
                <div class="form-group">
                    {{ Form::label('twitter', Lang::get('forms.twitter')) }}
                    {{ Form::text('twitter',NULL,['class'=>'form-control input-lg']) }}
                </div>
            </div>
            <div class="col-xs-8 col-md-8 col-md-offset-2">
                <div class="form-group pull-left">
                {{ Form::submit(Lang::get('forms.save'),['class'=>'btn btn-primary']) }}
                </div>
            </div>
        {{ Form::close() }}
    </div>
</div>
@stop