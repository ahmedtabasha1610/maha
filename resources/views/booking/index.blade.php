@extends('layouts.app')
@section('content')
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
     
        <div class="modal-body">
          <ul id="update_msgList"></ul>
          <input type="hidden" id="stud_id" />
          <label>{{__('Status')}}</label>
          <select name="status" id="status">
            <option value="completed">{{__('completed')}}</option>
            <option value="refunded">{{__('refunded')}}</option>
          </select>
       
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary updatepurchese">Save changes</button>
        </div>
  
        
      </div>
    </div>
  </div>
<div class="container">
    <div class="justify-content-center">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div>
        @endif
        <div id="success_message"></div>

        <div class="card">
            <div class="card-header">{{__('bookings')}}
           
            </div>
            <div class="card-body">
                <table class="table table-hover" id="task2">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>{{__('Order Num')}}</th>
                            <th>{{__('Transaction')}}</th>
                            <th>{{__('Payment Method')}}</th>
                            <th>{{__('Employee Name')}}</th>
                            <th>{{__('UserName')}}</th>
                            <th>{{__('Cost')}}</th>
                            <th>{{__('status')}}</th>
                            <th>{{__('profit 40%')}}</th>
                            <th>{{__('amount')}}</th>
                            <th>{{__('Delivery time')}}</th>
                            <th>{{__('Day')}}</th>
                            <th>{{__('Createad At')}}</th>

                            <th width="">{{__('Action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                      
                        @foreach ($purchase as $key => $pur)
                            <tr>
                                <td>{{ $pur->id }}</td>
                                <td>{{ $pur->order_id }}</td>
                                <td>{{$pur->transaction_id}}</td>
                                <td>{{$pur->payment_method}}</td>
                                <td>{{ $pur->advisor->name }} &nbsp;{{$pur->advisor->lastname}}</td>
                                <td>{{ $pur->client->name }} &nbsp;{{$pur->client->lastname}}</td>
                                <td>{{$pur->total_amount}} &nbsp;{{$pur->currency}}</td>

                                <td>@if($pur->status=='waiting')
                                    <a href="#" style="color: coral;font-weight:bold;">{{__('waiting')}}</a>
                                    @elseif($pur->status=='ok')
                                    <a href="#" style="color: green;font-weight:bold;">{{__('ok')}}</a>
                  
                                    @elseif($pur->status=='canceled')
                                    <a href="#" style="color: red;font-weight:bold;">{{__('canceled')}}</a>
                                    @elseif($pur->status=='completed')
                                    <a href="#" style="color: blue;font-weight:bold;">{{__('completed')}}</a>
                  
                                    @elseif($pur->status=='refunded')
                                    <a href="#" style="color: orange;font-weight:bold;">{{__('refunded')}}</a>
                  
                  
                                    @else
                                    <a href="#" style="color: rgb(146, 116, 201);font-weight:bold;">{{__('pendding')}}</a>
                  
                                    @endif
                                  
                                  </td>
                                  <td>{{$pur->disacount}}</td>
                                  <td>{{$pur->residual}}</td>
                                  <td>{{$pur->delivery_time}}</td>
                                  <td>{{$pur->day}}</td>
                                 
                                <td>{{$pur->created_at}}</td>
                                 @can('booking-delete')
                                <td>
                                        {!! Form::open(['method' => 'DELETE','route' => ['booking.destroy', $pur->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Delete',['class' => 'btn btn-danger btn-flat show_confirm','data-toggle'=>'tooltip','title'=>'delete']) !!}
                                        {!! Form::close() !!}

                                
                                @endcan
                                <button value="{{$pur->id}}"    data-toggle="modal" data-target="#exampleModal" class="btn editbtn">{{__('Edit')}}</button>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $purchase->appends($_GET)->links() }}
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

<script>

    $(document).on('click', '.editbtn', function (e) {
             e.preventDefault();
             var stud_id = $(this).val();
           // alert(stud_id);
             $('#exampleModal').modal('show');
             $.ajax({
                 type: "GET",
                 url: "/booking/" + stud_id +"/edit",
                 success: function (response) {
                     if (response.status == 404) {
                         $('#success_message').addClass('alert alert-success');
                         $('#success_message').text(response.message);
                         $('#exampleModal').modal('hide');
                     } else {
                        // console.log(response.purchase.status);
                         $('#status').val(response.purchase.status);
                         $('#stud_id').val(stud_id);
                     }
                 }
             });
             $('.btn-close').find('input').val('');
 
         });
 
         $(document).on('click', '.updatepurchese', function (e) {
            e.preventDefault();

            $(this).text('Updating..');
            var id = $('#stud_id').val();
          //alert(id);
            var data = {
                'status': $('#status').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "PATCH",
                url: "/booking/" +id ,
                data: data,
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    if (response.status == 400) {
                        $('#update_msgList').html("");
                        $('#update_msgList').addClass('alert alert-danger');
                        $.each(response.errors, function (key, err_value) {
                            $('#update_msgList').append('<li>' + err_value +
                                '</li>');
                        });
                        $('.updatepurchese').text('Update');
                    } else {
                        //$('#update_msgList').html("");
                        //$('#success_message').addClass('alert alert-success');
                        //$('#success_message').text(response.message);
                        //$('#exampleModal').find('input').val('');
                        $(document).ajaxStop(function(){
                            window.location.reload();
                        });
                        //$('.updatepurchese').text('Update');
                        //$('#exampleModal').modal('hide');
                    }
                }
            });

        });
 
 
 </script>
 

    
 <script>
  $(document).ready(function () {
  var table = $('#task2').DataTable({
      scrollY: "100%",
      scrollX: '600px',
      paging: true,
      stateSave:true,
      buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#task2_wrapper .col-md-6:eq(0)');

  $('a.toggle-vis').on('click', function (e) {
      e.preventDefault();

      // Get the column API object
      var column = table.column($(this).attr('data-column'));

      // Toggle the visibility
      column.visible(!column.visible());
  });
});
        </script>
@endsection
