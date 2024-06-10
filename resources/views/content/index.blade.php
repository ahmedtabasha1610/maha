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
            <div class="card-header">
                @can('content-create')
                    <span class="float-right">
                        <a class="btn btn-primary" href="{{ route('content.create') }}">{{__('New Page')}}</a>
                    </span>
                @endcan
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>{{__('image')}}</th>
                            <th>{{__('Title')}}</th>
                            <th width="280px">{{__('Action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($content as $key => $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td><img src="{{asset($post->image)}}" width="75px" height="75px"></td>
                                <td>{{ $post->title }}</td>
                                <td>
                                    @can('content-edit')
                                        <a class="btn btn-primary" href="{{ route('content.edit',$post->id) }}">Edit</a>
                                    @endcan
                                    @can('content-delete')
                                        {!! Form::open(['method' => 'DELETE','route' => ['content.destroy', $post->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Delete',['class' => 'btn btn-danger btn-flat show_confirm','data-toggle'=>'tooltip','title'=>'delete']) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $content->appends($_GET)->links() }}
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
  
</script>
@endsection