@extends('site.master')

@section('style')
    @include('site.layouts.styles')
    {{ HTML::style('css/custom-nav.css') }}
@stop

@section('navigation')
    @include('site.partials.navigation')
@stop

@section('main')
    @yield('content')
@stop

@section('javascript')
    @include('site.layouts.scripts')
@stop