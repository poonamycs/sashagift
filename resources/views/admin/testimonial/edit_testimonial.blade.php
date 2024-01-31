@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">

  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Testimonial</a> <a href="#" class="current">Edit Testimonial</a> </div>
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
            <h5>Edit Testimonial</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/edit-testimonial/'.$testimonialDetails->id) }}" name="edit_banner" id="edit_banner" novalidate="novalidate"> {{ csrf_field() }}
              <div class="control-group">
                <label class="control-label">Name :</label>
                <div class="controls">
                  <input type="text" name="name" id="name" value="{{ $testimonialDetails->name }}" style="width: 65%">
                </div>
              </div>
              
              {{-- <div class="control-group">
                <label class="control-label">Position :</label>
                <div class="controls">
                  <input type="text" name="position" id="position" value="{{ $testimonialDetails->position }}" style="width: 65%">
                </div>
              </div> --}}

              <div class="control-group">
                <label class="control-label">Testimonial :</label>
                <div class="controls">
                  <textarea name="content" class="textarea_editor" rows="5" style="width: 65%">{{ $testimonialDetails->content }}</textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Image :</label>
                <div class="controls">
                  <input name="image" id="image" type="file" size="19" style="opacity: 0;">

                  @if(!empty($testimonialDetails->image))
                    <input type="hidden" name="current_image" value="{{ $testimonialDetails->image }}"> 
                  @endif

                  @if(!empty($testimonialDetails->image))
                  <img style="height: 50px;" src="{{ asset('images/backend_images/testimonials/'.$testimonialDetails->image) }}">
                  @endif

                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Enable :</label>
                <div class="controls">
                  <input type="checkbox" name="status" id="status"  @if($testimonialDetails->status=="1") checked @endif value="1">
                </div>
              </div>

              <div class="control-group">
                <div class="form-actions" style="float: right;">
                  <input type="submit" value="Update Testimonial" class="btn btn-success">
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