
<div class="row">
    <div class="col-md-2 hidden-sm"></div>
    <div class="col-md-8 col-sm-12 col-xs-12">
        @if(Session::get('messages') === 'error')
        @if($errors->any())
        <div class="alert alert-danger alert-block">
            <h4><i class="fa fa-fw fa-close"></i> {{ Lang::get('messages.error_msg') }}</h4>
            <ul>
                {{ implode('', $errors->all('<li class="error">:message</li>')) }}
            </ul>
        </div>
        @else
        <div class="alert alert-danger alert-block">
            <h4><i class="fa fa-fw fa-close"></i> {{ Lang::get('messages.error_msg') }}</h4>
            <ul>
                <li class="error"> {{ Session::get('errorMsg') }}</li>
            </ul>
        </div>
        @endif
        @elseif(Session::get('messages') === 'success')

        @if(Session::has('successMsg'))
        <div class="alert alert-info alert-block">
            <h4><i class="fa fa-fw fa-check-square"></i> {{ Session::get('successMsg') }}</h4>
        </div>
        @endif

        @else
        @endif
    </div>
    <div class="col-md-2"></div>
</div>