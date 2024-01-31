@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>  <a href="#">Stock Manage</a>  <a href="#" class="current">View Items</a> 
        </div>
        <h1>Stock Items Section</h1>

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
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>All Items</h5>
                        <a href="{{ url('/admin/add-stock-item/') }}">
                            <button style="float: right; margin: 3px 3px;" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Add Item</button>
                        </a>
                        <a href="{{ url('/admin/export-stock-items/') }}">
                            <button style="float: right; margin: 3px 3px;" class="btn btn-primary btn-xs"><i class="fas fa-file-export"></i> Export</button>
                        </a>
                    </div>
                    <div class="widget-content nopadding table table-responsive">
                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    {{-- <th>Product Name</th> --}}
                                    <th>Category</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Arrival Date</th>
                                    <th>Supplier</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($stockItems as $item)
                                <tr class="gradeX">
                                    <td class="text-center"><span style="display: none;">{{ $loop->index+1 }}</span>{{ $item->id }}</td>
                                    {{-- <td>{{ Str::limit($item->product_name, 25) }}</td> --}}
                                    <td class="text-center">{{ $item->category_name }}</td>
                                    <td class="text-center">x{{ $item->quantity }}</td>
                                    <td>
                                        <table class="table table-bordered border">
                                            <tr>
                                                <td>Purchase Price</td>
                                                <td>₹{{ $item->purchase_price }}</td>
                                            </tr>
                                            <tr>
                                                <td>Selling Price</td>
                                                <td>₹{{ $item->sell_price }}</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td class="text-center">{{ date('d-M-Y', strtotime($item->arrival_date)) }}</td>
                                    <td class="text-center">{{ $item->supplier_name }}</td>
                                    <td class="text-center">
                                        @if(!empty($item->image))
                                        <img src="{{ asset('/images/backend_images/stock-items/'.$item->image) }}" style="height: 50px;">
                                        @endif
                                    </td>
                                    <td class="text-center"> 
                                        <a href="#viewItems{{ $item->id }}" data-toggle="modal" class="btn btn-success" title="View Item"><i class="fa fa-eye"></i></a>
                                        <!-- <a href="#modal{{ $item->id }}" data-toggle="modal" class="btn btn-info" title="Distribute Item "><i class="fa fa-list"></i></a> -->
                                        <a href="{{ url('/admin/edit-stock-item/'.$item->id) }}" class="btn btn-primary" title="Edit Item "><i class="fa fa-pencil-square-o"></i></a>
                                        <a rel="{{ $item->id }}" rel1="delete-item" href="javascript:" href="javascript:" class="btn btn-danger deleteStockItem" title="Delete Item"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>

                                <!-- display items modal -->
                                <!-- <div id="modal{{ $item->id }}" class="modal hide">
                                    <div class="modal-header">
                                        <button data-dismiss="modal" class="close" type="button">×</button>
                                        <h3>"{{ $item->category_name }}" &nbsp;Full Details</h3>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row-fluid">
                                            <div class="span12">
                                                <div class="widget-box">
                                                    <form enctype="multipart/form-data" method="post" action="{{ url('#') }}" name="add_item" id="add_item" novalidate="novalidate">@csrf
                                                        <div class="row-fluid form-horizontal">
                                                            <div class="control-group">
                                                                <label class="control-label">MFG Date :</label>
                                                                <div class="controls">
                                                                    <input type="date" name="mfg" id="mfg" class="span12" required>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label">Exp Date :</label>
                                                                <div class="controls">
                                                                    <input type="date" name="exp" id="exp" class="span12" required>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label">Purchase Price :</label>
                                                                <div class="controls">
                                                                    <div class="input-prepend"> 
                                                                        <span class="add-on">₹</span>
                                                                        <input type="number" name="purchase_price" id="purchase_price" class="span12" style="width: 129%" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label">Sell Price :</label>
                                                                <div class="controls">
                                                                    <div class="input-prepend"> 
                                                                        <span class="add-on">₹</span>
                                                                        <input type="number" name="sell_price" id="sell_price" class="span12" style="width: 129%" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label">Quantity :</label>
                                                                <div class="controls">
                                                                    <input type="number" name="quantity" id="quantity" class="span11" required>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <label class="control-label">Description :</label>
                                                                <div class="controls">
                                                                    <textarea name="descr" id="descr" rows="3" class="span11"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <div class="form-actions" style="float: right;">
                                                                  <button type="reset" class="btn btn-secondary">Reset</button>
                                                                  <button type="submit" class="btn btn-success">Add Item</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->

                                <!-- display items modal -->
                                <div id="viewItems{{ $item->id }}" class="modal hide">
                                    <div class="modal-header">
                                        <button data-dismiss="modal" class="close" type="button">×</button>
                                        <h3>"{{ $item->category_name }}" &nbsp;Full Details</h3>
                                    </div>
                                    <div class="modal-body">
                                        {{-- <p><b>Product ID :</b> {{ $item->id }}</p> --}}
                                        {{-- <p><b>Item Name :</b> {{ $item->product_name }}</p> --}}
                                        <p><b>Category Name :</b> {{ $item->category_name }}</p>
                                        <p><b>Quantity :</b> x{{ $item->quantity }}</p>
                                        <p><b>Product SKU :</b> {{ $item->sku }}</p>
                                        <p><b>Product Brand :</b> {{ $item->brand }}</p>
                                        <p><b>Purchase Price :</b> ₹ {{ $item->purchase_price }}</p>
                                        <p><b>Sell Price :</b> ₹ {{ $item->sell_price }}</p>
                                        <p><b>Supplier Name :</b> ₹ {{ $item->supplier_name }}</p>
                                        <p><b>Description :</b> {!! $item->descr !!}</p>
                                        <p><b>Created at :</b> {{ date('d M Y | h:i a', strtotime($item->created_at)) }}</p>
                                        <p><b>Last Updated :</b> {{ date('d M Y | h:i a', strtotime($item->updated_at)) }}</p>
                                        <p><b>Image: </b>
                                        </p>
                                        <center>
                                            <img src="{{ asset('/images/backend_images/stock-items/'.$item->image) }}">
                                        </center>
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