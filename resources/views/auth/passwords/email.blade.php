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
<!-- inner-banner -->
@php $banner = App\Banner::where('page','Reset Password')->first() @endphp
@php $content = App\Content::where('page','Reset')->first() @endphp

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
                        <div class="contact-form text-center">  
                    <form id="resetForm" action="{{ route('password.email') }}" method="POST">
                        @csrf
                    <h2>Reset Your Password</h2>
                    @if (session('status'))
                        <div class="alert alert-success text-center" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="fields_area">
                    <input type="email"class="form-control"  name="email" value="{{ old('email') }}" placeholder="Email">
                </div>
                    @error('email')
                    <p class="error-message">**{{ $message }}</p>
                    @enderror
             
                    <div class="fields_area buttons_area">
                    <button class="btn-1"  type="button"onclick="submitResetForm()"><span>Send Reset Password Link</span></button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
  function submitResetForm() {
    $('.error-message').text('');

    var formData = {
        email: $('input[name="email"]').val(),
        _token: $('input[name="_token"]').val(),
    };

    $.ajax({
        type: 'POST',
        url: $('#resetForm').attr('action'),
        data: formData,
        dataType: 'json',
        success: function (data) {
            // Handle success (e.g., display success message)
            console.log('Reset link sent successfully!');
            toastr.success('Reset link sent successfully!');
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

