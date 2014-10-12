@extends('site.layouts._one_col')

@section('style')
    @parent
    {{ HTML::style('http://blueimp.github.io/Gallery/css/blueimp-gallery.min.css') }}
    {{ HTML::style('css/bootstrap-image-gallery.min.css') }}
@stop

@section('content')
	the id of this post is : {{ $id }}
@stop

@section('javascript')
	@parent
 	{{ HTML::script('http://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js') }}
    {{ HTML::script('js/bootstrap-image-gallery.js') }}
@stop