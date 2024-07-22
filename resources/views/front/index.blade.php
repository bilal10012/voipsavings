@extends('layouts.front.app')
@section('title','Home')
@section('css')
@endsection
@section('content')
   <section class="main_slider">
      <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
         @foreach($banner as $key=> $ban )
          <div class="carousel-item {{($key == 0)?'active':''}}">
            <img src="{{asset($ban->image)}}" class="img-fluid" alt="...">
            <div class="carousel-caption">
              <div class="container">
                <div class="row">
                  <div class="col-xs-12 col-sm-6 col-md-6 align-self-center">
                    <div class="banner_text wow fadeInLeft" data-wow-duration="2s">
                      <h1>{{$ban->title}}
                      </h1>
                      <p>{{$ban->text}}</p>
                      <ul>
                        <li>
                          <div class="ankar">
                            <a href="javascript::void(0)">Contact</a>
                          </div>
                        </li>
                        <li>
                          <a href="javascript::void(0)">Services</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach

        </div>
      </div>
    </section>
    <!-- banner end -->
    <!-- fulfil start -->
    <section class="fulfil">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-12 col-12">
            <div class="fulfil-txt wow fadeInLeft" data-wow-duration="2s">
              <h2>{{$section1->title}}</h2>
            </div>
          </div>

          {!! $section1->description !!}
          <!-- <div class="col-md-6 col-lg-6 col-12 wow fadeInLeftBig" data-wow-duration="2s">
             <ul class="fulfil on">
               <li><img src="images/fulfil-sm-1.png" alt=""></li>
               <li><p>Shipping with costs 70% less per unit than comparable premium options offered by other US fulfillment services.</p></li>
             </ul>
             <ul class="fulfil">
               <li><img src="images/fulfil-sm-3.png" alt=""></li>
               <li><p>Our network includes hundreds of fulfillment centers worldwide and can help you reach customers around the globe.</p></li>
             </ul>
          </div>
           <div class="col-md-6 col-lg-6 col-12 wow fadeInRightBig" data-wow-duration="2s">
             <ul class="fulfil on">
               <li><img src="images/fulfil-sm-2.png" alt=""></li>
               <li><p>To deliver orders with the speed and reliability customers love. That can help you increase sales and repeat purchases.</p></li>
             </ul>
             <ul class="fulfil">
               <li><img src="images/fulfil-sm-4.png" alt=""></li>
               <li><p>Instead of spending time processing orders, handling customer inquiries, and managing returns,  to focus on developing products and delighting customers.</p></li>
             </ul>
          </div> -->
        </div>
      </div>
    </section>
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
                 
                   <img src="images/brand-8.png" alt="" class="brand-1" />
                
               </div>
             </div>
             <div>
               <div class="brand-text">
                 
                   <img src="images/brand-1.png" alt="" class="brand-1" />
                 
               </div>
             </div>
             <div>
               <div class="brand-text">
                 
                   <img src="images/brand-2.png" alt="" class="brand-1" />
                 
               </div>
             </div>
             <div>
               <div class="brand-text">
                 
                   <img src="images/brand-3.png" alt="" class="brand-1" />
                 
               </div>
             </div>
             <div>
               <div class="brand-text">
                
                   <img src="images/brand-4.png" alt="" class="brand-1" />
                
               </div>
             </div>
             <div>
               <div class="brand-text">
                 
                   <img src="images/brand-5.png" alt="" class="brand-1" />
                
               </div>
             </div>
             <div>
               <div class="brand-text">
                 
                   <img src="images/brand-6.png" alt="" class="brand-1" />
                
               </div>
             </div>
             <div>
               <div class="brand-text">
                 
                   <img src="images/brand-7.png" alt="" class="brand-1" />
                 
               </div>
             </div>
             <div>
               <div class="brand-text">
                 
                   <img src="images/brand-8.png" alt="" class="brand-1" />
                 
               </div>
             </div>
           </div>
         </div>
        </div>
      </div>
    </section>
    <!-- brand end -->
    <!-- ship start -->
    <section class="ship"> 
      <div class="container">
        <div class="row">
          <div class="col-md-7 col-lg-7 col-12">
            <div class="ship-txt wow fadeInLeftBig" data-wow-duration="2s">
              <h3>Ship Worldwide <span>3-Day, 2-Day, Next-Day</span></h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                         <div class="ankar">
                            <a href="#">Explore Us</a>
                          </div>
            </div>
          </div>
          <div class="col-lg-5 col-md-5 col-12">
            <div class="ship-img wow fadeInRightBig" data-wow-duration="2s">
              <img src="images/ship.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </section>
     <!-- ship end -->
     <!-- experience start -->
     <section class="experience wow bounceIn">
       <div class="container">
         <div class="row">
           <div class="col-md-4 col-lg-4 col-12">
             <div class="exp-txt">
               <h3>260K</h3>
               <p>Business Grow</p>
             </div>
           </div>
           <div class="col-md-4 col-lg-4 col-12">
             <div class="exp-txt">
               <h3>20</h3>
               <p>Years Experience</p>
             </div>
           </div>
           <div class="col-md-4 col-lg-4 col-12">
             <div class="exp-txt">
               <h3>100+</h3>
               <p>Shippment Parcel</p>
             </div>
           </div>
         </div>
       </div>
     </section>
     <!-- experience end -->
     <!-- what-we start -->
     <section class="what-we">
       <div class="container">
         <div class="row">
           <div class="col-md-12 col-lg-12 col-12">
             <div class="what-we-txt wow fadeInUpBig" data-wow-duration="2s">
               <h3>What We Serve</h3>
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
           </div>
         </div>
       </div>
     </section>
     <!-- what-we end -->
     <!-- faq start -->
     <section class="faqs">
       <div class="container">
         <div class="row"> 
           <div class="col-md-4 col-lg-4 col-12">
             <div class="faq-txt wow fadeInLeftBig" data-wow-duration="2s">
               <h3>Faqs</h3>
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis n</p>
             </div>
           </div>
           <div class="col-md-8 col-lg-8 col-12">
             <div class="accordion accordion-flush wow fadeInRightBig" data-wow-duration="2s" id="accordionFlushExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingOne">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
       how can i pay my appointment
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in .</div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
        what are your opening hours?
      </button>
    </h2>
    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
        waht is your cancellation policy?
      </button>
    </h2>
    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in .</div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingFour">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseThree">
        what are the parking and public transport options?
      </button>
    </h2>
    <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in .</div>
    </div>
  </div>
