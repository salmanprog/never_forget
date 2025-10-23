
<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('meta'); ?>
    <meta content="" name="description">
    <meta content="" name="keywords">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Preload Slick fonts for better performance -->
    <link rel="preload" href="<?php echo e(asset('public/assets/website/libs/fonts/slick.woff')); ?>" as="font" type="font/woff" crossorigin>
    <link rel="preload" href="<?php echo e(asset('public/assets/website/libs/fonts/slick.ttf')); ?>" as="font" type="font/ttf" crossorigin>
    
    <link href="<?php echo e(asset('public/assets/website/vendor/aos/aos.css')); ?>" rel="stylesheet">


    <style>
        /* Font loading optimization */
        @font-face {
            font-family: 'slick';
            font-weight: 400;
            font-style: normal;
            font-display: swap;
            src: url('<?php echo e(asset("public/assets/website/libs/fonts/slick.woff")); ?>') format('woff'),
                 url('<?php echo e(asset("public/assets/website/libs/fonts/slick.ttf")); ?>') format('truetype');
        }
        
        .about-img {
            margin-top: 70px;
            text-align: center;
            height: 450px;
            /* Fixed height for the image container */
            display: flex;
            align-items: center;
            justify-content: center;
        }


        .about-img img {
            max-width: 100%;
            height: 440px;
            /* Fixed height for the image itself */
            border-radius: 30px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            transition: transform 0.4s ease-in-out;
            animation: float 6s ease-in-out infinite;
            /* Added float animation */
        }

        .about-img img:hover {
            transform: scale(1.03);
        }

        @keyframes  float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        .inner-page-heading {
            padding: 100px 0;
            text-align: center;
        }

        .inner-page-heading h1 {
            font-size: 3.8rem;
            font-weight: 700;
            color: #fff;
            text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.6);
            letter-spacing: 2px;
        }

        .about-section {
            margin-bottom: 0 !important;
            padding: 80px 0;
            background-color: #f8f9fa;
        }

        /* .about-info {
        padding-right: 40px;
    } */

        .about-info h1 {
            font-size: 5rem;
            font-weight: 600;
            color: #081e37;
            margin-bottom: 40px;
            text-align: center;
            position: relative;
            padding-bottom: 15px;
        }

        .about-info h1::after {
            content: '';
            position: absolute;
            left: 50%;
            bottom: 0;
            transform: translateX(-50%);
            width: 60px;
            height: 4px;
            background-color: #cfa40c;
            /* Gold accent line */
            border-radius: 2px;
        }

        #main #faq .card .card-header .btn-header-link {
            color: #fff;
            display: block;
            text-align: left;
            background: #081e37;
            padding: 15px;
            border-radius: 8px 8px 0 0;
            border-left: 1px solid #081e37;
            border-right: 1px solid #081e37;
            border-top: 1px solid #081e37;
            border-bottom: 1px solid #081e37;
        }

        .card a.btn.btn-header-link {
            font-size: 18px;
            font-family: 'Cocogoose', sans-serif !important;
            font-weight: 500;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .card a.btn.btn-header-link:hover {
            background: #cfa40c;
            color: #081e37;
        }

        #main #faq .card .card-header {
            border: 0;
            border-radius: 5px;
            padding: 0;
        }

        #main #faq .card {
            margin-bottom: 20px;
            border: 0;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            background: #efe4c3 !important;
            /* Lighter shade of gold */
            font-size: 16px;
            line-height: 1.8;
            color: #333;
            padding: 20px;
            border-radius: 0 0 5px 5px;
        }

        #main #faq .card .card-header .btn-header-link.collapsed:after {
            content: "\f067";
            /* Plus icon */
            font-family: 'FontAwesome';
            font-weight: 900;
            float: right;
            transform: rotate(0deg);
            transition: transform 0.3s ease;
        }

        #main #faq .card .card-header .btn-header-link:after {
            content: "\f068";
            /* Minus icon */
            font-family: 'FontAwesome';
            font-weight: 900;
            float: right;
            transform: rotate(180deg);
            transition: transform 0.3s ease;
        }

        #main #faq .card .collapse.show {
            background: #081e37;
            /* Darker background for expanded state */
            line-height: 1.8;
            color: #fff;
            border-left: 1px solid #cfa40c;
            border-right: 1px solid #cfa40c;
            border-bottom: 1px solid #cfa40c;
        }

        #main #faq .card .collapse {
            border: 0;
        }
    </style>
    <section class="hero-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <span class="btn des-wrapper mb-30" data-aos="flip-up" data-aos-easing="ease-out-cubic"
                        data-aos-duration="1000">Elevate Employee & Client Appreciation</span>
                    <h1 class="fs-74 heading mb-30" data-aos="fade-right" data-aos-easing="ease-out-cubic"
                        data-aos-duration="1000" style="max-width: 625px">
                        Thoughtful Gifting <span>Solutions</span> for Businesses
                    </h1>
                    <p class="mb-30" style="max-width: 550px;" data-aos="fade-down" data-aos-easing="ease-out-cubic"
                        data-aos-duration="1000">
                        Strengthen relationships, boost morale, and retain top talent with personalized corporate gifting
                        and employee appreciation programs.
                    </p>
                    <a href="#" class="btn primary-btn border-0"><span>Explore Corporate Gifting Plans</span></a>
                    <a href="tel:<?php echo e($home_page_data['header_phone']); ?>" class="btn primary-btn border-0"><span>Call
                            Now</span></a>
                </div>
            </div>
        </div>
    </section>
    <section class="about-sec py-140">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                    <div class="img-wrapper position-relative">
                        <img src="<?php echo e(asset('public/assets/website/images')); ?>/about-us-sec-img.png" alt="About Us">
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                    <span class="btn des-wrapper mb-30" data-aos="flip-up" data-aos-easing="ease-out-cubic"
                        data-aos-duration="1000">Never Forget Showing Appreciation</span>
                    <h2 class="heading fs-74 mb-30">About <span>Us</span></h2>
                    <p class="mb-30" style="max-width: 555px">
                        Welcome to customer, employee, and individual connections & appreciation, where we believe that
                        business is built on more than just transactions - it's built on genuine connections and heartfelt
                        appreciation.
                    </p>
                    <p class="mb-30" style="max-width: 555px">
                        Founded with a passion for fostering meaningful relationships, our mission is to help businesses
                        like yours cultivate loyalty, trust, and lasting connections with your clients.
                    </p>
                    <a href="<?php echo e(route('about-us')); ?>" class="btn primary-btn border-0"><span>More About Us</span></a>

                </div>
            </div>
        </div>
    </section>
    <section class="solutions-sec">
        <div class="container me-0">
            <div class="col-lg-6">
                <span class="btn des-wrapper mb-20" data-aos="flip-up" data-aos-easing="ease-out-cubic"
                    data-aos-duration="1000">Never Forget Showing Appreciation</span>
                <h2 class="heading fs-64 mb-30" data-aos="fade-right" data-aos-easing="ease-out-cubic"
                    data-aos-duration="1000" style="max-width: 500px"> Our Corporate <span>Solutions</span>
                </h2>
            </div>
            <div class="row">
                <div class="solutions-slider-wrapper mb-40">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="slider slider-for">
                                <div class="d-flex">
                                    <div class="solutions-main-img-wrapper">
                                        <img src="<?php echo e(asset('public/assets/website/images')); ?>/solution-img-01.png"
                                            alt="">
                                    </div>
                                    <div class="text-content">
                                        <h4 class="heading light-black fs-40 mb-30">
                                            Employee Appreciation <span>Programs</span>
                                        </h4>
                                        <p>Celebrate your team’s milestones—effortlessly and meaningfully.</p>
                                    </div>
                                </div>
                                <!-- Repeat for other slides -->
                                <div class="d-flex">
                                    <div class="solutions-main-img-wrapper">
                                        <img src="<?php echo e(asset('public/assets/website/images')); ?>/solution-img-02.png"
                                            alt="">
                                    </div>
                                    <div class="text-content">
                                        <h4 class="heading light-black fs-40 mb-30">
                                            Personalized <span>Corporate</span> Gifts
                                        </h4>
                                        <ul>
                                            <li class="giftss">
                                                Custom-branded gifts for your employees
                                            </li>
                                            <li class="giftss">
                                                Ideal for birthdays, anniversaries, and onboarding
                                            </li>
                                            <li class="giftss">
                                                Boosts morale and builds lasting connections
                                            </li>
                                            <li class="giftss">
                                                High-quality, hand-picked appreciation items
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="solutions-main-img-wrapper">
                                        <img src="<?php echo e(asset('public/assets/website/images')); ?>/solution-img-03.png"
                                            alt="">
                                    </div>
                                    <div class="text-content">
                                        <h4 class="heading light-black fs-40 mb-30">
                                            Meaningful Recognition <span>Moments</span>
                                        </h4>
                                        <ul>
                                            <li class="giftss">
                                                Surprise-and-delight gifts delivered to their desk
                                            </li>
                                            <li class="giftss">
                                                Promote a culture of care and appreciation
                                            </li>
                                            <li class="giftss">
                                                Increases employee engagement and loyalty
                                            </li>
                                            <li class="giftss">
                                                Encourages peer-to-peer recognition
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="solutions-main-img-wrapper">
                                        <img src="<?php echo e(asset('public/assets/website/images')); ?>/solution-img-04.png"
                                            alt="">
                                    </div>
                                    <div class="text-content">
                                        <h4 class="heading light-black fs-40 mb-30">
                                            Seamless Delivery, <span>Maximum</span> Impact
                                        </h4>
                                        <ul>
                                            <li class="giftss">
                                                Hassle-free planning—handled by NEVER FORGET
                                            </li>
                                            <li class="giftss">
                                                Timely gift deliveries for every occasion
                                            </li>
                                            <li class="giftss">
                                                Nationwide shipping and tracking
                                            </li>
                                            <li class="giftss">
                                                Designed to leave a lasting impression
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Add remaining slides as needed -->
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="slider slider-nav">
                                <div class="solutions-right-img-wrapper">
                                    <img src="<?php echo e(asset('public/assets/website/images')); ?>/solution-img-01.png"
                                        alt="">
                                </div>
                                <div class="solutions-right-img-wrapper">
                                    <img src="<?php echo e(asset('public/assets/website/images')); ?>/solution-img-02.png"
                                        alt="">
                                </div>
                                <div class="solutions-right-img-wrapper">
                                    <img src="<?php echo e(asset('public/assets/website/images')); ?>/solution-img-03.png"
                                        alt="">
                                </div>
                                <div class="solutions-right-img-wrapper">
                                    <img src="<?php echo e(asset('public/assets/website/images')); ?>/solution-img-04.png"
                                        alt="">
                                </div>
                            </div>
                        </div>
                        <div class="testimonials-arrows  solution-arrows  d-flex align-items-center gap-30 justify-content-center">
                            <div class="arrow-left arrows">
                                <i class="fa-solid fa-arrow-left-long"></i>
                            </div>
                            <div class="arrow-right arrows">
                                <i class="fa-solid fa-arrow-right-long"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <a href="" data-bs-toggle="modal" data-bs-target="#quoteModal"
                        class="btn primary-btn border-0">Get a Custom Quote</a>
                </div>
            </div>
        </div>
    </section>

    <section class="shop-sec py-140">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center pb-60">
                    <span class="btn des-wrapper mb-30" data-aos="flip-up" data-aos-easing="ease-out-cubic"
                        data-aos-duration="1000">Never Forget Showing Appreciation</span>
                    <h2 class="heading fs-64 mb-30" data-aos="flip-left" data-aos-easing="ease-out-cubic"
                        data-aos-duration="1000">
                        Shop <span>Our Products</span>
                    </h2>
                    <p class="mb-30">
                        Explore our curated collection of high-quality, personalized corporate gifts. 
                        From branded apparel to office essentials, we have everything you need to show your appreciation.
                    </p>
                </div>
            </div>
            <div class="slider product-category-slider" data-aos="fade-down" data-aos-easing="ease-out-cubic"
                data-aos-duration="1000">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card-wrapper">
                        <div class="category-image mb-20">
                            <?php if($category->products->count() > 0): ?>
                                <img src="<?php echo e(asset('public/admin/assets/images/product')); ?>/<?php echo e($category->products->first()->image); ?>"
                                    alt="<?php echo e($category->title); ?>" class="img-fluid">
                            <?php else: ?>
                                <img src="<?php echo e(asset('public/assets/website/images')); ?>/gift-img.png"
                                    alt="<?php echo e($category->title); ?>" class="img-fluid">
                            <?php endif; ?>
                        </div>
                        <div class="card-bottom text-center">
                            <h5 class="heading light-black fs-24 fw-600 mb-20">
                                <?php echo e($category->title); ?>

                            </h5>
                            <a href="<?php echo e(route('shop', ['category' => $category->id])); ?>" class="btn primary-btn border-0"><span>See More</span></a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="card-wrapper">
                    <div class="category-image mb-20">
                        <img src="<?php echo e(asset('public/assets/website/images/greeting_card')); ?>/business_card.jpg"
                                alt="Business Cards" class="img-fluid">
                    </div>
                    <div class="card-bottom text-center">
                        <h5 class="heading light-black fs-24 fw-600 mb-20">
                            Business Cards
                        </h5>
                        <a href="<?php echo e(route('shop', ['category' => 0])); ?>" class="btn primary-btn border-0"><span>See More</span></a>
                    </div>
                </div>
                <div class="card-wrapper">
                    <div class="category-image mb-20">
                        <img src="<?php echo e(asset('public/assets/website/images/quality_logo_category')); ?>/trade-show-desktop.webp"
                                alt="Quality Logo" class="img-fluid">
                    </div>
                    <div class="card-bottom text-center">
                        <h5 class="heading light-black fs-24 fw-600 mb-20">
                            Quality Logo
                        </h5>
                        <a href="<?php echo e(route('shop', ['category' => 0])); ?>" class="btn primary-btn border-0"><span>See More</span></a>
                    </div>
                </div>
                <div class="card-wrapper">
                    <div class="category-image mb-20">
                        <img src="<?php echo e(asset('public/assets/website/images/greeting_card')); ?>/anniversary.webp"
                                alt="Travel & Experience" class="img-fluid">
                    </div>
                    <div class="card-bottom text-center">
                        <h5 class="heading light-black fs-24 fw-600 mb-20">
                            Travel & Experience
                        </h5>
                        <a href="<?php echo e(route('shop', ['category' => 0])); ?>" class="btn primary-btn border-0"><span>See More</span></a>
                    </div>
                </div>
                <div class="card-wrapper">
                    <div class="category-image mb-20">
                        <img src="<?php echo e(asset('public/assets/website/images/greeting_card')); ?>/happybirthday.png"
                                alt="Greeting and Appreciation" class="img-fluid">
                    </div>
                    <div class="card-bottom text-center">
                        <h5 class="heading light-black fs-24 fw-600 mb-20">
                            Greeting & Appreciation
                        </h5>
                        <a href="<?php echo e(route('shop', ['category' => 0])); ?>" class="btn primary-btn border-0"><span>See More</span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="benefit-sec">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center pb-60" style="max-width: 677px">
                    <span class="btn des-wrapper mb-30" data-aos="flip-up" data-aos-easing="ease-out-cubic"
                        data-aos-duration="1000">Never Forget Showing Appreciation</span>
                    <h2 class="heading fs-64 mb-30" data-aos="flip-left" data-aos-easing="ease-out-cubic"
                        data-aos-duration="1000">
                        Who Can Benefit from Our Corporate
                        <span>Gifting Services?</span>
                    </h2>
                    <p class="mb-30">
                        From global enterprises to small teams, we offer solutions for every organization.
                    </p>
                </div>
            </div>
            <!-- <div class="d-flex flex-wrap flex-xl-nowrap row-gap-70 justify-content-center align-items-center gap-11 mb-30"
                    data-aos="fade-down" data-aos-easing="ease-out-cubic" data-aos-duration="1000"> -->
            <div class="slider benefit-slider" data-aos="fade-down" data-aos-easing="ease-out-cubic"
                data-aos-duration="1000">
                <div class="card-wrapper">
                    <div class="mb-34 sm-circle lg-circle d-flex align-items-center justify-content-center">
                        <img src="<?php echo e(asset('public/assets/website/images')); ?>/icons/benefit-card-icon-01.svg"
                            alt="">
                    </div>
                    <div class="card-bottom">
                        <h5 class="heading light-black fs-24 fw-600 mb-20">
                            HR & Employee <span>Engagement</span> Teams
                        </h5>
                        <p>Retain talent & boost morale.</p>
                        <ul>
                            <li class="giftss">
                                Celebrate work anniversaries & birthdays with ease
                            </li>
                            <li class="giftss">
                                Reinforce company culture and employee loyalty
                            </li>
                            <li class="giftss">
                                Reduce turnover through thoughtful gestures
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-wrapper">
                    <div class="mb-34 sm-circle lg-circle d-flex align-items-center justify-content-center">
                        <img src="<?php echo e(asset('public/assets/website/images')); ?>/icons/benefit-card-icon-02.svg"
                            alt="">
                    </div>
                    <div class="card-bottom">
                        <h5 class="heading light-black fs-24 fw-600 mb-20">
                            Sales & Client Relations <span>Teams</span>
                        </h5>
                        <p>Improve client retention.</p>
                        <ul>
                            <li class="giftss">
                                Send timely thank-you gifts after deals close
                            </li>
                            <li class="giftss">
                                Strengthen long-term relationships with personalized gestures
                            </li>
                            <li class="giftss">
                                Increase referral potential through memorable touchpoints
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-wrapper">
                    <div class="mb-34 sm-circle lg-circle d-flex align-items-center justify-content-center">
                        <img src="<?php echo e(asset('public/assets/website/images')); ?>/icons/benefit-card-icon-03.svg"
                            alt="">
                    </div>
                    <div class="card-bottom">
                        <h5 class="heading light-black fs-24 fw-600 mb-20">
                            Corporate <span>Event</span> Planners
                        </h5>
                        <p>Make every event memorable.</p>
                        <ul>
                            <li class="giftss">
                                Pre-curated gift boxes for conferences and meetings
                            </li>
                            <li class="giftss">
                                Customizable branding for swag & appreciation
                            </li>
                            <li class="giftss">
                                Delivered to attendees or guests nationwide
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-wrapper">
                    <div class="mb-34 sm-circle lg-circle d-flex align-items-center justify-content-center">
                        <img src="<?php echo e(asset('public/assets/website/images')); ?>/icons/benefit-card-icon-04.svg"
                            alt="">
                    </div>
                    <div class="card-bottom">
                        <h5 class="heading light-black fs-24 fw-600 mb-20" style="max-width: 230px">
                            Real Estate & Financial <span>Services</span>
                        </h5>
                        <p>Strengthen client bonds.</p>
                        <ul>
                            <li class="giftss">
                                Celebrate closings, anniversaries, and milestones
                            </li>
                            <li class="giftss">
                                Stay top-of-mind with follow-up gifts
                            </li>
                            <li class="giftss">
                                Differentiate your service with personal appreciation
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-wrapper">
                    <div class="mb-34 sm-circle lg-circle d-flex align-items-center justify-content-center">
                        <img src="<?php echo e(asset('public/assets/website/images')); ?>/icons/benefit-card-icon-05.svg"
                            alt="">
                    </div>
                    <div class="card-bottom">
                        <h5 class="heading light-black fs-24 fw-600 mb-20">
                            Healthcare & <span>Hospitality</span>
                        </h5>
                        <p>Retain talent & boost morale.</p>
                        <ul>
                            <li class="giftss">
                                Recognize frontline workers and long shifts
                            </li>
                            <li class="giftss">
                                Show appreciation for compassionate care
                            </li>
                            <li class="giftss">
                                Improve workplace satisfaction and morale
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-wrapper">
                    <div class="mb-34 sm-circle lg-circle d-flex align-items-center justify-content-center">
                        <img src="<?php echo e(asset('public/assets/website/images')); ?>/icons/benefit-card-icon-05.svg"
                            alt="">
                    </div>
                    <div class="card-bottom">
                        <h5 class="heading light-black fs-24 fw-600 mb-20">
                            Military & Public Service <span>Teams</span>
                        </h5>
                        <p>Honor service with heartfelt appreciation</p>
                        <ul>
                            <li class="giftss">
                                Recognize active duty, veterans, police, firefighters, EMTs
                            </li>
                            <li class="giftss">
                                Perfect for Veterans Day, promotions, and retirements
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-wrapper">
                    <div class="mb-34 sm-circle lg-circle d-flex align-items-center justify-content-center">
                        <img src="<?php echo e(asset('public/assets/website/images')); ?>/icons/benefit-card-icon-05.svg"
                            alt="">
                    </div>
                    <div class="card-bottom">
                        <h5 class="heading light-black fs-24 fw-600 mb-20">
                            Teachers & School <span>Administrators</span>
                        </h5>
                        <p>Inspire those who shape our future</p>
                        <ul>
                            <li class="giftss">
                                Celebrate Teacher Appreciation Week, retirements, and more
                            </li>
                            <li class="giftss">
                                Recognize faculty and staff all year long
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-wrapper">
                    <div class="mb-34 sm-circle lg-circle d-flex align-items-center justify-content-center">
                        <img src="<?php echo e(asset('public/assets/website/images')); ?>/icons/benefit-card-icon-05.svg"
                            alt="">
                    </div>
                    <div class="card-bottom">
                        <h5 class="heading light-black fs-24 fw-600 mb-20">
                            Small Businesses & <span>Startups</span>
                        </h5>
                        <p>Appreciate big—even with a small team</p>
                        <ul>
                            <li class="giftss">
                                Affordable options for team recognition and client gifts
                            </li>
                            <li class="giftss">
                                Scalable appreciation programs built for growing businesses
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-wrapper">
                    <div class="mb-34 sm-circle lg-circle d-flex align-items-center justify-content-center">
                        <img src="<?php echo e(asset('public/assets/website/images')); ?>/icons/benefit-card-icon-05.svg"
                            alt="">
                    </div>
                    <div class="card-bottom">
                        <h5 class="heading light-black fs-24 fw-600 mb-20">
                            Nonprofits & Volunteer <span>Groups</span>
                        </h5>
                        <p>Celebrate the heart behind the mission</p>
                        <ul>
                            <li class="giftss">
                                Recognize donors, board members, and volunteers
                            </li>
                            <li class="giftss">
                                Show your mission has heart and appreciation
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center mt-60">
            <a href="tel:<?php echo e($home_page_data['header_phone']); ?>" class="btn primary-btn border-0 mx-auto">Talk to a
                Corporate Gifting Specialist</a>
        </div>
    </section>

    <?php echo $__env->make('website.include.trusted', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  

    <section class="about-section" data-aos="fade-up">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 text-center">
                    <div class="about-info mt-5">
                        <h1 class="heading">Frequently <span> Asked </span> Questions</h1>
                    </div>
                </div>
                <div id="main" class="col-md-6 mt-5" data-aos="fade-right">
                    <div class="about-info mt-5">
                        <div class="accordion" id="faq">
                            <?php $count=1 ?>
                            <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="card" data-aos="fade-up" data-aos-delay="<?php echo e(($count - 1) * 100); ?>">
                                    <div class="card-header" id="faqhead<?php echo e($question->id); ?>">
                                        <a href="#"
                                            class="btn btn-header-link <?php if($count != 1): ?> <?php echo e('collapsed'); ?> <?php endif; ?>"
                                            data-toggle="collapse" data-target="#faq<?php echo e($question->id); ?>"
                                            aria-expanded="<?php if($count == 1): ?> <?php echo e('true'); ?> <?php else: ?><?php echo e('false'); ?> <?php endif; ?>"
                                            aria-controls="faq<?php echo e($question->id); ?>"><?php echo e($question->question); ?></a>
                                    </div>
                                    <div id="faq<?php echo e($question->id); ?>"
                                        class="collapse <?php if($count == 1): ?> <?php echo e('show'); ?> <?php endif; ?>"
                                        aria-labelledby="faqhead<?php echo e($question->id); ?>" data-parent="#faq">
                                        <div class="card-body">
                                            <?php echo e($question->answer); ?>

                                        </div>
                                    </div>
                                </div>
                                <?php $count++ ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-5">
                    <div class="about-img" data-aos="fade-left">
                        <img src="<?php echo e(asset('public/assets/website/images')); ?>/faqs.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonials-sec">
        <div class="container">
            <div class="text-center">
                <span class="btn des-wrapper mb-20" data-aos="flip-up" data-aos-easing="ease-out-cubic"
                    data-aos-duration="1000">Never Forget Showing Appreciation</span>
                <h2 class="heading fs-64 mb-20" data-aos="flip-left" data-aos-easing="ease-out-cubic"
                    data-aos-duration="1000">
                    Testimonials
                </h2>
                <p class="mx-auto mb-30" data-aos="fade-up" data-aos-easing="ease-out-cubic" data-aos-duration="1000"
                    style="max-width: 470px">
                    See how businesses like yours have transformed their gifting strategies with NEVER FORGET
                </p>
            </div>
            <div class="row justify-content-center">
                <div class="testimonials-slider">

                    <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="d-flex justify-content-center h-100">
                            <div class="card-wrapper test-card-wrapper position-relative">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="test-card-img-wrapper test-card-video-wrapper">
                                            <?php if($testimonial->image): ?>
                                                <img src="<?php echo e(asset('public/admin/assets/images/testimonials')); ?>/<?php echo e($testimonial->image); ?>"
                                                    alt="" loading="lazy">
                                            <?php elseif($testimonial->video): ?>
                                                <video src="<?php echo e(asset('public/admin/assets/images/testimonials')); ?>/<?php echo e($testimonial->video); ?>"
                                                    controls autoplay muted loop loading="lazy">
                                                </video>
                                            <?php else: ?>
                                                <img src="<?php echo e(asset('public/admin/assets/images/testimonials/no-photo1.jpg')); ?>"
                                                    alt="" loading="lazy">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">

                                        <h3 class="fs-24 mb-20 fw-400 for-p">
                                            <?php echo $testimonial->comment; ?>

                                        </h3>
                                        <div class="d-flex align-items-center test-card-bottom mb-22">
                                            <div>
                                                <h4 class="mb-5"><?php echo e($testimonial->name); ?></h4>
                                            </div>
                                        </div>
                                        <ul class="ratings d-flex align-items-center gap-10">
                                            <?php for($i = 1; $i <= 5; $i++): ?>
                                                <?php if($i <= $testimonial->rating): ?>
                                                    <li><i class="fa-solid fa-star"></i></li>
                                                <?php else: ?>
                                                    <li><i class="fa-regular fa-star"></i></li>
                                                <?php endif; ?>
                                            <?php endfor; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="testimonials-arrows  pt-40  d-flex align-items-center gap-30 justify-content-center">
                    <div class="arrow-left arrows">
                        <svg width="50" height="24" viewBox="0 0 60 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <line x1="0" y1="12" x2="58" y2="12" stroke="black"
                                stroke-width="2" />
                            <polyline points="10,4 0,12 10,20" fill="none" stroke="black" stroke-width="2" />
                        </svg>
                    </div>
                    <div class="arrow-right arrows">
                        <svg width="50" height="24" viewBox="0 0 60 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <line x1="2" y1="12" x2="60" y2="12" stroke="black"
                                stroke-width="2" />
                            <polyline points="50,4 60,12 50,20" fill="none" stroke="black" stroke-width="2" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php echo $__env->make('layouts.website.get-a-quote', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('website.include.plans', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('website.include.gift-plan', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" crossorigin="anonymous"></script>

    <script src="<?php echo e(asset('public/assets/website/vendor/aos/aos.js')); ?>"></script>
    <script>
        AOS.init({
            duration: 1000,
            easing: "ease-in-out",
            once: true,
            mirror: false
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.website.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\never_forget\resources\views/website/index.blade.php ENDPATH**/ ?>