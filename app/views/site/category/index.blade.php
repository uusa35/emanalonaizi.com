@extends('site.layouts._one_col')

@section('content')


    @if($category->category_description)
        <div class="row">
            <div class="col-md-10 col-md-offset-1 ">
                <div class="alert alert-info text-center text-success " >
                    <h4 style="line-height: 161%;"><i class="fa fa-fw fa-pencil"></i><strong> {{ $category->category_description }}</strong></h4>
                </div>
            </div>
        </div>
    @endif



@foreach ($posts as $post)

    @include('site.posts.post_template')

@endforeach

{{ $posts->links() }}

@stop


