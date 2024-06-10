@extends('frontlayout.master')
@section('title','HomePage')
@section('content')

<section class="singleServicesPage-header position-relative">
    <div class="overlay position-absolute w-100 h-100 flex-center flex-column">
      <h4 class="mb-3 font-weight-bold primary-golden-color">تفاصيل الخدمة</h4>
      <h1 class="font-weight-bold color-white text-center">{{$Servicescontent->title}}</h1>
    </div>
  </section>

  <section class="singleServicesPage-description bg-white py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
   
     
            {!! $Servicescontent->body!!}
                </div>
        <div class="col-md-4 mt-4 mt-md-0">
          <img class="img-fluid w-100" src="{{$Servicescontent->image}}">
        </div>
      </div>
    </div>
  </section>

@endsection