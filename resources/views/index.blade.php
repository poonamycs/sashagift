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
                @foreach($banners as $banner)
                    <div class="home3-slide-item swiper-slide" data-swiper-autoplay="5000"
                        data-bg-image="{{ asset('/assets/admin/images/frontend_images/banners/'.$banner->image) }}">
                        <div class="container">
                            <div class="home3-slide-content">
                         
                                <h5 class="sub-title just_for">{!! $banner->title !!}</h5>
                                <h2 class="title p_font_two"> {!! $banner->description !!}</h2>
                                <!-- <div class="link"></div> -->
                            <!-- <div class=""> <button class="border-0" data-bg-image="assets/images/sashabutton.png" style="height:40px;width:120px">     <a href="{{url('/contact')}}" class="">Connect</a> </button></div> -->
                            <!-- <button class="hexa"><a href="{{url('/contact')}}" class="">Connect</a> </button>                      -->
                            <div class="col-auto learts-mb-20"><a href="/contact" class="btn btn-md  btn-outline-secondary">Connect</a></div>

                            </div>
                        </div>
                    </div>
                @endforeach
                    <!-- <div class="home3-slide-item swiper-slide" data-swiper-autoplay="5000" data-bg-image="assets/images/banner/home/Sasha_Banner_2.jpg">
                        <div class="container">
                            <div class="home3-slide-content">
                                <h5 class="sub-title">Curio Studio</h5>
                                <h2 class="title">Discover the real <br>essence of gifting now</h2> -->
                                <!-- <button class="hexa"><a href="{{url('/contact')}}" class="">Connect</a> </button>                      -->
                                <!-- <div class="col-auto learts-mb-20"><a href="/contact" class="btn btn-md  btn-outline-secondary">Connect</a></div>

                            </div>
                        </div>
                      
                    </div>
                    <div class="home3-slide-item swiper-slide" data-swiper-autoplay="5000" data-bg-image="assets/images/slider/home3/slide-3.webp">
                        <div class="container">
                            <div class="home3-slide-content">
                                <h5 class="sub-title">Curio Studio</h5>
                                <h2 class="title">Classic gesture rendered <br>just right</h2> -->
                                <!-- <div class="link"><a href="{{url('/contact')}}" class="btn btn-black btn-hover-primary">Connect</a></div> -->
                                <!-- <button class="hexa"><a href="{{url('/contact')}}" class="">Connect</a> </button> -->
                                <!-- <div class="col-auto learts-mb-20"><a href="/contact" class="btn btn-md  btn-outline-secondary">Connect</a></div>

                            </div>

                        </div>
                    </div> -->
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
                <h2 class="title p_font_two">Trusted By </h2>
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
                <h3 class="sub-title just just_for" data-aos="fade-up" data-aos-duration="3000">Just for you</h3>
                <h2 class="title p_font_two" data-aos="fade-up" data-aos-duration="3000">Gifting & Crafting</h2>
            </div>
            <!-- Section Title End -->

            <div class="row learts-mb-n70 learts-mt-n40">

                <div class="col-lg-5 col-md-6 col-12 me-auto learts-mb-40" data-aos="fade-up" data-aos-offset="100" data-aos-easing="ease-in-sine" data-aos-duration="1000">
                    <div class="sale-banner1 elevate" data-bg-image="assets/images/sasha.svg">
                        <div class="inner">
                            <img src="assets/images/title/adv.png" alt="Sale Banner Icon">
                            <span class="sub-title "><h3 class="mil">Sasha's Army Hamper:<br> Elevate Your  Adventure <br> with Strength and Style.</h3></span>
                            <!-- <h2 class="sale-percent">
                                <span class="number">40</span> % <br> off
                            </h2> -->
                            <a href="/contact" class="link pt-3">Enquire Now</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-12 learts-mb-40" data-aos="fade-up" data-aos-offset="100" data-aos-easing="ease-in-sine" data-aos-duration="1000">
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
                        <h2 class="title p_font_two">  Nuhas</h2>
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
    <div class="section section-padding pt-5 bg-white">
        <div class="container">
            <div class="row row-cols-lg-2 row-cols-1 learts-mb-n30">

                <div class="col learts-mb-30">
                    <div class="sale-banner8">
                        <img src="assets/images/banner/sale/oranger_bg (1).png" alt="Sale Banner Image">
                        <div class="content">
                            <h2 class="title">Gift Basket </h2>
                            <!-- <a href="#" class="link">shop now</a> -->
                        </div>
                    </div>
                </div>

                <div class="col learts-mb-30">
                    <div class="sale-banner8">
                        <img src="assets/images/banner/sale/oranger_bg (2).png" alt="Sale Banner Image">
                        <div class="content">
                            <h2 class="title">Welcome <br> Gifts</h2>
                            <!-- <a href="#" class="link">shop now</a> -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

