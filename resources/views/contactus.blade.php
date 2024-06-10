@extends('frontlayout.master')
@section('title','contact-us')
@section('content')
<div class="General_Pages-header margin-top-15 aboutus_head">
    <div class="container" style="
        padding: 0;
    ">

    <h5  style="padding-bottom:12px;padding-top:12px;font-size:24px;color:#000;font-weight:bold;padding-right:30px;" >
       {{__('Home')}}/ {{__('Contact Us')}}
    </h5>

    </div>
    </div>
<section id="about" style="padding: 8px 20px;">
    <div class="container" style="padding:0">
    <div class="row about-extra">
    <div class="col-lg-5 wow fadeInUp order-1 order-lg-2">
    <img src="{{asset('desgin/wp-content/themes/website/dist/images/designs/b8akServices.png')}}" class="img-fluid" alt="" width="450" height="450">
    </div>
    <div class="col-lg-7 wow fadeInUp pt-4 pt-lg-0 order-2 order-lg-1">
        <h5 style="font-weight:bold ;">{{__('You can send an inquiry or complaint to technical support')}}</h5><br>
        <div class="form">
        <div style="color: #ffc824 ;border-color:#ffc824 ;" id="sendmessage">
             @if (\Session::has('success'))

                <p>{{ \Session::get('success') }}</p>

        @endif
    </div>
        <div id="errormessage"></div>
        <form action="{{route('contactus')}}" method="POST" role="form" id="contactForm">
            @csrf
        <div class="form-row">
        <div class="form-group col-lg-6">
        <input required class="form-control" id="name" placeholder="{{__('Name')}}"  type="text" name="Name"  />
        </div>
        <div class="form-group col-lg-6">
        <input required class="form-control" placeholder="{{__('Email')}}"   type="email"  id="Email" name="Email" />
        </div>
        </div>
        <div class="form-row">
        <div class="form-group col-lg-6">
        <input required class="form-control" placeholder="{{__('Title')}}"   type="text" id="Title" name="Title"  />
        </div>
        <div class="form-group col-lg-6">
        <input required class="form-control" placeholder="{{__('Phone')}}"  type="tel" />
        </div>
        </div>
        <div class="form-group">
        <textarea required class="form-control" rows="5" data-rule="required"  id="Msg" name="Msg" placeholder="{{__('description')}}"></textarea>
        </div>
        <div class="text-center"><button Class="btn btn-warning" type="submit" title="Send Message">{{__('Submit')}}</button></div>
        </form>
    </div>


    </div>
    </div>
    </section>

    @stop
