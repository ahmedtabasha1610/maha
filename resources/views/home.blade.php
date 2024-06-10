@extends('layouts.app')
@section('contentheader')
  
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">{{ __('Dashboard') }}</h1>
              </div><!-- /.col -->
        
          
              <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

            </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>10</h3>

                  <p>{{__('number of subscribers')}}</p>
                </div>
                <div class="icon">
                </div>
                
                   </div>
               </div>
            <!-- ./col -->

            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>{{$numadvisor}}</h3>

                  <p>{{__('Number of Employee')}}</p>
                </div>
                <div class="icon">
                </div>
                
                
              </div>
            </div>

            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>{{$numUser}}</h3>

                  <p>{{__('Number Of Users')}}</p>
                </div>
                <div class="icon">
                </div>
                             </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- $company  -->
                <div class="small-box bg-success">
                  <div class="inner">
                    <h3>10%</h3>

                    <p>{{__('site earnings')}}</p>
                  </div>
                  <div class="icon">
                  </div>
                </div>
              </div>
            <!-- ./col -->
          </div>
    <h3  style="text-align: center;">{{__('Website profits per month during the current year')}} @php
        echo \Carbon\Carbon::now()->format('Y');
    @endphp</h3>

    </div>
    <div >
    <table class="table table-striped table-valign-middle">
    <thead>
    <tr>
    <th>الشهر</th>
    <th> {{__('profits')}} ($)</th>
    <th>الشهر</th>
    <th> {{__('profits')}} ($)</th>
    </tr>
    </thead>
    <tbody>
    <tr>
    <td>

    {{__('January')}}
    </td>
    <td  id="Jan"></td>
    <td>
      {{__('February')}}
      </td>
      <td id="Feb"></td>

    </tr>
    <script> 
      var my_obj = {!! $d !!};
      var json_to_html_tag = document.getElementById("Jan");
      var my_json = JSON.stringify(my_obj);
      var parsed_obj = JSON.parse(my_json);
              
      json_to_html_tag.innerHTML ="" + parsed_obj.Jan ;
        
  </script> 
      <script> 
        var my_obj = {!! $d !!};
        var json_to_html_tag = document.getElementById("Feb");
        var my_json = JSON.stringify(my_obj);
        var parsed_obj = JSON.parse(my_json);
                
        json_to_html_tag.innerHTML ="" + parsed_obj.Feb ;
          
    </script> 
    <tr>
      <td>
      {{__('March')}}
      </td>
      <td id="Mar"></td>
      <td>
        {{__('April')}}
        </td>
        <td id="Apr"> </td>
    
   
      </tr>
      <script> 
        var my_obj = {!! $d !!};
        var json_to_html_tag = document.getElementById("Mar");
        var my_json = JSON.stringify(my_obj);
        var parsed_obj = JSON.parse(my_json);
                
        json_to_html_tag.innerHTML ="" + parsed_obj.Mar ;
          
    </script> 
        <script> 
          var my_obj = {!! $d !!};
          var json_to_html_tag = document.getElementById("Apr");
          var my_json = JSON.stringify(my_obj);
          var parsed_obj = JSON.parse(my_json);
                  
          json_to_html_tag.innerHTML ="" + parsed_obj.Apr ;
            
      </script> 
      <tr>
        <td>
        {{__('May')}}
        </td>
        <td id="May"></td>
        <td>
          {{__('June')}}
          </td>
          <td id="Jun"></td>
      
     
        </tr>

        <script> 
          var my_obj = {!! $d !!};
          var json_to_html_tag = document.getElementById("May");
          var my_json = JSON.stringify(my_obj);
          var parsed_obj = JSON.parse(my_json);
                  
          json_to_html_tag.innerHTML ="" + parsed_obj.May ;
            
      </script> 
          <script> 
            var my_obj = {!! $d !!};
            var json_to_html_tag = document.getElementById("Jun");
            var my_json = JSON.stringify(my_obj);
            var parsed_obj = JSON.parse(my_json);
                    
            json_to_html_tag.innerHTML ="" + parsed_obj.Jun ;
              
        </script>
        <tr>
          <td>
          {{__('July')}}
          </td>
          <td id="Jul"></td>
          <td>
            {{__('August')}}
            </td>
            <td id="Aug"></td>
        
       
          </tr> 
          <script> 
            var my_obj = {!! $d !!};
            var json_to_html_tag = document.getElementById("Jul");
            var my_json = JSON.stringify(my_obj);
            var parsed_obj = JSON.parse(my_json);
                    
            json_to_html_tag.innerHTML ="" + parsed_obj.Jul ;
              
        </script> 
            <script> 
              var my_obj = {!! $d !!};
              var json_to_html_tag = document.getElementById("Aug");
              var my_json = JSON.stringify(my_obj);
              var parsed_obj = JSON.parse(my_json);
                      
              json_to_html_tag.innerHTML ="" + parsed_obj.Aug ;
                
          </script>
              <tr>
            <td>
            {{__('September')}}
            </td>
            <td id="Sep"> </td>
            <td>
              {{__('October')}}
              </td>
              <td id="Oct"></td>
          
         
            </tr>
            <script> 
              var my_obj = {!! $d !!};
              var json_to_html_tag = document.getElementById("Sep");
              var my_json = JSON.stringify(my_obj);
              var parsed_obj = JSON.parse(my_json);
                      
              json_to_html_tag.innerHTML ="" + parsed_obj.Sep ;
                
          </script> 
              <script> 
                var my_obj = {!! $d !!};
                var json_to_html_tag = document.getElementById("Oct");
                var my_json = JSON.stringify(my_obj);
                var parsed_obj = JSON.parse(my_json);
                        
                json_to_html_tag.innerHTML ="" + parsed_obj.Oct ;
                  
            </script>
            <tr>
              <td>
              {{__('November')}}
              </td>
              <td id="Nov"></td>
              <td>
                {{__('December')}}
                </td>
                <td id="Dec"> </td>
            
           
              </tr>
              <script> 
                var my_obj = {!! $d !!};
                var json_to_html_tag = document.getElementById("Nov");
                var my_json = JSON.stringify(my_obj);
                var parsed_obj = JSON.parse(my_json);
                        
                json_to_html_tag.innerHTML ="" + parsed_obj.Nov ;
                  
            </script> 
                <script> 
                  var my_obj = {!! $d !!};
                  var json_to_html_tag = document.getElementById("Dec");
                  var my_json = JSON.stringify(my_obj);
                  var parsed_obj = JSON.parse(my_json);
                          
                  json_to_html_tag.innerHTML ="" + parsed_obj.Dec ;
                    
              </script>
  
    </tbody>
    </table>
       
    

             </div>
   
             </div>
         
   

  

      
        
        </div><!-- /.container-fluid -->
      </section>

@stop
