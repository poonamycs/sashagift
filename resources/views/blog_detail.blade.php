@extends('layouts/frontLayout/front_design')
@section('content')

@section('styles')
<style>
@media (min-width: 576px){
.modal-sm {
    --bs-modal-width: 455px !important;
}
}

</style>
@endsection('styles')


<!-- Single Blog Section Start -->
<div class="section section-padding bg-white">
    <div class="container">
        <div class="row learts-mb-n50">
            <div class="col-xl-2 col-lg-2 col-12"></div>
            <div class="col-xl-8 col-lg-8 col-12 learts-mb-50">
                <div class="single-blog">
                    <div class="image">
                        <a href="blog-details-right-sidebar.html"><img
                                src="{{ asset('assets/admin/images/backend_images/blog/'.$blog->image) }}"
                                alt="Blog Image"></a>
                    </div>
                    <div class="content">
                        <!-- <ul class="category">
                                <li><a href="#">Decor</a></li>
                                <li><a href="#">Kitchen</a></li>
                            </ul> -->
                        <h2 class="title">{{$blog->name}}</h2>

                        <div class="desc">
                            <p>{!!$blog->content !!}</p>
                            <!-- <blockquote>
                                    <p>A triumph of&nbsp;texture and form, and&nbsp;dramatic, organic, sophisticated, sensual, it was one of the most beguiling pieces of functional art&nbsp;I’ve seen of late.</p>
                                </blockquote>
                                <p>Doing a little background research for the interview was no mean feat. At a time when so many tread the same art-meets-craft sales circuits and tend their Instagram feeds with greater passion than their craft, this woman was mysterious. A minimalist website was all there was. Even better. A trip out to the deliciously un-hip Excelsior District in San Francisco was a good start.</p>
                                <p>So was poking around the garage-turned-workshop: a vat of something brewing in the corner, a few bottles holding another experiment (homemade dyes from flowers in the yard), tatami mats on the floor, vintage Knoll chairs, a drool-worthy assortment of books on fashion, Japanese anime figurines… Oh, and an old letterpress nestled beneath a work table.</p> -->
                        </div>
                    </div>

                </div>



            </div>




        </div>

    </div>
</div>

</div>
<!-- Single Blog Section End -->

@section('scripts')

@endsection('scripts')

@endsection('content')