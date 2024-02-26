@extends('layouts.adminLayout.admin_design')
@section('content')
<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Banners</a> <a href="#" class="current">Add Banner</a> </div>
    <h1>Banners Section</h1>
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
            <h5>Add Banner</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/add-banner') }}" name="add_banner" id="add_banner" novalidate="novalidate"> {{ csrf_field() }}
              
              <div class="control-group">
                <label class="control-label">Image : </label>
                <div class="controls">
                  <input type="file" name="image" id="image"><br>
                  <small>Banner Size should be 1350x400px</small>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Title : </label>
                <div class="controls">
                  <input type="text" name="title" id="title" style="width: 65%">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Description : </label>
                <div class="controls">
                  <textarea name="description" id="body" class="textarea_editor" rows="5" style="width: 65%"></textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Link : </label>
                <div class="controls">
                  <input type="text" name="link" id="link" style="width: 65%">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Enable : </label>
                <div class="controls">
                  <input type="checkbox" name="status" id="status" class="btn btn-success" value="1">
                </div>
              </div>
              <div class="control-group">
                <div class="form-actions" style="float: right;">
                    <button type="reset" class="btn btn-default"> Reset</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Add Banner</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
    ClassicEditor
        .create(document.querySelector('#body'))
        .catch(error => {
            console.error(error);
        });
</script>
@endsection