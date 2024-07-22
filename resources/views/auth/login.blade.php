<!DOCTYPE html>
<html>
<head>
    <link href="{{ asset('web-assets/fontawesome5/css/all.min.css') }}" rel="stylesheet">
<link href="{{ asset('web-assets/slick/slick-theme.css') }}" rel="stylesheet" type="text/css" >
<link href="{{ asset('web-assets/slick/slick.css') }}" rel="stylesheet" type="text/css" >
<link href="{{ asset('web-assets/css/slicknav.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('web-assets/css/fancybox.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('web-assets/css/bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('web-assets/css/custom.css') }}" rel="stylesheet" >
<link href="https://fonts.googleapis.com/css2?family=Marcellus&display=swap" rel="stylesheet">
<link rel="icon" type="image/png" sizes="192x192" href="{{ asset(getConfig('favicon')) }}">
    <title> Login Page | {{ getConfig('website_name') }}</title>
</head>
<body  style="background-color:black;">
<style type="text/css">
    .wrapper {
  display: flex;
  align-items: center;
  flex-direction: column; 
  justify-content: center;
  width: 100%;
  min-height: 100%;
  padding: 20px;
}

#formContent {
  -webkit-border-radius: 10px 10px 10px 10px;
  border-radius: 10px 10px 10px 10px;
  background: #fff;
  padding: 30px;
  width: 90%;
  max-width: 550px;
  position: relative;
  padding: 0px;
  -webkit-box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
  box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
  text-align: center;
}

/* FORM TYPOGRAPHY*/

.form-button input{
  background-color: black;
  border: none;
  color: white;
  padding: 15px 80px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  text-transform: uppercase;
  font-size: 13px;
  -webkit-box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
  box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
  margin: 5px 20px 40px 20px;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  -ms-transition: all 0.3s ease-in-out;
  -o-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
}

/* .form-button input:hover {
  background-color: #0080b0;
  color: #8b3a7f;
} */

.form-button input:active {
  -moz-transform: scale(0.95);
  -webkit-transform: scale(0.95);
  -o-transform: scale(0.95);
  -ms-transform: scale(0.95);
  transform: scale(0.95);
}

.form-input input {
  background-color: #f6f6f6;
  border: none;
  color: #0d0d0d;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 5px;
  width: 85%;
  border: 2px solid #f6f6f6;
  -webkit-transition: all 0.5s ease-in-out;
  -moz-transition: all 0.5s ease-in-out;
  -ms-transition: all 0.5s ease-in-out;
  -o-transition: all 0.5s ease-in-out;
  transition: all 0.5s ease-in-out;
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
}

.form-input input:focus {
  background-color: #fff;
  border-bottom: 2px solid black;
}

.form-input input:placeholder {
  color: #cccccc;
}
/* ANIMATIONS */

/* Simple CSS3 Fade-in-down Animation */
.fadeInDown {
  -webkit-animation-name: fadeInDown;
  animation-name: fadeInDown;
  -webkit-animation-duration: 1s;
  animation-duration: 1s;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
}

@-webkit-keyframes fadeInDown {
  0% {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }
  100% {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
  }
}

@keyframes fadeInDown {
  0% {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }
  100% {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
  }
}

/* Simple CSS3 Fade-in Animation */
@-webkit-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
@-moz-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
@keyframes fadeIn { from { opacity:0; } to { opacity:1; } }

.fadeIn {
  opacity:0;
  -webkit-animation:fadeIn ease-in 1;
  -moz-animation:fadeIn ease-in 1;
  animation:fadeIn ease-in 1;

  -webkit-animation-fill-mode:forwards;
  -moz-animation-fill-mode:forwards;
  animation-fill-mode:forwards;

  -webkit-animation-duration:1s;
  -moz-animation-duration:1s;
  animation-duration:1s;
}

.fadeIn.first {
  -webkit-animation-delay: 0.4s;
  -moz-animation-delay: 0.4s;
  animation-delay: 0.4s;
  background-color: #ffffff;
  padding: 10px 10px;
}

.fadeIn.second {
  -webkit-animation-delay: 0.6s;
  -moz-animation-delay: 0.6s;
  animation-delay: 0.6s;
}

.fadeIn.third {
  -webkit-animation-delay: 0.8s;
  -moz-animation-delay: 0.8s;
  animation-delay: 0.8s;
}

.fadeIn.fourth {
  -webkit-animation-delay: 1s;
  -moz-animation-delay: 1s;
  animation-delay: 1s;
}

.underlineHover:after {
  display: block;
  left: 0;
  bottom: -10px;
  width: 0;
  height: 2px;
  background-color: #56baed;
  content: "";
  transition: width 0.2s;
}

.underlineHover:hover {
  color: #0d0d0d;
}

.underlineHover:hover:after{
  width: 100%;
}

input::placeholder {
    color: #47476dab !important;
    opacity: 1;
    font-weight: 400 !important;
}

/* OTHERS */
*:focus {
  outline: none;
}
#icon {
    width: 150px;
    height: 85px;
}
section.contact_page {
    height: 100vh;
    display: flex;
    align-items: center;
}
</style>

<section class="contact_page">
    <div class="container">
        <div class="row">
            <div class="wrapper fadeInDown">
                <div id="formContent">
                    <div class="fadeIn first">
                        <!-- <video autoplay muted loop src="{{ asset(getConfig('logo')) }}" style="width:120px;"></video> -->
                        <img src="{{getConfig('logo') }}"style="width:200px;"alt="User Icon" />
                    </div>
                    @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                      {{ $errors->first() }}
                    </div>
                    @endif
                    <form action="{{ route('login') }}" method="POST" class="admin-login-form">
                        @csrf
                        <div class="form-input">
                          <input type="email" id="email" class="fadeIn second" name="email" placeholder="Email" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" autofocus value="{{ old('email') }}"required>
                          @error('email')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                        <div class="form-input">
                          <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
                          @error('password')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                        <div>
                        <input type="checkbox" value="lsRememberMe" id="rememberMe"> <label for="rememberMe">Remember me</label>
                        </div>
                        <div class="form-button">
                          <input type="submit" class="btn_wht" value="Log In"onclick="lsRememberMe()">
                        </div>
                        <div class="form-btm">
                        
                        <!-- <a href="{{ route('password.request') }}">Forgot Password?</a> -->
                        
				<!-- <p class="forgot resetPass"><a data-toggle="modal" href="{{ route('password.request') }}"style="color:#a5be2f;" >Forgot Password?</a></p> -->
        <!-- <p>Don't have an Account?
                                <a href="{{route('register')}}" class="d-inline-block">Create One</a>
                                </p> -->
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
<script>
  const rmCheck = document.getElementById("rememberMe"),
    emailInput = document.getElementById("email");

if (localStorage.checkbox && localStorage.checkbox !== "") {
  rmCheck.setAttribute("checked", "checked");
  emailInput.value = localStorage.username;
} else {
  rmCheck.removeAttribute("checked");
  emailInput.value = "";
}

function lsRememberMe() {
  if (rmCheck.checked && emailInput.value !== "") {
    localStorage.username = emailInput.value;
    localStorage.checkbox = rmCheck.value;
  } else {
    localStorage.username = "";
    localStorage.checkbox = "";
  }
}
</script>