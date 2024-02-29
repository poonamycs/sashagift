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
        <h1>Stock</h1>

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
                        <h5>Stock</h5>
                    </div>
                    <div class="widget-content nopadding table table-responsive">
                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category</th>                                    
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($stocks as $stock)
                                <tr class="gradeX">
                                    <td class="text-center"><span style="display: none;"></span>{{ $loop->index+1 }}</td>
                                    <td class="text-center">{{ $stock->category_name }}</td>                                    
                                    <td class="text-center">{{ $stock->quantity }}</td>
                                    <td class="text-center">₹ {{ $stock->price }}</td>
                                    <td class="text-center">{{ date('d-M-Y', strtotime($stock->date)) }}</td>                                    
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