@extends('layouts.website.master')

@section('title', 'Business Card Order - Professional Print Services')
<style>
    /* Order Page - Matching Website Theme */
    .business-card-order-page {
        background-color: var(--section-bg);
        min-height: 100vh;
    }

    .order-form-section {
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

    .order-card-body {
        padding: var(--text-30);
    }

    .form-section-title {
        color: var(--primary-theme-light);
        font-family: var(--primary-font);
        font-weight: 600;
        font-size: var(--text-18);
        margin-bottom: var(--text-20);
        padding-bottom: var(--text-10);
        border-bottom: 2px solid var(--secondry-theme);
    }

    .paper-option-card .option-card {
        border: 2px solid #e0e0e0;
        border-radius: var(--text-15);
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .paper-option-card .option-card:hover {
        border-color: var(--secondry-theme);
        transform: translateY(-2px);
        box-shadow: 0 var(--text-8) var(--text-25) rgba(207, 164, 12, 0.2);
    }

    .paper-option-card.selected .option-card {
        border-color: var(--secondry-theme);
        background-color: rgba(207, 164, 12, 0.05);
    }

    .paper-sample {
        border-radius: var(--text-8);
        border: 2px solid #dee2e6;
        transition: all 0.3s ease;
    }

    .paper-option-card:hover .paper-sample {
        border-color: var(--secondry-theme);
    }

    .card-title {
        color: var(--primary-theme-light);
        font-family: var(--primary-font);
        font-weight: 600;
        margin-bottom: var(--text-10);
    }

    .card-text {
        color: var(--light-black);
        font-family: var(--secondry-font);
        margin-bottom: var(--text-15);
    }

    .price-info {
        font-family: var(--secondry-font);
        font-weight: 600;
    }

    .text-success {
        color: var(--secondry-theme) !important;
    }

    .form-control, .form-select {
        border: 2px solid #e0e0e0;
        border-radius: var(--text-12);
        padding: var(--text-12) var(--text-15);
        font-family: var(--secondry-font);
        transition: all 0.3s ease;
    }

    .form-control:focus, .form-select:focus {
        border-color: var(--secondry-theme);
        box-shadow: 0 0 0 0.2rem rgba(207, 164, 12, 0.25);
    }

    .btn-primary {
        background-color: var(--secondry-theme);
        border-color: var(--secondry-theme);
        color: var(--primary-theme-light);
        border-radius: var(--text-60);
        padding: var(--text-15) var(--text-30);
        font-weight: 600;
        font-family: var(--secondry-font);
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background-color: var(--primary-theme);
        border-color: var(--primary-theme);
        color: white;
        transform: translateY(-2px);
    }

    .alert-custom {
        background: linear-gradient(135deg, #FFF8E1 0%, #FCF2D6 100%);
        border: 1px solid var(--secondry-theme);
        border-radius: var(--text-12);
        padding: var(--text-15);
        margin-bottom: var(--text-15);
    }

    .alert-custom.info {
        background: linear-gradient(135deg, #d1ecf1 0%, #bee5eb 100%);
        border-color: #17a2b8;
        color: #0c5460;
    }

    .file-upload-area {
        border: 2px dashed var(--secondry-theme);
        border-radius: var(--text-15);
        padding: var(--text-40);
        text-align: center;
        background: linear-gradient(135deg, #FFF8E1 0%, #FCF2D6 100%);
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .file-upload-area:hover {
        background: linear-gradient(135deg, #FCF2D6 0%, #FFF8E1 100%);
        border-color: var(--primary-theme);
    }

    .file-upload-area.dragover {
        background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
        border-color: #28a745;
    }

    .upload-icon {
        font-size: var(--text-40);
        color: var(--secondry-theme);
        margin-bottom: var(--text-15);
    }

    .upload-text {
        color: var(--primary-theme-light);
        font-family: var(--primary-font);
        font-weight: 600;
        margin-bottom: var(--text-10);
    }

    .upload-subtext {
        color: var(--light-black);
        font-family: var(--secondry-font);
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

    /* Responsive Design */
    @media (max-width: 768px) {
        .order-form-section {
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

@section('content')
    <!-- ======= Main Section ======= -->
    <main class="inner-bg">
        <section class="inner-banner">
            <div class="container">
                <h1 class="heading fs-74" data-aos="fade-down" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                    Professional <span>Business Cards</span></h1>
            </div>
        </section>
    </main>

    <!-- Order Form Section -->
    <section class="order-form-section">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-lg-8">
                    <span class="btn des-wrapper mb-30" data-aos="flip-up" data-aos-easing="ease-out-cubic"
                        data-aos-duration="1000">Professional Printing</span>
                    <p class="mb-60" data-aos="fade-down" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                        Upload your design and we'll create professional business cards with premium quality
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="order-card">
                        <div class="order-card-header">
                            <h3><i class="fas fa-id-card me-2"></i>Business Card Order Form</h3>
                        </div>
                        <div class="order-card-body">
                            <form id="businessCardOrderForm" method="POST" action="{{ route('business-cards.order.store') }}" enctype="multipart/form-data">
                                @csrf
                                
                                <!-- Paper Stock Selection -->
                                <div class="form-section mb-5">
                                    <h4 class="form-section-title mb-4">
                                        <i class="fas fa-layer-group text-primary me-2"></i>Paper Stock
                                    </h4>
                                    <div class="row">
                                        @foreach($paperStocks ?? [] as $stock)
                                        <div class="col-md-6 col-lg-4 mb-3">
                                            @php
                                            $options = [
                                                'matte' => ['color' => '#f8f9fa', 'icon' => 'fas fa-square'],
                                                'glossy' => ['color' => '#e3f2fd', 'icon' => 'fas fa-gem'],
                                                'premium' => ['color' => '#fff3e0', 'icon' => 'fas fa-crown'],
                                                'kraft' => ['color' => '#f3e5f5', 'icon' => 'fas fa-leaf'],
                                                'linen' => ['color' => '#fce4ec', 'icon' => 'fas fa-square']
                                            ];
                                            $option = $options[$stock->option_key] ?? ['color' => '#f8f9fa', 'icon' => 'fas fa-square'];
                                            @endphp
                                            <div class="paper-option-card" data-value="{{ $stock->option_key }}">
                                                <div class="card h-100 border-2 option-card" style="cursor: pointer;">
                                                    <div class="card-body text-center p-4">
                                                        <div class="paper-sample mb-3" style="background-color: {{ $option['color'] }}; height: 60px; border-radius: 8px; border: 2px solid #dee2e6;"></div>
                                                        <h5 class="card-title">{{ $stock->name }}</h5>
                                                        <p class="card-text small text-muted">{{ $stock->description }}</p>
                                                        <div class="price-info">
                                                            @if($stock->price_modifier > 0)
                                                                <span class="text-success">+${{ number_format($stock->price_modifier, 2) }}/card</span>
                                                            @else
                                                                <span class="text-success">Standard Price</span>
                                                            @endif
                                                        </div>
                                                        <input type="radio" name="paper_stock" value="{{ $stock->option_key }}" class="d-none" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    @if(empty($paperStocks))
                                    <div class="alert alert-info">
                                        <i class="fas fa-info-circle me-2"></i>
                                        Default paper stocks are being loaded...
                                    </div>
                                    @endif
                                </div>

                                <!-- Corner Style Selection -->
                                <div class="form-section mb-5">
                                    <h4 class="form-section-title mb-4">
                                        <i class="fas fa-crop-alt text-primary me-2"></i>Corner Style
                                    </h4>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <div class="corner-option-card">
                                                <div class="card h-100 border-2 option-card" style="cursor: pointer;">
                                                    <div class="card-body text-center p-4">
                                                        <div class="corner-sample mb-3" style="width: 80px; height: 50px; background: linear-gradient(45deg, #667eea 0%, #764ba2 100%); margin: 0 auto; border-radius: 0px;"></div>
                                                        <h5 class="card-title">Standard (Square)</h5>
                                                        <p class="card-text small text-muted">Traditional square corners</p>
                                                        <div class="price-info">
                                                            <span class="text-success">Standard Price</span>
                                                        </div>
                                                        <input type="radio" name="corner_style" value="standard" class="d-none" checked required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="corner-option-card">
                                                <div class="card h-100 border-2 option-card" style="cursor: pointer;">
                                                    <div class="card-body text-center p-4">
                                                        <div class="corner-sample mb-3" style="width: 80px; height: 50px; background: linear-gradient(45deg, #667eea 0%, #764ba2 100%); margin: 0 auto; border-radius: 8px;"></div>
                                                        <h5 class="card-title">Rounded Corners</h5>
                                                        <p class="card-text small text-muted">Modern rounded corners</p>
                                                        <div class="price-info">
                                                            <span class="text-success">+$0.02/card</span>
                                                        </div>
                                                        <input type="radio" name="corner_style" value="rounded" class="d-none" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Quantity Selection -->
                                <div class="form-section mb-5">
                                    <h4 class="form-section-title mb-4">
                                        <i class="fas fa-layer-group text-primary me-2"></i>Quantity
                                    </h4>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <select class="form-select form-select-lg" name="quantity" id="quantitySelect" required>
                                                <option value="">Select Quantity</option>
                                                @foreach($quantities as $qty)
                                                <option value="{{ $qty['value'] }}" data-price="{{ $qty['label'] }}">
                                                    {{ $qty['label'] }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <div class="form-text">
                                                <i class="fas fa-info-circle me-1"></i>
                                                Higher quantities offer better per-unit pricing
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Design Upload -->
                                <div class="form-section mb-5">
                                    <h4 class="form-section-title mb-4">
                                        <i class="fas fa-upload text-primary me-2"></i>Upload Your Design
                                    </h4>
                                    
                                    <!-- Upload Guidelines -->
                                    <div class="alert alert-info mb-4">
                                        <h5 class="alert-heading"><i class="fas fa-info-circle me-2"></i>Design Requirements</h5>
                                        <ul class="mb-0">
                                            <li><strong>Size:</strong> 3.5" x 2" (1050 x 600 pixels at 300 DPI)</li>
                                            <li><strong>Bleed:</strong> Add 0.125" (127.5 pixels) bleed on all sides</li>
                                            <li><strong>File Formats:</strong> PDF (preferred), PNG, JPG</li>
                                            <li><strong>File Size:</strong> Maximum 50 MB per file</li>
                                            <li><strong>Resolution:</strong> 300 DPI minimum</li>
                                        </ul>
                                    </div>

                                    <!-- File Upload Area -->
                                    <div class="upload-area border-2 border-dashed border-primary rounded p-5 text-center" id="uploadArea">
                                        <div class="upload-content">
                                            <i class="fas fa-cloud-upload-alt fa-3x text-primary mb-3"></i>
                                            <h5>Drop your design files here</h5>
                                            <p class="text-muted mb-3">or click to browse</p>
                                            <button type="button" class="btn btn-primary btn-lg" id="uploadBtn">
                                                <i class="fas fa-folder-open me-2"></i>Choose Files
                                            </button>
                                        </div>
                                        <input type="file" name="upload_files[]" id="fileInput" multiple accept=".pdf,.png,.jpg,.jpeg" class="d-none" required>
                                    </div>
                                    
                                    <!-- Uploaded Files Preview -->
                                    <div id="uploadedFilesPreview" class="mt-4"></div>
                                </div>

                                <!-- Custom Design Note -->
                                <div class="form-section mb-5">
                                    <div class="alert alert-warning">
                                        <h5 class="alert-heading"><i class="fas fa-palette me-2"></i>Need a Custom Design?</h5>
                                        <p class="mb-3">Don't have a design ready? We offer custom design services!</p>
                                        <a href="{{ route('contact-us') }}" class="btn btn-warning">
                                            <i class="fas fa-phone me-2"></i>Contact Us for Custom Design
                                        </a>
                                    </div>
                                </div>

                                <!-- Additional Notes -->
                                <div class="form-section mb-5">
                                    <h4 class="form-section-title mb-4">
                                        <i class="fas fa-sticky-note text-primary me-2"></i>Additional Notes
                                    </h4>
                                    <textarea class="form-control" name="notes" rows="4" placeholder="Any special instructions or requirements..."></textarea>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Order Summary Sidebar -->
                <div class="w-full lg:w-1/3">
                    <div class="card shadow-lg border-0 sticky-top">
                        <div class="card-header bg-dark text-white">
                            <h4 class="mb-0"><i class="fas fa-shopping-cart me-2"></i>Order Summary</h4>
                        </div>
                        <div class="card-body">
                            <div id="orderSummary">
                                <div class="summary-item d-flex justify-content-between mb-2">
                                    <span>Paper Stock:</span>
                                    <span id="summaryPaperStock" class="text-muted">Not selected</span>
                                </div>
                                <div class="summary-item d-flex justify-content-between mb-2">
                                    <span>Corner Style:</span>
                                    <span id="summaryCornerStyle">Standard</span>
                                </div>
                                <div class="summary-item d-flex justify-content-between mb-2">
                                    <span>Quantity:</span>
                                    <span id="summaryQuantity" class="text-muted">Not selected</span>
                                </div>
                                <div class="summary-item d-flex justify-content-between mb-2">
                                    <span>Files:</span>
                                    <span id="summaryFiles" class="text-muted">0 uploaded</span>
                                </div>
                                <hr>
                                <div class="summary-item d-flex justify-content-between mb-3">
                                    <strong>Subtotal:</strong>
                                    <strong id="summaryTotal">$0.00</strong>
                                </div>
                            </div>
                            
                            <button type="button" class="btn btn-success btn-lg w-100 mb-3" id="addToCartBtn" disabled>
                                <i class="fas fa-shopping-cart me-2"></i>Add to Cart
                            </button>
                            
                            <!-- Stripe Payment Section -->
                            <div id="payment-section" class="mt-4" style="display: none;">
                                <div class="card border-primary">
                                    <div class="card-header bg-primary text-white">
                                        <h5 class="mb-0"><i class="fas fa-credit-card me-2"></i>Payment Information</h5>
                                    </div>
                                    <div class="card-body">
                                        <form id="payment-form">
                                            <div id="card-element" class="mb-3">
                                                <!-- Stripe Elements will create form elements here -->
                                            </div>
                                            <div id="card-errors" role="alert" class="text-danger mb-3"></div>
                                            <div class="d-grid gap-2">
                                                <button id="submit-payment" class="btn btn-primary btn-lg">
                                                    <i class="fas fa-lock me-2"></i>Pay $<span id="payment-total">0.00</span>
                                                </button>
                                                <button type="button" id="cancel-payment" class="btn btn-outline-secondary">
                                                    <i class="fas fa-arrow-left me-2"></i>Back to Order
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="text-center">
                                <small class="text-muted">
                                    <i class="fas fa-shield-alt me-1"></i>
                                    Secure checkout • Free shipping on orders over $50
                                </small>
                            </div>
                        </div>
                    </div>

                    <!-- Quality Guarantee -->
                    <div class="card mt-4 border-0 bg-light">
                        <div class="card-body text-center">
                            <h5><i class="fas fa-award text-warning me-2"></i>Quality Guarantee</h5>
                            <p class="small mb-0">100% satisfaction guarantee or we'll reprint your order at no charge</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Loading Modal -->
<div class="modal fade" id="loadingModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-center p-4">
            <div class="spinner-border text-primary mb-3" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <h5>Processing your order...</h5>
                            <p class="text-muted">Uploading files and calculating pricing</p>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .form-section-title {
        color: #2c3e50;
        border-bottom: 2px solid #3498db;
        padding-bottom: 10px;
    }

    .option-card {
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .option-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }

    .option-card.selected {
        border-color: #27ae60 !important;
        background-color: #f8fff9;
    }

    .upload-area {
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .upload-area:hover,
    .upload-area.dragover {
        border-color: #27ae60 !important;
        background-color: #f8fff9;
    }

    .uploaded-file-item {
        background: #f8f9fa;
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 10px;
        border-left: 4px solid #28a745;
    }

    .preview-thumbnail {
        max-width: 100px;
        max-height: 60px;
        object-fit: cover;
        border-radius: 4px;
    }

    #orderSummary {
        max-height: 400px;
        overflow-y: auto;
    }

    .summary-item {
        font-size: 14px;
    }

    @media (max-width: 1024px) {
        .sticky-top {
            position: relative !important;
        }
        
        .container {
            padding: 0 16px;
        }
    }
    
    @media (max-width: 768px) {
        .hero-section {
            padding: 2rem 0;
        }
        
        .hero-section h1 {
            font-size: 2rem;
        }
        
        .hero-section p {
            font-size: 1rem;
        }
        
        .order-form-section {
            padding: 1rem 0;
        }
        
        .card-body {
            padding: 1.5rem !important;
        }
        
        .form-section-title {
            font-size: 1.125rem;
        }
        
        .option-card {
            margin-bottom: 1rem;
        }
        
        .upload-area {
            padding: 1.5rem;
        }
        
        .btn-lg {
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
        }
    }
    
    @media (max-width: 480px) {
        .hero-section h1 {
            font-size: 1.5rem;
        }
        
        .hero-section .lead {
            font-size: 0.9rem;
        }
        
        .form-section-title {
            font-size: 1rem;
        }
        
        .option-card .card-body {
            padding: 1rem !important;
        }
        
        .upload-area {
            padding: 1rem;
        }
        
        .upload-area i {
            font-size: 2rem !important;
        }
        
        .btn {
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
        }
        
        .summary-item {
            font-size: 0.875rem;
        }
    }
</style>
@endpush

@push('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Stripe
    const stripe = Stripe('{{ config("services.stripe.key") }}');
    const elements = stripe.elements();
    
    // Create card element
    const cardElement = elements.create('card', {
        style: {
            base: {
                fontSize: '16px',
                color: '#424770',
                '::placeholder': {
                    color: '#aab7c4',
                },
            },
            invalid: {
                color: '#9e2146',
            },
        },
    });
    
    cardElement.mount('#card-element');
    
    // Handle real-time validation errors from the card Element
    cardElement.on('change', function(event) {
        const displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });
    
    // Handle form submission
    const paymentForm = document.getElementById('payment-form');
    paymentForm.addEventListener('submit', async function(event) {
        event.preventDefault();
        
        const submitButton = document.getElementById('submit-payment');
        submitButton.disabled = true;
        submitButton.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Processing...';
        
        try {
            // Create payment intent on server
            const response = await fetch('{{ route("business-cards.create-payment-intent") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    amount: calculateTotal() * 100, // Convert to cents
                    currency: 'usd'
                })
            });
            
            const { client_secret } = await response.json();
            
            // Confirm payment
            const { error, paymentIntent } = await stripe.confirmCardPayment(client_secret, {
                payment_method: {
                    card: cardElement,
                }
            });
            
            if (error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Payment Failed',
                    text: error.message,
                    confirmButtonColor: '#d33'
                });
            } else if (paymentIntent.status === 'succeeded') {
                // Payment succeeded, submit the order
                submitOrderWithPayment(paymentIntent.id);
            }
        } catch (error) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'An error occurred during payment processing.',
                confirmButtonColor: '#d33'
            });
        } finally {
            submitButton.disabled = false;
            submitButton.innerHTML = '<i class="fas fa-lock me-2"></i>Pay $<span id="payment-total">' + calculateTotal().toFixed(2) + '</span>';
        }
    });
    
    // Show payment section when "Add to Cart" is clicked
    document.getElementById('addToCartBtn').addEventListener('click', function() {
        const paperStock = document.querySelector('input[name="paper_stock"]:checked');
        const cornerStyle = document.querySelector('input[name="corner_style"]:checked');
        const quantity = document.getElementById('quantitySelect').value;
        const files = Array.from(document.getElementById('fileInput').files);

        if (!paperStock || !cornerStyle || !quantity || files.length === 0) {
            Swal.fire({
                icon: 'warning',
                title: 'Incomplete Order',
                text: 'Please fill in all required fields: paper stock, corner style, quantity, and upload at least one file.',
                confirmButtonColor: '#3085d6'
            });
            return;
        }
        
        // Show payment section
        document.getElementById('payment-section').style.display = 'block';
        document.getElementById('payment-total').textContent = calculateTotal().toFixed(2);
        
        // Scroll to payment section
        document.getElementById('payment-section').scrollIntoView({ 
            behavior: 'smooth',
            block: 'start'
        });
    });
    
    // Hide payment section when "Back to Order" is clicked
    document.getElementById('cancel-payment').addEventListener('click', function() {
        document.getElementById('payment-section').style.display = 'none';
    });
    
    function calculateTotal() {
        const quantity = document.getElementById('quantitySelect').value;
        const cornerStyle = document.querySelector('input[name="corner_style"]:checked');
        
        if (!quantity) return 0;
        
        // Simple pricing calculation
        const basePrice = 0.50;
        const quantityModifiers = {
            50: 0,
            100: -0.05,
            200: -0.08,
            500: -0.10,
            1000: -0.12,
            2000: -0.15,
            5000: -0.20,
            10000: -0.25
        };
        
        const modifier = quantityModifiers[quantity] || 0;
        const unitPrice = basePrice + modifier;
        
        if (cornerStyle && cornerStyle.value === 'rounded') {
            const cornerModifier = 0.02;
            return quantity * (unitPrice + cornerModifier);
        } else {
            return quantity * unitPrice;
        }
    }
    
    function submitOrderWithPayment(paymentIntentId) {
        // Create form data
        const formData = new FormData();
        formData.append('_token', document.querySelector('meta[name="csrf-token"]').content);
        formData.append('paper_stock', document.querySelector('input[name="paper_stock"]:checked').value);
        formData.append('corner_style', document.querySelector('input[name="corner_style"]:checked').value);
        formData.append('quantity', document.getElementById('quantitySelect').value);
        formData.append('payment_intent_id', paymentIntentId);
        
        // Add uploaded files
        const files = document.getElementById('fileInput').files;
        for (let i = 0; i < files.length; i++) {
            formData.append('upload_files[]', files[i]);
        }
        
        // Submit order
        fetch('{{ route("business-cards.order.store") }}', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Order Successful!',
                    text: 'Your business card order has been placed successfully.',
                    confirmButtonColor: '#28a745'
                }).then(() => {
                    window.location.href = data.redirect_url;
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Order Failed',
                    text: data.message || 'An error occurred while processing your order.',
                    confirmButtonColor: '#d33'
                });
            }
        })
        .catch(error => {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'An error occurred while processing your order.',
                confirmButtonColor: '#d33'
            });
        });
    }
    
    // Existing code continues...
    // Initialize form handlers
    initializeFormHandlers();
    updateOrderSummary();

    function initializeFormHandlers() {
        // Paper stock selection
        document.querySelectorAll('.paper-option-card').forEach(function(card) {
            card.addEventListener('click', function() {
                selectPaperOption(this);
            });
        });

        // Corner style selection
        document.querySelectorAll('.corner-option-card').forEach(function(card) {
            card.addEventListener('click', function() {
                selectCornerOption(this);
            });
        });

        // Quantity selection
        document.getElementById('quantitySelect').addEventListener('change', function() {
            updateOrderSummary();
        });

        // File upload
        initializeFileUpload();

        // Form submission
        document.getElementById('addToCartBtn').addEventListener('click', function() {
            submitOrder();
        });
    }

    function selectPaperOption(card) {
        // Remove previous selection
        document.querySelectorAll('.paper-option-card .option-card').forEach(function(card) {
            card.classList.remove('selected');
        });
        
        // Select current option
        const optionCard = card.querySelector('.option-card');
        optionCard.classList.add('selected');
        
        // Set radio button value
        const radio = card.querySelector('input[type="radio"]');
        radio.checked = true;
        
        updateOrderSummary();
    }

    function selectCornerOption(card) {
        // Remove previous selection
        document.querySelectorAll('.corner-option-card .option-card').forEach(function(card) {
            card.classList.remove('selected');
        });
        
        // Select current column
        const optionCard = card.querySelector('.option-card');
        optionCard.classList.add('selected');
        
        // Set radio button value
        const radio = card.querySelector('input[type="radio"]');
        radio.checked = true;
        
        updateOrderSummary();
    }

    function initializeFileUpload() {
        const fileInput = document.getElementById('fileInput');
        const uploadArea = document.getElementById('uploadArea');
        const uploadBtn = document.getElementById('uploadBtn');

        // Click to upload
        uploadBtn.addEventListener('click', function() {
            fileInput.click();
        });

        uploadArea.addEventListener('click', function() {
            fileInput.click();
        });

        // Drag and drop
        uploadArea.addEventListener('dragover', function(e) {
            e.preventDefault();
            uploadArea.classList.add('dragover');
        });

        uploadArea.addEventListener('dragleave', function(e) {
            e.preventDefault();
            uploadArea.classList.remove('dragover');
        });

        uploadArea.addEventListener('drop', function(e) {
            e.preventDefault();
            uploadArea.classList.remove('dragover');
            
            const files = e.dataTransfer.files;
            handleFileSelection(files);
        });

        // File input change
        fileInput.addEventListener('change', function() {
            handleFileSelection(this.files);
        });
    }

    function handleFileSelection(files) {
        const fileArray = Array.from(files);
        const preview = document.getElementById('uploadedFilesPreview');
        
        if (fileArray.length === 0) return;

        preview.innerHTML = '<h5 class="mb-3">Uploaded Files</h5>';
        
        fileArray.forEach(function(file) {
            if (validateFile(file)) {
                createFilePreview(file, preview);
            }
        });

        updateOrderSummary();
    }

    function validateFile(file) {
        const allowedTypes = ['application/pdf', 'image/png', 'image/jpeg'];
        const maxSize = 50 * 1024 * 1024; // 50MB

        if (!allowedTypes.includes(file.type)) {
            alert(`File "${file.name}" is not a supported format. Please upload PDF, PNG, or JPG files only.`);
            return false;
        }

        if (file.size > maxSize) {
            alert(`File "${file.name}" is too large. Maximum file size is 50MB.`);
            return false;
        }

        return true;
    }

    function createFilePreview(file, container) {
        const fileItem = document.createElement('div');
        fileItem.className = 'uploaded-file-item';
        
        let previewContent = '';
        if (file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewContent = `
                    <img src="${e.target.result}" class="preview-thumbnail float-start me-3" alt="${file.name}">
                    <div>
                        <h6 class="mb-1">${file.name}</h6>
                        <small class="text-muted">${(file.size / 1024 / 1024).toFixed(1)} MB</small>
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-danger float-end" onclick="removeFile(this)">
                        <i class="fas fa-times"></i>
                    </button>
                    <div class="clearfix"></div>
                `;
                fileItem.innerHTML = previewContent;
            };
            reader.readAsDataURL(file);
        } else {
            previewContent = `
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="mb-1">${file.name}</h6>
                        <small class="text-muted">${(file.size / 1024 / 1024).toFixed(1)} MB • PDF</small>
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-danger" onclick="removeFile(this)">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            `;
            fileItem.innerHTML = previewContent;
        }
        
        container.appendChild(fileItem);
    }

    // Make removeFile globally available
    window.removeFile = function(button) {
        button.closest('.uploaded-file-item').remove();
        updateOrderSummary();
    };

    function updateOrderSummary() {
        const paperStock = document.querySelector('input[name="paper_stock"]:checked');
        const cornerStyle = document.querySelector('input[name="corner_style"]:checked');
        const quantity = document.getElementById('quantitySelect').value;
        const files = document.querySelectorAll('.uploaded-file-item');

        // Update summary display
        document.getElementById('summaryPaperStock').textContent = paperStock ? 
            paperStock.closest('.paper-option-card').querySelector('.card-title').textContent : 'Not selected';
        
        document.getElementById('summaryCornerStyle').textContent = cornerStyle ? 
            cornerStyle.closest('.corner-option-card').querySelector('.card-title').textContent : 'Not selected';
        
        document.getElementById('summaryQuantity').textContent = quantity ? 
            document.querySelector(`option[value="${quantity}"]`).textContent : 'Not selected';
        
        document.getElementById('summaryFiles').textContent = `${files.length} uploaded`;

        // Calculate total
        let total = 0;
        if (quantity) {
            // Simple pricing calculation
            const basePrice = 0.50;
            const quantityModifiers = {
                50: 0,
                100: -0.05,
                200: -0.08,
                500: -0.10,
                1000: -0.12,
                2000: -0.15,
                5000: -0.20,
                10000: -0.25
            };
            
            const modifier = quantityModifiers[quantity] || 0;
            const unitPrice = basePrice + modifier;
            
            if (cornerStyle && cornerStyle.value === 'rounded') {
                const cornerModifier = 0.02;
                total = quantity * (unitPrice + cornerModifier);
            } else {
                total = quantity * unitPrice;
            }
        }

        document.getElementById('summaryTotal').textContent = `$${total.toFixed(2)}`;

        // Enable/disable add to cart button
        const addToCartBtn = document.getElementById('addToCartBtn');
        const canProceed = paperStock && cornerStyle && quantity && files.length > 0;
        
        if (quantity == 50000) {
            addToCartBtn.innerHTML = '<i class="fas fa-phone me-2"></i>Contact Us for Pricing';
            addToCartBtn.classList.remove('btn-success');
            addToCartBtn.classList.add('btn-warning');
            addToCartBtn.onclick = function() {
                window.location.href = '{{ route("contact-us") }}';
            };
        } else {
            addToCartBtn.innerHTML = '<i class="fas fa-shopping-cart me-2"></i>Add to Cart';
            addToCartBtn.classList.remove('btn-warning');
            addToCartBtn.classList.add('btn-success');
            addToCartBtn.onclick = function() {
                submitOrder();
            };
        }
        
        addToCartBtn.disabled = !canProceed;
    }

    function submitOrder() {
        // Validate form before submission
        const paperStock = document.querySelector('input[name="paper_stock"]:checked');
        const cornerStyle = document.querySelector('input[name="corner_style"]:checked');
        const quantity = document.getElementById('quantitySelect').value;
        const files = Array.from(document.getElementById('fileInput').files);

        if (!paperStock || !cornerStyle || !quantity || files.length === 0) {
            alert('Please fill in all required fields: paper stock, corner style, quantity, and upload at least one file.');
            return;
        }

        // Submit form normally - no AJAX needed
        document.getElementById('businessCardOrderForm').submit();
    }

    // Initialize default corner style selection
    selectCornerOption(document.querySelector('.corner-option-card:first-child'));
});
</script>
@endpush
