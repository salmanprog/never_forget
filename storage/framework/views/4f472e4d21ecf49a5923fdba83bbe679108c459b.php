

<?php $__env->startSection('title', 'Business Card Order Details - Professional Print Services'); ?>
<style>
    /* Order Details Page - Matching Website Theme */
    .business-card-order-details-page {
        background-color: var(--section-bg);
        min-height: 100vh;
    }

    .order-details-section {
        padding: var(--text-100) 0;
    }

    .order-card {
        background: white;
        border-radius: var(--text-20);
        box-shadow: 0 var(--text-10) var(--text-30) rgba(8, 30, 55, 0.1);
        border: 1px solid rgba(207, 164, 12, 0.2);
        transition: all 0.3s ease;
        margin-bottom: var(--text-20);
    }

    .order-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 var(--text-15) var(--text-40) rgba(8, 30, 55, 0.15);
    }

    .order-card-header {
        background: linear-gradient(135deg, var(--primary-theme) 0%, var(--light-theme) 100%);
        color: white;
        padding: var(--text-20);
        border-radius: var(--text-20) var(--text-20) 0 0;
        border: none;
    }

    .order-card-header h3 {
        margin: 0;
        font-family: var(--primary-font);
        font-weight: 600;
        font-size: var(--text-20);
    }

    .order-card-header h4 {
        margin: 0;
        font-family: var(--primary-font);
        font-weight: 600;
        font-size: var(--text-18);
    }

    .order-card-body {
        padding: var(--text-25);
    }

    .info-item {
        margin-bottom: var(--text-15);
        padding: var(--text-10) 0;
        border-bottom: 1px solid #f0f0f0;
    }

    .info-item:last-child {
        border-bottom: none;
        margin-bottom: 0;
    }

    .info-label {
        font-weight: 600;
        color: var(--primary-theme-light);
        font-family: var(--secondry-font);
        margin-bottom: var(--text-5);
    }

    .info-value {
        color: var(--light-black);
        font-family: var(--secondry-font);
    }

    .status-badge {
        display: inline-block;
        padding: var(--text-6) var(--text-12);
        border-radius: var(--text-20);
        font-size: var(--text-12);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-family: var(--secondry-font);
    }

    .status-pending {
        background-color: var(--secondry-theme);
        color: var(--primary-theme-light);
    }

    .status-processing {
        background-color: var(--light-theme);
        color: white;
    }

    .status-completed {
        background-color: var(--primary-theme);
        color: white;
    }

    .uploaded-file-item {
        background: linear-gradient(135deg, #FFF8E1 0%, #FCF2D6 100%);
        border-radius: var(--text-12);
        padding: var(--text-15);
        border-left: 4px solid var(--secondry-theme);
        margin-bottom: var(--text-15);
        transition: all 0.3s ease;
    }

    .uploaded-file-item:hover {
        transform: translateX(5px);
        box-shadow: 0 var(--text-8) var(--text-25) rgba(8, 30, 55, 0.1);
    }

    .summary-sidebar {
        background: white;
        border-radius: var(--text-20);
        box-shadow: 0 var(--text-10) var(--text-30) rgba(8, 30, 55, 0.1);
        border: 1px solid rgba(207, 164, 12, 0.2);
        position: sticky;
        top: var(--text-20);
    }

    .summary-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: var(--text-10) 0;
        border-bottom: 1px solid #f0f0f0;
        font-family: var(--secondry-font);
    }

    .summary-item:last-child {
        border-bottom: none;
    }

    .summary-label {
        color: var(--light-black);
        font-weight: 500;
    }

    .summary-value {
        color: var(--primary-theme-light);
        font-weight: 600;
    }

    .total-price {
        font-size: var(--text-20);
        font-weight: 700;
        color: var(--secondry-theme);
    }

    .action-btn {
        background-color: var(--secondry-theme);
        color: var(--primary-theme-light);
        border: none;
        border-radius: var(--text-60);
        padding: var(--text-15) var(--text-25);
        font-weight: 600;
        transition: all 0.3s ease;
        font-family: var(--secondry-font);
        width: 100%;
        margin-bottom: var(--text-15);
        display: inline-block;
        text-align: center;
        text-decoration: none;
        position: relative;
        z-index: 1;
    }

    .action-btn:hover {
        background-color: var(--primary-theme);
        color: white;
        transform: translateY(-2px);
        text-decoration: none;
    }

    .action-btn.secondary {
        background-color: transparent;
        border: 2px solid var(--secondry-theme);
        color: var(--secondry-theme);
    }

    .action-btn.secondary:hover {
        background-color: var(--secondry-theme);
        color: var(--primary-theme-light);
        text-decoration: none;
    }

    .action-buttons-container {
        display: flex;
        flex-direction: column;
        gap: var(--text-15);
        margin-top: var(--text-20);
    }

    .action-buttons-container .action-btn {
        margin-bottom: 0;
    }

    .alert-custom {
        background: linear-gradient(135deg, #FFF8E1 0%, #FCF2D6 100%);
        border: 1px solid var(--secondry-theme);
        border-radius: var(--text-12);
        padding: var(--text-15);
        margin-bottom: var(--text-15);
    }

    .alert-custom.success {
        background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
        border-color: #28a745;
        color: #155724;
    }

    .alert-custom.info {
        background: linear-gradient(135deg, #d1ecf1 0%, #bee5eb 100%);
        border-color: #17a2b8;
        color: #0c5460;
    }

    .next-steps-card {
        background: linear-gradient(135deg, #FFF8E1 0%, #FCF2D6 100%);
        border-radius: var(--text-15);
        padding: var(--text-20);
        border-left: 4px solid var(--secondry-theme);
        margin-top: var(--text-20);
    }

    .next-steps-card h5 {
        color: var(--primary-theme-light);
        font-family: var(--primary-font);
        font-weight: 600;
        margin-bottom: var(--text-15);
    }

    .next-steps-card ol {
        margin: 0;
        padding-left: var(--text-20);
    }

    .next-steps-card li {
        margin-bottom: var(--text-8);
        color: var(--light-black);
        font-family: var(--secondry-font);
    }

    .next-steps-card li strong {
        color: var(--primary-theme-light);
    }

    /* Success Animation */
    .success-animation {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 9999;
        opacity: 0;
        pointer-events: none;
        animation: successFadeIn 2s ease-in-out;
    }

    .success-icon {
        font-size: var(--text-60);
        color: var(--secondry-theme);
        animation: successPulse 1s ease-in-out;
    }

    @keyframes  successFadeIn {
        0% { opacity: 0; transform: translate(-50%, -50%) scale(0); }
        50% { opacity: 1; transform: translate(-50%, -50%) scale(1.2); }
        100% { opacity: 0; transform: translate(-50%, -50%) scale(1.5); }
    }

    @keyframes  successPulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.1); }
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .order-details-section {
            padding: var(--text-60) 0;
        }

        .order-card-body {
            padding: var(--text-20);
        }

        .summary-sidebar {
            position: relative;
            top: auto;
        }
    }
