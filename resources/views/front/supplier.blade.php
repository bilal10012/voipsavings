@extends('layouts.front.app')
@section('title','Suppliers')

@section('content')
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

                                 {{$banner->text}}                              </p>
                                 
                              </div>
                           </div>
                           <div class="col-sm-6 col-md-6 align-self-center">
                              <div class="banner_img wow bounceIn" data-wow-duration="2s">
                                 <img src="{{asset('web-assets/images/dam_4.jpg')}}" class="img-fluid" alt="" />
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


      <!-- Links Start -->


      <section>
        <div class="links-sec">
          <div class="container">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-12">
                <div class="links-heading" style="text-align: center;">
                  <h2>{{$suuplier_content->title}}</h2>
                  <p>{{$suuplier_content->subtitle}}</p>
                </div>
              </div>
            </div>
            <div class="links-row">
              <div class="row">
               @foreach($suppliers as $supplier)
                <div  class="col-lg-6 col-md-6 col-12">
                  <div class="links-box">
                    <img src="{{asset($supplier->primary_image)}}" alt="img">
                    <h2>{{$supplier->designation}}</h2>
                    <a href="javascript::">{{$supplier->name}}</a>

                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </section>

  

@endsection
@section('js')
@endsection