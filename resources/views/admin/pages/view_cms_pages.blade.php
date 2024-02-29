@extends('layouts.adminLayout.admin_design')

@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">CMS Pages</a> <a href="#" class="current">View CMS Pages</a> </div>
    <h1>CMS Pages Section</h1>

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
            <h5>All CMS Pages</h5>
            {{-- <a href="{{ url('/admin/add-cms-page') }}"><button style="float: right; margin: 3px 3px;" class="btn btn-success btn-xs">Add CMS Page</button></a> --}}
          </div>
          <div class="widget-content nopadding table table-responsive">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>URL</th>
                  <th>Description</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

                @foreach($allCmsPages as $cmspage)
                <tr class="gradeX">
                  <td style="display: none;">{{ $loop->index+1 }}</td>
                  <td style="text-align:center;">{{ $cmspage->id }}</td>
                  <td style="text-align:center;">{{ $cmspage->title }}</td>
                  <td style="text-align:center;">{{ $cmspage->url }}</td>
                  <td><?php echo Str::limit($cmspage->description, 26) ?></td>
                  <td style="text-align:center;">
                    @if($cmspage->status==0)
                        <span style="color: red">Inactive</span>                    
                    @else
                        <span style="color: green">Active</span>                    
                    @endif
                  </td>

                  <td class="center" style="text-align: center;">
                    <a href="#myModal{{ $cmspage->id }}" data-toggle="modal" class="btn btn-success btn-mini" title="View Page">View</a>
                    <a href="{{ url('/admin/edit-cms-page/'.$cmspage->id) }}" class="btn btn-primary btn-mini" title="Edit Page ">Edit</a>
                    {{-- <a onclick="return confirm('Are you sure you want to delete this Page?');" href="{{ url('/admin/delete-cms-page/'.$cmspage->id) }}" class="btn btn-danger btn-mini" title="Delete Page">Delete</a> --}}
                 </td>
                </tr>
                <div id="myModal{{ $cmspage->id }}" class="modal hide">
                  <div class="modal-header">
                    <button data-dismiss="modal" class="close" type="button">×</button>
                    <h3>"{{ $cmspage->title }}" &nbsp;Full Details</h3>
                  </div>
                  <div class="modal-body">
                    <p><b>Page ID :</b> {{ $cmspage->id }}</p>
                    <p><b>Page URL :</b> {{ $cmspage->url }}</p>
                    <p><b>Page Description:</b> <?php echo nl2br($cmspage->description) ?></p>
                    <p><b>Page Status :</b> @if($cmspage->status==0)<span style="color: red">Inactive</span>@else<span style="color: green">Active</span>@endif</p>
                    <p><b>Created On :</b> {{ date('d M Y | h:i a', strtotime($cmspage->created_at)) }}</p>
                    <p><b>Updated On :</b> {{ date('d M Y | h:i a', strtotime($cmspage->updated_at)) }}</p>
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

