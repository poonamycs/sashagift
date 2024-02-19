@php
$url = url()->current();
$rootUrl = url('/');
@endphp
 <!-- Topbar Section Start -->
 <div class="topbar-section section section-fluid">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-auto col-12">
                    <p class="text-center text-md-left my-2">Where Every Package Speaks Trust !</p>
                </div>
                <div class="col-auto d-none d-md-block">
                    <div class="topbar-menu d-flex flex-row-reverse">
                        <ul>
                            <li>Elegant</li>
                            <li>Innovative</li>
                            <li>Classic</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar Section End -->
<!-- Header Section Start For Main Navbar -->
<div class="header-section section section-fluid bg-white d-none d-xl-block">
    <div class="container">
        <div class="row align-items-center">

            <!-- Header Logo Start -->
            <div class="col-auto">
                <div class="header-logo">
                    <a href="{{url('/')}}"><img src="{{asset('assets/images/logo/sasha_logo.png')}}" alt="Learts Logo"
                            class="logo_width"></a>
                </div>
            </div>
            <!-- Header Logo End -->

            <!-- Search Start -->
            <div class="col-auto me-auto">
                <nav class="site-main-menu site-main-menu-left menu-height-100 justify-content-center">
                    <ul>
                        <li class="nav-item @if(preg_match(" /about/i", $url)) active @endif"><a
                                href="{{url('/about')}}"><span class="menu-text">About</span></a>

                        </li>
                        <li class="has-children"><a href="#"><span class="menu-text">Products</span></a>
                            <ul class="sub-menu">
                                @foreach(get_all_menu_category() as $key => $category)
                             
                                
                                    @php
                                        $products = App\Models\Product::where('category_id',$category->id)->get();
                                    @endphp
                                    @php
                                        $email = Session::get('vendorSession');
                                        if($email != null)
                                        {
                                            $user = App\Models\Admin::where('email',$email)->first();
                                            $vendorproduct = App\Models\VendorProduct::where('vendor_id',$user->id)->get();
                                        }
                                        else
                                        {
                                            $user = null;
                                        }
                                    @endphp
                                    <li class="has-children"><a href="{{url('/product_list/'.encrypt($category->id))}}">
                                        <span class="menu-text">{{$category->name}}</span></a>
                                            @if($user != null)
                                                
                                                @if(!$vendorproduct->isempty())
                                                
                                                    @foreach($vendorproduct as $product)
                                                        @if($product->product->category_id != '1' && $product->product->category_id == $category->id)
                                                        <ul class="sub-menu">
                                                            <li>
                                                                <a href="{{url('/product_detail/'.encrypt($product->product->id))}}">
                                                                    <span class="menu-text">{{$product->product->product_name}}</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        @endif
                                                    @endforeach
                                                
                                                @else
                                                    <span>No record Found</span>
                                                @endif  
                                               
                                            @else
                                            @if(!$products->isempty())
                                                <ul class="sub-menu">
                                                    @foreach($products as $product)
                                                        <li><a href="{{url('/product_detail/'.encrypt($product->id))}}"><span class="menu-text">{{$product->product_name}}</span></a></li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                            @endif
                                    </li>
                                @endforeach
                                
                            </ul>
                        </li>

                        <?php $nuhas_products = App\Models\product::where('category_id',1)->get();
                            if($user != null)
                            {
                                $nuhasvendorproducts = App\Models\VendorProduct::where('vendor_id',$user->id)->get();
                            }
                              
                        ?>
                       
                        <li class="has-children"><a href="{{url('/nuhas')}}"><span class="menu-text">{{get_nuhas_category()->name}}</span></a>
                            @if($user != null)  
                                @if(!$nuhas_products->isempty())
                                    @foreach($nuhas_products as $product)
                                        @php 
                                            $vendornproduct = App\Models\VendorProduct::where('product_id',$product->id)->where('vendor_id',$user->id)->get();
                                        @endphp
                                        <ul class="sub-menu mega-menu">
                                            <?php $chunks = $vendornproduct->chunk(7);?>
                                            @foreach($chunks as $nproduct)
                                            
                                                <li>
                                                    <ul>   
                                                        @foreach($nproduct as $nuhas)
                                                        
                                                            <li><a href="{{url('/nuhas_detail/'.encrypt($nuhas->product->id))}}"><span class="menu-text">{{$nuhas->product->product_name}}</span></a></li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @endforeach
                                            
                                            <!-- <li>
                                                <ul>
                                                    
                                                    <img src="assets/images/nuhas/main_menu.jpg" alt="menu">

                                                </ul>
                                            </li> -->
                                        </ul>
                                        
                                    @endforeach
                                    @endif
                                
                            @else
                            <ul class="sub-menu mega-menu">
                                <?php $chunks = $nuhas_products->chunk(7); ?>
                                @foreach($chunks as $nuhas_product)
                                    <li>
                                        <ul>   
                                            @foreach($nuhas_product as $nuhas)
                                                <li><a href="{{url('/nuhas_detail/'.encrypt($nuhas->id))}}"><span class="menu-text">{{$nuhas->product_name}}</span></a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                                
                                <li>
                                    <ul>
                                        
                                        <img src="assets/images/nuhas/main_menu.jpg" alt="menu">

                                    </ul>
                                </li>
                            </ul>
                            @endif
                        </li>
                        <li class="nav-item @if(preg_match(" /blog/i", $url)) active @endif"><a href="{{url('/blog')}}"><span class="menu-text">Blogs</span></a>

                        </li>
                        <li class="nav-item @if(preg_match(" /contact/i", $url)) active @endif"><a href="{{url('/contact')}}"><span class="menu-text">Connect</span></a>

                        </li>
                    </ul>
                </nav>
            </div>
            <!-- Search End -->

            <!-- Search Start -->
            <div class="col-auto d-none d-xl-block">
                <div class="header2-search">
                    <form action="#">
                        <input type="text" placeholder="Search...">
                        <button class="btn"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>
            <!-- Search End -->

            <!-- Header Tools Start -->
            @php 
                $email = Session::get('vendorSession');
                if($email != null)
                {
                    $user = App\Models\Admin::where('email',$email)->first();
                }
                else
                {
                    $user = null;
                }
            @endphp
            <div class="col-auto">
                <div class="header-tools justify-content-end">
                @if($user != null)
                    <div class="header-login">
                        <a href="{{url('user/logout')}}"><i class="fa fa-power-off"></i></a>
                    </div>
                @else
                    <div class="header-login">
                        <a href="{{url('/user_login')}}"><i class="far fa-user"></i></a>
                    </div>
                @endif
                    <div class="header-cart">
                        <a href="#offcanvas-cart" class="offcanvas-toggle"><i class="fa fa-envelope-o" ></i></a>
                    </div>
                </div>
            </div>
            <!-- Header Tools End -->

        </div>
    </div>

