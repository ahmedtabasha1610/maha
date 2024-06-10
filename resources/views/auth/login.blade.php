@extends('frontlayout.master')
@section('title', 'Login')
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

    <div class="row" style="margin-top:-30px">
        <link rel="stylesheet" href="{{ asset('front/loginRegister/fonts/material-icon/css/material-design-iconic-font.min.css') }}">
        <link rel="stylesheet" href="{{ asset('front/Content/css/auth.css') }}" />
        <div class="col-md-12 main">
            <section class="sign-in">
                <div class="container login_container" style="padding:0;position:relative;max-width:900px">
                    <div class="image__container">

                        <img src="" alt="" class="img-fluid" style="width:134px;margin: -8px 20px 0px;">
                    </div>
                    <div class="signin-content">
                        <div class="signup-form" style="box-shadow: 0 1px 6px 0 rgba(0,0,0,.14);">

                            <h2> {{ __('welcome') }}</h2>
                            <p>يمكنك تسجيل الدخول لاتمام عملية الطلب  او الحجز</p>
                            <ul>
                                @foreach ($Services as $item)
                                    <li style="color: #fda12b;"><strong>{{ __($item->title) }}</strong></li>
                                @endforeach
                            </ul>

                            <img src="{{asset('desgin/wp-content/themes/website/dist/images/designs/b8akServices.png')}}" alt="Sample image" style="
        width: 170px;
        height: 170px;
        left: 165px;
        top: 610px;
        margin-right:60px;
        margin-left:30px;
        border-radius: 200px;">

                            <div
                                style="display: flex;
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
        transform: matrix(1, 0, 0, 1, 0, 0);">
                                Younes M </div>

                        </div>
                        <div class="signin-form" style="position: relative">
                            <h2 class="form-title">
                                {{ __('Sign In') }}
                            </h2>
                            <style>
                                #outer {
                                    width: 100%;
                                    text-align: center;
                                }

                                .inner {
                                    display: inline-block;
                                    border-radius: 13px;
                                    padding: 5px 30px 5px 30px;
                                }
                            </style>
                            <div class=" align-items-center justify-content-center justify-content-lg-start" id="outer">


                                <button type="button" class="inner" style='border:1px solid #c0c0c0;'>
                                    <a href="{{ route('social.oauth', 'google') }}"> <img src="{{ asset('front/3.png') }}" width="35px"></a>
                                </button>
                            </div>
                            <p style="text-align:center;padding-top:8px;">{{ __('OR') }}
                            </p>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form method="POST" action="{{ route('login') }}" class="register-form" id="login-form">
                                @csrf
                                <input type="hidden" name="ReturnUrl" />
                                <div class="form-group shadowww">
                                    <p> {{ __('Email') }} </p>
                                    <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                    <input class="form-control login-email text-box single-line" type="email" name="email" value="" />
                                    <span class="field-validation-valid text-danger login-email-error"></span>
                                </div>
                                <div class="form-group shadowww">
                                    <p> {{ __('Password') }}</p>
                                    <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                    <input class="form-control login-password text-box single-line password" id="password" type="password" name="password" />
                                    <span class="field-validation-valid text-danger login-password-error"></span>
                                </div>

                                <div class="form-group form-button">
                                    <input type="submit" name="signin" id="signin" class="btn btn-warning " value="{{__('Sign In')}}" style="width: 100%;" />
                                </div>
                                <div class=" p-t-115">
                                    <span class="txt1">
                                    </span>
                                    @if (Route::has('password.request'))
                                        <a class="txt2" href="{{ route('password.request') }}" style="color:#fda12b;font-weight: bold;">
                                            {{ __('Forgot your password?') }}
                                        </a>&nbsp; &nbsp; &nbsp;
                                        <span class="txt1">
                                        </span>
                                    @endif

                                </div>
                            </form>
                            <div class="social-login ">
                                <span class="social-label"> {{ __('Do not have an account anymore?') }}<a href="{{ route('register') }}" style="color:#fda12b;font-weight: bold;"> {{ __('Sign Up') }} </a>
                                </span>
                                <div class="row">
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
        </div>
    </div>
    </div>


@endsection
