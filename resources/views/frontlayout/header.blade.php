
 <nav class="navbar navbar-expand-lg navbar-light bg-light p-0 position-relative">
  <img class="navbar__image-layer"
    src="{{asset('desgin/wp-content/themes/website/dist/images/shapes/white/nav.png')}}">
  <div class="container">
    <a class="navbar-brand" href="{{route('homepage')}}" >
     خدمات بيتك
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
      aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="text-center collapse navbar-collapse" id="navbarTogglerDemo01">
      <ul class="navbar-nav mt-2 mt-lg-0 d-flex justify-content-between px-5">
        <li class="nav-item d-flex justify-content-center active">
          <a class="nav-link" href="{{route('homepage')}}">الرئيسية</a>
        </li>
        <li class="nav-item d-flex justify-content-center">
          <a class="nav-link" href="{{route('page',6)}}">من نحن</a>
        </li>
        <li
          class="nav-item d-flex justify-content-center">
          <a class="nav-link"
            href="#ser">خدماتنا</a>
        </li>
   
      
        <li class="nav-item d-flex justify-content-center">
          <a class="btn nav-link" href="{{route('contact')}}">تواصل معنا</a>
        </li>
 
        @if (Route::has('login'))
        @auth
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#" style="font-size:22px !important;">
            <i class="fa fa-envelope"></i>
            <span class="badge badge-warning navbar-badge" style="text-align: center;" >{{Auth::user()->unreadNotifications()->where('type', 'App\Notifications\dashNotifaction')->count()}}</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">
            <span class="dropdown-item dropdown-header" style="text-align: center;">({{Auth::user()->unreadNotifications()->where('type', 'App\Notifications\dashNotifaction')->count()}}){{__('Notifications')}}</span>
            
   
             @if(auth()->user()->isadvisor())
             @forelse (auth()->user()->unReadNotifications->where('type', 'App\Notifications\dashNotifaction') as $notification) 
              
             <div class="dropdown-divider"></div>
             <a href="{{route('marksreadnotifiyfromadmin.showadvisor',$notification->id)}}" class="dropdown-item" style="text-align: center;" >
               {{$notification->data['title']}}
             </a>
             @empty
             <a class="dropdown-item" style="text-align: center;">{{__('no record found')}}</a>
   
          @endforelse
          <a class="dropdown" style="text-align: center;" href="{{route('showadvisorallnotifiy')}}">جميع الاشعارات</a>
          @elseif(auth()->user()->isuser())
          @forelse (auth()->user()->unReadNotifications->where('type', 'App\Notifications\dashNotifaction') as $notification) 
              
          <div class="dropdown-divider"></div>
          <a href="{{route('marksreadnotifiyfromadmin.showuser',$notification->id)}}" class="dropdown-item" style="text-align: center;" >
            {{$notification->data['title']}}
          </a>
          @empty
          <a class="dropdown-item" style="text-align: center;">{{__('no record found')}}</a>

       @endforelse
       <a class="dropdown" style="text-align: center;" href="{{route('showuserallnotifiy')}}">جميع الاشعارات</a>
            

          @endif
        
          </div>
        </li>
        @if(auth()->user()->isuser())
  <li class="nav-item dropdown" id="ixx">
    <a class="nav-link" data-toggle="dropdown" href="#" style="font-size:22px !important;">
      <i class="fa fa-bell"></i>
      <span class="badge badge-warning navbar-badge" style="text-align: center;" >{{Auth::user()->unreadNotifications()->where('type', 'App\Notifications\agreeanddisagreebookingNotification')->count()}}</span>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left" >
      <span class="dropdown-item dropdown-header" style="text-align: center;">({{Auth::user()->unreadNotifications()->where('type', 'App\Notifications\agreeanddisagreebookingNotification')->count()}}){{__('Notifications')}}</span>
      

           
    @forelse (auth()->user()->unReadNotifications->where('type', 'App\Notifications\agreeanddisagreebookingNotification') as $notification) 
        
    <div class="dropdown-divider"></div>
    <a href="{{route('details.advisor',['advisor_id'=>$notification->data['advisor_id'],'id'=>$notification->data['purchase_id'],'notifiy_id'=>$notification->id])}}" class="dropdown-item" style="text-align: center;" >
      {{$notification->data['title']}}
      <br>
      {{$notification->data['status']}}
    </a>
    @empty
    <a class="dropdown-item" style="text-align: center;">{{__('no record found')}}</a>

 @endforelse
 <a class="dropdown" style="text-align: center;" href="{{route('myconsulting.index')}}">حجوزاتي</a>
      

  
    </div>
  </li>
  @endif

  @if(auth()->user()->isadvisor())
  <li class="nav-item dropdown" >
    <a class="nav-link" data-toggle="dropdown" href="#" style="font-size:22px !important;">
      <i class="fa fa-bell"></i>
      <span class="badge badge-warning navbar-badge" style="text-align: center;" >{{Auth::user()->unreadNotifications()->where('type', 'App\Notifications\confirmedpaymentNotification')->count()}}</span>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left" >
      <span class="dropdown-item dropdown-header" style="text-align: center;">({{Auth::user()->unreadNotifications()->where('type', 'App\Notifications\confirmedpaymentNotification')->count()}}){{__('Notifications')}}</span>

    @forelse (auth()->user()->unReadNotifications->where('type', 'App\Notifications\confirmedpaymentNotification') as $notification) 
        
    <div class="dropdown-divider"></div>
    <a href="{{route('balance')}}" class="dropdown-item" style="text-align: center;" >
      {{$notification->data['title']}}
     
     
    </a>
    @empty
    <a class="dropdown-item" style="text-align: center;">{{__('no record found')}}</a>

 @endforelse
      


   
   
  
    </div>
  </li>
  @endif
    <!--  Dropdown Menu -->
    <li class="dropdown mainabout">
      <a type="button" id="dropdownMenuButton2"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size:22px !important;">
       {{-- <img src="{{asset('front/Content/img/svg/Vector.svg')}}"> --}}
       <i class="fa fa-user-circle"></i>
      </a>
      <div class="dropdown-menu mylinkdp-mn" >
       @if(auth()->user()->isadmin())
      <a  href="{{ url('/home') }}" class="dropdown-item" style="text-align: center;">{{__('Dashboard')}}</a>
     @elseif(auth()->user()->isuser())
      <a  href="{{route('homeuser')}}"class="dropdown-item" style="text-align: center;">{{__('Dashboard User')}}</a>
       @elseif(auth()->user()->isadvisor())
       <a  href="{{route('homeadvisor')}}" class="dropdown-item" style="text-align: center;">{{__('Dashboard Employee')}}</a>
       @else

      <a href="{{url('/home')}}" class="dropdown-item"style="text-align: center;" >{{__('Dashboard ')}}</a>
     @endif 
     @if(auth()->user()->isuser())

     <a  class="dropdown-item" href="{{route('filteradvisor')}}" style="text-align: center;">{{__('Employee')}} </a>
     @endif
     <a  href="{{ route('logout') }}" class="dropdown-item"style="text-align: center;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      {{__('Logout')}}</a>
   <form id="logout-form" action="{{ route('logout') }}" method="POST" >
          @csrf
         </form>
    
      </div>
      </li>

           @else
         <li
          class="nav-item d-flex justify-content-center">
          <a class="nav-link"
            href="{{ route('register') }}">{{__('Sign Up')}}</a>
        </li>
           <li
          class="nav-item d-flex justify-content-center">
          <a class="btn btn-outline-secondary rounded-pill px-4"
            href="{{ route('login') }}">{{__('Sign In')}}</a>
        </li>
       @endif
       
       @endif
      </ul>

    
    </div>
  </div>
</nav>
<br>
<br>
<br>


  