@extends('layouts.app')
@section('content')
<div class="container">
    <div class="justify-content-center">
@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>{{__('Opps')}}!</strong> {{__('Something went wrong, please check below errors')}}.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
    </div></div>
         @php
             $userprofile=Auth::user();
         @endphp
                 <div class="card">
                    <div class="card-body">

{!! Form::model($userprofile , ['route' => ['profileadmin', $userprofile->id], 'method'=>'PATCH','enctype'=>'multipart/form-data']) !!}

            <div class="form-group">
                <strong>{{__('Full Name')}}:</strong>
                {!! Form::text('name', null, array('placeholder' =>__('Full Name'),'class' => 'form-control')) !!}
            </div>
            <div class="form-group">
                <strong>{{__('Email')}}:</strong>
                {!! Form::text('email', null, array('placeholder' => __('Email'),'class' => 'form-control')) !!}
            </div>
        
            <div class="form-group">
                <strong>{{__('Phone')}}:</strong>
                {!! Form::text('phone', null, array('placeholder' => __('phone'),'class' => 'form-control')) !!}
            </div>
            <div class="form-group">
                <strong>{{__('Password')}}:</strong>
                {!! Form::password('password', null, array('placeholder' => __('Password'),'class' => 'form-control')) !!}
            </div>
           
            <div class="form-group">
                <strong>{{__('Upload Image')}}:</strong>
                {!! Form::file('avater', null, array('placeholder' => '','class' => 'form-control')) !!}
                <img src="{{asset('storage/images-admin-profile/'. Auth::user()->avater)}}" width="100px" height="100px">
            </div>
            <div class="form-group">
                <strong>{{__('Address')}}:</strong>
                {!! Form::text('address', null, array('placeholder' =>__('Address'),'class' => 'form-control')) !!}
            </div>
        
           
           
          
            <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
        {!! Form::close() !!}
                    </div></div>
@endsection