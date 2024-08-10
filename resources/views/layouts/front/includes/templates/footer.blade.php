    <!-- <footer>
        <div class="footer-sec">
          <div class="container">
            <div class="row">
              <div class="col-lg-4 col-md-4 col-12">
                <div class="footer-contact-info wow fadeInUp" data-wow-duration="2s">
                  <h2>Contact Info</h2>
                  <ul class="contact-phone">
                    <li><a href="javascript::"><i class="fas fa-map-marker-alt"></i>{{ getConfig('address') }}</a></li>
                    <li><a href="Tel:{{ getConfig('contact') }}"> <i class="fas fa-phone-alt"></i> {{ getConfig('contact') }}</a></li>
                  </ul>
                  <h3>Toll Free</h3>
                  <a href="Tel:{{ getConfig('toll') }}">{{ getConfig('toll') }}</a>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-12">
               <div class="ftr-number wow fadeInDown" data-wow-duration="2s">
                 <div class="olympia">
                 <h2>Olympia</h2>
                 <a href="Tel:{{ getConfig('olympia') }}">{{ getConfig('olympia') }}</a>
               </div>
                <div class="olympia">
                 <h2>Centralia</h2>
                 <a href="Tel:{{ getConfig('centralia') }}">{{ getConfig('centralia') }}</a>
               </div>
                <div class="olympia">
                 <h2>Yelm   </h2>
                 <a href="Tel:{{ getConfig('yelm') }}">{{ getConfig('yelm') }}</a>
               </div>
               </div>
              </div>
                 <div class="col-lg-4 col-md-4 col-12">
               <div class="ftr-newsletter wow fadeInUp" data-wow-duration="2s">
                 <h2>NewsLetter</h2>
                 <p>{{ getConfig('news_text') }}</p>
                 <form id="newsletter_form">
                 @csrf
                   <input type="email"name="newsletter_email" placeholder="Your Email">
                   <div class="newsletter-btn">
                     <button type="submit"><i class="fas fa-paper-plane"></i></button>
                   </div>
                 </form>

               </div>
              </div>
            </div>
            <div class="footer-copy-right  wow fadeInRight" data-wow-duration="2s">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                  <p>{{ getConfig('copy_right') }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </footer> -->

    {{-- <footer class="footer-sec position-relative">
          <div class="container">
            <div class="row">
              <div class="col-lg-3 col-md-4">
                <div class="footer-text footer-aft wow fadeInLeft" data-wow-duration="2s">
                  <div class="footer-logo">
                    <img src="images/footer-logo.png" alt="" class="footer-logo">
                  </div>
                  <div class="footer-pera">
                    <p>Duis aute irure dolor in repreh enderit in voluptate velit.</p>
                  </div>
                  <ul class="footer-copy">
                    <li>
                      <p>2024 CopyRights <span>All Rights Reserved</span></p>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-lg-4 col-md-4">
                <div class="footer-text footer-lef wow fadeInUp" data-wow-duration="2s">
                  <ul class="footer-list">
                    <li><a href="index.html">HOME</a></li>
                     <li>
                  <a href="service.html">SERVICES</a>
                </li>
                <li>
                  <a href="customer.html">CUSTOMERS</a>
                </li>
                <li>
                  <a href="pricing.html">PRICING</a>
                </li>
                    <li><a href="contact.html">CONTACT</a></li>
                  </ul>
                  <ul class="footer-list-link">
                    <li><i class="fa fa-phone"></i>
                      <a href="tel:0211234554862">
                        <p>{{getConfig('contact')}}</p>
                      </a>
                    </li>
                    <li><i class="fa fa-envelope"></i>
                      <a href="mailto:LOREMIPUSM@GMAIL.COM">
                        <p>LOREMIPUSM@GMAIL.COM</p>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-lg-4 col-md-4">
                <div class="footer-text wow fadeInRight" data-wow-duration="2s">
                  <h3>Newsletter</h3>

                  <div>
                    <input type="email" name="email" id="" placeholder="Email Address...">
                   <!--  <button type="submit" class="theme-button-1">Subscribe</button> -->
                  </div>
                  <ul class="footer-social">
                    <li>
                      <a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li>
                      <a href="javascript:void(0)"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li>
                      <a href="javascript:void(0)"><i class="fab fa-linkedin-in"></i></a>
                    </li>
                    <li>
                      <a href="javascript:void(0)"><i class="fab fa-google"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </footer> --}}



    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-12">
                    <div class="top-heading-footer wow fadeInDown" data-wow-duration="2s">
                        <h3>Interested In Learning More?</h3>
                        <h2>Connect With Us</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-lg-4 col-12">
                    <div class="ft-logo wow fadeInLeft" data-wow-duration="2s">
                        <a href="{{ route('webIndexPage') }}"><img src="{{ asset(getConfig('footer_logo')) }}"
                                alt="img"></a>
                        <p>{{getConfig('news_text')}}</p>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-12">
                    <div class="ft-contact-info wow fadeInDown" data-wow-duration="2s ">
                        <h5>Contact</h5>
                        <ul>
                            <li><i class="fas fa-map-marker-alt"></i>{{getConfig('address')}}</li>
                            <li><i class="fas fa-phone-alt"></i><a href="{{getConfig('contact')}}">{{getConfig('contact')}}</a></li>
                            <li><i class="fas fa-envelope"></i><a
                                    href="mailto:{{getConfig('primary_email')}}">{{getConfig('primary_email')}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-12">
                    <div class="maindv-subscriber wow fadeInRight" data-wow-duration="2s">
                        <div class="ft-subscribe">
                            <h5>Subscribe Now</h5>
                            <form  id="newsletter_form">
                                @csrf
                                <div class="ft-field">
                                <input type="email" name="newsletter_email" placeholder="Email Address">
                                <button type="submit"><i
                                        class="far fa-paper-plane"></i></button>
                            </div>
                        </form>
                        </div>
                        <div class="ft-icon ">
                            <h4>Follow on</h4>
                            <ul>
                                <li><a href="{{getConfig('twitter')}}"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="{{getConfig('link')}}"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="{{getConfig('facebook')}}"><i class="fab fa-facebook-f"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-12 col-12">
                    <div class="ft-bottom-text wow fadeInDown" data-wow-duration="2s">
                        <p>{{getConfig('copy_right')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    @include('layouts.front.includes.scripts')
