@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>  <a href="#">Stock Management</a> 
        </div>
        <h1>Distribute Stock to Vendor</h1>

        @if(Session::has('flash_message_error'))
        <div class="alert alert-error alert-block">
            <button type="button" class="close" data-dismiss="alert">x</button> <strong>{!! session('flash_message_error') !!}</strong>
        </div>
        @endif 
        @if(Session::has('flash_message_success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">x</button> <strong>{!! session('flash_message_success') !!}</strong>
        </div>
        @endif
    </div>
    <div class="container-fluid"><hr>
        <div class="accordion" id="collapse-group">
            <div class="accordion-group widget-box">
                <div class="accordion-heading">
                    <div class="widget-title"> 
                        <a data-parent="#collapse-group" href="#collapseGOne" data-toggle="collapse"> <span class="icon"> <i class="icon-info-sign"></i></i></span>
                            <h5>Distribute Stock <i class="fa fa-angle-down"></i></h5>
                        </a>
                    </div>
                </div>
                <div class="collapseGOne in accordion-body" id="collapseGOne">
                    <div class="widget-content nopadding">
                        <form class="form-horizontal" method="post" action="{{ url('/admin/stock-distribution/'.$vendorStockDetails->id) }}" name="stock_distribution" id="stock_distribution" novalidate="novalidate" enctype="multipart/form-data">{{ csrf_field() }}
                            <div class="control-group">
                                <label class="control-label">Vendor :</label>
                                <div class="controls">
                                    <select name="vendor" id="vendor" style="width: 65%;" required>
                                        <option value="{{ $vendorStockDetails->vendor }}" selected> {{ $vendorStockDetails->vendor_pincode }}-{{ $vendorStockDetails->vendor_name }}</option>
                                        @foreach($vendors as $val)
                                        <option value="{{ $val->id }}">{{ $val->vpincode }} - {{ $val->vname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Category :</label>
                                <div class="controls">
                                    <select name="category_id" id="selCat" required style="width: 65%">
                                        <?php echo $categories_dropdown; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group" style="width: 72.5%; text-align: end">
                                <span id="getQuantity" style="font-weight: bold;"></span>
                                <span id="Availability"></span>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Quantity :</label>
                                <div class="controls">
                                    <input type="number" name="quantity" id="quantity" value="{{ $vendorStockDetails->quantity }}" required style="width: 65%">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Price :</label>
                                <div class="controls">
                                    <input type="number" name="price" id="price" value="{{ $vendorStockDetails->price }}" required style="width: 65%">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Date :</label>
                                <div class="controls">
                                    <input type="date" name="date" id="date" value="{{ $vendorStockDetails->date }}" required style="width: 65%">
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-actions" style="float: right;">
                                    <button type="submit" class="btn btn-success" id="submitButton"><i class="fa fa-check"></i> Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection