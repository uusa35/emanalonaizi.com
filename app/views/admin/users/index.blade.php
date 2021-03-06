@extends('admin.layouts.home')
    @section('content')
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">
            <h4>{{ Lang::get('general.admin.all_users') }}</h4>
        </div>
        <div class="panel-body">
            <!-- Table -->
            <div class="col-md-12">
                <table class="table table-bordered table-hovered table-striped table-responsive">
                    <thead class="text-center">
                    <th>{{ Lang::get('general.id') }}</th>
                    <th>{{ Lang::get('general.username') }}</th>
                    <th>{{ Lang::get('buttons.delete') }}</th>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                    <tr >
                        <td>{{ $user->id}}</td>
                        <td>{{ $user->username }}</td>
                        <td class="text-center">
                        {{ Form::open(['action'=>'AdminAccountController@update','method'=>'post','id'=>'form-'.$user->id]) }}
                        {{ Form::hidden('user_id',$user->id) }}
                            @if($user->active)
                                {{ Form::hidden('status',0) }}
                                {{ Form::submit(Lang::get('buttons.deactivate'),['class'=>'delete  btn btn-danger btn-sm ','user_id'=>$user->id,'message'=>'الغاء التفعيل']) }}
                            @else
                                {{ Form::hidden('status',1) }}
                                {{ Form::submit(Lang::get('buttons.activate'),['class'=>'delete  btn btn-primary btn-sm ','user_id'=>$user->id, 'message'=>'إعادة التفعيل']) }}
                            @endif
                        {{ Form::close() }}
                        </td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
                {{ $users->links() }}
            </div>

        </div>
    </div>
@stop

@section('javascript')
@parent
{{ HTML::script('js/jquery.confirm.js') }}
<script type="text/javascript">

    $(".delete").confirm({
        text: $(this).attr('message'),
        title: $(this).attr('message'),
        confirm: function(button) {
            var user_id = button.attr('user_id');
            $('#form-'+user_id).submit();
        },
        cancel: function(button) {
            return false;
        }
    });
</script>
@stop