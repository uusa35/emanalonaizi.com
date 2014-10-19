@extends('admin.layouts.home')
@section('content')

<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">
        <h1><small>{{ Lang::get('general.admin.all_posts') }}</small></h1>
    </div>

    <!-- Table -->
    <div class="col-md-12">
        <table class="table table-bordered table-hovered">
            {{ dd($posts[0]->toArray())}}
            <th>id</th>
            <th>title</th>
            <th>body</th>
            <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{ $post->id}}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->images}}</td>
                <td>{{ $post->availability }}</td>
                <td>{{ Form::open(array('url'=> array('admin/posts/toggle_availability', $post->availability))) }}
                    {{ Form::select('availability', array('1'=>'In Stock','0'=>'Out of Stock'),$post->availability, array('class'=>'form-control')) }}
                    {{ Form::submit('submit', array('class'=>'btn btn-default')) }}
                    {{ Form::close() }}
                </td>
                <td>
                    {{ Form::open(array('url'=>array('admin/posts/destroy', $post->id), 'method'=>'DELETE')) }}
                    {{ Form::submit('Delete', array('class'=>'btn btn-danger' ))}}
                    {{ Form::close() }}
                </td>
            </tr>
            @endforeach
            @else
            there is no posts
            @endif
            </tbody>
        </table>
    </div>
</div>
@stop