@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
    <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Product Vendor</a> <a href="#" class="current">Add Product to Vendor</a> </div>
    <button class="btn btn-success btn-sm" onclick="goBack()"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>
    <!-- <button class="btn btn-success btn-sm" onclick="reload()"><i class="fa fa-refresh" aria-hidden="true"></i> Reload</button> -->
    <h1>Product Vendor Section</h1>
    @if(Session::has('flash_message_error'))
        <div class="alert alert-error alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{!! session('flash_message_error') !!}</strong>
        </div>
    @endif   
    @if(Session::has('flash_message_success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{!! session('flash_message_success') !!}</strong>
        </div>
    @endif   
    </div>
    <div class="container-fluid"><hr>

        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>Assign Product to Vendor</h5>
                    </div>
                  
                    <div class="widget-content nopadding">
                        <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/add-vendor-product/') }}" name="add_attribute" id="add_attribute" novalidate="novalidate"> {{ csrf_field() }}
                            <input type="hidden" name="vendor_id" value="{{ $id }}">
                            <div class="control-group">
                                <label class="control-label">Product Name : &nbsp;&nbsp;&nbsp;</label>
                                <div class="controls">
                                    <select name="product_id" id="product_id" class="span7">
                                        @foreach($products as $product)
                                            <option value="{{$product->id}}">{{$product->product_name}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                            
                           
                            <div class="control-group">
                                <div class="form-actions" style="float: right;">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Assign</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>View Assign Products</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Product Code</th>
                                    <th>Brand</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($vendor_products as $vendor)
                                <tr class="gradeX">
                                    
                                    <td>{{$vendor->product->product_name}}</td>
                                    <td>{{$vendor->product->product_code}}</td>
                                    <td>{{$vendor->product->product_brand}}</td>
                                    <td style="text-align: center;">
                                        <a onclick="return confirm('Are you sure you want to unassign this product?');" href="{{ url('/admin/delete-vendor-product/'.$vendor->id) }}" class="btn btn-danger btn-mini">Unassign</a>
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

<script type="text/javascript" src="{{ asset('js/backend_js/jquery3.5.1.js') }}"></script>
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script> -->
<script>
   $(document).ready(function(){
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div style="margin-left:180px; margin-top: 4px;"><input type="text" name="sku[]" placeholder="SKU" style="width:120px;"/> <input type="text" name="size[]" placeholder="Size" style="width:120px;"/> <input type="text" name="price[]" placeholder="Price" style="width:120px;"/> <input type="text" name="stock[]" placeholder="Stock" style="width:120px;"/> <input type="text" name="unit[]" placeholder="Unit" style="width:120px;"/><a href="javascript:void(0);" class="remove_button">&nbsp;&nbsp;<b>Remove</b></a></div>'; //New input field html 
        var x = 1; //Initial field counter is 1
        
        //Once add button is clicked
        $(addButton).click(function(){
            //Check maximum number of input fields
            if(x < maxField){ 
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });
        
        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });
</script>