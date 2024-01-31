@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">CMS Page</a> <a href="#" class="current">Edit CMS Page</a> </div>
    <h1>CMS Page Section</h1>
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
            <h5>Edit CMS Page</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/edit-cms-page/'.$CmsPage->id) }}" name="edit_cms_page" id="edit_cms_page" novalidate="novalidate"> {{ csrf_field() }}
              <div class="control-group">
                <label class="control-label">Title : </label>
                <div class="controls">
                  <input type="text" name="title" id="title" style="width: 65%" value="{{ $CmsPage->title }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">CMS Page URL </label>
                <div class="controls">
                  <input type="text" name="url" id="url" style="width: 65%" value="{{ $CmsPage->url }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Description : </label>
                <div class="controls">
                  <textarea name="description" id="description" class="textarea_editor" rows="8" style="width: 65%">{{ $CmsPage->description }}</textarea>
                </div>
              </div>              
              <div class="control-group">
                <label class="control-label">Publish / Enable : </label>
                <div class="controls">
                  <input type="checkbox" name="status" id="status" class="btn btn-success" @if($CmsPage->status=="1") checked @endif value="1">
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="alert alert-info">Click the checkbox to publish page on website.</span>
                </div>
              </div>
              <div class="control-group">
                <div class="form-actions" style="float: right;">
                  <input type="submit" value="Update CMS Page" class="btn btn-success">
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