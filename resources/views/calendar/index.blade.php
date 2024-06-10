<!DOCTYPE html>
<html lang="{{ App::currentLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}"  xml:lang="en">

<head>


<meta charset="utf-8">
<title>Esteshari|@yield('title')</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport">

<link href="{{asset('front/Content/img/svg/logo.svg')}}" rel="icon">
<link href="{{asset('front/Content/img/svg/logo.svg')}}" rel="apple-touch-icon">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<style>
    p{
      font-size: 15px !important;
      font-weight: bold !important;
    }
    .x:hover{
      color: #660d33 !important;
      font-weight: bold !important;
    }
    a:link{
        text-decoration: none;
    }


  </style>
  @if(App::currentLocale()=='ar')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link defer rel="stylesheet" href="{{asset('front/Content/Landing/lib/LandingLayout.min.css')}}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script><link rel="stylesheet" href="{{asset('front/Content/css/corner-popup.min.css')}}" />
<link rel="stylesheet" href="{{asset('front/Content/Landing/css/rtl.css')}}" />

<link rel="stylesheet" href="{{asset('front/Content/css/landing.css')}}" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo&family=Noto+Kufi+Arabic:wght@400;500&display=swap" rel="stylesheet">

   <style>
     *{
        font-family: 'Cairo', sans-serif;
     }

    </style>
@else

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link defer rel="stylesheet" href="{{asset('front/Content/Landing/lib/LandingLayout.min.css')}}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script><link rel="stylesheet" href="{{asset('front/Content/css/corner-popup.min.css')}}" />

<link rel="stylesheet" href="{{asset('front/Content/css/landing.css')}}" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo&family=Noto+Kufi+Arabic:wght@400;500&display=swap" rel="stylesheet">

   <style>
     *{
        font-family: 'Cairo', sans-serif;
     }

    </style>
@endif


</head>
<body style="background-color: #eee;">
<br>



    <section style="background-color: #eee;" >
