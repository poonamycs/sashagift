@extends('layouts.adminLayout.admin_design')

@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Cancelled Orders</a> <a href="#" class="current">View Cancelled Orders</a> </div>
    <h1>Cancelled Orders Section</h1>

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
            <h5>All Cancelled Orders</h5>
          </div>
          <div class="widget-content nopadding table table-responsive">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Order ID</th>
                  <th>Order Date</th>
                  <th>Customer Name</th>
                  <th>Customer Email</th>
                  <th>Order Amount</th>
                  <th>Reason of cancellation</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

                @foreach($orders as $order)
                <tr class="gradeX" style="background: #ff000040;">
                  <td style="text-align: center;"><span style="display: none;">{{ $loop->index+1 }}</span>#{{ $order->id }}</td>
                  <td>{{ date('d M Y', strtotime($order->created_at)) }}</td>
                  <td>{{ $order->name }}</td>
                  <td>{{ $order->user_email }}</td>
                  <td style="text-align: center;">₹ {{ $order->grand_total }}</td>
                  <td style="text-align: center;">{{ $order->reason }}</td>

                  <td class="center">
                    <a href="{{ url('/admin/view-order/'.$order->id) }}" class="btn btn-primary btn-mini" title="View Order Details"> Details</a>
                    <a href="{{ url('/admin/view-order-invoice/'.$order->id) }}" class="btn btn-success btn-mini" title="View Order Invoice">Invoice</a>
                    <a href="{{ url('/admin/view-pdf-invoice/'.$order->id) }}" class="btn btn-warning btn-mini" title="View PDF Invoice">PDF </a>
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

