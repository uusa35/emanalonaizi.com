@extends('admin.layouts.home')
@section('content')

<div class="panel panel-default" xmlns="http://www.w3.org/1999/html">
    <!-- Default panel contents -->
    <div class="panel-heading">
        <div class="row">
            <div class="col-md-4"><h4>{{ Lang::get('general.admin.all_posts') }}</h4></div>
            <div class="col-md-8">{{ HTML::link(URL::action('AdminPostController@create'), Lang::get('buttons.add_new_post') , ['class'=>'btn btn-info pull-left']) }}</div>
        </div>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                {{ Form::select('category', $categories, Request::segment(3),['class'=>'form-control input-lg category-selection']) }}
                <br />
            </div>
        </div>

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
            @if($post->id != 1)
            <tr >
                <td>{{ $post->id}}</td>
                <td>{{ link_to_action('PostController@show',$post->title,$post->id) }}</td>
                <td class="text-center"><a  class="edit btn btn-info btn-sm" href="{{ URL::action('AdminPostController@edit',$post->id) }}">{{ Lang::get('buttons.edit') }}</a></td>
                <td class="text-center">
                    {{ Form::open(['action'=>'AdminPostController@destroy','method'=>'delete','id'=>'form-'.$post->id]) }}
                        {{ Form::hidden('post_id',$post->id) }}
                        {{ Form::submit(Lang::get('buttons.delete'),['class'=>'delete btn btn-danger btn-sm ','post'=>$post->id]) }}
                    {{ Form::close() }}
                    </td>
            </tr>
            @endif
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

    $(".delete").confirm({
        text: "are you sure ?",
        title: "Confirmation",
        confirm: function(button) {
            var post_id = button.attr('post');
            $('#form-'+post_id).submit();
        },
        cancel: function(button) {
            return false;
        }
    });
    $(".edit").confirm({
        text: "are you sure ?",
        title: "Confirmation",
        confirm: function(button) {
            var post_id = button.attr('post');
            window.location.href = button.attr('href');
        },
        cancel: function(button) {
            return false;
        }
    });
    $('.category-selection').on('change',function () {
        var catVal = $(this).val();
        window.location.href = '/admin/account/'+catVal;
    });
</script>
@stop