<div class="container py-5">
    <div class="row" style="background:#fff;">
        <div class="col" >
            <br>
          <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4" style="background: #e9ecef;" >
            <ol class="breadcrumb mb-0" >
              <li class="breadcrumb-item"><a href="{{url('/')}}" class="x">{{__('Home')}}</a></li>
              <li class="breadcrumb-item active" aria-current="page"> /<a  class="x" href="{{route('homeadvisor')}}">
                {{__('Dashboard Advisor')}}</a> </li>
            </ol>
          </nav>
        </div>
      </div>
      <br>
    <div class="row" style="">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
              <img src="{{asset('storage/images-user-profile/'. Auth::user()->avater)}}" alt="avatar"
                class="rounded-circle img-fluid" style="width: 150px;">
              <h5 class="my-3"> {{Auth::user()->name}}</h5>
              <p class="text-muted mb-1"> {{Auth::user()->specialization}}</p>
              <p class="text-muted mb-4">{{Auth::user()->address}} </p>

            </div>
          </div>

          <div class="card mb-4 mb-lg-0">
            <div class="card-body p-0">
              <ul class="list-group list-group-flush rounded-3">
                <li class="list-group-item d-flex align-items-center">
                  <i class="fa fa-user fa-lg" style="color: #333333;"></i>&nbsp;&nbsp;
                  <p class="mb-0"><a href="{{route('profileget')}}" class="x">  {{__('Edit profile information')}}</a> </p>
              </li>

              <li class="list-group-item d-flex align-items-center">
                <i class="fa fa-user fa-lg" style="color: #333333;"></i>&nbsp;&nbsp;
                <p class="mb-0"><a href="{{route('careerinfoadvisor')}}" class="x">  {{__('Career information')}}</a> </p>
            </li>
              <li class="list-group-item d-flex align-items-center">
                <i class="fa fa-user fa-lg" style="color: #333333;"></i>&nbsp;&nbsp;
                <p class="mb-0"><a href="{{route('changePasswordGet')}}" class="x">{{__('Change password')}}</a> </p>
            </li>

                <li class="list-group-item d-flex align-items-center ">
                    <i class="fa fa-question fa-lg" style="color: #333333;"></i>&nbsp;&nbsp;
                    <p class="mb-0"> <a href="{{route('calendar.index')}}" class="x">  {{__('Booking dates')}} </a></p>
                  </li>
                  <li class="list-group-item d-flex  align-items-center ">
                    <i class="fa fa-file fa-lg" style="color: #333333;"></i>&nbsp;&nbsp;
                    <p class="mb-0"> <a href="{{route('purchase.index')}}" class="x">{{__('Reservations details')}}</a></p>
                  </li>
                  <li class="list-group-item d-flex align-items-center ">
                    <i class="fa fa-credit-card fa-lg" style="color: #333333;"></i>&nbsp;&nbsp;
                    <p class="mb-0"> <a href="x.html" class="x">  {{__('Balance')}}</a></p>
                  </li>
                  <li class="list-group-item d-flex align-items-center ">
                    <i class="fa fa-sign-out fa-lg" style="color: #333333;"></i>&nbsp;&nbsp;
                    <p class="mb-0">
                      <a  href="{{ route('logout') }}" class="x"
                      onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">


                {{__('Logout')}}</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
                    </p>
                  </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-8" style="background: #fff;">
            <br>
            <h3 style="text-align: center;">{{__('Booking dates')}}</h3>
                <br>
                <div>

                      <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-fill" viewBox="0 0 16 16" style="color: #660d33;">
                          <path fill-rule="evenodd" d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.004-.001.274-.11a.75.75 0 0 1 .558 0l.274.11.004.001 6.971 2.789Zm-1.374.527L8 5.962 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339Z"/>
                        </svg>
                        </span>
                        {{__('Reservations are available')}}
                        <br>
                        <br>
                         <span>
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-fill" viewBox="0 0 16 16" style="color: #000;">
                            <path fill-rule="evenodd" d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.004-.001.274-.11a.75.75 0 0 1 .558 0l.274.11.004.001 6.971 2.789Zm-1.374.527L8 5.962 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339Z"/>
                          </svg>
                    </span>
                       {{__('Reservations not available')}}
                        <br>
                        <br>

                       <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-fill" viewBox="0 0 16 16" style="color: green;">
                          <path fill-rule="evenodd" d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.004-.001.274-.11a.75.75 0 0 1 .558 0l.274.11.004.001 6.971 2.789Zm-1.374.527L8 5.962 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339Z"/>
                        </svg>
                    </span>
                       {{__('Reservations approved')}}
                        <br>
                        <br>

                       <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-fill" viewBox="0 0 16 16" style="color: red;">
                          <path fill-rule="evenodd" d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.004-.001.274-.11a.75.75 0 0 1 .558 0l.274.11.004.001 6.971 2.789Zm-1.374.527L8 5.962 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339Z"/>
                        </svg>
                    </span>
                       {{__('Unacceptable reservations')}}
                        <br>
                        <br>

                       <span >
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-fill" viewBox="0 0 16 16" style="color: blue;">
                          <path fill-rule="evenodd" d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.004-.001.274-.11a.75.75 0 0 1 .558 0l.274.11.004.001 6.971 2.789Zm-1.374.527L8 5.962 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339Z"/>
                        </svg>
                    </span>
                       {{__('Completed reservations')}}
                        <br>
                        <br>

                       <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-fill" viewBox="0 0 16 16" style="color: orange;">
                          <path fill-rule="evenodd" d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.004-.001.274-.11a.75.75 0 0 1 .558 0l.274.11.004.001 6.971 2.789Zm-1.374.527L8 5.962 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339Z"/>
                        </svg>
                    </span>
                       {{__('Canceled reservations')}}
                        <br>
                        <br>

                     </div>
                     <br><br>
                  <div id="calendar">

                  </div>

              </div>
      </div>
