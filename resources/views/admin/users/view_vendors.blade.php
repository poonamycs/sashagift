@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Vendors</a> <a href="#" class="current">View Vendors</a> </div>
    <h1>All Vendors</h1>

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
            <h5>All Vendors</h5>
            <a href="{{ url('/admin/export-users/') }}"><button style="float: right; margin: 3px 3px;" class="btn btn-primary btn-xs"><i class="fas fa-file-export"></i> Export</button></a>
            <a href="{{ url('/admin/view-users-charts/') }}"><button style="float: right; margin: 3px 3px;" class="btn btn-info btn-xs"><i class="fa fa-line-chart"></i> Chart</button></a>
          </div>
          <div class="widget-content nopadding table table-responsive">
            <table class="table table-bordered data-table table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Address</th>
                  <th>Pincode</th>
                  {{-- <th>A\C Status</th> --}}
                  <th>Approved?</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

                @foreach($vendors as $vendor)
                <tr class="gradeX">
                    <td><span style="display: none;">{{ $loop->index+1 }}</span>{{ $vendor->id }}</td>
                    <td>{{ $vendor->vname }}</td>
                    <td>{{ $vendor->email }}</td>
                    <td>{{ $vendor->vphone }}</td>
                    <td>{{ $vendor->vaddress }}</td>
                    <td>{{ $vendor->vpincode }}</td>
                    {{-- <td style="text-align: center;">
                        @if($vendor->status==1)
                        <span style="color:green">Active</span>
                        @else
                        <span style="color:red">Inactive</span>
                    @endif --}}
                    </td>

                  <td style="text-align: center;">
                    <form action="{{ url('admin/product-approved/'.$vendor->id) }}" method="post">
                        {{ csrf_field() }}
                        <input type="checkbox" class="custom-control-input" name="admin_approved" @if($vendor->admin_approved=="1") checked @endif value="1" onchange="javascript:this.form.submit();">
                    </form>
                  </td>
                  <td class="text-center">
                    <a href="#myModal{{ $vendor->id }}" data-toggle="modal" class="btn btn-info btn-mini">View</a>
                    <a href="{{ url('admin/view-vendor-stocks/'.$vendor->id) }}" class="btn btn-success btn-mini"> Vendor Stock</a>
                  </td>
                </tr>

                <div id="myModal{{ $vendor->id }}" class="modal hide">
                  <div class="modal-header">
                    <button data-dismiss="modal" class="close" type="button">×</button>
                    <h3>"{{ $vendor->vname }}" Full Details</h3>
                  </div>
                  <div class="modal-body">
                    <p><b>ID: </b>{{ $vendor->id }}</p>
                    <p><b>Name: </b>{{ $vendor->vname }}</p>
                    <p><b>Email: </b>{{ $vendor->email }}</p>
                    <p><b>Mobile: </b>{{ $vendor->vphone }}</p>
                    <p><b>Address: </b>{{ $vendor->vaddress }}</p>
                    <p><b>Pincode: </b>{{ $vendor->vpincode }}</p>
                    <p><b>A/C Status: </b> 
                      <?php if($vendor->status==1) 
                        echo "<span style='color:green';>Active</span>";
                        else 
                        echo "<span style='color:red';>Inactive</span>"; ?>
                    </p>
                    <p><b>Approved by Admin?: </b> 
                      <?php if($vendor->admin_approved==1) 
                        echo "<span style='color:green';>Yes</span>";
                        else 
                        echo "<span style='color:red';>No</span>"; ?>
                    </p>
                    <p><b>Registered On: </b>{{ date('D, d M Y, h:i a', strtotime($vendor->created_at)) }}</p>
                    <p><b>Updated On: </b>{{ date('D, d M Y, h:i a', strtotime($vendor->updated_at)) }}</p>
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

