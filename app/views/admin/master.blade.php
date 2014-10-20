<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ Lang::get('general.blogTitle') }}</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('site.layouts.styles')

</head>
<body>
<div class="container">
    <!-- header -->
    <div class="row">

        <div class="row">
            <div class="col-md-2 col-sm-2 hidden-xs">
                {{ HTML::image('images/eman-photo.png','Eman',array('style'=>'max-height:150px;', 'class'=> 'img-responsive thumbnail')) }}
            </div>
            <div class="col-md-8 col-sm-8">
                <div class="row">
                    @include('site.auth.signin')
                </div>
                <div class="row">


                    <div class="col-md-6 col-sm-6">
                        {{ HTML::image('images/name-arabic.png',Lang::get('blogTitle'),array('class'=>'img-responsive'))}}

                    </div>
                    <div class="col-md-6 col-sm-6">
                        {{ HTML::image('images/name-Eng.png',Lang::get('blogTitle'),array('class'=>'img-responsive'))}}
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-5 pull-left">
                <a href="#">{{ HTML::image('images/logo.png','Eman',array('class'=>'img-responsive')) }}</a>
            </div>
        </div>
    </div>

    <!-- navigation bar -->
    <div class="row">
        <div class="col-md-12" style="padding-top:1%">
            @include('admin.partials.nav')
        </div>

        <div class="row hidden-xs divid"></div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <!--place for notification-->
        </div>
    </div>
    <!-- end of header -->


    <!-- content -->
    <div class="row">
        @yield('content')
    </div>
    <!-- end of content -->



</div>
<!--end of container-->

<!-- Javascript -->
@yield('javascript')

</body>
</html>