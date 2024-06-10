@extends('dashadvisor.dashboardadvisor')
@section('content-user')
<div class="col-lg-8">
    <div class="card mb-4">
      <div class="card-body">
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0">{{__('Name')}} </p>
          </div>
          <div class="col-sm-9">
            <p class="text-muted mb-0">   {{Auth::user()->name}} </p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0"> {{__('Email')}}</p>
          </div>
          <div class="col-sm-9">
            <p class="text-muted mb-0">{{Auth::user()->email}}</p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0"> {{__('Phone')}}</p>
          </div>
          <div class="col-sm-9">
            <p class="text-muted mb-0">{{Auth::user()->phone}}</p>
          </div>
        </div>
        <hr>
   
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0">{{__('Address')}}</p>
          </div>
          <div class="col-sm-9">
            <p class="text-muted mb-0"> {{Auth::user()->address}}</p>
          </div>
        </div>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-body">
    <div class="row">
      <div class="col-sm-5">
        <table class="table table-striped table-light">
          <thead>
            <tr>
              <th scope="col">{{__('waiting')}}</th>
              <th scope="col">{{__('complete')}}</th>
              <th scope="col">{{__('canceled')}}</th>
              {{-- <th scope="col">canceld</th>
              <th scope="col">avialable</th> --}}
            </tr>
          </thead>
          <tbody>
            <tr style="">
             
              <td>{{$waiting}}</td>
              <td>{{$completed}}</td>
              <td>{{$refunded}}</td>
            
            </tr>
        
            
          </tbody>
        </table>
        
      </div>
       <div class="col-sm-7">
        <div class="row">
          <canvas id="myChart" style="width:100%;max-width:600px;"></canvas>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    
          <script>
          var xValues = ["completed","canceled","ok","waiting","refunded"];
          var yValues = [{{$completed}},{{$canceled}},{{$ok}},{{$waiting}},{{$refunded}}];
          var barColors = [
            "blue",
            "red",
            "green",
            "black",
            "orange"
          ];
          
          new Chart("myChart", {
            type: "pie",
            data: {
              labels: xValues,
              datasets: [{
                backgroundColor: barColors,
                data: yValues
              }]
            },
            options: {
              title: {
                display: true,
                text: "احصائيات خاصة بالحجوزات"
              }
            }
          });
          </script>
          
      
        </div>
        </div>
       </div>
  
    </div>
      </div></div>
  </div>
@endsection