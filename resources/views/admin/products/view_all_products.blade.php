@extends('layouts.adminLayout.admin_design')
@section('content')

<style>
  td{
    text-align: center !important;
  }
</style>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Products</a> <a href="#" class="current">View Products</a> </div>
    <h1>Products Section</h1>

    @if(Session::has('flash_message_error'))
    <div class="alert alert-error alert-block">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <strong>{!! session('flash_message_error') !!}</strong>
    </div>
    @endif

    @if(Session::has('flash_message_success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <strong>{!! session('flash_message_success') !!}</strong>
    </div>
    @endif

  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>All Products</h5>
            <a href="{{ url('/admin/add-product') }}"><button style="float: right; margin: 3px 3px;" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Add Product</button></a>
            <a onclick="return confirm('Download Product Details File?');" href="{{ url('/admin/export-products') }}"><button style="float: right; margin: 3px 3px;" class="btn btn-primary btn-xs"><i class="fas fa-file-export"></i> Export</button></a>
          </div>
          <div class="widget-content nopadding table table-responsive">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Category Name</th>
                    <th>Product Name</th>
                    <th>Product Code</th>
                    <th>Price(₹)</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
              </thead>

              <tbody>

                <?php $i=0 ?>
                @foreach($productsAdmin as $product)
                <?php $pid = Crypt::encrypt($product->id); ?>
                <tr class="gradeX">
                    <td class="text-center"><span style="display: none;">{{ $loop->index+1 }}</span>{{ $product->id }}</td>
                    <td class="text-center">{{ $product->category_name }}</td>
                    <td>{{ Str::limit($product->product_name, 25) }}</td>
                    <td class="text-center">{{ $product->product_code }}</td>
                    <td class="text-center">₹ {{ $product->price }}@if(!empty($product->unit))/{{ $product->unit }}@endif</td>
                    <td class="text-center">
                        @if(!empty($product->image))
                        <img src="{{ asset('/images/backend_images/products/small/'.$product->image) }}" style="height: 40px;">
                        @endif
                    </td>
                    <td style="text-align: center;">
                    <form action="{{ url('admin/product-approved/'.$product->id) }}" method="post">
                        {{ csrf_field() }}
                        <input type="checkbox" class="custom-control-input" name="status" @if($product->status=="1") checked @endif value="1" onchange="javascript:this.form.submit();">
                    </form>
                    </td>

                    <td class="text-center">
                        <a href="#myModal{{ $product->id }}" data-toggle="modal" class="btn btn-success" title="View Product"><i class="fa fa-eye"></i></a>
                        <a href="{{ url('/admin/edit-product/'.$pid) }}" class="btn btn-primary" title="Edit Product "><i class="fa fa-pencil-square-o"></i></a>
                        <a href="{{ url('/admin/add-attributes/'.$pid) }}" class="btn btn-info" title="Add Attributes"><i class="fa fa-list"></i></a>
                        <a href="{{ url('/admin/add-images/'.$pid) }}" class="btn btn-warning" title="Add Images"><i class="fa fa-picture-o"></i></a>
                        <a rel="{{ $pid }}" rel1="delete-product" href="javascript:" class="btn btn-danger deleteProduct" title="Delete product"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                <div id="myModal{{ $product->id }}" class="modal hide">
                    <div class="modal-header">
                        <button data-dismiss="modal" class="close" type="button">×</button>
                        <h3>"{{ $product->product_name }}" &nbsp;Full Details</h3>
                    </div>
                    <div class="modal-body">
                        <p><b>Product ID :</b> {{ $product->id }}</p>
                        <p><b>Product Status :</b> @if($product->status==1)<span style="color: green; font-weight: bold;">Active</span>@else<span style="color: red; font-weight: bold;">Inactive</span>@endif</p>
                        <p><b>Featured Product :</b> @if($product->featured==1)<span style="color: green; font-weight: bold;">Yes</span>@else<span style="color: red; font-weight: bold;">No</span>@endif</p>
                        <p><b>Category Name :</b> {{ $product->category_name }}</p>
                        <p><b>Product Code :</b> {{ $product->product_code }}</p>
                        <p><b>Product Brand :</b> {{ $product->product_brand }}</p>
                        <p><b>Price :</b> ₹ {{ $product->price }}</p>
                        <p><b>Additional Specs. :</b> <?php echo nl2br($product->care) ?></p>
                        <p><b>Description :</b> <?php echo nl2br($product->description) ?></p>
                        <p><b>Created On :</b> {{ date('d M Y | h:i a', strtotime($product->created_at)) }}</p>
                        <p><b>Updated On :</b> {{ date('d M Y | h:i a', strtotime($product->updated_at)) }}</p>
                        <p><b>Product Image: </b></p>
                        <center><img src="{{ asset('/images/backend_images/products/small/'.$product->image) }}"></center>
                    </div>
                </div>
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

