@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">About</a> </div>
    <h1>About Section</h1>
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
            <h5>About</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/about') }}" name="add_product" id="add_product" novalidate="novalidate"> {{ csrf_field() }}
              <input type="hidden" name="id" value="{{$about->id}}">
              <div class="control-group">
                <label class="control-label">Title : </label>
                <div class="controls">
                  <input type="text" name="title" id="title" value="{{$about->title}}" class="span7">
                </div>
              </div>
              
              <div class="control-group">
                <label class="control-label">Description : </label>
                <div class="controls">
                  <textarea name="description" id="description" rows="8" class="span7">{{$about->description}}</textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Image : </label>
                <div class="controls">
                  <input type="file" name="image" id="image">
                  @if(!empty($about->image))
                  <input type="hidden" name="current_image" value="{{ $about->image }}"> 
                  @endif
                  
                  @if(!empty($about->image))
                  <a href="{{ asset('assets/admin/images/frontend_images/category/'.$about->image) }}"><img style="height: 50px;" src="{{ asset('assets/admin/images/frontend_images/category/'.$about->image) }}"></a> | <a href="{{ url('admin/delete-about-image/'.$about->id) }}">Delete</a>
                  @endif
                </div>
              </div>
              
            <div class="control-group">
                <div class="form-actions" style="float: right;">
                  <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Update</button>
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