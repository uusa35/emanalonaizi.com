@if($post)
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10 divid" style="">
        <!-- ./ post title -->
        <!-- Post Content -->
        <div class="panel panel-success">
            <div class="panel-heading">
                    {{ $post->title }}
            </div>
            <div class="panel-body">
                <div class="row">

                    <div class="col-md-2 col-sm-1 col-xs-4">
                        @if($category_latest_id)
                        <a href="#">{{ HTML::image('images/categories/'.$category_latest_id.'.png','image',array('class'=> 'img-responsive'))}}</a>
                        @else
                        <a href="#">{{ HTML::image('images/flower.png','image',array('class'=> 'img-responsive'))}}</a>
                        @endif
                    </div>


                    <div class="col-md-10" style="overflow: hidden !important;">
                        <p style="width: 98%; overflow: hidden !important;">
                            {{ Str::limit($post->body, $limit = 250) }}
                        </p>
                    </div>
                </div>
                <div class="col-md-12 pull-left">
                    <a class="btn-sm btn-mini btn-success pull-left" href="{{ URL::action('PostController@show',$post->id) }}"> {{ Lang::get('buttons.read_more') }}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-1 hidden-sm"></div>

</div>
@endif