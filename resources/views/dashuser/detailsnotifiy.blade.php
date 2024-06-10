@extends('dashuser.dashboarduser')
@section('content-user')
<div class="col-lg-8">
    <div class="card mb-4">
      <div class="card-body">
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0">{{__('Main Title')}} </p>
          </div>
          <div class="col-sm-9">
            <p class="text-muted mb-0"> {{$c->body}} </p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0"> {{__('Title')}}</p>
          </div>
          <div class="col-sm-9">
            <p class="text-muted mb-0">{{$c->title}}</p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0"> {{__('description')}}</p>
          </div>
          <div class="col-sm-9">
            <p class="text-muted mb-0">{{$c->decription}}</p>
          </div>
        </div>
  
   
      
      </div>
    </div>
    <div class="row">
   
  
    </div>
  </div>
@endsection