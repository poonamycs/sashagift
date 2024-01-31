@extends('layouts.adminLayout.admin_design')

@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Orders</a> <a href="#" class="current">View Orders</a> </div>
    @if(!empty($orders[0]->name))
    <h1>'{{ $orders[0]->name }}' Orders Section</h1>
    @else
    <h1>Orders Section</h1>
    @endif
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
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>All Orders</h5>
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
                <tr class="gradeX" style="background: @if($order->order_status=='New') aliceblue @elseif($order->order_status=='Shipped') #fff3e5 @elseif($order->order_status=='In Process') #d4ffff @elseif($order->order_status=='Paid') #c3ffc3 @elseif($order->order_status=='Cancelled') #ffbaba @endif">
                  <td><span style="display: none;">{{ $loop->index+1 }}</span>#{{ $order->id }}</td>
                  <td>{{ date('d M Y, h:i', strtotime($order->created_at)) }}</td>
                  <td>{{ $order->name }}</td>
                  <td>{{ $order->user_email }}</td>
                  <td style="text-align: center;">
                    @foreach($order->orders as $pro)
                      {{ $pro->product_code }} 
                      ({{ $pro->product_qty }})&nbsp;&nbsp;
                    @endforeach
                  </td>
                  <td style="text-align: center;">₹ {{ $order->grand_total }}</td>
                  <td style="text-align: center;">{{ $order->order_status }}</td>
                  <td style="text-align: center;">{{ $order->payment_method }}</td>

                  <td class="center">
                    <a href="{{ url('/admin/view-order/'.$order->id) }}" class="btn btn-primary btn-mini" title="View Order Details"> Details</a>
                    @if($order->order_status == "Shipped" || $order->order_status == "Delivered" || $order->order_status == "Paid")
                    <a href="{{ url('/admin/view-order-invoice/'.$order->id) }}" class="btn btn-success btn-mini" title="View Order Invoice">Invoice</a>
                    <a href="{{ url('/admin/view-pdf-invoice/'.$order->id) }}" class="btn btn-warning btn-mini" title="View PDF Invoice">PDF </a>
                    @endif
                 </td>
                </tr>
                @endforeach
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

