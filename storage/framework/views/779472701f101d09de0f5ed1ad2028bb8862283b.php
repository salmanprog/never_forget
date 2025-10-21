<?php $__env->startSection('content'); ?>
<?php $__env->startSection('title', $page_title); ?>

<!-- Inner Page Banner  -->
<main class="inner-bg">
    <section class="inner-banner">
        <div class="container">
            <h1 class="heading fs-74" data-aos="fade-down" data-aos-easing="ease-out-cubic" data-aos-duration="1000">Shop</h1>
        </div>
    </section>
</main>

<style>
.shop-nav {
    background: #fff;
    border-radius: 50px; 
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    margin: 0 auto 40px;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch; 
    /* gap: 15px; */
}

.shop-nav .nav-link {
    color: #333;
    /* padding: 10px 25px; */
    border-radius: 25px;
    font-weight: 500;
    white-space: nowrap;
    transition: all 0.3s ease;  
    text-align: center;
}

.shop-nav .nav-link.active {
    background: #0B1B48;
    color: white;
}

.shop-nav .nav-link:hover:not(.active) {
    background: #f0f0f0;
}

.shop-nav::-webkit-scrollbar {
    display: none;
}

.shop-nav {
    -ms-overflow-style: none;
    scrollbar-width: none;
}

.gift-card-wrapper {
    background: #fff;
    border-radius: 15px;
    overflow: hidden;
    transition: all 0.3s ease;
    height: 100%;
    display: flex;
    flex-direction: column;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    /* margin-bottom: 30px; */
}

.gift-card-wrapper:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
}

