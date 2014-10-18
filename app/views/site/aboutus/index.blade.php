@extends('site.layouts._one_col')

@section('content')
<div class="panel panel-success">
    <div class="panel-heading">

        <h4> <i class="fa fa-fw fa-star fa-bg"></i> {{ $aboutus->title }}</h4>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <p style="width: 99%;">
                    {{ $aboutus->body }}
                </p>
            </div>
        </div>
    </div>
</div>
@stop