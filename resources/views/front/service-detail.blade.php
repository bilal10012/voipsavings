@extends('layouts.front.app')
@section('title','Service Details')

@section('content')

<style>
</style>


<section>
    <div class="innerbanner">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-6 col-12">
            <div class="banner_text wow fadeInLeft" data-wow-duration="2s">
                    <h1>Services</h1>
             </div>
          </div>
          <div class="col-md-6 col-lg-6 col-12">
            <div class="img-innerbanner">
              <img src="{{ asset ($banner->image) }}" alt="img">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
   <!-- detail-service start -->
 <!-- detail-service start -->
 <section class="detail-service">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
          <div class="det-ser-img">
            <img src="{{asset ($service_detail->inner_image) }}" alt="">
          </div>
          <div class="det-ser-txt">
            <h4>{{ $service_detail->title }}</h4>
            <p>{!! $service_detail->description !!}  </p>
             <a href="{{ route('contactUsPage') }}" class="theme-btn">Contact Us</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- detail-service end -->
   <!-- service end -->



@endsection
