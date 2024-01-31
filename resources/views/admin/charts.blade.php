@extends('layouts.adminLayout.admin_design')
@section('content')

<?php
	use App\User;
	use App\Order;
	use App\Admin;
	$total_users_count = User::count(); 
	$total_order_count = Order::count();
	$total_vendor_count = Admin::count();
	$sale = Order::where(['order_status'=>"Paid"])->sum('grand_total');
?>

<script src="{{ asset('js/backend_js/jquery.min.js') }}"></script>
<script src="{{ asset('js/backend_js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/backend_js/jquery.flot.min.js') }}"></script>

<div id="content">
	<div id="content-header">
		<div id="breadcrumb"><a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>  <a href="#" class="current">Statistics</a>
		</div>
		<h1>Statistics</h1>
	</div>

	<div class="container-fluid">

		<div class="row-fluid">
		    <div class="span12">
		      <div class="widget-box">
		        <div class="widget-content nopadding">
		          <form class="form-horizontal" action="{{ url('admin/chart/') }}" method="post"> {{ csrf_field() }}
		          	<div class="row-fluid" style="margin-top: 0px;">
			          	<div class="span3">
				            <div class="control-group">
								<label class="control-label">From </label>
								<div class="controls">
									<div class="input-append">										
										<input type="date" name="datefrom" value="<?php if(!empty($datefrom)){ echo date('d-m-Y', strtotime($datefrom)); } ?>" class="span12" >
									</div>
								</div>
				            </div>
				        </div>
			          	<div class="span3">
				            <div class="control-group">
				              	<label class="control-label">To</label>
				              	<div class="controls">
				                	<div class="input-append">
				                  		<input type="date" name="dateto" value="<?php if(!empty($dateto)){ echo date('d-m-Y', strtotime($dateto)); } ?>" class="span12" >
				                	</div>
				              	</div>
				            </div>
				        </div>
				        <div class="span1">
				            <div class="controls">
				              <button type="submit" class="btn btn-success">View</button>
				            </div>
				        </div>
				    </div>
		          </form>
		        </div>
		      </div>
		    </div>
	  	</div>

	  	@if(!empty($datefrom))
		<h5 class="text-success text-center"><i class="fa fa-clock-o"></i> From 05 Jun 2020 To 08 July 2020</h5>
		@endif

		<div class="widget-box widget-plain">
			<div class="center d-flex justify-content-center">
				<ul class="stat-boxes2">
					<li>
						<div class="left peity_line_neutral"><span><span style="display: none;">10,15,8,14,13,10,10,15</span>
							<i class="fa fa-user-plus fa-2x"></i></span></div>
						<div class="right"> <strong><?php if(!empty($users_count)){ echo $users_count; } else { echo $total_users_count; } ?></strong>Total Users</div>
					</li>
					<li>
						<div class="left peity_bar_bad"><span><span style="display: none;">3,5,6,16,8,10,6</span>
							<i class="fa fa-bell fa-2x"></i></span></div>
						<div class="right"> <strong><?php if(!empty($users_count)){ echo $users_count; } else { echo $total_order_count; } ?></strong>Total Orders</div>
					</li>
					<li>
						<div class="left peity_line_good"><span><span style="display: none;">12,6,9,23,14,10,17</span>
							<i class="fas fa-rupee-sign fa-2x"></i></span></div>
						<div class="right"> <strong><?php if(!empty($users_count)){ echo $users_count; } else { echo $sale; } ?></strong> Total Sale</div>
					</li>
					<li>
						<div class="left peity_line_neutral"><span><span style="display: none;">10,15,8,14,13,10,10,15</span>
							<i class="fa fa-user fa-2x"></i></span></div>
						<div class="right"> <strong><?php if(!empty($users_count)){ echo $users_count; } else { echo $total_users_count; } ?></strong> Users</div>
					</li>
					<li>
						<div class="left peity_bar_bad"><span><span style="display: none;">3,5,6,16,8,10,6</span>
							<i class="fa fa-bell fa-2x"></i></span></div>
						<div class="right"> <strong><?php if(!empty($users_count)){ echo $users_count; } else { echo $total_order_count; } ?></strong> Orders</div>
					</li>
					<li>
						<div class="left peity_line_good"><span><span style="display: none;">12,6,9,23,14,10,17</span>
							<i class="fa fa-users fa-2x"></i></span></div>
						<div class="right"> <strong><?php if(!empty($users_count)){ echo $users_count; } else { echo $total_vendor_count; } ?></strong> Vendors</div>
					</li>
				</ul>
			</div>
		</div>
	  	
	  	@if(!empty($orders))
		<div class="row-fluid">
			<div class="span12">
				<div class="widget-box">
					<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
						<h5>All Orders from <span class="text-success"><?php if(!empty($datefrom)){ echo date('d M Y', strtotime($datefrom)); } ?></span> - <span class="text-success"><?php if(!empty($dateto)){ echo date('d M Y', strtotime($dateto)); } ?></span></h5>
					</div>
					<div class="widget-content nopadding table table-responsive">
						<table class="table table-bordered data-table">
							<thead>
								<tr>
									<th>Order ID</th>
									<th>Order Date</th>
									<th>Customer Name</th>
									<th>Customer Email</th>
									<th>Ordered Products</th>
									<th>Order Amount</th>
									<th>Order Status</th>
									<th>Payment Method</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($orders as $order)
								<tr class="gradeX">
									<td style="text-align: center;"><span style="display: none;">{{ $loop->index+1 }}</span>#{{ $order->id }}</td>
									<td>{{ date('d M Y, h:i', strtotime($order->created_at)) }}</td>
									<td>{{ $order->name }}</td>
									<td>{{ $order->user_email }}</td>
									<td style="text-align: center;">@foreach($order->orders as $pro) {{ $pro->product_code }} ({{ $pro->product_qty }})&nbsp;&nbsp; @endforeach</td>
									<td style="text-align: center;">₹ {{ $order->grand_total }}</td>
									<td style="text-align: center;">{{ $order->order_status }}</td>
									<td style="text-align: center;">{{ $order->payment_method }}</td>
									<td class="center"> 
										<a href="{{ url('/admin/view-order/'.$order->id) }}" class="btn btn-primary btn-mini" title="View Order Details"> Details</a>
										@if($order->order_status == "Shipped" || $order->order_status == "Delivered" || $order->order_status == "Paid") <a href="{{ url('/admin/view-order-invoice/'.$order->id) }}" class="btn btn-success btn-mini" title="View Order Invoice">Invoice</a>
										<a href="{{ url('/admin/view-pdf-invoice/'.$order->id) }}" class="btn btn-warning btn-mini" title="View PDF Invoice">PDF </a>
										@endif</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		@endif

		{{-- <div class="row-fluid">
			<div class="span12">
				<div class="widget-box">
					<div class="widget-title"> <span class="icon"> <i class="icon-signal"></i> </span>
						<h5>Real Time chart</h5>
					</div>
					<div class="widget-content">
						<div id="placeholder2"></div>
						<p>Time between updates:
							<input id="updateInterval" type="text" value="" style="text-align: right; width:5em">milliseconds</p>
					</div>
				</div>
			</div>
		</div> 
		<div class="row-fluid">
			<div class="span12">
				<div class="widget-box">
					<div class="widget-title"> <span class="icon"> <i class="icon-signal"></i> </span>
						<h5>Turning-series chart</h5>
					</div>
					<div class="widget-content">
						<div id="placeholder"></div>
						<p id="choices"></p>
					</div>
				</div>
			</div>
		</div>--}}

		<div class="row-fluid">
			<div class="span6">
				<div class="widget-box">
					<div class="widget-title"> <span class="icon"> <i class="icon-signal"></i> </span>
						<h5>Pie chart</h5>
					</div>
					<div class="widget-content">
						<div class="pie"></div>
					</div>
				</div>
			</div>
			<div class="span6">
				<div class="widget-box">
					<div class="widget-title"> <span class="icon"> <i class="icon-signal"></i> </span>
						<h5>Line chart</h5>
					</div>
					<div class="widget-content">
						<div class="bars"></div>
					</div>
				</div>
			</div>
		</div>

		 {{-- line chart --}}
		<div class="row-fluid">
			<div class="span12" style="display: block;">
				<div class="widget-box">
					<div class="widget-title"> <span class="icon"> <i class="icon-signal"></i> </span>
						<h5>Bar chart</h5>
					</div>
					<div class="widget-content">
						<div class="chart"></div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>

<!--Turning-series-chart-js-->
<script src="{{ asset('js/backend_js/matrix.dashboard.js')}}"></script>@endsection