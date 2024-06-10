@extends('frontlayout.master')
@section('title','HomePage')
@section('home')

  <!-- Join as service provider -->
  <div class="modal fade" id="joinAsServiceProvide" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal__sp position-relative">
      <div class="modal-content rounded-0 position-relative">
        <button class="close position-absolute modalCloseBtn" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="modal-body d-flex justify-content-center joinAs__modalBody">
          <div class="w-75 text-center">
            <h2 class="my-5 font-weight-bold">اشترك كمزود خدمة</h2>
            <div class="row d-flex justify-content-around mb-5">
              <div class="modal__joinAsContainer bg-white">
                <input class="form-check-input" type="radio" value="person" name="joinAs" id="joinAsPerson">
                <label class="w-100 h-100 cursor-pointer d-flex justify-content-center align-items-center flex-column"
                  for="joinAsPerson">
                  <img src="{{asset('desgin/wp-content/themes/website/dist/images/icons/person.png')}}"
                    alt="">
                  <h4 class="mt-3">فرد</h4>
                </label>
              </div>
              <div class="modal__joinAsContainer">
                <input class="form-check-input" type="radio" value="company" name="joinAs" id="joinAsCompany">
                <label class="w-100 h-100 cursor-pointer d-flex justify-content-center align-items-center flex-column"
                  for="joinAsCompany">
                  <img src="{{asset('desgin/wp-content/themes/website/dist/images/icons/company.html')}}"
                    alt="">
                  <h4 class="mt-3">شركة</h4>
                </label>
              </div>
            </div>

            <!-- Join as service provider form -->
            <!--  -->
          </div>
        </div>
      </div>
    </div>
  </div><!-- join-as-services-provider-end -->


<div class="index-page page">


  <div class="index-page__services">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-6 text-center">
          <div class="text-center my-4">
            <h5 class="arrow-before-text primary-golden-color d-inline-block">خدماتنا            </h5>
            <p class="font-weight-bold h5">الخدمات المنزلية الشائعة</p>
            <img class="img-fluid my-3"
              src="{{asset('desgin/wp-content/themes/website/dist/images/designs/b8akServices.png')}}">
          </div>
          <a class="btn btn-outline-secondary rounded-pill px-4"
            href="{{route('filteradvisor')}}"> اطلب الخدمة</a>
        </div>

        <div class="col-12 col-md-6 my-5">
          <div class="row">

            <div class="col-6 col-md-6 my-2">
              <div class="bg-white border">
                <div class="mx-auto img-container rounded-circle d-flex justify-content-center align-items-center my-3">
                  <img src="{{asset('desgin/wp-content/uploads/2021/05/women-cleaning.png')}}" width="50">
                </div>
                <h6 class="font-weight-bold text-center">عاملات نظافة بالساعة</h6>
                <div class="text-right p-3">
                </div>
              </div>
            </div>

            <div class="col-6 col-md-6 my-2">
              <div class="bg-white border">
                <div class="mx-auto img-container rounded-circle d-flex justify-content-center align-items-center my-3">
                  <img src="{{asset('desgin/wp-content/uploads/2020/10/Establishment-of-plumbing-work.svg')}}" width="50">
                </div>
                <h6 class="font-weight-bold text-center">السباكة</h6>
                <div class="text-right p-3">
                </div>
              </div>
            </div>

            <div class="col-6 col-md-6 my-2">
              <div class="bg-white border">
                <div class="mx-auto img-container rounded-circle d-flex justify-content-center align-items-center my-3">
                  <img src="{{asset('desgin/wp-content/uploads/2020/10/AC.svg')}}" width="50">
                </div>
                <h6 class="font-weight-bold text-center">التكييف</h6>
                <div class="text-right p-3">
                </div>
              </div>
            </div>

            <div class="col-6 col-md-6 my-2">
              <div class="bg-white border">
                <div class="mx-auto img-container rounded-circle d-flex justify-content-center align-items-center my-3">
                  <img src="{{asset('desgin/wp-content/uploads/2020/10/Electrical.svg')}}" width="50">
                </div>
                <h6 class="font-weight-bold text-center">الكهرباء</h6>
                <div class="text-right p-3">
                </div>
              </div>
            </div>
                      </div>
        </div>
      </div>
    </div>
  </div>

  <!-- How it works -->
