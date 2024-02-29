@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Order Details</a> </div>
    <h1>Order ID <b>#{{ $orderDetails->id }}</b></h1>
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
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title">
            <h5>Order Details</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-striped table-bordered">             
              <tbody>
                <tr>
                  <td class="taskDesc"> Order Date</td>
                  <td class="taskStatus">{{ date('d M Y | h:i a', strtotime($orderDetails->created_at)) }}</td>                  
                </tr>
                <tr>
                  <td class="taskDesc"> Order Status</td>
                  <td class="taskStatus">{{ $orderDetails->order_status }}</td>
                </tr>
                <tr>
                  <td class="taskDesc"> Order Total</td>
                  <td class="taskStatus">₹ {{ $orderDetails->grand_total }}</td>
                </tr>
                <tr>
                  <td class="taskDesc"> Shipping Charges</td>
                  <td class="taskStatus">₹ {{ $orderDetails->shipping_charges }}</td>
                </tr>
                <!-- <tr>
                  <td class="taskDesc"> Coupon Code</td>
                  <td class="taskStatus">{{ $orderDetails->coupon_code }}</td>
                </tr> -->
                <!-- <tr>
                  <td class="taskDesc"> Coupon Amount</td>
                  <td class="taskStatus">₹ {{ $orderDetails->coupon_amount }}</td>
                </tr> -->
                <tr>
                  <td class="taskDesc"> Payment Method</td>
                  <td class="taskStatus">{{ $orderDetails->payment_method }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="accordion" id="collapse-group">
          <div class="accordion-group widget-box">
            <div class="accordion-heading">
              <div class="widget-title">
                <h5>Billing Details</h5>
              </div>
            </div>
            <div class="collapse in accordion-body" id="collapseGOne">
              <div class="widget-content">
              		{{ $userDetails->name }} <br>
              		{{ $userDetails->mobile }} <br>
              		{{ $userDetails->address }} <br>
              		{{ $userDetails->city }} <br>
              		{{ $userDetails->state }} <br>
              		{{ $userDetails->country }} <br>
              		{{ $userDetails->pincode }}
               </div>
            </div>
          </div>
        </div>
      </div>
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title">
            <h5>Customer Details</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-striped table-bordered">             
              <tbody>
                <tr>
                  <td class="taskDesc"> Customer Name</td>
                  <td class="taskStatus">{{ $orderDetails->name }}</td>
                </tr>
                <tr>
                  <td class="taskDesc"> Customer Mobile No.</td>
                  <td class="taskStatus">{{ $orderDetails->mobile }}</td>
                </tr>
                <tr>
                  <td class="taskDesc"> Customer Email</td>
                  <td class="taskStatus">{{ $orderDetails->user_email }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>        

        <div class="accordion" id="collapse-group">
          <div class="accordion-group widget-box">
            <div class="accordion-heading">
              <div class="widget-title">
                <h5>Update Order Status</h5>
              </div>
            </div>
            <div class="collapse in accordion-body" id="collapseGOne">
              <div class="widget-content">
          		<form action="{{ url('admin/update-order-status') }}" method="post">
                {{ csrf_field() }}
          			<input type="hidden" name="order_id" value="{{ $orderDetails->id }}">
                <input type="hidden" name="user_email" value="{{ $orderDetails->user_email }}">
                <input type="hidden" name="name" value="{{ $orderDetails->name }}">
		          	<table width="100%">
          				<tr>
          					<td>
			          			<select name="order_status" id="order_status" class="control-label" required="">
                        <option value="New" @if($orderDetails->order_status == "New") selected @endif>New</option>
                        <option value="Pending" @if($orderDetails->order_status == "Pending") selected @endif>Pending</option>
                        <option value="In Process" @if($orderDetails->order_status == "In Process") selected @endif>In Process</option>
                        <option value="Shipped" @if($orderDetails->order_status == "Shipped") selected @endif>Shipped</option>
                        <option value="Delivered" @if($orderDetails->order_status == "Delivered") selected @endif>Delivered</option>
                        <option value="Paid" @if($orderDetails->order_status == "Paid") selected @endif>Paid</option>
                        <option value="Return" @if($orderDetails->order_status == "Return") selected @endif>Return</option>
                        <option value="Cancelled" @if($orderDetails->order_status == "Cancelled") selected @endif>Cancelled</option>
                      </select>		          			
		          			</td>
		          			<td>
			          			<input type="submit" class="btn btn-success" value="Update Status">
			          		</td>
			        	</tr>
			    	</table>
          		</form>
               </div>
            </div>
          </div>          
        </div>

        <div class="accordion" id="collapse-group">
          <div class="accordion-group widget-box">
            <div class="accordion-heading">
              <div class="widget-title">
                <h5>Shipping Details</h5>
              </div>
            </div>
            <div class="collapse in accordion-body" id="collapseGOne">
              <div class="widget-content">
              		{{ $orderDetails->name }} <br>
              		{{ $orderDetails->mobile }} <br>
              		{{ $orderDetails->address }} <br>
              		{{ $orderDetails->city }}, {{ $orderDetails->state }}, {{ $orderDetails->country }} <br>
              		{{ $orderDetails->pincode }}
               </div>
            </div>
          </div>          
        </div>

      </div>
    </div>

    <div class="row-fluid">
    	<table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <!-- <th>Vendor Email</th> -->
                    <th>Product Name</th>
                    <th>Product Code</th>
                    <th>Product Size</th>
                    <th>Product Price</th>
                    <th>Product Qty</th>
                    <!-- @if($orderDetails->payment_method=="COD")<th>Payment Status</th>
                    @else <th>Razorpay Payment ID</th> 
                    @endif -->
                </tr>
            </thead>
            <tbody>
            	@foreach($orderDetails->orders as $pro)
                    <tr>
                        <!-- <td style="text-align: center;">{{ $pro->email }}</td> -->
                        <td style="text-align: center;">{{ $pro->product_name }}</td>
                        <td style="text-align: center;">{{ $pro->product_code }}</td>
                        <td style="text-align: center;">{{ $pro->product_size }}</td>
                        <td style="text-align: center;">₹ {{ $pro->product_price }}</td>
                        <td style="text-align: center;">x {{ $pro->product_qty }}</td>
                        <!-- @if(empty($pro->razorpay_payment_id)) 
                            <td style="text-align: center;">COD / Pending</td>
                        @else
                            <td style="text-align: center; color: green">{{ $pro->razorpay_payment_id }}</td>
                        @endif -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

  </div>
</div>

@endsection