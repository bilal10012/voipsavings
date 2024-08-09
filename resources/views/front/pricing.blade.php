@extends('layouts.front.app')
@section('title','Service')
<style>
  .package-bx {
    width: 500px; /* Set a fixed width */
    height: 700px; /* Set a fixed height */
    margin-bottom: 20px; /* Add some margin for spacing */
    /* border: 1px solid #ddd; Optional: Add a border for better visualization */
    /* box-sizing: border-box; Include padding and border in the element's total width and height */
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

</style>
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
          
       </div>
     </div>
   </section>
   <!-- packages end -->
      @endsection