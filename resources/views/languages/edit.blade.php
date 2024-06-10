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
            <div class="card-header">{{__('Edit language')}}
                <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('language.index') }}">{{__('language')}}</a>
                </span>
            </div>
            <div class="card-body">
                {!! Form::model($language, ['route' => ['language.update', $language->id], 'method'=>'PATCH']) !!}
                    <div class="form-group">
                        <strong>{{__('Name-Ar')}}:</strong>
                        {!! Form::text('name_lang', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <strong>{{__('Name-En')}}:</strong>
                        {!! Form::text('en_name_lang', null, array('placeholder' => __('Name'),'class' => 'form-control')) !!}
                    </div>
                    <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
