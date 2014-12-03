@extends('admin.layouts.home')
@section('content')

<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">
        <h1><small>{{ Lang::get('general.admin.all_posts') }}</small></h1>
    </div>
    <!-- Table -->
    <div class="panel-body">
        <div class="col-md-12">
            <table class="table table-bordered table-hovered">
                <th>id</th>
                <th>{{ Lang::get('general.admin.title') }}</th>
                <th>{{ Lang::get('general.admin.description') }}</th>
                <th>{{ Lang::get('buttons.edit') }}</th>
                <tbody>
                @foreach($categories as $category)
                    <tr >
                        <td>{{ $category->id}}</td>
                        <td>{{ link_to_action('CategoryController@index',$category->name,$category->id) }}</td>
                        <td>{{ $category->category_description }}</td>
                        <td class="text-center"><a  class="edit btn btn-info btn-sm" href="{{ URL::action('AdminCategoryController@edit',$category->id) }}">{{ Lang::get('buttons.edit') }}</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop

@section('javascript')
    @parent
    {{ HTML::script('js/jquery.confirm.js') }}
    <script type="text/javascript">

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
    </script>
@stop