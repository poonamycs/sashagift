@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Product</a> <a href="#" class="current">Edit Product</a> </div>
    <h1>Product Section</h1>
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
            <h5>Edit Product</h5>
          </div>
          <?php $pid = Crypt::encrypt($productDetails->id); ?>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/edit-product/'.$pid) }}" name="edit_product" id="edit_product" novalidate="novalidate"> {{ csrf_field() }}
              
              <div class="control-group">
                <label class="control-label">Under Category : </label>
                <div class="controls">
                  <select name="category_id" id="category_id" style="width: 66.5%;">  
                    <?php echo $categories_dropdown; ?>
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Product Name : </label>
                <div class="controls">
                  <input type="text" name="product_name" id="product_name" value="{{ $productDetails->product_name }}" style="width: 65%">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Product Code : </label>
                <div class="controls">
                  <input type="text" name="product_code" id="product_code" value="{{ $productDetails->product_code }}" style="width: 65%">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Product Brand : </label>
                <div class="controls">
                  <input type="text" name="product_brand" id="product_brand" value="{{ $productDetails->product_brand }}" style="width: 65%">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Description : </label>
                <div class="controls">
                  <textarea name="description" id="description" class="textarea_editor" rows="8" style="width: 65%">{{ $productDetails->description }}</textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Additional Information : </label>
                <div class="controls">
                  <textarea name="care" id="care" class="textarea_editor1" rows="6" style="width: 65%">{{ $productDetails->care }}</textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Price (₹) : </label>
                <div class="controls">
                  <input type="text" name="price" id="price" value="{{ $productDetails->price }}" style="width: 65%">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Strikethrough Price (₹) : </label>
                <div class="controls">
                  <input type="text" name="discount" id="discount" value="{{ $productDetails->discount }}" class="span7"><br>
                  <small>Discount price should be greater than original price</small>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Unit : </label>
                <div class="controls">
                  <input type="text" name="unit" id="unit" value="{{ $productDetails->unit }}" class="span7">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Image : </label>
                <div class="controls">
                  <input type="file" name="image" id="image">
                  
                  @if(!empty($productDetails->image))
                  <input type="hidden" name="current_image" value="{{ $productDetails->image }}"> 
                  @endif
                  
                  @if(!empty($productDetails->image))
                  <a href="{{ asset('images/backend_images/products/large/'.$productDetails->image) }}"><img style="height: 50px;" src="{{ asset('images/backend_images/products/small/'.$productDetails->image) }}"></a> | <a href="{{ url('admin/delete-product-image/'.$productDetails->id) }}">Delete</a>
                  @endif
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Seasonal Product: </label>
                <div class="controls">
                  <input type="checkbox" name="featured" id="featured" @if($productDetails->featured=="1") checked @endif value="1">
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="alert alert-info">Mark this product as Seasonal product.</span>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Publish / Enable : </label>
                <div class="controls">
                  <input type="checkbox" name="status" id="status" @if($productDetails->status=="1") checked @endif value="1">
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="alert alert-info">Click the checkbox to publish product on website.</span>
                </div>
              </div>
              <div class="control-group">
                <div class="form-actions" style="float: right;">
                  <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Update Product</button>
                </div>
              <div class="control-group">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection