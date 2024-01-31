@extends('layouts/frontLayout/front_design')
@section('content')

@section('styles')
<style>

</style>
@endsection('styles')

<!-- Page Title/Header Start -->
<div class="page-title-section section" data-bg-image="assets/images/bg/page-title-1.webp">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="page-title">
                        <h1 class="title">Nuhas</h1>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">Products</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Page Title/Header End -->
  <!-- Category Banner Section Start -->
  <div class="section bg-white pb-5">
        <div class="container">
            <div class="row row-cols-lg-4 row-cols-sm-2 row-cols-1 learts-mb-n40">

                <div class="col learts-mb-40">
                    <div class="category-banner4">
                        <a href="{{url('/nuhas_detail')}}" class="inner">
                            <div class="image"><img src="assets/images/nuhas/nuhas.png" alt=""></div>
                            <div class="content" data-bg-color="#f4ede7">
                                <h3 class="title">Oscar Pot</h3>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col learts-mb-40">
                    <div class="category-banner4">
                        <a href="{{url('/nuhas_detail')}}" class="inner">
                            <div class="image"><img src="assets/images/nuhas/Barrel.png" alt=""></div>
                            <div class="content" data-bg-color="#e8f5f2">
                                <h3 class="title">Barrel Matka Antique Etching</h3>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col learts-mb-40">
                    <div class="category-banner4">
                        <a href="{{url('/nuhas_detail')}}" class="inner">
                            <div class="image"><img src="assets/images/nuhas/luxury.png" alt=""></div>
                            <div class="content" data-bg-color="#e3e4f5">
                                <h3 class="title">Toys</h3>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col learts-mb-40">
                    <div class="category-banner4">
                        <a href="{{url('/nuhas_detail')}}" class="inner">
                            <div class="image"><img src="assets/images/nuhas/nuhas.png" alt=""></div>
                            <div class="content" data-bg-color="#faf5e5">
                                <h3 class="title">Kitchen</h3>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col learts-mb-40">
                    <div class="category-banner4">
                        <a href="{{url('/nuhas_detail')}}" class="inner">
                            <div class="image"><img src="assets/images/nuhas/nuhas.png" alt=""></div>
                            <div class="content" data-bg-color="#faf5e5">
                                <h3 class="title">Kitchen</h3>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col learts-mb-40">
                    <div class="category-banner4">
                        <a href="{{url('/nuhas_detail')}}" class="inner">
                            <div class="image"><img src="assets/images/nuhas/nuhas.png" alt=""></div>
                            <div class="content" data-bg-color="#faf5e5">
                                <h3 class="title">Kitchen</h3>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col learts-mb-40">
                    <div class="category-banner4">
                        <a href="{{url('/nuhas_detail')}}" class="inner">
                            <div class="image"><img src="assets/images/nuhas/luxury.png" alt=""></div>
                            <div class="content" data-bg-color="#faf5e5">
                                <h3 class="title">Kitchen</h3>
                            </div>
                        </a>
                    </div>
                </div>
                    <div class="col learts-mb-40">
                        <div class="category-banner4">
                            <a href="{{url('/nuhas_detail')}}" class="inner">
                                <div class="image"><img src="assets/images/nuhas/luxury.png" alt=""></div>
                                <div class="content" data-bg-color="#faf5e5">
                                    <h3 class="title">Kitchen</h3>
                                </div>
                            </a>
                        </div>
                    </div>

            </div>
        </div>
    </div>
    
    <!-- Category Banner Section End -->

@section('scripts')

@endsection('scripts')

@endsection('content')