@extends('layouts.adminLayout.admin_design')
@section('content')
<?php 
    $todayDate = date('Y-m-d') ;
    use App\StockCategory;

    $categories = StockCategory::where(['parent_id'=>0])->get();
    $categories_dropdown1 = "<option value='' selected disabled style='display: block'>- Select Category -</option>";
    foreach($categories as $cat){
        $categories_dropdown1 .= "<option value='".$cat->id."'>".$cat->name."</option>";
        $sub_categories = StockCategory::where(['parent_id'=>$cat->id])->get();
        foreach ($sub_categories as $sub_cat) {
            $categories_dropdown1 .= "<option value = '".$sub_cat->id."'>--".$sub_cat->name."</option>";
        }
    }
?>

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
                        <form class="form-horizontal" method="post" action="{{ url('/admin/stock-distribution/') }}" name="stock_distribution" id="stock_distribution" novalidate="novalidate" enctype="multipart/form-data">{{ csrf_field() }}
                            <div class="control-group">
                                <label class="control-label">Vendor :</label>
                                <div class="controls">
                                    <select name="vendor" id="vendor" style="width: 65%;" required>
                                        <option value=""> -- Select Option --</option>
                                        @foreach($vendors as $val)
                                        <option value="{{ $val->id }}"> {{ $val->vpincode }} - {{ $val->vname }} </option>
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
                                    <input type="number" name="quantity" id="quantity" required style="width: 65%">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Price :</label>
                                <div class="controls">
                                    <input type="number" name="price" id="price" required style="width: 65%">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Date :</label>
                                <div class="controls">
                                    <input type="date" name="date" id="date" value="{{ $todayDate }}" required style="width: 65%">
                                </div>
                            </div>
                            <!-- <div class="control-group">
                                <label class="control-label"></label>
                                <div class="field_wrapper">
                                    <div>
                                        <select name="category_id" id="selCat" required style="width: 147px;">
                                            <?php echo $categories_dropdown; ?>
                                        </select>
                                        <input type="number" name="quantity[]" placeholder="Quantity" style="width: 147px;" required />
                                        <input type="number" name="price[]" placeholder="Price (₹)" style="width: 147px;" required />
                                        <input type="date" name="date[]" placeholder="Date" value="{{ $todayDate }}" style="width: 147px;" required />
                                        <a href="javascript:void(0);" class="add_button" title="Add Attribute">&nbsp;&nbsp;<b>ADD (+1)</b></a>
                                    </div>
                                </div>
                            </div> -->
                            <div class="control-group">
                                <div class="form-actions" style="float: right;">
                                    <button type="submit" class="btn btn-success" id="submitButton"><i class="fa fa-check"></i> Distribute Stock</button>
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
                        <h5>Distributed Items to Vendor</h5>
                    </div>
                    <div class="widget-content nopadding table table-responsive">
                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category</th>
                                    <th>Vendor</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($stocks as $stock)
                                <tr class="gradeX">
                                    <td class="text-center"><span style="display: none;"></span>{{ $loop->index+1 }}</td>
                                    <td class="text-center">{{ $stock->category_name }}</td>
                                    <td class="text-center">{{ $stock->vendor_pincode }}-{{ $stock->vendor_name }}</td>
                                    <td class="text-center">{{ $stock->quantity }}</td>
                                    <td class="text-center">₹ {{ $stock->price }}</td>
                                    <td class="text-center">{{ date('d-M-Y', strtotime($stock->date)) }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('/admin/stock-distribution/'.$stock->id) }}" class="btn btn-primary" title="Edit Item "><i class="fa fa-pencil-square-o"></i></a>
                                        <a rel="{{ $stock->id }}" rel1="delete-vendor-stock-item" href="javascript:" class="btn btn-danger deleteVendorStockItem" title="Delete Item"><i class="fa fa-trash"></i></a>
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
<script>
   $(document).ready(function(){
        var maxField = 10;
        var addButton = $('.add_button');
        var wrapper = $('.field_wrapper');
        var fieldHTML = '<div style="margin-left:180px; margin-top: 4px;"><select name="category_id" id="selCat" required style="width: 147px;"> <?php echo $categories_dropdown1; ?></select> <input type="number" name="size[]" placeholder="Quantity" style="width: 147px;" required /> <input type="number" name="price[]" placeholder="Price (₹)" style="width: 147px;" required /> <input type="date" name="stock[]" placeholder="Date" value="{{ $todayDate }}" style="width:147px;"/><a href="javascript:void(0);" class="remove_button" title="Remove Attribute">&nbsp;&nbsp;<b>Remove</b></a></div>';
        var x = 1;
        
        //Once add button is clicked
        $(addButton).click(function(){
            if(x < maxField){ 
                x++;
                $(wrapper).append(fieldHTML);
            }
        });
        
        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        });
    });
</script>