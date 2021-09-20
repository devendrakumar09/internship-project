@extends('Doctor.Layout.app') 
@section('meta-data')
    
@endsection 

@section('external-css')
<style>
</style >

@endsection  
@section('main-content')

@section('page-heading')
<h3 class="font-weight-bolder">Doctor Dashboard</h3>
@endsection
<div class="container dashboard">
    <div class="row">

        <div class="col-sm-8 mx-auto">
            <h2 class="card-heading font-weight-bolder">Patient Graph</h2>
            
            <div>
              <canvas id="barChart"></canvas>
            </div>

    </div>
</div>
@endsection

@section('external-js')

<script>
    var _ydata= JSON.parse('{!! json_encode($month) !!}');
    var _xdata= JSON.parse('{!! json_encode($monthCount) !!}');
</script>
<script src="{{asset('js/jquery/jquery.min.js')}}"></script>
<script src="{{asset('js/chart.js/Chart.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script src="path/to/chartjs/dist/chart.js"></script>
<script>
    $(function () {
       var barcanvas = $("#barChart");
       var barChart = new Chart(barcanvas,{
           type:"bar",
           data:{
               labels:['jan','feb','march','april','may','june','jule','agu','sep','oct','nov','dec'],
                
           }
       })
    });
</script>

@show