@extends('layouts.app')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
{{--
<link rel="stylesheet" href="{{ asset('FrontLogin/vendor/select2/select2.min.css') }}"> --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
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
            <div class="card-header">
              
            </div>

            <div class="card-body">
                {!! Form::open(array('route' => 'ordernotifiy.store', 'method'=>'POST','enctype'=>'multipart/form-data')) !!}
                <div class="form-group">
                    <select name="user_id" class="form-control">
                      @foreach($users as $user)
                        <option value="{{$user->id}}">
                            @if($user->isadvisor())
                            <span >
                                {{__('Employee')}}
                            </span>
                            @elseif($user->isuser())
                            <span>
                                {{__('User')}}
                            </span>
                            @endif
                            --
                            {{$user->name}}&nbsp;{{$user->lastname}}
                               
                            
                        </option>
                      @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <strong>{{__('Title')}}:</strong>
                    {!! Form::text('title', null, array('placeholder' => __('Title'),'class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <strong>{{__('Notes')}}:</strong>
                    {!! Form::textarea('body', null, array('placeholder' => __('Notes'),'class' => 'form-control tinymce-editor','cols'=>'40','rows'=>'5')) !!}
                </div>
                    <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
