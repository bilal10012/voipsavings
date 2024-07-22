@extends('layouts.front.app')
@section('title','Service')

@section('content')
<section class="inner-banner">
<img src="{{ asset('web-assets/images/inner-bann.jpg') }}" alt="">
<div class="inn-bann-txt">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-lg-8 col-12">
            <h1>Pricing</h1>
          </div>
        </div>
      </div>
    </div>
    </section>
    <!-- banner end -->
   <!-- packages start -->
   <section class="packages">
     <div class="container">
       <div class="row">
         <div class="col-md-12 col-lg-12 col-12">
           <div class="package-txt">
             <h3>Package Pricing</h3>
           </div>
         </div>
         @foreach ($pricing as $price)
         <div class="col-lg-4 col-md-4 col-12">
  
        <div class="package-bx">
            <div class="package-up">
                <h4>{{ $price->title }}</h4>
                <div class="price">
                    <h4>{{ $price->price }}/<span>MONTHLY</span></h4>
                </div>
                <ul class="pricing-list">
                        {!!$price->description !!}
                </ul>
            </div>
            <div class="ankar">
                <a href="#">Purchase Now</a>
            </div>
        </div>
    
</div>
@endforeach
          <!-- <div class="col-lg-4 col-md-4 col-12"> 
           <div class="package-bx">
             <div class="package-up">
               <h6>Gold Price</h6>
               <h4>STANDARD</h4>
               <div class="price">
                <h4>39.00/<span>MONTHLY</span></h4> 
               </div>
               <ul>
                 <li><img src="images/check.png" alt=""><h6>Lorem Ipsum</h6></li>
                 <li><img src="images/check.png" alt=""><h6>Lorem Ipsum</h6></li>
                 <li><img src="images/check.png" alt=""><h6>Lorem Ipsum</h6></li>
                 <li><img src="images/check.png" alt=""><h6>Lorem Ipsum</h6></li>
                 <li><img src="images/check.png" alt=""><h6>Lorem Ipsum</h6></li>
                 <li><img src="images/check.png" alt=""><h6>Lorem Ipsum</h6></li>
               </ul>
             </div>
             <div class="ankar">
                <a href="#">Purchase Now</a>
              </div>
           </div>
         </div>
          <div class="col-lg-4 col-md-4 col-12"> 
           <div class="package-bx">
             <div class="package-up">
               <h6>Gold Price</h6>
               <h4>STANDARD</h4>
               <div class="price">
                <h4>39.00/<span>MONTHLY</span></h4> 
               </div>
               <ul>
                 <li><img src="images/check.png" alt=""><h6>Lorem Ipsum</h6></li>
                 <li><img src="images/check.png" alt=""><h6>Lorem Ipsum</h6></li>
                 <li><img src="images/check.png" alt=""><h6>Lorem Ipsum</h6></li>
                 <li><img src="images/check.png" alt=""><h6>Lorem Ipsum</h6></li>
                 <li><img src="images/check.png" alt=""><h6>Lorem Ipsum</h6></li>
                 <li><img src="images/check.png" alt=""><h6>Lorem Ipsum</h6></li>
               </ul>
             </div>
             <div class="ankar">
                <a href="#">Purchase Now</a>
              </div>
           </div>
         </div> -->
       </div>
     </div>
   </section>
   <!-- packages end -->
      @endsection