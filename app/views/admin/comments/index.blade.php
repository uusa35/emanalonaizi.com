@extends('admin.layouts.home')
@section('content')
<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">
        <h4>{{ Lang::get('general.admin.all_comments') }}</h4>
    </div>
    <div class="panel-body">
        <!-- Table -->
        <div class="col-md-12">
            <table class="table table-bordered table-hovered table-striped table-responsive">
                <thead class="text-center">
                <th>{{ Lang::get('general.id') }}</th>
                <th>{{ Lang::get('general.title') }}</th>
                <th>{{ Lang::get('general.body') }}</th>
                <th>{{ Lang::get('buttons.delete') }}</th>
                </thead>
                <tbody>
                @foreach($comments as $comment)
                <tr >
                    <td>{{ $comment->id}}</td>
                    <td>{{ $comment->title}}</td>
                    <td>{{ $comment->body }}</td>
                    <td class="text-center"><button class="btn btn-danger btn-sm">{{ Lang::get('buttons.delete')}}</button></td>


                </tr>
                @endforeach

                </tbody>
            </table>
            {{ $comments->links() }}
        </div>

    </div>
</div>
@stop