@extends('layouts.adminLayout.admin_design')
@section('content')

<?php
  
  $current_month = date('M');
  $prev_month = date('M', strtotime('-1 months'));
  $last2last_month = date('M', strtotime('-2 months'));
  $dataPoints = array( 
    array("y" => $current_month_users,"label" => $current_month ),
    array("y" => $last_month_users,"label" => $prev_month ),
    array("y" => $last_to_last_month_users,"label" => $last2last_month ),
  );
?>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Customers</a> <a href="#" class="current">View Customers</a> </div>
    <h1>Customers Section</h1>

    @if(Session::has('flash_message_error'))
    <div class="alert alert-error alert-block">
      <button type="button" class="close" data-dismiss="alert">x</button>
      <strong>{!! session('flash_message_error') !!}</strong>
    </div>
    @endif

    @if(Session::has('flash_message_success'))
    <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert">x</button>
      <strong>{!! session('flash_message_success') !!}</strong>
    </div>
    @endif
  </div>

  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-content nopadding">
            <div id="chartContainer" style="height: 400px; width: 100%;"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  window.onload = function() { 
    var chart = new CanvasJS.Chart("chartContainer", {
      title: {
        text: "Users Report"
      },
      axisY: {
        title: "Number of Users"
      },
      data: [{
        type: "line",
        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
      }]
    });
    chart.render();
  }
</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
@endsection

