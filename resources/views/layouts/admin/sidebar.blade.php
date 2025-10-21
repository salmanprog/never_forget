<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="{{ route('dashboard') }}"
                    class="{{ request()->is('dashboard') || request()->is('profile/*') ? 'active' : '' }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            @can('role-list')
                <li class="treeview">
                    <a href="{{ route('role.index') }}"
                        class="{{ request()->is('role') || request()->is('role/create') || request()->is('role/*/edit') ? 'active' : '' }}">
                        <i class="fa fa-tasks"></i> <span>Roles</span>
                    </a>
                </li>
            @endcan

            @can('permission-list')
                <li class="treeview">
                    <a href="{{ route('permission.index') }}"
                        class="{{ request()->is('permission') || request()->is('permission/create') || request()->is('permission/*/edit') ? 'active' : '' }}">
                        <i class="fa fa-lock"></i> <span>Permissions</span>
                    </a>
                </li>
            @endcan
             @can('page-list')
                <li class="treeview">
                    <a href="{{ route('page.index') }}"
                        class="{{ request()->is('page') || request()->is('page/*') || request()->is('page_setting/*') ? 'active' : '' }}">
                        <i class="fa fa-cog"></i> <span>Settings</span>
                    </a>
                </li>
            @endcan
            <li class="treeview {{ request()->is('variations') || request()->is('variations/create') || request()->is('variations/*/show') || request()->is('variations/*/edit') || request()->is('variations/*') || request()->is('product') || request()->is('product/create') || request()->is('product/*/edit') || request()->is('product/*') || request()->is('category') || request()->is('category/create') || request()->is('category/*/edit') ? 'active' : '' }}" style="height: auto;">
                <a href="#" class="{{ request()->is('variations') || request()->is('variations/create') || request()->is('variations/*/show') || request()->is('variations/*/edit') || request()->is('variations/*') || request()->is('product') || request()->is('product/create') || request()->is('product/*/edit') || request()->is('product/*') || request()->is('category') || request()->is('category/create') || request()->is('category/*/edit') ? 'active' : '' }}">

                    <i class="fa fa-th"></i>
                    <span>Product Variations</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" style="display: {{ request()->is('variations') || request()->is('variations/create') || request()->is('variations/*/show') || request()->is('variations/*/edit') || request()->is('variations/*') || request()->is('product') || request()->is('product/create') || request()->is('product/*/edit') || request()->is('product/*') || request()->is('category') || request()->is('category/create') || request()->is('category/*/edit') ? 'block' : 'none' }};">

                    @can('category-list')
                        <li class="treeview">
                            <a href="{{ route('category.index') }}"
                                class="{{ request()->is('category') || request()->is('category/create') || request()->is('category/*/edit') ? 'active' : '' }}">
                                <i class="fa fa-code-fork"></i> <span>Categories</span>
                            </a>
                        </li>
                    @endcan 
                    @can('variations-list')
                        <li class="treeview">
                            <a href="{{ route('variations.index') }}" class="{{ request()->is('variations') || request()->is('variations/create') || request()->is('variations/*/edit') ? 'active' : '' }}">
                                <i class="fa fa-object-ungroup"></i> <span>Variations</span>
                            </a>
                        </li>
                    @endcan
                    @can('product-list')
                    <li class="treeview">
                        <a href="{{ route('product.index') }}" class="{{ request()->is('product') || request()->is('product/create') || request()->is('product/*/edit') || request()->is('product/*') ? 'active' : '' }}">
                            <i class="fa fa-product-hunt"></i> <span>Products</span>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
			@can('order-list')
            <li class="treeview">
                <a href="{{ route('order.index') }}" class="{{ request()->is('order') || request()->is('order/create') || request()->is('order/*/show') || request()->is('order/*/edit') || request()->is('order/*') ? 'active' : '' }}">
                    <i class="fa fa-shopping-bag"></i> <span>Orders</span>
                </a>
            </li>
            @endcan
              
            
            {{-- Super Admin Menu --}}
            <li class="treeview {{ request()->is('user') || request()->is('user/create') || request()->is('user/*/edit') || request()->is('user/*/show') ? 'active' : '' }}" style="height: auto;">
                <a href="#" class="{{ request()->is('user') || request()->is('user/create') || request()->is('user/*/edit') || request()->is('user/*/show') ? 'active' : '' }}">
                    <i class="fa fa-th"></i>
                    <span>All Registrations</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" style="display: {{ request()->is('user') || request()->is('user/create') || request()->is('user/*/edit') || request()->is('user/*/show') ? 'block' : 'none' }};">

                    @can('user-list')
                        <li class="treeview">
                            <a href="{{ route('user.index', ['type' => 'company']) }}"
                                class="{{ request()->is('user') && request()->get('type') == 'company' ? 'active' : '' }}">
                                <i class="fa fa-building"></i> <span>Company</span>
                            </a>
                        </li>
                    @endcan 
                    @can('user-list')
                        <li class="treeview">
                            <a href="{{ route('user.index', ['type' => 'individual']) }}"
                                class="{{ request()->is('user') && request()->get('type') == 'individual' ? 'active' : '' }}">
                                <i class="fa fa-user"></i> <span>Individual</span>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        




            @can('coupon-list')
            <li class="treeview">
                <a href="{{ route('coupon.index') }}" class="{{ request()->is('coupon') || request()->is('coupon/create') || request()->is('coupon/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-ticket"></i> <span>Coupons</span>
                </a>
            </li>
            @endcan
            {{-- @can('about_us-list')
            <li class="treeview">
                <a href="{{ route('about_us.index') }}" class="{{ request()->is('about_us') || request()->is('about_us/create') || request()->is('about_us/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-sticky-note"></i> <span>About Us</span>
                </a>
            </li>
            @endcan --}}
            
            @can('collaborator-list')
                <li class="treeview">
                    <a href="{{ route('collaborator.index') }}" class="{{ request()->is('collaborator') || request()->is('collaborator/create') || request()->is('collaborator/*/edit') ? 'active' : '' }}">
                        <i class="fa fa-handshake-o"></i> <span>Our Collaborators</span>
                    </a>
                </li>
            @endcan
            @can('testimonial-list')
                <li class="treeview">
                    <a href="{{ route('testimonial.index') }}" class="{{ request()->is('testimonial') || request()->is('testimonial/create') || request()->is('testimonial/*/edit') ? 'active' : '' }}">
                        <i class="fa fa-quote-right"></i> <span>Testimonial</span>
                    </a>
                </li>
            @endcan
			@can('contactus-list')
                <li class="treeview">
                    <a href="{{ route('contactus.index') }}" class="{{ request()->is('contactus') || request()->is('contactus/create') || request()->is('contactus/*/show') || request()->is('contactus/*/edit') || request()->is('contactus/*') ? 'active' : '' }}">
                        <i class="fa fa-envelope"></i> <span>Contact Us</span>
                    </a>
                </li>
            @endcan


            <li class="treeview {{ request()->is('careers') || request()->is('careers/create') || request()->is('careers/*/show') || request()->is('careers/*/edit') || request()->is('careers/*') || request()->is('career_category') || request()->is('career_category/create') || request()->is('career_category/*/edit') ? 'active' : '' }}" style="height: auto;">
                <a href="#" class="{{ request()->is('careers') || request()->is('careers/create') || request()->is('careers/*/show') || request()->is('careers/*/edit') || request()->is('careers/*') || request()->is('career_category') || request()->is('career_category/create') || request()->is('career_category/*/edit') ? 'active' : '' }}">

                    <i class="fa fa-th"></i>
                    <span>Career Applicarions</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" style="display: {{ request()->is('careers') || request()->is('careers/create') || request()->is('careers/*/show') || request()->is('careers/*/edit') || request()->is('careers/*') || request()->is('career_category') || request()->is('career_category/create') || request()->is('career_category/*/edit') ? 'block' : 'none' }};">

                    @can('career_category-list')
                        <li class="treeview">
                            <a href="{{ route('career_category.index') }}"
                                class="{{ request()->is('career_category') || request()->is('career_category/create') || request()->is('career_category/*/edit') ? 'active' : '' }}">
                                <i class="fa fa-code-fork"></i> <span>Career Categories</span>
                            </a>
                        </li>
                    @endcan 
                    @can('careers-list')
                        <li class="treeview">
                            <a href="{{ route('careers.index') }}" class="{{ request()->is('careers') || request()->is('careers/create') || request()->is('careers/*/show') || request()->is('careers/*/edit') || request()->is('careers/*') ? 'active' : '' }}">
                                <i class="fa fa-graduation-cap"></i> <span>Careers</span>
                            </a>
                        </li>
                    @endcan 
                </ul>
            </li>
            <li class="treeview {{ request()->is('business_card_options') || request()->is('business_card_options/create') || request()->is('business_card_options/*/edit') || request()->is('business_card_options/*/show') || request()->is('business_card_categories') || request()->is('business_card_categories/create') || request()->is('business_card_categories/*/edit') || request()->is('business_card_categories/*/show') || request()->is('business_card_templates') || request()->is('business_card_templates/create') || request()->is('business_card_templates/*/edit') || request()->is('business_card_templates/*/show') || request()->is('business_card') || request()->is('business_card/create') || request()->is('business_card/*/edit') || request()->is('business_card/*/show') ? 'active' : '' }}" style="height: auto;">
                <a href="#" class="{{ request()->is('business_card_options') || request()->is('business_card_options/create') || request()->is('business_card_options/*/edit') || request()->is('business_card_options/*/show') || request()->is('business_card_categories') || request()->is('business_card_categories/create') || request()->is('business_card_categories/*/edit') || request()->is('business_card_categories/*/show') || request()->is('business_card_templates') || request()->is('business_card_templates/create') || request()->is('business_card_templates/*/edit') || request()->is('business_card_templates/*/show') || request()->is('business_card') || request()->is('business_card/create') || request()->is('business_card/*/edit') || request()->is('business_card/*/show') ? 'active' : '' }}">

                    <i class="fa fa-th"></i>
                    <span>Business Cards </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" style="display: {{ request()->is('business_card_options') || request()->is('business_card_options/create') || request()->is('business_card_options/*/edit') || request()->is('business_card_options/*/show') || request()->is('business_card_categories') || request()->is('business_card_categories/create') || request()->is('business_card_categories/*/edit') || request()->is('business_card_categories/*/show') || request()->is('business_card_templates') || request()->is('business_card_templates/create') || request()->is('business_card_templates/*/edit') || request()->is('business_card_templates/*/show') || request()->is('business_card') || request()->is('business_card/create') || request()->is('business_card/*/edit') || request()->is('business_card/*/show') ? 'block' : 'none' }};">

                   {{--  @can('business_card_options-list')
                        <li class="treeview">
                            <a href="{{ route('business_card_options.index') }}"
                                class="{{ request()->is('business_card_options') || request()->is('business_card_options/create') || request()->is('business_card_options/*/edit') || request()->is('business_card_options/*/show') ? 'active' : '' }}">
                                <i class="fa fa-code-fork"></i> <span>Business Card Options</span>
                            </a>
                        </li>
                    @endcan  --}}
                    {{-- @can('business_card_categories-list')
                        <li class="treeview">
                            <a href="{{ route('business_card_categories.index') }}" class="{{ request()->is('business_card_categories') || request()->is('business_card_categories/create') || request()->is('business_card_categories/*/edit') || request()->is('business_card_categories/*/show') || request()->is('business_card_categories/*/show') ? 'active' : '' }}">
                                <i class="fa fa-graduation-cap"></i> <span>Business Card Categories</span>
                            </a>
                        </li>
                    @endcan  --}}
                   {{--  @can('business_card_templates-list')
                        <li class="treeview">
                            <a href="{{ route('business_card_templates.index') }}" class="{{ request()->is('business_card_templates') || request()->is('business_card_templates/create') || request()->is('business_card_templates/*/edit') || request()->is('business_card_templates/*/show') || request()->is('business_card_templates/*/show') ? 'active' : '' }}">
                                <i class="fa fa-graduation-cap"></i> <span>Business Card Templates</span>
                            </a>
                        </li>
                    @endcan  --}}
                    {{-- @can('business_cards-list')
                        <li class="treeview">
                            <a href="{{ route('business_cards.index') }}" class="{{ request()->is('business_cards') || request()->is('business_cards/create') || request()->is('business_cards/*/edit') || request()->is('business_cards/*/show') || request()->is('business_cards/*/show') ? 'active' : '' }}">
                                <i class="fa fa-graduation-cap"></i> <span>Business Card</span>
                            </a>
                        </li>
                    @endcan --}} 
                </ul>
            </li>

            <!-- Business Card Templates -->
            {{-- <li class="treeview {{ request()->is('business_card_templates') || request()->is('business_card_templates/create') || request()->is('business_card_templates/*/edit') || request()->is('business_card_templates/*/show') ? 'active' : '' }}">
                <a href="{{ route('business_card_templates.index') }}" 
                   class="{{ request()->is('business_card_templates') || request()->is('business_card_templates/create') || request()->is('business_card_templates/*/edit') || request()->is('business_card_templates/*/show') ? 'active' : '' }}">
                    <i class="fa fa-id-card"></i> <span>Business Card Templates</span>
                </a>
            </li> --}}

            @can('newsletter-list')
                <li class="treeview">
                    <a href="{{ route('newsletter.index') }}" class="{{ request()->is('newsletter') || request()->is('newsletter/create') || request()->is('newsletter/*/show') || request()->is('newsletter/*/edit') || request()->is('newsletter/*') ? 'active' : '' }}">
                        <i class="fa fa-envelope"></i> <span>Subscribers</span>
                    </a>
                </li>
            @endcan

            <li class="treeview">
                <a href="#" class="">
                    <i class="fa fa-gift"></i> <span>Corporate Solutions</span>
                </a>
            </li>
            
          
            @can('faq-list')
                <li class="treeview">
                    <a href="{{ route('faq.index') }}" class="{{ request()->is('faq') || request()->is('faq/create') || request()->is('faq/*/edit') ? 'active' : '' }}">
                        <i class="fa fa-question-circle"></i> <span>Faqs</span>
                    </a>
                </li>
            @endcan

            
            @can('why_choose_us-list')
            <li class="treeview">
                <a href="{{ route('why_choose_us.index') }}" class="{{ request()->is('why_choose_us') || request()->is('why_choose_us/create') || request()->is('why_choose_us/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-question"></i> <span>Why Choose Us</span>
                </a>
            </li>
            @endcan

            <li class="treeview">
                <a href="{{ route('mts-dashboard.index') }}" class="{{ request()->is('mts-dashboard*') ? 'active' : '' }}">
                    <i class="fa fa-gift"></i> <span>MTS Dashboard</span>
                </a>
            </li>

           {{-- @can('slider-list')
            <li class="treeview">
                <a href="{{ route('slider.index') }}" class="{{ request()->is('slider') || request()->is('slider/create') || request()->is('slider/*/edit') || request()->is('slider/*') ? 'active' : '' }}">
                    <i class="fa fa-sliders"></i> <span>Sliders</span>
                </a>
            </li>
            @endcan
            @can('how_to_play-list')
            <li class="treeview">
                <a href="{{ route('how_to_play.index') }}" class="{{ request()->is('how_to_play') || request()->is('how_to_play/create') || request()->is('how_to_play/*/edit') || request()->is('how_to_play/*') ? 'active' : '' }}">
                    <i class="fa fa-quote-right"></i> <span>How To Play</span>
                </a>
            </li>
            @endcan
            @can('winner-list')
            <li class="treeview">
                <a href="{{ route('winner.index') }}" class="{{ request()->is('winner') || request()->is('winner/create') || request()->is('winner/*/edit') || request()->is('winner/*') ? 'active' : '' }}">
                    <i class="fa fa-trophy"></i> <span>Winners</span>
                </a>
            </li>
            @endcan --}}






            {{--    @can('booking_type-list')
            <li class="treeview">
                <a href="{{ route('booking_type.index') }}" class="{{ request()->is('booking_type') || request()->is('booking_type/*')? 'active' : '' }}">
                    <i class="fa fa-book"></i> <span>Booking Types</span>
                </a>
            </li>
            @endcan
            @can('course-list')
            <li class="treeview">
                <a href="{{ route('course.index') }}" class="{{ request()->is('course') || request()->is('course/create') || request()->is('course/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-certificate"></i> <span>Courses</span>
                </a>
            </li>
            @endcan
            @can('service-list')
            <li class="treeview">
                <a href="{{ route('service.index') }}" class="{{ request()->is('service') || request()->is('service/create') || request()->is('service/*/edit') || request()->is('service/*') ? 'active' : '' }}">
                    <i class="fa fa-wrench"></i> <span>Services</span>
                </a>
            </li>
            @endcan
            @can('slider-list')
            <li class="treeview">
                <a href="{{ route('slider.index') }}" class="{{ request()->is('slider') || request()->is('slider/create') || request()->is('slider/*/edit') || request()->is('slider/*') ? 'active' : '' }}">
                    <i class="fa fa-sliders"></i> <span>Sliders</span>
                </a>
            </li>
            @endcan --}}

            {{--
            @can('advantage-list')
            <li class="treeview">
                <a href="{{ route('advantage.index') }}" class="{{ request()->is('advantage') || request()->is('advantage/create') || request()->is('advantage/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-tag"></i> <span>Mock Advantage</span>
                </a>
            </li>
            @endcan
            @can('how_work-list')
            <li class="treeview">
                <a href="{{ route('how_work.index') }}" class="{{ request()->is('how_work') || request()->is('how_work/create') || request()->is('how_work/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-spinner"></i> <span>How Works</span>
                </a>
            </li>
            @endcan
            @can('package-list')
            <li class="treeview">
                <a href="{{ route('package.index') }}" class="{{ request()->is('package') || request()->is('package/create') || request()->is('package/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-gift"></i> <span>Packages</span>
                </a>
            </li>
            @endcan
            @can('team-list')
            <li class="treeview">
                <a href="{{ route('team.index') }}" class="{{ request()->is('team') || request()->is('team/create') || request()->is('team/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-user-plus"></i> <span>Team</span>
                </a>
            </li>
            @endcan
            
            @can('social media-list')
            <li class="treeview">
                <a href="{{ route('social_media.index') }}" class="{{ request()->is('social_media') || request()->is('social_media/create') || request()->is('social_media/edit/*') ? 'active' : '' }}">
                    <i class="fa fa-address-book"></i> <span>Social Media</span>
                </a>
            </li>
            @endcan --}}
        </ul>
    </section>
</aside>
