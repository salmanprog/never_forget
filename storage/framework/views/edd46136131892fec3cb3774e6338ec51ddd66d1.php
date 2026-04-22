
<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('meta'); ?> 
    <meta content="<?php echo e(strip_tags($blog->description)); ?>" name="description">
    <meta content="<?php echo e($blog->title); ?>" name="keywords">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
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
        <?php if($blog->image): ?>
          <div class="col-lg-6 col-md-12">
            <div class="img-wrapper position-relative" data-aos="fade-right" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
              <img src="<?php echo e(asset('public/admin/assets/posts/'.$blog->image)); ?>" alt="<?php echo e($blog->title); ?>">
            </div>
          </div>
        <?php endif; ?>
        <div class="col-lg-<?php echo e($blog->image ? '6' : '12'); ?> col-md-12" data-aos="fade-left" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
          <div class="blog-detail-wrapper">
            <h1 class="heading fs-48 mb-30"><?php echo e($blog->title); ?></h1>
            <div class="blog-content fs-18 secondry-font light-black">
              <?php echo $blog->description; ?>

            </div>
            <div class="mt-40">
              <a href="<?php echo e(route('blogs')); ?>" class="btn primary-btn border-0">Back to Blogs</a>
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

  <?php echo $__env->make('website.include.perfect-gifting', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.website.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\website\blog-detail.blade.php ENDPATH**/ ?>