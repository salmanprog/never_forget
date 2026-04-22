
<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('meta'); ?>
<title>Our Menu || Never Forget</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- ======= Main Section ======= -->
    <main id="main" class="inner-page-header-menu">

        <!-- ======= Menu Section ======= -->
        <section id="menu" class="menu section-bg-img">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Our Delicious Food Menu</h2>
                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <?php $categories = App\Models\Category::where('status', 1)->where('parent_id', 0)->get() ?>
                        <?php $count =0;  ?>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <ul id="menu-flters">
                                <?php if($count == 0): ?>
                                <li class="filter-active" data-filter="*">ALL</li>
                                <?php else: ?>
                                <li style="text-transform:uppercase" data-filter=".filter-<?php echo e($category->slug.$category->id); ?>"><?php echo e($category->title); ?></li>
                                <?php endif; ?>
                            </ul>
                            <?php $count++; ?>  
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                    
                <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $catdata = App\Models\Category::where('id', $product->category_id)->where('parent_id', 0)->first() ?>
                    <?php if($product): ?>
                        <div class="col-lg-6 menu-item filter-<?php echo e($catdata->slug.$catdata->id); ?>">
                            <a href="<?php echo e(route ('single-product', $product->slug)); ?>">
                                <img src="<?php echo e(asset('public/admin/assets/images/product')); ?>/<?php echo e($product->image); ?>" class="menu-img" alt="">
                            </a>

                            <div class="menu-content">
                                <a href="<?php echo e(route ('single-product', $product->slug)); ?>"><?php echo e($product->name); ?></a>
                                <span>
                                    <?php if($product->product_price == ''): ?>
                                        <b>Variable product</b>
                                    <?php else: ?>
                                        <b> $<?php echo e($product->product_price); ?></b>
                                    <?php endif; ?>
                                </span>
                            </div>

                            <p class="menu-fav">
                                <a href="<?php echo e(route ('single-product', $product->slug)); ?>"><i class="bi-cart-fill"></i></a>
                                <a href="#"><i class="bi-heart-fill"></i></a>
                            </p>

                            <div class="menu-ingredients">
                                <?php echo $product->short_description; ?>

                            </div>

                        </div>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                </div>
        
            </div>
        </section>
        <!-- End Menu Section -->
    </main>
    <!-- End #main -->	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.website.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\website\our-menu.blade.php ENDPATH**/ ?>