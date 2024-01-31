@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Gallery Images</a> <a href="#" class="current">Edit Image</a> </div>
    <button class="btn btn-success btn-sm" onclick="goBack()"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>

    <h1>Gallery Image Section</h1>
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
            <h5>Edit Gallery Image</h5>
          </div>
          <div class="widget-content nopadding"><br>
            <center><img src="{{ asset('images/backend_images/gallery/'.$imageDetails->image) }}" style="height: 200px;"><br></center>
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('admin/edit-gallery/'.$imageDetails->id) }}" name="add_gallery" id="add_gallery" novalidate="novalidate"> {{ csrf_field() }}
             
              <div class="control-group">
                <label class="control-label">Images : </label>
                <div class="controls">
                  <input type="file" name="image" id="image" required>
                </div>
              </div> 
              <div class="control-group">         
	              <div class="form-actions" style="float: right;">
	                <input type="submit" value="Update Image" class="btn btn-success">
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