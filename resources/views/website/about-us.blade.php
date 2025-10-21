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
                <h1 class="heading fs-74" data-aos="fade-down" data-aos-easing="ease-out-cubic" data-aos-duration="1000">About
                    <span>Us</span></h1>
            </div>
        </section>
    </main>
    <section class="about-sec-2 py-140">
        <div class="container">
            <div class="row row-gap-40 text-center text-lg-start align-items-center">
                <div class="col-lg-6">
                    <div class="img-wrapper position-relative" data-aos="fade-right" data-aos-easing="ease-out-cubic"
                        data-aos-duration="1000">
                        <img src="{{ asset('public/assets/website/images') }}/about-sec-2.png" alt="About Us">
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                    <span class="btn des-wrapper mb-30">Never Forget Showing Appreciation</span>
                    <h2 class="heading fs-74 mb-30">Gifting is more than just an <span>exchange</span></h2>
                    <p class="mb-30" style="max-width: 555px"> At <span class="ml-5 fw-700"> Never Forget Showing Appreciation</span>, we believe that corporate gifting is more than just an exchange—it’s a
                        powerful way to strengthen relationships, express appreciation, and build brand loyalty. That’s why
                        we specialize in customized corporate gifting solutions, designed to help businesses create
                        meaningful connections with employees, clients, and partners.
                    </p>
                    <p class="mb-30" style="max-width: 555px">
                        With a wide range of gifting plans, we make it easy for companies to celebrate milestones, recognize
                        achievements, and show gratitude in a way that aligns with their brand identity. Whether you need
                        personalized gifts for birthdays and anniversaries, custom-branded gifts for employees and clients,
                        or a fully managed corporate gifting program, we’ve got you covered.
                    </p>
                    <a href="{{ route('shop') }}" class="btn primary-btn border-0">Start Your Gifting Journey Today</a>
                </div>
            </div>
        </div>
    </section>
    <section class="about-sec-3 pb-140">
        <div class="container">
            <div class="row text-center text-lg-start flex-column-reverse flex-lg-row row-gap-40 align-items-center">
                <div class="col-lg-6" data-aos="fade-right" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                    <span class="btn des-wrapper mb-30">Never Forget Showing Appreciation</span>
                    <h2 class="heading fs-74 mb-30">Our <span>Vision</span></h2>
                    <p class="mb-30" style="max-width: 675px">
                        At<span class="ml-5 fw-700"> Never Forget Showing Appreciation</span>, we envision a world where corporate gifting goes beyond
                        just exchanging presents—it becomes a powerful tool for building meaningful relationships, fostering
                        appreciation, and strengthening brand identity. Our goal is to revolutionize the corporate gifting
                        experience by offering personalized, high-quality, and impactful gifts that leave a lasting
                        impression.
                    </p>
                    <p class="mb-30" style="max-width: 659px">
                        We strive to make gifting effortless and memorable for businesses by providing innovative solutions
                        that enhance employee engagement, client loyalty, and brand recognition. With a commitment to
                        excellence, creativity, and sustainability, we aim to be the leading corporate gifting partner for
                        companies worldwide.
                    </p>
                    <h4 class="heading fs-40 mb-10">Inspire. <span>Connect</span>. Appreciate.</h4>
                    <p class="light-black opacity-50">That’s our vision for corporate gifting!</p>
                </div>
                <div class="col-lg-6">
                    <div class="img-wrapper position-relative" data-aos="fade-left" data-aos-easing="ease-out-cubic"
                        data-aos-duration="1000">
                        <img src="{{ asset('public/assets/website/images') }}/about-sec-3.png" alt="Our Vision">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about-sec-4 sec-bg py-150">
        <div class="container">
            <div class="row  justify-content-center text-center">
                <div class="col-lg-6">
                    <span class="btn des-wrapper mb-30 text-center mx-0" data-aos="flip-up" data-aos-easing="ease-out-cubic"
                        data-aos-duration="1000">Never Forget Showing Appreciation</span>
                    <h2 class="heading fs-74 mb-30 text-center" data-aos="flip-left" data-aos-easing="ease-out-cubic"
                        data-aos-duration="1000">Our <span>Services</span></h2>
                </div>
            </div>
            <div class="row row-gap-40" data-aos="fade-down" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                <div class="col-md-6 col-lg-3">
                    <div class="services-card-wrapper">
                        <img src="{{ asset('public/assets/website/images') }}/services/01.png" class="mb-10"
                            alt="Tailored Gifting Plans">
                        <h3 class="heading fs-28 mb-10">Tailored Gifting <span>Plans</span></h3>
                        <p>Choose from flexible options that fit your needs and budget.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="services-card-wrapper">
                        <img src="{{ asset('public/assets/website/images') }}/services/02.png" class="mb-10"
                            alt="Custom Branding & Personalization">
                        <h3 class="heading fs-28 mb-10"><span>Custom</span> Branding & Personalization</h3>
                        <p>Add logos, names, or personalized messages for a unique touch.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="services-card-wrapper">
                        <img src="{{ asset('public/assets/website/images') }}/services/03.png" class="mb-10"
                            alt="Seamless Ordering & Delivery">
                        <h3 class="heading fs-28 mb-10">Seamless Ordering & <span>Delivery</span></h3>
                        <p>From sourcing to shipping, we handle it all.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="services-card-wrapper">
                        <img src="{{ asset('public/assets/website/images') }}/services/04.png" class="mb-10"
                            alt="Bulk Gifting Made Easy">
                        <h3 class="heading fs-28 mb-10">Bulk <span>Gifting</span> Made Easy</h3>
                        <p>Hassle-free solutions for large-scale corporate gifting.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about-sec-5 py-150">
        <div class="container">
            <div class="row flex-column-reverse flex-lg-row text-center text-lg-start row-gap-40">
                <div class="col-lg-6" data-aos="fade-right" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                    <span class="btn des-wrapper mb-30">Never Forget Showing Appreciation</span>
                    <h2 class="heading fs-74 mb-30">Why <span>Choose</span> Us?</h2>
                    <div class="mb-30">
                        <h4 class="fs-28 mb-10 fw-600 text-primary-theme-light">Expert Curation</h4>
                        <p>
                            We carefully select high-quality gifts that align with your corporate values.
                        </p>
                    </div>
                    <div class="mb-30">
                        <h4 class="fs-28 mb-10 fw-600 text-primary-theme-light">End-to-End Management</h4>
                        <p>
                            From ideation to delivery, we ensure a smooth and stress-free experience.
                        </p>
                    </div>
                    <div class="mb-30">
                        <h4 class="fs-28 mb-10 fw-600 text-primary-theme-light">Scalable Solutions</h4>
                        <p>
                            Whether you’re a small business or a large enterprise, we tailor gifting plans to fit your
                            needs.
                        </p>
                    </div>
                    <div class="mb-30">
                        <h4 class="fs-28 mb-10 fw-600 text-primary-theme-light">Commitment to Excellence</h4>
                        <p>
                            We take pride in delivering gifts that reflect your company’s appreciation and professionalism.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="img-wrapper position-relative" data-aos="fade-left" data-aos-easing="ease-out-cubic"
                        data-aos-duration="1000">
                        <img src="{{ asset('public/assets/website/images') }}/why-choose.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End  Section -->
    <!-- ======= Testimonials Section ======= -->
    @include('website.include.trusted')
@endSection
