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
<div class="section bg-white">
    <div class="">
        <div class="sticky-sidebar-container row">
            <!-- Product Summery Start -->
            <div class="col-lg-3 col-12 learts-mb-40 bags crystal">
                <div class="product-summery sticky-sidebar">
                    <div class="sticky-sidebar-inner">

                        <div class="vertical-tabs pt-3 offcanvas-menu p-4">
                            @if($user != null)
                            <ul class="sub-title utility">
                                @if(!$vendorproduct->isempty())
                                    @foreach($vendorproduct as $product)
                                        @if($product->product->category_id != '1' && $product->product->category_id == $id)
                                        <li class="has-children">
                                            <a href="{{url('/product_detail/'.encrypt($product->product->id))}}" class="active"><span class="menu-text">{{$product->product->product_name}}</span></a>
                                        </li>
                                        @endif
                                    @endforeach
                                @else
                                <span>No record Found</span>
                                @endif  
                            </ul>
                            @else
                                <ul class="sub-title utility">
                                    @if(!$products->isempty())
                                        @foreach($products as $product)
                                            <li class="has-children">
                                                <a href="{{url('/product_detail/'.encrypt($product->id))}}" class="active"><span class="menu-text">{{$product->product_name}}</span></a>
                                            </li>
                                        @endforeach
                                    @else
                                    <span>No record Found</span>
                                    @endif  
                                </ul>
                            @endif
                        </div>





                    </div>
                </div>
            </div>


            <!-- Product Summery End -->
            <!-- Product Images Start -->
            <div class="col-lg-9 col-12 learts-mb-40">

                <div class="product-images ">
                    <div class="section product_padding">
                        <div class="container">
                            <div class="row row-cols-xl-3 row-cols-lg-3 row-cols-sm-2 row-cols-1 learts-mb-n30">
                                @if($user)
                                    @if(!$vendorproduct->isempty())
                                        @foreach($vendorproduct as $product)
                                            @if($product->product->category_id != '1' && $product->product->category_id == $id)
                                            <div class="col learts-mb-30">
                                                <div class="card border-0 rounded-0 shadow" style="width: 18rem; ">
                                                    <a href="{{url('/product_detail/'.encrypt($product->product->id))}}"><img src="{{ asset('assets/admin/images/backend_images/products/large/'.$product->product->image) }}"
                                                        class="card-img-top rounded-0" alt="..." style="height:250px;"></a>
                                                    <div class="card-body mt-1 mb-1">
                                                        <div class="row">
                                                            <a href="{{url('/product_detail/'.encrypt($product->product->id))}}"> <div class="col-12 d-flex justify-content-start align-items-center">
                                                                    <span>
                                                                        <h6 class="card-title">{{$product->product->product_name}}</h6>
                                                                    </span>
                                                                    <span class="px-3">
                                                                        <i class="fa fa-long-arrow-right"></i>
                                                                    </span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            @endif
                                        @endforeach
                                    @else
                                    <span>No record Found</span>
                                    @endif  
                                @else
                                    @foreach($products as $product)
                                        <div class="col learts-mb-30">
                                            <div class="card border-0 rounded-0 shadow" style="width: 18rem; ">
                                                <a href="{{url('/product_detail/'.encrypt($product->id))}}"><img src="{{ asset('assets/admin/images/backend_images/products/large/'.$product->image) }}"
                                                    class="card-img-top rounded-0" alt="..." style="height:250px;"></a>
                                                <div class="card-body mt-1 mb-1">
                                                    <div class="row">
                                                        <a href="{{url('/product_detail/'.encrypt($product->id))}}"> <div class="col-12 d-flex justify-content-start align-items-center">
                                                                <span>
                                                                    <h6 class="card-title">{{$product->product_name}}</h6>
                                                                </span>
                                                                <span class="px-3">
                                                                    <i class="fa fa-long-arrow-right"></i>
                                                                </span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                <!-- <div class="col learts-mb-30">
                                    <div class="card border-0 rounded-0 shadow" style="width: 18rem; ">
                                        <img src="https://cpimg.tistatic.com/05203306/b/5/Promotional-Mug.jpeg"
                                            class="card-img-top rounded-0" alt="..." style="height:250px;">
                                            <div class="card-body mt-1 mb-1">
                                            <div class="row">
                                            <a href="/contact"> <div class="col-12 d-flex justify-content-start align-items-center">
                                                    <span>
                                                        <h6 class="card-title">Promotional Mug</h6>
                                                    </span>
                                                    <span class="px-3">
                                                        <i class="fa fa-long-arrow-right"></i>
                                                    </span>
                                                </div>
                                           </a>
                                            </div>
                                        </div>

                                    </div>
                                </div> -->
                                <!-- <div class="col learts-mb-30">
                                    <div class="card border-0 rounded-0 shadow" style="width: 18rem; ">
                                        <img src="https://cpimg.tistatic.com/05259563/b/5/Household-Gift.jpeg"
                                            class="card-img-top rounded-0" alt="..." style="height:250px;">
                                        <div class="card-body mt-1 mb-1">
                                        <div class="row">
                                            <a href="/contact"> <div class="col-12 d-flex justify-content-start align-items-center">
                                                    <span>
                                                        <h6 class="card-title">Household Gift</h6>
                                                    </span>
                                                    <span class="px-3">
                                                        <i class="fa fa-long-arrow-right"></i>
                                                    </span>
                                                </div>
                                           </a>
                                            </div>
                                        </div>

                                    </div>
                                </div> -->
                                <!-- <div class="col learts-mb-30">
                                    <div class="card border-0 rounded-0 shadow" style="width: 18rem; ">
                                        <img src="https://cpimg.tistatic.com/05385300/b/5/Smart-Watches.jpeg"
                                            class="card-img-top rounded-0" alt="..." style="height:250px;">
                                        <div class="card-body mt-1 mb-1">
                                        <div class="row">
                                            <a href="/contact"> <div class="col-12 d-flex justify-content-start align-items-center">
                                                    <span>
                                                        <h6 class="card-title">Smart Watches</h6>
                                                    </span>
                                                    <span class="px-3">
                                                        <i class="fa fa-long-arrow-right"></i>
                                                    </span>
                                                </div>
                                           </a>
                                            </div>
                                        </div>
                                        </div>

                                    </div>
                                </div> -->



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
                                                <h4 class="title"><a href="/product_detail">Fresh Fruit
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
                                                <h4 class="title"><a href="/product_detail">Fresh Fruit
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