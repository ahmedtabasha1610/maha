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
            <div class="card-header">{{__('Finances')}}
           
        
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>{{__('Order')}}</th>
                            <th>{{__('Name')}}</th>
                            <th>{{__('Email')}}</th>
                            <th>{{__('Phone')}}</th>
                            <th>{{__('Type')}}</th>
                            <th>{{__('Status')}}</th>
                            <th>{{__('Residual')}}</th>
                            <th>{{__('Transaction')}}</th>
                            <th width="280px">{{__('Action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($purchase as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->order_id}}</td>
                                <td>{{$item->advisor->name}} &nbsp; {{$item->advisor->lastname}}</td>
                                <td>{{$item->advisor->email}}</td>
                                <td>{{$item->advisor->phone}}</td>
                                <td style="color: blue;font-weight:bold;">{{$item->status}}</td>
                                <td>
                                    @if($item->confirm == 'no')
                                     <a href="#" class="btn btn-danger">{{__('No')}}</a>
                                    @else 
                                    <a href="#" class="btn btn-success">{{__('Yes')}}</a>

                                    @endif
                                </td>
                                <td>{{$item->residual}} &nbsp; {{$item->currency}}</td>
                                <td>{{$item->transaction_id}}</td>
                                <td>
                                    <a href="{{route('finances.edit',$item->id)}}" class="btn btn-info edit">edit</a>
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
