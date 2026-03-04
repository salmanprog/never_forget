@extends('layouts.website.master')
@section('content')
@section('title', 'Checkout')

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
                <form action="{{ route('order.store') }}" method="POST" id="payment-form" autocomplete="off">
                    @csrf
                    <div id="step-1">
                        <div class="checkout-title">Checkout</div>
                        <div class="checkout-step">Step 1: Billing Details</div>
                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif


                        @if (Auth::check())
                            <div class="mb-3">
                                <label for="billing_address" class="form-label">Select Billing Address</label>
                                <select name="billing_address_id" id="billing_address" class="form-select" required
                                    aria-label="Select Billing Address">
                                    <option value="">Select Billing Address</option>
                                    @foreach ($billing_addresses as $index => $address)
                                        <option value="{{ $address->id }}" {{ $index === 0 ? 'selected' : '' }}>
                                            {{ trim(implode(', ', array_filter([$address->first_name, $address->last_name, $address->company, $address->street, $address->town, $address->state, $address->postcode, $address->country]))) ?: 'Billing Address' }}
                                        </option>
                                    @endforeach
                                </select>
                                <a href="{{ route('billing_address.create') }}" class="add-address-btn">Add New
                                    Address</a>
                            </div>
                        @else
                            <!-- Guest Checkout Form -->
                            <div class="mb-3">
                                <h5 class="text-primary mb-3">Guest Checkout Information</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="guest_first_name" class="form-label">First Name *</label>
                                        <input type="text" class="form-control" id="guest_first_name"
                                            name="guest_first_name" value="{{ old('guest_first_name') }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="guest_last_name" class="form-label">Last Name *</label>
                                        <input type="text" class="form-control" id="guest_last_name"
                                            name="guest_last_name" value="{{ old('guest_last_name') }}" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="guest_email" class="form-label">Email Address *</label>
                                        <input type="email" class="form-control" id="guest_email" name="guest_email"
                                            value="{{ old('guest_email') }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="guest_phone" class="form-label">Phone Number *</label>
                                        <input type="tel" class="form-control" id="guest_phone" name="guest_phone"
                                            value="{{ old('guest_phone') }}" required>
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
                                            value="{{ old('guest_company') }}" name="guest_company">
                                    </div>


                                    <div class="col-md-12">
                                        <label for="guest_street" class="form-label">Street Address *</label>
                                        <input type="text" class="form-control" id="autocomplete_address"
                                            name="guest_street" value="{{ old('guest_street') }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="guest_state" class="form-label">State *</label>
                                        <input type="text" class="form-control" id="guest_state"
                                            value="{{ old('guest_state') }}" name="guest_state" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="guest_country" class="form-label">Country *</label>
                                        <input type="text" class="form-control" id="guest_country"
                                            value="{{ old('guest_country') }}" name="guest_country" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="guest_city" class="form-label">City/Town *</label>
                                        <input type="text" class="form-control" id="guest_city" name="guest_city"
                                            value="{{ old('guest_city') }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="guest_postal_code" class="form-label">Postal Code *</label>
                                        <input type="text" class="form-control" id="guest_postal_code"
                                            name="guest_postal_code" value="{{ old('guest_postal_code') }}" required>
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
                                                <a class="navs" href="{{ route('privacy-policy') }}">Privacy
                                                    Policy</a>
                                            </div>
                                            <div>
                                                <a class="navs" href="{{ route('disclaimer') }}">Disclaimer</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <!-- Hidden field for guest billing address -->
                            <input type="hidden" name="billing_address_id" value="0">
                        @endif
                        <button type="button" class="checkout-btn mt-3" id="next-step-btn">
                            Next
                        </button>
                    </div>
                    <div id="step-2" style="display:none;">
                        <div class="checkout-step mb-3">Step 2: Payment Method</div>
                        <p class="text-muted mb-4">Choose how you would like to pay</p>
                        <div class="row g-3 mb-4">
                            <div class="col-12">
                                <div class="payment-method-option rounded border p-4 h-100 cursor-pointer" data-method="card" id="option-card">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="payment-method-icon bg-light rounded p-3">
                                            <i class="fa fa-credit-card fa-2x text-primary"></i>
                                        </div>
                                        <div>
                                            <strong class="d-block">Credit or Debit Card</strong>
                                            <small class="text-muted">Visa, Mastercard, Amex — secure by Stripe</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="payment-method-option rounded border p-4 h-100 cursor-pointer" data-method="paypal" id="option-paypal">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="payment-method-icon bg-light rounded p-3">
                                            <i class="fa fa-paypal fa-2x text-primary"></i>
                                        </div>
                                        <div>
                                            <strong class="d-block">PayPal</strong>
                                            <small class="text-muted">Pay with your PayPal account</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="pay_with" value="" id="pay_with_input">
                        <div id="payment-card-area" style="display:none;">
                            <div class="mb-3">
                                <label for="card-element" class="form-label">Card details</label>
                                <img src="https://stripe.com/img/v3/home/social.png" alt="Powered by Stripe" class="stripe-logo" aria-label="Powered by Stripe">
                                <div id="card-element" class="form-control" aria-label="Card input"></div>
                                <div id="card-errors" role="alert" class="text-danger mt-2"></div>
                            </div>
                            <div class="d-flex gap-2 flex-wrap">
                                <button type="button" class="btn primary-btn" id="back-step-btn">Back</button>
                                <button type="submit" class="checkout-btn mt-0" id="submit-button" name="pay_with" value="stripe">
                                    <span class="lock-icon"><i class="fa fa-lock"></i></span>
                                    <span id="pay-btn-text">Pay Now (${{ number_format(\Cart::getTotal(), 2) }})</span>
                                    <span class="spinner-border spinner-border-sm d-none" id="pay-btn-spinner" role="status" aria-hidden="true"></span>
                                </button>
                            </div>
                        </div>
                        <div id="payment-paypal-area" style="display:none;">
                            <p class="text-muted mb-3">You will be redirected to PayPal to complete your payment securely.</p>
                            <div class="d-flex gap-2 flex-wrap">
                                <button type="button" class="btn primary-btn" id="back-step-btn-paypal">Back</button>
                                <button type="submit" form="payment-form" name="pay_with" value="paypal" class="btn btn-primary btn-lg">
                                    <i class="fa fa-paypal"></i> Checkout with PayPal
                                </button>
                                
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-5 order-1 order-lg-2 order-summary-mobile">
            <div class="order-summary-card order-summary-sticky">
                <input type="hidden" name="tax_amount" id="tax-hidden" value="0">
                <input type="hidden" name="final_total" id="final-total-hidden"
                    value="{{ \Cart::getSubTotal() }}">
                <div class="order-summary-title">Order Summary</div>
                <div class="order-summary-list">
                    @foreach ($Items as $item)
                        <div class="d-flex justify-content-between mb-2">
                            <span>{{ $item->product_name ?? $item->name }} x {{ $item->quantity }}</span>
                            <span>${{ number_format(($item->product_price ?? $item->price) * $item->quantity, 2) }}</span>
                        </div>
                    @endforeach
                </div>
                <div class="order-summary-divider"></div>
                <div class="order-summary-list order-summary-totals d-flex justify-content-between mb-2">
                    <strong>Subtotal</strong>
                    <span id="subtotal-amount" data-subtotal="{{ \Cart::getSubTotal() }}">
                        ${{ number_format(\Cart::getSubTotal(), 2) }}
                    </span>
                </div>
                @if (Session::has('discount'))
                    <div class="order-summary-list order-summary-totals d-flex justify-content-between mb-2">
                        <strong>Discount</strong>
                        <span>-${{ number_format(Session::get('discount')['discount'], 2) }}</span>
                    </div>
                @endif
                <div class="order-summary-list order-summary-totals d-flex justify-content-between mb-2">
                    <strong>Tax</strong>
                    <span id="tax-amount">$0.00</span> <!-- This will be updated dynamically -->
                </div>
                <div class="order-summary-list order-summary-totals d-flex justify-content-between">
                    <strong>Total</strong>
                    <span id="total-amount">
                        ${{ number_format(\Cart::getSubTotal(), 2) }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- FontAwesome for lock icon -->

{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" /> --}}
<!-- SweetAlert2 for alerts -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://js.stripe.com/v3/"></script>

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

        fetch("{{ route('calculateTax') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
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
                const total = subtotal + tax;

                document.getElementById('tax-amount').innerText = '$' + tax.toFixed(2);
                document.getElementById('total-amount').innerText = '$' + total.toFixed(2);
                document.getElementById('tax-hidden').value = tax.toFixed(2);
                document.getElementById('final-total-hidden').value = total.toFixed(2);

                document.getElementById('pay-btn-text').innerText =
                    'Pay Now ($' + total.toFixed(2) + ')';

                // ✅ Move to payment method step ONLY after tax success
                document.getElementById('step-1').style.display = 'none';
                document.getElementById('step-2').style.display = 'block';
                document.getElementById('payment-card-area').style.display = 'none';
                document.getElementById('payment-paypal-area').style.display = 'none';
                document.querySelectorAll('.payment-method-option').forEach(function(el) { el.classList.remove('selected'); });
                document.getElementById('pay_with_input').value = '';
            })
            .catch(() => alert('Tax calculation failed'));
    });

    function showPaymentMethodChoiceOnly() {
        document.getElementById('payment-card-area').style.display = 'none';
        document.getElementById('payment-paypal-area').style.display = 'none';
        document.querySelectorAll('.payment-method-option').forEach(function(el) { el.classList.remove('selected'); });
        document.getElementById('pay_with_input').value = '';
    }

    document.querySelectorAll('.payment-method-option').forEach(function(opt) {
        opt.addEventListener('click', function() {
            var method = this.getAttribute('data-method');
            document.querySelectorAll('.payment-method-option').forEach(function(el) { el.classList.remove('selected'); });
            this.classList.add('selected');
            if (method === 'card') {
                document.getElementById('pay_with_input').value = 'stripe';
                document.getElementById('payment-paypal-area').style.display = 'none';
                document.getElementById('payment-card-area').style.display = 'block';
                if (!window.cardMounted) {
                    card.mount('#card-element');
                    window.cardMounted = true;
                }
            } else {
                document.getElementById('pay_with_input').value = 'paypal';
                document.getElementById('payment-card-area').style.display = 'none';
                document.getElementById('payment-paypal-area').style.display = 'block';
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
    // Create a Stripe client. 
    var stripe = Stripe("{{ config('services.stripe.key') }}");
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
        // PayPal submit: let form submit normally (no Stripe token)
        if (event.submitter && event.submitter.getAttribute('value') === 'paypal') {
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
                    'Pay Now (${{ number_format(\Cart::getTotal(), 2) }})';
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
@endsection
