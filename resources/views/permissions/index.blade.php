@extends('layouts.app')
@section('content')
<div class="container">
    <div class="justify-content-center">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div>
        @endif
        <div class="card">
            <div class="card-header">{{__('Permissions')}}
                @can('permission-create')
                    <span class="float-right">
                        <a class="btn btn-primary" href="{{ route('permissions.create') }}">{{__('New Permission')}}</a>
                    </span>
                @endcan
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>{{__('Name')}}</th>
                            <th width="280px">{{__('Action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $permission)
                            <tr>
                                <td>{{ $permission->id }}</td>
                                <td>{{ $permission->name }}</td>
                                <td>
                                    <a class="btn btn-success" href="{{ route('permissions.show',$permission->id) }}"><i class="nav-icon fas fa-eye"></i></a>
                                    @can('permission-edit')
                                        <a class="btn btn-primary" href="{{ route('permissions.edit',$permission->id) }}"><i class="nav-icon fas fa-edit"></i></a>
                                    @endcan
                                    @can('permission-delete')
                                        {!! Form::open(['method' => 'DELETE','route' => ['permissions.destroy', $permission->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Delete',['class' => 'btn btn-danger btn-flat show_confirm','data-toggle'=>'tooltip','title'=>'delete']) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $data->appends($_GET)->links() }}
            </div>
        </div>
    </div>
</div>

@endsection