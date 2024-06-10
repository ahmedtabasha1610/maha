@extends('dashadvisor.dashboardadvisor')
@section('content-user')

<div class="col-lg-8">
    <div class="card mb-4">
      <div class="card-body">
        <div class="row">
            <div class="col-sm-4" style="margin-top: 20px;">
                <div class="card h-100 " style="border:2px solid #660D33">
                    <div class="card-body">
                        <strong><span style="color:#660d33;">
                            الرصيد الكلي</span>
                        </strong>
                       <h3 class="card-title"> {{$total}}$</h3>

                    </div>
                </div>
            </div>
            
            <div class="col-sm-4 " style="margin-top: 20px;">
                <div class="card h-100 " style="border:2px solid #660D33">
                    <div class="card-body">
                        <strong>
                            <span style="color:#660d33;">الرصيد المعلق</span>
                        </strong>
                       <h3 class="card-title"> {{$balance_unavailable}} $</h3>

                    </div>
                </div>
            </div>
            <div class="col-sm-4" style="margin-top: 20px;">
                <div class="card h-100 " style="border:2px solid #660D33">
                    <div class="card-body">
                        <strong><span style="color:#660d33;">
                            الرصيد القابل لسحب</span>
                        </strong>
                       <h3 class="card-title"> {{$balance_available}} $</h3>

                    </div>
                </div>
            </div>
            
            <div class="table-responsive" style="margin-top: 20px;">

            <table class="table table-hover">
                <thead class="">
                    <tr>
                        <th>{{__('Order')}}</th>
                        <th>{{__('Type')}}</th>
                        <th>{{__('Status')}}</th>
                        <th>{{__('Residual')}}</th>
                        <th>{{__('history')}}</th>
                        <th>{{__('file/image')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($purchases as $item)
                        <tr>
                            <td>{{$item->order_id}}</td>
                            <td>{{$item->status}}</td>
                            <td>{{$item->confirm}}</td>
                            <td>{{$item->residual}} &nbsp;{{$item->currency}}</td>
                            <td>{{$item->historypay}}</td>
                           <td>
    
                            @isset($item->image)
                            @php
                            $extension = pathinfo(storage_path($item->image), PATHINFO_EXTENSION);
                            @endphp
                            @if($extension == 'docx' or $extension == 'pdf' ) 
                            <br><a href="{{asset('storage/images-payment-confirm/'.$item->image)}}">file</a>
                            @elseif($extension == 'png' or $extension == 'jpg')
                            <br><a href="{{asset('storage/images-payment-confirm/'.$item->image)}}">
                              <img src="{{asset('storage/images-payment-confirm/'.$item->image)}}" width="90px" height="90px">
                              </a>
                            @endif
                            @endisset
                           </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
          </div>
      
      </div>
    </div>
    <div class="row">
      
  
    </div>
  </div>


@stop