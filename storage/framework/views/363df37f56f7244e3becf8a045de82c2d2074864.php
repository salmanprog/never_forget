<?php if(!$products->isEmpty()): ?>
<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <div class="col-lg-6 menu-item filter-<?php echo e($product->category_id); ?>" style="position: absolute; left: 0px; top: 0px;">
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
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
<h2 style="text-align: center">Products Not Available</h2>
<?php endif; ?>
<div class="d-flex justify-content-center" style="margin-top: 5%;">
    <?php echo $products->links('pagination::bootstrap-4'); ?>

</div>
<?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\website\product-ajax.blade.php ENDPATH**/ ?>