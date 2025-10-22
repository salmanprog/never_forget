<?php $__env->startSection('content'); ?>
<?php $__env->startSection('title', $page_title); ?>
    <style>
        .product-slide img {
            width: 100%;
        }

        /* Force active slick slide to be visible */
        .product-slide .slick-slide.slick-current {
            opacity: 1 !important;
            z-index: 1000 !important; /* Ensure it's on top */
            position: relative; /* Ensure position is considered */
        }

        .product-sm .slick-slide {
            margin: 10px;
            cursor: pointer; /* Add pointer cursor to thumbnails */
        }

        /* Style for non-active thumbnails */
        /* .product-sm .slick-slide:not(.slick-current) img {
            opacity: 0.5; 
            transition: opacity 0.3s ease; 
            box-shadow: inset 0 0 5px rgba(0,0,0,0.2); 
        } */

        /* Container for thumbnail image - needed for positioning overlay */
        .product-sm .slick-slide > div {
            position: relative; /* Set position context for pseudo-element */
            overflow: hidden; /* Optional: ensures overlay stays within bounds */
            border-radius: 5px; /* Optional: match image radius if any */
        }

        /* Add overlay to non-active thumbnails */
        .product-sm .slick-slide:not(.slick-current) > div::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black overlay */
            opacity: 1;
            transition: opacity 0.3s ease;
            pointer-events: none; /* Prevent overlay from blocking clicks */
            z-index: 1; /* Ensure overlay is above image */
        }

        /* Ensure active thumbnail is fully opaque */
        .product-sm .slick-slide.slick-current img {
            opacity: 1;
            transition: opacity 0.3s ease;
        }

        .product-add-to-cart {
            height: var(--text-50);
            display: flex;
            align-items: center;
            font-size: var(--text-17);
        }

        .zoom-container {
            position: relative;
            overflow: hidden;
            cursor: url('<?php echo e(asset('public/assets/images/icons/arrow-left.svg')); ?>') 16 16, auto;
            width: 100%;
            height: auto;
            border-radius: var(--text-30);
        }

        .zoom-img {
            width: 100%;
            transition: transform 0.2s ease;
            transform-origin: center center;
            display: block;
        }

        .product-details-sec-2 .nav-link {
            border-top: 2px solid transparent;
            border-radius: 0;
            padding: var(--text-7) 0 0 0;
        }

        .product-details-sec-2 .nav-link.active {
            background-color: transparent;
            border-top: 2px solid var(--light-black);
            color: var(--light-black);
        }

        .product-details-list li {
            font-family: var(--secondry-font);
            color: #6c757d;
            margin-bottom: var(--text-10);
            list-style: disc;
        }
        /* .product-sm .slick-track {
            margin: 0 !important;   
        } */
        .slick-slide img {
            display: inline;
        }
    </style>
    <main class="inner-bg">
        <section class="inner-banner">
            <div class="container">
                <h1 class="heading fs-74" data-aos="fade-down" data-aos-easing="ease-out-cubic" data-aos-duration="1000">Product
                    <span>Details</span>
                </h1>
            </div>
        </section>
    </main>
    <section class="product-details-sec py-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <!-- Main Image Slider -->
                    <div class="product-slide">
                        <?php
                            $mainImageUrl = $product->image ? asset('public/admin/assets/images/product/' . $product->image) : null;
                            $relatedImages = $product->related_images ? json_decode($product->related_images) : [];
                            $firstImageUrl = $mainImageUrl ?? (count($relatedImages) > 0 ? asset('public/admin/assets/images/product/' . $relatedImages[0]) : asset('public/assets/images/placeholder.jpg'));
                        ?>
                        <div class="zoom-container">
                            <img class="zoom-img" src="<?php echo e($firstImageUrl); ?>" alt="<?php echo e($product->name); ?>">
                        </div>
                    </div>

                    <!-- Thumbnails -->
                    <?php if($mainImageUrl || count($relatedImages) > 0): ?>
                    <div class="product-sm mt-3"> 
                        <?php if($mainImageUrl): ?>
                            <div>
                                <img src="<?php echo e($mainImageUrl); ?>" alt="<?php echo e($product->name); ?>">
                            </div>
                        <?php endif; ?>
                        <?php $__currentLoopData = $relatedImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div>
                                <img src="<?php echo e(asset('public/admin/assets/images/product/' . $image)); ?>" alt="<?php echo e($product->name); ?>">
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="col-lg-6">
                    <div class="pd-sec-right field-wrapper">
                        <a href="" class="fs-17 heading"><span><?php echo e($product->hasCategory ? $product->hasCategory->title : 'N/A'); ?></span></a>
                        <h2 class="heading fs-30 mb-20 mt-20"><?php echo e($product->name); ?></h2>
                        <h5 class="price heading fs-25 fw-600 mb-20">
                            <?php if($variations->isNotEmpty()): ?>
                                $<?php echo e(number_format($variations->min('price'), 2)); ?> - $<?php echo e(number_format($variations->max('price'), 2)); ?>

                            <?php else: ?>
                                $<?php echo e(number_format($product->product_price, 2)); ?>

                            <?php endif; ?>
                        </h5>
                        <?php if($variations->isNotEmpty()): ?>
                        
                        <select class="input-field form-select mb-10" id="productVariantSelect" name="variation_id">
                            <option value="">Choose an option</option>
                            <?php $__currentLoopData = $variations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($variation['id']); ?>" 
                                    data-price="<?php echo e($variation['price']); ?>"
                                    data-img="<?php echo e($variation['image'] ? asset('public/admin/assets/images/product/variations/'.$variation['image']) : ''); ?>">
                                <?php echo e($variation['name']); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <button id="clearSelectionBtn" class="mb-5 bg-transparent border-0">clear</button>
                        <div class="border-bottom mb-20"></div>
                        <h5 class="price heading fs-25 fw-600 mb-20" id="selectedPrice">
                            $0.00
                        </h5>
                        <?php endif; ?>
                        <div class="d-flex align-items-center gap-20 mb-20">
                            <form action="<?php echo e(route('cart.store')); ?>" method="POST" class="d-flex align-items-center gap-20" id="addToCartForm">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                                <input type="hidden" name="product_type" value="<?php echo e($product->product_type); ?>">
                                <input type="hidden" name="variation_id" id="variation_id" value="">
                                <input type="hidden" name="product_price" id="product_price" value="<?php echo e($variations->isNotEmpty() ? 0 : $product->product_price); ?>">
                                <input type="number" name="quantity" class="input-field" value="1" min="1" id="quantity" style="max-width:70px;">
                                <button type="submit" class="btn primary-btn border-0 product-add-to-cart">Add To Cart</button>
                            </form>
                        </div>
                        <div id="variation-error" class="text-danger" style="display: none;">
                            Please select a product option before adding to cart.
                        </div>
                        <div class="border-bottom mb-20"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="product-details-sec-2 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="nav nav-pills mb-50 shop-nav align-items-center gap-20 border-0 p-0" id="pills-tab"
                        role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-description-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-description" type="button" role="tab"
                                aria-controls="pills-description" aria-selected="true">Product Details</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-product-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-product" type="button" role="tab" aria-controls="pills-product"
                                aria-selected="false">Description</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-description" role="tabpanel"
                            aria-labelledby="pills-All-tab" tabindex="0">
                            <p class="text-secondary fs-16">
                                <?php echo $product->short_description; ?>

                            </p>
                        </div>
                        <div class="tab-pane fade" id="pills-product" role="tabpanel" aria-labelledby="pills-All-tab"
                            tabindex="0">
                            <p class="text-secondary fs-16 mb-20">
                                <?php echo $product->description; ?>

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="related-products pb-50">
        <div class="container">
            <h2 class="heading fs-60 text-center mb-30">Related <span>Products</span></h2>
            <div class="row">
                <?php $__currentLoopData = $related_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-md-6">
                    <div class="gift-card-wrapper">
                        <?php
                            // Define placeholder path
                            $placeholderPath = asset('public/assets/images/placeholder.jpg');
                            // Get image path or use placeholder
                            $imagePath = $related_product->image ?? null;
                            $imageUrl = $imagePath ? asset('public/admin/assets/images/product/'.$imagePath) : $placeholderPath;
                        ?>
                        <img src="<?php echo e($imageUrl); ?>" class="w-100 mb-10" alt="<?php echo e($related_product->name); ?>">
                        <h5 class="pl-20 heading fs-24 mb-10"><?php echo e($related_product->name); ?></h5>
                        <div class="mb-30 pl-20 d-flex align-items-center justify-content-between">
                            <div>
                                <?php if($related_product->product_type == 0): ?>
                                    <span class="text-secondry-theme fw-700 fs-24">$<?php echo e(number_format($related_product->product_price, 2)); ?></span>
                                <?php else: ?>
                                    <span class="text-secondry-theme fw-700 fs-24">
                                        <?php
                                            $variations = json_decode($related_product->variations, true);
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
                            </div>
                            <div>
                                <span class="text-secondry-theme"><i class="fa-solid fa-star"></i></span>
                                <span class="text-primary-theme-light fw-600 fs-20"><?php echo e($related_product->rating ?? '4.8'); ?></span>
                            </div>
                        </div>
                        <a href="<?php echo e(route('single-product', $related_product->slug)); ?>" class="pl-20 fs-20 fw-600 text-primary-theme-light">View Details
                            <span class="ms-3">
                                <img src="<?php echo e(asset('public/assets/website/images/arrow-right.png')); ?>" alt="">
                            </span>
                        </a>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>

    <?php $__env->startPush('js'); ?>
    <script>
        $(document).ready(function() {
            // Get the initial/default image URL determined by PHP
            const defaultImageUrl = '<?php echo e($firstImageUrl); ?>'; 

            // Initialize Slick slider
            $('.product-slide').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                asNavFor: '.product-sm',
                adaptiveHeight: true // Added to adjust height based on content
            });
            
            $('.product-sm').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                asNavFor: '.product-slide',
                dots: false,
                centerMode: false,
                focusOnSelect: true,
                arrows: false
            });

            // Update main slider when thumbnail is clicked
            $('.product-sm').on('click', '.slick-slide', function(e) {
                e.preventDefault();
                let currentSlide = $(this).data('slick-index');
                $('.product-slide').slick('slickGoTo', currentSlide);
                
                // Update the main image src
                let imgSrc = $(this).find('img').attr('src');
                $('.product-slide .zoom-img').attr('src', imgSrc);
            });

            // Handle variation selection
            $('#productVariantSelect').change(function() {
                let selectedOption = $(this).find('option:selected');
                let price = selectedOption.data('price');
                let imageUrl = selectedOption.data('img');
                let variationId = selectedOption.val();

                if (!variationId) {
                    // If "Choose a variation" is selected
                    $('#selectedPrice').text('$0.00');
                    $('#product_price').val(0);
                    $('#variation_id').val('');

                    // Reset image to default using the correct URL
                    $('.product-slide .zoom-img').attr('src', defaultImageUrl);
                    
                    // Reinitialize slick slider
                    $('.product-slide').slick('setPosition');
                    $('.product-sm').slick('setPosition');
                    return;
                }

                if (price) {
                    // Update displayed price
                    $('#selectedPrice').text('$' + parseFloat(price).toFixed(2));
                    // Update hidden price input
                    $('#product_price').val(price);
                }

                // Update variation ID
                $('#variation_id').val(variationId);

                // Update image if available, otherwise reset to default
                if (imageUrl) {
                    $('.product-slide .zoom-img').attr('src', imageUrl);
                } else {
                     $('.product-slide .zoom-img').attr('src', defaultImageUrl); // Reset if variation has no image
                }
                // Reinitialize slick slider
                $('.product-slide').slick('setPosition');
                $('.product-sm').slick('setPosition');
            });

            // Clear selection button
            $('#clearSelectionBtn').click(function() {
                // Reset select
                $('#productVariantSelect').val('');
                
                // Reset price to 0.00
                $('#selectedPrice').text('$0.00');
                $('#product_price').val(0);
                
                // Reset variation ID
                $('#variation_id').val('');

                // Reset images using the correct default URL
                $('.product-slide .zoom-img').attr('src', defaultImageUrl);
                
                // Reinitialize slick slider
                $('.product-slide').slick('setPosition');
                $('.product-sm').slick('setPosition');
            });

            // Temporarily disable zoom effect for testing
            $('.zoom-container').on('mousemove', function(e) {
                const zoomer = e.currentTarget;
                // Use pageX/pageY for broader compatibility, fallback to offsetX/Y
                const rect = zoomer.getBoundingClientRect();
                const offsetX = e.pageX - rect.left - window.scrollX;
                const offsetY = e.pageY - rect.top - window.scrollY;
                
                const x = (offsetX / zoomer.offsetWidth) * 100;
                const y = (offsetY / zoomer.offsetHeight) * 100;
                const img = $(this).find('.zoom-img');
                img.css('transform', 'scale(2)');
                img.css('transform-origin', x + '% ' + y + '%');
            }).on('mouseleave', function() {
                $(this).find('.zoom-img').css('transform', 'scale(1)');
                $(this).find('.zoom-img').css('transform-origin', 'center center'); // Reset origin
            });
           

            // Reset to initial state for variable products
            if ($('#productVariantSelect').length) {
                $('#selectedPrice').text('$0.00');
                $('#product_price').val(0);
                // Trigger change to potentially set initial state based on default selection if any
                // $('#productVariantSelect').trigger('change'); // Optional: uncomment if needed
            }

            // Form submission validation
            $('#addToCartForm').on('submit', function(e) {
                if ($('#productVariantSelect').length) {  // If variations exist
                    const variationId = $('#variation_id').val();
                    if (!variationId) {
                        e.preventDefault();
                        $('#variation-error').show();
                        return false;
                    }
                }
                $('#variation-error').hide();
                return true;
            });

            // Hide error when variation is selected
            $('#productVariantSelect').change(function() {
                $('#variation-error').hide();
                // Rest of the existing change handler code...
            });
        });
    </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.website.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp8.2\htdocs\never-forget\resources\views/website/product-details.blade.php ENDPATH**/ ?>