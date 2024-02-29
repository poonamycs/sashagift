@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
    <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Product Attributes</a> <a href="#" class="current">Add Product Attributes</a> </div>
    <button class="btn btn-success btn-sm" onclick="goBack()"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>
    <!-- <button class="btn btn-success btn-sm" onclick="reload()"><i class="fa fa-refresh" aria-hidden="true"></i> Reload</button> -->
    <h1>Product Attributes Section</h1>
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
                        <h5>Add Product Attributes</h5>
                    </div>
                    <?php $pid = Crypt::encrypt($productDetails->id); ?>
                    <div class="widget-content nopadding">
                        <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/add-attributes/'.$pid) }}" name="add_attribute" id="add_attribute" novalidate="novalidate"> {{ csrf_field() }}
                            <input type="hidden" name="{{ $productDetails->id }}">
                            <div class="control-group">
                                <label class="control-label">Product Name : &nbsp;&nbsp;&nbsp;</label>
                                <label style="width: 80%; text-align: left !important;" class="control-label"><strong>{{ $productDetails->product_name }}</strong></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Product Code : &nbsp;&nbsp;&nbsp;</label>
                                <label class="control-label" style="text-align: left;"><strong>{{ $productDetails->product_code }}</strong></label>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Product Brand : &nbsp;&nbsp;&nbsp;</label>
                                <label class="control-label" style="text-align: left;"><strong>{{ $productDetails->product_brand }}</strong></label>
                            </div>
                            <!-- <small><i>Please enter 1st details for 1kg or 1dozen</i></small> -->
                            <div class="control-group">
                                <label class="control-label"></label>
                                <div class="field_wrapper">
                                    <div>
                                        <input type="text" name="sku[]" placeholder="SKU" style="width: 120px;" required />
                                        <input type="text" name="size[]" placeholder="Size" style="width: 120px;" required />
                                        <input type="text" name="price[]" placeholder="Price" style="width: 120px;" required />
                                        <input type="text" name="stock[]" placeholder="Stock" style="width: 120px;" required />
                                        <input type="text" name="unit[]" placeholder="Unit" style="width: 120px;" required />
                                        <a href="javascript:void(0);" class="add_button" title="Add Attribute">&nbsp;&nbsp;<b>ADD (+1)</b></a>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-actions" style="float: right;">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Add Attributes</button>
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
                        <h5>View Attributes</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form action="{{ url('admin/edit-attributes/'.$pid) }}" method="post">{{ csrf_field() }}
                            <table class="table table-bordered data-table">
                                <thead>
                                    <tr>
                                        <th>Attribute ID</th>
                                        <th>SKU</th>
                                        <th>Size</th>
                                        <th>Price</th>
                                        <th>Stock</th>
                                        <th>Unit</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($productDetails['attributes'] as $attribute)
                                    <tr class="gradeX">
                                        <td><input type="hidden" name="idAttr[]" value="{{ $attribute->id }}">{{ $attribute->id }}</td>
                                        <td>{{ $attribute->sku }}</td>
                                        <td>{{ $attribute->size }}</td>
                                        <td><input type="text" name="price[]" value="{{ $attribute->price }}"></td>
                                        <td><input type="text" name="stock[]" value="{{ $attribute->stock }}"></td>
                                        <td><input type="text" name="unit[]" value="{{ $attribute->unit }}"></td>
                                        <td class="center">
                                            <input type="submit" value="Update" class="btn btn-primary btn-mini">
                                            <a onclick="return confirm('Are you sure you want to delete this Attribute?');" href="{{ url('/admin/delete-attributes/'.$attribute->id) }}" class="btn btn-danger btn-mini">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach                            
                                </tbody>
                            </table>
                        </form>
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