</div>
<!-- Header Section End -->

<!-- Header Section Start For Sticky Navbar-->
<div class="sticky-header section bg-white section-fluid d-none d-xl-block">
    <div class="container">
        <div class="row align-items-center">

            <!-- Header Logo Start -->
            <div class="col-xl-auto col">
                <div class="header-logo">
                    <a href="{{url('/')}}"><img src="{{asset('assets/images/logo/sasha_logo.png')}}" alt="Learts Logo"
                            class="logo_width"></a>
                </div>
            </div>
            <!-- Header Logo End -->

            <!-- Search Start -->
            <div class="col-auto me-auto d-none d-xl-block">
                <nav class="site-main-menu site-main-menu-left justify-content-center">
                <ul>
                        <li class="nav-item @if(preg_match(" /about/i", $url)) active @endif"><a
                                href="{{url('/about')}}"><span class="menu-text">About</span></a>

                        </li>
                        <li class="has-children"><a href="#"><span class="menu-text">Products</span></a>
                            <ul class="sub-menu">
                                @foreach(get_all_menu_category() as $key => $category)
                             
                                
                                    @php
                                        $products = App\Models\Product::where('category_id',$category->id)->get();
                                    @endphp
                                    <li class="has-children"><a href="{{url('/product_list/'.encrypt($category->id))}}"><span
                                                class="menu-text">{{$category->name}}</span></a>
                                           
                                            @if(!$products->isempty())
                                                <ul class="sub-menu">
                                                    @foreach($products as $product)
                                                            <li><a href="{{url('/product_detail/'.encrypt($product->id))}}"><span class="menu-text">{{$product->product_name}}</span></a></li>
                                                    @endforeach
                                                </ul>
                                           
                                            @endif
                                    </li>
                                @endforeach
                                
                            </ul>
                        </li>
                        <?php $nuhas_products = App\Models\product::where('category_id',1)->get(); ?>
                       
                        <li class="has-children"><a href="{{url('/nuhas')}}"><span class="menu-text">{{get_nuhas_category()->name}}</span></a>
                                <ul class="sub-menu mega-menu">
                                    <?php $chunks = $nuhas_products->chunk(7); ?>
                                    @foreach($chunks as $nuhas_product)
                                        <li>
                                            <ul>   
                                                @foreach($nuhas_product as $nuhas)
                                                    <li><a href="{{url('/nuhas_detail/'.encrypt($nuhas->id))}}"><span class="menu-text">{{$nuhas->product_name}}</span></a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                    
                                    <li>
                                        <ul>
                                            
                                            <img src="assets/images/nuhas/main_menu.jpg" alt="menu">

                                        </ul>
                                    </li>
                                </ul>
                        </li>
                        <li class="nav-item @if(preg_match(" /blog/i", $url)) active @endif"><a href="{{url('/blog')}}"><span class="menu-text">Blogs</span></a>

                        </li>
                        <li class="nav-item @if(preg_match(" /contact/i", $url)) active @endif"><a href="{{url('/contact')}}"><span class="menu-text">Connect</span></a>

                        </li>
                    </ul>
                </nav>
            </div>
            <!-- Search End -->

            <!-- Search Start -->
            <div class="col-auto d-none d-xl-block">
                <div class="header2-search">
                    <form action="#">
                        <input type="text" placeholder="Search...">
                        <button class="btn"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>
            <!-- Search End -->

            <!-- Header Tools Start -->
            <div class="col-auto">
                <div class="header-tools justify-content-end">
                <div class="header-login  d-none d-sm-block">
                        <a href="{{url('/')}}"><i class="fa fa-power-off"></i></a>
                    </div>
                    <div class="header-login d-none d-sm-block">
                        <a href="{{url('/user_login')}}"><i class="far fa-user"></i></a>
                    </div>

                    <div class="header-search d-none d-sm-block d-xl-none">
                        <a href="#offcanvas-search" class="offcanvas-toggle"><i class="fas fa-search"></i></a>
                    </div>

                    <div class="header-cart">
                        <a href="#offcanvas-cart" class="offcanvas-toggle"><i class="fa fa-envelope-o" ></i></a>
                    </div>
                    <div class="mobile-menu-toggle d-xl-none">
                        <a href="#" class="offcanvas-toggle">
                            <svg viewBox="0 0 800 600">
                                <path
                                    d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200"
                                    class="top"></path>
                                <path d="M300,320 L540,320" class="middle"></path>
                                <path
                                    d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190"
                                    class="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) ">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Header Tools End -->

        </div>
    </div>

