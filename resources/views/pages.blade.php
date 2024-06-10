@extends('frontlayout.master')
@section('title','HomePage')
@section('content')

<style>
    .taxnum {
        font-size: 18px;
        font-weight: bold;
     
    }
</style>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
    <section id="about" style="padding: 8px 0;margin-top:-60px;">
        <div class="container" style="padding:0">
        <div class="row about-extra">
        <div class="col-lg-6 wow fadeInUp order-1 order-lg-2" style="visibility: visible; animation-name: fadeInUp;">
        <img src="{{asset('desgin/wp-content/themes/website/dist/images/designs/b8akServices.png')}}" class="img-fluid" alt="" width="405" height="404" style="margin-bottom:20px;">
        </div>
        <div class="col-lg-6 wow fadeInUp pt-4 pt-lg-0 order-2 order-lg-1" style="visibility: visible; animation-name: fadeInUp;margin-bottom:20px;">
     
        <p class="taxnum" style="color:#928e8e;">{{$pagecontent->bodyar }}</p>
        </div>
        </div>
        </div>
        </section>

     
      
@endsection