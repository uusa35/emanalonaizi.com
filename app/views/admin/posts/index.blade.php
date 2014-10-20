@extends('admin.layouts.home')
@section('content')

<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">
        <h3>{{ Lang::get('general.admin.all_posts') }}</h3>
    </div>
    <div class="panel-body">
    <!-- Table -->
    <div class="col-md-12">
        <table class="table table-bordered table-hovered table-striped table-responsive">
        <thead class="text-center">
            <th>id</th>
            <th>title</th>
            <th>{{ Lang::get('buttons.edit') }}</th>
            <th>{{ Lang::get('buttons.delete') }}</th>
        </thead>
            <tbody>
            @foreach($posts as $post)
            <tr >
                <td>{{ $post->id}}</td>
                <td>{{ $post->title }}</td>
                <td class="text-center"><button class="btn btn-info btn-sm">{{ Lang::get('buttons.edit') }}</button></td>
                <td class="text-center"><button class="btn btn-danger btn-sm">{{ Lang::get('buttons.delete')}}</button></td>


            </tr>
            @endforeach

            </tbody>
        </table>
        {{ $posts->links() }}
    </div>

    </div>
</div>
@stop