@extends('layouts.adminLayout.admin_design') 
@section('content')
<style>
	.select2-drop{
		z-index: 99999;
	}
</style>
<div id="content">
	<div id="content-header">
		<div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>  <a href="#">Stock Manage</a>  <a href="#" class="current">Add Item</a> 
		</div>
		<h1>Stock Item Section</h1>
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
						<h5>Add New Item</h5>
					</div>
					<form enctype="multipart/form-data" method="post" action="{{ url('/admin/add-stock-item/') }}" name="add_item" id="add_item" novalidate="novalidate">@csrf
						<div class="row-fluid form-horizontal">
							<div class="span6">
								<div class="widget-content nopadding" style="border: none;">
									<div class="control-group">
										<label class="control-label">Category :</label>
										<div class="controls">
											<select name="category_id" id="category_id" class="span12" required>
												<?php echo $categories_dropdown; ?>
											</select>
											<small><a href="#addCategory" data-toggle="modal"><button class="btn btn-link"><i class="fa fa-plus"></i> Add new category</button></a></small>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Quantity :</label>
										<div class="controls">
											<input type="number" name="quantity" id="quantity" class="span12" required>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">SKU :</label>
										<div class="controls">
											<input type="text" name="sku" id="sku" class="span12" required>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Brand :</label>
										<div class="controls">
											<input type="text" name="brand" id="brand" class="span12" required>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Arrival Date :</label>
										<div class="controls">
											<input type="date" name="arrival_date" id="arrival_date" class="span12" required>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Image :</label>
										<div class="controls">
											<input type="file" name="image" id="image" required>
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
												<input type="number" name="purchase_price" id="purchase_price" class="span12" style="width: 126%" required>
											</div>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Sell Price :</label>
										<div class="controls">
											<div class="input-prepend"> 
												<span class="add-on">₹</span>
												<input type="number" name="sell_price" id="sell_price" class="span12" style="width: 126%" required>
											</div>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Supplier Name :</label>
										<div class="controls">
											<input type="text" name="supplier_name" id="supplier_name" class="span11" required>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Description :</label>
										<div class="controls">
											<textarea name="descr" id="descr" rows="4" class="span11"></textarea>
										</div>
									</div>
									<div class="control-group">
						                <div class="form-actions" style="float: right;">
						                  <button type="reset" class="btn btn-secondary">Reset</button>
						                  <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Add Item</button>
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

<div id="addCategory" class="modal hide">
	<div class="modal-header">
		<button data-dismiss="modal" class="close" type="button">×</button>
		<h3>Add Category</h3>
	</div>
	<div class="modal-body">
		<div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{ url('/admin/stock-category') }}" name="stock_category" id="stock_category" novalidate="novalidate" enctype="multipart/form-data">{{ csrf_field() }}
                <div class="control-group">
                    <label class="control-label">Category Name :</label>
                    <div class="controls">
                        <input type="text" name="category_name" id="category_name" style="width: 62%" required="true">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Category Level :</label>
                    <div class="controls">
                        <select name="parent_id" style="width: 66.5%;">
                            <option value="0">Main Category</option>
                            @foreach($levels as $val)
                            <option value="{{ $val->id }}">{{ $val->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <div style="float: right;">
                        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Add Stock Category</button>
                    </div>
                </div>
            </form>
        </div>
	</div>
</div>
@endsection