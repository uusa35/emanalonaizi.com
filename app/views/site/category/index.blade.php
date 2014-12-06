@extends('site.layouts._one_col')

@section('content')
<div class="row">

    @if($category->category_description)
    <div class="col-md-10 col-md-offset-1 ">
        <div class="alert alert-info text-center text-success " >
            <h4 style="line-height: 161%;"><i class="fa fa-fw fa-pencil"></i><strong> {{ $category->category_description }}</strong></h4>
        </div>
    </div>
    @endif

</div>

@foreach ($posts as $post)

        <!-- Post Title -->
        <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8" style="padding: 20px; border:1px solid white ; margin-bottom: 20px; background-color: #ececec !important;overflow: hidden !important;">
                    <div class="row">
                        <div class="col-md-3">
                            @if(isset($post->photos[0]))
                              <!--  {{ HTML::image('uploads/medium/'.$post->photos[0]->name.'','image1',array('class'=>'img-responsive img-thumbnail')) }}-->
                            <img src="{{ '/uploads/thumbnail/'.$post->photos[0]->path }}" class="img-responsive img-thumbnail" alt="{{ $post->title }}"/>
                              <!--{{ HTML::image(''.$post->photos[0]->path.'',$post->title,array('class'=>'img-responsive img-thumbnail')) }}-->
                            @else
                            <a href="{{action('PostController@show',$post->id) }}">
                                <img src="http://placehold.it/100x100/2980b9/ffffff&text=emanalaoniaizi.com}}" class="img-responsive img-thumbnail" />
                            </a>
                            @endif
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                             <div class="col-md-12">
                            <h4><strong><a href="{{action('PostController@show',$post->id) }}">{{ $post->title }}</a></strong></h4>
                              </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <p style="width: 98%;">
                                     {{ Str::limit($post->body, 100) }}
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 pull-left">
                                | <i class="glyphicon glyphicon-calendar"></i> <!--Sept 16th, 2012-->{{{ $post->created_at }}}
                                 <a class="btn-sm btn-mini btn-info pull-left" href="{{action('PostController@show',$post->id) }}">{{Lang::get('buttons.read_more')}}</a>
                                </div>
                            </div>
                        </div>
                    </div></div><!-- end coloum-m-9-->
                <div class="col-md-2"></div>
        </div>
@endforeach
<div class="row">
{{ $posts->links() }}
</div>
@stop


