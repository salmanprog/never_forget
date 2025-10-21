<?php $__env->startSection('content'); ?>
<?php $__env->startSection('title', 'Checkout'); ?>

<!-- Google Fonts: Poppins -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

<style>
    body { background: linear-gradient(135deg, #f8fafc 0%, #e9f1fb 100%); font-family: 'Poppins', Arial, sans-serif; }
    .checkout-container {
        max-width: 950px;
        margin: 0 auto;
        padding: 2.5rem 0 2rem 0;
    }
    .checkout-progress {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 2.5rem;
    }
    .progress-step {
        font-weight: 600;
        color: #1976d2;
        background: #e3f0ff;
        border-radius: 20px;
        padding: 0.5rem 1.2rem;
        margin: 0 0.5rem;
        font-size: 1.1rem;
        letter-spacing: 0.5px;
        box-shadow: 0 2px 8px rgba(25, 118, 210, 0.07);
    }
    .progress-sep {
        width: 32px;
        height: 2px;
        background: #b3d1f7;
        border-radius: 1px;
        margin: 0 0.5rem;
    }
    .checkout-card {
        background: #fff;
        border-radius: 22px;
        box-shadow: 0 8px 32px rgba(25, 118, 210, 0.10);
        padding: 2.2rem 2.2rem 1.5rem 2.2rem;
        margin-bottom: 2rem;
    }
    .checkout-title {
        font-size: 2.2rem;
        font-weight: 700;
        margin-bottom: 1.2rem;
        color: #1976d2;
        letter-spacing: 0.5px;
    }
    .checkout-step {
        font-size: 1.1rem;
        color: #1976d2;
        margin-bottom: 1.5rem;
        font-weight: 600;
    }
    .form-label {
        font-weight: 600;
        color: #222;
        margin-bottom: 0.4rem;
    }
    .form-control, .form-select {
        border-radius: 10px;
        /* min-height: 50px; */
        font-size: 1.05rem;
        box-shadow: 0 2px 8px rgba(25, 118, 210, 0.04);
        border: 1.5px solid #e3eafc;
        margin-bottom: 0.7rem;
    }
    .stripe-logo {
        width: 100px;
        margin-bottom: 1rem;
        display: block;
        cursor: default !important;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(25, 118, 210, 0.10);
    }
    .checkout-btn {
        width: 100%;
        font-size: 1.25rem;
        font-weight: 700;
        padding: 1rem 0;
        border-radius: 12px;
        margin-top: 1.7rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.7rem;
        background: linear-gradient(90deg, #43e97b 0%, #38f9d7 100%);
        color: #fff;
        border: none;
        box-shadow: 0 4px 16px rgba(67, 233, 123, 0.13);
        transition: background 0.2s, box-shadow 0.2s;
    }
    .checkout-btn:hover, .checkout-btn:focus {
        background: linear-gradient(90deg, #1976d2 0%, #43e97b 100%);
        color: #fff;
        box-shadow: 0 6px 24px rgba(25, 118, 210, 0.18);
    }
    .checkout-btn[disabled] {
        opacity: 0.7;
        pointer-events: none;
    }
    .spinner-border {
        width: 1.3rem;
        height: 1.3rem;
        vertical-align: middle;
        margin-left: 0.5rem;
    }
    .order-summary-card {
        background: #fff;
        border-radius: 22px;
        box-shadow: 0 8px 32px rgba(25, 118, 210, 0.10);
        padding: 2rem 2rem 1.2rem 2rem;
        margin-bottom: 2rem;
    }
    .order-summary-title {
        font-size: 1.4rem;
        font-weight: 700;
        margin-bottom: 1.2rem;
        color: #1976d2;
        letter-spacing: 0.5px;
    }
    .order-summary-list {
        font-size: 1.08rem;
        color: #333;
    }
    .order-summary-list strong {
        color: #1a202c;
    }
    .order-summary-divider {
        border-top: 1.5px solid #e3eafc;
        margin: 1.2rem 0;
    }
    .order-summary-totals strong {
        color: #1976d2;
        font-size: 1.15rem;
    }
    .alert {
        border-radius: 10px;
        font-size: 1.08rem;
    }
    .add-address-btn {
        display: inline-block;
        background: #1976d2;
        color: #fff;
        font-weight: 600;
        border-radius: 8px;
        padding: 0.5rem 1.2rem;
        margin-top: 0.3rem;
        margin-bottom: 0.7rem;
        border: none;
        transition: background 0.2s;
        text-decoration: none;
    }
    .add-address-btn:hover, .add-address-btn:focus {
        background: #43e97b;
        color: #fff;
        text-decoration: none;
    }
    @media (max-width: 767.98px) {
        .checkout-container {
            padding: 1rem 0.5rem;
        }
        .checkout-card, .order-summary-card {
            padding: 1rem;
        }
        .order-summary-mobile {
            margin-top: 1.5rem;
        }
        .checkout-title { font-size: 1.5rem; }
    }
    /* Sticky order summary on desktop */
    @media (min-width: 992px) {
        .order-summary-sticky {
            position: sticky;
            top: 2rem;
        }
    }
    .lock-icon {
        font-size: 1.2rem;
        color: #fff;
    }
    /* Stripe input custom style */
    #card-element {
        background: #f8fafc;
        border: 1.5px solid #e3eafc;
        border-radius: 10px;
       /*  min-height: 50px; */
        padding: 0.7rem 1rem;
        font-size: 1.08rem;
        margin-bottom: 0.7rem;
    }
</style>

<div class="checkout-container">
    <div class="checkout-progress">
        <span class="progress-step">Billing</span>
        <span class="progress-sep"></span>
        <span class="progress-step">Payment</span>
    </div>
    <div class="row g-4">
        <div class="col-lg-7 order-2 order-lg-1">
            <div class="checkout-card">
                <div class="checkout-title">Checkout</div>
                <div class="checkout-step">Step 1: Billing Details</div>
                <?php if(session('error')): ?>
                    <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
                <?php endif; ?>
                <?php if(session('success')): ?>
                    <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                <?php endif; ?>
                <form action="<?php echo e(route('order.store')); ?>" method="POST" id="payment-form" autocomplete="off">
                    <?php echo csrf_field(); ?>
                    
                    <?php if(Auth::check()): ?>
                        <div class="mb-3">
                            <label for="billing_address" class="form-label">Select Billing Address</label>
                            <select name="billing_address_id" id="billing_address" class="form-select" required aria-label="Select Billing Address">
                                <option value="">Select Billing Address</option>
                                <?php $__currentLoopData = $billing_addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($address->id); ?>">
                                        <?php echo e($address->first_name); ?>, <?php echo e($address->last_name); ?>, <?php echo e($address->company); ?>, <?php echo e($address->country); ?>, <?php echo e($address->street); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <a href="<?php echo e(route('billing_address.create')); ?>" class="add-address-btn">Add New Address</a>
                        </div>
                    <?php else: ?>
                        <!-- Guest Checkout Form -->
                        <div class="mb-3">
                            <h5 class="text-primary mb-3">Guest Checkout Information</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="guest_first_name" class="form-label">First Name *</label>
                                    <input type="text" class="form-control" id="guest_first_name" name="guest_first_name" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="guest_last_name" class="form-label">Last Name *</label>
                                    <input type="text" class="form-control" id="guest_last_name" name="guest_last_name" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="guest_email" class="form-label">Email Address *</label>
                                    <input type="email" class="form-control" id="guest_email" name="guest_email" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="guest_phone" class="form-label">Phone Number *</label>
                                    <input type="tel" class="form-control" id="guest_phone" name="guest_phone" required>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Guest Billing Address -->
                        <div class="mb-3">
                            <h5 class="text-primary mb-3">Billing Address</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="guest_company" class="form-label">Company</label>
                                    <input type="text" class="form-control" id="guest_company" name="guest_company">
                                </div>
                                <div class="col-md-6">
                                    <label for="guest_country" class="form-label">Country *</label>
                                    <input type="text" class="form-control" id="guest_country" name="guest_country" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="guest_street" class="form-label">Street Address *</label>
                                    <input type="text" class="form-control" id="guest_street" name="guest_street" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="guest_city" class="form-label">City/Town *</label>
                                    <input type="text" class="form-control" id="guest_city" name="guest_city" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="guest_postal_code" class="form-label">Postal Code *</label>
                                    <input type="text" class="form-control" id="guest_postal_code" name="guest_postal_code" required>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Hidden field for guest billing address -->
                        <input type="hidden" name="billing_address_id" value="0">
                    <?php endif; ?>
                    <div class="mb-3">
                        <div class="checkout-step">Step 2: Payment</div>
                        <label for="card-element" class="form-label">Credit or Debit Card</label>
                        <img src="https://stripe.com/img/v3/home/social.png" alt="Powered by Stripe" class="stripe-logo" aria-label="Powered by Stripe">
                        <div id="card-element" class="form-control" aria-label="Card input">
                            <!-- A Stripe Element will be inserted here. -->
                        </div>
                        <div id="card-errors" role="alert" class="text-danger mt-2"></div>
                    </div>
                    <button type="submit" class="checkout-btn" id="submit-button">
                        <span class="lock-icon"><i class="fa fa-lock"></i></span>
                        <span id="pay-btn-text">Pay Now ($<?php echo e(number_format(\Cart::getTotal(), 2)); ?>)</span>
                        <span class="spinner-border spinner-border-sm d-none" id="pay-btn-spinner" role="status" aria-hidden="true"></span>
                    </button>
                </form>
            </div>
        </div>
        <div class="col-lg-5 order-1 order-lg-2 order-summary-mobile">
            <div class="order-summary-card order-summary-sticky">
                <div class="order-summary-title">Order Summary</div>
                <div class="order-summary-list">
                    <?php $__currentLoopData = $Items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="d-flex justify-content-between mb-2">
                        <span><?php echo e($item->product_name ?? $item->name); ?> x <?php echo e($item->quantity); ?></span>
                        <span>$<?php echo e(number_format(($item->product_price ?? $item->price) * $item->quantity, 2)); ?></span>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="order-summary-divider"></div>
                <div class="order-summary-list order-summary-totals d-flex justify-content-between mb-2">
                    <strong>Subtotal</strong>
                    <span>$<?php echo e(number_format(\Cart::getSubTotal(), 2)); ?></span>
                </div>
                <?php if(Session::has('discount')): ?>
                <div class="order-summary-list order-summary-totals d-flex justify-content-between mb-2">
                    <strong>Discount</strong>
                    <span>-$<?php echo e(number_format(Session::get('discount')['discount'], 2)); ?></span>
                </div>
                <?php endif; ?>
                <div class="order-summary-list order-summary-totals d-flex justify-content-between">
                    <strong>Total</strong>
                    <span>$<?php echo e(number_format(\Cart::getTotal(), 2)); ?></span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- FontAwesome for lock icon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
<!-- SweetAlert2 for alerts -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://js.stripe.com/v3/"></script>
<script>
    // Create a Stripe client. 
    var stripe = Stripe("<?php echo e(config('services.stripe.key')); ?>");
    // Create an instance of Elements.
    var elements = stripe.elements();
    // Custom styling
    var style = {
        base: {
            color: '#32325d',
            fontFamily: 'Poppins, Arial, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '17px',
            '::placeholder': {
                color: '#b3b3b3'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };
    // Create an instance of the card Element.
    var card = elements.create('card', {style: style});
    // Add an instance of the card Element into the `card-element` <div>.
    card.mount('#card-element');
    // Handle real-time validation errors from the card Element.
    card.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });
    // Handle form submission.
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        // Disable the submit button to prevent repeated clicks
        document.getElementById('submit-button').disabled = true;
        document.getElementById('pay-btn-spinner').classList.remove('d-none');
        document.getElementById('pay-btn-text').textContent = 'Processing...';
        stripe.createToken(card).then(function(result) {
            if (result.error) {
                // Inform the user if there was an error.
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
                document.getElementById('submit-button').disabled = false;
                document.getElementById('pay-btn-spinner').classList.add('d-none');
                document.getElementById('pay-btn-text').textContent = 'Pay Now ($<?php echo e(number_format(\Cart::getTotal(), 2)); ?>)';
            } else {
                // Send the token to your server.
                stripeTokenHandler(result.token);
            }
        });
    });
    // Submit the form with the token ID.
    function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);
        
        // Show success message before redirect
        Swal.fire({
            title: 'Processing Payment...',
            text: 'Please wait while we process your payment.',
            icon: 'info',
            allowOutsideClick: false,
            showConfirmButton: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });
        
        // Submit the form
        form.submit();
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.website.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp8.2\htdocs\never-forget\resources\views/website/check-out.blade.php ENDPATH**/ ?>