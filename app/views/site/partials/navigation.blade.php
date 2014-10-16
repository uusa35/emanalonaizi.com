<div class="col-md-12">
<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header
        @if ( App::getLocale() == 'en')
            col-md-12 pull-left
        @else
            pull-right
        @endif ">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="{{ Request::is('/') ? 'active' : '' }}" ><a href="/">{{ Lang::get('nav.home')}}  </a></li>
                <li class="{{ Request::is('aboutus') ? 'active' : '' }}" ><a href="{{ route('aboutus') }}">{{ Lang::get('nav.aboutus')}}  </a></li>
                <li class="dropdown {{ (Request::segment('1') == 'category' ? 'active' :  false ) }}">
                    <a id="eventsTab" class="dropdown-toggle" data-toggle="dropdown" href="#" >{{ Lang::get('nav.field') }}  </a>
                    <ul class="dropdown-menu" role="menu">
                        @foreach($categories as $category)
                        <li><a href="{{ URL::to('category',$category->id) }}" >{{ $category->name }}</a></li>
                        @endforeach

                    </ul>
                </li>
                <li class="{{ (Request::is('en') || Request::is('ar') || Request::is('contactus')) ? 'active' : '' }}" ><a href="{{ route('contactus') }}">{{ Lang::get('nav.contactus')}} </a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
</div>