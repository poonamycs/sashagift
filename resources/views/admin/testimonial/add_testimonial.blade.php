@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Testimonial</a> <a href="#" class="current">Add Testimonial</a> </div>
    <h1>Testimonial Section</h1>
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
            <h5>Add Testimonial</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/add-testimonial') }}" name="add_testimonial" id="add_testimonial" novalidate="novalidate"> {{ csrf_field() }}
              
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

              {{-- <div class="control-group">
                <label class="control-label">Position :</label>
                <div class="controls">
                  <input type="text" name="position" id="position" style="width: 65%">
                </div>
              </div> --}}

              <div class="control-group">
                <label class="control-label">Testimonial :</label>
                <div class="controls">
                  <textarea name="content" class="textarea_editor" rows="5" style="width: 65%"></textarea>
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
                  <input type="submit" value="Add Testimonial" class="btn btn-success">
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