<div class="howItsWorking bg-white py-5">
  <div class="container">
    <div class="text-center">
      <h5 class="primary-golden-color arrow-before-text d-inline-block subHeaders-font-size">
        في ثلاث خطوات بسيطة</h5>
      <h4 class="font-weight-bold mb-5">آلية طلب الخدمة</h4>
    </div>
    <div class="row">
      <div class="col-12 col-md-4 mb-4 mb-md-0 flex-center flex-column">
        <div
          class="img-container rounded-circle d-flex justify-content-center align-items-center mb-4 position-relative">
          <img src="{{asset('desgin/wp-content/themes/website/dist/images/icons/smartHome.png')}}" alt="اختر الخدمة"
            width="50">
          <div class="bg-white subNumber flex-center rounded-circle color-white position-absolute">
            <span class="flex-center">01</span>
          </div>
        </div>
        <h6 class="font-weight-bold text-center">اختر الخدمة</h6>
        <h6 class="text-center">المناسبة لك من قائمة الخدمات</h6>
      </div>
      <div class="col-12 col-md-4 mb-4 mb-md-0 flex-center flex-column">
        <div
          class="img-container rounded-circle d-flex justify-content-center align-items-center mb-4 position-relative">
          <img src="{{asset('desgin/wp-content/themes/website/dist/images/icons/mobileTouchTime.png')}}"
            alt="اختر وقت الزيارة" width="50">
          <div class="bg-white subNumber flex-center rounded-circle color-white position-absolute">
            <span class="flex-center">02</span>
          </div>
        </div>
        <h6 class="font-weight-bold text-center">  حدد موعد الحجز المناسب لك</h6>
        <h6 class="text-center">ومزود الخدمات المناسب لك</h6>
      </div>
      <div class="col-12 col-md-4 mb-4 mb-md-0 flex-center flex-column">
        <div
          class="img-container rounded-circle d-flex justify-content-center align-items-center mb-4 position-relative">
          <img src="{{asset('desgin/wp-content/themes/website/dist/images/icons/mobileTouch.png')}}"
            alt="استرخٍ وريّح بالك" width="50">
          <div class="bg-white subNumber flex-center rounded-circle color-white position-absolute">
            <span class="flex-center">03</span>
          </div>
        </div>
        <h6 class="font-weight-bold text-center">استرخٍ وريّح بالك</h6>
        <h6 class="text-center">و حنا نتكفل بالباقي</h6>
      </div>
    </div>
  </div>
</div>
<!-- how-it-works-end -->
@stop
@section('content')

<section class="servicesPage-allServices bg-white py-5" id="ser">
    <div class="container">
      <div class="text-center">
        <h5 class="arrow-before-text d-inline-block primary-golden-color subheaders-font-size">
          لعملائنا الفخورين بهم</h5>
        <h4 class="font-weight-bold mb-5">كافة الخدمات</h4>
      </div>
      <div class="row">

          @foreach($Services as $key=>$item)

        <div class="col-md-6 col-lg-4 mb-3 mb-md-4 d-flex flex-column">
          <div class="service-img-container">
            <a href="{{route('services',$item->id)}}">
              <img width="500" height="403" src="{{$item->image}}" class="img-fluid w-100 h-100 wp-post-image" >          </a>
          </div>

          <div class="single-service__content">
            <div class="d-flex py-3 px-2 bg-light align-items-start h-100">
                <h1>+</h1>
              {{-- <img src="{{asset('desgin/wp-content/uploads/2020/10/Establishment-of-plumbing-work.svg')}}" width="100" height="75"> --}}
              <div class="content-text px-3">
                <a href="{{route('services',$item->id)}}" class="text-decoration-none text-dark">
                  <h5 class="mb-3 font-weight-bold subHeaders-font-size">{{$item->title}}</h5>
                </a>
                <p class="m-0 paragraph-font-size">
                  <a href="{{route('filteradvisor',['service_idx'=>$item->id])}}" class="btn btn-warning">اطلب الخدمة</a>
                  </p>
              </div>
            </div>
          </div>
        </div>

     @endforeach







            </div>
            <div style="color: black;">
            {{$Services->links()}}
            </div>
    </div>

  </section>

@endsection

@section('foo')

<div class="index-page__askAndJoin">
    <div class="container-fluid">
      <div class="row border-top">
        <div class="col-12 col-md-6 index-page__askAndJoin__askForService bg-white">
          <div class="content w-75 text-center mx-auto my-5">
            <img class="img-fluid"
              src="wp-content/themes/website/dist/images/icons/gearLarge.png"
              alt="">
            <p class="mt-3 mb-5">
              نوفر لك خدمات العناية لمنزلك من أفضل محترفي الخدمات في منطقتك، نظام حجر فوري وبأفضل الأسعار            </p>

          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="w-75 text-center mx-auto my-5">
            <img class="img-fluid"
              src="{{asset('desgin/wp-content/themes/website/dist/images/icons/videoCall.png')}}"
              alt="">
            <p class="mt-3 mb-5">
              تمتع بدخل إضافي عند تنفيذ طلبات عمالك، بيتك يوفر لك العمل حسب توفرك لجني المزيد من الأموال            </p>
            <a href="http://b8aklanding.azurewebsites.net/register-service-provider#/register/ar" target="_blank">

            </a>
          </div>
        </div>
        <div class="col-12 col-md-6"></div>
      </div>
    </div>
  </div>
</div>

@stop
