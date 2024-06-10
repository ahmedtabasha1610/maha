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
    .content {
        width: 50vmin;
        height: 50vmin;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        display: none;
    }

    .dot {
        --dot: 5vmin;
        background: radial-gradient(circle at 50% calc(5vmin + 2px), var(--w) var(--dot), #fff0 calc(var(--dot) + 2px));
        position: absolute;
        width: 100%;
        height: 100%;
        animation: spin 1.5s cubic-bezier(0.4, 0, 0.2, 1) 0s infinite;
    }

    @keyframes spin {

        0%,
        20% {
            transform: rotate(0deg);
            filter: drop-shadow(0 0 0 #fff0);
        }

        60% {
            filter: drop-shadow(-0.25vmin 0 0 var(--s)) drop-shadow(-0.25vmin 0 0 var(--s)) drop-shadow(-0.25vmin 0 0 var(--s));
        }

        100% {
            transform: rotate(360deg);
            filter: drop-shadow(0 0 0 #fff0);
        }
    }

    .dot:nth-child(2) {
        --dot: 4.5vmin;
        animation-delay: 0.05s;
    }

    .dot:nth-child(3) {
        --dot: 4vmin;
        animation-delay: 0.1s;
    }

    .dot:nth-child(4) {
        --dot: 3.5vmin;
        animation-delay: 0.15s;
    }

    .dot:nth-child(5) {
        --dot: 3vmin;
        animation-delay: 0.2s;
    }

    .dot:nth-child(6) {
        --dot: 2.5vmin;
        animation-delay: 0.25s;
    }

    .dot:nth-child(7) {
        --dot: 2vmin;
        animation-delay: 0.3s;
    }

    .dot:nth-child(8) {
        --dot: 1.5vmin;
        animation-delay: 0.35s;
    }

    .dot:nth-child(9) {
        --dot: 1vmin;
        animation-delay: 0.4s;
    }

    .dot:nth-child(10) {
        --dot: 0.5vmin;
        animation-delay: 0.45s;
    }

    :root {
        --b: #262626;
        --w: #dcdcd2;
        --s: #cccccc40;
    }

    p{
      font-size: 15px !important;
      font-weight: bold !important;
    }
    .x:hover{
      color: #ffc824 !important;
      font-weight: bold !important;
    }
    a:link{
        text-decoration: none;
    }
    span.a {
  display: inline; /* the default for span */
  width: 50px;
  height: 50px;
  padding: 5px;
 
  background-color: #000; 
}
span.b {
  display: inline; /* the default for span */
  width: 50px;
  height: 50px;
  padding: 5px;
 
  background-color: #ffc824; 
}
span.c {
  display: inline; /* the default for span */
  width: 50px;
  height: 50px;
  padding: 5px;
  background-color: green; 
}
span.d {
  display: inline; /* the default for span */
  width: 50px;
  height: 50px;
  padding: 5px;
  background-color: red; 
}
span.e {
  display: inline; /* the default for span */
  width: 50px;
  height: 50px;
  padding: 5px;
  background-color: blue; 
}
span.f {
  display: inline; /* the default for span */
  width: 50px;
  height: 50px;
  padding: 5px;
  background-color: orange; 
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
              <li class="breadcrumb-item active" aria-current="page"> /<a  class="x" href="{{route('homeuser')}}">
                {{__('Dashboard User')}}</a> </li>
            </ol>
          </nav>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4" style="background: #ffc824;color:#fff;">
            <div class="card-body text-center" style="color:#fff;">
              <img src="{{asset('storage/images-user-profile/'. Auth::user()->avater)}}" alt="avatar"
                class="rounded-circle img-fluid" style="width: 150px;">
              <h5 class="my-3"> {{Auth::user()->name}}</h5>
              <p class="" style="color:#fff;"> {{Auth::user()->specialization}}</p>
              <p class="" style="color:#fff;">{{Auth::user()->address}} </p>
        
            </div>
            
          </div>
          
          <div class="card mb-4 mb-lg-0">
            <div class="card-body p-0">
              <ul class="list-group list-group-flush rounded-3">
                <li class="list-group-item d-flex align-items-center">
                    <i class="fa fa-user fa-lg" style="color: #333333;"></i>&nbsp;&nbsp;
                    <p class="mb-0"><a href="{{route('profilegetuser')}}" class="x">  {{__('Edit profile information')}}</a> </p>
                </li>
           
                <li class="list-group-item d-flex align-items-center">
                  <i class="fa fa-user fa-lg" style="color: #333333;"></i>&nbsp;&nbsp;
                  <p class="mb-0"><a href="{{route('changePasswordGetuser')}}" class="x">{{__('Change password')}}</a> </p>
              </li>
                {{-- <li class="list-group-item d-flex  align-items-center ">
                  <i class="fa fa-paypal fa-lg" style="color: #333333;"></i>&nbsp;&nbsp;
                  <p class="mb-0"> {{__('Edit payment information')}}</p>
                </li> --}}
                <li class="list-group-item d-flex align-items-center ">
                    <i class="fa fa-question fa-lg" style="color: #333333;"></i>&nbsp;&nbsp;
                    <p class="mb-0"> <a href="{{route('myconsulting.index')}}" class="x"> حجوزاتي </a></p>
                  </li>
                  <li class="list-group-item d-flex align-items-center ">
                    <i class="fa fa-credit-card fa-lg" style="color: #333333;"></i>&nbsp;&nbsp;
                    <p class="mb-0"> <a href="{{route('paybook.index')}}" class="x">   {{__('pay book')}}</a></p>
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

     

        <div class="col-md-8">
            <div id="calendar">

            </div>

        </div>

      </div>
    </div>
  </section>
    
</head>

<body>
    <div class="box">
        <div class="content">

            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>

        </div>
    </div>



  

    <form id="formAjax" method="GET" action="#">
    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var booking = @json($events);

            $('#calendar').fullCalendar({
                header: {
                    left: 'prev, next today',
                    center: 'title',
                    right: 'month',
                },
                events: booking,
                selectable: true,
                selectHelper: true,
                select: function(start, end, startTime, endTime, allDays) {
                    $('#bookingModal').modal('toggle');

                },

                eventClick: function(event) {
                    var id = event.id;
                    if (confirm('Are you sure want to confirm booking ?')) {
                        // $('#formAjax').attr('action', "{{ route('calendaruser.update', '') }}" + '/' + id);
                        // $('#formAjax').submit();
                        $.ajax({
                            url: "{{ route('calendaruser.update', '') }}" + '/' + id,
                            type: "GET",
                            dataType: 'json',
                            beforeSend: function() {
                                $('.content').css('display', 'block');
                            },
                            success: function(response) {
                                swal("Good job!", "Event booking!", "success");
                                window.location.replace(response);
                            },
                            error: function(error) {
                                console.log(error)
                            },
                        });
                    }

                },
                selectAllow: function(event) {
                    return moment(event.start).utcOffset(false).isSame(moment(event.end).subtract(1, 'second').utcOffset(false), 'day');
                },

            });


            $("#bookingModal").on("hidden.bs.modal", function() {
                $('#saveBtn').unbind();
                $('.fc-event').css('background', '#ffc824');
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