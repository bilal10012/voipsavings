@extends('layouts.front.app')
@section('title','Account Registration')
@section('css')
<style>
        .myAccountSec.inner-gallery-sec.pt-8.pb-8 {
    height: 500px;
}
.col-md-7.wow.fadeInRightBig {
    margin-left: 236px;
}
</style>
@endsection
@section('content')
@php $banner = App\Banner::where('page','Register')->first() @endphp
@php $content = App\Content::where('page','Register')->first() @endphp
<!-- inner-banner -->


    <!-- Section Inner Banner Start -->
    <section>
      <div class="innerbanner"style="background-image: url({{asset($banner->image)}});">
        <div class="container">
          <div class="row">
            <div class="col-md-5 col-lg-5 col-12">
              <div class="text-innerbanner wow bounceInLeft" data-wow-duration="2s">
                <h1>{{$banner->title}}</h1>
              </div>
            </div>
            <div class="col-md-7 col-lg-7 col-12">
              <div class="img-innerbanner wow bounceIn" data-wow-duration="2s">
                <img src="{{asset($banner->image_2)}}">
              </div>
            </div>
          </div> 
        </div>
      </div>
    </section>
<!--     
<div class="breadcrumb-section pt-40 pb-40" data-background="assets/images/shapes/breadcrumb-bg.jpg">
        <div class="container">
            <p class="breadcrumb-text fw-light mb-0"><a href="{{route('webIndexPage')}}">Home</a> / <span class="primary-text-color"> {{$banner->text}}</span></p>
        </div>
    </div>

    <div class="login-area ptb-150 bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                <form class="theme-form" action="{{ route('register') }}" method="POST">
                    @csrf
                    <h3 class="mb-40">Create Account</h3>
                    <div class="row">
                      
                            <input type="text" name="first_name" class="theme-input" value="{{ old('first_name') }}" placeholder="First Name">
                            @error('first_name')
                            <p class="error-message"style="color:red;">**{{ $message }}</p>
                            @enderror
                      
                            <input type="text" name="last_name" class="theme-input" value="{{ old('last_name') }}" placeholder="Last Name">
                            @error('last_name')
                            <p class="error-message"style="color:red;">**{{ $message }}</p>
                            @enderror
               
               
                    <input type="text" name="contact" id="reg_contact" class="theme-input" value="{{ old('contact') }}" placeholder="Contact Number">
                    @error('contact')
                    <p class="error-message"style="color:red;">**{{ $message }}</p>
                    @enderror
               
           
                    <input type="email" name="email" placeholder="Email Address" class="theme-input" value="{{ old('email') }}">
                    @error('email')
                    <p class="error-message"style="color:red;">**{{ $message }}</p>
                    @enderror
                   
            
                    <input type="password" name="password" placeholder="Password" class="theme-input">
                    @error('password')
                    <p class="error-message" style="color:red;">**{{ $message }}</p>
                    @enderror
               
                  
                    <input type="password" name="password_confirmation" placeholder="Retype Password" class="theme-input">
                    <div class="forgot-password d-flex align-items-center justify-content-between gap-2 mt-32">
                            <label class="mb-0"><input type="checkbox"> Accept The Terms and Privacy Policy</label>
                        </div>
                    <button class="template-btn primary-btn w-100 mt-32" ><span>Signup</span></button>
                    <p class="mb-0 mt-32">Already have an account? <a href="{{route ('login')}}" class="secondary-text-color">Login</a></p>
                </form>
            </div>
        </div>
    </div>
    </div> -->
    <section class="contact-us inner">
        <div class="container">
    <div class="col-md-7 wow fadeInRightBig">
                    <div class="con-form1">
                        <div class="contact-form">
                            <div class="row">
                                <div class="col-lg-12 col-md-6 col-sm-6">
                                    <div class="contact-form-title">
                                        <h3>Create A New Account </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-6 col-sm-6">
                           
                            <form id="registrationForm" action="{{ route('register') }}" method="POST">
                            @csrf
                                <div class="input-group input-group-two mb-20">
                                <input type="text" name="first_name" class="theme-input" value="{{ old('first_name') }}" placeholder="First Name">
                                @error('first_name')
                            <p class="error-message"style="color:red;">**{{ $message }}</p>
                            @enderror
                            </div>
                                <div class="input-group input-group-two mb-20">
                                <input type="text" name="last_name" class="theme-input" value="{{ old('last_name') }}" placeholder="Last Name">
                                @error('last_name')
                            <p class="error-message"style="color:red;">**{{ $message }}</p>
                            @enderror
                            </div>
                                <div class="input-group input-group-two mb-20">
                                <input type="text" name="contact" id="reg_contact" class="theme-input Phone" value="{{ old('contact') }}" placeholder="Contact Number">
                                @error('contact')
                    <p class="error-message"style="color:red;">**{{ $message }}</p>
                    @enderror
                            </div>
                                <div class="input-group input-group-two mb-20">
                                <input type="email" name="email" placeholder="Email Address" class="theme-input" value="{{ old('email') }}">
                                @error('email')
                    <p class="error-message"style="color:red;">**{{ $message }}</p>
                    @enderror
                            </div>
                            <div class="input-group input-group-two mb-20">
                                <input type="text" name="address_1" placeholder=" Address" class="theme-input" value="{{ old('address_1') }}">
                                @error('address_1')
                    <p class="error-message"style="color:red;">**{{ $message }}</p>
                    @enderror
                            </div>
                                <div class="input-group input-group-two mb-30">
                                <input type="password" name="password" placeholder="Password" class="theme-input">
                    @error('password')
                    <p class="error-message" style="color:red;">**{{ $message }}</p>
                    @enderror
                                </div>

                                <div class="input-group input-group-two mb-30">
                                <input type="password" name="password_confirmation" placeholder="Retype Password" class="theme-input">
                    @error('password')
                    <p class="error-message" style="color:red;">**{{ $message }}</p>
                    @enderror
                                </div>
                                <button style="margin-bottom:30px;" type="button"onclick="submitForm()" class="btn-1">Signup</button>
                           
                                
                                <p>Already have an Account?
                                <a href="{{route ('login')}}" class="d-inline-block">Login</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js"></script>
<script type="text/javascript">
      var cleave = new Cleave('.Phone', {

numericOnly: true,

delimiters: ['-', '-', ' '],

blocks: [3, 3, 4]

});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
function submitForm() {
    $('.error-message').text('');

    var formData = $('#registrationForm').serialize();  // Use serialize() to collect form data

    $.ajax({
        type: 'POST',
        url: $('#registrationForm').attr('action'),
        data: formData,
        dataType: 'json',
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
        success: function (data) {
          toastr.success('You have Registered Successfully.');
          setTimeout(function(){
            window.location.href = '{{ route('login') }}';// Reload the page
}, 3000); // Reload the page after successful submission
            // Handle success (e.g., redirect, display success message)
        },
        error: function (data) {
            // Log the entire response to the console
            console.log(data);

            if (data && data.responseJSON && data.responseJSON.errors) {
                var errors = data.responseJSON.errors;

                // Loop through errors and display Toastr messages
                $.each(errors, function (key, value) {
                    toastr.error(value[0]);
                });
            } else {
                toastr.error('An unexpected error occurred.');
            }
        }
    });
}
</script>

@endsection