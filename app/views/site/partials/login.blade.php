@if(!Auth::check())
<div class="col-md-3 col-sm-0 hidden-xm">

</div>
<div class="col-md-5 col-sm-8">
    {{ Form::open(['action'=>'AccountController@checkAccount']) }}
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon  glyphicon-user"></i></span>
            {{ Form::text('username',null,['class'=>'form-control', 'id'=>'username', 'value'=> Input::old('username'), 'placeholder'=> Lang::get('buttons.username')]) }}

        </div>
   </div>
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon  glyphicon-lock"></i></span>
            {{ Form::password('password', array('placeholder' => Lang::get('buttons.password'), 'class'=>'form-control', 'id'=>'password')) }}
        </div>
    </div>
</div>
<div class="col-md-4 col-sm-4">
    <div class="form-group">
    <div class="input-group">
        {{ Form::submit(Lang::get('buttons.enter'), array('class' => 'btn btn-success')); }}
        &nbsp;
            <label>
                {{ Form::checkbox('remember_me', 1 , true) }} {{ Lang::get('buttons.remember_me') }}
            </label>


    </div>
    </div>
    <div class="form-group">
    <div class="input-group">
        {{ Form::button(Lang::get('buttons.forget_password'), array('class' => 'btn btn-info')); }}
    </div>
    </div>
</div>
{{ Form::close() }}
@else
<div class="col-md-12 col-sm-12 col-xs-12 pull-left text-left">

    <form class="form-inline" role="form">
    <div class="form-group">
        @if(Auth::user()->id === 1)
            @if(Request::is('admin/*'))
            <a class="btn btn-primary btn-sm" href="{{ URL::to('/') }}">
                <i class="fa fa-users fa-lg"></i> {{ Lang::get('buttons.user_area') }}
            </a>
            @else
            <a class="btn btn-primary btn-sm" href="{{ URL::action('AccountController@getDashBoard') }}">
                <i class="fa fa-user fa-lg"></i> {{ Lang::get('buttons.admin_dashboard') }}
            </a>
            @endif
        @endif
        <a class="btn btn-success btn-sm" href="{{ URL::action('AccountController@logOut') }}">
            <i class="fa fa-building fa-lg"></i> {{ Lang::get('buttons.profile') }}
        </a>
        <a class="btn btn-danger btn-sm" href="{{ URL::action('AccountController@logOut') }}">
            <i class="fa fa-sign-out fa-lg"></i> {{ Lang::get('buttons.logout') }}
        </a>

    </div>


    </form>
</div>
@endif