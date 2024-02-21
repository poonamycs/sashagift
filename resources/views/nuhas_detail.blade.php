@extends('layouts/frontLayout/front_design')
@section('content')

@section('styles')
<style>


.required:after {
    content: ' *' !important;
    color: red !important;
}

.error {
    font-size: 13.5px;
    color: red;
    margin-bottom: 0px;
}

.p-8 {
    padding: 0px 0 8px;
}
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
            <div class="col-lg-5 col-12 learts-mb-40">
                <div class="product-images vertical">
                    <!-- <button class="product-gallery-popup hintT-left" data-hint="Click to enlarge" data-images='[
                                        {"src": "assets/images/nuhas/n1.jpg", "w": 810, "h": 1080},
                                        {"src": "assets/images/nuhas/n2.jpg", "w": 810, "h": 1080},
                                        {"src": "assets/images/nuhas/7.jpg", "w": 810, "h": 1080},
                                        {"src": "assets/images/nuhas/n1.jpg", "w": 810, "h": 1080},
                                        "assets/images/nuhas/n1.jpg", "w": 810, "h": 1080}
                                    ]'><i class="fas fa-expand"></i></button> -->
                    <!-- <a href="https://www.youtube.com/watch?v=1jSsy7DtYgc" class="product-video-popup video-popup hintT-left" data-hint="Click to see video"><i class="fas fa-play"></i></a> -->
                    <div class="product-gallery-slider">
                        <div class="product-zoom"
                            data-image="{{ asset('assets/admin/images/backend_images/products/large/'.$product->image) }}">
                            <img src="{{ asset('assets/admin/images/backend_images/products/large/'.$product->image) }}"
                                alt="">
                        </div>
                        @foreach($product_imgs as $product_img)
                        <div class="product-zoom"
                            data-image="{{ asset('assets/admin/images/backend_images/products/large/'.$product_img->image) }}">
                            <img src="{{ asset('assets/admin/images/backend_images/products/large/'.$product_img->image) }}"
                                alt="">
                        </div>
                        @endforeach
                        <!-- <div class="product-zoom" data-image="assets/images/nuhas/n2.jpg">
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
                            </div> -->
                    </div>
                    <div class="product-thumb-slider-vertical">
                        <div class="item">
                            <img src="{{ asset('assets/admin/images/backend_images/products/large/'.$product->image) }}"
                                alt="">
                        </div>
                        @foreach($product_imgs as $product_img)
                        <div class="item">
                            <img src="{{ asset('assets/admin/images/backend_images/products/large/'.$product_img->image) }}"
                                alt="">
                        </div>
                        @endforeach
                        <!-- <div class="item">
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
                            </div> -->
                    </div>
                </div>
            </div>
            <!-- Product Images End -->
            <div class="col-lg-1"></div>
            <!-- Product Summery Start -->
            <div class="col-lg-6 col-12 learts-mb-40">
                <div class="product-summery product-summery-center">


                    <h3 class="product-title">{{$product->product_name}}</h3>

                    <div class="product-description">
                        <p>{{$product->description}}</p>
                    </div>

                    <!-- <div class="col-12 text-center learts-mb-30"> <button class="hexa"><a href="/contact" class="">Send Enquiry</a> </button></div> -->
                    <div class="col-auto learts-mb-20"><a class="btn btn-md  btn-outline-secondary"
                            data-bs-toggle="modal" data-bs-target="#indexModel">Send Enquiry</a></div>


                </div>
            </div>
            <!-- Product Summery End -->

        </div>
    </div>

</div>
<!-- Single Products Section End -->



<div class="modal fade" id="indexModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="row justify-content-center">
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                    @if(Session::has('success_message'))
                    <div class="alert alert-success" role="alert">
                        <strong>{!! session('success_message') !!}</strong>
                        <button type="button" class="btn-close float-end" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="col-xl-12">
                        <div class="card border-0 rounded-3 shadow-lg overflow-hidden">
                            <div class="card-body p-0">
                                <div class="row g-0">

                                    <div class="col-sm-12 p-4">
                                        <div class="text-start d-flex justify-content-between">
                                            <h3 class="text-center">Enquire Now</h3>
                                            <button type="button" data-bs-dismiss="modal"
                                                class="bg-light border-0"><span
                                                    class="fa fa-times-circle"></span></button>

                                            <!-- <div class="heading-border fs-4 mb-3 px-3 fw-light">Enquire Now</div> -->
                                        </div>
                                        <form action="{{url('productenquiry')}}" method="Post" id="contactmodal">@csrf
                                            
                                            <input type="hidden" name="product_id" value="{{$product->id}}">
                                            <div class="row learts-mb-n30">
                                                <div class="col-md-6 col-12 learts-mb-30"><input type="text"
                                                        placeholder="Your Name *" name="name"></div>
                                                <div class="col-md-6 col-12 learts-mb-30"><input type="email"
                                                        placeholder="Email *" name="email"></div>
                                                <div class="col-md-6 col-12 learts-mb-30"><input type="number"
                                                        placeholder="Phone *" name="phone"></div>
                                                <div class="col-12 learts-mb-50"><textarea name="message"
                                                        placeholder="Message"></textarea></div>

                                            </div>  

                                            <div class="d-flex justify-content-end">


                                                <button class="btn btn-md  btn-outline-secondary" id="submitButton"
                                                    type="submit"><span class="fa fa-check-circle"></span>
                                                    Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@section('scripts')
<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<script src='https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.js'></script>
<script>
jQuery.validator.addMethod("lettersonly", function(value, element) {
    return this.optional(element) || /^[a-zA-Z ]+$/i.test(value);
}, "Letters only please *");
$("#contactmodal").validate({
    // errorPlacement: function errorPlacement(error, element) { element.before(error); },
    rules: {
        name: {
            required: true,
            lettersonly: true,


        },
        email: {
            required: true,
        },

        message: {
            required: true,
        },

        subject: {
            required: true,
        },

        phone: {
            required: true,
            number: true,
            maxlength: 12,
            minlength: 10
        },


    },
    messages: {

        name: {
            required: "This field is required.",
        },
        email: {
            required: "This field is required.",
        },
        message: {
            required: "This field is required.",
        },
        phone: {
            required: "This field is required.",
            number: "Please enter valid number",
        },

    },
    submitHandler: function(form) {
        $(".cbtn").attr("disabled", true);
        $(".cbtn").html("<i class='fa fa-spinner fa-spin'></i> Please wait...");
        form.submit();
    }
});
</script>


@endsection('scripts')

@endsection('content')