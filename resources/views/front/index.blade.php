@extends('layouts.front.app')
@section('title', 'Home')
@section('css')
@endsection
@section('content')
        <!-- banner start -->
        <section class="main_slider">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
              <!-- <div class="carousel-indicators">
                <div data-bs-target="#carouselExampleControls" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></div>
                <div data-bs-target="#carouselExampleControls" data-bs-slide-to="1" aria-label="Slide 2"></div>
                <div data-bs-target="#carouselExampleControls" data-bs-slide-to="2" aria-label="Slide 3"></div>
              </div> -->
              <div class="carousel-inner">
                <div class="carousel-item active">

                    {{-- <div class="carousel-item {{ $key == 0 ? 'active' : '' }}"> --}}
                        <img src="{{ asset($banner->image) }}" class="img-fluid" alt="...">
                   <div class="carousel-caption">
                    <div class="container">
                      <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 align-self-center">
                          <div class="banner_text wow fadeInLeft" data-wow-duration="2s">
                            <h1>{{ $banner->title }}</h1>
                            <p>{!! $banner->text !!}</p>
                           <a href="{{ $banner->button_link }}" class="theme-btn">{{ $banner->button_name }}</a>

                          </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 align-self-center">
                          <div class="banner_img">
                            <img src="{{ $banner->image_2 }}" class="img-fluid" alt="">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- <div class="carousel-item">
                  <img src="images/banner.jpg" class="img-fluid" alt="...">
                   <div class="carousel-caption">
                    <div class="container">
                      <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 align-self-center">
                          <div class="banner_text wow fadeInLeft" data-wow-duration="2s">
                            <h1>CrossFire</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas. umsan lacus vel facilisis. </p>
                            <a href="javascript:void(0)" class="btn btn_badam">Read More</a>
                          </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 align-self-center">
                          <div class="banner_img wow bounceIn" data-wow-duration="2s">
                            <img src="images/banner_img.png" class="img-fluid" alt="">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="images/banner.jpg" class="img-fluid" alt="...">
                   <div class="carousel-caption">
                    <div class="container">
                      <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 align-self-center">
                          <div class="banner_text wow fadeInLeft" data-wow-duration="2s">
                            <h1>CrossFire</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas. umsan lacus vel facilisis. </p>
                            <a href="javascript:void(0)" class="btn btn_badam">Read More</a>
                          </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 align-self-center">
                          <div class="banner_img wow bounceIn" data-wow-duration="2s">
                            <img src="images/banner_img.png" class="img-fluid" alt="">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> -->
              </div>
              <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button> -->
            </div>
          </section>
          <!-- banner end -->



          <!--Section  Counter Start -->
          <section>
            <div class="counter-sec">
              <div class="container">
                <div class="row">
                  <div class="maindv-counter">
                    <div class="counter-box wow fadeInLeftBig" data-wow-duration="3s">
                     <div class="counter"><span class="count">{{ $exp->subtitle }}</span>+</div>
                     <h4>{{ $exp->title }}</h4>
                      </div>
                      <div class="counter-box wow fadeInLeftBig" data-wow-duration="2s">
                     <div class="counter">$<span class="count">{{ $revenue->subtitle }}</span>M</div>
                     <h4>{{ $revenue->title }}</h4>
                      </div>
                      <div class="counter-box wow fadeInLeftBig" data-wow-duration="1s">
                     <div class="counter"><span class="count">{{ $employees->subtitle }}</span>+</div>
                     <h4>{{ $employees->title }}</h4>
                      </div>
                  </div>

                </div>
              </div>
            </div>
          </section>



          <!-- Section Counter end -->


          <!-- Section About Us Start -->
          <section>
            <div class="aboutus">
              <div class="container-fluid">
                <div class="row">
                  <div  class="col-md-5 col-lg-5 col-12">
                    <div class="aboutus-img wow fadeInLeftBig" data-wow-duration="2s">
                      <img src="{{ $about->primary_image }}" alt="img">
                    </div>
                  </div>
                  <div  class="col-md-7 col-lg-7 col-12">
                    <div class="text-aboutus wow fadeInRightBig" data-wow-duration="2s">
                      <h3>{{ $about->title }}</h3>
                      <p>{!! $about->description !!}</p>
                      <div class="btn-aboutus">
                        <a href="{{ $about->link }}" class="theme-btn">{{ $about->button_text }}</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>



          <!-- Section About Us End -->



          <!-- Section Different Start -->
          <section>
            <div class="different">
              <div class="container">
                <div class="row">
                  <div class="heading-different wow fadeInDownBig" data-wow-duration="2s">
                    <h2>{{ $distic_offer->title }}</h2>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4 col-lg-4 col-12">
                    <div class="maindv-box-diiferent wow fadeInLeftBig" data-wow-duration="3s">
                      <div class="img-different">
                        <img src="{{ $distic_offer->primary_image }}" alt="img">
                      </div>
                      <div class="text-different">
                        <h2>{{ $distic_offer->subtitle }}</h2>
                        <ul>
                          {!! $distic_offer->description !!}
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 col-lg-4 col-12">
                    <div class="maindv-box-diiferent wow fadeInLeftBig" data-wow-duration="2s">
                      <div class="img-different">
                        <img src="{{ $simplified_tech->primary_image }}" alt="img">
                      </div>
                      <div class="text-different">
                        <h2>{{ $simplified_tech->subtitle }}</h2>
                        <ul>
                          {!! $simplified_tech->description !!}
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 col-lg-4 col-12">
                    <div class="maindv-box-diiferent wow fadeInLeftBig" data-wow-duration="1s">
                      <div class="img-different">
                        <img src="{{ $unlimited_exp->primary_image }}" alt="img">
                      </div>
                      <div class="text-different">
                        <h2>{{ $unlimited_exp->subtitle }}</h2>
                        <ul>
                          {!! $unlimited_exp->description !!}
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>




          <!-- Section Different End -->



          <!-- Section featured Start -->
          <section>
            <div class="featured">
             <div class="container">
              <div class="row">
                  <div class="heading-different">
                    <h2>Featured In</h2>
                  </div>
                </div>
               <div class="row">
                 <div class="col-12">
                          <div class="brand-slider">
                            @foreach($slider_1 as $slider)
                              <div>
                                  <div class="brand-text">
                                      <h5>
                                          <img src="{{ $slider->primary_image }}" alt="" class="brand-1" />
                                      </h5>
                                  </div>
                              </div>
                              @endforeach

                          </div>
               </div>
             </div>
            </div>
          </div>
          </section>




          <!-- Section featured End -->


          <!-- Section Spectrum Start -->
          <section>
            <div class="spectrum">
              <div class="container">
                <div class="row">
                  <div class="col-md-12 col-lg-12 col-12">
                    <div class="heading-spectrum wow fadeInDown" data-wow-duration="2s">
                      <h2>{{ $why_section->title }}</h2>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-7 col-lg-7 col-12">
                    <div class="text-spectrum wow fadeInLeft" data-wow-duration="2s">
                      <ul>
                        {!! $why_section->description !!}
                      </ul>
                    </div>
                  </div>
                  <div class="col-md-5 col-lg-5 col-12">
                    <div class="img-spectrum wow fadeInRight" data-wow-duration="2s">
                      <img src="{{asset ($why_section->primary_image) }}" alt="img">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>



          <!-- Section Spectrum End -->



          <!-- Section portal Start -->
          <section>
            <div class="portal">
              <div class="container">
                <div class="row">
                  <div class="col-md-7 col-lg-7 col-12">
                    <div class="img-portal wow fadeInLeftBig" data-wow-duration="2s">
                      <img src="{{ $stratus_portal->primary_image }}" alt="img">
                    </div>
                  </div>
                  <div class="col-md-5 col-lg-5 col-12">
                    <div class="text-portal wow fadeInRightBig" data-wow-duration="2s">
                      <h2>{{ $stratus_portal->title }}</h2>
                      <ul>
                        {!! $stratus_portal->description !!}
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>




          <!-- Section portal End -->



          <!-- Section Art Start -->
          <section>
            <div class="art">
              <div class="container">
                <div class="row">
                  <div class="heading-different wow fadeInLeftBig" data-wow-duration="2s">
                    <h2>State of the Art <br>Technology</h2>
                  </div>
                </div>
                <div class="row">
                  <div class="artslid">
                    @foreach ( $slider_2 as $slider )
                <div>
                    <div class="img-art">
                      <img src="{{ $slider->primary_image }}" alt="img">
                      <h5>{{ $slider->title }}</h5>
                    </div>
                    </div>
                    @endforeach


                  </div>
                </div>
              </div>
            </div>
          </section>



          <!-- Section Art End -->




          <!-- Section Router Start -->
          <section>
            <div class="router">
              <div class="container">
                <div class="row">
                  <div class="col-md-8 col-lg-8 col-12">
                    <div class="text-router wow fadeInLeft" data-wow-duration="2s">
                      <h2>{{ $keyfeatures->title }}</h2>
                       <div class="maindv-routertext">
                         <ul>
                           <h2>{{ $keyfeatures->subtitle }}</h2>
                          {!! $keyfeatures->description !!}
                         </ul>
                         <ul>
                           <h2>{{ $flyover->subtitle }}</h2>
                           {!! $flyover->description !!}
                         </ul>
                       </div>
                    </div>
                  </div>
                  <div class="col-md-4 col-lg-4 col-12 p-0">
                    <div class="router-img wow fadeInRight" data-wow-duration="2s">
                      <img src="{{ $flyover->primary_image }}" alt="img">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>



          <!-- Section Router end -->

@endsection

@section('js')
    <script>
        vhjhvvvvvv
    </script>
@endsection
