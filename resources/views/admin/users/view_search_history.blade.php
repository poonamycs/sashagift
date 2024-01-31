@extends('layouts.adminLayout.admin_design')
@section('content')
<?php 
  use Illuminate\Support\Facades\Crypt;
?>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Banners</a> <a href="#" class="current">View Search History</a> </div>
    <h1>User Search History Section</h1>

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
            <h5>All Search History</h5>
          </div>
          <div class="widget-content nopadding table table-responsive">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Searched Keyword</th>
                  <th>Searched Date</th>
                </tr>
              </thead>
              <tbody>

                @foreach($searchDetails as $search)
                <tr class="gradeX">
                  <td>{{ $loop->index+1 }}</td> 
                  <td style="text-align: center;">{{ $search->id }} </td>
                  <td style="text-align: center;">{{ $search->product }}</td>
                  <td style="text-align: center;">{{ date('D, d M Y, h:i a', strtotime($search->updated_at)) }}</td>
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

