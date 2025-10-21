
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('title', 'Order Success'); ?>

<style>
    .success-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 3rem 1rem;
        text-align: center;
    }
    .success-icon {
        font-size: 4rem;
        color: #D4AF37;
        margin-bottom: 1.5rem;
    }
    .success-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: #1A2A4A;
        margin-bottom: 1rem;
    }
    .success-message {
        font-size: 1.2rem;
        color: #6c757d;
        margin-bottom: 2rem;
        line-height: 1.6;
    }
    .order-details {
        background: rgba(26, 42, 74, 0.05);
        border: 1px solid rgba(26, 42, 74, 0.1);
        border-radius: 10px;
        padding: 2rem;
        margin: 2rem 0;
        text-align: left;
    }
    .order-details h3 {
        color: #1A2A4A;
        margin-bottom: 1rem;
        font-weight: 700;
    }
    .detail-row {
        display: flex;
        justify-content: space-between;
        padding: 0.5rem 0;
        border-bottom: 1px solid #dee2e6;
    }
    .detail-row:last-child {
        border-bottom: none;
    }
    .detail-label {
        font-weight: 600;
        color: #1A2A4A;
    }
    .detail-value {
        color: #6c757d;
        font-weight: 500;
    }
    .action-buttons {
        margin-top: 2rem;
    }
    .btn-success {
        background: #D4AF37;
        border: none;
        padding: 12px 30px;
        font-size: 1.1rem;
        border-radius: 6px;
        margin: 0 10px;
        text-decoration: none;
        display: inline-block;
        transition: all 0.3s;
        color: #1A2A4A;
        font-weight: 600;
    }
    .btn-success:hover {
        background: #B8941F;
        color: #1A2A4A;
        text-decoration: none;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(212, 175, 55, 0.3);
    }
    .btn-outline {
        background: transparent;
        border: 2px solid #1A2A4A;
        color: #1A2A4A;
        padding: 10px 30px;
        font-size: 1.1rem;
        border-radius: 6px;
        margin: 0 10px;
        text-decoration: none;
        display: inline-block;
        transition: all 0.3s;
        font-weight: 600;
    }
    .btn-outline:hover {
        background: #1A2A4A;
        color: #D4AF37;
        text-decoration: none;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(26, 42, 74, 0.3);
    }
    .email-notice {
        background: rgba(212, 175, 55, 0.1);
        border: 1px solid #D4AF37;
        border-radius: 6px;
        padding: 1rem;
        margin: 1rem 0;
        color: #1A2A4A;
    }
</style>

<div class="success-container">
    <div class="success-icon">
        <i class="fa fa-check-circle"></i>
    </div>
    
    <h1 class="success-title">Order Successful!</h1>
    
    <p class="success-message">
        Thank you for your purchase! Your order has been placed successfully and payment has been processed.
    </p>
    
    <?php if(session('order')): ?>
        <div class="order-details">
            <h3>Order Details</h3>
            <div class="detail-row">
                <span class="detail-label">Order Number:</span>
                <span class="detail-value">#<?php echo e(session('order')->order_number); ?></span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Order Date:</span>
                <span class="detail-value"><?php echo e(date('M d, Y', strtotime(session('order')->order_date))); ?></span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Total Amount:</span>
                <span class="detail-value">$<?php echo e(number_format(session('order')->total_amount, 2)); ?></span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Payment Status:</span>
                <span class="detail-value">
                    <span class="detail-value"><?php echo e(ucfirst(session('order')->payment_status)); ?></span>
                </span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Order Status:</span>
                <span class="detail-value">
                    <span class="detail-value"><?php echo e(session('order')->order_status); ?></span>
                </span>
            </div>
        </div>
    <?php endif; ?>
    
    <?php if(session('email_sent')): ?>
        <div class="email-notice">
            <i class="fa fa-envelope"></i>
            <strong>Confirmation Email Sent!</strong><br>
            <?php echo e(session('email_sent')); ?>

        </div>
    <?php elseif(session('email_error')): ?>
        <div class="email-notice" style="background: rgba(220, 53, 69, 0.1); border: 1px solid #dc3545; color: #721c24;">
            <i class="fa fa-exclamation-triangle"></i>
            <strong>Email Error:</strong><br>
            <?php echo e(session('email_error')); ?>

        </div>
    <?php else: ?>
        <div class="email-notice">
            <i class="fa fa-envelope"></i>
            <strong>Confirmation Email Sent!</strong><br>
            A confirmation email has been sent to your email address with all the order details.
        </div>
    <?php endif; ?>
    
    <div class="action-buttons">
        <a href="<?php echo e(route('shop')); ?>" class="btn-outline">
            <i class="fa fa-shopping-bag"></i> Continue Shopping
        </a>
        
        <?php if(Auth::check()): ?>
            <a href="<?php echo e(route('order.index')); ?>" class="btn-success">
                <i class="fa fa-list"></i> View My Orders
            </a>
        <?php else: ?>
            <a href="<?php echo e(route('index')); ?>" class="btn-success">
                <i class="fa fa-home"></i> Go to Homepage
            </a>
        <?php endif; ?>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.website.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp8.2\htdocs\never-forget\resources\views/website/order-success.blade.php ENDPATH**/ ?>