</style>

<?php $__env->startSection('content'); ?>
    <!-- ======= Main Section ======= -->
    <main class="inner-bg">
        <section class="inner-banner">
            <div class="container">
                <h1 class="heading fs-74" data-aos="fade-down" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                    Order <span>Confirmed</span></h1>
            </div>
        </section>
    </main>

    <!-- Order Details Section -->
    <section class="order-details-section">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-lg-8">
                    <span class="btn des-wrapper mb-30" data-aos="flip-up" data-aos-easing="ease-out-cubic"
                        data-aos-duration="1000">Order Success</span>
                    <p class="mb-60" data-aos="fade-down" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                        Your business card order has been successfully created! Review your order details below.
                    </p>
                    <div class="alert-custom success">
                        <i class="fas fa-check-circle me-2"></i>
                        <strong>Order Number:</strong> <?php echo e($order->order_number); ?>

                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Order Information -->
                <div class="col-lg-8">
                    <!-- Customer Information -->
                    <?php if($businessCard): ?>
                    <div class="order-card">
                        <div class="order-card-header">
                            <h3><i class="fas fa-user me-2"></i>Customer Information</h3>
                        </div>
                        <div class="order-card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="info-item">
                                        <div class="info-label">Name</div>
                                        <div class="info-value"><?php echo e($businessCard->name); ?></div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-label">Company</div>
                                        <div class="info-value"><?php echo e($businessCard->company ?? 'Not provided'); ?></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info-item">
                                        <div class="info-label">Email</div>
                                        <div class="info-value"><?php echo e($businessCard->email); ?></div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-label">Phone</div>
                                        <div class="info-value"><?php echo e($businessCard->phone ?? 'Not provided'); ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <!-- Order Specifications -->
                    <div class="order-card">
                        <div class="order-card-header">
                            <h3><i class="fas fa-cogs me-2"></i>Order Specifications</h3>
                        </div>
                        <div class="order-card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="info-item">
                                        <div class="info-label">Font</div>
                                        <div class="info-value">
                                            <span class="status-badge status-pending"><?php echo e(ucfirst($order->businessCard->text_font)); ?></span>
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-label">Shap</div>
                                        <div class="info-value">
                                            <span class="status-badge status-pending"><?php echo e(ucfirst($order->businessCard->card_shape)); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info-item">
                                        <div class="info-label">Orientation</div>
                                        <div class="info-value">
                                            <span class="status-badge status-pending"><?php echo e(ucfirst($order->businessCard->card_orientation)); ?></span>
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-label">Weight</div>
                                        <div class="info-value">
                                            <span class="status-badge status-<?php echo e($order->status); ?>"><?php echo e(ucfirst($order->businessCard->card_weight)); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="info-item">
                                        <div class="info-label">Paper Stock</div>
                                        <div class="info-value">
                                            <span class="status-badge status-pending"><?php echo e(ucfirst($order->paper_stock)); ?></span>
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-label">Corner Style</div>
                                        <div class="info-value">
                                            <span class="status-badge status-pending"><?php echo e(ucfirst($order->corner_style)); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info-item">
                                        <div class="info-label">Quantity</div>
                                        <div class="info-value">
                                            <span class="status-badge status-processing"><?php echo e(number_format($order->quantity)); ?> cards</span>
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-label">Status</div>
                                        <div class="info-value">
                                            <span class="status-badge status-<?php echo e($order->status); ?>"><?php echo e(ucfirst($order->status)); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if($order->notes): ?>
                            <hr>
                            <div class="info-item">
                                <div class="info-label">Additional Notes</div>
                                <div class="info-value"><?php echo e($order->notes); ?></div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Uploaded Files -->
                    <div class="order-card">
                        <div class="order-card-header">
                            <h3><i class="fas fa-file-upload me-2"></i>Uploaded Files</h3>
                        </div>
                        <div class="order-card-body">
                            <?php if(is_array($order->upload_files) && count($order->upload_files) > 0): ?>
                                <?php
                                    $frontFiles = [];
                                    $backFiles = [];
                                    
                                    // Remove duplicates and organize files
                                    $uniqueFiles = array_unique($order->upload_files);
                                    
                                    foreach($uniqueFiles as $file) {
                                        if(strpos($file, '_front.') !== false) {
                                            $frontFiles[] = $file;
                                        } elseif(strpos($file, '_back.') !== false) {
                                            $backFiles[] = $file;
                                        }
                                    }
                                    
                                    // Remove duplicates within each category and re-index
                                    $frontFiles = array_values(array_unique($frontFiles));
                                    $backFiles = array_values(array_unique($backFiles));
                                ?>
                                
                                <?php if(count($frontFiles) > 0): ?>
                                    <div class="mb-4">
                                        <h6 class="text-primary-theme-light mb-3">
                                            <i class="fas fa-id-card me-2"></i>Front Design Files (<?php echo e(count($frontFiles)); ?>)
                                        </h6>
                                        <?php $__currentLoopData = $frontFiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="uploaded-file-item">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div>
                                                    <h6 class="mb-1 text-primary-theme-light"><?php echo e(basename($file)); ?></h6>
                                                    <small class="text-light-black">
                                                        <i class="fas fa-check-circle text-secondry-theme me-1"></i>
                                                        Front design uploaded successfully
                                                    </small>
                                                </div>
                                                <div class="text-secondry-theme">
                                                    <i class="fas fa-check-circle fa-2x"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if(count($backFiles) > 0): ?>
                                    <div class="mb-4">
                                        <h6 class="text-primary-theme-light mb-3">
                                            <i class="fas fa-id-card me-2"></i>Back Design Files (<?php echo e(count($backFiles)); ?>)
                                        </h6>
                                        <?php $__currentLoopData = $backFiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="uploaded-file-item">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div>
                                                    <h6 class="mb-1 text-primary-theme-light"><?php echo e(basename($file)); ?></h6>
                                                    <small class="text-light-black">
                                                        <i class="fas fa-check-circle text-secondry-theme me-1"></i>
                                                        Back design uploaded successfully
                                                    </small>
                                                </div>
                                                <div class="text-secondry-theme">
                                                    <i class="fas fa-check-circle fa-2x"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if(count($frontFiles) == 0 && count($backFiles) == 0): ?>
                                    <p class="text-light-black">No design files found</p>
                                <?php endif; ?>
                            <?php else: ?>
                                <p class="text-light-black">No files uploaded</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Order Summary Sidebar -->
                <div class="col-lg-4">
                    <div class="summary-sidebar">
                        <div class="order-card-header">
                            <h4><i class="fas fa-receipt me-2"></i>Order Summary</h4>
                        </div>
                        <div class="order-card-body">
                            <div class="summary-item">
                                <span class="summary-label">Order Number:</span>
                                <span class="summary-value"><?php echo e($order->order_number); ?></span>
                            </div>
                            <div class="summary-item">
                                <span class="summary-label">Paper Stock:</span>
                                <span class="summary-value"><?php echo e(ucfirst($order->paper_stock)); ?></span>
                            </div>
                            <div class="summary-item">
                                <span class="summary-label">Corner Style:</span>
                                <span class="summary-value"><?php echo e(ucfirst($order->corner_style)); ?></span>
                            </div>
                            <div class="summary-item">
                                <span class="summary-label">Quantity:</span>
                                <span class="summary-value"><?php echo e(number_format($order->quantity)); ?> cards</span>
                            </div>
                            <div class="summary-item">
                                <span class="summary-label">Files:</span>
                                <span class="summary-value"><?php echo e(is_array($order->upload_files) ? count($order->upload_files) : 0); ?> uploaded</span>
                            </div>
                            <?php if($order->corner_style === 'rounded'): ?>
                            <div class="summary-item">
                                <span class="summary-label">Rounded Corners:</span>
                                <span class="summary-value text-secondry-theme">+$<?php echo e(number_format($order->quantity * 0.02, 2)); ?></span>
                            </div>
                            <?php endif; ?>
                            <hr>
                            <div class="summary-item">
                                <span class="summary-label"><strong>Total Price:</strong></span>
                                <span class="summary-value total-price">$<?php echo e(number_format($order->total_price, 2)); ?></span>
                            </div>

                            <div class="alert-custom info">
                                <i class="fas fa-clock me-2"></i>
                                <strong>Estimated Delivery:</strong><br>
                                3-5 business days
                            </div>

                            <div class="alert-custom success">
                                <i class="fas fa-cart-check me-2"></i>
                                Order added to cart successfully
                            </div>
                            
                            <div class="action-buttons-container">
                                <a href="<?php echo e(route('business-cards.show', $order->business_card_id)); ?>" class="action-btn">
                                    <i class="fas fa-eye me-2"></i>View Business Card
                                </a>
                                
                                <a href="<?php echo e(route('business-cards.order')); ?>" class="action-btn secondary">
                                    <i class="fas fa-plus me-2"></i>Create Another Order
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Next Steps -->
                    <div class="next-steps-card">
                        <h5><i class="fas fa-list-alt text-secondry-theme me-2"></i>What's Next?</h5>
                        <ol class="small mb-0">
                            <li><strong>Review</strong> your order details</li>
                            <li><strong>Proceed</strong> to checkout</li>
                            <li><strong>Monitor</strong> order status updates</li>
                            <li><strong>Receive</strong> your cards in 3-5 days</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Success Animation -->
<div class="success-animation">
    <div class="success-icon">
        <i class="fas fa-check-circle"></i>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
document.addEventListener('DOMcontentLoaded', function() {
    // Auto-scroll to order details
    setTimeout(() => {
        document.querySelector('.order-details-section').scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    }, 1000);
    
    // Show success animation
    setTimeout(() => {
        const animation = document.querySelector('.success-animation');
        if (animation) {
            animation.style.display = 'block';
            setTimeout(() => {
                animation.style.display = 'none';
            }, 2000);
        }
    }, 500);
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.website.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp8.2\htdocs\never-forget\resources\views/website/business-cards/order-details.blade.php ENDPATH**/ ?>