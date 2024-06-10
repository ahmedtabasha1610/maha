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
                        <a class="btn btn-primary" href="{{ route('category.create') }}">{{__('New Category')}}</a>
                    </span>
                @endcan
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>{{__('Category Name')}}</th>
                            <th width="280px">{{__('Action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Category as $key => $Cat)
                            <tr>
                                <td>{{ $Cat->id }}</td>
                                <td>{{ $Cat->catname }}</td>
                                <td>
                                    <a class="btn btn-success" href="{{ route('category.show',$Cat->id) }}"><i class="nav-icon fas fa-eye"></i></a>
                                    @can('Category-edit')
                                        <a class="btn btn-primary" href="{{ route('category.edit',$Cat->id) }}"><i class="nav-icon fas fa-edit"></i></a>
                                    @endcan
                                    @can('Category-delete')
                                        {!! Form::open(['method' => 'DELETE','route' => ['category.destroy', $Cat->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Delete',['class' => 'btn btn-danger btn-flat show_confirm','data-toggle'=>'tooltip','title'=>'delete']) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $Category->appends($_GET)->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