</div>
           </div>
         </div>
       </div>
     </section>
     <!-- faq end -->
     <!-- dilivery start -->
     <section class="dilivery">
       <div class="container">
         <div class="row align-items-center">
           <div class="col-md-6 col-lg-6 col-12">
             <div class="dilivery-txt wow fadeInDownBig" data-wow-duration="2s">
               <h3>Effortless Delivery <span>With Our Logistic</span>Solutions</h3>
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
               <div class="ankar">
                  <a href="#">Explore Us</a>
               </div>
             </div>
           </div>
         </div>
       </div>
     </section>
     <!-- dilivery end -->
     <!-- true start -->
     <section class="true">
       <div class="container">
         <div class="row">
           <div class="col-md-12 col-lg-12 col-12">
             <div class="true-txt wow fadeInLeftBig">
               <h2>True fulfillment</h2>
             </div>
           </div>
           <div class="col-md-3 col-lg-3 col-12">
             <div class="true-mian-bx wow fadeInLeft">
               <div class="true-img">
                 <img src="images/true-1.png" alt="">
               </div>
               <div class="true-bx-txt">
                 <h5>IMPORT</h5>
                 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut</p>
               </div>
             </div>
           </div>
           <div class="col-md-3 col-lg-3 col-12">
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
       </div>
     </section>
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
                    <div>
                      <div class="testimonial-back">
                        <div class="testimonial-box ">
                            <div class="testimonial-imag ">
                                <img src="images/ts-1.jpg " alt=" " class="ts-1 " />
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
                      </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<script>
   vhjhvvvvvv
</script>
@endsection