<!-- Shop By Category Section Start -->
<div class="section section-fluid section-padding ">
        <div class="container">

            <!-- Section Title Start -->
            <div class="section-title text-center">
                <h5 class="sub-title just just_for ">Choose By Categories</h5>
                <h2 class="title p_font_two">Making & Crafting</h2>
            </div>
            <!-- Section Title End -->

            <!-- <div class="row row-cols-xl-5 row-cols-lg-3 row-cols-sm-2 row-cols-1 learts-mb-n40"> -->
            <div class="product-carousel">
                @foreach($categories as $category)
                
                <div class="col learts-mb-40">
                    <div class="category-banner5">
                        <a href="shop.html" class="inner">
                            <div class="image"><img src="{{ asset('assets/admin/images/frontend_images/category/'.$category->image) }}" alt="category"></div>
                            <div class="content">
                                <h3 class="title">{{$category->name}}</h3>
                         
                            </div>
                        </a>
                    </div>
                    </div>
              
                @endforeach
                </div>
                <!-- <div class="col learts-mb-40">
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
                </div> -->

            <!-- </div> -->

        </div>
    </div>
    <!-- Shop By Category Section End -->



 <!-- Testimonial Section Start -->
 <div class="section section-padding bg-white">

        <div class="container">

            <div class="section-title2 row justify-content-between align-items-center">
                <div class="col-md-auto col-12">
                    <!-- Section Title Start -->
                    <h2 class="title title-icon-right p_font_two">We love our clients</h2>
                    <!-- Section Title End -->
                </div>
               
            </div>

            <div class="testimonial-carousel">
                @foreach($testimonials as $testimonial)
                <div class="col">
                    <div class="testimonial">
                        <p>{{strip_tags($testimonial->content)}}</p>
                        <div class="author">
                            <img src="{{ asset('assets/admin/images/backend_images/testimonials/'.$testimonial->image) }}" alt="">
                            <div class="content">
                                <h6 class="name">{{$testimonial->name}}</h6>
                                <span class="title">{{$testimonial->position}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- <div class="col">
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
                </div> -->
            </div>

        </div>
    </div>
    <!-- Testimonial Section End -->


  <!-- Shop By Brands Section Start -->
  <div class="section section-fluid section-padding bg-white ">
        <div class="container">

            <!-- Section Title Start -->
            <div class="section-title text-center mb-4">
                <h2 class="title p_font_two">Pick by Brands</h2>
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


    <div class="section section-fluid  bg-white ">
    <div class="post-grid">
  <div class="post">
    <div class="thumb-item">
      <img src="https://img.freepik.com/premium-photo/diwali-platter-with-sweetmeats_808062-22.jpg?w=740" alt="alt">
      <img src="https://img.freepik.com/free-photo/gifts-near-box-with-macaroons-flowers_23-2147931536.jpg?t=st=1709551781~exp=1709555381~hmac=5d147e355a003afee970329ef0ffb76df801c5bd1d7cdb7707e64166ab44b29f&w=740" alt="alt">
      <img src="https://img.freepik.com/free-photo/peeled-walnuts-brown-bowl-dark-table_176474-5496.jpg?t=st=1709551820~exp=1709555420~hmac=fc88d5c6ebae0737a2bce25a63ccde492aedc81ded2c8b4a081e7ec43f96b907&w=740" alt="alt">
    </div>
    <div class="title p_font_two">Dry Fruit</div>
    <!-- <div class="text">
      <p>Is it possible to come up with something really unusual when designing a bedroom in an elite style? Can! And we are ready to explain it</p>
    </div> -->
  </div>
  <div class="post">
    <div class="thumb-item">
      <img src="https://img.freepik.com/premium-photo/flat-lay-with-woman-staff_259348-19318.jpg?w=740" alt="alt">
      <img src="https://img.freepik.com/premium-photo/black-orange-stylish-leather-purse-driver-s-license-passport-id-card-documents-cover_549949-391.jpg?w=740" alt="alt">
      <img src="https://img.freepik.com/free-photo/opened-notebook-near-smartphone-glasses_23-2147768857.jpg?t=st=1709551961~exp=1709555561~hmac=80dbf3d5d65c868437b04310df7d9aed62b32a83769fcc26f8da9edcd22f433a&w=740" alt="alt">
      <img src="https://img.freepik.com/premium-photo/flat-lay-modern-group-stationery-elements-with-pencil-case-stainless-steel-bottle-pencils_156165-34.jpg?w=740" alt="alt">
    </div>
    <div class="title p_font_two">Joining Kit</div>
    <!-- <div class="text">
      <p>What is important to think about for healthy sleep? How to arrange a rest room? Today we will tell you everything about the current trends in the world of bedroom design.</p>
    </div> -->
  </div>
  <div class="post">
    <div class="thumb-item">
   
      <img src="https://img.freepik.com/free-photo/top-view-grinder-cooking-spices_23-2148601231.jpg?t=st=1709552203~exp=1709555803~hmac=3ab40495f236eeb35b6ce1a6b98a866f6645f4b0bdd0763c2ac7d474120efb23&w=740" alt="alt">
      <img src="https://img.freepik.com/premium-photo/plastic-bottle-water-isolated-white-background_743855-48333.jpg?w=740" alt="alt">
      <img src="https://img.freepik.com/premium-photo/bronze-bowl-isolated-white-background_900706-23610.jpg?w=740" alt="alt">
    </div>
    <div class="title p_font_two">Nuhas</div>
    <!-- <div class="text">
      <p>True, it is important that in addition to white, brighter accent shades are present in the room. Luckily this color goes well together.</p>
    </div> -->
  </div>
</div>
</div>




@section('scripts')

@endsection('scripts')

      <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js'></script>

<script>
    (function ($) {
  $.fn.hoverCarousel = function () {
    return this.addClass("hover-daddy")
      .append("<div class='tmb-wrap'><div class='tmb-wrap-table'>")
      .append("<div class='image-wrap'>")
      .each(function () {
        var this_wrapper = $(this);
        this_wrapper
          .find("img")
          .appendTo(this_wrapper.find(".image-wrap"))
          .each(function () {
            var this_link = $(this).attr("src");
            this_wrapper
              .find(".tmb-wrap-table")
              .append(
                "<a href='" + this_link + "' data-fancybox-item class='item'>"
              );
          });
      })
      .find(".tmb-wrap-table")
      .bind("touchmove", function (event) {
        event.preventDefault();
        var myLocation = event.originalEvent.changedTouches[0];
        var realTarget = document.elementFromPoint(
          myLocation.clientX,
          myLocation.clientY
        );
        var this_img = $(realTarget)
          .parent(".tmb-wrap-table")
          .closest(".hover-daddy")
          .find("img");
        var all_thmbs = $(realTarget).parent(".tmb-wrap-table").find("a");
        this_img.hide().eq($(realTarget).index()).css("display", "block");
        all_thmbs.removeClass("active");
        $(realTarget).addClass("active");
      })
      .find("a")
      .hover(function () {
        var this_img = $(this)
          .parent(".tmb-wrap-table")
          .closest(".hover-daddy")
          .find("img");
        var all_thmbs = $(this).parent(".tmb-wrap-table").find("a");

        this_img.hide().eq($(this).index()).css("display", "block");
        all_thmbs.removeClass("active");
        $(this).addClass("active");
      })
      .parent()
      .find(":first")
      .addClass("active");
  };
})(jQuery);

$("[data-fancybox-item]").fancybox({
  transitionEffect: "fade",
  animationEffect: false,
  clickContent: false,
  touch: true,
  loop: true,
  selector: ".item",
  backFocus: false,
  hideScrollbar: false,
  buttons: ["zoom", "fullScreen", "close"]
});

$(".thumb-item")
  .find("img")
  .each(function () {
    var img_link = $(this).attr("src");
    $(this).wrap("<a href='" + img_link + "' data-fancybox-item class='item'>");
  });

$(".thumb-item").hoverCarousel();

</script>

@endsection('content')