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
                    <th>{{ Lang::get('buttons.edit') }}</th>
                    <th>{{ Lang::get('buttons.delete') }}</th>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                    <tr >
                        <td>{{ $user->id}}</td>
                        <td>{{ $user->username }}</td>
                        <td class="text-center"><button class="btn btn-info btn-sm">{{ Lang::get('buttons.edit') }}</button></td>
                        <td class="text-center"><button class="btn btn-danger btn-sm">{{ Lang::get('buttons.delete')}}</button></td>


                    </tr>
                    @endforeach

                    </tbody>
                </table>
                {{ $users->links() }}
            </div>

        </div>
    </div>
@stop