</div>
    </section>
  <!-- Modal -->
  <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Booking Time</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        {{-- <div class="modal-body">
          <input type="text" class="form-control" id="title">
          <span id="titleError" class="text-danger"></span>
        </div> --}}
        <div class="modal-body">
            <input type="time" class="form-control" id="start_time">
            <span id="start_timeError" class="text-danger"></span>

          </div>
          <div class="modal-body">
            <input type="time" class="form-control" id="end_time">
            <span id="end_timeError" class="text-danger"></span>

          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" id="saveBtn" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

    <div class="container">
        <div class="row">
            <div class="col-12">



            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var booking = @json($events);
            //console.log(booking)
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev, next today',
                    center: 'title',
                    right: 'month, agendaWeek, agendaDay',
                },
                events: booking,
                selectable: true,
                selectHelper: true,
                select: function(start, end,startTime,endTime,allDays) {
                    $('#bookingModal').modal('toggle');

                    $('#saveBtn').click(function() {
                        var title = $('#title').val();
                        var start_time = $('#start_time').val();
                        var end_time = $('#end_time').val();
                        var start_date = moment(start).format('YYYY-MM-DD');
                        var end_date = moment(end).format('YYYY-MM-DD');

                        $.ajax({
                            url:"{{ route('calendar.store') }}",
                            type:"POST",
                            dataType:'json',
                            data:{ title, start_date, end_date, start_time, end_time  },
                            success:function(response)
                            {
                                $('#bookingModal').modal('hide')

                                $('#calendar').fullCalendar('renderEvent', {
                                    'title': response.title,
                                    'start_time': response.startTime,
                                    'end_time': response.endTime,
                                    'start' : response.start,
                                    'end'  : response.end,
                                    'color' : response.color
                                });
                               $(document).ajaxStop(function(){
                            window.location.reload();
                        });
                            },
                            error:function(error)
                            {
                                if(error.responseJSON.errors) {
                                    $('#titleError').html(error.responseJSON.errors.title);
                                    $('#start_timeError').html(error.responseJSON.errors.start_time);
                                    $('#end_timeError').html(error.responseJSON.errors.end_time);
                                }
                            },
                        });
                    });
                },
                editable: true,
                eventDrop: function(event) {
                    var id = event.id;
                    var start_date = moment(event.start).format('YYYY-MM-DD');
                    var end_date = moment(event.end).format('YYYY-MM-DD');
                    var color = event.color;
                    if(color=='#660d33'){
                    $.ajax({
                            url:"{{ route('calendar.update', '') }}" +'/'+ id,
                            type:"PATCH",
                            dataType:'json',
                            data:{ start_date, end_date  },
                            success:function(response)
                            {
                                swal("Good job!", "Event Updated!", "success");
                            },
                            error:function(error)
                            {
                                console.log(error)
                            },
                        });
                    }{
                    alert('لايمكنك  التحديث على بيانات هذا الحجز')
                     }

                },
                eventClick: function(event){
                    var id = event.id;
                    var color = event.color;
                if(color=='#660d33'){
                    if(confirm('Are you sure want to remove it')){
                        $.ajax({
                            url:"{{ route('calendar.destroy', '') }}" +'/'+ id,
                            type:"DELETE",
                            dataType:'json',
                            success:function(response)
                            {
                                $('#calendar').fullCalendar('removeEvents', response);
                                swal("Good job!", "Event Deleted!", "success");
                            },
                            error:function(error)
                            {
                                console.log(error)
                            },
                        });
                    }
                }else{
                    alert('لايمكنك حذف هذا الحجز')
                     }

                },
                selectAllow: function(event)
                {
                    return moment(event.start).utcOffset(false).isSame(moment(event.end).subtract(1, 'second').utcOffset(false), 'day');
                },



            });


            $("#bookingModal").on("hidden.bs.modal", function () {
                $('#saveBtn').unbind();
                $('.fc-event').css('background', '#660d33');
            });

            $('.fc-event').css('font-size', '13px');
            $('.fc-event').css('width', '100px');
            $('.fc-event').css('text-align', 'center');

            $('.fc-time').empty();


        });
    </script>
    <br><br>
            @include('frontlayout.footer')

</body>
</html>
