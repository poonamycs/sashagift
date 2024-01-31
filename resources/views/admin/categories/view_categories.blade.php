@extends('layouts.adminLayout.admin_design')
@section('content')

<style>
  td{
    text-align: center !important;
  }
</style>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Categories</a> <a href="#" class="current">View categories</a> </div>
    <h1>Categories</h1>

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
            <h5>All Categories & Subcategories</h5>
            <a href="{{ url('/admin/add-category') }}"><button style="float: right; margin: 3px 3px;" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Add Category</button></a>
          </div>
          <div class="widget-content nopadding table table-responsive">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Category ID</th>
                  <th>Image</th>
                  <th style="text-align: left;">Category Name</th>
                  <th>Category Level</th>
                  <th>Category URL</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>

              	@foreach($categories as $category)
                <tr class="gradeX">
                  <td>{{ $category->id }}</td>
                  <td style="text-align: center;">
                    @if(!empty($category->image))
                    <img src="{{ asset('/images/frontend_images/category/'.$category->image) }}" style="height: 50px;">
                    @else
                    <img src="{{ asset('/images/frontend_images/na.png') }}" style="height: 50px;">
                    @endif
                  </td>
                  <td style="text-align: left !important;">{{ $category->name }}</td>
                  <td>
                    <?php if($category->parent_id == 0) 
                    echo "<span style='font-weight: bold; color: #666';>Main Category</span>"; 
                    else echo "Subcategory" ?>
                  </td>
                  <td>{{ $category->url }}</td>
                  <td class="center">
                    <a href="#myModal{{ $category->id }}" data-toggle="modal" class="btn btn-success btn-mini" title="View Category">View</a>
                    <a href="{{ url('/admin/edit-category/'.$category->id) }}" class="btn btn-primary btn-mini" title="Edit Category">Edit</a>
                    @if(session('adminSession')=='admin@gmail.com')
                    <a rel="{{ $category->id }}" rel1="delete-category" href="javascript:" class="btn btn-danger btn-mini deleteCategory" title="Delete Category">Delete</a>
                    @endif
                  </td>
                </tr>
                <div id="myModal{{ $category->id }}" class="modal hide">
                  <div class="modal-header">
                    <button data-dismiss="modal" class="close" type="button">×</button>
                    <h3>"{{ $category->name }}" Full Details</h3>
                  </div>
                  <div class="modal-body">
                    <p><b>Category ID: </b>{{ $category->id }}</p>
                    <p><b>Category Type: </b> <?php if($category->parent_id == 0) echo "Main Category"; else echo "Subcategory" ?></p>
                    <p><b>Category Name: </b>{{ $category->name }}</p>
                    <p><b>Category Link: </b>{{ $category->url }}</p>
                    <p><b>Category Status: </b> 
                      <?php if($category->status==1) 
                        echo "<span style='color:green; font-weight: bold'>Active</span>";
                        else 
                        echo "<span style='color:red; font-weight: bold'>Inactive</span>"; ?>
                    </p>
                    <p><b>Category Description: </b> <?php echo nl2br($category->description) ?> </p>
                    <p><b>Created On: </b>{{ date('D, d M Y, h:i a', strtotime($category->created_at)) }}</p>
                    <p><b>Updated On: </b>{{ date('D, d M Y, h:i a', strtotime($category->updated_at)) }}</p>
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

