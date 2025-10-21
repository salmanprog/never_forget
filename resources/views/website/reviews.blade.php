@extends('layouts.website.master')
@section('title', $page_title)
@section('meta')
<title>Customers Reviews || Never Forget</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
@endsection
@section('content')
<!-- ======= Main Section ======= -->
    <main id="main" class="inner-page-header">

        <!-- ======= Branding Section ======= -->
        <section id="branding" class="branding branding-bg">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-md-4">
                        <div class="section-title">
                            <p><img src="{{ asset('public/assets/website/images/leaf.png') }}" class="branding-img">
                                Discount Up To 20% Off</p>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="section-title">
                            <p><img src="{{ asset('public/assets/website/images/leaf.png') }}" class="branding-img">
                                Discount Up To 20% Off</p>
                        </div>
                    </div>
                    <div class="col-md-4 text-end">
                        <div class="section-title">
                            <p><img src="{{ asset('public/assets/website/images/leaf.png') }}" class="branding-img">
                                Discount Up To 20% Off</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Branding Section -->
        
        <!-- ======= Testimonials Section ======= -->
        @include('layouts.website.testimonial')
        <!-- End Testimonials Section -->
    </main>
    <!-- End #main -->	
@endSection