@extends('layouts/frontLayout/front_design')
@section('content')

@section('styles')

@endsection('styles')

  <!-- Category Banner Section Start -->
  <div class="section section-fluid section-padding pt-50">
        <div class="container">
            <div class="row">
                @foreach($vendorproducts as $vendorproduct)
                    <div class="col-lg-4 pb-5 ">
                        <div class="category-banner1">
                            <div class="inner">
                                <a href="{{url('/product_detail/'.encrypt($vendorproduct->product->id))}}" class="image"><img src="{{ asset('assets/admin/images/backend_images/products/large/'.$vendorproduct->product->image) }}" alt=""></a>
                                <div class="content">
                                    <h3 class="title">
                                        <a href="{{url('/product_detail/'.encrypt($vendorproduct->product->id))}}">{{$vendorproduct->product->product_name}}</a>
                                        <!-- <span class="number">16</span> -->
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Category Banner Section End -->



@section('scripts')
@endsection('scripts')
@endsection('content')