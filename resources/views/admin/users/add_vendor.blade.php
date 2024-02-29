@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Vendor</a> <a href="#" class="current">Add Vendor</a> </div>
    <h1>Vendor Registration Section</h1>
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
            <h5>Add Vendor</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('admin/add-vendor/') }}" name="add_vendor" id="add_vendor" novalidate="novalidate">@csrf
              	<div class="control-group">
	                <label class="control-label">Name : </label>
	                <div class="controls">
	                  	<input type="text" name="vname" id="vname" style="width: 65%">
	                </div>
              	</div>
              	<div class="control-group">
                	<label class="control-label">Email : </label>
                	<div class="controls">
                  		<input type="email" name="email" id="email" style="width: 65%">
                	</div>
              	</div>
              	<div class="control-group">
                	<label class="control-label">Phone Number : </label>
                	<div class="controls">
                  		<input type="text" name="vphone" id="vphone" style="width: 65%">
                	</div>
              	</div>
              	<div class="control-group">
                	<label class="control-label">Pincode : </label>
                	<div class="controls">
                  		<input type="text" name="vpincode" id="vpincode" style="width: 65%">
                	</div>
              	</div>
              	<div class="control-group">
                	<label class="control-label">Password : </label>
                	<div class="controls">
                  		<input type="password" name="password" id="myPassword" style="width: 65%">
                	</div>
              	</div>
              	<div class="control-group">
                	<label class="control-label">Confirm Password : </label>
                	<div class="controls">
                  		<input type="password" name="confirm_password" id="confirm_password" style="width: 65%">
                	</div>
              	</div>
              	<div class="control-group">
                	<label class="control-label">Address : </label>
                	<div class="controls">
                  		<textarea type="text" name="vaddress" id="vaddress" style="width: 65%" rows="2"></textarea>
                	</div>
              	</div>
              	<div class="control-group">
                	<label class="control-label">Enable : </label>
                	<div class="controls">
                  		<input type="checkbox" name="status" id="status" class="btn btn-success" value="1">
                	</div>
              	</div>

                <input type="hidden" name="status" value="1">
                <input type="hidden" name="admin_approved" value="0">
              	<div class="control-group">
                	<div class="form-actions" style="float: right;">
                  		<button type="reset" class="btn btn-secondary">Reset</button>
                  		<button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Add Vendor</button>
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