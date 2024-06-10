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

        <div class="card-header">{{__('Users')}}
            <span class="float-right">
                <a class="btn btn-primary" href="{{ route('users.create') }}">{{__('New User')}}</a>
            </span>
        </div>
        <div class="card-body">
            <table id="users1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>#</th>
                <th>{{__('Name')}}</th>
                <th>{{__('Email')}}</th>
                <th>{{__('Roles')}}</th>
                <th>{{__('Phone')}}</th>
                <th>{{__('Status')}}</th>
                
                <th>{{__('Created At')}}</th>

                <th width="280px">{{__('Action')}}</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($data as $key => $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
        
                    <td>
                        @if(!empty($user->getRoleNames()))
                            @foreach($user->getRoleNames() as $val)
                                <label class="badge badge-dark">{{ $val }}</label>
                            @endforeach
                        @endif
                    </td>
                    <td>{{ $user->phone }}</td>
                    <td>@if($user->status==1)
                        <a href="#" class="btn btn-success">{{__('OK')}}</a>
                        @else
                        <a href="#" class="btn btn-danger">{{__('Not Agree')}}</a>
                        @endif
                    </td>
                   
                    <td>{{ $user->created_at }}</td>

                    <td>
                        <a class="btn btn-success" href="{{ route('users.show',$user->id) }}">Show</a>
                        @can('user-edit')
                            <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                        @endcan
                        @can('user-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-flat show_confirm','data-toggle'=>'tooltip','title'=>'delete']) !!}
                            {!! Form::close() !!}
                        @endcan
                    </td>
                </tr>
            @endforeach
               
              </tbody>
      
            </table>
          </div>
          <script>
    $(document).ready(function () {
    var table = $('#users1').DataTable({
        scrollY: "100%",
        scrollX: '200px',
        paging: true,
        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#users1_wrapper .col-md-6:eq(0)');
 
    $('a.toggle-vis').on('click', function (e) {
        e.preventDefault();
 
        // Get the column API object
        var column = table.column($(this).attr('data-column'));
 
        // Toggle the visibility
        column.visible(!column.visible());
    });
});
          </script>

          
    </div>
</div>
</div>
@endsection