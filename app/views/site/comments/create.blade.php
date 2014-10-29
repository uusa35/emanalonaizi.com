@if(Auth::check())
    @if(Auth::user()->active)
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="row">
                <h4> {{ Lang::get('general.add_comment') }}</h4>
                <div class="col-md-3 pull-left">
                    <a href="{{ URL::route('account-signup') }}" class="btn btn-default {{ (Auth::check()) ? 'hidden' : '' }}">{{ Lang::get('buttons.new_user') }}</a>
                </div>
            </div>
            <hr>
            {{ Form::open(['action'=>['CommentController@postComment',$post->id,Auth::id()], 'method'=>'post']) }}
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-pencil fa-lg"></i></span>
                    {{ Form::text('title',null,['class'=>'form-control', 'id'=>'title', 'placeholder'=> Lang::get('forms.title')]) }}
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-pencil-square-o fa-lg"></i></span>
                    {{ Form::textarea('body',null,['class'=>'form-control', 'id'=>'title', 'placeholder'=> Lang::get('forms.content')]) }}
                </div>
            </div>
            <div class="form-group pull-left">
                <div class="input-group">

                    <div class="text-right">

                        {{ Form::submit(Lang::get('buttons.comment'), ['class'=>'btn btn-warning'])}}

                    </div>
                </div>
            </div>
            {{ Form::hidden('post_id',$post->id) }}
            {{ Form::close() }}
        </div>

    </div>
    @endif
@else
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="row">
                {{ Lang::get('general.cannot_comment') }}
                <div class="col-md-3 pull-left">
                    <a href="{{ URL::route('account-signup') }}" class="btn btn-info {{ (Auth::check()) ? 'hidden' : '' }}">{{ Lang::get('buttons.new_user') }}</a>
                </div>
            </div>
     </div>
@endif