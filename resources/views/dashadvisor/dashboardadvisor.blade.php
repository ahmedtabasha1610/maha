@extends('frontlayout.master')
@section('content')
<style>
  p{
    font-size: 15px;
    font-weight: bold;
  }
  a:hover{
    color: #ffc824;
    font-weight: bold;
  }
  a{color: black;}
</style>
<section style="background-color: #eee;" style="margin-top: -100px;">
    <div class="container py-5">
      <div class="row">
        <div class="col">
            <br>
          <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="{{url('/')}}">{{__('Home')}}</a></li>
              <li class="breadcrumb-item active" aria-current="page"> <a href="{{route('homeadvisor')}}">
                {{__('Dashboard Employee')}}</a> </li>
            </ol>
          </nav>
        </div>
      </div>
  
      <div class="row">
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
                  <p class="mb-0"><a href="{{route('profileget')}}">  {{__('Edit profile information')}}</a> </p>
              </li>
           
              <li class="list-group-item d-flex align-items-center">
                <i class="fa fa-user fa-lg" style="color: #333333;"></i>&nbsp;&nbsp;
                <p class="mb-0"><a href="{{route('careerinfoadvisor')}}">  {{__('Career information')}}</a> </p>
            </li>
              <li class="list-group-item d-flex align-items-center">
                <i class="fa fa-user fa-lg" style="color: #333333;"></i>&nbsp;&nbsp;
                <p class="mb-0"><a href="{{route('changePasswordGet')}}">{{__('Change password')}}</a> </p>
            </li>
              
                <li class="list-group-item d-flex align-items-center ">
                    <i class="fa fa-question fa-lg" style="color: #333333;"></i>&nbsp;&nbsp;
                    <p class="mb-0"> <a href="{{route('calendar.index')}}">  {{__('Booking dates')}} </a></p>
                  </li>
                  <li class="list-group-item d-flex  align-items-center ">
                    <i class="fa fa-file fa-lg" style="color: #333333;"></i>&nbsp;&nbsp;
                    <p class="mb-0"> <a href="{{route('purchase.index')}}">{{__('Reservations details')}}</a></p>
                  </li>
                  <li class="list-group-item d-flex align-items-center ">
                    <i class="fa fa-credit-card fa-lg" style="color: #333333;"></i>&nbsp;&nbsp;
                    <p class="mb-0"> <a href="{{route('balance')}}">  {{__('Balance')}}</a></p>
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