@extends('layouts/frontLayout/front_design')
@section('content')

@section('styles')
<style>
.video-container {
    position: relative;
    width: 100%;
    height: 500px;
    /* Adjust the height as needed */
    overflow: hidden;
}

video {
    object-fit: cover;
    width: 100%;
    height: 100%;
}

.content {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    color: white;
    /* Adjust text color for visibility */
}
</style>
@endsection('styles')

<!-- Page Title/Header Start -->
<!-- <div class="page-title-section section" data-bg-image="assets/images/about/about_banner.png" >
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="page-title">
                    <h1 class="title">About Us</h1>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">About Us</li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div> -->
<!-- Page Title/Header End -->

<!-- About Section Start -->
<div class="section section-padding pb-0 bg-white">
    <div class="container">
        <div class="row learts-mb-n30">

            <div class="col-md-6 col-12 align-self-center learts-mb-30">
                <div class="about-us3">
                    <span class="sub-title">Live out your life.</span>
                    <h2 class="title">{{$about->title}}
                    </h2>
                    <div class="desc">
                        <p>{{$about->description}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12 text-center learts-mb-30">
                <img src="{{ asset('assets/admin/images/frontend_images/category/'.$about->image) }}" alt="">
            </div>

        </div>
    </div>

</div>

<!-- About Section End -->
<!-- <div class="video-container ">
    <video autoplay muted loop>
        <source src="./assets/images/about/abt_v.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <div class="content">
        <div class=" section-padding pb-0 ">
            <div class="container">
                <div class="row learts-mb-n30">

                    <div class="col-md-6 col-12 align-self-center learts-mb-30">
                        <div class="about-us3">
                            <span class="sub-title">Live out your life.</span>
                            <h2 class="title">Sasha Gift: Elevating Celebrations, <br>Unveiling Joy in Every Thoughtful Gesture</h2>
                            <div class="desc">
                                <p>Sasha Gift, nestled in the vibrant heart of Pune, India, crafts bespoke celebrations with innovative branding solutions. From the elegance of Luminarc to the resilience of Samsonite, Sasha's portfolio weaves a tapestry of personalized experiences. With a commitment to quality, trendsetting designs, and a mantra of treasuring relationships, Sasha transforms gifting into an art, delivering joy wrapped in superior craftsmanship.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12 text-center learts-mb-30">
                       <img src="assets/images/about/about-5.webp" alt=""> 
                    </div>

                </div>
            </div>
        </div>
    </div>
</div> -->

        

      



        <!-- Feature Section Start -->
        <div class="section section-padding bg-white">
            <div class="container">

                <div class="row learts-mb-n30">

                    <div class="col-xl-3 col-lg-4 col-12 me-auto learts-mb-30">
                        <h1 class="fw-400">The difference when you shop with Sasha!</h1>
                    </div>
                    <div class="col-lg-8 col-12 learts-mb-30">
                        <div class="row learts-mb-n30">

                            <div class="col-md-6 col-12 learts-mb-30">
                                <p class="text-heading fw-600 learts-mb-10">No Quality Compromise</p>
                                <p>Immerse your loved ones in the epitome of quality craftsmanship, as our gift studio
                                    refuses to compromise on the excellence of each curated piece.</p>
                            </div>

                            <div class="col-md-6 col-12 learts-mb-30">
                                <p class="text-heading fw-600 learts-mb-10">Pleothra of Customization</p>
                                <p>Unleash a world of individuality with a plethora of customization options, allowing
                                    every gift to be a unique masterpiece tailored to the recipient's distinct taste.
                                </p>
                            </div>

                            <div class="col-md-6 col-12 learts-mb-30">
                                <p class="text-heading fw-600 learts-mb-10">Varity of Brand Collaboration</p>
                                <p>Embrace the artistry of our collaborations with a diverse range of brands, creating
                                    gifts that weave together the finest elements of fashion and creativity.</p>
                            </div>

                            <div class="col-md-6 col-12 learts-mb-30">
                                <p class="text-heading fw-600 learts-mb-10">Timely delivery</p>
                                <p>Ensure your thoughtful presents arrive right on time, as our gift studio prioritizes
                                    timely delivery to transform every special occasion into a seamless and joyful
                                    celebration.</p>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>
        <!-- Feature Section End -->
        @section('scripts')

        @endsection('scripts')

        @endsection('content')