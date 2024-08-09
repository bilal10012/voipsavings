@extends('layouts.front.app')
@section('title', 'Home')
@section('css')
@endsection
@section('content')
<section class="inner-banner">
    <img src="{{ asset('web-assets/images/inner-bann.jpg') }}" alt="">
    <div class="inn-bann-txt">
          <div class="container">
            <div class="row">
              <div class="col-md-8 col-lg-8 col-12">
                <h1>Customers</h1>
              </div>
            </div>
          </div>
        </div>
        </section>
    <!-- banner end -->
    <!-- fulfil start -->
    
    <!-- fulfil end -->
    <!-- brand start -->
    <section class="brand">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="brand-txt wow fadeInDownBig" data-wow-duration="2s">
                        <h3>Marketplace + <span>Carrier Integrations</span></h3>
                    </div>
                </div>
                <div class="col-12">
                    <div class="brand-slider">
                        <div>
                            <div class="brand-text">

                                <img src="{{ asset('web-assets/images/brand-8.png') }}" alt="" class="brand-1" />

                            </div>
                        </div>
                        <div>
                            <div class="brand-text">

                                <img src="{{ asset('web-assets/images/brand-1.png') }}" alt="" class="brand-1" />

                            </div>
                        </div>
                        <div>
                            <div class="brand-text">

                                <img src="{{ asset('web-assets/images/brand-2.png') }}" alt="" class="brand-1" />

                            </div>
                        </div>
                        <div>
                            <div class="brand-text">

                                <img src="{{ asset('web-assets/images/brand-3.png') }}" alt="" class="brand-1" />

                            </div>
                        </div>
                        <div>
                            <div class="brand-text">

                                <img src="{{ asset('web-assets/images/brand-4.png') }}" alt="" class="brand-1" />

                            </div>
                        </div>
                        <div>
                            <div class="brand-text">

                                <img src="{{ asset('web-assets/images/brand-5.png') }}" alt="" class="brand-1" />

                            </div>
                        </div>
                        <div>
                            <div class="brand-text">

                                <img src="{{ asset('web-assets/images/brand-6.png') }}" alt="" class="brand-1" />

                            </div>
                        </div>
                        <div>
                            <div class="brand-text">

                                <img src="{{ asset('web-assets/images/brand-7.png') }}" alt="" class="brand-1" />

                            </div>
                        </div>
                        <div>
                            <div class="brand-text">

                                <img src="{{ asset('web-assets/images/brand-8.png') }}" alt="" class="brand-1" />

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- brand end -->
    <!-- ship start -->
   
    <!-- ship end -->
    <!-- experience start -->
 
    <!-- experience end -->
    <!-- what-we start -->
  
    <!-- what-we end -->
    <!-- faq start -->
  
    <!-- faq end -->
    <!-- dilivery start -->
  
  
    
    <!-- dilivery end -->
    <!-- true start -->
  
    <!-- true end -->
    <!-- testimonial start -->
    <!--  Testimonial Section Start -->
    <section class="testimonial-sec all-section ">
        <div class="container ">
            <div class="sec-head wow slideInDown">
                <h2>What Client Says</h2>
            </div>
            <div class="row ">
                <div class="col-lg-12 ">
                    <div class="testi-slider wow slideInLeft">
                      @foreach ($testimonial as $test )
                      
                        <div>
                          <div class="testimonial-back">
                            <div class="testimonial-box ">
                                <div class="testimonial-imag ">
                                    <img src="{{asset($test->primary_image)}} " alt=" " class="ts-1 " />
                                </div>
                                <div class="testimonial-text ">
                                <p>{!! $test->description !!}</p>
                                <h4>{{$test->title}}</h4>
                                    <h5>{{$test->role}}</h5>
                                </div>
                            </div>
                          </div>
                        </div>
                        @endforeach
    
    
                        <!-- <div>
                          <div class="testimonial-back">
                            <div class="testimonial-box ">
                                <div class="testimonial-imag ">
                                    <img src="images/ts-2.jpg " alt=" " class="ts-2 " />
                                </div>
                                <div class="testimonial-text ">
                                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla </p>
                                    <h4>John Smith</h4>
                                    <h5>Manager</h5>
                                </div>
                            </div>
                          </div>
                        </div>
    
                        <div>
                          <div class="testimonial-back">
                            <div class="testimonial-box ">
                                <div class="testimonial-imag ">
                                    <img src="images/ts-3.jpg " alt=" " class="ts-3 " />
                                </div>
                                <div class="testimonial-text ">
                                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla </p>
                                    <h4>John Smith</h4>
                                    <h5>Manager</h5>
                                </div>
                            </div>
                          </div>
                        </div>
                        <div>
                            <div class="testimonial-back">
                              <div class="testimonial-box ">
                                  <div class="testimonial-imag ">
                                      <img src="images/ts-2.jpg " alt=" " class="ts-2 " />
                                  </div>
                                  <div class="testimonial-text ">
                                      <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla </p>
                                      <h4>John Smith</h4>
                                      <h5>Manager</h5>
                                  </div>
                              </div>
                            </div>
                          </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
     
    </script>
@endsection
