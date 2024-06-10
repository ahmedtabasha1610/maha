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
            <div class="card-header">{{__('Edit Category')}}
                <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('category.index') }}">{{__('Category')}}</a>
                </span>
            </div>
            <div class="card-body">
                {!! Form::model($Category, ['route' => ['category.update', $Category->id], 'method'=>'PATCH']) !!}
                    <div class="form-group">
                        <strong>{{__('Category Name')}}:</strong>
                        {!! Form::text('catname', null, array('placeholder' => 'category Name','class' => 'form-control')) !!}
                    </div>
                    <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
