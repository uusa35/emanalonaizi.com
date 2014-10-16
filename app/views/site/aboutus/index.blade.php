@extends('site.layouts._one_col')

@section('content')
<div class="panel panel-success">
    <div class="panel-heading">
        {{ $aboutus->title }}

    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-9">
                <p style="width: 99%;">
                    {{ $aboutus->body }}
                </p>
            </div>
        </div>
        <div class="col-md-12 pull-left">
            <a class="btn-sm btn-mini btn-success pull-left" href="#"> {{ Lang::get('general.read_more') }}</a>
        </div>
    </div>
</div>
@stop