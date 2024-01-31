@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Gallery Images</a> <a href="#" class="current">Gallery Images</a> </div>
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
            <h5>Gallery Images</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('admin/add-gallery/') }}" name="add_gallery" id="add_gallery" novalidate="novalidate"> {{ csrf_field() }}
             
              <div class="control-group">
                <label class="control-label">Images :</label>
                <div class="controls">
                  <input type="file" name="image[]" id="image" multiple="multiple" required>
                </div>
                <div class="alert alert-success"><b>Note: </b> You can add multiple images of a Product.</div>
              </div> 
              <div class="control-group">         
	              <div class="form-actions" style="float: right;">
	                <input type="submit" value="Add Images" class="btn btn-success">
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