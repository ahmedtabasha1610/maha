@extends('dashadvisor.dashboardadvisor')
@section('content-user')
<!-- Button trigger modal -->


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
          <option value="ok">{{__('ok')}}</option>
          <option value="canceled">{{__('canceled')}}</option>
        </select>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-warning updatepurchese">Save changes</button>
      </div>


    </div>
  </div>
</div>
<div class="col-lg-8">
          <div id="success_message"></div>

    <div class="card mb-4">
      <div class="card-body">
         <h3 style="text-align: center;">{{__('Reservations details')}}</h3>
         <div class="table-responsive">
          <table id="dtBasicExample" class="table" cellspacing="0" width="60%">
              <thead>
                <tr>
                    <th class="th-sm">#</th>
                  <th class="th-sm"> {{__('Name')}}
                  </th>
                  <th class="th-sm">{{__('Email')}}
                </th>
                <th class="th-sm">{{__('Phone')}}
                </th>


                  <th class="th-sm">{{__('Created At')}}
                  </th>

                  <th class="th-sm">{{__('Status')}}
                </th>
                <th class="th-sm">{{__('more')}}
                </th>
                </tr>
              </thead>
              <tbody>

            @foreach ($purchases as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->client->name}} &nbsp;{{$item->client->lastname}}</td>
                <td>{{$item->client->email}}</td>
                <td>{{$item->client->phone}}</td>

                <td>{{$item->created_at}}</td>
                <td>@if($item->status=='waiting')
                  <a href="#" style="color: coral;font-weight:bold;">{{__('waiting')}}</a>
                  @elseif($item->status=='ok')
                  <a href="#" style="color: green;font-weight:bold;">{{__('ok')}}</a>

                  @elseif($item->status=='canceled')
                  <a href="#" style="color: red;font-weight:bold;">{{__('canceled')}}</a>


                  @else
                  <a href="#" style="color: rgb(146, 116, 201);font-weight:bold;">{{__('pendding')}}</a>

                  @endif

                </td>
                <td><button value="{{$item->id}}"   style="color: #fff;font-weight:bold;background:#fda12b;"  data-toggle="modal" data-target="#exampleModal" class="btn editbtn">{{__('Edit')}}</button></td>
              </tr>
            @endforeach

              </tbody>
            </table>
         </div>
            {{$purchases->links()}}
      </div>
    </div>
    <div class="row">


    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script>
   $(document).on('click', '.editbtn', function (e) {
            e.preventDefault();
            var stud_id = $(this).val();
           //alert(stud_id);
            $('#exampleModal').modal('show');
            $.ajax({
                type: "GET",
                url: "/purchase/" + stud_id +"/edit",
                success: function (response) {
                    if (response.status == 404) {
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#exampleModal').modal('hide');
                    } else {
                      //  console.log(response.purchase.status);
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
                url: "/purchase/" +id ,
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
@stop