</div>
<!-- Header Section End -->
<!-- Mobile Header Section Start -->
<div class="mobile-header bg-white section d-xl-none">
    <div class="container">
        <div class="row align-items-center">

            <!-- Header Logo Start -->
            <div class="col">
                <div class="header-logo">
                    <a href="{{url('/')}}"><img src="{{asset('assets/images/logo/sasha_logo.png')}}" alt="Learts Logo"
                            class="logo_width"></a>
                </div>
            </div>
            <!-- Header Logo End -->

            <!-- Header Tools Start -->
            <div class="col-auto">
                <div class="header-tools justify-content-end">
                    <div class="header-login d-none d-sm-block">
                        <a href="my-account.html"><i class="far fa-user"></i></a>
                    </div>
                    <div class="header-search d-none d-sm-block">
                        <a href="#offcanvas-search" class="offcanvas-toggle"><i class="fas fa-search"></i></a>
                    </div>

                    <div class="header-cart">
                        <a href="#offcanvas-cart" class="offcanvas-toggle"><i class="fas fa-inbox"></i></a>
                    </div>
                    <div class="mobile-menu-toggle">
                        <a href="#offcanvas-mobile-menu" class="offcanvas-toggle">
                            <svg viewBox="0 0 800 600">
                                <path
                                    d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200"
                                    class="top"></path>
                                <path d="M300,320 L540,320" class="middle"></path>
                                <path
                                    d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190"
                                    class="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) ">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Header Tools End -->

        </div>
    </div>
</div>
<!-- Mobile Header Section End -->

