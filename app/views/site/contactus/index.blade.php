@extends('site.layouts._one_col')

@section('content')

<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <address>
            <h2 style="background-color: rgba(221, 220, 219, 0.83); padding:10px;">{{ Lang::get('general.contactus') }}</h2>
            @if($contact)
            <b>{{ Lang::get('forms.email')  }}</b> : {{ $contact->email }}</br>
            <b>{{ Lang::get('forms.address')}}</b> : {{ $contact->address }}</br>
            <b>{{ Lang::get('forms.phone')  }}</b> : {{ $contact->tel }} </br>
            <b>{{ Lang::get('forms.mobile') }}</b> : {{ $contact->mobile }} </br>

            @endif
        </address>
    </div>
    <div class="col-md-1"></div>
</div>


<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        {{ Form::open(['method' => 'POST', 'action' => 'ContactUsController@contact']) }}

        <div class="form-group">
            <label for="exampleInputEmail">{{ Lang::get('forms.email') }}</label>
            {{ Form::text('sender_email', null , ['class' => 'form-control', 'placeholder' => Lang::get('forms.email') ]) }}
        </div>
        <div class="form-group">
            <label for="name">{{ Lang::get('forms.name') }}</label>
            {{ Form::text('sender_name', null , ['class' => 'form-control', 'placeholder' => Lang::get('forms.user_name') ]) }}
        </div>
        <div class="form-group">
            <label for="comment">{{ Lang::get('forms.content') }}</label>
            {{ Form::textarea('body', null , ['class' => 'form-control', 'placeholder' => Lang::get('forms.content')]) }}
        </div>
        {{ Form::submit(Lang::get('forms.submit'),['class'=>'btn btn-info pull-left']) }}

        {{ Form::close() }}
    </div>
    <div class="col-md-1"></div>
</div>

@stop