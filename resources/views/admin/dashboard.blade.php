@extends('layouts.adminLayout.admin_design')
@section('content')

<?php
  use App\Models\User;
  use App\Models\Admin;
  use App\Models\Product;
  use App\Models\Order;
  use App\Models\Banner;
  use App\Models\Category;
  use App\Models\Contact;
  use App\Models\CmsPage;
  $email = session('adminSession');
?>
<?php
    $users = User::count();
    $products = Product::count();
    $vendor_products = Product::where('email',$email)->count();
    $all_orders = Order::count();
    $pending_orders = Order::where('order_status',"Pending")->count();
    $paid_orders = Order::where('order_status',"Paid")->count();
    $cancelled_orders = Order::where('order_status',"Cancelled")->count();
    $delivered_orders = Order::where('order_status',"Delivered")->count();
    $new_orders = Order::where('order_status',"New")->count();
    $shipped_orders = Order::where('order_status',"Shipped")->count();
    $banners = Banner::count();
    $categories = Category::count();
    $contacts = Contact::count();
    $cmspages = CmsPage::count();

    $sale = Order::where(['order_status'=>"Paid"])->sum('grand_total');

    $email = session('adminSession');
    $auth = Admin::where('email',$email)->first();
?>

<!--main-container-part-->
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <span class="tip-bottom">&nbsp;&nbsp;&nbsp;<i class="icon-home"></i> <b>Home / Dashboard / Statistics </b></span></div>
    </div>

    <div class="container-fluid">
        @if($auth->vname == 'Superadmin')
        <div class="quick-actions_homepage">
            <ul class="quick-actions">
                <li class="bg_lb" style="width: 48%;"> <a href="javascript:void(0)"> <i class="icon-dashboard"><b style="visibility: hidden;">Dashboard</b></i> My Dashboard </a></li>
                <!-- <li class="bg_lb span3" style="width: 48%;"> <a href="javascript:void(0)"> <i class="icon-shopping-cart"><span style="font-weight: bold;margin-left: -25px;">₹&nbsp;<?php echo $sale; ?></span></i> Total Sale</a> </li> -->
                <!-- <li class="bg_lk span6"> <a href="{{ url('/admin/view-all-orders') }}"> <i class="icon-bell-alt"> <?php echo $all_orders; ?></i> Total <br>Orders</a> </li>
                <li class="bg_lk span6"> <a href="{{ url('/admin/view-new-orders') }}"> <i class="icon-list-ul"> <?php echo $new_orders; ?></i> New <br>Orders </a></li>
                <li class="bg_lk span6"> <a href="{{ url('/admin/view-pending-orders') }}"> <i class="icon-list-ul"> <?php echo $pending_orders; ?></i> Pending <br>Orders </a> </li>
                <li class="bg_lk span6"> <a href="{{ url('/admin/view-shipped-orders') }}"> <i class="icon-list-ul"> <?php echo $shipped_orders; ?></i> Shipped <br>Orders</a></li>
                <li class="bg_lk span6"> <a href="{{ url('/admin/view-delivered-orders') }}"> <i class="icon-list-ul"> <?php echo $delivered_orders; ?></i> Delivered <br>Orders</a></li>  
                <li class="bg_lk span6"> <a href="{{ url('/admin/view-cancel-orders') }}"> <i class="icon-remove-sign"> <?php echo $cancelled_orders; ?></i> Cancelled <br>Orders</a> </li> -->
            </ul>
        </div><hr/>

        <!-- <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>Last 10 purchased Course Details</h5>
                        <a href="{{ url('/admin/view-all-orders/') }}"><button style="float: right; margin: 3px 3px;" class="btn btn-warning"><i class="fa fa-bar-chart"></i> View All Orders</button></a>
                    </div>
                    <div class="widget-content nopadding table table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Order Date</th>
                                    <th>Customer Name</th>
                                    <th>Products</th>
                                    <th>Total Amount</th>
                                    <th>Payment Method</th>
                                    <th>Allocate</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr class="gradeX">
                                    <td><span style="display: none;">{{ $loop->index+1 }}</span>#{{ $order->id }}</td>
                                    <td>{{ date('d M Y, h:i A', strtotime($order->created_at)) }}</td>
                                    <td>{{ $order->name }}</td>
                                    <td class="text-left">
                                        @foreach($order->orders as $pro)
                                            {{ $pro->product_code }} 
                                            ({{ $pro->product_qty }})&nbsp;&nbsp;
                                        @endforeach
                                    </td>
                                    <td class="text-center">₹ {{ $order->grand_total }}</td>
                                    <td class="text-center">{{ $order->payment_method }}</td>
                                    @if(!empty($order->vpincode))
                                    <td class="text-center">{{ $order->vpincode }}</td>
                                    @else
                                    <td class="text-center" style="color: red">Not Allocated</td>
                                    @endif
                                    <td class="text-center"> 
                                        <a href="{{ url('/admin/view-order/'.$order->id) }}" class="btn btn-info btn-mini" title="Allocate Order"> Allocate</a>
                                        <a href="{{ url('/admin/view-order/'.$order->id) }}" class="btn btn-primary btn-mini" title="View Order Details"> Details</a>
                                        <a href="{{ url('/admin/view-order-invoice/'.$order->id) }}" target="_blank" class="btn btn-success btn-mini" title="View Order Invoice">Invoice</a>
                                        <a href="{{ url('/admin/view-pdf-invoice/'.$order->id) }}" target="_blank" class="btn btn-warning btn-mini" title="Download PDF Invoice"><i class="fa fa-download"></i> PDF </a>
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
                                                        <option value="{{ $val->vpincode }}">{{ $val->vname }} - {{ $val->vpincode }}</option>
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
        </div> -->
        @else
        <center><img src="{{ asset('images/frontend_images/veggimart.png') }}"></center>
        @endif
    </div>
</div>

@endsection