<!-- Mobile Header Section Start -->
<div class="mobile-header sticky-header bg-white section d-xl-none">
    <div class="container">
        <div class="row align-items-center">

            <!-- Header Logo Start -->
            <div class="col">
                <div class="header-logo">
                    <a href="{{url('/')}}"><img src="assets/images/logo/sasha_logo.png" alt="Learts Logo"></a>
                </div>
            </div>
            <!-- Header Logo End -->

            <!-- Header Tools Start -->
            <div class="col-auto">
                <div class="header-tools justify-content-end">
                    <div class="header-login d-none d-sm-block">
                        <a href="my-account.html"><i class="far fa-user"></i></a>
                    </div>
                    <div class="header-search d-none d-sm-block">
                        <a href="#offcanvas-search" class="offcanvas-toggle"><i class="fas fa-search"></i></a>
                    </div>

                    <div class="header-cart">
                        <a href="#offcanvas-cart" class="offcanvas-toggle"><i class="fas fa-inbox"></i></a>
                    </div>
                    <div class="mobile-menu-toggle">
                        <a href="#offcanvas-mobile-menu" class="offcanvas-toggle">
                            <svg viewBox="0 0 800 600">
                                <path
                                    d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200"
                                    class="top"></path>
                                <path d="M300,320 L540,320" class="middle"></path>
                                <path
                                    d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190"
                                    class="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) ">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Header Tools End -->

        </div>
    </div>
</div>
<!-- Mobile Header Section End -->
<!-- OffCanvas Search Start -->
<div id="offcanvas-search" class="offcanvas offcanvas-search">
    <div class="inner">
        <div class="offcanvas-search-form">
            <button class="offcanvas-close">×</button>
            <form action="#">
                <div class="row mb-n3">
                    <div class="col-lg-8 col-12 mb-3"><input type="text" placeholder="Search Products..."></div>
                    <div class="col-lg-4 col-12 mb-3">
                        <select class="search-select select2-basic">
                            <option value="0">All Categories</option>
                            <option value="kids-babies">Kids &amp; Babies</option>
                            <option value="home-decor">Home Decor</option>
                            <option value="gift-ideas">Gift ideas</option>
                            <option value="kitchen">Kitchen</option>
                            <option value="toys">Toys</option>
                            <option value="kniting-sewing">Kniting &amp; Sewing</option>
                            <option value="pots">Pots</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
        <p class="search-description text-body-light mt-2"> <span># Type at least 1 character to search</span> <span>#
                Hit enter to search or ESC to close</span></p>

    </div>
</div>
<!-- OffCanvas Search End -->

<!-- OffCanvas Wishlist Start -->
<div id="offcanvas-wishlist" class="offcanvas offcanvas-wishlist">
    <div class="inner">
        <div class="head">
            <span class="title">Wishlist</span>
            <button class="offcanvas-close">×</button>
        </div>
        <div class="body customScroll">
            <ul class="minicart-product-list">
                <li>
                    <a href="product-details.html" class="image"><img src="assets/images/product/cart-product-1.webp"
                            alt="Cart product Image"></a>
                    <div class="content">
                        <a href="product-details.html" class="title">Walnut Cutting Board</a>
                        <span class="quantity-price">1 x <span class="amount">$100.00</span></span>
                        <a href="#" class="remove">×</a>
                    </div>
                </li>
                <li>
                    <a href="product-details.html" class="image"><img src="assets/images/product/cart-product-2.webp"
                            alt="Cart product Image"></a>
                    <div class="content">
                        <a href="product-details.html" class="title">Lucky Wooden Elephant</a>
                        <span class="quantity-price">1 x <span class="amount">$35.00</span></span>
                        <a href="#" class="remove">×</a>
                    </div>
                </li>
                <li>
                    <a href="product-details.html" class="image"><img src="assets/images/product/cart-product-3.webp"
                            alt="Cart product Image"></a>
                    <div class="content">
                        <a href="product-details.html" class="title">Fish Cut Out Set</a>
                        <span class="quantity-price">1 x <span class="amount">$9.00</span></span>
                        <a href="#" class="remove">×</a>
                    </div>
                </li>
            </ul>
        </div>
        <div class="foot">
            <div class="buttons">
                <a href="wishlist.html" class="btn btn-dark btn-hover-primary">view wishlist</a>
            </div>
        </div>
    </div>
</div>
<!-- OffCanvas Wishlist End -->

