@extends('layouts.adminLayout.admin_design') 
@section('content')

<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>  <a href="#">Vendor Stock</a>  <a href="#" class="current">View Banners</a> 
        </div>
        <h1>Vendor Stock Section</h1>

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
                        <h5>All Vendor Stock</h5>
                    </div>
                    <div class="widget-content nopadding table table-responsive">
                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Vendor</th>
                                    <th>Category</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($vendorStocks as $row)
                                <tr class="gradeX">
                                    <td class="text-center"><span style="display: none;"></span>{{ $loop->index+1 }}</td>
                                    <td class="text-center">{{ $row->vendor_pincode }}-{{ $row->vendor_name }}</td>
                                    <td class="text-center">{{ $row->category_name }}</td>
                                    <td class="text-center">{{ $row->quantity }}</td>
                                    <td class="text-center">₹ {{ $row->price }}</td>
                                    <td class="text-center">{{ date('d-M-Y', strtotime($row->date)) }}</td>
                                    <td class="text-center">
                                        <!-- <a href="{{ url('/admin/stock-distribution/'.$row->id) }}" class="btn btn-primary" title="Edit Item "><i class="fa fa-pencil-square-o"></i></a> -->
                                        <a rel="{{ $row->id }}" rel1="delete-vendor-stock-item" href="javascript:" class="btn btn-danger deleteVendorStockItem" title="Delete Item"><i class="fa fa-trash"></i></a>
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