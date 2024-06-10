@extends('layouts.app')
@section('content')
<div class="container">
    <div class="justify-content-center">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Opps!</strong> {{__('Something went wrong, please check below errors.')}}<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card">
            <div class="card-header">{{__('Edit user')}}
                <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('users.index') }}">{{__('Users')}}</a>
                </span>
            </div>

            <div class="card-body">
                {!! Form::model($user, ['route' => ['users.update', $user->id], 'method'=>'PATCH']) !!}
                    <div class="form-group">
                        <strong>{{__('Name')}}:</strong>
                        {!! Form::text('name', null, array('placeholder' => __('Name'),'class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <strong>{{__('Email')}}:</strong>
                        {!! Form::text('email', null, array('placeholder' => __('Email'),'class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <strong>{{__('Password')}}:</strong>
                        {!! Form::password('password', array('placeholder' => __('Password'),'class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <strong>{{__('Confirm Password')}}:</strong>
                        {!! Form::password('password_confirmation', array('placeholder' => __('Confirm Password'),'class' => 'form-control')) !!}
                    </div>
                         {{-- <div class="form-group">
                        <strong>{{__('Select Country')}}:</strong>
                    <select  class="form-control" name="country_id">
                        <option class="form-control" >{{__('Select Country')}}</option>
                        @foreach ($countries as $country)
                            <option  value="{{$country->id}}"@if($country->id) selected @endif class="form-control">{{$country->name}} - {{$country->code}}</option>
                        @endforeach
                    </select>
                    </div> --}}
                    <div class="form-group">
                        <strong>{{__('Role')}}:</strong>
                        {!! Form::select('roles[]', $roles, $userRole, array('class' => 'form-control','multiple')) !!}
                    </div>
                    <div class="form-group">
                        <strong>{{__('Status')}}:</strong>
                         <select name="status">
                            <option value="0">{{__('Not Agree')}}</option>
                            <option value="1">{{__('OK')}}</option>
                         </select>
                    </div>
                    <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection