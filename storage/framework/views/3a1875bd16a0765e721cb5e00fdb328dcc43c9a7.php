<style>
     #goog-gt-tt, .goog-te-balloon-frame, .goog-te-menu-frame, .goog-te-banner-frame {
            display: none !important;
        }
</style>
<div class="search-bar-container">
    <form action="">
        <input type="search" class="input-field bg-transparent" placeholder="Search">
    </form>
</div> 
<header class="header">
    
    <div class="top-bar" data-aos="fade-down" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
        <div class="container-fluid">
            <div class="row align-items-center">
                
                <div class="col-md-4">
                    <marquee>
                        <h3>Our prices are updated daily to reflect the latest market conditions and ensure accuracy. This allows us to offer you the most current rates and the best possible value. Please check back regularly to see any changes.</h3>
                    </marquee>
                </div>
                
                
                <div class="col-md-8">
                    <div class="d-flex gap-60 justify-content-end top-bar-content" style="background-color: var(--primary-theme); padding: var(--text-13) var(--text-20); border-bottom-left-radius: var(--text-30);">
                        
                        <a href="mailto:<?php echo e($home_page_data['header_email']); ?>"
                           class="gap-20 d-flex align-items-center text-white sm-circle-wrapper">
                            <div class="sm-circle d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <span class="secondry-font"><?php echo e($home_page_data['header_email']); ?></span>
                        </a>

                        
                        <a href="tel:<?php echo e($home_page_data['header_phone']); ?>"
                           class="gap-20 d-flex align-items-center text-white sm-circle-wrapper">
                            <div class="sm-circle d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <span class="secondry-font"><?php echo e($home_page_data['header_phone']); ?></span>
                        </a>

                        
                        <?php if(!empty($home_page_data['career_status']) && $home_page_data['career_status'] == 1): ?>
                            <!-- <a href="<?php echo e(route('career')); ?>"
                               class="gap-20 d-flex align-items-center text-white sm-circle-wrapper">
                                <div class="sm-circle d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-briefcase"></i>
                                </div>
                                <span class="secondry-font">We're Hiring</span>
                            </a> -->
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="container-fluid bg-color-header">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-2 col-6">
                <div class="logo" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                    <a href="<?php echo e(route('index')); ?>" class=""><img src="<?php echo e(asset('public/admin/assets/images/page')); ?>/<?php echo e($home_page_data['header_logo']); ?>" alt="logo"></a>
                </div>
            </div>
            <div class="col-lg-10 col-6">
                <div class="primary-navs" data-aos="fade-left" data-aos-easing="ease-out-cubic"
                    data-aos-duration="1000">
                    <div class="primary-navs-inner">
                        <ul class="primary-navs-list d-flex align-items-center justify-content-between">
                            <div class="close-icon d-xl-none">
                                <i class="fa-solid fa-xmark menu-toggle"></i>
                            </div>
                            <li><a class="btn primary-btn <?php echo e(Route::currentRouteName() == 'index' ? 'active' : ''); ?>"
                                    href="<?php echo e(route('index')); ?>">Home</a></li>
                            <li><a class="btn primary-btn <?php echo e(Route::currentRouteName() == 'about-us' ? 'active' : ''); ?>"
                                    href="<?php echo e(route('about-us')); ?>">About Us</a></li>
                            <li><a class="btn primary-btn <?php echo e(Route::currentRouteName() == 'shop' ? 'active' : ''); ?>"
                                    href="<?php echo e(route('shop')); ?>">Shop</a></li>
                            <li><a class="btn primary-btn <?php echo e(Route::currentRouteName() == 'how-it-works' ? 'active' : ''); ?>"
                                    href="<?php echo e(route('how-it-works')); ?>">How It Works</a></li>
                            <li><a class="btn primary-btn <?php echo e(Route::currentRouteName() == 'corporate-solutions' ? 'active' : ''); ?>"
                                    href="<?php echo e(route('corporate-solutions')); ?>">Corporate Solutions </a></li>
                            
                            
                            
                            <li><a class="btn primary-btn <?php echo e(Route::currentRouteName() == 'contact-us' ? 'active' : ''); ?>"
                                    href="<?php echo e(route('contact-us')); ?>">Contact Us</a></li>

                            
                            <div
                                class="sm-circle cursor-pointer search-btn text-white d-none d-lg-flex  align-items-center justify-content-center">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </div>

                            <!-- Cart Icon with Count -->
                            <a href="<?php echo e(route('cart.list')); ?>"
                                class="sm-circle cursor-pointer text-white d-flex align-items-center justify-content-center position-relative">
                                <i class="fa-solid fa-cart-shopping"></i>
                                <?php if(Cart::getContent()->count() > 0): ?>
                                    <span
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        <?php echo e(Cart::getContent()->count()); ?>

                                    </span>
                                <?php endif; ?>
                            </a>

                            <?php if(auth()->guard()->guest()): ?>
                                <a href="<?php echo e(route('login')); ?>" class="btn primary-btn"><span
                                        class="button-content">Login</span></a>
                                <a href="<?php echo e(route('register')); ?>" class="btn primary-btn"><span
                                        class="button-content">Register</span></a>
                            <?php else: ?>
                                <a href="<?php echo e(route('dashboard')); ?>" class="btn primary-btn"><span
                                        class="button-content">Dashboard</span></a>
                            <?php endif; ?>

                            <a href="#" data-bs-toggle="modal" data-bs-target="#quoteModal" class="btn primary-btn"><span class="button-content">Get A Quote</span></a>

                            <li class="nav-item dropdown ">
                                <?php echo $__env->make('components.language-switcher', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="d-flex  justify-content-end gap-20 align-items-center">
                    <div
                        class="sm-circle d-flex d-lg-none  cursor-pointer search-btn text-white align-items-center justify-content-center">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                    <div class="menu-icon d-flex justify-content-end">
                        <i class="fa-solid fa-bars menu-toggle"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<?php echo $__env->make('layouts.website.get-a-quote', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- Make sure this is included at the bottom of your layout before the closing body tag -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
        crossorigin="anonymous"></script>
<?php /**PATH C:\xampp8.2\htdocs\never-forget\resources\views/layouts/website/header.blade.php ENDPATH**/ ?>