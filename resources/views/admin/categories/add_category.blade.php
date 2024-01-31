@extends('layouts.adminLayout.admin_design') 
@section('content')

<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>  
            <a href="#">Categories</a>  <a href="#" class="current">Add Category</a> 
        </div>
        <h1>Categories</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>Add Category</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form class="form-horizontal" method="post" action="{{ url('/admin/add-category') }}" name="add_category" id="add_category" novalidate="novalidate" enctype="multipart/form-data">{{ csrf_field() }}
                            <div class="control-group">
                                <label class="control-label">Category Name :</label>
                                <div class="controls">
                                    <input type="text" name="category_name" id="category_name" style="width: 65%" required="true">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Category Level :</label>
                                <div class="controls">
                                    <select name="parent_id" style="width: 66.5%;">
                                        <option value="0">Main Category</option>@foreach($levels as $val)
                                        <option value="{{ $val->id }}">{{ $val->name }}</option>@endforeach</select>
                                </div>
                            </div>
                            <!-- <div class="control-group">
                                <label class="control-label">Description :</label>
                                <div class="controls">
                                    <textarea name="description" id="description" rows="4" style="width: 65%"></textarea>
                                </div>
                            </div> -->
                            <!-- <div class="control-group">
                                <label class="control-label">URL :</label>
                                <div class="controls">
                                    <input type="text" name="url" id="url" style="width: 65%">
                                </div>
                            </div> -->
                            <div class="control-group">
                                <label class="control-label">Category Image :</label>
                                <div class="controls">
                                    <input type="file" name="image" id="image">
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-actions" style="float: right;">
                                    <button type="reset" class="btn btn-default"> Reset</button>
                                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Add Category</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>@endsection