@extends('admin.layouts.home')
@scection('styles')
@parent
{{ HTML::style('js/html/style.css') }}

@stop

@section('content')
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-8"><h4>{{ Lang::get('general.contactus') }}</h4></div>
            </div>
        </div>
        <div class="panel-body">
            {{ Form::open(['action' => ['AdminCategoryController@update',$category->id],'class'=>'form']) }}
            {{ Form::hidden('id',$category->id) }}
            <div class="row">
                <div class="col-xs-8 col-md-8 col-md-offset-2">
                    <div class="form-group">
                        {{ Form::label('name', Lang::get('general.admin.title')) }}
                        {{ Form::text('name', $category->name ,['class'=>'form-control input-lg']) }}
                    </div>
                </div>
                <div class="col-xs-8 col-md-8 col-md-offset-2">
                    <div class="form-group">
                        {{ Form::label('category_description', Lang::get('general.admin.description')) }}
                        {{ Form::textarea('category_description',$category->category_description,['class'=>'form-control input-lg html']) }}


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
