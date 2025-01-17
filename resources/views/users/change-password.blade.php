@extends('layouts.app')
@section('content')

<div class="container">
    <div class="justify-content-center">

  
<div class="card">
    <div class="card-body">

                <h2>{{__('Change password')}}</h2>
                    <form  method="POST" action="{{ route('changePasswordadmin') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                            <label for="new-password" class="control-label">{{__('Current Password')}}</label>

                                <input id="current-password" type="password" class="form-control" name="current-password" required>

                                @if ($errors->has('current-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                            <label for="new-password" class="control-label">{{__('New Password')}}</label>
                                <input id="new-password" type="password" class="form-control" name="new-password" required>

                                @if ($errors->has('new-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">
                            <label for="new-password-confirm" class="control-label">{{__('Confirm New Password')}}</label>

                                <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                            </div>

                        <div class="form-group">
                            <div class="col-md-9 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    {{__('Change Password')}}
                                </button>
                            </div>
                        </div>
                    </form>
                
            
    </div></div>
</div></div>
@endsection