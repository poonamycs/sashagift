@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">

  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Shipping Charges</a> <a href="#" class="current">Edit Shipping Charges</a> </div>
    <h1>Shipping Charges Section</h1>
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
            <h5>Edit Shipping Charges</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/edit-shipping/'.$shippingDetails->id) }}" name="edit_shipping" id="edit_shipping" novalidate="novalidate"> {{ csrf_field() }}
              <input type="hidden" name="id" value="{{ $shippingDetails->id }}">
              <div class="control-group">
                <label class="control-label">State</label>
                <div class="controls">
                  <input type="text" style="width: 65%" readonly value="{{ $shippingDetails->state }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">City</label>
                <div class="controls">
                  <input type="text" style="width: 65%" readonly value="{{ $shippingDetails->city }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Pincode</label>
                <div class="controls">
                  <input type="text" style="width: 65%" readonly value="{{ $shippingDetails->pincode }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Shipping Charges (in Rs.)</label>
                <div class="controls">
                  <input type="text" name="shipping_charges" id="shipping_charges" value="{{ $shippingDetails->shipping_charges }}" style="width: 65%">
                </div>
              </div>

              <div class="control-group">
                <div class="form-actions" style="float: right;">
                  <input type="submit" value="Update" class="btn btn-success">
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