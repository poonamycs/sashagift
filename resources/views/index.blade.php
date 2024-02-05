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
@media screen(max-width:600px) {
    .logos img{
        aspct-ratio:2!important;
    }
    
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
                            <!-- <div class="link"></div> -->
                           <!-- <div class=""> <button class="border-0" data-bg-image="assets/images/sashabutton.png" style="height:40px;width:120px">     <a href="{{url('/contact')}}" class="">Connect</a> </button></div> -->
                           <!-- <button class="hexa"><a href="{{url('/contact')}}" class="">Connect</a> </button>                      -->
                           <div class="col-auto learts-mb-20"><a href="/contact" class="btn btn-md  btn-outline-secondary">Connect</a></div>

                        </div>
                     </div>
                </div>
                    <div class="home3-slide-item swiper-slide" data-swiper-autoplay="5000" data-bg-image="assets/images/banner/home/Sasha_Banner_2.jpg">
                        <div class="container">
                            <div class="home3-slide-content">
                                <h5 class="sub-title">Curio Studio</h5>
                                <h2 class="title">Discover the real <br>essence of gifting now</h2>
                                <!-- <button class="hexa"><a href="{{url('/contact')}}" class="">Connect</a> </button>                      -->
                                <div class="col-auto learts-mb-20"><a href="/contact" class="btn btn-md  btn-outline-secondary">Connect</a></div>

                            </div>
                        </div>
                      
                    </div>
                    <div class="home3-slide-item swiper-slide" data-swiper-autoplay="5000" data-bg-image="assets/images/slider/home3/slide-3.webp">
                        <div class="container">
                            <div class="home3-slide-content">
                                <h5 class="sub-title">Curio Studio</h5>
                                <h2 class="title">Classic gesture rendered <br>just right</h2>
                                <!-- <div class="link"><a href="{{url('/contact')}}" class="btn btn-black btn-hover-primary">Connect</a></div> -->
                                <!-- <button class="hexa"><a href="{{url('/contact')}}" class="">Connect</a> </button> -->
                                <div class="col-auto learts-mb-20"><a href="/contact" class="btn btn-md  btn-outline-secondary">Connect</a></div>

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
    <div class="section section-fluid section-padding bg-white section-padding-mob">
        <div class="container">

            <!-- Section Title Start -->
            <div class="section-title text-center mb-4" >
                <h2 class="title ">Trusted By </h2>
            </div>
            <!-- Section Title End -->

            <div class="brand-carousel logos">
                @foreach($trustedby as $trusted)
                    <div class="col">
                        <div class="brand-item">
                            <a href="#"><img src="{{ asset('assets/admin/images/backend_images/trustedby/'.$trusted->image) }}" alt="Brands Image"></a>
                        </div>
                    </div>
                @endforeach
                <!-- <div class="col">
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
                </div> -->

            </div>

        </div>
    </div>
    <!-- Shop By Brands Section End -->

   <!-- Sale Banner Section Start -->
   <div class="section pb-4 bg-white">
        <div class="container">

            <!-- Section Title Start -->
            <div class="section-title text-center ">
                <h3 class="sub-title" data-aos="fade-up" data-aos-duration="3000">Just for you</h3>
                <h2 class="title " data-aos="fade-up" data-aos-duration="3000">Gifting & crafting</h2>
            </div>
            <!-- Section Title End -->

            <div class="row learts-mb-n70 learts-mt-n40">

                <div class="col-lg-5 col-md-6 col-12 me-auto learts-mb-40" data-aos="fade-right" data-aos-offset="100" data-aos-easing="ease-in-sine" data-aos-duration="2000">
                    <div class="sale-banner1 elevate" data-bg-image="assets/images/sasha.svg">
                        <div class="inner">
                            <img src="assets/images/title/adv.png" alt="Sale Banner Icon">
                            <span class="sub-title"><h3>Sasha's Military Box:<br> Elevate Your  Adventure <br> with Strength and Style.</h3></span>
                            <!-- <h2 class="sale-percent">
                                <span class="number">40</span> % <br> off
                            </h2> -->
                            <a href="/contact" class="link">Enquire Now</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-12 learts-mb-40" data-aos="fade-left" data-aos-offset="100" data-aos-easing="ease-in-sine" data-aos-duration="2000">
                    <div class="sale-banner2 pt-2">
                        <div class="inner">
                            <div class="image"><img src="assets/images/banner/gift_box.png" alt=""></div>
                            <!-- <div class="content row justify-content-between mb-n3">
                                <div class="col-auto mb-2 mt-3">
                                  
                                    <span class="text">Sasha's Adventure Awaits </span>
                                </div>
                                <div class="col-auto mb-2">
                                <button class="hexa"><a href="{{url('/contact')}}" class="">Connect</a> </button>
                                </div>
                            </div> -->
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
                        <!-- <a href="/nuhas" class="btn btn-black btn-hover-primary">View All</a> -->
                        <div class="col-auto learts-mb-20"><a href="/contact" class="btn btn-md  btn-outline-secondary">Connect</a></div>
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
                <h2 class="title ">Making & crafting</h2>
            </div>
            <!-- Section Title End -->

            <div class="row row-cols-xl-5 row-cols-lg-3 row-cols-sm-2 row-cols-1 learts-mb-n40">

                <div class="col learts-mb-40">
                    <div class="category-banner5">
                        <a href="shop.html" class="inner">
                            <div class="image"><img src="assets/images/home_cat/bag.png" alt="category"></div>
                            <div class="content">
                                <h3 class="title">Laptop <br>Backpack</h3>
                         
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col learts-mb-40">
                    <div class="category-banner5">
                        <a href="shop.html" class="inner">
                            <div class="image"><img src="assets/images/home_cat/paris.png" alt=""></div>
                            <div class="content">
                                <h3 class="title">Perfumes & <br>
                                Fragrances</h3>
                              
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col learts-mb-40">
                    <div class="category-banner5">
                        <a href="shop.html" class="inner">
                            <div class="image"><img src="assets/images/home_cat/bajaj.png" alt=""></div>
                            <div class="content">
                                <h3 class="title">Customized <br>   T-Shirts</h3>
                                
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col learts-mb-40">
                    <div class="category-banner5">
                        <a href="shop.html" class="inner">
                            <div class="image"><img src="assets/images/home_cat/trp.png" alt=""></div>
                            <div class="content">
                                <h3 class="title">Trophy & <br> Accolades</h3>
                              
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col learts-mb-40">
                    <div class="category-banner5">
                        <a href="/product-list" class="inner">
                            <div class="image"><img src="assets/images/home_cat/tifin_bag.png" alt=""></div>
                            <div class="content">
                                <h3 class="title">Food <br> Containers</h3>
                               
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
  <div class="section section-fluid section-padding bg-white ">
        <div class="container">

            <!-- Section Title Start -->
            <div class="section-title text-center mb-4">
                <h2 class="title ">Pick by Brands</h2>
            </div>
            <!-- Section Title End -->

            <div class="brand-carousel logos">
                @foreach($brands as $brand)
                    <div class="col">
                        <div class="brand-item">
                            <a href="#"><img src="{{ asset('assets/admin/images/backend_images/brand/'.$brand->image) }}" alt="Brands Image"></a>
                        </div>
                    </div>
                @endforeach
                <!-- <div class="col">
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
                </div> -->

            </div>

        </div>
    </div>
    <!-- Shop By Brands Section End -->

@section('scripts')

@endsection('scripts')

@endsection('content')