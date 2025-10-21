    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3 mb-4 mb-lg-0">
                    <img src="{{ asset('public/admin/assets/images/page') }}/{{ $home_page_data['footer_image'] }}"
                        class="logo-light mb-20" alt="" style="max-width: 100%; height: auto;">
                    <div class="text-white">
                        {!! $home_page_data['footer_description'] !!}
                    </div>
                    
                    <ul class="social-links d-flex align-items-center mt-30 gap-10 flex-wrap" style="list-style: none; padding: 0; margin: 12px 0;">
                        @if(!empty($home_page_data['footer_facebook']))
                            <li><a href="{{ $home_page_data['footer_facebook'] }}" style="color: white; font-size: 16px; text-decoration: none;"><i class="fa-brands fa-facebook-f"></i></a></li>
                        @endif
                        @if(!empty($home_page_data['footer_instagram']))
                            <li><a href="{{ $home_page_data['footer_instagram'] }}" style="color: white; font-size: 16px; text-decoration: none;"><i class="fa-brands fa-instagram"></i></a></li>
                        @endif 
                        @if(!empty($home_page_data['footer_twitter']))
                            <li><a href="{{ $home_page_data['footer_twitter'] }}" style="color: white; font-size: 16px; text-decoration: none;"><i class="fa-brands fa-x-twitter"></i></a></li>
                        @endif
                        @if(!empty($home_page_data['footer_linkedin']))
                            <li><a href="{{ $home_page_data['footer_linkedin'] }}" style="color: white; font-size: 16px; text-decoration: none;"><i class="fa-brands fa-linkedin-in"></i></a></li>
                        @endif
                        @if(!empty($home_page_data['footer_tiktok']))
                            <li><a href="{{ $home_page_data['footer_tiktok'] }}" style="color: white; font-size: 16px; text-decoration: none;"><i class="fa-brands fa-tiktok"></i></a></li>
                        @endif
                        @if(!empty($home_page_data['footer_pinterest']))
                            <li><a href="{{ $home_page_data['footer_pinterest'] }}" style="color: white; font-size: 16px; text-decoration: none;"><i class="fa-brands fa-pinterest"></i></a></li>
                        @endif
                    </ul>
                </div>
                <div class="col-12 col-md-6 col-lg-2 col-xl-2 col-xxl-2 mb-4 mb-lg-0">
                    <h3 class="heading text-white fs-32 mb-30">
                        Quick <span>Links</span>
                    </h3>
                    <ul class="footer-links" style="list-style: none; padding: 0;">
                        <li class="mb-10"><a class="navs text-white text-decoration-none {{ Route::currentRouteName() == 'index' ? 'active' : '' }}" href="{{ route('index') }}">Home</a></li>
                        <li class="mb-10"><a class="navs text-white text-decoration-none {{ Route::currentRouteName() == 'about-us' ? 'active' : '' }}" href="{{ route('about-us') }}">About Us</a></li>
                        <li class="mb-10"><a class="navs text-white text-decoration-none {{ Route::currentRouteName() == 'corporate-solutions' ? 'active' : '' }}" href="{{ route('corporate-solutions') }}">Corporate Solutions</a></li>
                        <li class="mb-10"><a class="navs text-white text-decoration-none {{ Route::currentRouteName() == 'how-it-works' ? 'active' : '' }}" href="{{ route('how-it-works') }}">How It Works</a></li>
                        <li class="mb-10"><a class="navs text-white text-decoration-none {{ Route::currentRouteName() == 'testimonials' ? 'active' : '' }}" href="{{ route('testimonials') }}">Testimonials</a></li>
                        <li class="mb-10"><a class="navs text-white text-decoration-none {{ Route::currentRouteName() == 'faqs' ? 'active' : '' }}" href="{{ route('faqs') }}">FAQs</a></li>
                        <li class="mb-10"><a class="navs text-white text-decoration-none {{ Route::currentRouteName() == 'why-choose-us' ? 'active' : '' }}" href="{{ route('why-choose-us') }}">Why Choose Us</a></li>
                        <li class="mb-10"><a class="navs text-white text-decoration-none {{ Route::currentRouteName() == 'blogs' ? 'active' : '' }}" href="{{ route('blogs') }}">Blogs</a></li>
                        <li class="mb-10"><a class="navs text-white text-decoration-none {{ Route::currentRouteName() == 'contact-us' ? 'active' : '' }}" href="{{ route('contact-us') }}">Contact Us</a></li>
                        <li class="mb-10"><a class="navs text-white text-decoration-none {{ Route::currentRouteName() == 'disclaimer' ? 'active' : '' }}" href="{{ route('disclaimer') }}">Disclaimer</a></li>
                        <li class="mb-10"><a class="navs text-white text-decoration-none {{ Route::currentRouteName() == 'cookie-policy' ? 'active' : '' }}" href="{{ route('cookie-policy') }}">Cookie Policy</a></li>
                        <li class="mb-10"><a class="navs text-white text-decoration-none {{ Route::currentRouteName() == 'privacy-policy' ? 'active' : '' }}" href="{{ route('privacy-policy') }}">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="col-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4 mb-4 mb-lg-0">
                    <h3 class="heading text-white fs-32 mb-30">
                        Need a <span>Custom Gifting</span> Strategy? Let's Talk!
                    </h3>
                    <a href="tel:{{ $home_page_data['footer_phone'] }}"
                        class="gap-20 mb-20 d-flex align-items-center text-white sm-circle-wrapper">
                        <div>
                            <div class="sm-circle d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                        </div>
                        <span class="secondry-font">{{ $home_page_data['footer_phone'] }}</span>
                    </a>
                    <a href="mailto:{{ $home_page_data['footer_email'] }}"
                        class="gap-20 footer-email d-flex align-items-center text-white sm-circle-wrapper">
                        <div>
                            <div class="sm-circle d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                        </div>
                        <span class="secondry-font">{{ $home_page_data['footer_email'] }}</span>
                    </a>
                </div>
                <div class="col-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3">
                    <h3 class="heading text-white fs-32 mb-30">
                        {!! $home_page_data['newsletter_title'] !!}
                    </h3>
                    <div class="text-white mb-20">
                        {!! $home_page_data['newsletter_description'] !!}
                    </div>
                    
                    @if (session('message'))
                        <div id="success-message-footer"  class="callout callout-success" style="height: auto;text-align: left;font-size: 20px;width: 100%;margin-bottom: 5px;margin-left: 3%;color: lime;">{{ session('message') }}</div>
                        <script>
                            setTimeout(function () {
                                var successMessage = document.getElementById('success-message-footer');
                                successMessage.style.display = 'none';
                            }, 10000);
                        </script>
                    @endif
                    <form action="{{ route('newsletter.store') }}" method="post" id="regform" enctype="multipart/form-data" accept-charset="utf-8">
                        @csrf
                        <div class="field-wrap position-relative"> 
                            <input type="email" name="email" placeholder="Email Address" id="email" required style="width: 100%; padding: 12px 20px; border-radius: 25px; border: none; background: white;">
                            <div class="sm-circle d-flex align-items-center justify-content-center position-absolute top-50 translate-middle-y" style="right: 3px; background: #cfa40c; width: 42px; height: 42px; border-radius: 50%;">
                                <button type="submit" style="cursor: pointer; background: none; border: none; padding: 0;" id="submit"> 
                                    <i class="fas fa-paper-plane" style="color: #ffffff;"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="d-flex justify-content-center mt-30">
                        <img src="{{ asset('public/assets/website/images') }}/secure3.png" alt="">
                    </div>
                </div>
            </div>
            <div class="text-white footer-disclaimer ">
                <span class="d-flex"><strong>Disclaimer:</strong>{!! $home_page_data['footer_disclaimer'] !!}</span>
                </div>
            </div>
        </div>
        <div class="footer-bottom"> 
            <div class="d-flex justify-content-between align-items-center container">
                <h6 class="text-white mb-0">{!! $home_page_data['footer_copy_right'] !!}</h6>
                <h6 class="text-white mb-0">{!! $home_page_data['footer_copy_left'] !!}</h6>
            </div>
        </div> 
    </footer>
