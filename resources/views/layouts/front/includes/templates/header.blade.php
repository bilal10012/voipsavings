     <!-- <header>
         <div class="menuSec wow fadeInDown" data-wow-duration="2s">
            <div class="container">
               <div class="row" style="align-items: center;">
                  <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                     <div class="header-logo">
                        <a href="{{ route('webIndexPage') }}"><img src="{{ asset(getConfig('logo')) }}" alt="img" /></a>
                     </div>
                  </div>
                  <div class="col-md-8 d-none d-md-block">
                       <ul id="menu">
                        <li><a href="{{ route('webIndexPage') }}">Home</a></li>
                        <li>
                           <a href="{{ route('about') }}">About Us</a>
                        </li>
                        <li><a href="{{ route('service') }}"> Our Services </a></li>
                        <li><a href="{{ route('gallery') }}">Gallery</a></li>
                        <li><a href="{{ route('supplier') }}">Supplier</a></li>
                        <li><a href="{{ route('contactUsPage') }}">Contact Us</a></li>
                     </ul>
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-12">
                     <div class="menusec-btn">
                        <a href="{{ route('contactUsPage') }}" class="theme-btn-1">Get Estimate <span> <img src="{{ asset('web-assets/images/button-arrow.jpg') }}" alt="img"> </span></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </header> -->




     {{-- ----------------- VOIP SAVINGS START -------------------------------- --}}




     <header>
         <!-- <div class="topSec">
          <div class="container">
            <div class="row">
              <div class="col-md-3 col-sm-3 col-xs-12 ">
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12 ">
                <ul class="">
                  <li><a href="#"> </a></li>
                  <li><a href="#"></a></li>
                </ul>
              </div>
              <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
              </div>
            </div>
          </div>
        </div> -->
         <div class="menuSec">
             <div class="container">
                 <div class="row">
                     <div class="col-md-3 col-sm-6 col-xs-6">
                         <div class="mobilecontainer ">
                             <span class="pull-right" onclick="openNav()" style="font-size:30px;cursor:pointer"><img
                                     src="{{ asset ('web-assets/images/nav-lines.png') }}"></span>
                         </div>
                         <div class="sidenav" id="mySidenav" style="left: -250px;;">
                             <a class="closebtn" href="javascript:void(0)" onclick="closeNav()">×</a>
                             <a href="{{ route('webIndexPage') }}">HOME</a>
                             <a href="{{ route('about') }}">About Us</a>
                             <a href="{{ route('service') }}">SERVICES</a>
                             <a href="{{ route('pricing') }}">PRICING</a>>
                             <a href="{{ route('contactUsPage') }}">Contact</a>
                         </div>
                     </div>
                     <div class="col-md-6 d-none d-md-block">
                         <div class="head-logo">
                             <a href="{{ route('webIndexPage') }}"><img src="{{ asset(getConfig('logo')) }}" alt="img"></a>
                         </div>
                     </div>
                     <div class="col-md-3 col-sm-6 col-xs-6 text-right">
                         <div class="head-btn">
                             <a href="{{ route('contactUsPage') }}" class="theme-btn">Contact Us</a>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </header>
