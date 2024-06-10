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

        <img src="{{asset('desgin/wp-content/themes/website/dist/images/designs/b8akServices.png')}}" alt="Sample image"    style="
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
            {{ __('Resend Verification Email') }}
        </h2>

    <p style="padding-top:8px;">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}

    </p>


        @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600" style="color:green;">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif
        <form method="POST" action="{{ route('verification.send') }}" class="register-form">
            @csrf

            <div>
                <button type="submit" class ="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"  style="background-color:#fda12b !important ;width: 100%;">
                    {{ __('Resend Verification Email') }}
                </button>
            </div>
        </form>
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class ="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" style="background-color:#fda12b !important ;width: 100%;">
                {{ __('Logout') }}
            </button>
        </form>

    </div>
    </div>
    </section>
    </div>
    </div>
    </div>


@endsection



