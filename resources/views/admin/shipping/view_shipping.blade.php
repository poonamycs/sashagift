@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Shipping Charges</a> <a href="#" class="current">View Shipping Charges</a> </div>
    <h1>Shipping Charges</h1>

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
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>All Shipping Charges</h5>            
            <a href="#modal" data-toggle="modal"><button style="float: right; margin: 3px 3px;" class="btn btn-info btn-xs"><i class="fas fa-plus-circle"></i> Add New Pincode</button></a>
            <div id="modal" class="modal hide">
                <div class="modal-header">
                    <button data-dismiss="modal" class="close" type="button">×</button>
                    <h3>Add New Pincode</h3>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post" action="{{ url('/admin/add-pincode/') }}" name="add_pincode" id="add_pincode">@csrf
                        <div class="control-group">
                            <label class="control-label">Enter Pincode :</label>
                            <div class="controls">
                                <input type="text" name="pincode" id="pincode" style="width: 85%" required="true">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Enter City :</label>
                            <div class="controls">
                                <input type="text" name="city" id="city" style="width: 85%" required="true">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Enter State :</label>
                            <div class="controls">
                                <input type="text" name="state" id="state" style="width: 85%" required="true">
                            </div>
                        </div>
                        <div class="control-group">
                            <div style="float: right;">
                                <button type="button" data-dismiss="modal" class="btn btn-default"><i class="fa fa-times"></i> Close</button>
                                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
          </div>
          <div class="widget-content nopadding table table-responsive">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Shipping Charges</th>
                  <th>Pincode</th>
                  <th>City</th>
                  <th>State</th>
                  <th>Updated At</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>

                @foreach($shipping_charges as $shipping)
                <tr class="gradeX">
                  <td class="text-center">{{ $shipping->id }}</td>
                  <td class="text-center">{{ $shipping->shipping_charges }}</td>
                  <td class="text-center">{{ $shipping->pincode }}</td>
                  <td class="text-center">{{ $shipping->city }}</td>
                  <td class="text-center">{{ $shipping->state }}</td>
                  <td class="text-center">{{ date('d M Y | h:i a', strtotime($shipping->updated_at)) }}</td>
                  <td class="text-center">
                    <a href="{{ url('admin/edit-shipping/'.$shipping->id) }}" class="btn btn-primary btn-mini">Edit</a>
                    <a onclick="return confirm('Are you sure you want to delete?')" href="{{ url('admin/delete-shipping/'.$shipping->id) }}" class="btn btn-danger btn-mini">Delete</a>
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