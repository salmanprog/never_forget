<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('meta'); ?> 
    <meta content="" name="description">
    <meta content="" name="keywords">
<?php $__env->stopSection(); ?>
<style>
  .styled-video-wrapper video {
   width: 100% !important;
     object-fit: cover !important;
     max-height: 750px !important;
     border-radius: 32px !important;
     margin-bottom: 50px !important;
  }
 </style>
<?php $__env->startSection('content'); ?>
<main class="inner-bg"> 
    <section class="inner-banner">
      <div class="container">
        <h1 class="heading fs-74" data-aos="fade-down" data-aos-easing="ease-out-cubic"
          data-aos-duration="1000">How It <span>Works</span></h1>
      </div>
    </section>
  </main>
  <section class="hiw-sec-2 py-150">
    <div class="container">
      <?php if(isset($home_page_data['how_it_works_status']) && $home_page_data['how_it_works_status'] == 1 && isset($home_page_data['how_it_works_video'])): ?>
            <div class="styled-video-wrapper">
                <video class="img-fluid" autoplay  muted controls loop>
                <source src="<?php echo e(asset('public/admin/assets/videos/'.$home_page_data['how_it_works_video'])); ?>" type="video/mp4">
                Your browser does not support the video tag.
                </video>
            </div>
            <?php endif; ?>
      <div class="row row-gap-40 text-center text-lg-start" data-aos="fade-down" data-aos-easing="ease-out-cubic"
        data-aos-duration="1000">
        <div class="col-md-6 col-lg-4">
          <div class="card-wrapper bg-transparent">
            <div class="mb-34 sm-circle lg-circle d-flex align-items-center justify-content-center">
              <img src="<?php echo e(asset('public/assets/website/images')); ?>/icons/message.svg" alt="">
            </div>
            <div class="card-bottom">
              <h5 class="heading text-secondry-theme-light fs-40 fw-600 mb-20">
                Consultation
              </h5>
              <p> Tell us your gifting needs! Whether you’re looking for employee appreciation gifts, client rewards, or fully branded corporate packages.</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="card-wrapper bg-transparent">
            <div class="mb-34 sm-circle lg-circle d-flex align-items-center justify-content-center">
              <img src="<?php echo e(asset('public/assets/website/images')); ?>/icons/settings.svg" alt="">
            </div>
            <div class="card-bottom">
              <h5 class="heading text-secondry-theme-light fs-40 fw-600 mb-20">
                Customization
              </h5>
              <p>Make it personal! Add your company logo, personalized messages, and custom packaging to create a gift that truly represents your brand.</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="card-wrapper bg-transparent">
            <div class="mb-34 sm-circle lg-circle d-flex align-items-center justify-content-center">
              <img src="<?php echo e(asset('public/assets/website/images')); ?>/icons/delivery.svg" alt="">
            </div>
            <div class="card-bottom">
              <h5 class="heading text-secondry-theme-light fs-40 fw-600 mb-20">
                Delivery
              </h5>
              <p>Sit back and relax! We handle everything from careful packaging to on-time delivery, ensuring your gifts arrive in perfect condition, hassle-free.</p>
            </div>
          </div>
        </div>
      </div> 
    </div>
  </section>
  <section class="hiw-sec-3">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 text-center text-lg-start">
          <span class="btn des-wrapper mb-30 aos-init aos-animate" data-aos="flip-up" data-aos-easing="ease-out-cubic"
            data-aos-duration="1000" style="padding: 10px 32px">Step 1</span>
          <h2 class="heading fs-74 mt-10" data-aos="fade-right" data-aos-easing="ease-out-cubic"
            data-aos-duration="1000">Choose a <span>Gifting</span> Plan</h2>
        </div>
        <div class="col-lg-3" data-aos="fade-down" data-aos-easing="ease-out-cubic"
          data-aos-duration="1000">
          <div class="card-wrapper">
            <h3 class="fs-35 fw-600 mb-10 light-black">Basic Plan</h3>
            <p class="text-black opacity-50 mb-30 fs-16">Birthday & Anniversary Gifts</p>
            <ul class="plans-list check-list position-relative">
              <li>Personalized occasion-based gifts</li>
              <li>Pre-selected, budget-friendly options</li>
              <li>Standard delivery to your home or office</li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3" data-aos="fade-down" data-aos-easing="ease-out-cubic"
          data-aos-duration="1000">
          <div class="card-wrapper">
            <h3 class="fs-35 fw-600 mb-10 light-black">Standard Plan</h3>
            <p class="text-black opacity-50 mb-30 fs-16">Custom Gifts for Employees & Clients</p>
            <ul class="plans-list check-list position-relative">
              <li>Custom-branded corporate gifts</li>
              <li>Flexible budget and gift selection</li>
              <li>Bulk ordering & easy distribution</li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3" data-aos="fade-down" data-aos-easing="ease-out-cubic"
          data-aos-duration="1000">
          <div class="card-wrapper">
            <h3 class="fs-35 fw-600 mb-10 light-black">Enterprise Plan</h3>
            <p class="text-black opacity-50 mb-30 fs-16">Fully Branded Corporate Gifting</p>
            <ul class="plans-list check-list position-relative">
              <li>Premium, fully customized gifts</li>
              <li>Dedicated account management</li>
              <li>Exclusive packaging & experiences</li>
            </ul>
          </div>
        </div>
        <div class="col-lg-12 text-center mt-70" data-aos="flip-left" data-aos-easing="ease-out-cubic"
          data-aos-duration="1000">
          <h4 class="fs-24 secondry-font light-black fw-400 mb-10">Not sure which plan fits your needs? </h4>
          <h5 class="fs-24 secondry-font light-black fw-600 mb-20">Our team can help you choose the best option! </h5>
          <div class="d-flex align-content-center justify-content-center">
            <a href="<?php echo e(route('contact-us')); ?>" class="btn primary-btn border-0">Contact Our Team</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="hiw-sec-4 py-150">
    <div class="container">
      <div class="row row-gap-40 text-center text-lg-start">
  
        <div class="col-lg-6">
          <div class="img-wrapper position-relative" data-aos="fade-right" data-aos-easing="ease-out-cubic"
            data-aos-duration="1000">
            <img src="<?php echo e(asset('public/assets/website/images')); ?>/hiw-sec-4.png" alt="">
          </div>
        </div>
        <div class="col-lg-6" data-aos="fade-left" data-aos-easing="ease-out-cubic"
          data-aos-duration="1000">
          <span class="btn des-wrapper mb-30 aos-init aos-animate" data-aos="flip-up" data-aos-easing="ease-out-cubic"
            data-aos-duration="1000" style="padding: 10px 32px">Step 2</span>
          <h2 class="heading fs-74 mb-30">Customize Your <span>Gifts</span></h2>
          <p class="mb-20">Make your gifts truly unique with our customization options, ensuring they reflect your brand identity and appreciation.</p>
          <div class="mb-30">
            <h4 class="fs-28 mb-10 fw-600 text-primary-theme-light">Branding & Personalization</h4>
            <p>
              Add your company logo, recipient’s name, or a special <br> message to create a personal touch.
            </p>
          </div>
          <div class="mb-30">
            <h4 class="fs-28 mb-10 fw-600 text-primary-theme-light">Gift Selection</h4>
            <p>
              Choose from a wide range of premium products, including tech <br> gadgets, gourmet treats, wellness items, and more.
            </p>
          </div>
          <div class="mb-30">
            <h4 class="fs-28 mb-10 fw-600 text-primary-theme-light">Exclusive Packaging</h4>
            <p>
              Impress your recipients with elegant, high-quality packaging <br> tailored to your company’s aesthetic.
            </p>
          </div>
          <a href="<?php echo e(route('contact-us')); ?>" class="btn primary-btn border-0">Contact Us For Customize Gifting</a>
        </div>
      </div>
    </div>
  </section>
  <section class="hiw-sec-5 sec-bg py-150">
    <div class="container">
      <div class="row row-gap-40 flex-column-reverse flex-lg-row">
  
  
        <div class="col-lg-6" data-aos="fade-right" data-aos-easing="ease-out-cubic"
          data-aos-duration="1000">
          <span class="btn des-wrapper mb-30 aos-init aos-animate" style="padding: 10px 32px">Step 3</span>
          <h2 class="heading fs-74 mb-30">Place Your <span>Order</span></h2>
          <p class="mb-20">Ordering is quick and hassle-free! Simply select your gifts, provide the recipient details, and let us take care of the rest. Whether you need bulk orders for an event or ongoing gifting throughout the year, we ensure a smooth experience.</p>
          <div class="mb-30">
            <h4 class="fs-28 mb-10 fw-600 text-primary-theme-light">One-time orders</h4>
            <p>
              Ideal for special occasions and seasonal gifting.
            </p>
          </div>
          <div class="mb-30">
            <h4 class="fs-28 mb-10 fw-600 text-primary-theme-light">Recurring gifting programs</h4>
            <p>
              Set up automated gifting for birthdays, work <br> anniversaries, and corporate events.
            </p>
          </div>
          <div class="mb-30">
            <h4 class="fs-28 mb-10 fw-600 text-primary-theme-light">Bulk ordering</h4>
            <p>
              Streamlined solutions for large-scale corporate <br> gifting with flexible options.
            </p>
          </div>
          <a href="<?php echo e(route('contact-us')); ?>" class="btn primary-btn border-0">Contact Us For Gifting Plans</a>
        </div>
        <div class="col-lg-6" data-aos="fade-left" data-aos-easing="ease-out-cubic"
          data-aos-duration="1000">
          <div class="img-wrapper position-relative">
            <img src="<?php echo e(asset('public/assets/website/images')); ?>/hiw-sec-5.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="hiw-sec-6 py-150">
    <div class="container">
      <div class="row row-gap-40 text-center text-lg-start">
  
        <div class="col-lg-6" data-aos="fade-right" data-aos-easing="ease-out-cubic"
          data-aos-duration="1000">
          <div class="img-wrapper position-relative">
            <img src="<?php echo e(asset('public/assets/website/images')); ?>/hiw-sec-6.png" alt="">
          </div>
        </div>
        <div class="col-lg-6" data-aos="fade-left" data-aos-easing="ease-out-cubic"
          data-aos-duration="1000">
          <span class="btn des-wrapper mb-30 aos-init aos-animate" style="padding: 10px 32px">Step 4</span>
          <h2 class="heading fs-74 mb-30">We <span>Handle</span> the Rest</h2>
          <p class="mb-20">Once your order is placed, we take care of everything—from sourcing and packaging to delivery.</p>
          <div class="mb-30">
            <h4 class="fs-28 mb-10 fw-600 text-primary-theme-light">End-to-End Fulfillment</h4>
            <p>
              Our team ensures each gift is carefully assembled and <br> beautifully presented.
            </p>
          </div>
          <div class="mb-30">
            <h4 class="fs-28 mb-10 fw-600 text-primary-theme-light">Reliable & Timely Delivery</h4>
            <p>
              Gifts are shipped directly to your recipients, ensuring they arrive on time, every time.
            </p>
          </div>
          <div class="mb-30">
            <h4 class="fs-28 mb-10 fw-600 text-primary-theme-light">Order Tracking & Support</h4>
            <p>
              Stay updated on your orders with real-time tracking and <br> dedicated customer support.
            </p>
          </div>
          <a href="<?php echo e(route('contact-us')); ?>" class="btn primary-btn border-0">Contact Us For Customize Gifting</a>
        </div>
      </div>
    </div>
  </section>
  <section class="hiw-sec-7 pb-60">
    <div class="container">
      <div class="row text-center justify-content-center mb-60">
        <div class="col-lg-6">
          <h3 class="heading fs-74 mb-20" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
             Strengthen  <span> Business </span>  Relationships
          </h3>
          <p class="mb-20" data-aos="fade-down" data-aos-easing="ease-out-cubic"
            data-aos-duration="1000">
            Corporate gifting isn’t just about giving presents—it’s about building stronger relationships, boosting employee morale, and leaving a lasting impression.
          </p>
          <p data-aos="fade-down" data-aos-easing="ease-out-cubic"
            data-aos-duration="1000">With our seamless gifting solutions, you can show appreciation in a meaningful and professional way.</p>
        </div>
      </div>
      <div class="row" data-aos="fade-down" data-aos-easing="ease-out-cubic"
        data-aos-duration="1000">
        <div class="col-md-6 col-lg-4">
          <div class="text-center">
            <h5 class="heading fs-74 mb-10">95%</h5>
            <p class="opacity-75">of our clients see <br> improved client retention</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="text-center">
            <h5 class="heading fs-74 mb-10">80%</h5>
            <p class="opacity-75">of businesses say corporate <br> gifting strengthens relationships.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="text-center">
            <h5 class="heading fs-74 mb-10">70%</h5>
            <p class="opacity-75">of customers prefer businesses <br> that send personalized gifts.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="hiw-sec-8 pb-150">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
            
          <h4 class="light-black mb-10 fs-32 fw-600 text-center" data-aos="flip-left" data-aos-easing="ease-out-cubic"
          data-aos-duration="1000">Looking for a fully customized gifting solution? </h4>
          <p class="text-center mb-30" data-aos="flip-left" data-aos-easing="ease-out-cubic"
          data-aos-duration="1000">Contact us to create a tailored plan that perfectly suits your business needs!</p>
          <div class="d-flex justify-content-center">
            <a href="<?php echo e(route('contact-us')); ?>" class="btn primary-btn border-0 text-center">Contact Our Team</a>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.website.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp8.2\htdocs\never-forget\resources\views/website/how-it-works.blade.php ENDPATH**/ ?>