<div class="col-md-12 col-sm-12 col-xs-12" id="home-categories">
    <div class="row">
    @foreach($categories as $category)
        <div class="col-md-offset-{{ rand(1,2)}} col-md-2 col-sm-3 col-xs-4" >
            @if($category->id === 10)
            <a href="{{ action('PostController@getCommentPage', $category->id) }}">{{ HTML::image('images/categories/'.$category->id.'.png','image',array('class'=> 'img-responsive'))}}</a>
            @else
            <a href="{{ action('CategoryController@index', $category->id) }}">{{ HTML::image('images/categories/'.$category->id.'.png','image',array('class'=> 'img-responsive'))}}</a>
            @endif
        </div>
        </br>
    @endforeach
    </div>
        <!--<div class="row">
            <div class="col-md-offset-1 col-md-2 col-sm-3 col-xs-4">
                <a href="#">{{ HTML::image('images/flower.png','image',array('class'=> 'img-responsive'))}}</a>
            </div>
            </br>
            <div class="col-md-offset-2 col-md-2 col-sm-3 col-xs-4">
                <a href="#">{{ HTML::image('images/flower.png','image',array('class'=> 'img-responsive'))}}</a>
            </div>
            <div class="col-md-offset-1 col-md-2 col-sm-3 col-xs-4">
                <a href="#">{{ HTML::image('images/flower.png','image',array('class'=> 'img-responsive'))}}</a>
            </div>
        </div>
        <div class="row">
            </br>
            <div class="col-md-offset-2 col-md-2 col-sm-3 col-xs-4" >
                <a href="#">{{ HTML::image('images/flower.png','image',array('class'=> 'img-responsive'))}}</a>
            </div>
            <div class="col-md-offset-1 col-md-2 col-sm-3 col-xs-4">
                <a href="#">{{ HTML::image('images/flower.png','image',array('class'=> 'img-responsive'))}}</a>
            </div>
            </br>
            </br>
            <div class="col-md-offset-2 col-md-2 col-sm-3 col-xs-4">
                <a href="#">{{ HTML::image('images/flower.png','image',array('class'=> 'img-responsive'))}}</a>
            </div>
        </div>
        <div class="row">
            </br>
            <div class="col-md-offset-0 col-md-2 col-sm-3 col-xs-4" >
                <a href="#">{{ HTML::image('images/flower.png','image',array('class'=> 'img-responsive'))}}</a>
            </div>
            <div class="col-md-offset-0 col-md-2 col-sm-3 col-xs-4">
                <a href="#">{{ HTML::image('images/flower.png','image',array('class'=> 'img-responsive'))}}</a>
            </div>
            </br>
            </br>
            <div class="col-md-offset-1 col-md-2 col-sm-3 col-xs-4">
                <a href="#">{{ HTML::image('images/flower.png','image',array('class'=> 'img-responsive'))}}</a>
            </div>
            </br>
            </br>
            </br>
            <div class="col-md-offset-1 col-md-2 col-sm-3 col-xs-4">
                <a href="#">{{ HTML::image('images/flower.png','image',array('class'=> 'img-responsive'))}}</a>
            </div>
        </div>
-->
</div>
