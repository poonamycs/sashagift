@extends('layouts/frontLayout/front_design')
@section('content')

@section('styles')
<style>
    .required:after{
        content: ' *'!important;
        color: red!important;
    }
    .error{
        font-size: 13.5px;
        color: red;
        margin-bottom: 0px;
    }
    .p-8{
        padding: 0px 0 8px;
    }
</style>
@endsection('styles')


    <!-- Page Title/Header Start -->
    <div class="page-title-section section" data-bg-image="assets/images/bg/page-title-1.webp">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="page-title">
                        <h1 class="title">Contact Us</h1>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">Contact Us</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Page Title/Header End -->

    <!-- Contact Information & Map Section Start -->
    <div class="section section-padding bg-white">
        <div class="container">
            <!-- Section Title Start -->
            <div class="section-title2 text-center">
                <h2 class="title">Keep in touch with us</h2>
                <p>Stay connected with Sasha's enchanting world of gifting magic! If you've been on a quest for the perfect gift, keep this place always on your checklist. Establish a blissful relationship by reaching out to us – a simple call, an email, or scheduling an appointment opens the door to a realm of extraordinary gifting possibilities. Let Sasha turn your gifting woes into moments of joy and seamless connections.</p>
            </div>
            <!-- Section Title End -->

            <!-- Contact Information Start -->
            <div class="row learts-mb-n30">
                <div class="col-lg-4 col-md-6 col-12 learts-mb-30">
                    <div class="contact-info">
                        <h4 class="title">ADDRESS</h4>
                        <span class="info"><i class="icon fas fa-map-marker-alt"></i> {{$contact->address}}</span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 learts-mb-30">
                    <div class="contact-info">
                        <h4 class="title">CONTACT</h4>
                        <span class="info"><i class="icon fas fa-phone-alt"></i> Mobile: {{$contact->phone}}</span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 learts-mb-30">
                <div class="contact-info">
                        <h4 class="title">Mail</h4>
                        <span class="info"><i class="icon far fa-envelope"></i> Mail: <a href="mailto:{{$contact->email}}">{{$contact->email}}</a></span>
                    </div>
                </div>
            </div>
            <!-- Contact Information End -->



        </div>
    </div>
    <!-- Contact Information & Map Section End -->

    <!-- Contact Form Section Start -->
    <div class="section section-padding pt-0 bg-white">
        <div class="container">
            <!-- Section Title Start -->
            <div class="section-title2 text-center">
                <h2 class="title">Send a message</h2>
            </div>
            <!-- Section Title End -->

            <div class="row">
                <div class="col-lg-8 col-12 mx-auto">
                    <div class="contact-form">
                        <form action="{{ route('contact.store') }}" id="contactEnq" method="post">
                            @csrf
                            <div class="row learts-mb-n30">
                                <div class="col-md-6 col-12 learts-mb-30"><input type="text" placeholder="Your Name *" name="name"></div>
                                <div class="col-md-6 col-12 learts-mb-30"><input type="email" placeholder="Email *" name="email"></div>
                                <div class="col-12 learts-mb-30"><textarea name="message" placeholder="Message"></textarea></div>
                                <div class="col-12 text-center learts-mb-30"> <button type="submit" class="btn btn-md  btn-outline-secondary"> Connect </button></div>
                            </div>
                        </form>
                        <p class="form-messege"></p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Contact Form Section End -->

@section('scripts')
<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
    <script src='https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.js'></script>
    <script>
        jQuery.validator.addMethod("lettersonly", function(value, element) {
            return this.optional(element) || /^[a-zA-Z ]+$/i.test(value);
        }, "Letters only please *");
        $("#contactEnq").validate({
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