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
        <div class="card">

            <div class="card-body">
                <h2>{{__('Header Website')}}</h2>

                {!! Form::model($Configuration, ['route' => ['configuration.update', $Configuration->id], 'method'=>'PATCH','enctype'=>'multipart/form-data']) !!}
                <div class="form-group">
                    <strong>{{__('Website Name')}}:</strong>
                    {!! Form::text('websitename', null, array('placeholder' => __('Website Name'),'class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <strong>{{__('Title')}}:</strong>
                    {!! Form::text('title', null, array('placeholder' => __('Title'),'class' => 'form-control')) !!}
                </div>
           
                <div class="form-group">
                    <strong>{{__('description')}}:</strong>
                    {!! Form::textarea('description', null, array('placeholder' => __('description'),'class' => 'form-control')) !!}
                </div>
                    <div class="form-group">
                        <strong>{{__('phone')}}:</strong>
                        {!! Form::text('phone', null, array('placeholder' => __('phone'),'class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <strong>{{__('Email')}}:</strong>
                        {!! Form::text('email', null, array('placeholder' => __('Email'),'class' => 'form-control')) !!}
                    </div>

               
                    <h2>{{__('Social media')}}</h2>

                    <div class="form-group">
                        <strong> {{__('Facebook Link')}}:</strong>
                        {!! Form::text('facebook', null, array('placeholder' => 'https://facebook.com','class' => 'form-control')) !!}
                    </div>

                    <div class="form-group">
                        <strong>{{__('Instagram Link')}}:</strong>
                        {!! Form::text('instagram', null, array('placeholder' => 'https://instagram.com','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <strong>{{__('Whatsapp')}}:</strong>
                        {!! Form::text('whatsapp', null, array('placeholder' => 'https://whatsapp.com','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <strong>{{__('Twitter Link')}}:</strong>
                        {!! Form::text('twiter', null, array('placeholder' => 'https://twitter.com','class' => 'form-control')) !!}
                    </div>

                    <h2>{{__('Website Footer')}}</h2>

                    <div class="form-group">
                        <strong>{{__('description Footer:')}}</strong>
                        {!! Form::text('footernote', null, array('placeholder' =>__('description Footer:'),'class' => 'form-control')) !!}
                    </div>

                    <div class="form-group">
                        <strong>{{__('Address')}}:</strong>
                        {!! Form::text('address', null, array('placeholder' => __('Address'),'class' => 'form-control')) !!}
                    </div>

                    <div class="form-group">
                        <strong>{{__('Design By')}}:</strong>
                        {!! Form::text('desginby', null, array('placeholder' => __('Design By'),'class' => 'form-control')) !!}
                    </div>

                    <h2>{{__('Change Icon WebSite')}}</h2>
                    <div class="form-group">
                        <strong>{{__('Icon')}}(Ar):</strong>
                        {!! Form::file('iconwebsite', null, array('placeholder' => 'icon','class' => 'form-control')) !!}
                        <img src="{{asset($Configuration->iconwebsite)}}" width="100px"height="100px">

                    </div>
                    <div class="form-group">
                        <strong>{{__('Icon ')}}(En):</strong>
                        {!! Form::file('iconwebsiteen', null, array('placeholder' => 'icon','class' => 'form-control')) !!}
                        <img src="{{asset($Configuration->iconwebsiteen)}}" width="100px"height="100px">

                    </div>

                

                    <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
