@extends('frontlayout.master')
@section('title','Blog')
@section('content')


<div class="General_Pages-header margin-top-15 aboutus_head">
    <div class="container" style="
        padding: 0;
    ">
    <div class="General_Pages-header-container" style="max-height: 60px;">
    <div class="General_Pages-inner-container" >
    <div class="General_Pages-inner-container-text" >
    <h5 class="General_Pages--text" style="padding-bottom:12px;padding-top:12px;font-size:20px;color:#c0c0c0;" >
       {{__('Home')}}/ {{__('Blog')}}
    </h5>
    </div>
    </div>
   
    </div>
    </div>
    </div>

    <section class="blog-sec" id="blog" style="padding:0">
        <div class="container">
        <div class="row">
         @foreach ($posts as $item)
            <div class="col-md-4 " style="display:inline-grid">
                 <a href="#" class="blog-box">
                <div class="blog-image-block">
                <img class="img-fluid rounded" src="{{$item->image}}" alt="Blog">
                </div>
                <div class="blog-content">
                <h3 class="blog-title ">
                   {{$item->title}}
                </h3>
                <div class="blogDetaills">
                <ul class="blog-info-link">
                <span><i class="fa fa-time"></i> {{$item->created_at}}</span>
                </ul>
                </div>
                </div>
                </a>
            </div>
        @endforeach
    
        </div>
        </div>
        </section>
        
@endsection