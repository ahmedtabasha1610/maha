@extends('frontlayout.master')
@section('content')
    <link rel="stylesheet" href="{{ asset('front/Content/css/landing.css') }}" />
    <div class="row" style="margin-top:50px">
        <link rel="stylesheet" href="{{ asset('front/Lawyers/css/icons.css') }}">
        <link rel="stylesheet" href="{{ asset('front/Lawyers/css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('front/Lawyers/css/mark-your-calendar.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('front/Lawyers/js/jquery.ui.slider-rtl.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('front/Content/css/tooltipcustom.css') }}">
        <link rel="stylesheet" href="{{ asset('front/Content/css/customnewprofile.css') }}" />
<style>
 select{
    width: 145px;

 }

</style>

        <div class="col-md-12">
            <div style="margin: auto;max-width: 1100px;">

                <div class="">
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="utf-notify-box-aera margin-top-15" >
                                <form action="{{ route('filteradvisor') }}">

                                    <div class="sort-by">

                                        <div class="widthselect50" style="flex:1">
                                            <div class="selectcustomarrow selectday">
                                                <select name="country_id">
                                                    <option selected>{{__('Country')}}</option>
                                                    @foreach (\App\Models\country::select('id', 'nicename')->get() as $coun)
                                                        <option value="{{ $coun->id }}" {{ $coun->id == $selected_id['country_id'] ? 'selected' : '' }}>
                                                            {{ $coun['nicename'] }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                            </div>

                                        </div>





                                        <div class="widthselect50" style="flex:1">
                                            <div class="selectcustomarrow selectday">
                                                <select name="service_id">
                                                    <option selected>{{__('Services')}}</option>

                                                    @foreach (\App\Models\Services::select('id', 'title','entitle')->get() as $lang)
                                                        <option value="{{ $lang->id }}" {{ $lang->id == $selected_id['service_id'] ? 'selected' : '' }}>

                                                            @if(App::currentLocale()=='en')
                                                            {{ $lang['entitle'] }}
                                                            @else
                                                            {{ $lang['title'] }}
                                                            @endif
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>









                                    </div>
                                    <style>
                                        .x{

                                           border-radius: 2px;
                                           padding-left: 20px;
                                           padding-right: 20px;
                                           padding-top: 10px;
                                           padding-bottom: 10px;
                                           color: #fff;


                                        }
                                        .x:hover{
                                            color:#fff;
                                        }
                                        .u:hover{
                                            color:#fff;
                                        }
                                    </style>
                                    <input type="submit" class=" u" style="background:#fda12b;color:snow;"  value="Filter">
                                    <a href="{{route('filteradvisor')}}" class=" x" style="background:#e9d69e;color:black;">{{__('Clear')}}</a>

                                </form>


                            </div>
                        </div>
                    </div>


                    <div class="row reverseresponsive">
                        @foreach ($alladvisor as $item)
                            <div class="col-xl-6 col-lg-12">
                                <input style="display:none;" class="form-control" id="BookedDate">
                                <input style="display:none;" class="form-control" id="SelectedLawyer">
                                <div class="material-datatables" id="listView">
                                    <div class="utf-listings-container-part compact-list-layout margin-top-15">
                                        <div class="utf-lawyer-listing listot">
                                            <div class="utf-lawyer-listing-details">
                                                <div class="col-4" style="background: #fff;border-radius:13px;">
                                                    <div class="text-center">
                                                        <img src="{{ asset('storage/images-user-profile/' . $item->avater) }}" alt="" style="margin-top:20px;border-radius:13px;">

                                                        <ul style="margin-top: 30px;font-weight:bold;color:#fda12b;margin-bottom:40px;">
                                                            <i class="fa fa-language" style="font-size: 20px;color:#fda12b;"></i>
                                                            <li style="padding-bottom:10px;">
                                                                @if(App::currentLocale()=='en')
                                                                {{ $item->language->en_name_lang }}
                                                                @else
                                                                {{ $item->language->name_lang }}
                                                                @endif
                                                               </li>
                                                            <li style="padding-bottom:10px;">{{ $item->phone2 }}</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="utf-lawyer-listing-description" style="text-align:center;">
                                                    <h3 class="utf-lawyer-listing-title">
                                                        <a> {{ $item->name }}</a><span> &nbsp;({{ $item->specialization }})</span>
                                                    </h3>

                                                    <div style="color:#000">
                                                        <style>
                                                            .parentx {

                                                                text-align: center;
                                                            }

                                                            .childx {
                                                                display: inline-block;

                                                                vertical-align: middle;
                                                            }
                                                        </style>


                                                        <br>
                                                        <div class="parentx">
                                                            <div class="childx">
                                                                <span class="certificatesnmae" style="padding-left: 10px;"><i class="fa fa-usd fa-8" aria-hidden="true" style="color:#fda12b;"></i> &nbsp;{{__('Price')}} </span>
                                                                <p class="certificatesdetails" style="font-weight: bold;">
                                                                    {{$item->amount}}$
                                                                </p>
                                                            </div>

                                                            <div class="childx">
                                                                <span class="certificatesnmae" style="padding-left: 10px;"><i class="fa fa-clock-o fa-8" aria-hidden="true" style="color:#fda12b;"></i> &nbsp;{{__('Duration')}} </span>
                                                                <p class="certificatesdetails" style="font-weight: bold;">
                                                                    00:45
                                                                </p>
                                                            </div>
                                                            <div class="childx">
                                                                <span class="certificatesnmae" style="padding-left: 10px;"><i class="fa fa-globe fa-8" aria-hidden="true" style="color:#fda12b;"></i>&nbsp;{{__('country')}} </span>
                                                                <p class="certificatesdetails" style="font-weight: bold;">
                                                                    {{ $item->country->nicename }}
                                                                </p>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <br>

                                                    <div class="black-color certs" style="margin-right:20px;">
                                                        <p style="font-weight: bold;">
                                                            {{ $item->description }}
                                                        </p>
                                                    </div>
                                                    <div class="lawyer-service" style="margin-top: 20px;margin-right:20px;">
                                                        <a class="booknowsection" href="{{ route('calendaruser.index', $item->id) }}" style="text-align: center;height:45px !important;color:snow !important;background:#fda12b;padding:5px 10px 10px 10px">  {{__('Book Now')}} !</a>

                                                    </div>
                                                </div>
                                                <div>
                                                </div>

                                            </div>



                                        </div>


                                    </div>



                                </div>

                            </div>
                        @endforeach


                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection
