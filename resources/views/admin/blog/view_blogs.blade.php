@extends('layouts.adminLayout.admin_design')

@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Blog</a> <a href="#" class="current">View Blogs</a> </div>
    <h1>Blog Section</h1>

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
            <h5>All Blogs</h5>
            <a href="{{ url('/admin/add-blog') }}"><button style="float: right; margin: 3px 3px;" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Add Blog</button></a>
          </div>
          <div class="widget-content nopadding table table-responsive">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Image</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

                @foreach($blogAll as $blog)
                <tr class="gradeX">
                  <!-- <td>{{ $loop->index+1 }}</td> -->
                  <td style="text-align: center;">{{ $blog->id }}</td>
                  <td style="text-align: center;">{{ $blog->name }}</td>
                  {{-- <td style="text-align: center;">{{ $blog->position }}</td> --}}
                  <td style="text-align: center;width: 50%;"><?php $review = Str::limit($blog->content, 150); echo $review; ?></td>
                  <td style="text-align: center;">
                    @if(!empty($blog->image))
                    <img src="{{ asset('assets/admin/images/backend_images/blog/'.$blog->image) }}" style="height: 50px;border-radius: 50%;">
                    @endif
                  </td>
                  <td style="text-align: center;">
                    @if($blog->status==1)
                    <span style="color: green;">Active</span>
                    @else
                    <span style="color: red;">Inactive</span>
                    @endif
                  </td>

                  <td class="center" style="text-align: center !important;">
                    <a href="#myModal{{ $blog->id }}" data-toggle="modal" class="btn btn-success btn-mini" title="View Product">View</a>
                    <a href="{{ url('/admin/edit-blog/'.$blog->id) }}" class="btn btn-primary btn-mini" title="Edit Product ">Edit</a>
                    <a rel="{{ $blog->id }}" rel1="delete-blog" href="javascript:void" class="btn btn-danger btn-mini deleteTestimonial" title="Delete product">Delete</a>
                 </td>
                </tr>
                <div id="myModal{{ $blog->id }}" class="modal hide">
                  <div class="modal-header">
                    <button data-dismiss="modal" class="close" type="button">×</button>
                    <h3>"{{ $blog->name }}" Full Details</h3>
                  </div>
                  <div class="modal-body">
                    <p><b> ID: </b>{{ $blog->id }}</p>
                    <p><b>Name : </b><?php echo $blog->name ?></p>
                    <p><b>Description : </b><?php echo $blog->content ?></p>
                    <p><b>Status: </b> @if($blog->status==1)<span style="color: green; font-weight: bold;">Active</span>@else<span style="color: red; font-weight: bold;">Inactive</span>@endif</p>
                    <p><b>Created On: </b>{{ date('D, d M Y, h:i a', strtotime($blog->created_at)) }}</p>
                    <p><b>Updated On: </b>{{ date('D, d M Y, h:i a', strtotime($blog->updated_at)) }}</p>
                    <p><b>Image: </b></p>
                    <center><img src="{{ asset('assets/admin/images/backend_images/blog/'.$blog->image) }}" style="border-radius: 50%"></center>
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

