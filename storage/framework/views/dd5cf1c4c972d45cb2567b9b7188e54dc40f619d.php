
<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('meta'); ?>
<title>Customers Reviews || Never Forget</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- ======= Main Section ======= -->
    <main id="main" class="inner-page-header">

        <!-- ======= Branding Section ======= -->
        <section id="branding" class="branding branding-bg">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-md-4">
                        <div class="section-title">
                            <p><img src="<?php echo e(asset('public/assets/website/images/leaf.png')); ?>" class="branding-img">
                                Discount Up To 20% Off</p>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="section-title">
                            <p><img src="<?php echo e(asset('public/assets/website/images/leaf.png')); ?>" class="branding-img">
                                Discount Up To 20% Off</p>
                        </div>
                    </div>
                    <div class="col-md-4 text-end">
                        <div class="section-title">
                            <p><img src="<?php echo e(asset('public/assets/website/images/leaf.png')); ?>" class="branding-img">
                                Discount Up To 20% Off</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Branding Section -->
        
        <!-- ======= Testimonials Section ======= -->
        <?php echo $__env->make('layouts.website.testimonial', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- End Testimonials Section -->
    </main>
    <!-- End #main -->	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.website.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\website\reviews.blade.php ENDPATH**/ ?>