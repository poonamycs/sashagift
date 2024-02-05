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
    <div class="section section-fluid section-padding border-bottom">
        <div class="container">
            <div class="row learts-mb-n40">

                <!-- Product Images Start -->
                <div class="col-lg-6 col-12 learts-mb-40">
                    <div class="product-images vertical">
                        <button class="product-gallery-popup hintT-left" data-hint="Click to enlarge" data-images='[
                                        {"src": "assets/images/nuhas/n1.jpg", "w": 810, "h": 1080},
                                        {"src": "assets/images/nuhas/n2.jpg", "w": 810, "h": 1080},
                                        {"src": "assets/images/nuhas/7.jpg", "w": 810, "h": 1080},
                                        {"src": "assets/images/nuhas/n1.jpg", "w": 810, "h": 1080},
                                        "assets/images/nuhas/n1.jpg", "w": 810, "h": 1080}
                                    ]'><i class="fas fa-expand"></i></button>
                        <!-- <a href="https://www.youtube.com/watch?v=1jSsy7DtYgc" class="product-video-popup video-popup hintT-left" data-hint="Click to see video"><i class="fas fa-play"></i></a> -->
                        <div class="product-gallery-slider">
                            <div class="product-zoom" data-image="assets/images/nuhas/n1.jpg">
                                <img src="assets/images/nuhas/n1.jpg" alt="">
                            </div>
                            <div class="product-zoom" data-image="assets/images/nuhas/n2.jpg">
                                <img src="assets/images/nuhas/n2.jpg" alt="">
                            </div>
                            <div class="product-zoom" data-image="assets/images/nuhas/7.jpeg">
                                <img src="assets/images/nuhas/7.jpeg" alt="">
                            </div>
                            <div class="product-zoom" data-image="assets/images/product/single/2/product-zoom-4.webp">
                                <img src="assets/images/product/single/2/product-4.webp" alt="">
                            </div>
                            <div class="product-zoom" data-image="assets/images/product/single/2/product-zoom-5.webp">
                                <img src="assets/images/product/single/2/product-5.webp" alt="">
                            </div>
                        </div>
                        <div class="product-thumb-slider-vertical">
                            <div class="item">
                                <img src="assets/images/nuhas/n1.jpg" alt="">
                            </div>
                            <div class="item">
                                <img src="assets/images/nuhas/n2.jpg" alt="">
                            </div>
                            <div class="item">
                                <img src="assets/images/nuhas/7.jpeg" alt="">
                            </div>
                            <div class="item">
                                <img src="assets/images/product/single/2/product-thumb-4.webp" alt="">
                            </div>
                            <div class="item">
                                <img src="assets/images/product/single/2/product-thumb-5.webp" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product Images End -->

                <!-- Product Summery Start -->
                <div class="col-lg-6 col-12 learts-mb-40">
                    <div class="product-summery product-summery-center">
                       
                       
                        <h3 class="product-title">Decorative Christmas Fox</h3>
                
                        <div class="product-description">
                            <p>From the Holiday Moments Collection This adorable brown fox looking over his right shoulder would be a wonderful accent in any holiday decor. Features faux fur, burlap and canvas creating a unique, textured appearance. The feeling when touched is smooth and lovable.</p>
                            <p>Accented with a red plaid bow and a small pine spray and pine cone Dimensions: 8″H x 8″W x 3.75″D. Material(s): foam/fabric/plastic. Available colors: Red, Blue, Green, Yellow, Black, White, Grey and Pink. Gift wrapping is available for orders over $99 to the following states: Arizona, Florida, Washington DC and Los Angeles.</p>
                        </div>
                        
                        <!-- <div class="col-12 text-center learts-mb-30"> <button class="hexa"><a href="/contact" class="">Send Enquiry</a> </button></div> -->
                           <div class="col-auto learts-mb-20"><a href="/contact" class="btn btn-md  btn-outline-secondary">Send Enquiry</a></div>
                       
                        
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