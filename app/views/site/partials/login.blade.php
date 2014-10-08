@if(!Auth::check())
<div class="col-md-5 col-sm-12">
    {{ Form::open(['action'=>'AccountController@checkAccount']) }}
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon  glyphicon-user"></i></span>
            <input type="text" class="form-control" name="email" id="email" value="{{ Input::old('email') }}" placeholder="{{ Lang::get('general.username')}}">
        </div>
        </br>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon  glyphicon-lock"></i></span>
            <input type="password" name="password" id="password" class="form-control" placeholder="{{ Lang::get('general.password')}}">
        </div>


    </div>
</div>
<div class="col-md-3 col-sm-12">
    <div class="form-group pull-right">
        <input type="submit" class="btn btn-success" value="{{ Lang::get('general.enter') }}"/>
    </div>
</div>
{{ Form::close() }}
@else
case logged in
@endif