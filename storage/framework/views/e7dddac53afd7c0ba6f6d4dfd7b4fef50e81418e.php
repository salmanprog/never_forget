<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="<?php echo e(route('dashboard')); ?>"
                    class="<?php echo e(request()->is('dashboard') || request()->is('profile/*') ? 'active' : ''); ?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role-list')): ?>
                <li class="treeview">
                    <a href="<?php echo e(route('role.index')); ?>"
                        class="<?php echo e(request()->is('role') || request()->is('role/create') || request()->is('role/*/edit') ? 'active' : ''); ?>">
                        <i class="fa fa-tasks"></i> <span>Roles</span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-list')): ?>
                <li class="treeview">
                    <a href="<?php echo e(route('permission.index')); ?>"
                        class="<?php echo e(request()->is('permission') || request()->is('permission/create') || request()->is('permission/*/edit') ? 'active' : ''); ?>">
                        <i class="fa fa-lock"></i> <span>Permissions</span>
                    </a>
                </li>
            <?php endif; ?>
             <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('page-list')): ?>
                <li class="treeview">
                    <a href="<?php echo e(route('page.index')); ?>"
                        class="<?php echo e(request()->is('page') || request()->is('page/*') || request()->is('page_setting/*') ? 'active' : ''); ?>">
                        <i class="fa fa-cog"></i> <span>Settings</span>
                    </a>
                </li>
            <?php endif; ?>
            <li class="treeview <?php echo e(request()->is('variations') || request()->is('variations/create') || request()->is('variations/*/show') || request()->is('variations/*/edit') || request()->is('variations/*') || request()->is('product') || request()->is('product/create') || request()->is('product/*/edit') || request()->is('product/*') || request()->is('category') || request()->is('category/create') || request()->is('category/*/edit') ? 'active' : ''); ?>" style="height: auto;">
                <a href="#" class="<?php echo e(request()->is('variations') || request()->is('variations/create') || request()->is('variations/*/show') || request()->is('variations/*/edit') || request()->is('variations/*') || request()->is('product') || request()->is('product/create') || request()->is('product/*/edit') || request()->is('product/*') || request()->is('category') || request()->is('category/create') || request()->is('category/*/edit') ? 'active' : ''); ?>">

                    <i class="fa fa-th"></i>
                    <span>Product Variations</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" style="display: <?php echo e(request()->is('variations') || request()->is('variations/create') || request()->is('variations/*/show') || request()->is('variations/*/edit') || request()->is('variations/*') || request()->is('product') || request()->is('product/create') || request()->is('product/*/edit') || request()->is('product/*') || request()->is('category') || request()->is('category/create') || request()->is('category/*/edit') ? 'block' : 'none'); ?>;">

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category-list')): ?>
                        <li class="treeview">
                            <a href="<?php echo e(route('category.index')); ?>"
                                class="<?php echo e(request()->is('category') || request()->is('category/create') || request()->is('category/*/edit') ? 'active' : ''); ?>">
                                <i class="fa fa-code-fork"></i> <span>Categories</span>
                            </a>
                        </li>
                    <?php endif; ?> 
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('variations-list')): ?>
                        <li class="treeview">
                            <a href="<?php echo e(route('variations.index')); ?>" class="<?php echo e(request()->is('variations') || request()->is('variations/create') || request()->is('variations/*/edit') ? 'active' : ''); ?>">
                                <i class="fa fa-object-ungroup"></i> <span>Variations</span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product-list')): ?>
                    <li class="treeview">
                        <a href="<?php echo e(route('product.index')); ?>" class="<?php echo e(request()->is('product') || request()->is('product/create') || request()->is('product/*/edit') || request()->is('product/*') ? 'active' : ''); ?>">
                            <i class="fa fa-product-hunt"></i> <span>Products</span>
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>
            </li>
			<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('order-list')): ?>
            <li class="treeview">
                <a href="<?php echo e(route('order.index')); ?>" class="<?php echo e(request()->is('order') || request()->is('order/create') || request()->is('order/*/show') || request()->is('order/*/edit') || request()->is('order/*') ? 'active' : ''); ?>">
                    <i class="fa fa-shopping-bag"></i> <span>Orders</span>
                </a>
            </li>
            <?php endif; ?>
              
            
            
            <li class="treeview <?php echo e(request()->is('user') || request()->is('user/create') || request()->is('user/*/edit') || request()->is('user/*/show') ? 'active' : ''); ?>" style="height: auto;">
                <a href="#" class="<?php echo e(request()->is('user') || request()->is('user/create') || request()->is('user/*/edit') || request()->is('user/*/show') ? 'active' : ''); ?>">
                    <i class="fa fa-th"></i>
                    <span>All Registrations</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" style="display: <?php echo e(request()->is('user') || request()->is('user/create') || request()->is('user/*/edit') || request()->is('user/*/show') ? 'block' : 'none'); ?>;">

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user-list')): ?>
                        <li class="treeview">
                            <a href="<?php echo e(route('user.index', ['type' => 'company'])); ?>"
                                class="<?php echo e(request()->is('user') && request()->get('type') == 'company' ? 'active' : ''); ?>">
                                <i class="fa fa-building"></i> <span>Company</span>
                            </a>
                        </li>
                    <?php endif; ?> 
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user-list')): ?>
                        <li class="treeview">
                            <a href="<?php echo e(route('user.index', ['type' => 'individual'])); ?>"
                                class="<?php echo e(request()->is('user') && request()->get('type') == 'individual' ? 'active' : ''); ?>">
                                <i class="fa fa-user"></i> <span>Individual</span>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </li>
        




            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('coupon-list')): ?>
            <li class="treeview">
                <a href="<?php echo e(route('coupon.index')); ?>" class="<?php echo e(request()->is('coupon') || request()->is('coupon/create') || request()->is('coupon/*/edit') ? 'active' : ''); ?>">
                    <i class="fa fa-ticket"></i> <span>Coupons</span>
                </a>
            </li>
            <?php endif; ?>
            
            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('collaborator-list')): ?>
                <li class="treeview">
                    <a href="<?php echo e(route('collaborator.index')); ?>" class="<?php echo e(request()->is('collaborator') || request()->is('collaborator/create') || request()->is('collaborator/*/edit') ? 'active' : ''); ?>">
                        <i class="fa fa-handshake-o"></i> <span>Our Collaborators</span>
                    </a>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('testimonial-list')): ?>
                <li class="treeview">
                    <a href="<?php echo e(route('testimonial.index')); ?>" class="<?php echo e(request()->is('testimonial') || request()->is('testimonial/create') || request()->is('testimonial/*/edit') ? 'active' : ''); ?>">
                        <i class="fa fa-quote-right"></i> <span>Testimonial</span>
                    </a>
                </li>
            <?php endif; ?>
			<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('contactus-list')): ?>
                <li class="treeview">
                    <a href="<?php echo e(route('contactus.index')); ?>" class="<?php echo e(request()->is('contactus') || request()->is('contactus/create') || request()->is('contactus/*/show') || request()->is('contactus/*/edit') || request()->is('contactus/*') ? 'active' : ''); ?>">
                        <i class="fa fa-envelope"></i> <span>Contact Us</span>
                    </a>
                </li>
            <?php endif; ?>


            <li class="treeview <?php echo e(request()->is('careers') || request()->is('careers/create') || request()->is('careers/*/show') || request()->is('careers/*/edit') || request()->is('careers/*') || request()->is('career_category') || request()->is('career_category/create') || request()->is('career_category/*/edit') ? 'active' : ''); ?>" style="height: auto;">
                <a href="#" class="<?php echo e(request()->is('careers') || request()->is('careers/create') || request()->is('careers/*/show') || request()->is('careers/*/edit') || request()->is('careers/*') || request()->is('career_category') || request()->is('career_category/create') || request()->is('career_category/*/edit') ? 'active' : ''); ?>">

                    <i class="fa fa-th"></i>
                    <span>Career Applicarions</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" style="display: <?php echo e(request()->is('careers') || request()->is('careers/create') || request()->is('careers/*/show') || request()->is('careers/*/edit') || request()->is('careers/*') || request()->is('career_category') || request()->is('career_category/create') || request()->is('career_category/*/edit') ? 'block' : 'none'); ?>;">

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('career_category-list')): ?>
                        <li class="treeview">
                            <a href="<?php echo e(route('career_category.index')); ?>"
                                class="<?php echo e(request()->is('career_category') || request()->is('career_category/create') || request()->is('career_category/*/edit') ? 'active' : ''); ?>">
                                <i class="fa fa-code-fork"></i> <span>Career Categories</span>
                            </a>
                        </li>
                    <?php endif; ?> 
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('careers-list')): ?>
                        <li class="treeview">
                            <a href="<?php echo e(route('careers.index')); ?>" class="<?php echo e(request()->is('careers') || request()->is('careers/create') || request()->is('careers/*/show') || request()->is('careers/*/edit') || request()->is('careers/*') ? 'active' : ''); ?>">
                                <i class="fa fa-graduation-cap"></i> <span>Careers</span>
                            </a>
                        </li>
                    <?php endif; ?> 
                </ul>
            </li>
            <li class="treeview <?php echo e(request()->is('business_card_options') || request()->is('business_card_options/create') || request()->is('business_card_options/*/edit') || request()->is('business_card_options/*/show') || request()->is('business_card_categories') || request()->is('business_card_categories/create') || request()->is('business_card_categories/*/edit') || request()->is('business_card_categories/*/show') || request()->is('business_card_templates') || request()->is('business_card_templates/create') || request()->is('business_card_templates/*/edit') || request()->is('business_card_templates/*/show') || request()->is('business_card') || request()->is('business_card/create') || request()->is('business_card/*/edit') || request()->is('business_card/*/show') ? 'active' : ''); ?>" style="height: auto;">
                <a href="#" class="<?php echo e(request()->is('business_card_options') || request()->is('business_card_options/create') || request()->is('business_card_options/*/edit') || request()->is('business_card_options/*/show') || request()->is('business_card_categories') || request()->is('business_card_categories/create') || request()->is('business_card_categories/*/edit') || request()->is('business_card_categories/*/show') || request()->is('business_card_templates') || request()->is('business_card_templates/create') || request()->is('business_card_templates/*/edit') || request()->is('business_card_templates/*/show') || request()->is('business_card') || request()->is('business_card/create') || request()->is('business_card/*/edit') || request()->is('business_card/*/show') ? 'active' : ''); ?>">

                    <i class="fa fa-th"></i>
                    <span>Business Cards </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" style="display: <?php echo e(request()->is('business_card_options') || request()->is('business_card_options/create') || request()->is('business_card_options/*/edit') || request()->is('business_card_options/*/show') || request()->is('business_card_categories') || request()->is('business_card_categories/create') || request()->is('business_card_categories/*/edit') || request()->is('business_card_categories/*/show') || request()->is('business_card_templates') || request()->is('business_card_templates/create') || request()->is('business_card_templates/*/edit') || request()->is('business_card_templates/*/show') || request()->is('business_card') || request()->is('business_card/create') || request()->is('business_card/*/edit') || request()->is('business_card/*/show') ? 'block' : 'none'); ?>;">

                   
                    
                   
                     
                </ul>
            </li>

            <!-- Business Card Templates -->
            

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('newsletter-list')): ?>
                <li class="treeview">
                    <a href="<?php echo e(route('newsletter.index')); ?>" class="<?php echo e(request()->is('newsletter') || request()->is('newsletter/create') || request()->is('newsletter/*/show') || request()->is('newsletter/*/edit') || request()->is('newsletter/*') ? 'active' : ''); ?>">
                        <i class="fa fa-envelope"></i> <span>Subscribers</span>
                    </a>
                </li>
            <?php endif; ?>

            <li class="treeview">
                <a href="#" class="">
                    <i class="fa fa-gift"></i> <span>Corporate Solutions</span>
                </a>
            </li>
            
          
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('faq-list')): ?>
                <li class="treeview">
                    <a href="<?php echo e(route('faq.index')); ?>" class="<?php echo e(request()->is('faq') || request()->is('faq/create') || request()->is('faq/*/edit') ? 'active' : ''); ?>">
                        <i class="fa fa-question-circle"></i> <span>Faqs</span>
                    </a>
                </li>
            <?php endif; ?>

            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('why_choose_us-list')): ?>
            <li class="treeview">
                <a href="<?php echo e(route('why_choose_us.index')); ?>" class="<?php echo e(request()->is('why_choose_us') || request()->is('why_choose_us/create') || request()->is('why_choose_us/*/edit') ? 'active' : ''); ?>">
                    <i class="fa fa-question"></i> <span>Why Choose Us</span>
                </a>
            </li>
            <?php endif; ?>

            <li class="treeview">
                <a href="<?php echo e(route('mts-dashboard.index')); ?>" class="<?php echo e(request()->is('mts-dashboard*') ? 'active' : ''); ?>">
                    <i class="fa fa-gift"></i> <span>MTS Dashboard</span>
                </a>
            </li>

           






            

            
        </ul>
    </section>
</aside>
<?php /**PATH C:\xampp8.2\htdocs\never-forget\resources\views/layouts/admin/sidebar.blade.php ENDPATH**/ ?>