@extends('layouts/frontLayout/front_design')
@section('content')

@section('styles')
<style>

</style>
@endsection('styles')

  <!-- Page Title/Header Start -->
  <!-- <div class="page-title-section section" data-bg-image="assets/images/bg/page-title-1.webp">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="page-title">
                        <h1 class="title">Shop</h1>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="shop.html">Products</a></li>
                            <li class="breadcrumb-item active">Square Serving Platter</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div> -->
    <!-- Page Title/Header End -->

    <!-- Single Products Section Start -->
    <div class="section section-padding border-bottom">
        <div class="container">
            <div class="row learts-mb-n40">
            <div class="col-lg-1"></div>

                <!-- Product Images Start -->
                <div class="col-lg-4 col-12 learts-mb-40">
                    <div class="product-images">
                      
                        <div class="product-gallery-slider">

                            <div class="product-zoom" data-image="{{ asset('assets/admin/images/backend_images/products/large/'.$product->image) }}">
                                <img src="{{ asset('assets/admin/images/backend_images/products/large/'.$product->image) }}" alt="">
                            </div>
                            <!-- <div class="product-zoom" data-image="assets/images/product/utility/hand_bag.jpg">
                                <img src="assets/images/product/utility/hand_bag.jpg" alt="">
                            </div>
                            <div class="product-zoom" data-image="assets/images/product/utility/metal_box.jpg">
                                <img src="assets/images/product/utility/metal_box.jpg" alt="">
                            </div> -->
                           
                        </div>
                        <div class="product-thumb-slider">
                            <div class="item">
                                <img src="assets/images/product/utility/extra-05259461.png" alt="">
                            </div>
                            <div class="item">
                                <img src="assets/images/product/utility/hand_bag.jpg" alt="">
                            </div>
                            <div class="item">
                                <img src="assets/images/product/utility/metal_box.jpg" alt="">
                            </div>
                          
                        </div>
                    </div>
                </div>
                <!-- Product Images End -->

                <!-- Product Summery Start -->
                <div class="col-lg-6   col-12 learts-mb-40">
                    <div class="product-summery">
                       
                       
                        <h3 class="product-title">{{$product->product_name}}</h3>
                        <div class="product-description">
                            <p>{{$product->description}}</p>
                        </div>
                       
                        <div class="product-buttons">
                            <!-- <a href="#" class="btn btn-dark btn-outline-hover-dark"><i class="fas fa-shopping-cart"></i> Send Enquiry</a> -->
                            <div class="col-12 text-center learts-mb-30"> <button class="hexa"><a href="/contact" class="">Send Enquiry</a> </button></div>

                        </div>
                        
                        <div class="product-meta">
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="label"><span>SKU</span></td>
                                        <td class="value">{{$product->product_code}}</td>
                                    </tr>
                                    <tr>
                                        <td class="label"><span>Category</span></td>
                                        <td class="value">
                                            <ul class="product-category">
                                                <li><a href="#">{{$product->category->name}}</a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Product Summery End -->
<div class="col-lg-1"></div>
            </div>
        </div>

    </div>
    <!-- Single Products Section End -->

  

@section('scripts')

@endsection('scripts')

@endsection('content')