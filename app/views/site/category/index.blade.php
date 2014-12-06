@extends('site.layouts._one_col')

@section('content')
<div class="row">

    @if($category->category_description)
    <div class="col-md-10 col-md-offset-1 ">
        <div class="alert alert-info text-center text-success " >
            <h4 style="line-height: 161%;"><i class="fa fa-fw fa-pencil"></i><strong> {{ $category->category_description }}</strong></h4>
        </div>
    </div>
    @endif

</div>
<div class="row">
@foreach ($posts as $post)
    <div class="container">
    @include('site.posts.post_template')
    </div>
@endforeach
{{ $posts->links() }}
</div>
@stop


