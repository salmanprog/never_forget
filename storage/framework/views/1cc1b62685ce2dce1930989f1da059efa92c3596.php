<?php $__env->startSection('content'); ?>
<?php $__env->startSection('title', 'Checkout'); ?>

<!-- Google Fonts: Poppins -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

<style>
    body {
        background: linear-gradient(135deg, #f8fafc 0%, #e9f1fb 100%);
        font-family: 'Poppins', Arial, sans-serif;
    }

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

    .form-control,
    .form-select {
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

    .checkout-btn:hover,
    .checkout-btn:focus {
        background: linear-gradient(90deg, #1976d2 0%, #43e97b 100%);
        color: #fff;
        box-shadow: 0 6px 24px rgba(25, 118, 210, 0.18);
    }

    .payment-method-option {
        cursor: pointer;
        transition: border-color 0.2s, box-shadow 0.2s, background-color 0.2s;
    }
    .payment-method-option:hover {
        border-color: #1976d2 !important;
        background-color: #f8fbff;
    }
    .payment-method-option.selected {
        border-color: #1976d2 !important;
        box-shadow: 0 0 0 2px rgba(25, 118, 210, 0.25);
        background-color: #f0f7ff;
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

    .add-address-btn:hover,
    .add-address-btn:focus {
        background: #43e97b;
        color: #fff;
        text-decoration: none;
    }
    .back-btn {
        padding: 10px 15px;
    }

    @media (max-width: 767.98px) {
        .checkout-container {
            padding: 1rem 0.5rem;
        }

        .checkout-card,
        .order-summary-card {
            padding: 1rem;
        }

        .order-summary-mobile {
            margin-top: 1.5rem;
        }

        .checkout-title {
            font-size: 1.5rem;
        }
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
                <form action="<?php echo e(route('order.store')); ?>" method="POST" id="payment-form" autocomplete="off">
                    <?php echo csrf_field(); ?>
                    <div id="step-1">
                        <div class="checkout-title">Checkout</div>
                        <div class="checkout-step">Step 1: Billing Details</div>
                        <?php if(session('error')): ?>
                            <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
                        <?php endif; ?>
                        <?php if(session('success')): ?>
                            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                        <?php endif; ?>


                        <?php if(Auth::check()): ?>
                            <div class="mb-3">
                                <label for="billing_address" class="form-label">Select Billing Address</label>
                                <select name="billing_address_id" id="billing_address" class="form-select" required
                                    aria-label="Select Billing Address">
                                    <option value="">Select Billing Address</option>
                                    <?php $__currentLoopData = $billing_addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($address->id); ?>" <?php echo e($index === 0 ? 'selected' : ''); ?>>
                                            <?php echo e(trim(implode(', ', array_filter([$address->first_name, $address->last_name, $address->company, $address->street, $address->town, $address->state, $address->postcode, $address->country]))) ?: 'Billing Address'); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <a href="<?php echo e(route('billing_address.create')); ?>" class="add-address-btn">Add New
                                    Address</a>
                            </div>
                        <?php else: ?>
                            <!-- Guest Checkout Form -->
                            <div class="mb-3">
                                <h5 class="text-primary mb-3">Guest Checkout Information</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="guest_first_name" class="form-label">First Name *</label>
                                        <input type="text" class="form-control" id="guest_first_name"
                                            name="guest_first_name" value="<?php echo e(old('guest_first_name')); ?>" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="guest_last_name" class="form-label">Last Name *</label>
                                        <input type="text" class="form-control" id="guest_last_name"
                                            name="guest_last_name" value="<?php echo e(old('guest_last_name')); ?>" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="guest_email" class="form-label">Email Address *</label>
                                        <input type="email" class="form-control" id="guest_email" name="guest_email"
                                            value="<?php echo e(old('guest_email')); ?>" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="guest_phone" class="form-label">Phone Number *</label>
                                        <input type="tel" class="form-control" id="guest_phone" name="guest_phone"
                                            value="<?php echo e(old('guest_phone')); ?>" required>
                                    </div>
                                </div>
                            </div>

                            <!-- Guest Billing Address -->
                            <div class="mb-3">
                                <h5 class="text-primary mb-3">Billing Address</h5>
                                <div class="row">
                                    <div class="col-12">
                                        <label for="guest_company" class="form-label">Company</label>
                                        <input type="text" class="form-control" id="guest_company"
                                            value="<?php echo e(old('guest_company')); ?>" name="guest_company">
                                    </div>


                                    <div class="col-md-12">
                                        <label for="guest_street" class="form-label">Street Address *</label>
                                        <input type="text" class="form-control" id="autocomplete_address"
                                            name="guest_street" value="<?php echo e(old('guest_street')); ?>" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="guest_state" class="form-label">State *</label>
                                        <input type="text" class="form-control" id="guest_state"
                                            value="<?php echo e(old('guest_state')); ?>" name="guest_state" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="guest_country" class="form-label">Country *</label>
                                        <input type="text" class="form-control" id="guest_country"
                                            value="<?php echo e(old('guest_country')); ?>" name="guest_country" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="guest_city" class="form-label">City/Town *</label>
                                        <input type="text" class="form-control" id="guest_city" name="guest_city"
                                            value="<?php echo e(old('guest_city')); ?>" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="guest_postal_code" class="form-label">Postal Code *</label>
                                        <input type="text" class="form-control" id="guest_postal_code"
                                            name="guest_postal_code" value="<?php echo e(old('guest_postal_code')); ?>" required>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-flex gap-10 mb-10">
                                            <div>
                                                <input type="checkbox" id="consent" name="consent" class="input-field mt-5"
                                                    required>
                                            </div>
                                            <div>
                                                <label class="form-check-label text-start fs-14" for="consent">
                                                    I agree to receive SMS messages from Never Forget showing
                                                    appreciation at the number I provided. These messages may include
                                                    special offers, service updates, and personalized gift reminders.
                                                    Frequency may vary. Reply STOP to unsubscribe at any time, or HELP
                                                    for assistance. Standard message & data rates may apply. My consent
                                                    is not required for purchase.
                                                </label>
                                            </div>
                                        </div>
                                        <div class="d-flex gap-10 mb-10 form-links">
                                            <div>
                                                <a class="navs" href="<?php echo e(route('privacy-policy')); ?>">Privacy
                                                    Policy</a>
                                            </div>
                                            <div>
                                                <a class="navs" href="<?php echo e(route('disclaimer')); ?>">Disclaimer</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <!-- Hidden field for guest billing address -->
                            <input type="hidden" name="billing_address_id" value="0">
                        <?php endif; ?>
                        <button type="button" class="checkout-btn mt-3" id="next-step-btn">
                            Next
                        </button>
                    </div>
                    <div id="step-2" style="display:none;">
                        <div class="checkout-step mb-3">Step 2: Payment Method</div>
                        <p class="text-muted mb-4">Choose how you would like to pay</p>
                        <div class="row g-3 mb-4">
                            
                            <div class="col-12">
                                <div class="payment-method-option rounded border p-4 h-100 cursor-pointer" data-method="paypal" id="option-paypal">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="payment-method-icon bg-light rounded p-3">
                                            <i class="fa-brands fa-paypal fa-2x text-primary"></i>
                                        </div>
                                        <div>
                                            <strong class="d-block">PayPal</strong>
                                            <small class="text-muted">Pay with your PayPal account</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if(config('services.authorize.api_login_id') && config('services.authorize.client_key')): ?>
                            <div class="col-12">
                                <div class="payment-method-option rounded border p-4 h-100 cursor-pointer" data-method="authorize" id="option-authorize">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="payment-method-icon bg-light rounded p-3">
                                            <i class="fa fa-credit-card fa-2x text-primary"></i>
                                        </div>
                                        <div>
                                            <strong class="d-block">Credit / Debit Card (Authorize.net)</strong>
                                            <small class="text-muted">Visa, Mastercard, Amex — secure by Authorize.net</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                        <input type="hidden" name="pay_with" value="" id="pay_with_input">
                        <input type="hidden" name="authorizenet_data_descriptor" id="authorizenet_data_descriptor" value="">
                        <input type="hidden" name="authorizenet_data_value" id="authorizenet_data_value" value="">
                        <div id="payment-card-area" style="display:none;">
                            <div class="mb-3">
                                <label for="card-element" class="form-label mb-10">Card details</label>
                                <img src="https://stripe.com/img/v3/home/social.png" alt="Powered by Stripe" class="stripe-logo" aria-label="Powered by Stripe">
                                <div id="card-element" class="form-control" aria-label="Card input"></div>
                                <div id="card-errors" role="alert" class="text-danger mt-2"></div>
                            </div>
                            <div class="d-flex gap-2 flex-wrap">
                                <button type="button" class="btn primary-btn w-100 mb-10" id="back-step-btn">Back</button>
                                <button type="submit" class="checkout-btn mt-0" id="submit-button" name="pay_with" value="stripe">
                                    <span class="lock-icon"><i class="fa fa-lock"></i></span>
                                    <span id="pay-btn-text">Pay Now ($<?php echo e(number_format(\Cart::getTotal(), 2)); ?>)</span>
                                    <span class="spinner-border spinner-border-sm d-none" id="pay-btn-spinner" role="status" aria-hidden="true"></span>
                                </button>
                            </div>
                        </div>
                        <div id="payment-paypal-area" style="display:none;">
                            <p class="text-muted mb-10 mt-10">You will be redirected to PayPal to complete your payment securely. Delivery charges apply; no card processing fee.</p>
                            <div class="d-flex gap-2 flex-wrap">
                                <button type="button" class="btn primary-btn" id="back-step-btn-paypal back-btn">Back</button>
                                <button type="submit" form="payment-form" name="pay_with" value="paypal" class="btn primary-btn btn-lg">
                                    <i class="fa fa-paypal"></i> Checkout with PayPal
                                </button>                         
                            </div>
                        </div>
                        <?php if(config('services.authorize.api_login_id') && config('services.authorize.client_key')): ?>
                        <div id="payment-authorize-area" style="display:none;">
                            
                            <p class="text-muted mb-3">Enter your card details securely (powered by Authorize.net). Delivery charges apply. Card payments include an additional 3% card processing fee.</p>
                            <p class="small text-muted mb-3">Fee may vary based on order weight and credit card processing costs.</p>
                            <div class="mb-3">
                                <label for="auth-card-number" class="form-label">Card Number</label>
                                <input type="text" id="auth-card-number" class="form-control" placeholder="4111111111111111" maxlength="19" autocomplete="off" data-accept="cardNumber">
                            </div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label for="auth-exp-month" class="form-label">Exp. Month</label>
                                    <input type="text" id="auth-exp-month" class="form-control" placeholder="MM" maxlength="2" autocomplete="off" data-accept="month">
                                </div>
                                <div class="col-6">
                                    <label for="auth-exp-year" class="form-label">Exp. Year</label>
                                    <input type="text" id="auth-exp-year" class="form-control" placeholder="YYYY" maxlength="4" autocomplete="off" data-accept="year">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="auth-card-code" class="form-label">CVV</label>
                                <input type="text" id="auth-card-code" class="form-control" placeholder="123" maxlength="4" autocomplete="off" data-accept="cardCode">
                            </div>
                            <div id="authorize-errors" class="text-danger mb-2"></div>
                            <div class="d-flex gap-2 flex-wrap">
                                <button type="button" class="btn primary-btn w-100 back-btn mb-10" id="back-step-btn-authorize">Back</button>
                                <button type="button" class="checkout-btn mt-0" id="submit-authorize-btn">
                                    <span class="lock-icon"><i class="fa fa-lock"></i></span>
                                    <span id="authorize-btn-text">Pay with Card ($<?php echo e(number_format(\Cart::getTotal(), 2)); ?>)</span>
                                </button>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-5 order-1 order-lg-2 order-summary-mobile">
            <div class="order-summary-card order-summary-sticky">
                <input type="hidden" name="tax_amount" id="tax-hidden" value="0">
                <input type="hidden" name="final_total" id="final-total-hidden"
                    value="<?php echo e(\Cart::getSubTotal()); ?>">
                <span id="discount-value" data-discount="<?php echo e(Session::has('discount') ? Session::get('discount')['discount'] : 0); ?>" style="display:none;"></span>
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
                    <span id="subtotal-amount" data-subtotal="<?php echo e(\Cart::getSubTotal()); ?>">
                        $<?php echo e(number_format(\Cart::getSubTotal(), 2)); ?>

                    </span>
                </div>
                <?php if(Session::has('discount')): ?>
                    <div class="order-summary-list order-summary-totals d-flex justify-content-between mb-2">
                        <strong>Discount</strong>
                        <span>-$<?php echo e(number_format(Session::get('discount')['discount'], 2)); ?></span>
                    </div>
                <?php endif; ?>
                <div class="order-summary-list order-summary-totals d-flex justify-content-between mb-2">
                    <strong>Tax</strong>
                    <span id="tax-amount">$0.00</span>
                </div>
                <div id="delivery-row" class="order-summary-list order-summary-totals d-flex justify-content-between mb-2" style="display:none;">
                    <strong>Delivery charges</strong>
                    <span id="delivery-amount">$0.00</span>
                </div>
                <div id="card-charges-row" class="order-summary-list order-summary-totals d-flex justify-content-between mb-2" style="display:none;">
                    <strong>Card charges (3%)</strong>
                    <span id="card-charges-amount">$0.00</span>
                </div>
                <p id="fee-note" class="small text-muted mb-2" style="display:none;">Fee may vary based on order weight and credit card processing costs.</p>
                <div class="order-summary-list order-summary-totals d-flex justify-content-between">
                    <strong>Total</strong>
                    <span id="total-amount">
                        $<?php echo e(number_format(\Cart::getSubTotal(), 2)); ?>

                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- FontAwesome for lock icon -->


<!-- SweetAlert2 for alerts -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://js.stripe.com/v3/"></script>
<?php if(config('services.authorize.api_login_id') && config('services.authorize.client_key')): ?>
<script src="<?php echo e(config('services.authorize.mode') === 'live' ? 'https://js.authorize.net/v1/Accept.js' : 'https://jstest.authorize.net/v1/Accept.js'); ?>" charset="utf-8"></script>
<?php endif; ?>

<script>
    let autocomplete;


    function initAutocomplete() {
        const input = document.getElementById('autocomplete_address');
        if (!input) return;

        autocomplete = new google.maps.places.Autocomplete(input, {
            types: ['address'],
            componentRestrictions: {
                country: ['us']
            }
        });

        autocomplete.addListener('place_changed', function() {
            const place = autocomplete.getPlace();

            let street = '',
                city = '',
                state = '',
                country = '',
                postalCode = '';

            place.address_components.forEach(component => {
                if (component.types.includes('street_number')) street = component.long_name + ' ';
                if (component.types.includes('route')) street += component.long_name;
                if (component.types.includes('locality')) city = component.long_name;
                if (component.types.includes('administrative_area_level_1')) state = component
                    .short_name;
                if (component.types.includes('country')) country = component.short_name;
                if (component.types.includes('postal_code')) postalCode = component.long_name;
            });

            document.getElementById('autocomplete_address').value = street;
            document.getElementById('guest_city').value = city;
            document.getElementById('guest_state').value = state;
            document.getElementById('guest_country').value = country;
            document.getElementById('guest_postal_code').value = postalCode;
        });
    }

    // ✅ wait until Google is actually available
    document.addEventListener('DOMContentLoaded', function() {
        const waitForGoogle = setInterval(() => {
            if (window.google && google.maps && google.maps.places) {
                clearInterval(waitForGoogle);
                initAutocomplete();
            }
        }, 200);
    });


    function fillInAddress() {
        const place = autocomplete.getPlace();

        let street = '';
        let city = '';
        let state = '';
        let country = '';
        let postalCode = '';

        place.address_components.forEach(component => {
            const types = component.types;

            if (types.includes('street_number')) {
                street = component.long_name + ' ' + street;
            }

            if (types.includes('route')) {
                street += component.long_name;
            }

            if (types.includes('locality')) {
                city = component.long_name;
            }

            if (types.includes('administrative_area_level_1')) {
                state = component.short_name;
            }

            if (types.includes('country')) {
                country = component.long_name;
            }

            if (types.includes('postal_code')) {
                postalCode = component.long_name;
            }
        });

        document.getElementById('autocomplete_address').value = street;
        document.getElementById('guest_city').value = city;
        document.getElementById('guest_state').value = state;
        document.getElementById('guest_country').value = country;
        document.getElementById('guest_postal_code').value = postalCode;
    }
    document.getElementById('next-step-btn').addEventListener('click', function() {

        let valid = true;

        document.querySelectorAll('#step-1 input[required], #step-1 select[required]').forEach(field => {
            if (!field.value.trim()) {
                valid = false;
                field.classList.add('is-invalid');
            } else {
                field.classList.remove('is-invalid');
            }
        });

        if (!valid) {
            Swal.fire({
                icon: 'error',
                text: 'Please fill all required details',
            });
            return;
        }

        const payload = {};

        // 🔹 Guest user
        if (document.getElementById('autocomplete_address')) {
            payload.guest_street = document.getElementById('autocomplete_address').value;
            payload.guest_city = document.getElementById('guest_city').value;
            payload.guest_state = document.getElementById('guest_state').value;
            payload.guest_country = document.getElementById('guest_country').value;
            payload.guest_postal_code = document.getElementById('guest_postal_code').value;
        }

        // 🔹 Logged-in user
        if (document.getElementById('billing_address')) {
            payload.billing_address_id = document.getElementById('billing_address').value;
        }

        fetch("<?php echo e(route('calculateTax')); ?>", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                },
                body: JSON.stringify(payload)
            })
            .then(res => res.json())
            .then(data => {
                if (!data.tax) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Tax Calculation Failed',
                        text: 'Unable to calculate tax. Please check your address.',
                    });
                    return;
                }

                const tax = parseFloat(data.tax);
                const subtotal = parseFloat(document.getElementById('subtotal-amount').dataset.subtotal);
                const discountEl = document.getElementById('discount-value');
                const discount = discountEl ? parseFloat(discountEl.getAttribute('data-discount') || 0) : 0;
                const baseTotal = subtotal + tax - discount;
                const deliveryFee = baseTotal < 350 ? 39 : 45;
                const totalWithDelivery = baseTotal + deliveryFee;

                window.checkoutBaseTotal = baseTotal;
                window.deliveryFee = deliveryFee;

                document.getElementById('tax-amount').innerText = '$' + tax.toFixed(2);
                document.getElementById('delivery-row').style.display = 'flex';
                document.getElementById('delivery-amount').innerText = '$' + deliveryFee.toFixed(2);
                document.getElementById('card-charges-row').style.display = 'none';
                document.getElementById('fee-note').style.display = 'block';
                document.getElementById('total-amount').innerText = '$' + totalWithDelivery.toFixed(2);
                document.getElementById('tax-hidden').value = tax.toFixed(2);
                document.getElementById('final-total-hidden').value = totalWithDelivery.toFixed(2);

                var authBtnText = document.getElementById('authorize-btn-text');
                if (authBtnText) authBtnText.innerText = 'Pay with Card ($' + totalWithDelivery.toFixed(2) + ')';

                // ✅ Move to payment method step ONLY after tax success
                document.getElementById('step-1').style.display = 'none';
                document.getElementById('step-2').style.display = 'block';
                var cardArea = document.getElementById('payment-card-area');
                if (cardArea) cardArea.style.display = 'none';
                document.getElementById('payment-paypal-area').style.display = 'none';
                var authArea = document.getElementById('payment-authorize-area');
                if (authArea) authArea.style.display = 'none';
                document.querySelectorAll('.payment-method-option').forEach(function(el) { el.classList.remove('selected'); });
                document.getElementById('pay_with_input').value = '';
            })
            .catch(() => alert('Tax calculation failed'));
    });

    function showPaymentMethodChoiceOnly() {
        var cardArea = document.getElementById('payment-card-area');
        if (cardArea) cardArea.style.display = 'none';
        document.getElementById('payment-paypal-area').style.display = 'none';
        var authArea = document.getElementById('payment-authorize-area');
        if (authArea) authArea.style.display = 'none';
        document.getElementById('card-charges-row').style.display = 'none';
        document.getElementById('card-charges-amount').innerText = '$0.00';
        document.getElementById('delivery-row').style.display = 'flex';
        if (window.checkoutBaseTotal != null && window.deliveryFee != null) {
            var totalPayPal = window.checkoutBaseTotal + window.deliveryFee;
            document.getElementById('total-amount').innerText = '$' + totalPayPal.toFixed(2);
            document.getElementById('final-total-hidden').value = totalPayPal.toFixed(2);
        }
        document.querySelectorAll('.payment-method-option').forEach(function(el) { el.classList.remove('selected'); });
        document.getElementById('pay_with_input').value = '';
        document.getElementById('authorizenet_data_descriptor').value = '';
        document.getElementById('authorizenet_data_value').value = '';
    }

    document.querySelectorAll('.payment-method-option').forEach(function(opt) {
        opt.addEventListener('click', function() {
            var method = this.getAttribute('data-method');
            var base = window.checkoutBaseTotal;
            var delivery = window.deliveryFee;
            if (base == null) base = parseFloat(document.getElementById('final-total-hidden').value) - (delivery || 0);
            if (delivery == null) delivery = base < 350 ? 39 : 45;
            document.querySelectorAll('.payment-method-option').forEach(function(el) { el.classList.remove('selected'); });
            this.classList.add('selected');
            document.getElementById('delivery-row').style.display = 'flex';
            document.getElementById('delivery-amount').innerText = '$' + delivery.toFixed(2);
            document.getElementById('fee-note').style.display = 'block';
            if (method === 'card') {
                document.getElementById('pay_with_input').value = 'stripe';
                document.getElementById('payment-paypal-area').style.display = 'none';
                var cardArea = document.getElementById('payment-card-area');
                if (cardArea) cardArea.style.display = 'block';
                var authArea = document.getElementById('payment-authorize-area');
                if (authArea) authArea.style.display = 'none';
                document.getElementById('card-charges-row').style.display = 'none';
                var totalPayPal = base + delivery;
                document.getElementById('total-amount').innerText = '$' + totalPayPal.toFixed(2);
                document.getElementById('final-total-hidden').value = totalPayPal.toFixed(2);
                if (!window.cardMounted && typeof card !== 'undefined') {
                    card.mount('#card-element');
                    window.cardMounted = true;
                }
            } else if (method === 'paypal') {
                document.getElementById('pay_with_input').value = 'paypal';
                var cardArea = document.getElementById('payment-card-area');
                if (cardArea) cardArea.style.display = 'none';
                document.getElementById('payment-paypal-area').style.display = 'block';
                var authArea = document.getElementById('payment-authorize-area');
                if (authArea) authArea.style.display = 'none';
                document.getElementById('card-charges-row').style.display = 'none';
                document.getElementById('card-charges-amount').innerText = '$0.00';
                var totalPayPal = base + delivery;
                document.getElementById('total-amount').innerText = '$' + totalPayPal.toFixed(2);
                document.getElementById('final-total-hidden').value = totalPayPal.toFixed(2);
            } else if (method === 'authorize') {
                document.getElementById('pay_with_input').value = 'authorize';
                var cardArea = document.getElementById('payment-card-area');
                if (cardArea) cardArea.style.display = 'none';
                document.getElementById('payment-paypal-area').style.display = 'none';
                document.getElementById('payment-authorize-area').style.display = 'block';
                var cardFee = Math.round(base * 0.03 * 100) / 100;
                document.getElementById('card-charges-row').style.display = 'flex';
                document.getElementById('card-charges-amount').innerText = '$' + cardFee.toFixed(2);
                var totalAuth = base + delivery + cardFee;
                document.getElementById('total-amount').innerText = '$' + totalAuth.toFixed(2);
                document.getElementById('final-total-hidden').value = totalAuth.toFixed(2);
                var authBtnText = document.getElementById('authorize-btn-text');
                if (authBtnText) authBtnText.innerText = 'Pay with Card ($' + totalAuth.toFixed(2) + ')';
            }
        });
    });

    document.getElementById('back-step-btn').addEventListener('click', function() {
        showPaymentMethodChoiceOnly();
        document.getElementById('step-2').style.display = 'none';
        document.getElementById('step-1').style.display = 'block';
    });
    var backPaypal = document.getElementById('back-step-btn-paypal');
    if (backPaypal) backPaypal.addEventListener('click', function() {
        showPaymentMethodChoiceOnly();
        document.getElementById('step-2').style.display = 'none';
        document.getElementById('step-1').style.display = 'block';
    });
    var backAuthorize = document.getElementById('back-step-btn-authorize');
    if (backAuthorize) backAuthorize.addEventListener('click', function() {
        showPaymentMethodChoiceOnly();
        document.getElementById('step-2').style.display = 'none';
        document.getElementById('step-1').style.display = 'block';
    });
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
    // Create an instance of the card Element (mounted when user selects Card in step 2).
    var card = elements.create('card', {
        style: style
    });
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
        // PayPal or Authorize submit: let form submit normally (no Stripe token)
        if (event.submitter && event.submitter.getAttribute('value') === 'paypal') {
            return;
        }
        if (document.getElementById('pay_with_input').value === 'authorize') {
            return;
        }
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
                document.getElementById('pay-btn-text').textContent =
                    'Pay Now ($<?php echo e(number_format(\Cart::getTotal(), 2)); ?>)';
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

    <?php if(config('services.authorize.api_login_id') && config('services.authorize.client_key')): ?>
    var submitAuthorizeBtn = document.getElementById('submit-authorize-btn');
    if (submitAuthorizeBtn) {
        submitAuthorizeBtn.addEventListener('click', function() {
            var cardNumber = (document.getElementById('auth-card-number') || {}).value.replace(/\s/g, '');
            var month = (document.getElementById('auth-exp-month') || {}).value.trim();
            var year = (document.getElementById('auth-exp-year') || {}).value.trim();
            var cardCode = (document.getElementById('auth-card-code') || {}).value.trim();
            var errEl = document.getElementById('authorize-errors');
            errEl.textContent = '';
            if (!cardNumber || cardNumber.length < 13) {
                errEl.textContent = 'Please enter a valid card number.';
                return;
            }
            if (!month || !year) {
                errEl.textContent = 'Please enter expiration month and year.';
                return;
            }
            if (!cardCode || cardCode.length < 3) {
                errEl.textContent = 'Please enter a valid CVV.';
                return;
            }
            if (typeof Accept === 'undefined') {
                errEl.textContent = 'Payment script not loaded. Please refresh and try again.';
                return;
            }
            submitAuthorizeBtn.disabled = true;
            var authData = {
                clientKey: "<?php echo e(config('services.authorize.client_key')); ?>",
                apiLoginID: "<?php echo e(config('services.authorize.api_login_id')); ?>"
            };
            var cardData = {
                cardNumber: cardNumber,
                month: month,
                year: year.length === 2 ? '20' + year : year,
                cardCode: cardCode
            };
            Accept.dispatchData({
                authData: authData,
                cardData: cardData
            }, function(response) {
                submitAuthorizeBtn.disabled = false;
                if (response.messages.resultCode === 'Error') {
                    var msg = (response.messages.message && response.messages.message[0]) ? response.messages.message[0].text : 'Card data invalid. Please check and try again.';
                    errEl.textContent = msg;
                    return;
                }
                if (response.opaqueData) {
                    document.getElementById('authorizenet_data_descriptor').value = response.opaqueData.dataDescriptor;
                    document.getElementById('authorizenet_data_value').value = response.opaqueData.dataValue;
                    document.getElementById('pay_with_input').value = 'authorize';
                    Swal.fire({ title: 'Processing...', text: 'Please wait.', icon: 'info', allowOutsideClick: false, showConfirmButton: false, didOpen: function() { Swal.showLoading(); } });
                    form.submit();
                } else {
                    errEl.textContent = 'Could not get payment token. Please try again.';
                }
            });
        });
    }
    <?php endif; ?>
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.website.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\website\check-out.blade.php ENDPATH**/ ?>