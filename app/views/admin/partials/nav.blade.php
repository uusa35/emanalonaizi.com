<nav class="navbar navbar-inverse" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header ">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" style="{{ Request::is('admin/account') ? 'color:#06A000;' : '' }}" href="{{ URL::route('account-posts') }}">{{ Lang::get('general.blogTitlear') }}</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="{{ Request::is('admin/account/users') ? 'active' : '' }}"><a href="{{ action('AdminAccountController@index')}}">{{ Lang::get('nav.users') }}</a></li>
                <li class="{{ Request::is('admin/account/comments') ? 'active' : '' }}"><a href="{{ action('AdminCommentController@index')}}">{{ Lang::get('nav.all_comments') }}</a></li>
                <li class="{{ Request::is('admin/account/categories') ? 'active' : '' }}"><a href="{{ URL::to('admin/account/categories')}}">{{ Lang::get('nav.categories') }}</a></li>
                <li class="{{ Request::is('admin/account/contactus') ? 'active' : '' }}"><a href="{{ action('AdminContactUsController@edit')}}">{{ Lang::get('nav.contactus') }}</a></li>
                <li class="{{ Request::is('admin/account/post/edit/28') ? 'active' : '' }}"><a href="{{ URL::to('admin/account/post/edit/28')}}">{{ Lang::get('nav.aboutus') }}</a></li>


            </ul>
            <!--<form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>-->
        </div><!-- /.navbar-collapse -->

    </div><!-- /.container-fluid -->
</nav>