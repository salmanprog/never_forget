@extends('layouts.website.master')
@section('title', $page_title)
@section('meta')
    <meta content="" name="description">
    <meta content="" name="keywords">
@endsection
@section('content')


    <main class="inner-bg">
        <section class="inner-banner">
            <div class="container">
                <h1 class="heading fs-74" data-aos="fade-down" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                    Testimonials</h1>
            </div>
        </section>
    </main>
    <section class="testimonials-sec-1 py-150">
        <div class="container">
            <div class="row text-center justify-content-center">
                <div class="col-lg-6">
                    <span class="btn des-wrapper mb-30" data-aos="flip-up" data-aos-easing="ease-out-cubic"
                        data-aos-duration="1000">Never Forget Showing Appreciation</span>
                    <h2 class="heading fs-64 mb-30" data-aos="flip-left" data-aos-easing="ease-out-cubic"
                        data-aos-duration="1000">What <span>Our Client</span> Says About Us</h2>
                    <p class="mb-60" data-aos="fade-down" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                        See how businesses like yours have transformed their <br> gifting strategies with NEVER FORGET
                    </p>
                </div>
            </div> 

            <!-- Video Testimonials Section -->
            @if($videos->count() > 0)
                <div class="mb-60">
                    <h3 class="heading fs-48 text-center mb-50" data-aos="fade-down" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                        Video Testimonials
                    </h3>
                    <div class="row justify-content-center row-gap-30">
                        @foreach($videos as $video)
                            <div class="col-xl-6">
                                <div class="d-flex justify-content-center justify-content-xl-end">
                                    <div class="card-wrapper test-card-wrapper position-relative">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="test-card-video-wrapper">
                                                    <video src="{{ asset('public/admin/assets/images/testimonials') }}/{{ $video->video }}" autoplay muted loop loading="lazy" controls></video>
                                                </div>
                                            </div>
                                            <div class="col-lg-8"> 
                                                <h3 class="fs-24 mb-20 fw-400 for-p">     
                                                    {!! $video->comment !!}  
                                                </h3>
                                                <div class="d-flex align-items-center test-card-bottom mb-22">
                                                    <div>
                                                        <h4 class="mb-5">{{ $video->name }}</h4>
                                                    </div>
                                                </div>
                                                <ul class="ratings d-flex align-items-center gap-10">
                                                    @for($i = 1; $i <= 5; $i++)
                                                        @if($i <= $video->rating)
                                                            <li><i class="fa-solid fa-star"></i></li>
                                                        @else
                                                            <li><i class="fa-regular fa-star"></i></li>
                                                        @endif
                                                    @endfor
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Image Testimonials Section -->
            @if($testimonials->where('image', '!=', null)->count() > 0)
                <div class="mb-60">
                    <h3 class="heading fs-48 text-center mb-50" data-aos="fade-down" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                        Image Testimonials
                    </h3>
                    <div class="row justify-content-center row-gap-30">
                        @foreach($testimonials->where('image', '!=', null) as $testimonial) 
                            <div class="col-xl-6">
                                <div class="d-flex justify-content-center justify-content-xl-end">
                                    <div class="card-wrapper test-card-wrapper position-relative">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="test-card-img-wrapper">
                                                    <img src="{{ asset('public/admin/assets/images/testimonials') }}/{{ $testimonial->image }}" alt="" loading="lazy">
                                                </div>
                                            </div>
                                            <div class="col-lg-8"> 
                                                <h3 class="fs-24 mb-20 fw-400 for-p">     
                                                    {!! $testimonial->comment !!}  
                                                </h3>
                                                <div class="d-flex align-items-center test-card-bottom mb-22">
                                                    <div>
                                                        <h4 class="mb-5">{{ $testimonial->name }}</h4>
                                                    </div>
                                                </div>
                                                <ul class="ratings d-flex align-items-center gap-10">
                                                    @for($i = 1; $i <= 5; $i++)
                                                        @if($i <= $testimonial->rating)
                                                            <li><i class="fa-solid fa-star"></i></li>
                                                        @else
                                                            <li><i class="fa-regular fa-star"></i></li>
                                                        @endif
                                                    @endfor
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif 
                <div class="mt-30">
                    <h3 class="heading fs-64 text-center" data-aos="fade-down" data-aos-easing="ease-out-cubic"
                        data-aos-duration="1000">
                        Thoughtful Gifts, Lasting Impressions – Let's Make Gifting Unforgettable!
                    </h3>
                </div>
            </div>
        </div>
    </section>
@endSection
