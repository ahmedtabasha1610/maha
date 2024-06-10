<!DOCTYPE html>
<html lang="{{ App::currentLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')|Dashboard</title>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  @if(App::currentLocale()=='en')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha256-aAr2Zpq8MZ+YA/D6JtRD3xtrwpEz2IqOS+pWD/7XKIw=" crossorigin="anonymous" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha256-OFRAJNoaD8L3Br5lglV7VyLRf0itmoBzWUoM+Sji4/8=" crossorigin="anonymous"></script>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('BackLayout/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('BackLayout/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('BackLayout/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('BackLayout/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('BackLayout/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('BackLayout/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('BackLayout/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('BackLayout/plugins/summernote/summernote-bs4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('BackLayout/plugins/ijaboCropTool/ijaboCropTool.min.css') }}">
  <link rel="stylesheet" href="{{ asset('BackLayout/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('BackLayout/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('BackLayout/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('BackLayout/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@else
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha256-aAr2Zpq8MZ+YA/D6JtRD3xtrwpEz2IqOS+pWD/7XKIw=" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha256-OFRAJNoaD8L3Br5lglV7VyLRf0itmoBzWUoM+Sji4/8=" crossorigin="anonymous"></script>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('ar/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{asset('ar/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('ar/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('ar/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('ar/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('ar/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('ar/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('ar/plugins/summernote/summernote-bs4.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Bootstrap 4 RTL -->
  <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css">
  <!-- Custom style for RTL -->
  <link rel="stylesheet" href="{{asset('ar/dist/css/custom.css')}}">
  <link rel="stylesheet" href="{{ asset('ar/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('ar/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('ar/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('ar/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endif




</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('home')}}" class="nav-link">Home</a>
          </li>
          @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
          <li class="nav-item d-none d-sm-inline-block">
          <a  class="nav-link" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
            <i class="fas fa-language fa-lg"></i>
            {{ $properties['native'] }}
          </a>
        </li>
       @endforeach
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">






      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">{{Auth::user()->unreadNotifications()->where('type', 'App\Notifications\NewUserRegisterNotification')->count()}}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">({{Auth::user()->unreadNotifications()->where('type', 'App\Notifications\NewUserRegisterNotification')->count()}}){{__('Notifications')}}</span>


            @forelse (auth()->user()->unReadNotifications->where('type', 'App\Notifications\NewUserRegisterNotification') as $notification)

                <div class="dropdown-divider"></div>

                   <a href="{{route('marksreadnewuserregister.show',['id'=>$notification->id,'user_id'=>$notification->data['user_id']])}}" class="dropdown-item">
                    {{$notification->data['title']}}
                    </a>
                  <span class="float-right text-muted text-sm">{{$notification->data['body']}}</span>

                @empty
                <a class="dropdown-item">{{__('no record found')}}</a>

             @endforelse



          <div class="dropdown-divider"></div>
          <a href="{{route('marksallreadnewuserregister.showall')}}" class="dropdown-item dropdown-footer" style="background:#c0c0c0;"><i class="far fa-bell"></i>&nbsp;&nbsp;&nbsp;{{__('Read All')}}</a>
        </div>
      </li>

          <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
              <i class="fas fa-expand-arrows-alt"></i>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.navbar -->
  <!-- Navbar -->



  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link" style="margin-left:20px;border-bottom: 1px solid #Fff;">
      <span class="brand-text font-weight-light">خدمات بيتك</span>
    </a>

    <div class="sidebar">

      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('storage/images-admin-profile/'.Auth::user()->avater)}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <nav class="mt-2">

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          @guest
          @if (Route::has('login'))
          <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
         @endif
         @if (Route::has('register'))
          <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
          </li>
        @endif

        @else

          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                {{__('Managment System')}}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @can('user-list')
              <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link active ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('All User')}}</p>
                </a>
              </li>
              @endcan


                <li class="nav-item">
                  <a href="{{ route('profileadmin') }}" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>{{__('Profile')}} </p>
                  </a>
                </li>

              @can('role-list')
              <li class="nav-item">
                <a href="{{ route('roles.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('Roles')}}</p>
                </a>
              </li>
              @endcan
              @can('permission-list')
              <li class="nav-item">
                <a href="{{ route('permissions.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('Permission')}}</p>
                </a>
              </li>
              @endcan

            </ul>
          </li>
           @can('all-advisors')
          <li class="nav-item">
            <a href="{{route('all.advisor')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
               المختصين
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          @endcan
          @can('Notification')
          <li class="nav-item">
            <a href="{{route('ordernotifiy.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
               {{__('Notification')}}
                <span class="right badge badge-danger"><i class="fas fa-bell"></i></span>
              </p>
            </a>
          </li>
          @endcan

          @can('all-users')
          <li class="nav-item">
            <a href="{{route('all.user')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
               {{__('customers')}}
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          @endcan

          {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-credit-card"></i>
              <p>
                {{__('the sales')}}
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @can('booking-list')
              <li class="nav-item">
                <a href="{{route('booking.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('bookings')}}</p>
                </a>
              </li>
              @endcan

              <li class="nav-item">
                <a href="{{route('staticsprofits')}}" class="nav-link">
                  <i class="nav-icon fas fa-chart-pie"></i>
                  <p>{{__('profits')}}</p>
                </a>
              </li>


            </ul>
          </li> --}}
{{--
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-wallet"></i>
              <p>
               {{__('Finances')}}
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('finances.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('Finances')}}</p>
                </a>
              </li>
            </ul>
          </li> --}}

          {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-wallet"></i>
              <p>
               {{__('Services')}}
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('Services.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('Services')}}</p>
                </a>
              </li>
            </ul>
          </li> --}}

          {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-language"></i>
              <p>
               {{__('languages')}}
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('language.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('language')}}</p>
                </a>
              </li>


            </ul>
          </li> --}}


          {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
               {{__('Blog')}}
                <i class="fas fa-angle-left right"></i>
              </p>
            </a> --}}
            {{-- <ul class="nav nav-treeview">
                @can('Category-list')
                <li class="nav-item">
                 <a href="{{route('category.index')}}" class="nav-link">
                   <i class="far fa-circle nav-icon"></i>
                   <p>{{__('All category')}}</p>
                 </a>
               </li>
                @endcan
                @can('Category-create')
                   <li class="nav-item">
                     <a href="{{route('category.create')}}" class="nav-link">
                       <i class="far fa-circle nav-icon"></i>
                       <p>{{__('Add category')}} </p>
                     </a>
                   </li>
                 @endcan --}}

           {{-- @can('post-list')
           <li class="nav-item">
            <a href="{{route('post.index')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>{{__('All Blog')}}</p>
            </a>
          </li>
           @endcan
           @can('post-create')
              <li class="nav-item">
                <a href="{{route('post.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('Add post')}} </p>
                </a>
              </li>
             @endcan

            </ul>
          </li> --}}

