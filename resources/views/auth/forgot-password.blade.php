
@extends('frontlayout.master')
@section('title','Login')
@section('content')
<style>
    input[type="password"]:focus{
        outline: none !important;
        border-bottom: 2px solid #fda12b !important;

    }
    input[type="email"]:focus{
        outline: none !important;
        border-bottom: 2px solid #fda12b !important;

    }
</style>
<div class="row" style="margin-top:-50px">
    <link rel="stylesheet" href="{{asset('front/loginRegister/fonts/material-icon/css/material-design-iconic-font.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/Content/css/auth.css')}}" />
    <div class="col-md-12 main  ">

    <section class="sign-in">
    <div class="container login_container" style="padding:0;position:relative;max-width:900px">
    <div class="image__container">

    <img src="" alt="" class="img-fluid" style="width:134px;margin: -8px 20px 0px;">
    </div>
    <div class="signin-content">
    <div class="signup-form" style="box-shadow: 0 1px 6px 0 rgba(0,0,0,.14);">

        <h2> {{__('welcome')}}</h2>
        <p>     {{__('Sign-in to your account and start providing consultation for money,')}}</p>
    <ul>
        @foreach ($Services as $item)
        <li style="color: #fda12b;"><strong>{{__($item->title)}}</strong></li>
    @endforeach
    </ul>

        <img src="{{asset('desgin/wp-content/themes/website/dist/images/designs/b8akServices.png')}}" alt="Sample image" style="
        width: 245px;
        height: 245px;
        left: 165px;
        top: 610px;
        border-radius: 200px;">

        <div style="display: flex;
        flex-direction: column;
        align-items: flex-start;

        padding: 8px 16px;

        width: 196px;
        height: 57px;
        left: 461px;
        top: 810px;
         margin-top:-50px;
         margin-right:100px;
        background: #FFFFFF;
        box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
        border-radius: 12px 12px 12px 0px;
        transform: matrix(1, 0, 0, 1, 0, 0);">Ahmed ali</div>

    </div>
    <div class="signin-form" style="position: relative">
        <h2 class="form-title">
            {{ __('Forgot your password?') }}
            </h2>

    <p style="padding-top:8px;">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}

    </p>

    <form method="POST" action="{{ route('password.email') }}" class="register-form" >
        @csrf
        @if (session('status') )
        <div class="mb-4 font-medium text-sm text-green-600" style="color:green;">
            {{ __('A link to create a new password has been sent to your email address.') }}
        </div>
    @endif
    <div class="form-group shadowww">
    <p> {{__('Email')}} </p>
    <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
    <input class="form-control login-email text-box single-line" type="email" name="email" value=""required />
    <span class="field-validation-valid text-danger login-email-error">
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

    </span>
    </div>

    <div class="form-group form-button">
    <input type="submit" name="signin" id="signin" class="form-submit " value="{{__('Email Password Reset Link')}}" style="background-color:#fda12b !important ;width: 100%;" />
    </div>

    </form>

    </div>
    </div>
    </section>
    </div>
    </div>
    </div>


@endsection


