@extends('layouts.adminLayout.admin_design')

@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Customers</a> <a href="#" class="current">View Customers</a> </div>
    <h1>Customers Section</h1>

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
            <h5>All Customers</h5>
            <a href="{{ url('/admin/export-users/') }}"><button style="float: right; margin: 3px 3px;" class="btn btn-primary btn-xs"><i class="fas fa-file-export"></i> Export</button></a>
            <a href="{{ url('/admin/view-users-charts/') }}"><button style="float: right; margin: 3px 3px;" class="btn btn-info btn-xs"><i class="fa fa-line-chart"></i> Chart</button></a>
          </div>
          <div class="widget-content nopadding table table-responsive">
            <table class="table table-bordered data-table table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>User Status</th>
                  <th>Name</th>
                  <th>Mobile</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Pincode</th>
                  <th>A\C Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

                @foreach($users as $user)
                <tr class="gradeX">
                    <td><span style="display: none;">{{ $loop->index+1 }}</span>{{ $user->id }}</td>

                    <td style="text-align: center;">
                        @if($user->isOnline())
                        <span class="text-success" style="color: green">Online</span>
                        @else
                        <span class="text-danger" style="color: red">Offline</span>
                        @endif
                    </td>

                    <td>{{ $user->name }}</td>
                    <td>{{ $user->mobile }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->address }}</td>
                    <td>{{ $user->pincode }}</td>
                    <td style="text-align: center;">
                    @if($user->status==1)
                        <span style="color:green">Active</span>
                    @else
                        <span style="color:red">Inactive</span>
                    @endif
                    </td>
                    <td class="center">
                        <a href="#myModal{{ $user->id }}" data-toggle="modal" class="btn btn-primary btn-mini">View</a>
                        <a href="{{ url('/admin/view-user-orders/'.$user->email) }}" class="btn btn-info btn-mini">Orders</a>
                    </td>
                </tr>

                <div id="myModal{{ $user->id }}" class="modal hide">
                  <div class="modal-header">
                    <button data-dismiss="modal" class="close" type="button">×</button>
                    <h3>"{{ $user->name }}" Full Details</h3>
                  </div>
                  <div class="modal-body">
                    <p>@if($user->isOnline()) <li class="text-success" style="color: green; margin-left: 12px">Online</li> @else <li class="text-danger" style="color: red; margin-left: 12px">Offline</li> @endif</p>
                    <p><b>ID: </b>{{ $user->id }}</p>
                    <p><b>Name: </b>{{ $user->name }}</p>
                    <p><b>Email: </b>{{ $user->email }}</p>
                    <p><b>Mobile: </b>{{ $user->mobile }}</p>
                    <p><b>Address: </b>{{ $user->address }}</p>
                    <p><b>City: </b>{{ $user->city }}</p>
                    <p><b>State: </b>{{ $user->state }}</p>
                    <p><b>Country: </b>{{ $user->country }}</p>
                    <p><b>Pincode: </b>{{ $user->pincode }}</p>
                    <p><b>A/C Status: </b> 
                      <?php if($user->status==1) 
                        echo "<span style='color:green';>Activated</span>";
                        else 
                        echo "<span style='color:red';>Inactive</span>"; ?>
                    </p>
                    <p><b>Registered On: </b>{{ date('D, d M Y, h:i a', strtotime($user->created_at)) }}</p>
                    <p><b>Updated On: </b>{{ date('D, d M Y, h:i a', strtotime($user->updated_at)) }}</p>
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

