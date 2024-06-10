@extends('dashuser.dashboarduser')
@section('content-user')

<div class="col-lg-8">
    <div class="card mb-4">
      <div class="card-body">
        <div style="text-align: center;" >
            <p  style="text-align: center;">{{__('Details Employee')}} </p>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <p class="mb-0">{{__('Created At')}} </p>
            </div>
            <div class="col-sm-9">
              <p class="text-muted mb-0">   {{$advisor->created_at}} </p>
            </div>
          </div>
          <hr>
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0">{{__('Name')}} </p>
          </div>
          <div class="col-sm-9">
            <p class="text-muted mb-0">   {{$advisor->advisor->name}} &nbsp; {{$advisor->advisor->lastname}} </p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0"> {{__('Email')}}</p>
          </div>
          <div class="col-sm-9">
            <p class="text-muted mb-0">{{$advisor->advisor->email}}</p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0"> {{__('Phone')}}</p>
          </div>
          <div class="col-sm-9">
            <p class="text-muted mb-0">{{$advisor->advisor->phone}}</p>
          </div>
        </div>
        <hr>
   
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0">{{__('Address')}}</p>
          </div>
          <div class="col-sm-9">
            <p class="text-muted mb-0"> {{$advisor->advisor->address}}</p>
          </div>
        </div>
         <hr>
        <div class="row">
            <div class="col-sm-3">
              <p class="mb-0"> {{__('social media')}}</p>
            </div>
            <div class="col-sm-9">
              <p class="text-muted mb-0">
                <a href="{{$advisor->advisor->whatsapp}}"><i class="fa fa-whatsapp fa-2x"></i></a>
                &nbsp;
                &nbsp;
            <a href="{{$advisor->advisor->facebook}}"><i class="fa fa-facebook fa-2x"></i></a>
            &nbsp;
            &nbsp;
         <a href="{{$advisor->advisor->link}}"> <i class="fa fa-link fa-2x"></i></a>
        </p>
            </div>
          </div>
          <hr>

          <div class="row">
            <div class="col-sm-3">
              <p class="mb-0">{{__('Note')}}</p>
            </div>
            <div class="col-sm-9">
              <p class="text-muted mb-0"> {{$advisor->note}}</p>
            </div>
          </div>
           <hr>
      </div>
    </div>
</div>
@stop