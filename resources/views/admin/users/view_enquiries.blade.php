@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Enquiries/Feedback</a> <a href="#" class="current">View Enquiries/Feedback</a> </div>
    <h1>Enquiries/Feedback Section</h1>

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
            <h5>All Enquiries/Feedback</h5>
          </div>
          <div class="widget-content nopadding table table-responsive">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile No.</th>
                  <th>Subject</th>
                  <th>Message</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

                @foreach($allEnquiries as $enquiry)
                <tr class="gradeX">
                  <td style="text-align:center;"><span style="display: none;">{{ $loop->index+1 }}</span>{{ $enquiry->id }}</td>
                  <td style="text-align:center;">{{ $enquiry->name }}</td>
                  <td style="text-align:center;">{{ $enquiry->email }}</td>
                  <td style="text-align:center;">{{ $enquiry->mobile }}</td>
                  <td>{{ $enquiry->subject }}</td>
                  <td>{{ $enquiry->comment }}</td>

                  <td style="text-align:center;">
                    <a href="{{ url('admin/delete-enquiry/'.$enquiry->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-mini">Delete</a>
                 </td>
                </tr>
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