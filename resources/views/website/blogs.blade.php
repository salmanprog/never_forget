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
        <h1 class="heading fs-74" data-aos="fade-down" data-aos-easing="ease-out-cubic"
        data-aos-duration="1000">Our <span>Blogs</span></h1>
      </div>
    </section>
  </main>
  <section class="blog-sec py-150">
    <div class="container">
      <div class="row row-gap-40">
        <div class="col-lg-12">
          <div class="d-flex align-items-center justify-content-center justify-content-lg-end flex-wrap gap-20 action-btns-wrapper">
            <button class="btn secondary-btn">Most Recent</button>
            <button class="btn secondary-btn">Highest Rated</button>
            <button class="btn secondary-btn">Trending Now</button>
            <button class="btn secondary-btn rounded-btns sm-circle d-flex align-items-center justify-content-center bg-transparent radius-100"><i class="fa-solid fa-magnifying-glass"></i></button>
            <button class="btn secondary-btn rounded-btns sm-circle d-flex align-items-center justify-content-center bg-transparent radius-100"><i class="fa-solid fa-filter"></i></button>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="blogs-card-wrapper">
            <img src="{{ asset('public/assets/website/images') }}/blogs/1.png" class="w-100 mb-10" alt="">
            <h5 class="pl-20 heading fs-24 mb-30">The Power of Corporate Gifting: Why It Matters for Your Business</h5>
            <p id="text" class="pl-20">
              <span id="truncated-text" class="fs-18 secondry-font">
                How gifting strengthens relationships with employees and clients...
              </span>
              <span id="full-text" class="hidden light-black fs-18 secondry-font">
                How gifting strengthens relationships with employees and clients. Gifting is a powerful way to show appreciation, build trust, and foster a sense of connection. Whether it's a thoughtful holiday gift for employees or a personalized token of gratitude for clients, these gestures can enhance loyalty, improve morale, and create lasting bonds that benefit both parties in the long term.
              </span>
              <span id="read-more-link" class="read-more-link text-secondry-theme  fs-18 secondry-font fw-600">Read More</span>
            </p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="blogs-card-wrapper">
            <img src="{{ asset('public/assets/website/images') }}/blogs/2.png" class="w-100 mb-10" alt="">
            <h5 class="pl-20 heading fs-24 mb-30">Top 10 Corporate Gift Ideas to Impress Clients in 2024</h5>
            <p id="text" class="pl-20">
              <span id="truncated-text" class="fs-18 secondry-font">
                How gifting strengthens relationships with employees and clients...
              </span>
              <span id="full-text" class="hidden light-black fs-18 secondry-font">
                How gifting strengthens relationships with employees and clients. Gifting is a powerful way to show appreciation, build trust, and foster a sense of connection. Whether it's a thoughtful holiday gift for employees or a personalized token of gratitude for clients, these gestures can enhance loyalty, improve morale, and create lasting bonds that benefit both parties in the long term.
              </span>
              <span id="read-more-link" class="read-more-link text-secondry-theme  fs-18 secondry-font fw-600">Read More</span>
            </p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="blogs-card-wrapper">
            <img src="{{ asset('public/assets/website/images') }}/blogs/3.png" class="w-100 mb-10" alt="">
            <h5 class="pl-20 heading fs-24 mb-30">Employee Appreciation Gifts That Boost Morale & Productivity</h5>
            <p id="text" class="pl-20">
              <span id="truncated-text" class="fs-18 secondry-font">
                How gifting strengthens relationships with employees and clients...
              </span>
              <span id="full-text" class="hidden light-black fs-18 secondry-font">
                How gifting strengthens relationships with employees and clients. Gifting is a powerful way to show appreciation, build trust, and foster a sense of connection. Whether it's a thoughtful holiday gift for employees or a personalized token of gratitude for clients, these gestures can enhance loyalty, improve morale, and create lasting bonds that benefit both parties in the long term.
              </span>
              <span id="read-more-link" class="read-more-link text-secondry-theme  fs-18 secondry-font fw-600">Read More</span>
            </p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="blogs-card-wrapper">
            <img src="{{ asset('public/assets/website/images') }}/blogs/4.png" class="w-100 mb-10" alt="">
            <h5 class="pl-20 heading fs-24 mb-30">How to Make Your Corporate Gifts Stand Out with Branding</h5>
            <p id="text" class="pl-20">
              <span id="truncated-text" class="fs-18 secondry-font">
                How gifting strengthens relationships with employees and clients...
              </span>
              <span id="full-text" class="hidden light-black fs-18 secondry-font">
                How gifting strengthens relationships with employees and clients. Gifting is a powerful way to show appreciation, build trust, and foster a sense of connection. Whether it's a thoughtful holiday gift for employees or a personalized token of gratitude for clients, these gestures can enhance loyalty, improve morale, and create lasting bonds that benefit both parties in the long term.
              </span>
              <span id="read-more-link" class="read-more-link text-secondry-theme  fs-18 secondry-font fw-600">Read More</span>
            </p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="blogs-card-wrapper">
            <img src="{{ asset('public/assets/website/images') }}/blogs/5.png" class="w-100 mb-10" alt="">
            <h5 class="pl-20 heading fs-24 mb-30">The Ultimate Guide to Holiday Gifting for Businesses</h5>
            <p id="text" class="pl-20">
              <span id="truncated-text" class="fs-18 secondry-font">
                How gifting strengthens relationships with employees and clients...
              </span>
              <span id="full-text" class="hidden light-black fs-18 secondry-font">
                How gifting strengthens relationships with employees and clients. Gifting is a powerful way to show appreciation, build trust, and foster a sense of connection. Whether it's a thoughtful holiday gift for employees or a personalized token of gratitude for clients, these gestures can enhance loyalty, improve morale, and create lasting bonds that benefit both parties in the long term.
              </span>
              <span id="read-more-link" class="read-more-link text-secondry-theme  fs-18 secondry-font fw-600">Read More</span>
            </p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="blogs-card-wrapper">
            <img src="{{ asset('public/assets/website/images') }}/blogs/6.png" class="w-100 mb-10" alt="">
            <h5 class="pl-20 heading fs-24 mb-30">Sustainable Corporate Gifting: Eco-Friendly Gift Ideas for 2024</h5>
            <p id="text" class="pl-20">
              <span id="truncated-text" class="fs-18 secondry-font">
                How gifting strengthens relationships with employees and clients...
              </span>
              <span id="full-text" class="hidden light-black fs-18 secondry-font">
                How gifting strengthens relationships with employees and clients. Gifting is a powerful way to show appreciation, build trust, and foster a sense of connection. Whether it's a thoughtful holiday gift for employees or a personalized token of gratitude for clients, these gestures can enhance loyalty, improve morale, and create lasting bonds that benefit both parties in the long term.
              </span>
              <span id="read-more-link" class="read-more-link text-secondry-theme  fs-18 secondry-font fw-600">Read More</span>
            </p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="blogs-card-wrapper">
            <img src="{{ asset('public/assets/website/images') }}/blogs/7.png" class="w-100 mb-10" alt="">
            <h5 class="pl-20 heading fs-24 mb-30">How to Set Up an Automated Corporate Gifting Program</h5>
            <p id="text" class="pl-20">
              <span id="truncated-text" class="fs-18 secondry-font">
                How gifting strengthens relationships with employees and clients...
              </span>
              <span id="full-text" class="hidden light-black fs-18 secondry-font">
                How gifting strengthens relationships with employees and clients. Gifting is a powerful way to show appreciation, build trust, and foster a sense of connection. Whether it's a thoughtful holiday gift for employees or a personalized token of gratitude for clients, these gestures can enhance loyalty, improve morale, and create lasting bonds that benefit both parties in the long term.
              </span>
              <span id="read-more-link" class="read-more-link text-secondry-theme  fs-18 secondry-font fw-600">Read More</span>
            </p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="blogs-card-wrapper">
            <img src="{{ asset('public/assets/website/images') }}/blogs/8.png" class="w-100 mb-10" alt="">
            <h5 class="pl-20 heading fs-24 mb-30">How to Choose the Right Corporate Gift for Every Occasion</h5>
            <p id="text" class="pl-20">
              <span id="truncated-text" class="fs-18 secondry-font">
                How gifting strengthens relationships with employees and clients...
              </span>
              <span id="full-text" class="hidden light-black fs-18 secondry-font">
                How gifting strengthens relationships with employees and clients. Gifting is a powerful way to show appreciation, build trust, and foster a sense of connection. Whether it's a thoughtful holiday gift for employees or a personalized token of gratitude for clients, these gestures can enhance loyalty, improve morale, and create lasting bonds that benefit both parties in the long term.
              </span>
              <span id="read-more-link" class="read-more-link text-secondry-theme  fs-18 secondry-font fw-600">Read More</span>
            </p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="blogs-card-wrapper">
            <img src="{{ asset('public/assets/website/images') }}/blogs/9.png" class="w-100 mb-10" alt="">
            <h5 class="pl-20 heading fs-24 mb-30">How Corporate Gifting Can Improve Client Retention</h5>
            <p id="text" class="pl-20">
              <span id="truncated-text" class="fs-18 secondry-font">
                How gifting strengthens relationships with employees and clients...
              </span>
              <span id="full-text" class="hidden light-black fs-18 secondry-font">
                How gifting strengthens relationships with employees and clients. Gifting is a powerful way to show appreciation, build trust, and foster a sense of connection. Whether it's a thoughtful holiday gift for employees or a personalized token of gratitude for clients, these gestures can enhance loyalty, improve morale, and create lasting bonds that benefit both parties in the long term.
              </span>
              <span id="read-more-link" class="read-more-link text-secondry-theme  fs-18 secondry-font fw-600">Read More</span>
            </p>
          </div>
        </div>
        <div class="col-lg-12 text-center">
          <a href="" class="btn primary-btn border-0">Load More</a>
        </div>
      </div>
    </div>
  </section>

  @include('website.include.perfect-gifting')
@endSection