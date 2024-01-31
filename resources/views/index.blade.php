@extends('layouts/frontLayout/front_design')
@section('content')

@section('styles')
<style>
.logos img{
    width:75%;
    aspect-ratio:3/2;
    object-fit:contain;
    mix-blend-mode:color-burn;

}
</style>
@endsection('styles')


<!-- Slider main container Start -->
<div class="section section-fluid bg-white">
    <div class="container-fluid">
        <div class="home3-slider swiper-container">
            <div class="swiper-wrapper">
                <div class="home3-slide-item swiper-slide" data-swiper-autoplay="5000"
                    data-bg-image="assets/images/banner/home/Sasha_Banner_1.jpg">
                    <div class="container">
                        <div class="home3-slide-content">
                            <h5 class="sub-title">Curio Studio</h5>
                            <h2 class="title">Nuhas, Feel of <br>real Craftmenship</h2>
                            <div class="link"><a href="{{url('/contact')}" class="btn btn-black btn-hover-primary">Connect</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="home3-slide-item swiper-slide" data-swiper-autoplay="5000" data-bg-image="assets/images/banner/home/Sasha_Banner_2.jpg">
                        <div class="container">
                            <div class="home3-slide-content">
                                <h5 class="sub-title">Curio Studio</h5>
                                <h2 class="title">Discover the real <br>essence of gifting now</h2>
                                <div class="link"><a href="{{url('/contact')}" class="btn btn-black btn-hover-primary">Connect</a></div>
                                </divc>
                            </div>
                        </div>
                    </div>
                    <div class="home3-slide-item swiper-slide" data-swiper-autoplay="5000" data-bg-image="assets/images/slider/home3/slide-3.webp">
                        <div class="container">
                            <div class="home3-slide-content">
                                <h5 class="sub-title">Curio Studio</h5>
                                <h2 class="title">Classic gesture rendered <br>just right</h2>
                                <div class="link"><a href="{{url('/contact')}" class="btn btn-black btn-hover-primary">Connect</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="home3-slider-prev swiper-button-prev"><i class="ti-angle-left"></i></div>
                <div class="home3-slider-next swiper-button-next"><i class="ti-angle-right"></i></div>
            </div>
        </div>
    </div>
    <!-- Slider main container End -->
    <div class="section section-fluid section-padding bg-white border-top-dashed border-bottom-dashed">
        <div class="container">

            <!-- Section Title Start -->
            <div class="section-title text-center mb-4" >
                <h2 class="title title-icon-both">Trusted By..... </h2>
            </div>
            <!-- Section Title End -->

            <div class="brand-carousel logos">

                <div class="col">
                    <div class="brand-item">
                        <a href="#"><img src="assets/images/client/Army.png" alt="Brands Image"></a>
                    </div>
                </div>

                <div class="col">
                    <div class="brand-item">
                        <a href="#"><img src="assets/images/client/armacell.png" alt="Brands Image"></a>
                    </div>
                </div>

                <div class="col">
                    <div class="brand-item">
                        <a href="#"><img src="assets/images/client/Advik.png" alt="Brands Image"></a>
                    </div>
                </div>

                <div class="col">
                    <div class="brand-item">
                        <a href="#"><img src="assets/images/client/Fujitsu.png" alt="Brands Image"></a>
                    </div>
                </div>

                <div class="col">
                    <div class="brand-item">
                        <a href="#"><img src="assets/images/client/Patanjali.png" alt="Brands Image"></a>
                    </div>
                </div>

                <div class="col">
                    <div class="brand-item">
                        <a href="#"><img src="assets/images/client/ecomax.png" alt="Brands Image"></a>
                    </div>
                </div>

                <div class="col">
                    <div class="brand-item">
                        <a href="#"><img src="assets/images/client/armacell.png" alt="Brands Image"></a>
                    </div>
                </div>

                <div class="col">
                    <div class="brand-item">
                        <a href="#"><img src="assets/images/client/cavista.png" alt="Brands Image"></a>
                    </div>
                </div>
                <div class="col">
                    <div class="brand-item">
                        <a href="#"><img src="assets/images/client/Cenraur.png" alt="Brands Image"></a>
                    </div>
                </div>
                <div class="col">
                    <div class="brand-item">
                        <a href="#"><img src="assets/images/client/Fulflex.png" alt="Brands Image"></a>
                    </div>
                </div>
                <div class="col">
                    <div class="brand-item">
                        <a href="#"><img src="assets/images/client/handlco.png" alt="Brands Image"></a>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- Shop By Brands Section End -->

   <!-- Sale Banner Section Start -->
   <div class="section section-padding bg-white">
        <div class="container">

            <!-- Section Title Start -->
            <div class="section-title text-center">
                <h3 class="sub-title" data-aos="fade-up" data-aos-duration="3000">Just for you</h3>
                <h2 class="title title-icon-both" data-aos="fade-up" data-aos-duration="2000">Gifting & crafting</h2>
            </div>
            <!-- Section Title End -->

            <div class="row learts-mb-n40">

                <div class="col-lg-5 col-md-6 col-12 me-auto learts-mb-40" data-aos="fade-right" data-aos-offset="100" data-aos-easing="ease-in-sine" data-aos-duration="2000">
                    <div class="sale-banner1" data-bg-image="assets/images/sale-banner1-1.webp">
                        <div class="inner">
                            <img src="assets/images/banner/sale/sale-banner1-1.1.webp" alt="Sale Banner Icon">
                            <span class="sub-title"><h3>Sasha's Military Box:<br> Elevate Your  Adventure <br> with Strength and Style.</h3></span>
                            <!-- <h2 class="sale-percent">
                                <span class="number">40</span> % <br> off
                            </h2> -->
                            <a href="/contact" class="link">Enquire Now</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-12 learts-mb-40" data-aos="fade-left" data-aos-offset="100" data-aos-easing="ease-in-sine" data-aos-duration="2000">
                    <div class="sale-banner2">
                        <div class="inner">
                            <div class="image"><img src="assets/images/banner/gift_box.png" alt=""></div>
                            <div class="content row justify-content-between mb-n3">
                                <div class="col-auto mb-2">
                                    <!-- <h2 class="sale-percent">10% off</h2> -->
                                    <span class="text">Sasha's Adventure Awaits </span>
                                </div>
                                <div class="col-auto mb-2">
                                <div class="link"><a href="{{url('/contact')}" class="btn btn-black btn-hover-primary">Connect</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Sale Banner Section End -->



 <!-- Deal of the Day Section Start -->
 <div class="section section-fluid section-padding">
        <div class="container">
            <div class="row align-items-center learts-mb-n30">

                <div class="col-lg-6 col-12 learts-mb-30">
                    <div class="product-deal-image text-center">
                        <img src="assets/images/home/metal1.png" alt="">
                    </div>
                </div>

                <div class="col-lg-6 col-12 learts-mb-30">
                    <div class="product-deal-content">
                        <h2 class="title">Unveiling  Nuhas</h2>
                        <div class="desc">
                            <p>Seasoned craftsmanship, honed over years of dedication, transforms each creation into a masterpiece at our skilled artisan's hands. With an unwavering commitment to excellence, our focus remains unwaveringly fixed on delivering nothing short of the extraordinary in every meticulously crafted piece.</p>
                        </div>
                        <!-- <div class="countdown1" data-countdown="2024/01/01"></div> -->
                        <a href="/nuhas" class="btn btn-black btn-hover-primary">View All</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Deal of the Day Section End -->


