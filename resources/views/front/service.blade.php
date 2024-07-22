@extends('layouts.front.app')
@section('title','Service')

@section('content')
 
<style>
</style>   

<section class="inner-banner">
      <img src="{{ asset('web-assets/images/inner-bann.jpg') }}" alt="">
      <div class="inn-bann-txt">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-lg-8 col-12">
            <h1>Service</h1>
          </div>
        </div>
      </div>
    </div>
    </section>
    <!-- banner end -->
    <!-- what-we start -->
     <section class="what-we inn">
       <div class="container">
         <div class="row">
           <div class="col-md-12 col-lg-12 col-12">
             <div class="what-we-txt wow fadeInUpBig" data-wow-duration="2s">
               <h3>What We Serve</h3>
             </div>
           </div>
           @foreach ($services as $service)
           

           <div class="col-md-3 col-lg-3 col-12">
             <div class="what-we-img wow fadeInLeft">
               <a href="service-det.html"><img src="{{asset($service->primary_image)}}" alt=""></a>
               <div class="what-we-img-sm">
                 <img src="#" alt="">
               </div> 
             </div>
             <div class="what-we-bx-txt">
               <h5>{{$service->title}}</h5>
             </div>
           </div>
           @endforeach
           <!-- <div class="col-md-3 col-lg-3 col-12">
             <div class="what-we-img wow fadeInRight">
               <a href="service-det.html"><img src="images/what-we-2.jpg" alt=""></a>
               <div class="what-we-img-sm">
                 <img src="images/what-we-sm.png" alt="">
               </div> 
             </div>
             <div class="what-we-bx-txt">
               <h5>CUSTOM<span>CLEARANCE</span></h5>
             </div>
           </div>
           <div class="col-md-3 col-lg-3 col-12">
             <div class="what-we-img wow fadeInLeft">
               <a href="service-det.html"><img src="images/what-we-3.jpg" alt=""></a>
               <div class="what-we-img-sm">
                 <img src="images/what-we-sm.png" alt="">
               </div> 
             </div>
             <div class="what-we-bx-txt">
               <h5>FCL/LCL<span>CARGO</span></h5>
             </div>
           </div>
           <div class="col-md-3 col-lg-3 col-12">
             <div class="what-we-img wow fadeInRight">
               <a href="service-det.html"><img src="images/what-we-4.jpg" alt=""></a>
               <div class="what-we-img-sm">
                 <img src="images/what-we-sm.png" alt="">
               </div> 
             </div>
             <div class="what-we-bx-txt">
               <h5>TRANSPORTATION</h5>
             </div>
           </div>
            <div class="col-md-3 col-lg-3 col-12">
             <div class="what-we-img wow fadeInLeft">
               <a href="service-det.html"><img src="images/what-we-1.jpg" alt=""></a>
               <div class="what-we-img-sm">
                 <img src="images/what-we-sm.png" alt="">
               </div> 
             </div>
             <div class="what-we-bx-txt">
               <h5>NVOCC</h5>
             </div>
           </div>
           <div class="col-md-3 col-lg-3 col-12">
             <div class="what-we-img wow fadeInRight">
               <a href="service-det.html"><img src="images/what-we-2.jpg" alt=""></a>
               <div class="what-we-img-sm">
                 <img src="images/what-we-sm.png" alt="">
               </div> 
             </div>
             <div class="what-we-bx-txt">
               <h5>CUSTOM<span>CLEARANCE</span></h5>
             </div>
           </div>
           <div class="col-md-3 col-lg-3 col-12">
             <div class="what-we-img wow fadeInLeft">
              <a href="service-det.html"><img src="images/what-we-3.jpg" alt=""></a>
               <div class="what-we-img-sm">
                 <img src="images/what-we-sm.png" alt="">
               </div> 
             </div>
             <div class="what-we-bx-txt">
               <h5>FCL/LCL<span>CARGO</span></h5>
             </div>
           </div>
           <div class="col-md-3 col-lg-3 col-12">
             <div class="what-we-img wow fadeInRight">
               <a href="service-det.html"><img src="images/what-we-4.jpg" alt=""></a>
               <div class="what-we-img-sm">
                 <img src="images/what-we-sm.png" alt="">
               </div> 
             </div>
             <div class="what-we-bx-txt">
               <h5>TRANSPORTATION</h5>
             </div>
           </div> -->
         </div>
       </div>
     </section>
     <!-- what-we end -->
      <!-- true start -->
     <section class="true">
       <div class="container">
         <div class="row">
           <div class="col-md-12 col-lg-12 col-12">
             <div class="true-txt wow fadeInLeftBig">
               <h2>True fulfillment</h2>
             </div>
           </div>
           @foreach ($fulfilment as $fulfilments)
           <div class="col-md-3 col-lg-3 col-12">
            
             <div class="true-mian-bx wow fadeInLeft">
           
               <div class="true-img">
                 <img src="{{asset($fulfilments->primary_image)}}" alt="">
               </div>
               <div class="true-bx-txt">
                 <h5>{{$fulfilments->title}}</h5>
                 <p>{!! $fulfilments->description !!}</p>
               </div>
             </div>
           </div>
           @endforeach
           <!-- <div class="col-md-3 col-lg-3 col-12">
             <div class="true-mian-bx wow fadeInRight">
               <div class="true-img">
                 <img src="images/true-2.png" alt="">
               </div>
               <div class="true-bx-txt">
                 <h5>EXPORT</h5>
                 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut</p>
               </div>
             </div>
           </div>
           <div class="col-md-3 col-lg-3 col-12">
             <div class="true-mian-bx wow fadeInLeft">
               <div class="true-img">
                 <img src="images/true-3.png" alt="">
               </div>
               <div class="true-bx-txt">
                 <h5>CUSTOM<span>CLEARANCE</span></h5>
                 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut</p>
               </div>
             </div>
           </div>
           <div class="col-md-3 col-lg-3 col-12">
             <div class="true-mian-bx wow fadeInRight">
               <div class="true-img">
                 <img src="images/true-4.png" alt="">
               </div>
               <div class="true-bx-txt">
                 <h5>ROAD FREIGHT</h5>
                 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut</p>
               </div>
             </div>
           </div>
         </div>
       </div> -->
     </section>
     <!-- true end -->
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