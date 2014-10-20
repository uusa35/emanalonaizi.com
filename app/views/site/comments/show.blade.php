<!-- comments -->

    <div class="row">
        <div class="col-md-10 col-md-offset-1 text-right">

            <div class="alert alert-success" role="alert">

                <h4> <i class="fa fa-fw fa-comments"></i> {{ Lang::get('general.comments') }}</h4>
            </div>
        </div>

    </div>
    <hr>
    @for($i=0;$i < count($post->comments);$i++)
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="col-md-5 pull-left">
                {{ $post->comments[$i]->user['first_name'].' '.$post->comments[$i]->user['last_name']}}
                <i class="fa fa-clock-o"></i>



                {{ $post->comments[$i]->created_at}}
                <i class="fa fa-comments"></i>

            </div>
            <div class="col-md-7 pull-right">
                <p>{{ $post->comments[$i]->title}}</p>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p>{{ $post->comments[$i]->body }}</p>
                </div>

            </div>
        </div>

    </div>
    <hr>
    @endfor
    @include('site.comments.create')
