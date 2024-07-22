@extends('layouts.front.app')
@section('title','About Us')

@section('content')
 <!-- banner start -->
 
    <!-- Banner Start -->
    <section class="main_slider inner">
         <div
            id="carouselExampleControls"
            class="carousel slide"
            data-bs-ride="carousel"
            >
            <!-- <div class="carousel-indicators">
               <div
                  data-bs-target="#carouselExampleControls"
                  data-bs-slide-to="0"
                  class="active"
                  aria-current="true"
                  aria-label="Slide 1"
                  >1</div>
               <div
                  data-bs-target="#carouselExampleControls"
                  data-bs-slide-to="1"
                  aria-label="Slide 2"
                  >2</div>
               <div
                  data-bs-target="#carouselExampleControls"
                  data-bs-slide-to="2"
                  aria-label="Slide 3"
                  ></div>
               </div> -->
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <img src="{{asset($banner->image)}}" class="img-fluid" alt="..." />
                  <div class="carousel-caption">
                     <div class="container">
                        <div class="row">
                           <div class="col-lg-12 col-sm-12 col-md-12 align-self-center">
                              <div
                                 class="banner_text wow fadeInRight" data-wow-duration="2s"
                                 >
                                 <h1 class="btn-shine">{{$banner->title}}</h1>
                                 <p>
                                 {{$banner->text}}
                              </p>
                                 
                              </div>
                           </div>
                           <div class="col-sm-6 col-md-6 align-self-center">
                              <div class="banner_img wow bounceIn" data-wow-duration="2s">
                                 <img src="images/dam_4.jpg" class="img-fluid" alt="" />
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!--  <button
               class="carousel-control-prev"
               type="button"
               data-bs-target="#carouselExampleControls"
               data-bs-slide="prev"
               >
               <span class="carousel-control-prev-icon" aria-hidden="true"></span>
               <span class="visually-hidden">Previous</span>
               </button>
               <button
               class="carousel-control-next"
               type="button"
               data-bs-target="#carouselExampleControls"
               data-bs-slide="next"
               >
               <span class="carousel-control-next-icon" aria-hidden="true"></span>
               <span class="visually-hidden">Next</span>
               </button> -->
         </div>
         <div class="socail-link wow fadeInLeft" data-wow-duration="2s">
         <ul>
               <li><a href="{{getConfig('twitter')}}"><i class="fab fa-twitter"></i></a></li>
               <li><a href="{{getConfig('facebook')}}"><i class="fab fa-facebook-f"></i></a></li>
               <li><a href="{{getConfig('insta')}}"><i class="fab fa-instagram"></i></a></li>
               <li><a href="{{getConfig('link')}}"><i class="fab fa-linkedin-in"></i></a></li>
            </ul>
         </div>
      </section>
      <!-- Banner End -->








       <!-- About Start -->
      <section>
         <div class="about-sec">
            <div class="container">
               <div class="row">
                  <div class="col-lg-4 col-md-4 col-12">
                     <div class="about-us-text wow fadeInLeft" data-wow-duration="2s">
                        <h2>{{$about->title}}</h2>
                       {!!$about->description!!}
                     </div>
                  </div>
                  <div class="col-lg-8 col-md-8 col-12">
                     <div class="about-us-img wow fadeInRight" data-wow-duration="2s">
                        <img src="{{asset($about->primary_image)}}" alt="img">
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- About End -->



      <section>
        <div class="ticket-sec">
          <div class="container">
            <div class="row">
              <div class="col-lg-8 col-md-8 col-12 wow bounceIn" data-wow-duration="2s">
                <img src="{{asset($about->secondary_image)}}" alt="img">
              </div>
            </div>
          </div>
        </div>
      </section>









      <!-- Work We Have Done Start -->
      <section>
         <div class="work-we-have-done-sec">
            <div class="container">
               <div class="row">
                  <div class="col-lg-12 col-md-12 col-12" style="text-align: center;">
                     <div class="work-we-have-done-heading wow bounceIn" data-wow-duration="2s">
                        <h2>{{$work_content->title}}</h2>
                        <p>{{$work_content->subtitle}}</p>
                     </div>
                  </div>
               </div>
               <div class="work-we-have-done-row">
                 <div class="row">
                   <div class="col-lg-12 col-md-12 col-12">
                     <div class="maiun_banner_slider">
                     <div id="Carousel">
                        <ul class="flipster">
                           @foreach($our_work as $our_works)
                           <li >
                              <img src="{{asset($our_works->primary_image)}}" alt="...">
                           </li>
                         @endforeach
                        </ul>
                     </div>
                  </div>
                   </div>
                 </div>
               </div>
                 <div class="anniversary-row">
                  <div class="row">
                     <div class="col-lg-12 col-md-12 col-12">
                        <div class="anniversary-box wow bounceIn" data-wow-duration="2s">
                           <img src="{{asset($about_2->primary_image)}}"style="height:241px;widht:330px;" alt="img">
                           <h2>{{$about_2->subtitle}}</h2>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Work We Have Done End -->



       <!-- Why Choose Start -->
      <section>
         <div class="about-sec why-chosse inner">
            <div class="container">
               <div class="row">
                  <div class="col-lg-8 col-md-8 col-12">
                     <div class="about-us-img Why-chosse wow fadeInLeft" data-wow-duration="2s">
                        <img src="{{asset($about_3->primary_image)}}" alt="img">
                     </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-12">
                     <div class="about-us-text why-chosse wow fadeInRight" data-wow-duration="2s">
                        <h2>{{$about_3->title}}</h2>
                        {!!$about_3->short_description!!}
                        <!-- <div class="why-chosse-btn">
                           <a href="javascript::"  class="theme-btn-1">READ MORE <span> <img src="images/button-arrow.jpg" alt="img"> </span></a>
                        </div> -->
                     </div>
                  </div>
               </div>
              
            </div>
         </div>
         <div class="container">
             <div class="why-chosse-bottom-row">
                  <div class="row">
                     <div class="col-lg-12 col-md-12 col-12">
                        <p>{!!$about_3->description!!}</p>
                     </div>
                  </div>
               </div>
         </div>
      </section>
      <!-- Why Choose End -->

     

      <!-- Footer Start -->

@endsection
@section('js')
@endsection