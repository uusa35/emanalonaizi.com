<!-- comments -->

    <div class="row">
        <div class="col-md-10 col-md-offset-1 text-right">

            <div class="alert alert-success" role="alert">

                <h4> <i class="fa fa-fw fa-comments"></i> {{ Lang::get('general.comments') }}</h4>
            </div>
        </div>

    </div>

    @if($comments)
        @foreach($comments as $comment)
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <div class="row panel panel-default">
                    <div class="col-md-12 panel-heading">

                        <div class="col-md-5 pull-left text-left">
                            {{ $comment->user->first_name.' '.$comment->user->last_name }}
                            <i class="fa fa-clock-o"></i>
                            {{ $comment->created_at}}
                            <i class="fa fa-comments"></i>

                        </div>
                        <div class="col-md-7 pull-right">
                            <p>{{ $comment->title}}</p>
                        </div>
                    </div>
                    <div class="col-md-12 panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p>{{ $comment->body }}</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endforeach
        <div class="text-center">

    {{ $comments->links() }}

        </div>
@endif
    @include('site.comments.create')