.gift-card-wrapper img {
    width: 100%;
    height: 250px;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.gift-card-wrapper:hover img {
    transform: scale(1.05);
}

.gift-card-wrapper h5 {
    font-size: 18px;
    font-weight: 600;
    color: #0B1B48;
    margin-bottom: 15px;
    line-height: 1.4;
    height: 5rem;
    padding: 0 30px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
}

.gift-card-wrapper a {
    background: #0B1B48;
    color: white;
    padding: 12px 25px;
    border-radius: 25px;
    text-decoration: none;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    width: 87%;
    margin: 0 auto;
}

.gift-card-wrapper a:hover {
    background: #cfa40c;
    color: #0b1b48;
    transform: translateY(-5px);
}

.text-secondry-theme {
    color: #F5A623;
}

.text-primary-theme-light {
    color: #0B1B48;
}

.product-info {
    padding: 20px 0;
}

.product-title {
    font-size: 18px;
    font-weight: 600;
    color: #0B1B48;
    margin-bottom: 30px;
    line-height: 1.4;
    height: 5rem;
    padding: 0 30px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
}

.price-rating {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 40px;
    padding: 0 30px;
}

.price {
    font-size: 24px;
    font-weight: 700;
    color: #F5A623;
    display: inline-block;
    line-height: 1.2;
}

.price.range {
    font-size: 20px;
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
    width: 87%;
    margin-top: auto;
    margin:0 auto; 
}

.add-to-cart:hover {
    background: #cfa40c;
    color: #0b1b48;
    transform: translateY(-5px);
}

.product-item {
    margin-bottom: 30px;
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.5s ease-out;
}

.product-item.visible {
    opacity: 1;
    transform: translateY(0);
}

.loading-spinner {
    display: none;
    margin: 20px 0;
}
</style>

<section class="corporate-gifts-sec py-150">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-6">
                <span class="btn des-wrapper mb-30" data-aos="flip-up" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                    Elevate Employee & Client Appreciation
                </span>
                <h2 class="heading fs-74 mb-30" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                    Corporate <span>Gifts</span>
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav nav-pills shop-nav" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link <?php echo e(!request('category') ? 'active' : ''); ?>" id="pills-All-tab" data-bs-toggle="pill" data-bs-target="#pills-All" type="button" role="tab" aria-controls="pills-All" aria-selected="<?php echo e(!request('category') ? 'true' : 'false'); ?>">All</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-Under30-tab" data-bs-toggle="pill" data-bs-target="#pills-Under30" type="button" role="tab" aria-controls="pills-Under30" aria-selected="false">Gifts Under $30</button>
                    </li>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link <?php echo e(request('category') == $category->id ? 'active' : ''); ?>" id="pills-<?php echo e($category->id); ?>-tab" data-bs-toggle="pill" data-bs-target="#pills-<?php echo e($category->id); ?>" type="button" role="tab" aria-controls="pills-<?php echo e($category->id); ?>" aria-selected="<?php echo e(request('category') == $category->id ? 'true' : 'false'); ?>"><?php echo e($category->title); ?></button>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <li class="nav-item" role="presentation">
                        <a href="<?php echo e(route('business-cards.create')); ?>" class="nav-link">Business Cards</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="Javascript:void(0);" class="nav-link">Quality Logo</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <!-- All Products Tab -->
                    <div class="tab-pane fade <?php echo e(!request('category') ? 'show active' : ''); ?>" id="pills-All" role="tabpanel" aria-labelledby="pills-All-tab" tabindex="0">
                        <div class="row" id="all-products">
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $__currentLoopData = $category->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-lg-4 col-md-6 product-item visible">
                                    <div class="gift-card-wrapper">
                                        <img src="<?php echo e(asset('public/admin/assets/images/product')); ?>/<?php echo e($product->image); ?>" alt="<?php echo e($product->name); ?>">
                                        <div class="product-info">
                                            <h3 class="product-title"><?php echo e($product->name); ?></h3>
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
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="text-center loading-spinner" id="loading-spinner">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>

                    <!-- Gifts Under $30 Tab -->
                    <div class="tab-pane fade" id="pills-Under30" role="tabpanel" aria-labelledby="pills-Under30-tab" tabindex="0">
                        <div class="row">
                            <?php
                                $under30_products = [];
                                $product_ids = [];
                                $all_products = $categories->flatMap(function ($category) {
                                    return $category->products;
                                })->unique('id');
                            ?>
                    
                            <?php $__currentLoopData = $all_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $price = 0;
                                    if ($product->product_type == 0) {
                                        $price = $product->product_price;
                                    } else {
                                        $variations = json_decode($product->variations, true);
                                        if ($variations && count($variations) > 0) {
                                            $prices = array_column($variations, 'price');
                                            $price = !empty($prices) ? min($prices) : 0;
                                        }
                                    }
                                ?>
                                <?php if($price > 0 && $price < 30): ?>
                                    <?php
                                        $under30_products[] = $product;
                                    ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <?php $__empty_1 = true; $__currentLoopData = $under30_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="col-lg-4 col-md-6 product-item visible">
                                    <div class="gift-card-wrapper">
                                        <img src="<?php echo e(asset('public/admin/assets/images/product')); ?>/<?php echo e($product->image); ?>" alt="<?php echo e($product->name); ?>">
                                        <div class="product-info">
                                            <h3 class="product-title"><?php echo e($product->name); ?></h3>
                                            <div class="price-rating">
                                                <?php if($product->product_type == 0): ?>
                                                    <span class="price">$<?php echo e(number_format($product->product_price, 2)); ?></span>
                                                <?php else: ?>
                                                    <span class="price range">
                                                        <?php
                                                            $variations = json_decode($product->variations, true);
                                                            if ($variations && count($variations) > 0) {
                                                                $prices = array_column($variations, 'price');
                                                                $minPrice = !empty($prices) ? min($prices) : 0;
                                                                $maxPrice = !empty($prices) ? max($prices) : 0;
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
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <div class="col-12">
                                    <p class="text-center">No products found under $30.</p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Individual Category Tabs -->
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="tab-pane fade <?php echo e(request('category') == $category->id ? 'show active' : ''); ?>" id="pills-<?php echo e($category->id); ?>" role="tabpanel" aria-labelledby="pills-<?php echo e($category->id); ?>-tab" tabindex="0">
                        <div class="row" id="category-products-<?php echo e($category->id); ?>">
                            <?php $__empty_1 = true; $__currentLoopData = $category->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="col-lg-4 col-md-6 product-item visible">
                                <div class="gift-card-wrapper">
                                    <img src="<?php echo e(asset('public/admin/assets/images/product')); ?>/<?php echo e($product->image); ?>" alt="<?php echo e($product->name); ?>">
                                    <div class="product-info">
                                        <h3 class="product-title"><?php echo e($product->name); ?></h3>
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
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="col-12">
                                <p class="text-center">No products found in this category.</p>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="text-center loading-spinner" id="loading-spinner-<?php echo e($category->id); ?>">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="shop-sec-2 pb-150">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-6">
                <span class="btn des-wrapper mb-30">
                    Never Forget Showing Appreciation
                </span>
                <h2 class="heading fs-74 mb-30">
                    Customer <span>Favorites</span>
                </h2>
            </div>
        </div>
        <div class="row">
            <?php $__empty_1 = true; $__currentLoopData = $customer_favorites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col-lg-4 col-md-6 product-item visible">
                <div class="gift-card-wrapper">
                    <img src="<?php echo e(asset('public/admin/assets/images/product')); ?>/<?php echo e($product->image); ?>" alt="<?php echo e($product->name); ?>">
                    <div class="product-info">
                        <h3 class="product-title"><?php echo e($product->name); ?></h3>
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
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-12">
                <p class="text-center">No customer favorite products found.</p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php $__env->startPush('scripts'); ?>
<script>
let page = 1;
let loading = false;
let activeCategory = '<?php echo e(request("category") ? request("category") : "all"); ?>';
let hasMoreProducts = true;

// Function to check if element is in viewport
function isInViewport(element) {
    if (!element) return false;
    const rect = element.getBoundingClientRect();
    const windowHeight = window.innerHeight || document.documentElement.clientHeight;
    return rect.top <= windowHeight + 200; // Increased buffer to 200px for earlier loading
}

// Function to format price
function formatPrice(product) {
    if (product.product_type == 0) {
        return '$' + parseFloat(product.product_price).toFixed(2);
    } else {
        const variations = JSON.parse(product.variations);
        if (variations && variations.length > 0) {
            const prices = variations.map(v => parseFloat(v.price));
            const minPrice = Math.min(...prices);
            const maxPrice = Math.max(...prices);
            return '$' + minPrice.toFixed(2) + ' – $' + maxPrice.toFixed(2);
        }
        return 'N/A';
    }
}

// Function to load more products
function loadMoreProducts() {
    if (loading || !hasMoreProducts) return;
    
    loading = true;
    page++;
    
    const spinner = activeCategory === 'all' 
        ? document.getElementById('loading-spinner')
        : document.getElementById(`loading-spinner-${activeCategory}`);
    spinner.style.display = 'block';

    const url = activeCategory === 'all' 
        ? `/load-more-products?page=${page}`
        : `/load-more-category-products/${activeCategory}?page=${page}`;

    fetch(url)
        .then(response => response.json())
        .then(data => {
            const container = activeCategory === 'all'
                ? document.getElementById('all-products')
                : document.getElementById(`category-products-${activeCategory}`);

            if (!data.products || data.products.length === 0) {
                hasMoreProducts = false;
                spinner.style.display = 'none';
                return;
            }

            data.products.forEach((product, index) => {
                const productElement = document.createElement('div');
                productElement.className = 'col-lg-4 col-md-6 product-item';
                
                productElement.innerHTML = `
                    <div class="gift-card-wrapper">
                        <img src="<?php echo e(asset('public/admin/assets/images/product')); ?>/${product.image}" alt="${product.name}">
                        <div class="product-info">
                            <h3 class="product-title">${product.name}</h3>
                            <div class="price-rating">
                                <span class="price">${formatPrice(product)}</span>
                                <div class="rating">
                                    <i class="fa-solid fa-star"></i>
                                    <span>4.8</span>
                                </div>
                            </div>
                            <a href="<?php echo e(route('single-product', '')); ?>/${product.slug}" class="add-to-cart">
                                <?php if($product->product_type == 0): ?>
                                    Add To Cart
                                <?php else: ?>
                                    Select Options
                                <?php endif; ?>
                                <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                `;
                
                container.appendChild(productElement);
                
                // Trigger animation with delay
                setTimeout(() => {
                    productElement.classList.add('visible');
                }, index * 100);
            });

            loading = false;
            spinner.style.display = 'none';
        })
        .catch(error => {
            console.error('Error:', error);
            loading = false;
            spinner.style.display = 'none';
        });
}

// Handle tab changes
document.querySelectorAll('[data-bs-toggle="pill"]').forEach(tab => {
    tab.addEventListener('shown.bs.tab', function (e) {
        const targetId = e.target.getAttribute('data-bs-target');
        activeCategory = targetId === '#pills-All' ? 'all' : targetId === '#pills-Under30' ? 'under30' : targetId.replace('#pills-', '');
        page = 1;
        hasMoreProducts = true;
        loading = false; // Reset loading state on tab change
    });
});

// Improved scroll detection with debounce
let scrollTimeout;
function handleScroll() {
    const activePane = document.querySelector('.tab-pane.active');
    if (activePane) {
        const lastProduct = activePane.querySelector('.product-item:last-child');
        if (lastProduct && isInViewport(lastProduct)) {
            loadMoreProducts();
        }
    }
}

window.addEventListener('scroll', function() {
    if (scrollTimeout) {
        window.cancelAnimationFrame(scrollTimeout);
    }
    scrollTimeout = window.requestAnimationFrame(handleScroll);
});

// Initial animation for existing products
document.addEventListener('DOMContentLoaded', function() {
    const products = document.querySelectorAll('.product-item');
    products.forEach((product, index) => {
        setTimeout(() => {
            product.classList.add('visible');
        }, index * 100);
    });
    
    // Initial check for scroll position
    handleScroll();
});
</script>
<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.website.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp8.2\htdocs\never-forget\resources\views/website/shop.blade.php ENDPATH**/ ?>