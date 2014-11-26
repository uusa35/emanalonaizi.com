@extends('site.layouts._one_col')

@section('style')
    @parent
    {{ HTML::style('//blueimp.github.io/Gallery/css/blueimp-gallery.min.css') }}
    {{ HTML::style('css/bootstrap-image-gallery.min.css') }}
@stop

@section('content')
    <div class="panel panel-success">
        <div class="panel-heading">

            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-9">
                    <h3>{{ $post->title }}</h3>
                </div>
                {{--this is the post_id for about us page - i had to make it like this because she asked for gallery--}}
                @if(!$post->id === 28)
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-3 pull-left hidden-xs">
                        </br>
                        <div class="btn btn-default btn-sm" data-placement="top" title="" >
                            <i class="fa fa-lg fa-eye"></i> {{ $post->counter }}
                        </div>
                        <div class="btn btn-success text-muted btn-sm" title="" >
                            <i class="fa fa-lg fa-clock-o"></i> {{ substr($post->created_at,0, 10) }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="panel-body">
            @if(Request::is('category/*'))
                @if($category->category_description)
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 ">
                        <div class="alert alert-info text-center text-success " >
                            <h4 style="line-height: 161%;"><i class="fa fa-fw fa-pencil"></i><strong> {{ $category->category_description }}</strong></h4>
                        </div>
                    </div>
                </div>
                @endif
            @endif

            @if($post->id != 1)
            <!--Gallery Buttons -->
            <div class="row">
                <div class="col-md-12">

                    <!-- gallery Template Divisions that should be load each time we will use the gallery -->
                    <div id="blueimp-gallery" class="blueimp-gallery">
                        <!-- The container for the modal slides -->
                        <div class="slides"></div>
                        <!-- Controls for the borderless lightbox -->
                        <h3 class="title"></h3>
                        <a class="prev">‹</a>
                        <a class="next">›</a>
                        <a class="close">×</a>
                        <a class="play-pause"></a>
                        <ol class="indicator"></ol>
                        <!-- The modal dialog, which will be used to wrap the lightbox content -->
                        <div class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title"></h4>
                                    </div>
                                    <div class="modal-body next"></div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default pull-left prev">
                                            <i class="glyphicon glyphicon-chevron-left"></i>
                                            Previous
                                        </button>
                                        <button type="button" class="btn btn-primary next">
                                            Next
                                            <i class="glyphicon glyphicon-chevron-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @if($post->photos)
                    @if(count($post->photos) === 0)
                    <div class="col-md-8 text-center col-md-offset-2">
                        <div class="alert alert-danger" role="alert"><i class="fa fa-fw fa-ban on fa-camera"></i>{{ Lang::get('general.no_photos') }}</div>
                    </div>

                    @else
                        <div class="col-md-12" id="links">
                            <!--return $post->comments[0]->body;-->

                            @for($i=0;$i < count($post->photos);$i++)
                            <div class="col-xs-6 col-md-3">
                            <a href="{{ URL::to('/uploads/large/'.$post->photos[$i]->path)}}" data-gallery>
                                {{ HTML::image('/uploads/thumbnail/'.$post->photos[$i]->path,$post->title,array('class'=>'img-responsive thumbnail')) }}
                            </a>
                            </div>
                            @endfor
                        </div>
                    @endif
                @endif

            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <p>{{ $post->body }}</p>
                </div>
                <!-- end of body -->
            </div>
            <hr>
           @endif
            {{--this is the post_id for about us page - i had to make it like this because she asked for gallery--}}
            @if(!$post->id === 28)
                @include('site.comments.show')
            @endif
        </div>
    </div>
@stop

@section('javascript')
	@parent
    {{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js') }}
 	{{ HTML::script('//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js') }}
    {{ HTML::script('js/bootstrap-image-gallery.js') }}
@stop
