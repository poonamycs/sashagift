@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">

  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('admin/dashboard/') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#"> Offer Banner</a> <a href="#" class="current">Edit Product</a> </div>
    <h1>Offer Banner Section</h1>
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
            <h5>Edit Offer Banner</h5>
          </div>
          <?php $eid = Crypt::encrypt($bannerDetails->id); ?>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/edit-offer-banner/'.$eid) }}" name="edit_banner" id="edit_banner" novalidate="novalidate"> {{ csrf_field() }}
              
              <div class="control-group">
                <label class="control-label">Title :</label>
                <div class="controls">
                  <input type="text" name="title" id="title" style="width: 65%" value="{{ $bannerDetails->title }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Link :</label>
                <div class="controls">
                  <input type="text" name="link" id="link" value="{{ $bannerDetails->link }}" style="width: 65%">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Image :</label>
                <div class="controls">
                  <input name="image" id="image" type="file" size="19" style="opacity: 0;">

                  @if(!empty($bannerDetails->image))
                    <input type="hidden" name="current_image" value="{{ $bannerDetails->image }}"> 
                  @endif

                  @if(!empty($bannerDetails->image))
                  <img style="height: 50px;" src="{{ asset('images/frontend_images/banners/'.$bannerDetails->image) }}">
                  @endif

                </div>
              </div>

              <input type="hidden" name="status" id="status" value="1">
               

              <div class="control-group">
                <div class="form-actions" style="float: right;">
                  <input type="submit" value="Update Banner" class="btn btn-success">
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