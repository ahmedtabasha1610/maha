@extends('layouts.app')
@section('content')
<div class="container">
    <div class="justify-content-center">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div>
        @endif
        <div class="card">
            <div class="card-header">{{__('Category')}}
                @can('Category-create')
                    <span class="float-right">
                        <a class="btn btn-primary" href="{{ route('category.index') }}">{{__('Back')}}</a>
                    </span>
                @endcan
            </div>
            <div class="card-body">
                <div class="lead">
                    <strong> {{__('Category Name')}}:</strong>
                    {{ $Category->catname }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
