@extends('layouts.website.master')
@section('title', $page_title)
@section('meta') 
    <meta content="{{ strip_tags($blog->description) }}" name="description">
    <meta content="{{ $blog->title }}" name="keywords">
@endsection
@section('content')
<main class="inner-bg"> 
    <section class="inner-banner">
      <div class="container">
        <h1 class="heading fs-74" data-aos="fade-down" data-aos-easing="ease-out-cubic"
        data-aos-duration="1000">Blog <span>Details</span></h1>
      </div>
    </section>
  </main>
  <section class="blog-detail-sec py-150">
    <div class="container">
      <div class="row row-gap-40 align-items-center">
        @if($blog->image)
          <div class="col-lg-6 col-md-12">
            <div class="img-wrapper position-relative" data-aos="fade-right" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
              <img src="{{ asset('public/admin/assets/posts/'.$blog->image) }}" alt="{{ $blog->title }}">
            </div>
          </div>
        @endif
        <div class="col-lg-{{ $blog->image ? '6' : '12' }} col-md-12" data-aos="fade-left" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
          <div class="blog-detail-wrapper">
            <h1 class="heading fs-48 mb-30">{{ $blog->title }}</h1>
            <div class="blog-content fs-18 secondry-font light-black">
              {!! $blog->description !!}
            </div>
            <div class="mt-40">
              <a href="{{ route('blogs') }}" class="btn primary-btn border-0">Back to Blogs</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <style>
    .blog-detail-sec .img-wrapper img {
      width: 100%;
      height: auto;
      object-fit: contain;
      border-radius: 10px;
    }
    
    @media (max-width: 991px) {
      .blog-detail-sec .row {
        flex-direction: column;
      }
      
      .blog-detail-sec .img-wrapper {
        margin-bottom: 30px;
      }
    }
  </style>

  @include('website.include.perfect-gifting')
@endSection
