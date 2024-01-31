@extends('layouts.adminLayout.admin_design')

@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Gallery</a> <a href="#" class="current">View Gallery Images</a> </div>
    <h1>Gallery Section</h1>

    @if(Session::has('flash_message_error'))
    <div class="alert alert-error alert-block">
    	<button type="button" class="close" data-dismiss="alert">x</button>
    	<strong>{!! session('flash_message_error') !!}</strong>
    </div>
    @endif

    @if(Session::has('flash_message_success'))
    <div class="alert alert-success alert-block">
    	<button type="button" class="close" data-dismiss="alert">x</button>
    	<strong>{!! session('flash_message_success') !!}</strong>
    </div>
    @endif
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>All Gallery Images </h5>
            <a href="{{ url('/admin/add-gallery') }}"><button style="float: right; margin: 3px 3px;" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Add Images</button></a>
          </div>
          <div class="widget-content nopadding table table-responsive">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Images</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

                @foreach($galleryImages as $gallery)
                <tr class="gradeX">
                  <!-- <td>{{ $loop->index+1 }}</td> -->
                  <td style="text-align: center;">{{ $gallery->id }}</td>
                  <td style="text-align: center;">
                    @if(!empty($gallery->image))
                    <img src="{{ asset('/images/backend_images/gallery/'.$gallery->image) }}" style="height: 70px;">
                    @endif
                  </td>

                  <td class="center" style="text-align: center !important;">
                    <a href="#myModal{{ $gallery->id }}" data-toggle="modal" class="btn btn-success btn-mini" title="View Image">View</a>
                    <a href="{{ url('/admin/edit-gallery/'.$gallery->id) }}" class="btn btn-primary btn-mini" title="Edit Image ">Edit</a>
                    <a onclick="return confirm('Are you sure you want to delete this Image?');" href="{{ url('/admin/delete-gallery/'.$gallery->id) }}" class="btn btn-danger btn-mini" title="Delete Image">Delete</a>
                 </td>
                </tr>
                <div id="myModal{{ $gallery->id }}" class="modal hide">
                  <div class="modal-header">
                    <button data-dismiss="modal" class="close" type="button">×</button>
                    <h3>Full Details</h3>
                  </div>
                  <div class="modal-body">
                    <p><b> ID: </b>{{ $gallery->id }}</p>
                    <p><b>Updated On: </b>{{ date('D, d M Y, h:i a', strtotime($gallery->updated_at)) }}</p>
                    <p><b> Image: </b></p>
                    <img src="{{ asset('/images/backend_images/gallery/'.$gallery->image) }}">
                  </div>
                </div>
                @endforeach
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

