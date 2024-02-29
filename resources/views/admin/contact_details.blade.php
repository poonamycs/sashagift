@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">

  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('admin/dashboard/') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Contact Details</a> <a href="#" class="current">Edit Contact Details</a> </div>
    <h1>Contact Details Section</h1>
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
            <h5>Edit Details</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/edit-contact-details/'.$contactDetails->id) }}" name="edit_banner" id="edit_banner" novalidate="novalidate"> {{ csrf_field() }}
              
              <div class="control-group">
                <label class="control-label">Address :</label>
                <div class="controls">
                  <textarea type="text" name="address" id="address" style="width: 65%" rows="2">{{ $contactDetails->address }}</textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Phone :</label>
                <div class="controls">
                  <input type="text" name="phone" id="phone" value="{{ $contactDetails->phone }}" style="width: 65%" required>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Email :</label>
                <div class="controls">
                  <input type="email" name="email" id="email" value="{{ $contactDetails->email }}" style="width: 65%" required>
                </div>
              </div>

              <div class="control-group">
                <div class="form-actions" style="float: right;">
                  <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Update Details</button>
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