
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('title', $page_title); ?>

<!-- Inner Page Banner  -->
<main class="inner-bg">
    <section class="inner-banner">
        <div class="container">
            <h1 class="heading fs-74" data-aos="fade-down" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                Search Results
                <?php if(request('search')): ?>
                    for "<?php echo e(request('search')); ?>"
                <?php endif; ?>
            </h1>
        </div>
    </section>
</main>

<!-- Search Results Section -->
<section class="shop-section py-5">
    <div class="container">
        <?php if($products->count() > 0): ?>
            <div class="row mb-4">
                <div class="col-12">
                    <p class="text-muted">Found <?php echo e($products->count()); ?> product(s)</p>
                </div>
            </div>
            <div class="row">
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-md-6 product-item visible mb-4">
                        <div class="gift-card-wrapper">
                            <a href="<?php echo e(route('single-product', $product->slug)); ?>">
                                <img src="<?php echo e(asset('public/admin/assets/images/product')); ?>/<?php echo e($product->image); ?>"
                                    alt="<?php echo e($product->name); ?>" class="img-fluid">
                            </a>
                            <div class="product-info">
                                <h3 class="product-title">
                                    <a href="<?php echo e(route('single-product', $product->slug)); ?>" class="text-decoration-none">
                                        <?php echo e($product->name); ?>

                                    </a>
                                </h3>
                                <div class="price-rating">
                                    <?php if($product->product_type == 0): ?>
                                        <span class="price">$<?php echo e(number_format($product->product_price, 2)); ?></span>
                                    <?php else: ?>
                                        <span class="price range">
                                            <?php
                                                $variations = json_decode($product->variations, true);
                                                if ($variations && count($variations) > 0) {
                                                    $prices = array_column($variations, 'price');
                                                    $minPrice = min($prices);
                                                    $maxPrice = max($prices);
                                                    echo '$' . number_format($minPrice, 2) . ' – $' . number_format($maxPrice, 2);
                                                } else {
                                                    echo 'N/A';
                                                }
                                            ?>
                                        </span>
                                    <?php endif; ?>
                                    <div class="rating">
                                        <i class="fa-solid fa-star"></i>
                                        <span>4.8</span>
                                    </div>
                                </div>
                                <a href="<?php echo e(route('single-product', $product->slug)); ?>" class="add-to-cart">
                                    <?php if($product->product_type == 0): ?>
                                        Add To Cart
                                    <?php else: ?>
                                        Select Options
                                    <?php endif; ?>
                                    <i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <div class="row">
                <div class="col-12 text-center py-5">
                    <h3>No products found</h3>
                    <p class="text-muted">Try searching with different keywords</p>
                    <a href="<?php echo e(route('shop')); ?>" class="btn primary-btn mt-3">Browse All Products</a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<style>
    .gift-card-wrapper {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: all 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .gift-card-wrapper:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
    }

    .gift-card-wrapper img {
        width: 100%;
        height: 250px;
        object-fit: cover;
    }

    .product-info {
        padding: 20px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .product-title {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 15px;
        color: #333;
    }

    .product-title a {
        color: #333;
    }

    .product-title a:hover {
        color: #0B1B48;
    }

    .price-rating {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }

    .price {
        font-size: 20px;
        font-weight: 700;
        color: #0B1B48;
    }

    .price.range {
        font-size: 18px;
    }

    .rating {
        display: flex;
        align-items: center;
        color: #F5A623;
        gap: 5px;
    }

    .rating i {
        font-size: 16px;
    }

    .rating span {
        font-weight: 600;
        font-size: 16px;
    }

    .add-to-cart {
        background: #0B1B48;
        color: white;
        padding: 12px 25px;
        border-radius: 25px;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        width: 100%;
        margin-top: auto;
    }

    .add-to-cart:hover {
        background: #cfa40c;
        color: #0b1b48;
        transform: translateY(-2px);
    }

    .product-item {
        margin-bottom: 30px;
    }
</style>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.website.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp8.2\htdocs\never-forget\resources\views/website/search-products.blade.php ENDPATH**/ ?>