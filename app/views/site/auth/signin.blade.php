@if(!Auth::check())

<div class="col-md-12 col-sm-12">
    {{ Form::open(['action'=>'AccountController@postSignIn']) }}
    <div class="col-md-5">
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
    <div class="col-md-4">
        <div class="form-group">
            <div class="input-group">
                {{ Form::submit(Lang::get('buttons.enter'), array('class' => 'btn btn-success')); }}
                &nbsp;
                <label>
                    {{ Form::checkbox('remember_me', 1 , true) }} {{ Lang::get('buttons.remember_me') }}
                </label>
            </div>
        </div>
        {{ Form::close() }}
        <div class="form-group">
            <div class="input-group">
                {{ link_to_action('AccountController@getForgotPassword', Lang::get('buttons.forget_password'), null, ['class' => 'btn btn-info']) }}
            </div>
        </div>

    </div>
    <div class="col-md-2 pull-right">
        <div class="form-group">
            <div class="input-group">
                {{ link_to_action('AccountController@getSignUp', Lang::get('buttons.create_user'), null, ['class'=>'btn btn-danger']);  }}
            </div>

        </div>
    </div>
</div>


@else
<div class="col-md-12 col-sm-12 col-xs-12 pull-left text-left">

    <form class="form-inline" role="form">
    <div class="form-group">
        @if(Auth::user()->username === 'admin')
            @if(Request::is('admin/*'))
            <a class="btn btn-primary btn-sm" href="{{ URL::to('/') }}">
                <i class="fa fa-users fa-lg"></i> {{ Lang::get('buttons.user_area') }}
            </a>
            @else
            <a class="btn btn-primary btn-sm" href="{{ URL::action('AdminPostController@index') }}">
                <i class="fa fa-user fa-lg"></i> {{ Lang::get('buttons.admin_dashboard') }}
            </a>
            @endif
        @endif
        <a class="btn btn-success btn-sm" href="{{ URL::action('AccountController@getResetPassword') }}">
            <i class="fa fa-building fa-lg"></i> {{ Lang::get('buttons.reset_password') }}
        </a>
        <a class="btn btn-danger btn-sm" href="{{ URL::action('AccountController@logOut') }}">
            <i class="fa fa-sign-out fa-lg"></i> {{ Lang::get('buttons.logout') }}
        </a>

    </div>


    </form>
</div>
@endif