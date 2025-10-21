<?php $__env->startSection('title', 'Business Card Preview'); ?>
<style>
    /* Business Card Show Page - Enhanced Design */
    .business-card-show-page {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        min-height: 100vh;
    }

    .preview-btn.active {
        background-color: var(--secondry-theme) !important;
        color: var(--primary-theme-light) !important;
        box-shadow: 0 4px 15px rgba(207, 164, 12, 0.3);
        transform: translateY(-1px);
    }

    /* Enhanced Container Styling */
    .contact-form-container {
        background: white;
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(207, 164, 12, 0.2);
        margin-bottom: 20px;
    }

    /* Improved Card Preview Section */
    .card-preview-section {
        background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
        border: 2px solid rgba(207, 164, 12, 0.2);
        position: relative;
        overflow: hidden;
    }

    .card-preview-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, rgba(207, 164, 12, 0.05) 0%, transparent 50%);
        pointer-events: none;
    }
    
    .business-card-preview {
        border: 3px solid var(--light-theme);
        border-radius: var(--text-20);
        overflow: hidden;
        box-shadow: 0 20px 40px rgba(8, 30, 55, 0.15);
        background: white;
        position: relative;
        transition: all 0.3s ease;
    }

    .business-card-preview:hover {
        transform: translateY(-5px);
        box-shadow: 0 25px 50px rgba(8, 30, 55, 0.2);
    }
    
    /* Enhanced 3D Container */
    .business-card-3d-container {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-radius: 20px;
        padding: 20px;
        box-shadow: 0 20px 60px rgba(8, 30, 55, 0.15);
        position: relative;
        overflow: hidden;
        border: 2px solid rgba(207, 164, 12, 0.2);
    }

    .business-card-3d-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, rgba(207, 164, 12, 0.1) 0%, transparent 50%);
        pointer-events: none;
        border-radius: 18px;
    }

    /* 3D Controls Styling */
    .3d-controls {
        margin-top: 15px;
    }

    .3d-controls .modern-btn {
        margin: 0 5px;
        font-size: 14px;
        padding: 8px 16px;
    }

    /* Side Selection Buttons */
    .preview-btn {
        border: none;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
        cursor: pointer;
        font-family: var(--secondry-font);
    }

    .preview-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    }

    .preview-btn.active {
        background-color: var(--secondry-theme) !important;
        color: var(--primary-theme-light) !important;
        box-shadow: 0 4px 15px rgba(207, 164, 12, 0.3);
    }

    /* Modern Card Styles */
    .modern-card {
        background: white;
        border-radius: var(--text-20);
        box-shadow: 0 10px 30px rgba(8, 30, 55, 0.1);
        border: 1px solid rgba(207, 164, 12, 0.2);
        backdrop-filter: blur(10px);
        transition: all 0.3s ease;
    }

    .modern-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 15px 40px rgba(8, 30, 55, 0.15);
    }

    /* Enhanced Button Styles */
    .modern-btn {
        background-color: var(--secondry-theme);
        border: none;
        border-radius: var(--text-60);
        padding: var(--text-12) var(--text-24);
        color: var(--primary-theme-light);
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(207, 164, 12, 0.3);
        position: relative;
        overflow: hidden;
        font-family: var(--secondry-font);
    }

    .modern-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transition: left 0.5s;
    }

    .modern-btn:hover::before {
        left: 100%;
    }

    .modern-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(207, 164, 12, 0.4);
        background-color: var(--primary-theme);
        color: var(--default-color);
    }

    /* Order Sidebar Enhancements */
    .order-sidebar {
        background: white;
        border-radius: var(--text-20);
        box-shadow: 0 10px 30px rgba(8, 30, 55, 0.1);
        border: 1px solid rgba(207, 164, 12, 0.2);
        backdrop-filter: blur(10px);
        position: sticky;
        top: var(--text-20);
    }

    /* Quality Guarantee Enhancement */
    .quality-guarantee {
        background: linear-gradient(135deg, var(--secondry-theme) 0%, #B8940A 100%);
        color: var(--primary-theme-light);
        border-radius: var(--text-15);
        padding: var(--text-20);
        position: relative;
        overflow: hidden;
    }

    .quality-guarantee::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
        pointer-events: none;
    }

    /* Info Cards */
    .info-card {
        background: linear-gradient(135deg, #FFF8E1 0%, #FCF2D6 100%);
        border-radius: var(--text-15);
        padding: var(--text-20);
        border-left: 4px solid var(--secondry-theme);
        transition: all 0.3s ease;
    }

    .info-card:hover {
        transform: translateX(5px);
        box-shadow: 0 8px 25px rgba(8, 30, 55, 0.1);
    }

    /* Header Styling */
    .page-header {
        background: linear-gradient(135deg, var(--primary-theme) 0%, var(--light-theme) 100%);
        color: white;
        padding: var(--text-80) 0;
    }

    .page-header h1 {
        color: var(--default-color);
        font-family: var(--primary-font);
        font-weight: 600;
    }

    .page-header h1 span {
        color: var(--secondry-theme);
    }

    /* Status Badge */
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

    .status-draft {
        background-color: var(--secondry-theme);
        color: var(--primary-theme-light);
    }

    .status-completed {
        background-color: var(--primary-theme);
        color: var(--default-color);
    }

    .status-ordered {
        background-color: var(--light-theme);
        color: var(--default-color);
    }

    /* Form Elements */
    .form-select,
    .form-control {
        border-radius: var(--text-60);
        border: 2px solid #e2e8f0;
        padding: var(--text-15) var(--text-20);
        font-family: var(--secondry-font);
        transition: all 0.3s ease;
    }

    .form-select:focus,
    .form-control:focus {
        border-color: var(--secondry-theme);
        box-shadow: 0 0 0 4px rgba(207, 164, 12, 0.1);
    }

    /* Action Buttons */
    .action-btn {
        background-color: var(--secondry-theme);
        color: var(--primary-theme-light);
        border: none;
        border-radius: var(--text-60);
        padding: var(--text-12) var(--text-24);
        font-weight: 600;
        transition: all 0.3s ease;
        font-family: var(--secondry-font);
    }

    .action-btn:hover {
        background-color: var(--primary-theme);
        color: var(--default-color);
        transform: translateY(-2px);
    }

    .action-btn.download-pdf {
        background-color: #dc2626;
        color: white;
    }

    .action-btn.download-png {
        background-color: #059669;
        color: white;
    }

    .action-btn.order-cards {
        background-color: #ea580c;
        color: white;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .business-card-preview {
            width: 280px !important;
            height: 160px !important;
        }
        
        #preview-canvas {
            width: 280px !important;
            height: 160px !important;
        }
        
        .container {
            padding: 0 var(--text-8);
        }
        
        .modern-card {
            padding: var(--text-16);
        }
        
        .business-card-3d-container {
            width: 100% !important;
            height: 250px !important;
        }

        .page-header {
            padding: var(--text-60) 0;
        }
    }
    
    @media (max-width: 480px) {
        .business-card-preview {
            width: 250px !important;
            height: 143px !important;
        }
        
        #preview-canvas {
            width: 250px !important;
            height: 143px !important;
        }
        
        .modern-btn {
            padding: var(--text-8) var(--text-16);
            font-size: var(--text-14);
            margin: 2px;
        }

        .business-card-3d-container {
            height: 200px !important;
        }
    }

    /* Loading Animation */
    .loading-spinner {
        border: 3px solid #f3f3f3;
        border-top: 3px solid var(--secondry-theme);
        border-radius: 50%;
        width: 40px;
        height: 40px;
        animation: spin 1s linear infinite;
    }

    @keyframes  spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    .card-preview-3d {
        width: 400px;
        height: 250px;
        perspective: 1000px;
        margin: 0 auto;
        }

        .card-inner {
        position: relative;
        width: 100%;
        height: 100%;
        transition: transform 0.8s;
        transform-style: preserve-3d;
        }

        .card-preview-3d.flipped .card-inner {
        transform: rotateY(180deg);
        }

        .card-front, .card-back {
        position: absolute;
        width: 100%;
        height: 100%;
        backface-visibility: hidden;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 6px 15px rgba(0,0,0,0.2);
        }

        .card-front img,
        .card-back img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        }

        .card-back {
        transform: rotateY(180deg);
        }