{{--
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                {{__('Setting')}}
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @can('configuration-list')
              <li class="nav-item">
                <a href="{{ route('configuration.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('Setting Website')}}</p>
                </a>
              </li>
              @endcan

              @can('content-list')

              <li class="nav-item">
                <a href="{{route('content.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('Pages content')}}</p>
                </a>
              </li>
             @endcan

             <li class="nav-item">
              <a href="{{route('profilegetadmin')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>{{__('Profile')}}</p>
              </a>
            </li>
            </ul>
          </li> --}}


          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                  <i class="far fa-dot-circle nav-icon"></i>
                  <p>
                    {{ __('Logout') }}
                  <span class="right badge badge-danger">X</span>
                </p>

        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
      </li>
          @endguest
        </ul>

       </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('contentheader')


    <!-- Main content -->
    <section class="content">

      <div class="container-wrapper">
        <!-- Main row -->
        <div class="row">
          @yield('content')

        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>{{__('Copyright')}} &copy; 2014-2021 <a href="#">{{__('Esteshari
      ')}}</a>.</strong>
    {{__('All rights reserved.')}}

  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@if(App::currentLocale()=='en')
<!-- jQuery -->
<script src="{{asset('BackLayout/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('BackLayout/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('BackLayout/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('BackLayout/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('BackLayout/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('BackLayout/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('BackLayout/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('BackLayout/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('BackLayout/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('BackLayout/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('BackLayout/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('BackLayout/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('BackLayout/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('BackLayout/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('BackLayout/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('BackLayout/dist/js/pages/dashboard.js')}}"></script>
<script src="{{ asset('BackLayout/plugins/ijaboCropTool/ijaboCropTool.min.js') }}"></script>


<script src="{{ asset('BackLayout/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('BackLayout/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('BackLayout/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('BackLayout/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('BackLayout/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('BackLayout/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('BackLayout/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset('BackLayout/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset('BackLayout/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset('BackLayout/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('BackLayout/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('BackLayout/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('BackLayout/plugins/fullcalendar/main.js')}}"></script>

@else
<!-- jQuery -->
<script src="{{asset('ar/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('ar/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 rtl -->
<script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('ar/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('ar/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('ar/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('ar/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('ar/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('ar/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('ar/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('ar/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('ar/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('ar/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('ar/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('ar/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('ar/dist/js/demo.js')}}"></script>
@endif

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script src="{{ asset('ar/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('ar/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('ar/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('ar/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('ar/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('ar/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('ar/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset('ar/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset('ar/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset('ar/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('ar/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('ar/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('ar/plugins/fullcalendar/main.js')}}"></script>

<script type="text/javascript">

     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `{{__('Are you sure you want to delete this record?')}}`,
              text: "{{__('If you delete this, it will be gone forever.')}}",
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
</body>
</html>
