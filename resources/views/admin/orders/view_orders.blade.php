@extends('layouts.adminLayout.admin_design')
@section('content')
<?php 
    use App\Admin; 
    $auth = Admin::where('email', session('adminSession'))->first(); 
?>
<style>
    .select2-drop{
        z-index: 99999 !important;
    }
    .select2-container{
        width: 100%;
    }
</style>
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Orders</a> <a href="#" class="current">View Orders</a> </div>
        <h1>Orders Section</h1>

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
                        <a href="{{ url('/admin/export-orders/') }}"><button style="float: right; margin: 3px 3px;" class="btn btn-info"><i class="fas fa-file-export"></i> Export CSV</button></a>
                        <a href="{{ url('/admin/view-orders-charts/') }}"><button style="float: right; margin: 3px 3px;" class="btn btn-warning"><i class="fa fa-bar-chart"></i> Orders Chart</button></a>
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
                                    @if($auth->vname == 'Superadmin')
                                    <th>Allocate</th>
                                    @endif
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
                                    <td class="text-center">
                                        @foreach($order->orders as $pro)
                                            {{ $pro->product_code }} 
                                            ({{ $pro->product_qty }})&nbsp;&nbsp;
                                        @endforeach
                                    </td>
                                    <td class="text-center">₹ {{ $order->grand_total }}</td>
                                    <td class="text-center">{{ $order->order_status }}</td>
                                    <td class="text-center">{{ $order->payment_method }}</td>
                                    @if($auth->vname == 'Superadmin')
                                        @if(!empty($order->vpincode))
                                        <td class="text-center">{{ $order->vpincode }}</td>
                                        @else
                                        <td class="text-center" style="color: red">Not Allocated</td>
                                        @endif
                                    @endif

                                    <td class="text-center" style="display: inline-flex;">
                                        @if($auth->vname == 'Superadmin')
                                        <a href="#modal{{ $order->id }}" data-toggle="modal" class="btn btn-info btn-mini" title="Allocate to vendor"> Allocate</a>&nbsp;
                                        @endif
                                        <a href="{{ url('/admin/view-order/'.$order->id) }}" class="btn btn-primary btn-mini" title="View Order Details"> Details</a>&nbsp;
                                        <a href="{{ url('/admin/view-order-invoice/'.$order->id) }}" target="_blank" class="btn btn-success btn-mini" title="View Order Invoice">Invoice</a>&nbsp;
                                        <a href="{{ url('/admin/view-pdf-invoice/'.$order->id) }}" target="_blank" class="btn btn-warning btn-mini" title="View PDF Invoice">PDF </a>
                                    </td>
                                </tr>
                                <div id="modal{{ $order->id }}" class="modal hide">
                                    <div class="modal-header">
                                        <button data-dismiss="modal" class="close" type="button">×</button>
                                        <h3>Order ID #{{ $order->id }} Allocate to Vendor</h3>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" method="post" action="{{ url('/admin/allocate-order/'.$order->id) }}" name="order_locate" id="order_locate">@csrf
                                            <div class="control-group">
                                                <label class="control-label">Choose Vendors :</label>
                                                <div class="controls">
                                                    <select name="vpincode" id="vpincode" required="true">
                                                        <option value="">-- Select Vendor --</option>
                                                        @foreach($vendors as $val)
                                                        <option value="{{ $val->vpincode }}">{{ $val->vpincode }} - {{ $val->vname }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <div style="float: right;">
                                                    <button type="button" data-dismiss="modal" class="btn btn-default"><i class="fa fa-times"></i> Close</button>
                                                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Allocate Order</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
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

