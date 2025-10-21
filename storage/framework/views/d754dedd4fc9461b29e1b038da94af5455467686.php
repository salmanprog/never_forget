<?php $__env->startSection('title', $page_title); ?>

<?php $__env->startSection('content'); ?>
  <section class="content-header">
    <h1>Dashboard</h1>
  </section>

    <section class="content">
         <div class="row">
            <a href="<?php echo e(route('category.index')); ?>" style="pointer:cursor;">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                    <span class="info-box-icon bg-blue"><i class="fa fa-hand-o-right"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Categories</span>
                        <span class="info-box-number" style="color: #081e37 !important"><?php echo e($total_category); ?></span>
                    </div>
                    </div>
                </div>
            </a> 
            <a href="<?php echo e(route('variations.index')); ?>" style="pointer:cursor;">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                    <span class="info-box-icon bg-blue"><i class="fa fa-hand-o-right"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Variations</span>
                        <span class="info-box-number" style="color: #081e37 !important"><?php echo e($total_variations); ?></span>
                    </div>
                    </div>
                </div>
            </a> 
            <a href="<?php echo e(route('product.index')); ?>" style="pointer:cursor;">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                    <span class="info-box-icon bg-blue"><i class="fa fa-hand-o-right"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Products</span>
                        <span class="info-box-number" style="color: #081e37 !important"><?php echo e($total_products); ?></span>
                    </div>
                    </div>
                </div>
            </a> 
            <a href="<?php echo e(route('order.index')); ?>" style="pointer:cursor;">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                    <span class="info-box-icon bg-blue"><i class="fa fa-hand-o-right"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Orders</span>
                        <span class="info-box-number" style="color: #081e37 !important"><?php echo e($total_order); ?></span>
                    </div>
                    </div>
                </div>
            </a>
            <a href="<?php echo e(route('newsletter.index')); ?>" style="pointer:cursor;">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                    <span class="info-box-icon bg-blue"><i class="fa fa-hand-o-right"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Subscribers</span>
                        <span class="info-box-number" style="color: #081e37 !important"><?php echo e($total_subscribers); ?></span>
                    </div>
                    </div>
                </div>
            </a> 
			 <a href="<?php echo e(route('contactus.index')); ?>" style="pointer:cursor;">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                    <span class="info-box-icon bg-blue"><i class="fa fa-hand-o-right"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Contact Us</span>
                        <span class="info-box-number" style="color: #081e37 !important"><?php echo e($total_contactus); ?></span>
                    </div>
                    </div>
                </div>
            </a>
            
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp8.2\htdocs\never-forget\resources\views/admin/dashboard/dashboard.blade.php ENDPATH**/ ?>