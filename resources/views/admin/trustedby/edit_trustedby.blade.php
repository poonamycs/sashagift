@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">

  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Trustedby</a> <a href="#" class="current">Edit Trustedby</a> </div>
    <h1>Trustedby Section</h1>
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
            <h5>Edit Trustedby</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/edit-trustedby/'.$trustedby->id) }}" name="edit_trustedby" id="edit_trustedby" novalidate="novalidate"> {{ csrf_field() }}
              <div class="control-group">
                <label class="control-label">Name :</label>
                <div class="controls">
                  <input type="text" name="name" id="name" value="{{ $trustedby->name }}" style="width: 65%">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Image :</label>
                <div class="controls">
                  <input name="image" id="image" type="file" size="19" style="opacity: 0;">

                  @if(!empty($trustedby->image))
                    <input type="hidden" name="current_image" value="{{ $trustedby->image }}"> 
                  @endif

                  @if(!empty($trustedby->image))
                  <img style="height: 50px;" src="{{ asset('assets/admin/images/backend_images/trustedby/'.$trustedby->image) }}">
                  @endif

                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Enable :</label>
                <div class="controls">
                  <input type="checkbox" name="status" id="status"  @if($trustedby->status=="1") checked @endif value="1">
                </div>
              </div>

              <div class="control-group">
                <div class="form-actions" style="float: right;">
                  <input type="submit" value="Update Trustedby" class="btn btn-success">
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