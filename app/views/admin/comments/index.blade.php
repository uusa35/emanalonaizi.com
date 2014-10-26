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
                    <td>{{ Str::limit($comment->body , 180) }}</td>
                    <td class="text-center">
                        {{ Form::open(['action'=>'AdminCommentController@destroy','method'=>'delete','id'=>'form-'.$comment->id]) }}
                        {{ Form::hidden('comment_id',$comment->id) }}
                        {{ Form::submit(Lang::get('buttons.delete'),['class'=>'delete btn btn-danger btn-sm ','comment'=>$comment->id]) }}
                        {{ Form::close() }}

                    </td>


                </tr>
                @endforeach

                </tbody>
            </table>
            {{ $comments->links() }}
        </div>

    </div>
</div>
@stop
@section('javascript')
@parent
{{ HTML::script('js/jquery.confirm.js') }}
<script type="text/javascript">

    $(".delete").confirm({
        text: "تأكيد حذف التعليق..",
        title: "حذف التعليق",
        confirm: function(button) {
            var comment_id = button.attr('comment');
            $('#form-'+comment_id).submit();
        },
        cancel: function(button) {
            return false;
        }
    });
</script>
@stop