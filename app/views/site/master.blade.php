<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ Lang::get('general.blogTitle') }}</title>
    <meta name="keywords" content="kuwait,eman,blog,alonaizi,qeight,q8,إيمان,ايمان,العنيزي,إيمان العنيزي,كويت,الكويت,اللغة العربية,emanalonaizi.com,emanalonaizi" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('style')
</head>
<body>
    <div class="container">
        <!-- header -->
        <div class="row">

            <div class="row">
                <div class="col-md-2 col-sm-2 hidden-xs">
                    {{ HTML::image('images/personal.png','Eman',array('style'=>'max-height:150px;', 'class'=> 'img-responsive thumbnail')) }}
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
            <div class="col-md-12">
               @yield('navigation')
            </div>

            <div class="row hidden-xs divid"></div>
        </div>


        <div class="row">
            <div class="col-md-12">
                @if(Session::has('messages'))
                    @include('site.partials.notification')
                @endif
            </div>
        </div>
        <!-- end of header -->


        <!-- content -->
        <div class="row">
            @yield('main')
        </div>
        <!-- end of content -->

        <!-- footer -->
        <div class="row">
            @include('site.partials.footer')
        </div>
        <!-- end of footer-->

    </div>
    <!--end of container-->

    <!-- Javascript -->

    @yield('javascript')
    <!-- This code is implemented for the Google Analatices -->
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-57101863-1', 'auto');
        ga('send', 'pageview');

    </script>
</body>
</html>