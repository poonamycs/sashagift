@extends('layouts.adminLayout.admin_design')
@section('content')

<?php
  $current_month = date('M');
  $prev1_month = date('M', strtotime('-1 months'));
  $prev2_month = date('M', strtotime('-2 months'));
  $prev3_month = date('M', strtotime('-3 months'));
  $prev4_month = date('M', strtotime('-4 months'));
  $prev5_month = date('M', strtotime('-5 months'));
?>
<script>
	window.onload = function () {

		var chart = new CanvasJS.Chart("chartContainer", {
			animationEnabled: true,
			theme: "light2", // "light1", "light2", "dark1", "dark2"
			title:{
				text: "Orders Monthwise (6 Months)"
			},
			axisY: {
				title: "No. of Orders"
			},
			data: [{        
				type: "column",  
				showInLegend: false, 
				legendMarkerColor: "grey",
				legendText: "Months (Last 6 Month)",
				dataPoints: [      
					{ y: <?php echo $current_month_orders ?>, label: "<?php echo $current_month ?>" },
					{ y: <?php echo $last1_month_orders ?>,  label: "<?php echo $prev1_month ?>" },
					{ y: <?php echo $last2_month_orders ?>,  label: "<?php echo $prev2_month ?>" },
					{ y: <?php echo $last3_month_orders ?>,  label: "<?php echo $prev3_month ?>" },
					{ y: <?php echo $last4_month_orders ?>,  label: "<?php echo $prev4_month ?>" },
					{ y: <?php echo $last5_month_orders ?>,  label: "<?php echo $prev5_month ?>" },
				]
			}]
		});
		chart.render();
	}
</script>


<div id="content">
	<div id="content-header">
		<div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Orders</a> <a href="#" class="current">View Orders Chart</a>
		</div>

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

	<div class="row-fluid">
	  <div class="span12">
	    <div class="widget-box">        
	      <div class="widget-content nopadding">
	        <div id="chartContainer" style="height: 550px; width: 100%;"></div>
	      </div>
	    </div>
	  </div>
	</div>
</div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

@endsection