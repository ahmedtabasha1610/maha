@extends('layouts.app')
@section('content')

<div class="col-8 grid-margin stretch-card">
    <div class="card">

      <div class="card-body">
    
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
        
{!! Form::model($purchase , ['route' => ['finances.update', $purchase->id], 'method'=>'PATCH','enctype'=>'multipart/form-data']) !!}
 
              <div class="form-group">
                <strong>{{__('Upload ')}}:</strong>
                {!! Form::file('image', null, array('placeholder' => 'image','class' => 'form-control')) !!}
                  @isset($purchase->image)
                @if($extension == 'docx' or $extension == 'pdf' ) 
                <br><a href="{{asset('storage/images-payment-confirm/'.$purchase->image)}}">file</a>
                @elseif($extension == 'png' or $extension == 'jpg')
                <br><a href="{{asset('storage/images-payment-confirm/'.$purchase->image)}}">
                  <img src="{{asset('storage/images-payment-confirm/'.$purchase->image)}}" width="90px" height="90px">
                    </a>
                @endif
                @endisset
                 
              </div>
         
              <div class="form-group">
                <strong>{{__('confirm')}}:</strong>
                <input type="checkbox" name="confirm" value="{{$purchase->confirm}}" {{$purchase->confirm == 'yes' ? 'checked': ' '}}>

             
              </div>
           

              <div class="form-group">
		            <strong>note:</strong>
		            <textarea class="form-control" style="height:150px" name="note" placeholder="note">{{ $purchase->note }}</textarea>
		        </div>
           
       

              
          
            <button type="submit" class="btn btn-primary">Submit</button>
        {!! Form::close() !!}
      </div>
    </div>
  </div>

  @endsection