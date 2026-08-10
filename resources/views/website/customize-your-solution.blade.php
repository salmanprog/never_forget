@extends('layouts.website.master')
@section('title', $page_title)
@section('meta')
    <meta content="Customize a Never Forget solution tailored to your business needs." name="description">
    <meta content="customize solution, corporate services" name="keywords">
@endsection
@section('content')
    <main class="inner-bg">
        <section class="inner-banner">
            <div class="container">
                <h1 class="heading fs-74" data-aos="fade-down" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                    Customize Your <span>Solution</span>
                </h1>
            </div>
        </section>
    </main>

    <section class="shop-sec customize-services-sec py-140">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center pb-60">
                    <span class="btn des-wrapper mb-30" data-aos="flip-up">Never Forget Showing Appreciation</span>
                    <h2 class="heading fs-64 mb-30" data-aos="flip-left">
                        Choose Your <span>Services</span>
                    </h2>
                    <p class="mb-30 mx-auto" style="max-width: 640px;">
                        Select a service to begin. We’ll help you build a customized proposal designed around your goals.
                    </p>
                </div>
            </div>

            @if($services->isEmpty())
                <div class="alert alert-warning text-center">Services will be available soon.</div>
            @else
                <div class="slider product-category-slider customize-services-slider" data-aos="fade-down">
                    @foreach ($services as $service)
                        <div class="card-wrapper">
                            <div class="category-image mb-20">
                                <img src="{{ $service->image_url }}" alt="{{ $service->title }}" class="img-fluid">
                            </div>
                            <div class="card-bottom text-center">
                                <h5 class="heading light-black fs-24 fw-600 mb-15">
                                    {{ $service->title }}
                                </h5>
                                <p class="mb-20 px-2" style="font-size: 14px; opacity: 0.75; min-height: 42px;">
                                    {{ $service->description }}
                                </p>
                                <a href="{{ route('customize-your-solution.form', $service->slug) }}"
                                    class="btn primary-btn border-0"><span>GET STARTED</span></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endsection
