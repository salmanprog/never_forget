<section id="testimonials" class="testimonials testimonials-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h3 class="primary-color">Clients Reviews</h3>
            <h2>
                <img src="<?php echo e(asset('public/assets/website/images/left-quote.png')); ?>" class="testimonials-quote">
                What Clients Are Say’s 
                <img src="<?php echo e(asset('public/assets/website/images/right-quote.png')); ?>" class="testimonials-quote">
            </h2>
        </div>

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
            <?php $testimonials = App\Models\Testimonial::where('status', 1)->get() ?>
            <div class="swiper-wrapper">
                <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="testimonial-flaxed">
                                <img src="<?php echo e(asset('public/admin/assets/images/testimonials')); ?>/<?php echo e($testimonial->image); ?>" class="testimonial-img" alt="">
                                <h3>
                                    <?php echo e($testimonial->name); ?>

                                    <span class="client-position">
                                        <?php echo e($testimonial->designation); ?>

                                    </span>
                                </h3>
                            </div> 
                            <?php echo $testimonial->comment; ?> 
                        </div>
                    </div><!-- End testimonial item -->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
            <!-- Navigation buttons outside swiper-wrapper -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <!-- Add pagination if needed -->
            <div class="swiper-pagination"></div>
        </div>

    </div>
</section><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\layouts\website\testimonial.blade.php ENDPATH**/ ?>