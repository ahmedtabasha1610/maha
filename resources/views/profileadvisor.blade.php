@extends('dashadvisor.dashboardadvisor')
@section('content-user')

<div class="col-8 grid-margin stretch-card">
    <div class="card">

      <div class="card-body">
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
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
        <h4 class="card-title">{{__('Edit profile information')}}</h4>
         @php
             $userprofile=Auth::user();
         @endphp
{!! Form::model($userprofile , ['route' => ['profile', $userprofile->id], 'method'=>'PATCH','enctype'=>'multipart/form-data']) !!}
 


              <div class="form-group">
                <strong>{{__('Upload Image')}}:</strong>
                {!! Form::file('avater', null, array('placeholder' => 'phone','class' => 'form-control')) !!}
                <img src="{{asset('storage/images-user-profile/'. Auth::user()->avater)}}" width="100px" height="100px">
              </div>
            <div class="form-group">
                <strong>{{__('First Name')}}:</strong>
                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
            </div>
            <div class="form-group">
              <strong>{{__('Last Name')}} : </strong>

              {!! Form::text('lastname', null, array('placeholder' => __('Last Name'),'class' => 'form-control')) !!}
            </div>
            <div class="form-group">
              <strong>{{__('Native language')}} :</strong>
              <select class="form-control" name="language_id">
                @foreach ($languages as $item)
                <option value="{{$item->id}}"{{$item->id==Auth::user()->language_id ?'selected':' '}}>{{$item->name_lang}}</option>

                @endforeach
              </select>
          </div>

          <div class="form-group">
            <label>  {{__('another language')}} </label>
            {!! Form::text('phone2', null, array('placeholder' => __('another language'),'class' => 'form-control')) !!}

          </div>
            <div class="form-group">
                <strong>{{__('Email')}} :</strong>
                {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
            </div>

        
        
            <div class="form-group">
                <strong>{{__('Phone')}}:</strong>
                {!! Form::text('phone', null, array('placeholder' => 'phone','class' => 'form-control')) !!}
            </div>
            <div class="form-group">
              <label>  {{__('Country')}} </label>
                <select class="form-control" name="country_id">
                    @foreach($countries as $country)
                    <option value="{{$country->id}}"{{($userprofile->country_id == $country->id) ? 'selected': ''}} >{{$country->nicename}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
              <label>  {{__('city')}} </label>
              {!! Form::text('address', null, array('placeholder' =>__('city'),'class' => 'form-control')) !!}

            </div>
       

              
          
            <button type="submit" class="btn btn-primary">Submit</button>
        {!! Form::close() !!}
      </div></div></div>

  @endsection