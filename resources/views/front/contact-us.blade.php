@extends('layouts.front.app')
@section('title','Contact Us')


@section('content')

    <!-- header strat -->
    <!-- banner start -->
    <section class="inner-banner">
      <img src="{{ asset('web-assets/images/inner-bann.jpg') }}" alt="">

      <div class="inn-bann-txt">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-lg-8 col-12">
            <h1>Contact</h1>
          </div>
        </div>
      </div>
    </div>
    </section>
    <!-- banner end -->
    <!-- contact page start -->
    <section class="contact-pg">
      <div class="container">
        <div class="row">
          <div class="col-lg-7 col-md-7 col-12">
            <form method="POST" action="{{ route('contactUsPage') }}">
                @csrf
            <div class="cont-form">
              <div class="row">
                <div class="col-md-12 col-lg-12 col-12">
                  <input type="name" name="inquiry_first_name" placeholder="ENTER YOUR NAME">
                </div>
                <div class="col-md-12 col-lg-12 col-12">
                  <input type="mial" name="inquiry_email" placeholder="ENTER EMAIL ADDRESS">
                </div>
                <div class="col-md-12 col-lg-12 col-12">
                 <textarea name="message">MESSAGE</textarea>
                </div>
                <button>SEND</button>
              </div>
            </div>
            </form>
          </div>
          <div class="col-lg-5 col-md-5 col-12">
            <div class="cont-txt">
              <h2>CONTACT <span>US</span></h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- contact page end -->
      
@endsection