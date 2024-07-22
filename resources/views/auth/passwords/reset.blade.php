@extends('layouts.front.app')
@section('title','Reset Password')
@section('css')
<style>
    .error-message{
        color:red;
    }
    .myAccountSec.inner-gallery-sec.pt-8.pb-8 {
    height: 500px;
}
.col-md-7.wow.fadeInRightBig {
    margin-left: 236px;
}
</style>
@endsection
@section('content')
@php $banner = App\Banner::where('page','Update Your Password')->first() @endphp
@php $content = App\Content::where('page','Update')->first() @endphp
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


    <section class="contact-us inner"style="background-image: url({{asset('web-assets/images/cartype-back.jpg')}});">
        <div class="container">
    <div class="col-md-7 wow fadeInRightBig" style="background-color:white;">
                    <div class="con-form1">
                        <div class="contact-form text-center">                      <h2>Update Your Password</h2>
                    <form action="{{ route('password.update') }}" method="POST">
                        @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form_area">
                    <div class="fields_area">
                    <input type="email" class="form-control" name="email"value="{{ (old('email')) ? old('email') : $email }}"  placeholder="Email"readonly>
                    </div>
  
     
                    <div class="fields_area">
                    <input type="password" class="form-control"name="password" placeholder="Enter New Password">
                    </div>
       
                    <div class="fields_area">
                    <input type="password"class="form-control" name="password_confirmation" placeholder="Re-type Your New Password">
                    </div>
                    </div>
                    <div class="fields_area buttons_area">
                    <button class="btn-1"><span>Update Your Password</span></button>
          </div>  
                </form>
                </div>
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
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "6000",
        "extendedTimeOut": "6000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    @error('email')
        toastr.error("**{{ $message }}");
    @enderror
    @error('password')
        toastr.error("**{{ $message }}");
    @enderror
</script>
@endsection
