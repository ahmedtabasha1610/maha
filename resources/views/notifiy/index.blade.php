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
            <div class="card-header">{{__('Notification')}}
                <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('ordernotifiy.create') }}">{{__('New Notification')}}</a>
                </span>
            </div>
        
            <div class="card-body">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>{{__('Title')}}</th>
                            <th>{{__('header')}}</th>
                            <th>{{__('Description')}}</th>
                            <th>{{__('URL')}}</th>
                            <th>{{__('id')}}</th>
                            <th width="280px">{{__('Action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($notifies as $key => $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                            
                                    @php $p=json_decode($post->data);
                                 
                                    @endphp
                                    @foreach ( $p as $key=>$item)
                                      <td>  {{$item}}</td>
                                    @endforeach
                            
                                <td>
                                
                                 
                                        {!! Form::open(['method' => 'DELETE','route' => ['order.notifydestroy', $post->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Delete',['class' => 'btn btn-danger btn-flat show_confirm','data-toggle'=>'tooltip','title'=>'delete']) !!}
                                        {!! Form::close() !!}
                                
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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