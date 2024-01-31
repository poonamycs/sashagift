@extends('layouts.adminLayout.admin_design') 
@section('content')
<div id="content">
	<div id="content-header">
		<div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>  <a href="#">Stock Manage</a>  <a href="#" class="current">Edit Item</a> 
		</div>
		<h1>Edit Stock Item Section</h1>
		@if(Session::has('flash_message_error'))
		<div class="alert alert-error alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button> <strong>{!! session('flash_message_error') !!}</strong>
		</div>@endif 
		@if(Session::has('flash_message_success'))
		<div class="alert alert-success alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button> <strong>{!! session('flash_message_success') !!}</strong>
		</div>
		@endif
	</div>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
				<div class="widget-box">
					<div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
						<h5>Edit Item</h5>
					</div>
					<form enctype="multipart/form-data" method="post" action="{{ url('admin/edit-stock-item/'.$itemDetails->id) }}" name="edit_item" id="edit_item" novalidate="novalidate">@csrf
						<div class="row-fluid form-horizontal">
							<div class="span6">
								<div class="widget-content nopadding" style="border: none;">
									<!-- <div class="control-group">
										<label class="control-label">Product Name :</label>
										<div class="controls">
											<input type="text" name="product_name" id="product_name" class="span12" autofocus="true" required>
										</div>
									</div> -->
									<div class="control-group">
										<label class="control-label">Category :</label>
										<div class="controls">
											<select name="category_id" id="category_id" class="span12" required>
												<?php echo $categories_dropdown; ?>
											</select>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Quantity :</label>
										<div class="controls">
											<input type="number" name="quantity" id="quantity" value="{{ $itemDetails->quantity }}" class="span12" required>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">SKU :</label>
										<div class="controls">
											<input type="text" name="sku" id="sku" value="{{ $itemDetails->sku }}" class="span12" required>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Brand :</label>
										<div class="controls">
											<input type="text" name="brand" id="brand" value="{{ $itemDetails->brand }}" class="span12" required>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Arrival Date :</label>
										<div class="controls">
											<input type="date" name="arrival_date" id="arrival_date" value="{{ $itemDetails->arrival_date }}" class="span12" required>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Image :</label>
										<div class="controls">
											<input type="file" name="image" id="image" required>
											@if(!empty($itemDetails->image))
							                	<input type="hidden" name="current_image" value="{{ $itemDetails->image }}"> 
							                @endif 
							                @if(!empty($itemDetails->image))| <img src="{{ asset('/images/backend_images/stock-items/'.$itemDetails->image) }}" style="height: 50px">
							                @endif
										</div>
									</div>
								</div>
							</div>
							<div class="span6">
								<div class="widget-content nopadding">
									<div class="control-group">
										<label class="control-label">Purchase Price :</label>
										<div class="controls">
											<div class="input-prepend"> 
												<span class="add-on">₹</span>
												<input type="number" name="purchase_price" id="purchase_price" value="{{ $itemDetails->purchase_price }}" class="span12" style="width: 126%" required>
											</div>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Sell Price :</label>
										<div class="controls">
											<div class="input-prepend"> 
												<span class="add-on">₹</span>
												<input type="number" name="sell_price" id="sell_price" value="{{ $itemDetails->sell_price }}" class="span12" style="width: 126%" required>
											</div>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Supplier Name :</label>
										<div class="controls">
											<input type="text" name="supplier_name" id="supplier_name" value="{{ $itemDetails->supplier_name }}" class="span11" required>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Description :</label>
										<div class="controls">
											<textarea name="descr" id="descr" rows="4" class="span11">{{ $itemDetails->descr }}</textarea>
										</div>
									</div>
									<div class="control-group">
						                <div class="form-actions" style="float: right;">
						                  <button type="reset" class="btn btn-secondary">Reset</button>
						                  <button type="submit" class="btn btn-success">Update Item</button>
						                </div>
						            </div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection