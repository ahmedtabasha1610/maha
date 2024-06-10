@extends('frontlayout.master')
@section('content')
@section('title','Dashboard User')
<style>
    p{
      font-size: 15px;
      font-weight: bold;
    }
    a:hover{
      color: #ffc824;
      font-weight: bold;
    }
    a{
      color:black;
    }
  </style>
<section style="background-color: #eee;">
    <div class="container py-5">
      <div class="row">
        <div class="col">
            <br>
          <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4" style="background: #FDA12B;"  >
            <ol class="breadcrumb mb-0"style="background: #fff;" >
              <li class="breadcrumb-item"><a href="{{url('/')}}">{{__('Home')}}</a></li>
              <li class="breadcrumb-item active" aria-current="page"> <a href="{{route('homeuser')}}">{{__('Dashboard User')}}</a> </li>
            </ol>
          </nav>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4" style="background: #FDA12B;color:#fff;">
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
                    <p class="mb-0"><a href="{{route('profilegetuser')}}">  {{__('Edit profile information')}}</a> </p>
                </li>

                <li class="list-group-item d-flex align-items-center">
                  <i class="fa fa-user fa-lg" style="color: #333333;"></i>&nbsp;&nbsp;
                  <p class="mb-0"><a href="{{route('changePasswordGetuser')}}">{{__('Change password')}}</a> </p>
              </li>
                {{-- <li class="list-group-item d-flex  align-items-center ">
                  <i class="fa fa-paypal fa-lg" style="color: #333333;"></i>&nbsp;&nbsp;
                  <p class="mb-0"> {{__('Edit payment information')}}</p>
                </li> --}}
                <li class="list-group-item d-flex align-items-center ">
                    <i class="fa fa-question fa-lg" style="color: #333333;"></i>&nbsp;&nbsp;
                    <p class="mb-0"> <a href="{{route('myconsulting.index')}}">  حجوزاتي </a></p>
                  </li>
                  <li class="list-group-item d-flex align-items-center ">
                    <i class="fa fa-credit-card fa-lg" style="color: #333333;"></i>&nbsp;&nbsp;
                    <p class="mb-0"> <a href="{{route('paybook.index')}}">   {{__('pay book')}}</a></p>
                  </li>
                  <li class="list-group-item d-flex align-items-center ">
                    <i class="fa fa-sign-out fa-lg" style="color: #333333;"></i>&nbsp;&nbsp;
                    <p class="mb-0">
                      <a  href="{{ route('logout') }}"
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

       @yield('content-user')
      </div>
    </div>
  </section>

  @endsection
