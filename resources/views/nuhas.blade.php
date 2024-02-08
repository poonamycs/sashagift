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
                @foreach($products as $product)
                    <div class="col learts-mb-40">
                        <div class="category-banner4">
                            <a href="{{url('/nuhas_detail')}}" class="inner">
                                <div class="image"><img src="{{ asset('assets/admin/images/backend_images/products/large/'.$product->image) }}" alt=""></div>
                                <div class="content" data-bg-color="#f4ede7">
                                    <h3 class="title">{{$product->product_name}}</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
                
                <!-- <div class="col learts-mb-40">
                    <div class="category-banner4">
                        <a href="{{url('/nuhas_detail')}}" class="inner">
                            <div class="image"><img src="assets/images/nuhas/6.jpg" alt=""></div>
                            <div class="content" data-bg-color="#f4ede7">
                                <h3 class="title">Barrel Matka Antique Etching</h3>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col learts-mb-40">
                    <div class="category-banner4">
                        <a href="{{url('/nuhas_detail')}}" class="inner">
                            <div class="image"><img src="assets/images/nuhas/4.jpg" alt=""></div>
                            <div class="content" data-bg-color="#f4ede7">
                                <h3 class="title">Toys</h3>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col learts-mb-40">
                    <div class="category-banner4">
                        <a href="{{url('/nuhas_detail')}}" class="inner">
                            <div class="image"><img src="assets/images/nuhas/12.jpg" alt=""></div>
                            <div class="content" data-bg-color="#f4ede7">
                                <h3 class="title">Kitchen</h3>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col learts-mb-40">
                    <div class="category-banner4">
                        <a href="{{url('/nuhas_detail')}}" class="inner">
                            <div class="image"><img src="assets/images/nuhas/14.jpg" alt=""></div>
                            <div class="content" data-bg-color="#f4ede7">
                                <h3 class="title">Kitchen</h3>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col learts-mb-40">
                    <div class="category-banner4">
                        <a href="{{url('/nuhas_detail')}}" class="inner">
                            <div class="image"><img src="assets/images/nuhas/22.jpg" alt=""></div>
                            <div class="content" data-bg-color="#f4ede7">
                                <h3 class="title">Kitchen</h3>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col learts-mb-40">
                    <div class="category-banner4">
                        <a href="{{url('/nuhas_detail')}}" class="inner">
                            <div class="image"><img src="assets/images/nuhas/15.jpg" alt=""></div>
                            <div class="content" data-bg-color="#f4ede7">
                                <h3 class="title">Kitchen</h3>
                            </div>
                        </a>
                    </div>
                </div>
                    <div class="col learts-mb-40">
                        <div class="category-banner4">
                            <a href="{{url('/nuhas_detail')}}" class="inner">
                                <div class="image"><img src="assets/images/nuhas/23.jpg" alt=""></div>
                                <div class="content" data-bg-color="#f4ede7">
                                    <h3 class="title">Kitchen</h3>
                                </div>
                            </a>
                        </div>
                    </div> -->

            </div>
            {{ $products->links() }}
        </div>
    </div>


    
    <!-- Shop Products Section Start -->
    <!-- <div class="section section-padding pt-0 bg-white">

        
      

        <div class="section learts-mt-70">
            <div class="container">
                <div class="row learts-mb-n50">

                    <div class="col-lg-12 col-12 learts-mb-50">
                     
                        <div id="shop-products" class="products isotope-grid row row-cols-xl-4 row-cols-md-3 row-cols-sm-2 row-cols-1">

                            <div class="grid-sizer col-1"></div>

                            <div class="grid-item col featured">
                                <div class="product">
                                    <div class="product-thumb">
                                        <a href="product-details.html" class="image">
                                            <img src="assets/images/nuhas/1.jpg" alt="Product Image">
                                            <img class="image-hover " src="assets/images/nuhas/2.jpg" alt="Product Image">
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="title"><a href="product-details.html">3D Attractive Pot</a></h6>
                                       
                                    </div>
                                </div>
                            </div>

                            <div class="grid-item col new">
                                <div class="product">
                                    <div class="product-thumb">
                                        <a href="product-details.html" class="image">
                                           
                                            <img src="assets/images/nuhas/12.jpg" alt="Product Image">
                                            <img class="image-hover " src="assets/images/nuhas/10.jpg" alt="Product Image">
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="title"><a href="product-details.html">Abstract Folded Pots</a></h6>
                                       
                                       
                                    </div>
                                </div>
                            </div>

                            <div class="grid-item col featured">
                                <div class="product">
                                    <div class="product-thumb">
                                       
                                        <a href="product-details.html" class="image">
                                            <img src="assets/images/nuhas/4.jpg" alt="Product Image">
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="title"><a href="product-details.html">Adhesive Tape Dispenser</a></h6>
                                        
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="grid-item col featured">
                                <div class="product">
                                    <div class="product-thumb">
                                        <a href="product-details.html" class="image">
                                            <img src="assets/images/nuhas/6.jpg" alt="Product Image">
                                            <img class="image-hover " src="assets/images/product/s328/product-9-hover.webp" alt="Product Image">
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="title"><a href="product-details.html">Aluminum Equestrian</a></h6>
                                        
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="grid-item col sales featured">
                                <div class="product">
                                    <div class="product-thumb">
                                        <a href="product-details.html" class="image">
                                            
                                            <img src="assets/images/nuhas/14.jpg" alt="Product Image">
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="title"><a href="product-details.html">Antique Sewing Scissors</a></h6>
                                       
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="grid-item col sales featured">
                                <div class="product">
                                    <div class="product-thumb">
                                        <a href="product-details.html" class="image">
                                           
                                            <img src="assets/images/nuhas/15.jpg" alt="Product Image">
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="title"><a href="product-details.html">Antique Sewing Scissors</a></h6>
                                       
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="grid-item col sales featured">
                                <div class="product">
                                    <div class="product-thumb">
                                        <a href="product-details.html" class="image">
                                           
                                            <img src="assets/images/nuhas/22.jpg" alt="Product Image">
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="title"><a href="product-details.html">Antique Sewing Scissors</a></h6>
                                       
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="grid-item col sales featured">
                                <div class="product">
                                    <div class="product-thumb">
                                        <a href="product-details.html" class="image">
                                           
                                            <img src="assets/images/nuhas/23.jpg" alt="Product Image">
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="title"><a href="product-details.html">Antique Sewing Scissors</a></h6>
                                       
                                        
                                    </div>
                                </div>
                            </div>

                           

                          
                        </div>
                       
                    </div>

                   

                </div>
            </div>
        </div>

    </div> -->
    <!-- Shop Products Section End -->

    
    
    <!-- Category Banner Section End -->

@section('scripts')

@endsection('scripts')

@endsection('content')