<!-- OffCanvas Cart Start -->
<div id="offcanvas-cart" class="offcanvas offcanvas-cart">
    <div class="inner">
        <div class="head">
            <button class="offcanvas-close">×</button>
        </div>
     <!-- Contact Form Section Start -->
    <div class="section section-padding pt-0">
        <div class="container">
            <!-- Section Title Start -->
            <div class=" text-center">
                <h2 class="title">Send a message</h2>
            </div>
            <!-- Section Title End -->

            <div class="row">
                <div class=" col-12 mx-auto">
                    <div class="contact-form">
                        <form action="" id="contact-form" method="post">
                            <div class="row learts-mb-n30">
                                <div class="col-12 learts-mb-30"><input type="text" placeholder="Your Name *" name="name"></div>
                                <div class="col-12 learts-mb-30"><input type="email" placeholder="Email *" name="email"></div>
                                <div class="col-12 learts-mb-30"><textarea name="message" placeholder="Message"></textarea></div>
                                <!-- <div class="col-12 text-center learts-mb-30"><button class="btn btn-dark btn-outline-hover-dark">Submit</button></div> -->
                                <div class="col-12 text-center learts-mb-30"> <button class="hexa">Submit </button></div>

                            </div>
                        </form>
                        <p class="form-messege"></p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Contact Form Section End -->
    </div>
</div>
<!-- OffCanvas Cart End -->

<!-- OffCanvas Search Start -->
<div id="offcanvas-mobile-menu" class="offcanvas offcanvas-mobile-menu">
    <div class="inner customScroll">
        <div class="offcanvas-menu-search-form">
            <form action="#">
                <input type="text" placeholder="Search...">
                <button><i class="fas fa-search"></i></button>
            </form>
        </div>
        <div class="offcanvas-menu">
            <ul>
                <!-- <li class="nav-item @if($url === $rootUrl) active @endif"><a href="{{url('/')}}"><span class="menu-text">Home</span></a>

                </li> -->
                <li class="nav-item @if(preg_match(" /about/i", $url)) active @endif"><a href="{{url('/about')}}"><span class="menu-text">About</span></a>
                </li>
                  <li class="has-children"><a href="#"><span class="menu-text">Products</span></a>
                            <ul class="sub-menu">
                                @foreach(get_all_menu_category() as $key => $category)
                             
                                
                                    @php
                                        $products = App\Models\Product::where('category_id',$category->id)->get();
                                    @endphp
                                    <li class="has-children"><a href="{{url('/product_list/'.encrypt($category->id))}}"><span
                                                class="menu-text">{{$category->name}}</span></a>
                                           
                                            @if(!$products->isempty())
                                            
                                            <ul class="sub-menu">
                                                @foreach($products as $product)
                                                        <li><a href="{{url('/product_detail/'.encrypt($product->id))}}"><span class="menu-text">{{$product->product_name}}</span></a></li>
                                                @endforeach
                                                </ul>
                                            @endif
                                    </li>
                                @endforeach
                                
                            </ul>
                        </li>

                        <li class="has-children"><a href="{{url('/nuhas')}}"><span class="menu-text">{{get_nuhas_category()->name}}</span></a>
                    <ul class="sub-menu mega-menu">
                        <?php $chunks = $nuhas_products->chunk(5); ?>
                        @foreach($chunks as $nuhas_product)
                            <li>
                                <ul>   
                                    @foreach($nuhas_product as $nuhas)
                                        <li><a href="{{url('/nuhas_detail/'.encrypt($nuhas->id))}}"><span class="menu-text">{{$nuhas->product_name}}</span></a></li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                        
                        <li>
                            <ul>
                                
                                <img src="assets/images/nuhas/main_menu.jpg" alt="menu">

                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav-item @if(preg_match("/blog/i", $url)) active @endif"><a href="{{url('/blog')}}"><span class="menu-text">Blogs</span></a>

                </li>
                <li class="nav-item @if(preg_match("/contact/i", $url)) active @endif"><a href="{{url('/contact')}}"><span class="menu-text">Connect</span></a>

                </li>
            </ul>
        </div>
        <div class="offcanvas-buttons">
            <div class="header-tools">
            <div class="header-login ">
                        <a href="{{url('/')}}"><i class="fa fa-power-off"></i></a>
                    </div>
                <div class="header-login">
                    <a href="{{url('/user_login')}}"><i class="far fa-user"></i></a>
                </div>

                <div class="header-cart">
                    <a href="shopping-cart.html"><i class="fa fa-envelope-o" ></i></a>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- OffCanvas Search End -->

<div class="offcanvas-overlay"></div>