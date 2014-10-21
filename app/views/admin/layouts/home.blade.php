@extends('admin.master')
    @section('style')
    @include('site.layouts.styles')
    {{ HTML::style('css/custom-nav.css') }}
    @stop


    @section('javascript')
        @include('site.layouts.scripts')
    @show