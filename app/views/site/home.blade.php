<!-- Extends From from layouts ONE COL MASTER-->
@extends('site.layouts._one_col')

@section('main')

    <div class="row">
        @include('site.partials.instagram')

        @include('site.partials.homeCategories')
    </div>
@stop
