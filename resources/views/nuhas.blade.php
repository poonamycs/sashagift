@extends('layouts/frontLayout/front_design')
@section('content')

@section('styles')
<style>
.pagination .page-item.active .page-link {
        background-color: #fbcdab; 
        border-color: #d0caca; 
    }
    /* .pagination .page-item.active .page-link:hover {
        background-color: #0056b3; 
        border-color: #0056b3; 
    } */
</style>
@endsection('styles')
@php
    $email = Session::get('vendorSession');
    if($email != null)
    {
        $user = App\Models\Admin::where('email',$email)->first();
        $vendorproduct = App\Models\VendorProduct::where('vendor_id',$user->id)->paginate(8);
    }
    else
    {
        $user = null;
    }
@endphp
<!-- Page Title/Header Start -->
<div class="page-title-section section" data-bg-image="assets/images/nuhas_bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-title">
                        <h1 class="title">Nuhas</h1>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">Products</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Page Title/Header End -->
  <!-- Category Banner Section Start -->
  <div class="section bg-white pb-5 pt-5">
        <div class="container">
            <div class="row row-cols-lg-4 row-cols-sm-2 row-cols-1 learts-mb-n40">
                @if($user != null)
                     @if(!$vendorproduct->isempty())
                        @foreach($vendorproduct as $product)
                            
                                @if($product->product != null && $product->product->category_id == '1')
                                <div class="col learts-mb-40">
                                    <div class="category-banner4">
                                        <a href="{{url('/product_detail/'.encrypt($product->id))}}" class="inner">
                                            <div class="image"><img src="{{ asset('assets/admin/images/backend_images/products/large/'.$product->product->image) }}" alt="" style="min-height:350px!important; object-fit:cover!important;"></div>
                                            <div class="content" data-bg-color="#f4ede7">
                                                <h3 class="title">{{$product->product->product_name}}</h3>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                
                                @endif  
                            
                        @endforeach
                        @endif
                   
                    {{ $vendorproduct->links('pagination::bootstrap-4') }}
                   
                @else
                @foreach($products as $product)
                    <div class="col learts-mb-40">
                        <div class="category-banner4">
                            <a href="{{url('/nuhas_detail/'.encrypt($product->id))}}" class="inner">
                                <div class="image"><img src="{{ asset('assets/admin/images/backend_images/products/large/'.$product->image) }}" alt="" style="min-height:350px; object-fit:cover;"></div>
                                <div class="content" data-bg-color="#f4ede7">
                                    <h3 class="title">{{$product->product_name}}</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
               
                
            </div>
             <!-- {{ $products->links() }} -->
             <div class="">
                <nav class="justify-content-center d-flex pt-5">
                    <ul class="pagination">
                        {{$products->links('pagination::bootstrap-4')}}
                    </ul>
                </nav>
                </div>
                @endif
            
        </div>
    </div>

@section('scripts')

@endsection('scripts')

@endsection('content')