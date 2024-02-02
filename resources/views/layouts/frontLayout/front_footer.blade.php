  <!-- ========== Footer section Start ========== -->
  <div class="footer2-section section  p-lg-5 p-sm-2">
        <div class="container">
            <div class="row learts-mb-n40">
            @php
                                    
                $address = getAddress();
                                    
            @endphp
                <div class="col-lg-5 learts-mb-40">
                    <div class="widget-about">
                        <img src="{{asset('assets/images/logo/sasha_logo.png')}}" alt="" class="width_footer_logo">
                        <p>Sasha Gifts, a rapidly acclaimed name in the corporate realm, commenced its journey in 2017, swiftly earning recognition for its unparalleled services.</p>
                    </div>
                </div>

                <div class="col-lg-4 learts-mb-40">
                    <div class="row">
                        <div class="col">
                            <ul class="widget-list">
                                  <li><a href="/">Home </a></li>
                                  <li><a href="/about">About</a></li>
                                  <li><a href="/blog">Blogs</a></li>
                              
                            </ul>
                        </div>
                        <div class="col">
                            <ul class="widget-list">
                                <li><a href="/product_list">Products</a></li>
                                <li><a href="/nuhas">Nuhas</a></li>
                                <li><a href="/contact">Connect</a></li>
                         
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 learts-mb-40">
             
                        <!-- <p><i class="fas fa-map-marker fst-normal"></i> A-wing, 18/30, ground floor, Jai Ganesh Vision, Akurdi,Pune - 411035, Maharashtra, India  
                       <br> <span class="text-heading"><i class="fas fa-phone fst-normal"></i>08045802842</span></p> -->

                       <ul class="widget-list">
                        <li><i class="fas fa-map-marker-alt"></i><a href="" target="none" class="px-4">{{$address->address}}</a> </li>
                        <li><i class="fas fa-phone-alt"></i><a href="tel:+91 8045802842">{{$address->phone}}</a></li>
                      </ul>
               
                    <ul class="widget-list d-flex">
                        <li class="mt-4"> <a href="https://twitter.com/sasha_ltd"> <i class="fab fa-twitter"></i></a></li>
                        <li class="mt-4">  <a href="https://www.facebook.com/sasha.consorcio"><i class="fab fa-facebook-f"></i></a></li>
                        <li class="mt-4">  <a href="https://www.instagram.com/sasha_consorcio"><i class="fab fa-instagram"></i></a></a></li>
                        <li class="mt-4"> <a href="https://www.linkedin.com/in/sasha-consorcio-india-pvt-ltd-3391171b3"><i class="fab fa-linkedin"></i> </a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

    <div class="footer2-copyright section">
    <div class="row">
          <div class="col-12">
            <p class="rights text-center"><span>&copy;&nbsp;</span><span><?php echo date('Y'); ?></span><span>.&nbsp;</span><span>{{config('app.name')}}.</span><span> &nbsp;</span>All Rights Reserved. Design & Developed by <a href="https://ycstech.in" target="_blank">YCS TechSoft Pvt. Ltd.</a></p>
          </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="quickViewModal modal fade" id="quickViewModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button class="close" data-bs-dismiss="modal">&times;</button>
                <div class="row learts-mb-n30">

                    <!-- Product Images Start -->
                    <div class="col-lg-6 col-12 learts-mb-30">
                        <div class="product-images">
                            <div class="product-gallery-slider-quickview">
                                <div class="product-zoom" data-image="assets/images/product/single/1/product-zoom-1.webp">
                                    <img src="assets/images/product/single/1/product-1.webp" alt="">
                                </div>
                                <div class="product-zoom" data-image="assets/images/product/single/1/product-zoom-2.webp">
                                    <img src="assets/images/product/single/1/product-2.webp" alt="">
                                </div>
                                <div class="product-zoom" data-image="assets/images/product/single/1/product-zoom-3.webp">
                                    <img src="assets/images/product/single/1/product-3.webp" alt="">
                                </div>
                                <div class="product-zoom" data-image="assets/images/product/single/1/product-zoom-4.webp">
                                    <img src="assets/images/product/single/1/product-4.webp" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Product Images End -->

                    <!-- Product Summery Start -->
                    <div class="col-lg-6 col-12 overflow-hidden position-relative learts-mb-30">
                        <div class="product-summery customScroll">
                            <div class="product-ratings">
                                <span class="star-rating">
                                <span class="rating-active" style="width: 100%;">ratings</span>
                                </span>
                                <a href="#reviews" class="review-link">(<span class="count">3</span> customer reviews)</a>
                            </div>
                            <h3 class="product-title">Cleaning Dustpan & Brush</h3>
                            <div class="product-price">£38.00 – £50.00</div>
                            <div class="product-description">
                                <p>Easy clip-on handle – Hold the brush and dustpan together for storage; the dustpan edge is serrated to allow easy scraping off the hair without entanglement. High-quality bristles – no burr damage, no scratches, thick and durable, comfortable to remove dust and smaller particles.</p>
                            </div>
                            <div class="product-variations">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="label"><span>Size</span></td>
                                            <td class="value">
                                                <div class="product-sizes">
                                                    <a href="#">Large</a>
                                                    <a href="#">Medium</a>
                                                    <a href="#">Small</a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="label"><span>Color</span></td>
                                            <td class="value">
                                                <div class="product-colors">
                                                    <a href="#" data-bg-color="#000000"></a>
                                                    <a href="#" data-bg-color="#ffffff"></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="label"><span>Quantity</span></td>
                                            <td class="value">
                                                <div class="product-quantity">
                                                    <span class="qty-btn minus"><i class="ti-minus"></i></span>
                                                    <input type="text" class="input-qty" value="1">
                                                    <span class="qty-btn plus"><i class="ti-plus"></i></span>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="product-buttons">
                                <a href="#" class="btn btn-icon btn-outline-body btn-hover-dark"><i class="far fa-heart"></i></a>
                                <a href="#" class="btn btn-dark btn-outline-hover-dark"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                                <a href="#" class="btn btn-icon btn-outline-body btn-hover-dark"><i class="fas fa-random"></i></a>
                            </div>
                            <div class="product-brands">
                                <span class="title">Brands</span>
                                <div class="brands">
                                    <a href="#"><img src="assets/images/brands/brand-3.webp" alt=""></a>
                                    <a href="#"><img src="assets/images/brands/brand-8.webp" alt=""></a>
                                </div>
                            </div>
                            <div class="product-meta mb-0">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="label"><span>SKU</span></td>
                                            <td class="value">0404019</td>
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
                                        <tr>
                                            <td class="label"><span>Share on</span></td>
                                            <td class="va">
                                                <div class="product-share">
                                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                                    <a href="#"><i class="fab fa-google-plus-g"></i></a>
                                                    <a href="#"><i class="fab fa-pinterest"></i></a>
                                                    <a href="#"><i class="far fa-envelope"></i></a>
                                                </div>
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
    </div>