<!-- Shop By Category Section Start -->
<div class="section section-fluid section-padding bg-white">
        <div class="container">

            <!-- Section Title Start -->
            <div class="section-title text-center">
                <h5 class="sub-title">Choose By Categories</h5>
                <h2 class="title title-icon-both">Making & crafting</h2>
            </div>
            <!-- Section Title End -->

            <div class="row row-cols-xl-5 row-cols-lg-3 row-cols-sm-2 row-cols-1 learts-mb-n40">

                <div class="col learts-mb-40">
                    <div class="category-banner5">
                        <a href="shop.html" class="inner">
                            <div class="image"><img src="assets/images/home_cat/bag.png" alt="category"></div>
                            <div class="content">
                                <h3 class="title">Laptop Backpack</h3>
                         
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col learts-mb-40">
                    <div class="category-banner5">
                        <a href="shop.html" class="inner">
                            <div class="image"><img src="assets/images/home_cat/paris.png" alt=""></div>
                            <div class="content">
                                <h3 class="title">Perfumes & Fragrances</h3>
                              
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col learts-mb-40">
                    <div class="category-banner5">
                        <a href="shop.html" class="inner">
                            <div class="image"><img src="assets/images/home_cat/bajaj.png" alt=""></div>
                            <div class="content">
                                <h3 class="title">Customized T-Shirts</h3>
                                
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col learts-mb-40">
                    <div class="category-banner5">
                        <a href="shop.html" class="inner">
                            <div class="image"><img src="assets/images/home_cat/trp.png" alt=""></div>
                            <div class="content">
                                <h3 class="title">Trophy & Accolades</h3>
                              
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col learts-mb-40">
                    <div class="category-banner5">
                        <a href="/product-list" class="inner">
                            <div class="image"><img src="assets/images/home_cat/tifin_bag.png" alt=""></div>
                            <div class="content">
                                <h3 class="title">Food Containers</h3>
                               
                            </div>
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- Shop By Category Section End -->



 <!-- Testimonial Section Start -->
 <div class="section section-padding">

        <div class="container">

            <div class="section-title2 row justify-content-between align-items-center">
                <div class="col-md-auto col-12">
                    <!-- Section Title Start -->
                    <h2 class="title title-icon-right">We love our clients</h2>
                    <!-- Section Title End -->
                </div>
               
            </div>

            <div class="testimonial-carousel">
                <div class="col">
                    <div class="testimonial">
                        <p>There's nothing would satisfy me much more than a worry-free clean and responsive theme for my high-traffic site.</p>
                        <div class="author">
                            <img src="assets/images/testimonial/testimonial-1.webp" alt="">
                            <div class="content">
                                <h6 class="name">Anais Coulon</h6>
                                <span class="title">Actor</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="testimonial">
                        <p>Really good design/documentation, pretty much everything is nicely setup. The best choice for Woocommerce shop.</p>
                        <div class="author">
                            <img src="assets/images/testimonial/testimonial-2.webp" alt="">
                            <div class="content">
                                <h6 class="name">Ian Schneider</h6>
                                <span class="title">Actor</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="testimonial">
                        <p>ThemeMove deserves 5 star for theme’s features, design quality, flexibility, customizability and support service!</p>
                        <div class="author">
                            <img src="assets/images/testimonial/testimonial-3.webp" alt="">
                            <div class="content">
                                <h6 class="name">Florence Polla</h6>
                                <span class="title">Customer</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="testimonial">
                        <p>Thanks for always keeping your WordPress themes up to date. Your level of support is second to none.</p>
                        <div class="author">
                            <img src="assets/images/testimonial/testimonial-4.webp" alt="">
                            <div class="content">
                                <h6 class="name">Sally Ramsey</h6>
                                <span class="title">Reporter</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Testimonial Section End -->


  <!-- Shop By Brands Section Start -->
  <div class="section section-fluid section-padding bg-white border-top-dashed border-bottom-dashed">
        <div class="container">

            <!-- Section Title Start -->
            <div class="section-title text-center">
                <h2 class="title title-icon-both">Pick by Brands</h2>
            </div>
            <!-- Section Title End -->

            <div class="brand-carousel logos">

                <div class="col">
                    <div class="brand-item">
                        <a href="#"><img src="assets/images/brands/Milton.png" alt="Brands Image"></a>
                    </div>
                </div>

                <div class="col">
                    <div class="brand-item">
                        <a href="#"><img src="assets/images/brands/Samsung.png" alt="Brands Image"></a>
                    </div>
                </div>
                <div class="col">
                    <div class="brand-item">
                        <a href="#"><img src="assets/images/brands/Luminarc.png" alt="Brands Image"></a>
                    </div>
                </div>

                <div class="col">
                    <div class="brand-item">
                        <a href="#"><img src="assets/images/brands/Bajaj.png" alt="Brands Image"></a>
                    </div>
                </div>

                <div class="col">
                    <div class="brand-item">
                        <a href="#"><img src="assets/images/brands/Hindustan Unilever Limited.png" alt="Brands Image"></a>
                    </div>
                </div>

                <div class="col">
                    <div class="brand-item">
                        <a href="#"><img src="assets/images/brands/Philips.png" alt="Brands Image"></a>
                    </div>
                </div>

                <div class="col">
                    <div class="brand-item">
                        <a href="#"><img src="assets/images/brands/Police.png" alt="Brands Image"></a>
                    </div>
                </div>

                <div class="col">
                    <div class="brand-item">
                        <a href="#"><img src="assets/images/brands/Puma.png" alt="Brands Image"></a>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- Shop By Brands Section End -->

@section('scripts')

@endsection('scripts')

@endsection('content')