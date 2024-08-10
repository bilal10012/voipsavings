@extends('layouts.front.app')
@section('title','Service')

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
              <img src="{{ $banner->image }}" alt="img">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="service">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-12 col-12">
          <div class="ser-txt wow fadeInDown" data-wow-duration="2s">
            <h5>OUR SERVICES</h5>
          </div>
        </div>
        <div class="row">
            @forelse ($services as $service)


            <div class="col-md-4 col-lg-4 col-12">
              <div class="ser-main">
                <div class="ser-img">
                  <img src="{{ $service->primary_image }}" alt="">
                </div>
                <div class="ser-main-txt">
                  <h5>{{ $service->title }}</h5>
                  <p>{!! Str::limit($service->description, 10, '...') !!}</p>
                  <a href="{{ route('show.service', $service->slug) }}">READ MORE <i class="fas fa-arrow-right"></i></a>
                </div>
              </div>
            </div>
            @empty
                <p>No Service Found</p>
            @endforelse
          </div>

        </div>
      </div>
    </div>
   </section>
   <!-- service end -->



@endsection
