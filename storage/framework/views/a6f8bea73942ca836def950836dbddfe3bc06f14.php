
<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('meta'); ?>
    <meta content="" name="description">
    <meta content="" name="keywords">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


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
            <?php if($videos->count() > 0): ?>
                <div class="mb-60">
                    <h3 class="heading fs-48 text-center mb-50" data-aos="fade-down" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                        Video Testimonials
                    </h3>
                    <div class="row justify-content-center row-gap-30">
                        <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-xl-6">
                                <div class="d-flex justify-content-center justify-content-xl-end">
                                    <div class="card-wrapper test-card-wrapper position-relative">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="test-card-video-wrapper">
                                                    <video src="<?php echo e(asset('public/admin/assets/images/testimonials')); ?>/<?php echo e($video->video); ?>" autoplay muted loop loading="lazy" controls></video>
                                                </div>
                                            </div>
                                            <div class="col-lg-8"> 
                                                <h3 class="fs-24 mb-20 fw-400 for-p">     
                                                    <?php echo $video->comment; ?>  
                                                </h3>
                                                <div class="d-flex align-items-center test-card-bottom mb-22">
                                                    <div>
                                                        <h4 class="mb-5"><?php echo e($video->name); ?></h4>
                                                    </div>
                                                </div>
                                                <ul class="ratings d-flex align-items-center gap-10">
                                                    <?php for($i = 1; $i <= 5; $i++): ?>
                                                        <?php if($i <= $video->rating): ?>
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
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Image Testimonials Section -->
            <?php if($testimonials->where('image', '!=', null)->count() > 0): ?>
                <div class="mb-60">
                    <h3 class="heading fs-48 text-center mb-50" data-aos="fade-down" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                        Image Testimonials
                    </h3>
                    <div class="row justify-content-center row-gap-30">
                        <?php $__currentLoopData = $testimonials->where('image', '!=', null); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                            <div class="col-xl-6">
                                <div class="d-flex justify-content-center justify-content-xl-end">
                                    <div class="card-wrapper test-card-wrapper position-relative">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="test-card-img-wrapper">
                                                    <img src="<?php echo e(asset('public/admin/assets/images/testimonials')); ?>/<?php echo e($testimonial->image); ?>" alt="" loading="lazy">
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
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endif; ?> 
                <div class="mt-30">
                    <h3 class="heading fs-64 text-center" data-aos="fade-down" data-aos-easing="ease-out-cubic"
                        data-aos-duration="1000">
                        Thoughtful Gifts, Lasting Impressions – Let's Make Gifting Unforgettable!
                    </h3>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.website.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views/website/testimonials.blade.php ENDPATH**/ ?>