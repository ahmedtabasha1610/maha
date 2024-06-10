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
            <div class="card-header">{{__('Configuration Website')}}

            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>{{__('id')}}</th>
                            <th>{{__('Image')}}</th>
                            <th>{{__('Email')}}</th>
                            <th>{{__('Address')}}</th>
                            <th>{{__('Design By')}}</th>
                            <th width="280px">{{__('Action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Configuration as $key => $Configur)
                            <tr>
                                <td>{{ $Configur->id }}</td>
                                <td><img src="{{asset($Configur->iconwebsite)}}"  width="80px"height="80px"></td>
                                <td>{{ $Configur->phone }}</td>
                                <td>{{ $Configur->email }}</td>
                                <td>{{ $Configur->desginby }}</td>
                                <td>
                                    @can('configuration-edit')
                                        <a class="btn btn-primary" href="{{ route('configuration.edit',$Configur->id) }}">Edit
                                        </a>
                                    @endcan

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$Configuration->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
