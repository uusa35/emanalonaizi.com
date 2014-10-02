@extends('site.master')
@section('main')
<div id="sidecontent" class="col-md-4 col-xs-12 pull-right">
    @section('sidebar')
        @parent
    @show
</div>

<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12" style="border: 1px solid rgba(181, 164, 173, 0.16); border-radius: 5px;">
    @section('content')
        @parent
    @stop
</div>
@stop