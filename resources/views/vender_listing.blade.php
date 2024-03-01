@extends('layouts/frontLayout/front_design')
@section('content')

@section('styles')

@endsection('styles')
<div class="bg-white">
    <div class="section  pt-5 pt-50 ">
        <div class="container">
            <!-- <h3 class=" mil flo"><br><span></span></h3> -->
            <h3 class="p_font_two"><span>Welcome {{ucfirst($user->vname)}} !</span></h3>

            <h3 class="p_font_one"><span>Get ready to claim your limited edition gift.</span></h3>
        </div>
    </div>
    <div class="section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-8 col-12 mx-auto">
                    <div class="about-us2">
                        <div class="inner">
                            <h4 class="title" style="font-size:30px">Your Gifting Heven</h4>
                            <h5 class="sub-title">Welcome to Sasha Studio</h5>
                            <div class="desc">
                                <p>Where every present finds its perfect match. Discover a curated selection of
                                    thoughtful treasures tailored to delight and inspire, making every moment memorable.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Category Banner Section Start -->
    <!-- <div class="section section-fluid section-padding">
        <div class="container">
          
            <div class="row">
                
                @foreach($vendorproducts as $vendorproduct)
                @if($vendorproduct->product != null)
                    <div class="col-lg-4 pb-5 ">
                        <div class="category-banner1">
                            <div class="inner">
                                <a href="{{url('/product_detail/'.encrypt($vendorproduct->product->id))}}" class="image"><img src="{{ asset('assets/admin/images/backend_images/products/large/'.$vendorproduct->product->image) }}" alt=""></a>
                                <div class="content">
                                    <h3 class="title">
                                        <a href="{{url('/product_detail/'.encrypt($vendorproduct->product->id))}}">{{$vendorproduct->product->product_name}}</a>
                                      
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div> -->
    <!-- Category Banner Section End -->
    <div class="section section-padding pt-5">
        <div class="container">
            <div class="row row-cols-lg-4 row-cols-sm-2 row-cols-1 learts-mb-n40">
                @foreach($vendorproducts as $vendorproduct)
                @if($vendorproduct->product != null)
                <div class="col learts-mb-40">
                    <div class="category-banner4">
                        <a href="{{url('/product_detail/'.encrypt($vendorproduct->product->id))}}" class="inner">
                            <div class="image">
                                <img src="{{ asset('assets/admin/images/backend_images/products/large/'.$vendorproduct->product->image) }}" alt="">
                            </div>
                            <div class="content" data-bg-color="#e8f5f2">
                                <h3 class="title">{{$vendorproduct->product->product_name}}</h3>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- <div class="col learts-mb-40">
                    <div class="category-banner4">
                        <a href="shop.html" class="inner">
                            <div class="image"><img src="assets/images/banner/category/banner-s4-2.webp" alt=""></div>
                            <div class="content" data-bg-color="#e8f5f2">
                                <h3 class="title">Home Decor</h3>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col learts-mb-40">
                    <div class="category-banner4">
                        <a href="shop.html" class="inner">
                            <div class="image"><img src="assets/images/banner/category/banner-s4-3.webp" alt=""></div>
                            <div class="content" data-bg-color="#e3e4f5">
                                <h3 class="title">Toys</h3>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col learts-mb-40">
                    <div class="category-banner4">
                        <a href="shop.html" class="inner">
                            <div class="image"><img src="assets/images/banner/category/banner-s4-4.webp" alt=""></div>
                            <div class="content" data-bg-color="#faf5e5">
                                <h3 class="title">Kitchen</h3>
                            </div>
                        </a>
                    </div>
                </div> -->
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>

@section('scripts')
@endsection('scripts')
@endsection('content')