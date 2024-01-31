@extends('layouts/frontLayout/front_design')
@section('content')

@section('styles')
<style>

</style>
@endsection('styles')

<!-- Page Title/Header Start -->
<div class="page-title-section section" data-bg-image="assets/images/bg/page-title-1.webp">
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
</div>
<!-- Page Title/Header End -->

<!-- Single Products Section Start -->
<div class="section section-padding border-bottom">
    <div class="container">
        <div class="row learts-mb-n40">

            <!-- Product Images Start -->
            <div class="col-lg-6 col-12 learts-mb-40">
                <div class="product-images">
                    <button class="product-gallery-popup hintT-left" data-hint="Click to enlarge" data-images='[
                            {"src": "assets/images/product/single/3/product-zoom-1.webp", "w": 700, "h": 1100},
                            {"src": "assets/images/product/single/3/product-zoom-2.webp", "w": 700, "h": 1100},
                            {"src": "assets/images/product/single/3/product-zoom-3.webp", "w": 700, "h": 1100},
                            {"src": "assets/images/product/single/3/product-zoom-4.webp", "w": 700, "h": 1100}
                        ]'><i class="fas fa-expand"></i></button>
                    <div class="product-gallery-slider">
                        <div class="product-zoom" data-image="assets/images/product/single/3/product-zoom-1.webp">
                            <img src="assets/images/product/single/3/product-1.webp" alt="">
                        </div>
                        <div class="product-zoom" data-image="assets/images/product/single/3/product-zoom-2.webp">
                            <img src="assets/images/product/single/3/product-2.webp" alt="">
                        </div>
                        <div class="product-zoom" data-image="assets/images/product/single/3/product-zoom-3.webp">
                            <img src="assets/images/product/single/3/product-3.webp" alt="">
                        </div>
                        <div class="product-zoom" data-image="assets/images/product/single/3/product-zoom-4.webp">
                            <img src="assets/images/product/single/3/product-4.webp" alt="">
                        </div>
                    </div>
                    <div class="product-thumb-slider">
                        <div class="item">
                            <img src="assets/images/product/single/3/product-thumb-1.webp" alt="">
                        </div>
                        <div class="item">
                            <img src="assets/images/product/single/3/product-thumb-2.webp" alt="">
                        </div>
                        <div class="item">
                            <img src="assets/images/product/single/3/product-thumb-3.webp" alt="">
                        </div>
                        <div class="item">
                            <img src="assets/images/product/single/3/product-thumb-4.webp" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product Images End -->

            <!-- Product Summery Start -->
            <div class="col-lg-6 col-12 learts-mb-40">
                <div class="product-summery">


                    <h3 class="product-title">Square Serving Platter</h3>
                    <div class="product-description">
                        <p>Square serving platter with long wooden handle makes serving an easy task. Give your
                            beautiful kitchen a touch of handcrafted modern decor by adding this square serving platter
                            with long wooden handle. The handle gives a stylish look to the platter and makes it easy to
                            hold and serve.</p>
                    </div>

                    <div class="product-buttons">
                        <a href="#" class="btn btn-dark btn-outline-hover-dark"><i class="fas fa-shopping-cart"></i>
                            Send Enquiry</a>
                    </div>

                    <div class="product-meta">
                        <table>
                            <tbody>
                                <tr>
                                    <td class="label"><span>SKU</span></td>
                                    <td class="value">040427</td>
                                </tr>
                                <tr>
                                    <td class="label"><span>Category</span></td>
                                    <td class="value">
                                        <ul class="product-category">
                                            <li><a href="#">Kitchen</a></li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label"><span>Tags</span></td>
                                    <td class="value">
                                        <ul class="product-tags">
                                            <li><a href="#">handmade</a></li>
                                            <li><a href="#">learts</a></li>
                                            <li><a href="#">mug</a></li>
                                            <li><a href="#">product</a></li>
                                            <li><a href="#">learts</a></li>
                                        </ul>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Product Summery End -->

        </div>
    </div>

</div>
<!-- Single Products Section End -->



@section('scripts')

@endsection('scripts')

@endsection('content')