@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Categories</a> <a href="#" class="current">Edit Category</a> </div>
    <h1>Categories</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Edit Category</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{ url('/admin/edit-category/'.$categoryDetails->id) }}" name="edit_category" id="edit_category" novalidate="novalidate" enctype="multipart/form-data"> {{ csrf_field() }}
              <div class="control-group">
                <label class="control-label">Category Name :</label>
                <div class="controls">
                  <input type="text" name="category_name" id="category_name" value="{{ $categoryDetails->name }}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Category Level :</label>
                <div class="controls">
                  <select name="parent_id" style="width: 220px;">
                    <option value="0">Main Category</option>
                    @foreach($levels as $val)
                      <option value="{{ $val->id }}" @if($val->id == $categoryDetails->parent_id) selected @endif>{{ $val->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <!-- <div class="control-group">
                <label class="control-label">Description :</label>
                <div class="controls">
                  <textarea name="description" id="description" class="textarea_editor" rows="4" style="width: 65%">{{ $categoryDetails->description }}</textarea>
                </div>
              </div> -->
              <!-- <div class="control-group">
                <label class="control-label">URL :</label>
                <div class="controls">
                  <input type="text" name="url" id="url" value="{{ $categoryDetails->url }}">
                </div>
              </div> -->
              <div class="control-group">
                <label class="control-label">Image :</label>
                <div class="controls">
                  <input name="image" id="image" type="file" size="19" style="opacity: 0;">

                  @if(!empty($categoryDetails->image))
                    <input type="hidden" name="current_image" value="{{ $categoryDetails->image }}"> 
                  @endif

                  @if(!empty($categoryDetails->image))
                  <img style="height: 50px;" src="{{ asset('images/frontend_images/category/'.$categoryDetails->image) }}">
                  @endif

                </div>
              </div>
              <div class="control-group">
                <div class="form-actions" style="float: right;">
                  <input type="submit" value="Update Category" class="btn btn-success">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection