@extends('layouts/frontLayout/front_design')
@section('content')

@section('styles')
<style>

</style>
@endsection('styles')



    <!-- Login  Section Start -->
    <div class="section section-padding bg-white">
        <div class="container">
            <div class="row g-0">
           
                <div class="col-lg-5">
                    <div class="user-login-register vender">
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                    @if (Session::has('success_message_login'))
                        <div class="alert alert-success" role="alert">
                            <strong>{!! session('success_message_login') !!}</strong>
                            <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                        <div class="login-register-title">
                            <h2 class="title">Login</h2>
                            <p class="desc">Great to have you back!</p>
                        </div>
                        <div class="login-register-form">
                        <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/user_login') }}" novalidate="novalidate"> {{ csrf_field() }}
                                <div class="row learts-mb-n50">
                                    <div class="col-12 learts-mb-50">
                                        <input type="email" name="email" placeholder="Username " class="sasha_login">
                                    </div>
                                    <div class="col-12 learts-mb-50">
                                        <input type="password" name="password" placeholder="Password" class="sasha_login">
                                    </div>
                                    <div class="col-12 text-center learts-mb-500"> 
                                        <button type="submit" class="btn btn-md  btn-outline-secondary">login </button>
                                       
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2"></div>
                <div class="col-lg-5">
                    <img src="assets/images/login_img.png" alt="">
                </div>
            </div>

        </div>

    </div>
    <!-- Login & Register Section End -->
@section('scripts')

@endsection('scripts')

@endsection('content')