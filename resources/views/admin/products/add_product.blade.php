@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Product</a> <a href="#" class="current">Add Product</a> </div>
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
            <h5>Add Product</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/add-product') }}" name="add_product" id="add_product" novalidate="novalidate"> {{ csrf_field() }}
              <input type="hidden" name="email" value="<?php echo session('adminSession'); ?>">
              <div class="control-group">
                <label class="control-label">Under Category : </label>
                <div class="controls">
                  <select name="category_id" id="category_id" class="span7">
                    <?php echo $categories_dropdown; ?>
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Product Name : </label>
                <div class="controls">
                  <input type="text" name="product_name" id="product_name" class="span7">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Product Code : </label>
                <div class="controls">
                  <input type="text" name="product_code" id="product_code" class="span7">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Product Brand : </label>
                <div class="controls">
                  <input type="text" name="product_brand" id="product_brand" class="span7">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Description : </label>
                <div class="controls">
                  <textarea name="description" id="description" rows="8" class="span7"></textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Additional Information : </label>
                <div class="controls">
                  <textarea name="care" id="care" rows="6" class="span7"></textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Original Price (₹) : </label>
                <div class="controls">
                  <input type="text" name="price" id="price" placeholder="₹" class="span7">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Strikethrough Price (₹) : </label>
                <div class="controls">
                  <input type="text" name="discount" id="discount" placeholder="₹" class="span7"><br>
                  <small>Discount price should be greater than original price</small>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Unit : </label>
                <div class="controls">
                  <input type="text" name="unit" id="unit" class="span7">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Image : </label>
                <div class="controls">
                  <input type="file" name="image" id="image">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Seasonal Product : </label>
                <div class="controls">
                  <input type="checkbox" name="featured" id="featured" value="1">
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="alert alert-info">Mark this product as seasonal product.</span>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Publish / Enable : </label>
                <div class="controls">
                  <input type="checkbox" name="status" id="status" class="btn btn-success" checked value="1">
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="alert alert-info">Click the checkbox to publish product on website.</span>
                </div>
              </div>

              <input type="hidden" name="admin_approved" value="1">
              
            <div class="control-group">
                <div class="form-actions" style="float: right;">
                  <button type="reset" class="btn btn-secondary">Reset</button>
                  <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Add Product</button>
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