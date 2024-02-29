@extends('layouts.adminLayout.admin_design')
@section('content')
<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Blog</a> <a href="#" class="current">Add Blog</a> </div>
    <h1>Blog Section</h1>
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
            <h5>Add Blog</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/add-blog') }}" name="add_blogl" id="add_blog" novalidate="novalidate"> {{ csrf_field() }}
              
              <div class="control-group">
                <label class="control-label">Image :</label>
                <div class="controls">
                  <input type="file" name="image" id="image">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Name :</label>
                <div class="controls">
                  <input type="text" name="name" id="name" style="width: 65%" required>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Description :</label>
                <div class="controls">
                  <textarea name="content" id="body" class="textarea_editor" rows="5" style="width: 65%"></textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Enable :</label>
                <div class="controls">
                  <input type="checkbox" name="status" id="status" class="btn btn-success" value="1">
                </div>
              </div>
              <div class="control-group">
                <div class="form-actions" style="float: right;">
                  <input type="submit" value="Add Blog" class="btn btn-success">
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