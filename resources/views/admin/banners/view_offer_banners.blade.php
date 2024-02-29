@extends('layouts.adminLayout.admin_design')
@section('content')
<?php 
use Illuminate\Support\Facades\Crypt;
?>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Offer Banners</a> <a href="#" class="current">View Banners</a> </div>
    <h1>Offer Banner Section</h1>

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
  <p>Note : Vertical Offer Banner Size should be <b>590x600px</b></p>
  <p>Note : Horizontal Offer Banner Size should be <b>545x256px</b></p>
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>All Banners</h5>
            {{-- <a href="{{ url('/admin/add-offer-banner') }}"><button style="float: right; margin: 3px 3px;" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Add Offer Banner</button></a> --}}
          </div>
          <div class="widget-content nopadding table table-responsive">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Link</th>
                  <th>Banner Image</th>
                  {{-- <th>Status</th> --}}
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

                @foreach($banners as $banner)
                <?php $eid = Crypt::encrypt($banner->id); ?>
                <tr class="gradeX">
                  <!-- <td>{{ $loop->index+1 }}</td> -->
                  <td style="text-align: center;">{{ $banner->id }} </td>
                  <td style="text-align: center;">{{ $banner->title }}</td>
                  <td style="text-align: center;"><a href="{{ $banner->link }}" target="_blank">{{ $banner->link }}</a></td>
                  <td style="text-align: center;">
                    @if(!empty($banner->image))
                    <img src="{{ asset('/images/frontend_images/banners/'.$banner->image) }}" style="height: 70px;">
                    @endif
                  </td>
                  {{-- <td style="text-align: center;">
                    @if($banner->status==1)
                    <span style="color: green;">Active</span>
                    @else
                    <span style="color: red;">Inactive</span>
                    @endif
                  </td> --}}

                  <td class="center" style="text-align: center !important;">
                    <a href="#myModal{{ $banner->id }}" data-toggle="modal" class="btn btn-success btn-mini" title="View Banner">View</a>
                    <a href="{{ url('/admin/edit-offer-banner/'.$eid) }}" class="btn btn-primary btn-mini" title="Edit Banner ">Edit</a>
                    {{-- @if(session('adminSession')=='admin@gmail.com')
                    <a rel="{{ $eid }}" rel1="delete-offer-banner" href="javascript:" class="btn btn-danger btn-mini deleteOfferBanner" title="Delete Banner">Delete</a>
                    @endif --}}
                 </td>
                </tr>
                <div id="myModal{{ $banner->id }}" class="modal hide">
                  <div class="modal-header">
                    <button data-dismiss="modal" class="close" type="button">×</button>
                    <h3>"{{ $banner->title }}" Full Details</h3>
                  </div>
                  <div class="modal-body">
                    <p><b>Banner ID: </b>{{ $banner->id }}</p>
                    <p><b>Banner Title: </b><?php echo $banner->title ?></p>
                    <p><b>Banner Link: </b>{{ $banner->link }}</p>
                    {{-- <p><b>Banner Status: </b> @if($banner->status==1)<span style="color: green; font-weight: bold;">Active</span>@else<span style="color: red; font-weight: bold;">Inactive</span>@endif</p> --}}
                    <p><b>Updated On: </b>{{ date('D, d M Y, h:i a', strtotime($banner->updated_at)) }}</p>
                    <p><b>Banner Image: </b></p>
                    <img src="{{ asset('/images/frontend_images/banners/'.$banner->image) }}">
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

<script>
  $("#delBanner").click(function(){
    if(confirm('Are you sure to delete the Product?')){
        return true;
      }
        return false;
  });
</script>
@endsection

