@extends('dashuser.dashboarduser')
@section('content-user')



<div class="col-lg-8 ">
    <div class="card">
      <div class="card-body">
         <h3 style="text-align: center;">حجوزاتي</h3>
         <br>
      
    <span >
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-fill" viewBox="0 0 16 16" style="color: #000;">
        <path fill-rule="evenodd" d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.004-.001.274-.11a.75.75 0 0 1 .558 0l.274.11.004.001 6.971 2.789Zm-1.374.527L8 5.962 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339Z"/>
      </svg>
    </span>
       {{__('Reservations pending approval')}}   
       <br>
       <br>
      
       <span>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-fill" viewBox="0 0 16 16" style="color: green;">
          <path fill-rule="evenodd" d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.004-.001.274-.11a.75.75 0 0 1 .558 0l.274.11.004.001 6.971 2.789Zm-1.374.527L8 5.962 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339Z"/>
        </svg>
    </span>
       {{__('Reservations approved by the consultant')}} 
       <br>
       <br>
       <span>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-fill" viewBox="0 0 16 16" style="color: red;">
          <path fill-rule="evenodd" d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.004-.001.274-.11a.75.75 0 0 1 .558 0l.274.11.004.001 6.971 2.789Zm-1.374.527L8 5.962 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339Z"/>
        </svg>
    </span>
       {{__('Reservations not approved by the consultant')}} 
       <br>
       <br>
       <span>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-fill" viewBox="0 0 16 16" style="color: blue;">
          <path fill-rule="evenodd" d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.004-.001.274-.11a.75.75 0 0 1 .558 0l.274.11.004.001 6.971 2.789Zm-1.374.527L8 5.962 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339Z"/>
        </svg>
    </span>
       {{__('Reservations completed and confirmed by the Administrator')}} 
       <br>
       <br>
       <span>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-fill" viewBox="0 0 16 16" style="color: orange;">
          <path fill-rule="evenodd" d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.004-.001.274-.11a.75.75 0 0 1 .558 0l.274.11.004.001 6.971 2.789Zm-1.374.527L8 5.962 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339Z"/>
        </svg>
    </span>
       {{__('Reservations closed and confirmed by the administrator')}}
    <br><br>
    <div class="table-responsive">
          <table id="dtBasicExample" class="table" cellspacing="0" width="60%">
              <thead>
                <tr>
                    <th class="th-sm">#</th>  
                  <th class="th-sm"> {{__('Consultant Name')}}
                  </th>
                  <th class="th-sm">{{__('Email')}}
                </th>
                <th class="th-sm">{{__('Phone')}}
                </th>
             
                  <th class="th-sm">{{__('Counseling type')}}
                  </th>
                  <th class="th-sm">{{__('Created At')}}
                  </th>
               
                  <th class="th-sm">{{__('Status')}}
                </th>
                <th class="th-sm">{{__('more')}}
                </th>
                </tr>
              </thead>
              <tbody>
           
            @foreach ($purchases as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->advisor->name}} &nbsp;{{$item->advisor->lastname}}</td>
                <td>{{$item->advisor->email}}</td>
                <td>{{$item->advisor->phone}}</td>
                <td>
                    @foreach ($sers as $ser)
                        @if($item->advisor->service_id== $ser->id)
                        {{__($ser->title)}}
                        @endif
                    @endforeach
                </td>
                <td>{{$item->created_at}}</td>
                <td>
                  @if($item->status=='ok')
                  <a href="#" style="color: green;font-weight:bold;">{{__('ok')}}</a>
                  @elseif($item->status=='waiting')
                  <a href="#" style="color: black;font-weight:bold;">{{__('waiting')}}</a>
                  @elseif($item->status=='refunded')
                  <a href="#" style="color: orange;font-weight:bold;">{{__('refunded')}}</a>
                  @elseif($item->status=='canceled')
                  <a href="#" style="color: red;font-weight:bold;">{{__('canceled')}}</a>
                
                  @elseif($item->status=='completed')
                  <a href="#" style="color: blue;font-weight:bold;">{{__('completed')}}</a>
                  @endif
                </td>
                <td><a href="{{route('details.advisor',['advisor_id'=>$item->advisor_id,'id'=>$item->id])}}" style="color: #ffc824;font-weight:bold;" >{{__('show')}}</a></td>
              </tr>
            @endforeach
             
              </tbody>
            </table> 
    </div>
            {{$purchases->links()}}
      </div>
    </div>
    <div class="row">
   
  
    </div>
  </div>

@stop