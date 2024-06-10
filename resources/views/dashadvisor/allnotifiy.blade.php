@extends('dashadvisor.dashboardadvisor')
@section('content-user')

<div class="col-lg-8">
    <div class="card mb-4">
      <div class="card-body">
        @forelse($notification as $item)
        <div class="row">
            <div class="col-sm-3">
              <p class="mb-0">{{__('Main Title')}} </p>
              <p class="mb-0">{{__('Created At')}} </p>
            </div>
            <div class="col-sm-9">
             <a href="{{route('marksreadnotifiyfromadmin.showadvisor',$item->id)}}"> <p class="text-muted mb-0">    
            @php
              $t=json_decode($item->data);
            @endphp
            {{$t->title}}
            </p></a>
             <a href="{{route('marksreadnotifiyfromadmin.showadvisor',$item->id)}}"> <p class="text-muted mb-0"> {{$item->created_at}} </p></a>
            </div>
          </div>
          <hr>  
          @empty
          <a class="dropdown-item">{{__('no record found')}}</a>

       @endforelse
 
   

      
      </div>
    </div>
    <div class="row">
   
  
    </div>
  </div>


@stop