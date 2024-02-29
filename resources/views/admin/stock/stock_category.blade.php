@extends('layouts.adminLayout.admin_design') 
@section('content')

<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="{{ url('admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>  
            <a href="#">Stock Manage</a>  <a href="#" class="current">AddStock  Category</a> 
        </div>
        <h1>Stock Categories</h1>
    </div>
    <div class="container-fluid">
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
        <hr>
        <div class="accordion" id="collapse-group">
            <div class="accordion-group widget-box">
                <div class="accordion-heading">
                    <div class="widget-title"> 
                        <a data-parent="#collapse-group" href="#collapseGOne" data-toggle="collapse"> <span class="icon"> <i class="icon-info-sign"></i></i></span>
                            <h5>Add Stock Category</h5>
                        </a>
                    </div>
                </div>
                <div class="collapseGOne in accordion-body" id="collapseGOne">
                    <div class="widget-content nopadding">
                        <form class="form-horizontal" method="post" action="{{ url('/admin/stock-category') }}" name="stock_category" id="stock_category" novalidate="novalidate" enctype="multipart/form-data">{{ csrf_field() }}
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
                                        <option value="0">Main Category</option>
                                        @foreach($levels as $val)
                                        <option value="{{ $val->id }}">{{ $val->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-actions" style="float: right;">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Add Stock Category</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>Stock Category</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form class="form-horizontal" method="post" action="{{ url('/admin/stock-category') }}" name="stock_category" id="stock_category" novalidate="novalidate" enctype="multipart/form-data">{{ csrf_field() }}
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
                                        <option value="0">Main Category</option>
                                        @foreach($levels as $val)
                                        <option value="{{ $val->id }}">{{ $val->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-actions" style="float: right;">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Add Stock Category</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> -->
    </div>

    <div class="container-fluid">
    <hr>
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                    <h5>Stock Categories & Subcategories</h5>
                </div>
                <div class="widget-content nopadding table table-responsive">
                    <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th>Category ID</th>
                                <th>Category Name</th>
                                <th>Category Level</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr class="gradeX">
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <?php if($category->parent_id == 0) 
                                    echo "<span style='font-weight: bold; color: #666';>Main Category</span>"; 
                                    else echo "Subcategory" ?>
                                </td>
                                <td class="text-center"> 
                                    <a href="{{ url('/admin/edit-stock-category/'.$category->id) }}" class="btn btn-primary btn-mini" title="Edit Category">Edit</a>
                                    <a rel="{{ $category->id }}" rel1="delete-stock-category" href="javascript:" class="btn btn-danger btn-mini deleteStockCategory" title="Delete Category">Delete</a>
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