</style>  
<?php $__env->startSection('content'); ?>
    <!-- ======= Main Section ======= -->
    <main class="inner-bg">
        <section class="inner-banner">
            <div class="container">
                <h1 class="heading fs-74" data-aos="fade-down" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                    Business Card <span>Preview</span></h1>
                    </div>
        </section>
    </main>

    <!-- Business Card Show Section -->
    <section class="contact-form py-150">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <span class="btn des-wrapper mb-30" data-aos="flip-up" data-aos-easing="ease-out-cubic"
                        data-aos-duration="1000">Professional Preview</span>
                    <p class="mb-60" data-aos="fade-down" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                        Preview and order your professional business card with our high-quality printing services.
                    </p>
        </div>
    </div>

            <div class="row">
            <!-- Business Card Preview -->
                <div class="col-lg-8">
                    <div class="card-preview-section">
                        <div class="row justify-content-center text-center mb-4">
                            <div class="col-lg-12">
                                <h2 class="heading fs-32 mb-30 text-primary-theme-light">Your Business Card</h2>
                                <span class="status-badge status-<?php echo e($businessCard->status); ?>"><?php echo e(ucfirst($businessCard->status)); ?></span>
                            </div>
                        </div>
                        
                        <!-- Card Preview -->
                        <div class="text-center mb-6">
                            <div class="card-preview-3d">
                                <div class="card-inner">
                                    <div class="card-front">
                                    <img src="<?php echo e(asset('public/storage/' .$businessCard->card_front_image)); ?>" alt="Front Side">
                                    </div>
                                    <div class="card-back">
                                    <img src="<?php echo e(asset('public/storage/' . $businessCard->card_back_image)); ?>" alt="Back Side">
                                    </div>
                                </div>
                                </div>

                                <div class="text-center mt-3">
                                <button id="flipCard" class="btn btn-primary">Flip</button>
                            </div>
                            <!-- 3D View Container -->
                            <!-- <div class="business-card-3d-container mx-auto mb-4"
                                style="width: 500px; height: 400px; position: relative; background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); border-radius: 20px; padding: 20px; box-shadow: 0 20px 60px rgba(8, 30, 55, 0.15);">
                                <div id="card3d-container"
                                    style="width: 100%; height: 100%; border-radius: 12px; overflow: hidden; position: relative;">
                                    <div id="3d-loading" class="d-flex align-items-center justify-content-center" style="width: 100%; height: 100%; background: rgba(255,255,255,0.9); position: absolute; top: 0; left: 0; z-index: 1000;">
                                        <div class="loading-spinner"></div>
                                        <span class="ms-3">Loading 3D View...</span>
                                    </div>
                                </div>
                                
                                <div class="3d-controls mt-3 d-flex justify-content-center gap-3">
                                    <button id="rotate-btn" class="btn btn-sm modern-btn">
                                        <i class="fas fa-sync-alt me-2"></i> Auto Rotate
                                    </button>
                                    <button id="reset-view-btn" class="btn btn-sm modern-btn">
                                        <i class="fas fa-home me-2"></i> Reset View
                                    </button>
                                    <button id="flip-card-btn" class="btn btn-sm modern-btn">
                                        <i class="fas fa-exchange-alt me-2"></i> Flip Card
                                    </button>
                                </div>
                                
                                <div class="mt-3 d-flex justify-content-center gap-3">
                                    <button id="front-3d-btn"
                                        class="preview-btn active px-4 py-2 rounded-lg transition-colors"
                                        style="background-color: var(--secondry-theme); color: var(--primary-theme-light);">
                                        <i class="fas fa-id-card me-2"></i>Front Side
                                    </button>
                                    <button id="back-3d-btn" class="preview-btn px-4 py-2 rounded-lg transition-colors"
                                        style="background-color: #e0e0e0; color: var(--light-black);">
                                        <i class="fas fa-id-card me-2"></i>Back Side
                                    </button>
                                </div>
                            </div> -->
                            
                        </div>
                        
                        <!-- Enhanced Card Details -->
                        <div class="row mt-5">
                            <div class="col-lg-6">
                                <div class="info-card">
                                    <div class="d-flex align-items-center gap-3 mb-4">
                                        <div class="sm-circle d-flex align-items-center justify-content-center">
                                            <i class="fas fa-user text-white"></i>
                                        </div>
                                        <h3 class="fs-20 fw-600 text-primary-theme-light">Personal Information</h3>
                                    </div>
                                    <div class="space-y-3">
                                        <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                                            <span class="text-light-black fw-500">Name:</span>
                                            <span class="text-primary-theme-light fw-600"><?php echo e($businessCard->name); ?></span>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                                            <span class="text-light-black fw-500">Job Title:</span>
                                            <span
                                                class="text-primary-theme-light"><?php echo e($businessCard->job_title ?? 'Not provided'); ?></span>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center py-2">
                                            <span class="text-light-black fw-500">Company:</span>
                                            <span
                                                class="text-primary-theme-light"><?php echo e($businessCard->company ?? 'Not provided'); ?></span>
                                        </div>
                        </div>
                    </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="info-card">
                                    <div class="d-flex align-items-center gap-3 mb-4">
                                        <div class="sm-circle d-flex align-items-center justify-content-center">
                                            <i class="fas fa-phone text-white"></i>
                                        </div>
                                        <h3 class="fs-20 fw-600 text-primary-theme-light">Contact Information</h3>
                                    </div>
                                    <div class="space-y-3">
                                        <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                                            <span class="text-light-black fw-500">Phone:</span>
                                            <span
                                                class="text-primary-theme-light"><?php echo e($businessCard->phone ?? 'Not provided'); ?></span>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                                            <span class="text-light-black fw-500">Email:</span>
                                            <span
                                                class="text-primary-theme-light"><?php echo e($businessCard->email ?? 'Not provided'); ?></span>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                                            <span class="text-light-black fw-500">Website:</span>
                                            <span
                                                class="text-primary-theme-light"><?php echo e($businessCard->website ?? 'Not provided'); ?></span>
                        </div>
                                        <?php if($businessCard->address): ?>
                                        <div class="d-flex justify-content-between align-items-center py-2">
                                            <span class="text-light-black fw-500">Address:</span>
                                                <span
                                                    class="text-primary-theme-light text-end"><?php echo e($businessCard->address); ?></span>
                                        </div>
                                <?php endif; ?>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Options Sidebar -->
                <div class="col-lg-4">
                    <div class="order-sidebar p-4">
                        <div class="d-flex align-items-center gap-3 mb-4">
                            <div class="sm-circle d-flex align-items-center justify-content-center">
                                <i class="fas fa-shopping-cart text-white"></i>
                            </div>
                            <div>
                                <h2 class="fs-20 fw-600 text-primary-theme-light">Order Your Cards</h2>
                                <p class="text-light-black fs-14">Professional printing</p>
                            </div>
                        </div>
                    
                    <!-- Quick Order Options -->
                    <div class="space-y-4">
                        <div>
                                <label class="label-field">Paper Stock</label>
                                <select class="form-select">
                                    <option value="matte">Matte Finish - $25/100</option>
                                    <option value="glossy">Glossy Finish - $30/100</option>
                                    <option value="premium">Premium Stock - $45/100</option>
                                    <option value="kraft">Kraft Paper - $35/100</option>
                                    <option value="plastic">Plastic Cards - $53/100</option>
                            </select>
                        </div>
                        
                        <div>
                                <label class="label-field">Corner Style</label>
                                <select class="form-select">
                                    <option value="standard"
                                        <?php echo e($businessCard->corner_style === 'standard' ? 'selected' : ''); ?>>Standard (Square)
                                    </option>
                                    <option value="rounded"
                                        <?php echo e($businessCard->corner_style === 'rounded' ? 'selected' : ''); ?>>Rounded Corners
                                        (+$0.02/card)</option>
                            </select>
                        </div>
                        
                        <div>
                                <label class="label-field">Quantity</label>
                                <select class="form-select">
                                <option value="100">100 cards - $25.00</option>
                                <option value="250">250 cards - $55.00</option>
                                <option value="500">500 cards - $100.00</option>
                                <option value="1000">1000 cards - $175.00</option>
                                    <option value="2000">2000 cards - $300.00</option>
                            </select>
                        </div>
                        
                            <button class="btn primary-btn w-100">
                            <i class="fas fa-shopping-cart me-2"></i>Add to Cart - $25.00
                        </button>
                        
                            <a href="<?php echo e(route('business-cards.order')); ?>" class="btn secondry-btn w-100">
                            <i class="fas fa-cog me-2"></i>Custom Order Options
                        </a>
                    </div>
                    
                        <!-- Enhanced Quality Guarantee -->
                        <div class="quality-guarantee mt-4">
                            <div class="d-flex align-items-center mb-3">
                                <svg class="w-8 h-8 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <div>
                                    <h4 class="fw-600 fs-18">Quality Guarantee</h4>
                                    <p class="fs-14 opacity-90">100% satisfaction guaranteed</p>
                                </div>
                            </div>
                            <div class="row g-2 fs-14">
                                <div class="col-6 d-flex align-items-center">
                                    <i class="fas fa-check-circle mr-2"></i>
                                    <span>Free Reprints</span>
                                </div>
                                <div class="col-6 d-flex align-items-center">
                                    <i class="fas fa-shipping-fast mr-2"></i>
                                    <span>Fast Delivery</span>
                                </div>
                                <div class="col-6 d-flex align-items-center">
                                    <i class="fas fa-palette mr-2"></i>
                                    <span>Color Matching</span>
                                </div>
                                <div class="col-6 d-flex align-items-center">
                                    <i class="fas fa-shield-alt mr-2"></i>
                                    <span>Secure Payment</span>
                                </div>
                        </div>
                    </div>
                </div>
                
                    <!-- Enhanced Quick Actions -->
                    <div class="contact-form-container mt-4">
                        <h3 class="fs-18 fw-600 mb-4 d-flex align-items-center gap-2">
                            <i class="fas fa-bolt text-secondry-theme"></i>
                            Quick Actions
                        </h3>
                        <div class="space-y-3">
                            <a href="<?php echo e(route('business-cards.edit', $businessCard)); ?>" class="btn secondry-btn w-100">
                                <i class="fas fa-edit mr-2"></i>Edit Design
                            </a>
                            <a href="<?php echo e(route('business-cards.index')); ?>" class="btn secondry-btn w-100">
                                <i class="fas fa-th-large mr-2"></i>View Templates
                            </a>
                            <button onclick="shareDesign()" class="btn secondry-btn w-100">
                                <i class="fas fa-share-alt mr-2"></i>Share Design
                        </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
 

