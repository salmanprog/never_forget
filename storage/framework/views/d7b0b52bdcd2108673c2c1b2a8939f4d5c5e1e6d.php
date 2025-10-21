    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3 mb-4 mb-lg-0">
                    <img src="<?php echo e(asset('public/admin/assets/images/page')); ?>/<?php echo e($home_page_data['footer_image']); ?>"
                        class="logo-light mb-20" alt="" style="max-width: 100%; height: auto;">
                    <div class="text-white">
                        <?php echo $home_page_data['footer_description']; ?>

                    </div>
                    
                    <ul class="social-links d-flex align-items-center mt-30 gap-10 flex-wrap" style="list-style: none; padding: 0; margin: 12px 0;">
                        <?php if(!empty($home_page_data['footer_facebook'])): ?>
                            <li><a href="<?php echo e($home_page_data['footer_facebook']); ?>" style="color: white; font-size: 16px; text-decoration: none;"><i class="fa-brands fa-facebook-f"></i></a></li>
                        <?php endif; ?>
                        <?php if(!empty($home_page_data['footer_instagram'])): ?>
                            <li><a href="<?php echo e($home_page_data['footer_instagram']); ?>" style="color: white; font-size: 16px; text-decoration: none;"><i class="fa-brands fa-instagram"></i></a></li>
                        <?php endif; ?> 
                        <?php if(!empty($home_page_data['footer_twitter'])): ?>
                            <li><a href="<?php echo e($home_page_data['footer_twitter']); ?>" style="color: white; font-size: 16px; text-decoration: none;"><i class="fa-brands fa-x-twitter"></i></a></li>
                        <?php endif; ?>
                        <?php if(!empty($home_page_data['footer_linkedin'])): ?>
                            <li><a href="<?php echo e($home_page_data['footer_linkedin']); ?>" style="color: white; font-size: 16px; text-decoration: none;"><i class="fa-brands fa-linkedin-in"></i></a></li>
                        <?php endif; ?>
                        <?php if(!empty($home_page_data['footer_tiktok'])): ?>
                            <li><a href="<?php echo e($home_page_data['footer_tiktok']); ?>" style="color: white; font-size: 16px; text-decoration: none;"><i class="fa-brands fa-tiktok"></i></a></li>
                        <?php endif; ?>
                        <?php if(!empty($home_page_data['footer_pinterest'])): ?>
                            <li><a href="<?php echo e($home_page_data['footer_pinterest']); ?>" style="color: white; font-size: 16px; text-decoration: none;"><i class="fa-brands fa-pinterest"></i></a></li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="col-12 col-md-6 col-lg-2 col-xl-2 col-xxl-2 mb-4 mb-lg-0">
                    <h3 class="heading text-white fs-32 mb-30">
                        Quick <span>Links</span>
                    </h3>
                    <ul class="footer-links" style="list-style: none; padding: 0;">
                        <li class="mb-10"><a class="navs text-white text-decoration-none <?php echo e(Route::currentRouteName() == 'index' ? 'active' : ''); ?>" href="<?php echo e(route('index')); ?>">Home</a></li>
                        <li class="mb-10"><a class="navs text-white text-decoration-none <?php echo e(Route::currentRouteName() == 'about-us' ? 'active' : ''); ?>" href="<?php echo e(route('about-us')); ?>">About Us</a></li>
                        <li class="mb-10"><a class="navs text-white text-decoration-none <?php echo e(Route::currentRouteName() == 'corporate-solutions' ? 'active' : ''); ?>" href="<?php echo e(route('corporate-solutions')); ?>">Corporate Solutions</a></li>
                        <li class="mb-10"><a class="navs text-white text-decoration-none <?php echo e(Route::currentRouteName() == 'how-it-works' ? 'active' : ''); ?>" href="<?php echo e(route('how-it-works')); ?>">How It Works</a></li>
                        <li class="mb-10"><a class="navs text-white text-decoration-none <?php echo e(Route::currentRouteName() == 'testimonials' ? 'active' : ''); ?>" href="<?php echo e(route('testimonials')); ?>">Testimonials</a></li>
                        <li class="mb-10"><a class="navs text-white text-decoration-none <?php echo e(Route::currentRouteName() == 'faqs' ? 'active' : ''); ?>" href="<?php echo e(route('faqs')); ?>">FAQs</a></li>
                        <li class="mb-10"><a class="navs text-white text-decoration-none <?php echo e(Route::currentRouteName() == 'why-choose-us' ? 'active' : ''); ?>" href="<?php echo e(route('why-choose-us')); ?>">Why Choose Us</a></li>
                        <li class="mb-10"><a class="navs text-white text-decoration-none <?php echo e(Route::currentRouteName() == 'blogs' ? 'active' : ''); ?>" href="<?php echo e(route('blogs')); ?>">Blogs</a></li>
                        <li class="mb-10"><a class="navs text-white text-decoration-none <?php echo e(Route::currentRouteName() == 'contact-us' ? 'active' : ''); ?>" href="<?php echo e(route('contact-us')); ?>">Contact Us</a></li>
                        <li class="mb-10"><a class="navs text-white text-decoration-none <?php echo e(Route::currentRouteName() == 'disclaimer' ? 'active' : ''); ?>" href="<?php echo e(route('disclaimer')); ?>">Disclaimer</a></li>
                        <li class="mb-10"><a class="navs text-white text-decoration-none <?php echo e(Route::currentRouteName() == 'cookie-policy' ? 'active' : ''); ?>" href="<?php echo e(route('cookie-policy')); ?>">Cookie Policy</a></li>
                        <li class="mb-10"><a class="navs text-white text-decoration-none <?php echo e(Route::currentRouteName() == 'privacy-policy' ? 'active' : ''); ?>" href="<?php echo e(route('privacy-policy')); ?>">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="col-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4 mb-4 mb-lg-0">
                    <h3 class="heading text-white fs-32 mb-30">
                        Need a <span>Custom Gifting</span> Strategy? Let's Talk!
                    </h3>
                    <a href="tel:<?php echo e($home_page_data['footer_phone']); ?>"
                        class="gap-20 mb-20 d-flex align-items-center text-white sm-circle-wrapper">
                        <div>
                            <div class="sm-circle d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                        </div>
                        <span class="secondry-font"><?php echo e($home_page_data['footer_phone']); ?></span>
                    </a>
                    <a href="mailto:<?php echo e($home_page_data['footer_email']); ?>"
                        class="gap-20 footer-email d-flex align-items-center text-white sm-circle-wrapper">
                        <div>
                            <div class="sm-circle d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                        </div>
                        <span class="secondry-font"><?php echo e($home_page_data['footer_email']); ?></span>
                    </a>
                </div>
                <div class="col-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3">
                    <h3 class="heading text-white fs-32 mb-30">
                        <?php echo $home_page_data['newsletter_title']; ?>

                    </h3>
                    <div class="text-white mb-20">
                        <?php echo $home_page_data['newsletter_description']; ?>

                    </div>
                    
                    <?php if(session('message')): ?>
                        <div id="success-message-footer"  class="callout callout-success" style="height: auto;text-align: left;font-size: 20px;width: 100%;margin-bottom: 5px;margin-left: 3%;color: lime;"><?php echo e(session('message')); ?></div>
                        <script>
                            setTimeout(function () {
                                var successMessage = document.getElementById('success-message-footer');
                                successMessage.style.display = 'none';
                            }, 10000);
                        </script>
                    <?php endif; ?>
                    <form action="<?php echo e(route('newsletter.store')); ?>" method="post" id="regform" enctype="multipart/form-data" accept-charset="utf-8">
                        <?php echo csrf_field(); ?>
                        <div class="field-wrap position-relative"> 
                            <input type="email" name="email" placeholder="Email Address" id="email" required style="width: 100%; padding: 12px 20px; border-radius: 25px; border: none; background: white;">
                            <div class="sm-circle d-flex align-items-center justify-content-center position-absolute top-50 translate-middle-y" style="right: 3px; background: #cfa40c; width: 42px; height: 42px; border-radius: 50%;">
                                <button type="submit" style="cursor: pointer; background: none; border: none; padding: 0;" id="submit"> 
                                    <i class="fas fa-paper-plane" style="color: #ffffff;"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="d-flex justify-content-center mt-30">
                        <img src="<?php echo e(asset('public/assets/website/images')); ?>/secure3.png" alt="">
                    </div>
                </div>
            </div>
            <div class="text-white footer-disclaimer ">
                <span class="d-flex"><strong>Disclaimer:</strong><?php echo $home_page_data['footer_disclaimer']; ?></span>
                </div>
            </div>
        </div>
        <div class="footer-bottom"> 
            <div class="d-flex justify-content-between align-items-center container">
                <h6 class="text-white mb-0"><?php echo $home_page_data['footer_copy_right']; ?></h6>
                <h6 class="text-white mb-0"><?php echo $home_page_data['footer_copy_left']; ?></h6>
            </div>
        </div> 
    </footer>
<?php /**PATH C:\xampp8.2\htdocs\never-forget\resources\views/layouts/website/footer.blade.php ENDPATH**/ ?>