@extends('layouts/frontLayout/front_design')
@section('content')

@section('styles')
<style>
.vertical-tabs {

    background-color: #fff;
}

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}

.bags {
    box-shadow: 0 0 30px rgba(0, 0, 0, .05);

}

.utility a {
    display: block;
    padding: 4px 16px;
    padding-left: 70px;
    text-decoration: none;
    line-height: 1.5;
    position: relative;
    display: flex;
    text-transform: none !important;
    color: #757267;
    line-height: inherit;
    font-family: "Futura", sans-serif;
    letter-spacing: 1.5px;
    font-size: "16px";
    font-weight: 400
}

/* .utility:hover {
    background-color: #555;
} */

.active {
    color: #000;
    font-weight: 500;
}
</style>
@endsection('styles')
<!-- Single Products Section Start -->
<div class="section bg-white">
    <div class="">
        <div class="sticky-sidebar-container row">
            <!-- Product Summery Start -->
            <div class="col-lg-3 col-12 learts-mb-40 bags crystal">
                <div class="product-summery sticky-sidebar">
                    <div class="sticky-sidebar-inner">

                        <div class="vertical-tabs pt-3 offcanvas-menu p-4">
                            <ul class="sub-title utility">
                                <li class="has-children">
                                    <a href="{{url('/product_detail')}}" class="active"><span class="menu-text">Food
                                            Carrier</span></a>
                                </li>
                                <li class="has-children">
                                    <a href="{{url('/product_detail')}}" class="active"><span class="menu-text">Citizen
                                            Watches</span></a>
                                </li>
                                <li><a href="{{url('/product_detail')}}"><span class="menu-text">Promotional
                                            Crystal Clock</span></a></li>
                                <li><a href="{{url('/product_detail')}}"><span class="menu-text">Promotional
                                            Mug</span></a></li>
                                <li><a href="{{url('/product_detail')}}"><span class="menu-text">Water
                                            Bottle</span></a></li>
                                <li><a href="{{url('/product_detail')}}"><span class="menu-text">Household
                                            Gift</span></a></li>
                                <li><a href="{{url('/product_detail')}}"><span class="menu-text">Home &
                                            Living </span></a></li>
                                <li><a href="{{url('/product_detail')}}"><span class="menu-text">Smart
                                            Watches</span></a></li>

                            </ul>
                        </div>





                    </div>
                </div>
            </div>


            <!-- Product Summery End -->
            <!-- Product Images Start -->
            <div class="col-lg-9 col-12 learts-mb-40">

                <div class="product-images ">
                    <div class="home5-slider swiper-container section">
                        <div class="swiper-wrapper">
                            <div class="home5-slide-item swiper-slide" data-swiper-autoplay="5000">
                                <div class="row align-items-center learts-mb-n20">
                                    <div class="home5-slide1-content col-12 learts-mb-50">
                                        <span class="sub-title">Creating memories, not just presents</span>
                                        <h2 class="title">Little simple things</h2>
                                    </div>
                                    <div class="col-12 learts-mb-20">
                                        <div class="row align-items-center learts-mb-n20">
                                            <div class="home5-slide1-image text-sm-right col-sm-7 col-12 learts-mb-20">
                                                <img src="assets/images/slider/home5/slide1-1.png"
                                                    alt="Home 5 Slider Image">
                                            </div>
                                            <div class="home5-slide1-image text-sm-right col-sm-5 col-12 learts-mb-20">
                                                <img src="assets/images/slider/home5/slide1-2.png"
                                                    alt="Home 5 Slider Image">
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>

                            <div class="home5-slide-item swiper-slide" data-swiper-autoplay="5000">
                                <div class="row align-items-center learts-mb-n20">
                                    <div class="home5-slide3-content col-12 learts-mb-50">
                                        <span class="sub-title">Live out your life</span>
                                        <h2 class="title">HANDICRAFT SHOP</h2>
                                    </div>
                                    <div class="home5-slide3-image col-12 learts-mb-20">
                                        <img src="assets/images/slider/home5/slide3-1.webp" alt="Home 5 Slider Image">
                                    </div>
                                    <!-- <div class="home5-slide-collection">NEW COLLECTION</div>
                                    <div class="home5-slide-sale">30% OFF</div>
                                    <div class="home5-slide-shop-link"><a href="shop.html">Online Store</a></div> -->
                                </div>
                            </div>
                        </div>
                        <div class="home5-slider-prev swiper-button-prev d-none"></div>
                        <div class="home5-slider-next swiper-button-next d-none"></div>
                        <div class="home5-slider-pagination swiper-pagination"></div>
                    </div>



                    <div class="section section-padding">
                        <div class="container">
                            <div class="row row-cols-xl-3 row-cols-lg-3 row-cols-sm-2 row-cols-1 learts-mb-n30">

                                <div class="col learts-mb-30">
                                    <div class="portfolio keep">
                                        <div class="thumbnail"><img src="https://cpimg.tistatic.com/05259461/b/5/extra-05259461.jpg"
                                                alt="" style="width: 300px; height: 300px; object-fit: cover;"></div>
                                        <div class="content">
                                            <h4 class="title"><a href="/product_list">Food Carrier</a>
                                            </h4>
                                            <div class="desc">
                                                <p>I made this out of brushed stainless steel. It has…</p>
                                            </div>
                                            <div class="link"><a href="/product_list">Read more</a></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col learts-mb-30">
                                    <div class="portfolio keep">
                                        <div class="thumbnail"><img src="https://cpimg.tistatic.com/07457020/b/6/extra-07457020.jpeg"
                                                alt="" style="width: 300px; height: 300px; object-fit: cover;"></div>
                                        <div class="content">
                                            <h4 class="title"><a href="/product_list">Citizen Watches</a>
                                            </h4>
                                            <div class="desc">
                                                <p>My personalized Walnut or Maple Cutting Board makes a wonderful…</p>
                                            </div>
                                            <div class="link"><a href="/product_list">Read more</a></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col learts-mb-30">
                                    <div class="portfolio keep">
                                        <div class="thumbnail"><img src="https://cpimg.tistatic.com/05203297/b/5/Promotional-Crystal-Clock.jpeg"
                                                alt="" style="width: 300px; height: 300px; object-fit: cover;"></div>
                                        <div class="content">
                                            <h4 class="title"><a href="/product_list">Promotional Crystal Clock</a></h4>
                                            <div class="desc">
                                                <p>This is made of porcelain, lead free and stain resistant.…</p>
                                            </div>
                                            <div class="link"><a href="/product_list">Read more</a></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col learts-mb-30">
                                    <div class="portfolio keep">
                                        <div class="thumbnail"><img src="https://cpimg.tistatic.com/05203306/b/5/Promotional-Mug.jpeg"
                                                alt="" style="width: 300px; height: 300px; object-fit: cover;"></div>
                                        <div class="content">
                                            <h4 class="title"><a href="/product_list">Promotional Mug</a>
                                            </h4>
                                            <div class="desc">
                                                <p>Dashing and colorful. Swirling colors ranging from reddish-tan to
                                                    deep…</p>
                                            </div>
                                            <div class="link"><a href="/product_list">Read more</a></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col learts-mb-30">
                                    <div class="portfolio keep">
                                        <div class="thumbnail"><img src="https://cpimg.tistatic.com/05203307/b/6/water-Bottle.jpeg"
                                                alt="" style="width: 300px; height: 300px; object-fit: cover;"></div>
                                        <div class="content">
                                            <h4 class="title"><a href="/product_list">Water Bottle</a></h4>
                                            <div class="desc">
                                                <p>These gorgeous hand knit cloths are perfect for so many…</p>
                                            </div>
                                            <div class="link"><a href="/product_list">Read more</a></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col learts-mb-30">
                                    <div class="portfolio keep">
                                        <div class="thumbnail"><img src="https://cpimg.tistatic.com/05259563/b/5/Household-Gift.jpeg"
                                                alt="" style="width: 300px; height: 300px; object-fit: cover;" ></div>
                                        <div class="content">
                                            <h4 class="title"><a href="/product_list">Household Gift</a>
                                            </h4>
                                            <div class="desc">
                                                <p>This vessel is a unique piece of art. It is…</p>
                                            </div>
                                            <div class="link"><a href="/product_list">Read more</a></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col learts-mb-30">
                                    <div class="portfolio keep">
                                        <div class="thumbnail"><img src="https://cpimg.tistatic.com/05385254/b/4/Home-Living.png"
                                                alt="" style="width: 300px; height: 300px; object-fit: cover;"></div>
                                        <div class="content">
                                            <h4 class="title"><a href="/product_list">Home & Living</a>
                                            </h4>
                                            <div class="desc">
                                                <p>I made this out of brushed stainless steel. It has…</p>
                                            </div>
                                            <div class="link"><a href="/product_list">Read more</a></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col learts-mb-30">
                                    <div class="portfolio keep">
                                        <div class="thumbnail"><img src="https://cpimg.tistatic.com/05385300/b/5/Smart-Watches.jpeg"
                                                alt="" style="width: 300px; height: 300px; object-fit: cover;"></div>
                                        <div class="content">
                                            <h4 class="title"><a href="/product_list">Smart Watches</a>
                                            </h4>
                                            <div class="desc">
                                                <p>My personalized Walnut or Maple Cutting Board makes a wonderful…</p>
                                            </div>
                                            <div class="link"><a href="/product_list">Read more</a></div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>

                    </div>












                    <!-- <div class="section section-padding">
                        
                        <div class="section section-fluid learts-mt-40">
                            <div class="container">
                                <div class="isotope-grid row learts-mb-n30">

                                    <div class="grid-sizer col-1"></div>

                                    <div class="grid-item col-lg-6 col-12 learts-mb-30">
                                        <div class="sale-banner7">
                                            <div class="inner">
                                                <div class="image"><img
                                                        src="assets/images/banner/sale/sale-banner7-1.webp"
                                                        alt="Sale Banner Image"></div>
                                                <div class="content">
                                    
                                                  
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    
                                    <div class="grid-item col-lg-3 col-sm-6 col-12 learts-mb-30">
                                        <div class="product portfolio">
                                            <div class="product-thumb thumbnail">
                                                <a href="product-details.html" class="image">
                                                    <img src="assets/images/product/allproduct/promotional-T-shirt.jpeg"
                                                        alt="Product Image">

                                                </a>

                                            </div>
                                            <div class="content">
                                                <h4 class="title"><a href="/product_list">Fresh Fruit
                                                        Keeper</a></h4>
                                                <div class="desc">
                                                    <p>I made this out of brushed stainless steel. It has…</p>
                                                </div>
                                                <div class="link"><a href="/product_detail">Read more</a></div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="grid-item col-lg-3 col-sm-6 col-12 learts-mb-30">
                                        <div class="product portfolio">
                                            <div class="product-thumb thumbnail">
                                                <a href="product-details.html" class="image">
                                                    <img src="assets/images/product/utility/2.png" alt="Product Image">

                                                </a>

                                            </div>
                                            <div class="content">
                                                <h4 class="title"><a href="/product_list">Fresh Fruit
                                                        Keeper</a></h4>
                                                <div class="desc">
                                                    <p>I made this out of brushed stainless steel. It has…</p>
                                                </div>
                                                <div class="link"><a href="/product_detail">Read more</a></div>
                                            </div>

                                        </div>
                                    </div>
                                  
                                    <div class="grid-item col-lg-6 col-12 learts-mb-30">
                                        <div class="sale-banner7">
                                            <div class="inner">
                                                <div class="image"><img
                                                        src="assets/images/banner/sale/sale-banner7-2.webp"
                                                        alt="Sale Banner Image"></div>
                                                <div class="content">
                                                  
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="grid-item col-lg-3 col-sm-6 col-12 learts-mb-30">
                                        <div class="product">
                                            <div class="product-thumb">
                                                <a href="product-details.html" class="image">
                                                    <img src="assets/images/product/utility/3.png" alt="Product Image">

                                                </a>

                                            </div>
                                            <div class="product2-info">
                                                <h6 class="title"><a href="product-details.html">Aluminum Equestrian</a>
                                                </h6>

                                            </div>

                                        </div>
                                    </div>

                                    <div class="grid-item col-lg-3 col-sm-6 col-12 learts-mb-30">
                                        <div class="product">
                                            <div class="product-thumb">
                                                <a href="product-details.html" class="image">
                                                    <img src="assets/images/product/utility/4.png" alt="Product Image">

                                                </a>

                                            </div>
                                            <div class="product2-info">
                                                <h6 class="title"><a href="product-details.html">Metal Wall Clock</a>
                                                </h6>

                                            </div>

                                        </div>
                                    </div>

                                    

                                </div>
                            </div>
                        </div>
                       
                    </div> -->
                </div>
              
            </div>
        </div>

    </div>
    <!-- Single Products Section End -->








    @section('scripts')

    @endsection('scripts')

    @endsection('content')