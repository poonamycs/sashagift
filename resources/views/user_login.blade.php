@extends('layouts/frontLayout/front_design')
@section('content')

@section('styles')
<style>

</style>
@endsection('styles')


    <!-- Page Title/Header Start -->
    <div class="page-title-section section" data-bg-image="assets/images/login/login_banner.png">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="page-title">
                        <h1 class="title">Login </h1>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Home</a></li>
                            <li class="breadcrumb-item active">Login </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Page Title/Header End -->

    <!-- Login  Section Start -->
    <div class="section section-padding bg-white">
        <div class="container">
            <div class="row g-0">
            <div class="col-lg-2">
                    
                    </div>
                <div class="col-lg-8">
                    <div class="user-login-register bg-light">
                        <div class="login-register-title">
                            <h2 class="title">Login</h2>
                            <p class="desc">Great to have you back!</p>
                        </div>
                        <div class="login-register-form">
                            <form action="#">
                                <div class="row learts-mb-n50">
                                    <div class="col-12 learts-mb-50">
                                        <input type="email" placeholder="Username or email address">
                                    </div>
                                    <div class="col-12 learts-mb-50">
                                        <input type="password" placeholder="Password">
                                    </div>
                                    
                                <div class="col-12 text-center learts-mb-500"> <button class="hexa"><a href="{{url('/contact')}" class="text-white">login</a> </button></div>
                                   
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    
                </div>
            </div>

        </div>

    </div>
    <!-- Login & Register Section End -->
@section('scripts')

@endsection('scripts')

@endsection('content')