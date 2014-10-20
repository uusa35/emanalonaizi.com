@extends('admin.master')
    @section('style')
    @include('site.layouts.styles')
    {{ HTML::style('css/custom-nav.css') }}
    @stop


    @section('javascript')

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

    @show