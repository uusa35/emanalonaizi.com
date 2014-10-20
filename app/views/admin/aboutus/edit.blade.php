@extends('admin.layouts.home')
@scection('styles')
    @parent
    {{ HTML::style('js/html/style.css') }}
@stop


@section('content')
{{ Form::model($aboutus, ['action' => ['AdminAboutUsController@update', $aboutus->id],'class'=>'form']) }}

<div class="row">
    <div class="col-xs-8 col-md-8 col-md-offset-2">
        <div class="form-group">
            {{ Form::label('title', Lang::get('general.admin.title')) }}
            {{ Form::text('title',NULL,['class'=>'form-control input-lg']) }}
        </div>
    </div>
    <div class="col-xs-8 col-md-8 col-md-offset-2">
        <div class="form-group">
            {{ Form::label('body', Lang::get('general.admin.body')) }}
            {{ Form::textarea('body',NULL,['class'=>'form-control input-lg html','id'=>'']) }}


        </div>
    </div>
    <div class="col-xs-8 col-md-8 col-md-offset-2">
        <div class="form-group pull-left">
        {{ Form::submit(Lang::get('forms.save'),['class'=>'btn btn-primary']) }}
        </div>
    </div>
{{ Form::close() }}
</div>
@stop


@section('javascript')
    @parent
{{ HTML::script('http://js.nicedit.com/nicEdit-latest.js') }}

<script type="text/javascript">
    bkLib.onDomLoaded(function() { nicEditors.allTextAreas() }); // convert all text areas to rich text editor on that page

    bkLib.onDomLoaded(function() {
        new nicEditor().panelInstance('area1');
    }); // convert text area with id area1 to rich text editor.

    bkLib.onDomLoaded(function() {
        new nicEditor({fullPanel : true}).panelInstance('area2');
    }); // convert text area with id area2 to rich text editor with full panel.
</script>

@stop