<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/three@0.128.0/examples/js/controls/OrbitControls.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/5.3.0/fabric.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // 3D Business Card Variables
    let scene, camera, renderer, controls;
    let frontCard, backCard;
    let isRotating = false;
    let currentSide = 'front';
    let isFlipping = false;
    
    // Business card data
    const businessCardData = <?php echo json_encode($businessCard, 15, 512) ?>;
    
    // Initialize 3D scene
    init3DScene();
    
    function init3DScene() {
        const container = document.getElementById('card3d-container');
        
        // Scene setup
        scene = new THREE.Scene();
        scene.background = new THREE.Color(0xf8f9fa);
        
        // Camera setup
        camera = new THREE.PerspectiveCamera(75, container.clientWidth / container.clientHeight, 0.1, 1000);
        camera.position.set(0, 0, 3);
        
        // Renderer setup
        renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
        renderer.setSize(container.clientWidth, container.clientHeight);
        renderer.shadowMap.enabled = true;
        renderer.shadowMap.type = THREE.PCFSoftShadowMap;
        container.appendChild(renderer.domElement);
        
        // Controls
        controls = new THREE.OrbitControls(camera, renderer.domElement);
        controls.enableDamping = true;
        controls.dampingFactor = 0.05;
        controls.enableZoom = true;
        controls.enablePan = false;
        controls.maxPolarAngle = Math.PI / 2;
        controls.minPolarAngle = -Math.PI / 2;
        
        // Lighting
        const ambientLight = new THREE.AmbientLight(0xffffff, 0.6);
        scene.add(ambientLight);
        
        const directionalLight = new THREE.DirectionalLight(0xffffff, 0.8);
        directionalLight.position.set(5, 5, 5);
        directionalLight.castShadow = true;
        directionalLight.shadow.mapSize.width = 2048;
        directionalLight.shadow.mapSize.height = 2048;
        scene.add(directionalLight);
        
        const pointLight = new THREE.PointLight(0xffffff, 0.4, 100);
        pointLight.position.set(-5, 5, 5);
        scene.add(pointLight);
        
        // Create business cards
        createBusinessCards();
        
        // Hide loading indicator after a short delay
        setTimeout(() => {
            const loadingElement = document.getElementById('3d-loading');
            if (loadingElement) {
                loadingElement.style.display = 'none';
            }
        }, 1000);
        
        // Start render loop
        animate();
        
        // Setup event listeners
        setupEventListeners();
    }
    
    function createBusinessCards() {
        // Card dimensions (standard business card ratio)
        const cardWidth = 2;
        const cardHeight = 1.2;
        const cardThickness = 0.02;
        
        // Create card geometry
        const cardGeometry = new THREE.BoxGeometry(cardWidth, cardHeight, cardThickness);
        
        // Get design data
        let frontFiles = [];
        let backFiles = [];
        
        console.log('Business Card Data:', businessCardData);
        
        if (businessCardData.design_data) {
            try {
                let designData;
                if (typeof businessCardData.design_data === 'string') {
                    designData = JSON.parse(businessCardData.design_data);
                } else {
                    designData = businessCardData.design_data;
                }
                
                console.log('Parsed Design Data:', designData);
                
                // Check for different possible structures
                if (designData.front_upload_files) {
                    frontFiles = designData.front_upload_files;
                } else if (designData.upload_files) {
                    frontFiles = designData.upload_files;
                }
                
                if (designData.back_upload_files) {
                    backFiles = designData.back_upload_files;
                }
                
                console.log('Front Files:', frontFiles);
                console.log('Back Files:', backFiles);
            } catch (e) {
                console.log('Error parsing design data:', e);
            }
        }
        
        // Create materials
        const frontMaterial = new THREE.MeshLambertMaterial({ 
            color: 0xffffff,
            side: THREE.DoubleSide
        });
        
        const backMaterial = new THREE.MeshLambertMaterial({ 
            color: 0xf0f0f0,
            side: THREE.DoubleSide
        });
        
        // Create meshes
        frontCard = new THREE.Mesh(cardGeometry, frontMaterial);
        backCard = new THREE.Mesh(cardGeometry, backMaterial);
        
        // Position cards
        frontCard.position.z = cardThickness / 2;
        backCard.position.z = -cardThickness / 2;
        backCard.rotation.y = Math.PI; // Flip back card
        
        // Add shadows
        frontCard.castShadow = true;
        frontCard.receiveShadow = true;
        backCard.castShadow = true;
        backCard.receiveShadow = true;
        
        // Add to scene
        scene.add(frontCard);
        scene.add(backCard);
        
        // Load textures
        loadTextures(frontFiles, backFiles, frontMaterial, backMaterial);
        
        // Add text overlays if no textures
        if (frontFiles.length === 0) {
            addTextOverlay(frontCard, 'front');
        }
        if (backFiles.length === 0) {
            addTextOverlay(backCard, 'back');
        }
    }
    
    function loadTextures(frontFiles, backFiles, frontMaterial, backMaterial) {
        const textureLoader = new THREE.TextureLoader();
        
        // Load front texture
        if (frontFiles.length > 0) {
            const frontImagePath = '<?php echo e(asset("admin/assets/images/business_cards/uploads/")); ?>' + frontFiles[0];
            console.log('Loading front texture from:', frontImagePath);
            
            textureLoader.load(
                frontImagePath,
                function(texture) {
                    console.log('Front texture loaded successfully');
                    texture.wrapS = THREE.ClampToEdgeWrapping;
                    texture.wrapT = THREE.ClampToEdgeWrapping;
                    frontMaterial.map = texture;
                    frontMaterial.needsUpdate = true;
                },
                undefined,
                function(error) {
                    console.log('Error loading front texture:', error);
                    console.log('Adding text overlay for front card');
                    addTextOverlay(frontCard, 'front');
                }
            );
        } else {
            console.log('No front files found, adding text overlay');
            addTextOverlay(frontCard, 'front');
        }
        
        // Load back texture
        if (backFiles.length > 0) {
            const backImagePath = '<?php echo e(asset("admin/assets/images/business_cards/uploads/")); ?>' + backFiles[0];
            console.log('Loading back texture from:', backImagePath);
            
            textureLoader.load(
                backImagePath,
                function(texture) {
                    console.log('Back texture loaded successfully');
                    texture.wrapS = THREE.ClampToEdgeWrapping;
                    texture.wrapT = THREE.ClampToEdgeWrapping;
                    backMaterial.map = texture;
                    backMaterial.needsUpdate = true;
                },
                undefined,
                function(error) {
                    console.log('Error loading back texture:', error);
                    console.log('Adding text overlay for back card');
                    addTextOverlay(backCard, 'back');
                }
            );
        } else {
            console.log('No back files found, adding text overlay');
            addTextOverlay(backCard, 'back');
        }
    }
    
    function addTextOverlay(cardMesh, side) {
        // Create text geometry for business card content
        const textGroup = new THREE.Group();
        
        // Get business card data
        const name = businessCardData.name || 'Your Name';
        const company = businessCardData.company || 'Your Company';
        const jobTitle = businessCardData.job_title || 'Your Title';
        const phone = businessCardData.phone || 'Your Phone';
        const email = businessCardData.email || 'your@email.com';
        
        // Name
        const nameGeometry = new THREE.PlaneGeometry(1.5, 0.2);
        const nameMaterial = new THREE.MeshBasicMaterial({ 
            color: businessCardData.text_color || '#333333',
            transparent: true,
            opacity: 0.9
        });
        const nameMesh = new THREE.Mesh(nameGeometry, nameMaterial);
        nameMesh.position.set(0, 0.4, 0.011);
        textGroup.add(nameMesh);
        
        // Job Title
        const titleGeometry = new THREE.PlaneGeometry(1.6, 0.15);
        const titleMaterial = new THREE.MeshBasicMaterial({ 
            color: businessCardData.text_color || '#666666',
            transparent: true,
            opacity: 0.8
        });
        const titleMesh = new THREE.Mesh(titleGeometry, titleMaterial);
        titleMesh.position.set(0, 0.2, 0.011);
        textGroup.add(titleMesh);
        
        // Company
        const companyGeometry = new THREE.PlaneGeometry(1.8, 0.15);
        const companyMaterial = new THREE.MeshBasicMaterial({ 
            color: businessCardData.text_color || '#666666',
            transparent: true,
            opacity: 0.8
        });
        const companyMesh = new THREE.Mesh(companyGeometry, companyMaterial);
        companyMesh.position.set(0, 0, 0.011);
        textGroup.add(companyMesh);
        
        // Contact info
        const contactGeometry = new THREE.PlaneGeometry(1.6, 0.12);
        const contactMaterial = new THREE.MeshBasicMaterial({ 
            color: businessCardData.text_color || '#888888',
            transparent: true,
            opacity: 0.7
        });
        const contactMesh = new THREE.Mesh(contactGeometry, contactMaterial);
        contactMesh.position.set(0, -0.2, 0.011);
        textGroup.add(contactMesh);
        
        // Add text group to card
        cardMesh.add(textGroup);
    }
    
    function animate() {
        requestAnimationFrame(animate);
        
        if (isRotating && !isFlipping) {
            frontCard.rotation.y += 0.01;
            backCard.rotation.y += 0.01;
        }
        
        controls.update();
        renderer.render(scene, camera);
    }
    
    function setupEventListeners() {
        // Auto rotate button
    document.getElementById('rotate-btn').addEventListener('click', function() {
            isRotating = !isRotating;
            this.innerHTML = isRotating ? 
            '<i class="fas fa-pause me-2"></i> Stop Rotate' : 
            '<i class="fas fa-sync-alt me-2"></i> Auto Rotate';
    });
    
        // Reset view button
    document.getElementById('reset-view-btn').addEventListener('click', function() {
            frontCard.rotation.set(0, 0, 0);
            backCard.rotation.set(0, Math.PI, 0);
            camera.position.set(0, 0, 3);
            controls.reset();
            isRotating = false;
        document.getElementById('rotate-btn').innerHTML = '<i class="fas fa-sync-alt me-2"></i> Auto Rotate';
    });
    
        // Flip card button
    document.getElementById('flip-card-btn').addEventListener('click', function() {
            if (isFlipping) return;
        
            isFlipping = true;
        const flipDuration = 1000;
        const startTime = Date.now();
        
        function flipAnimation() {
            const elapsed = Date.now() - startTime;
            const progress = Math.min(elapsed / flipDuration, 1);
            
            const rotationY = progress * Math.PI;
                frontCard.rotation.y = rotationY;
                backCard.rotation.y = Math.PI + rotationY;
            
            if (progress < 1) {
                requestAnimationFrame(flipAnimation);
            } else {
                    isFlipping = false;
                    currentSide = currentSide === 'front' ? 'back' : 'front';
                    updateSideButtons();
            }
        }
        
        flipAnimation();
    });
    
        // Side selection buttons
    document.getElementById('front-3d-btn').addEventListener('click', function() {
            if (currentSide !== 'front') {
                flipToSide('front');
        }
    });
    
    document.getElementById('back-3d-btn').addEventListener('click', function() {
            if (currentSide !== 'back') {
                flipToSide('back');
        }
    });
    }
    
    function flipToSide(side) {
        if (isFlipping) return;
        
        isFlipping = true;
        const flipDuration = 1000;
        const startTime = Date.now();
        const targetRotation = side === 'front' ? 0 : Math.PI;
        
        function flipAnimation() {
            const elapsed = Date.now() - startTime;
            const progress = Math.min(elapsed / flipDuration, 1);
            
            const rotationY = progress * targetRotation;
            frontCard.rotation.y = rotationY;
            backCard.rotation.y = Math.PI + rotationY;
            
            if (progress < 1) {
                requestAnimationFrame(flipAnimation);
            } else {
                isFlipping = false;
                currentSide = side;
                updateSideButtons();
            }
        }
        
        flipAnimation();
    }
    
    function updateSideButtons() {
        const frontBtn = document.getElementById('front-3d-btn');
        const backBtn = document.getElementById('back-3d-btn');
        
        if (currentSide === 'front') {
            frontBtn.style.backgroundColor = 'var(--secondry-theme)';
            frontBtn.style.color = 'var(--primary-theme-light)';
            backBtn.style.backgroundColor = '#e0e0e0';
            backBtn.style.color = 'var(--light-black)';
        } else {
            backBtn.style.backgroundColor = 'var(--secondry-theme)';
            backBtn.style.color = 'var(--primary-theme-light)';
            frontBtn.style.backgroundColor = '#e0e0e0';
            frontBtn.style.color = 'var(--light-black)';
        }
    }
    
    // Handle window resize
    window.addEventListener('resize', function() {
        if (camera && renderer) {
            const container = document.getElementById('card3d-container');
            camera.aspect = container.clientWidth / container.clientHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(container.clientWidth, container.clientHeight);
        }
    });
    
    // Share design function
    function shareDesign() {
        const shareUrl = window.location.href;
        if (navigator.share) {
            navigator.share({
                title: 'My Business Card Design',
                text: 'Check out my business card design',
                url: shareUrl
            });
        } else {
            // Fallback: copy to clipboard
            navigator.clipboard.writeText(shareUrl).then(() => {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Design link copied to clipboard!',
                    timer: 2000,
                    showConfirmButton: false
                });
            });
        }
    }
});
window.addEventListener('DOMContentLoaded', function() {
    if (window.jQuery) {
        $('#flipCard').on('click', function() {
            $('.card-preview-3d').toggleClass('flipped');
        });
    } else {
        console.error('jQuery not loaded!');
    }
});
</script> 

<?php echo $__env->make('layouts.website.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp8.2\htdocs\never-forget\resources\views/website/business-cards/show.blade.php ENDPATH**/ ?>