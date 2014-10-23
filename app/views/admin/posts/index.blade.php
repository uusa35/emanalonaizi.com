@extends('admin.layouts.home')
@section('content')

<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-8"><h4>{{ Lang::get('general.admin.all_posts') }}</h4></div>
            <div class="col-md-4">{{ HTML::link(URL::action('AdminPostController@create'), Lang::get('buttons.add_new_post') , ['class'=>'btn btn-info pull-left']) }}</div>
        </div>
    </div>
    <div class="panel-body">
    <!-- Table -->
    <div class="col-md-12">
        <table class="table table-bordered table-hovered table-striped table-responsive">
        <thead class="text-center">
            <th>{{ Lang::get('general.id') }}</th>
            <th>{{ Lang::get('general.title') }}</th>
            <th>{{ Lang::get('buttons.edit') }}</th>
            <th>{{ Lang::get('buttons.delete') }}</th>
        </thead>
            <tbody>
            @foreach($posts as $post)
            <tr >
                <td>{{ $post->id}}</td>
                <td>{{ $post->title }}</td>
                <td class="text-center"><button class="btn btn-info btn-sm">{{ Lang::get('buttons.edit') }}</button></td>
                <td class="text-center">
                    {{ Form::open(['action'=>'AdminPostController@destroy','method'=>'delete','id'=>'form-'.$post->id]) }}
                        {{ Form::hidden('post_id',$post->id) }}
                        {{ Form::submit(Lang::get('buttons.delete'),['class'=>'delete btn btn-danger btn-sm ','post'=>$post->id]) }}
                    {{ Form::close() }}
                    </a></td>


            </tr>
            @endforeach

            </tbody>
        </table>
        {{ $posts->links() }}
    </div>

    </div>
</div>
@stop

@section('javascript')
    @parent
    {{ HTML::script('js/jquery.confirm.js') }}
<script type="text/javascript">
/*
    $(".delete").confirm({
        text: "تأكيـــد حــذف المقالة ..",
        title: "حــذف المقال",
        confirm: function(button) {
            var post_id = button.attr('post');
            *//*window.location.href = 'account/post/destroy/'+post_id;*//*
           return true;

        },
        cancel: function(button) {
            return false;
        }
    });*/
</script>
@stop