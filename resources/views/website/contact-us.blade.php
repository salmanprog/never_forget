@extends('layouts.website.master')
@section('title', $page_title)
@section('meta')
    <meta content="" name="description">
    <meta content="" name="keywords">
@endsection
@section('content')
    <!-- ======= Main Section ======= -->

    <main class="inner-bg">
        <section class="inner-banner">
            <div class="container">
                <h1 class="heading fs-74" data-aos="fade-down" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                    Contact <span>Us</span></h1>
            </div>
        </section>
    </main>
    <section class="contact-form py-150">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-6">
                    <span class="btn des-wrapper mb-30" data-aos="flip-up" data-aos-easing="ease-out-cubic"
                        data-aos-duration="1000">Get In Touch</span>
                    {{-- <h2 class="heading fs-64 mb-30" data-aos="flip-left" data-aos-easing="ease-out-cubic"
                        data-aos-duration="1000">CONTACT <span>FORM</span></h2> --}}
                    <p class="mb-60" data-aos="fade-down" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                        {{ $home_page_data['contact_heading'] }}
                    </p>
                </div>
                <div class="col-lg-12">
                    <div class="contact-form-container">
                        @if (session('contactmessage'))
                            <div id="success-message-contact" class="alert alert-success" role="alert">
                                {{ session('contactmessage') }}</div>
                            <script>
                                setTimeout(function() {
                                    var successMessage = document.getElementById('success-message-contact');
                                    successMessage.style.display = 'none';
                                }, 10000);
                            </script>
                        @endif
                        <form action="{{ route('contactus.store') }}" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                            @csrf
                            <div class="row"> 
                                <div class="col-lg-6">
                                    <div class="field-wrapper">
                                        <label for="first_name" class="label-field">First Name</label>
                                        <input class="input-field" type="text" name="first_name" id="first_name"
                                            placeholder="Enter Your First Name" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="field-wrapper">
                                        <label for="last_name" class="label-field">Last Name</label>
                                        <input class="input-field" type="text" name="last_name" id="last_name"
                                            placeholder="Enter Your Last Name" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="field-wrapper">
                                        <label for="email" class="label-field">Email Address</label>
                                        <input class="input-field" type="text" name="email" id="email"
                                            placeholder="Enter Your Email" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="field-wrapper">
                                        <label for="phone" class="label-field">Phone Address</label>
                                        <input class="input-field" type="text" name="phone" id="phone"
                                            placeholder="Enter Your Phone Number" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="field-wrapper">
                                        <label for="company" class="label-field">Company Name</label>
                                        <input class="input-field" type="text" name="company" id="company"
                                            placeholder="Enter Your Company Name" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="field-wrapper">
                                        <label for="plans" class="label-field">Choose Your Gifting Plan</label>
                                        <select name="plans" id="plans" class="input-field form-select" required>
                                            <option value="" selected disabled>Choose Your Plan</option>
                                            <option value="Basic Plan">Basic Plan</option>
                                            <option value="Standard Plan">Standard Plan</option>
                                            <option value="Enterprise Plan">Enterprise Plan</option>
                                        </select> 
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="field-wrapper">
                                        <label for="quantity" class="label-field">Choose Your Options</label>
                                        <select name="quantity" id="quantity" class="input-field form-select" required>
                                            <option value="" selected disabled>Choose Your Options</option>
                                            <option value="Clientele">Clientele</option>
                                            <option value="Clientele & Employees">Clientele & Employees</option>
                                            <option value="Employees">Employees</option> 
                                        </select> 
                                    </div>
                                </div> 
                                <div class="col-lg-12">
                                    <div class="field-wrapper">
                                        <label for="message" class="label-field">Additional Message</label>
                                        <textarea class="input-field text-area" name="message" id="message" placeholder="Message" placeholder="message"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button class="btn primary-btn border-0 w-100" type="submit">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="contact-sec-2 pb-150">
        <div class="container">
            <div class="row row-gap-40 text-center text-lg-start">
                <div class="col-lg-6" data-aos="fade-right" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                    <div class="img-wrapper position-relative">
                        <img src="{{ asset('public/admin/assets/images/page') }}/{{ $home_page_data['why_contact_us_image'] }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                    <span class="btn des-wrapper mb-20">Never Forget Showing Appreciation</span>
                    <h2 class="heading fs-74 mb-30">{!! $home_page_data['why_contact_us_heading'] !!}</h2>
                    <div class="mb-30">
                        <h4 class="fs-28 mb-10 fw-600 text-primary-theme-light">{!! $home_page_data['title_one'] !!}</h4>
                        <p> 
                            {!! $home_page_data['description_one'] !!}
                        </p>
                    </div>
                    <div class="mb-30">
                        <h4 class="fs-28 mb-10 fw-600 text-primary-theme-light">{!! $home_page_data['title_two'] !!}</h4>
                        <p>
                            {!! $home_page_data['description_two'] !!}
                        </p>
                    </div>
                    <div class="mb-30">
                        <h4 class="fs-28 mb-10 fw-600 text-primary-theme-light">{!! $home_page_data['title_three'] !!}</h4>
                        <p>
                            {!! $home_page_data['description_three'] !!}
                        </p>
                    </div>
                    <div class="mb-30">
                        <h4 class="fs-28 mb-10 fw-600 text-primary-theme-light">{!! $home_page_data['title_four'] !!}</h4>
                        <p>
                            {!! $home_page_data['description_four'] !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="contact-sec-2 pb-150">
        <div class="container">
            <div class="row row-gap-40 text-center text-lg-start flex-column-reverse flex-lg-row">
                <div class="col-lg-6" data-aos="fade-right" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                    <span class="btn des-wrapper mb-20">Never Forget CONTACT INFORMATION</span>
                    <h2 class="heading fs-74 mb-30">CONTACT <span>INFORMATION</span></h2>
                    <a href="tel:{{ $home_page_data['contact_phone'] }}"
                        class="gap-20 mb-30 d-flex align-items-center text-white sm-circle-wrapper">
                        <div class="sm-circle d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <span class="fs-28 fw-600 light-black ">{{ $home_page_data['contact_phone'] }}</span>
                    </a>
                    <a href="mailto:{{ $home_page_data['contact_email'] }}"
                        class="gap-20 mb-40 d-flex align-items-center text-white sm-circle-wrapper">
                        <div class="sm-circle d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <span class="text-black fs-28 fw-600">{{ $home_page_data['contact_email'] }}</span>
                    </a>
                    <div class="mb-40">
                        <span class="fw-600 fs-32 light-black">Follow Us On:</span>
                    </div>
                    <ul class="social-links d-flex align-items-center gap-20">
                        @if(!empty($home_page_data['contact_facebook']))
                            <li><a href="{{ $home_page_data['contact_facebook'] }}"><i class="fa-brands fa-facebook-f"></i></a></li>
                        @endif
                        @if(!empty($home_page_data['contact_instagram']))
                            <li><a href="{{ $home_page_data['contact_instagram'] }}"><i class="fa-brands fa-instagram"></i></a></li>
                        @endif
                        @if(!empty($home_page_data['contact_twitter']))
                            <li><a href="{{ $home_page_data['contact_twitter'] }}"><i class="fa-brands fa-x-twitter"></i></a></li>
                        @endif
                        @if(!empty($home_page_data['contact_linkedin']))
                            <li><a href="{{ $home_page_data['contact_linkedin'] }}"><i class="fa-brands fa-linkedin-in"></i></a></li>
                        @endif
                        @if(!empty($home_page_data['contact_tiktok']))
                            <li><a href="{{ $home_page_data['contact_tiktok'] }}"><i class="fa-brands fa-tiktok"></i></a></li>
                        @endif
                        @if(!empty($home_page_data['contact_pinterest']))
                            <li><a href="{{ $home_page_data['contact_pinterest'] }}"><i class="fa-brands fa-pinterest"></i></a></li>
                        @endif
                    </ul>
                </div>
                <div class="col-lg-6" data-aos="fade-left" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                    <div class="img-wrapper position-relative">
                        <img src="{{ asset('public/admin/assets/images/page') }}/{{ $home_page_data['contact_us_image'] }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End #main -->
@endsection
