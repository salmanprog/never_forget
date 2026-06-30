<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu admin">
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
           
            <li class="treeview {{ request()->is('page') ||request()->is('page/*') ||request()->is('page_setting/*') ||request()->is('variations') ||request()->is('variations/*') ||request()->is('product') ||request()->is('product/*') ||request()->is('category') ||request()->is('category/*') ||request()->is('order') ||request()->is('order/*') ||request()->is('coupon') ||request()->is('coupon/*') ||request()->is('collaborator') ||request()->is('collaborator/*') ||request()->is('testimonial') ||request()->is('testimonial/*') ||request()->is('careers') ||request()->is('careers/*') ||request()->is('career_category') ||request()->is('career_category/*') ||request()->is('business_card_options') ||request()->is('business_card_options/*') ||request()->is('business_card_categories') ||request()->is('business_card_categories/*') ||request()->is('business_card_templates') ||request()->is('business_card_templates/*') ||request()->is('business_card') ||request()->is('business_card/*') ||request()->is('newsletter') ||request()->is('newsletter/*') ||request()->is('faq') ||request()->is('faq/*') ||request()->is('why_choose_us') ||request()->is('why_choose_us/*') ||request()->is('balloons_category*') ||request()->is('perfect_gift_category*') ||request()->is('e_card_category*') ||request()->is('tango_category*')? 'active': '' }}"
                style="height: auto;">
                <a href="#"
                    class="{{ request()->is('page') ||request()->is('page/*') ||request()->is('page_setting/*') ||request()->is('variations') ||request()->is('variations/*') ||request()->is('product') ||request()->is('product/*') ||request()->is('category') ||request()->is('category/*') ||request()->is('order') ||request()->is('order/*') ||request()->is('coupon') ||request()->is('coupon/*') ||request()->is('collaborator') ||request()->is('collaborator/*') ||request()->is('testimonial') ||request()->is('testimonial/*') ||request()->is('careers') ||request()->is('careers/*') ||request()->is('career_category') ||request()->is('career_category/*') ||request()->is('business_card_options') ||request()->is('business_card_options/*') ||request()->is('business_card_categories') ||request()->is('business_card_categories/*') ||request()->is('business_card_templates') ||request()->is('business_card_templates/*') ||request()->is('business_card') ||request()->is('business_card/*') ||request()->is('newsletter') ||request()->is('newsletter/*') ||request()->is('faq') ||request()->is('faq/*') ||request()->is('why_choose_us') ||request()->is('why_choose_us/*') ||request()->is('balloons_category*') ||request()->is('perfect_gift_category*') ||request()->is('e_card_category*') ||request()->is('tango_category*') ? 'active': '' }}">
                    <i class="fa fa-cog"></i>
                    <span>Website Settings</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu"
                    style="display: {{ request()->is('page') ||request()->is('page/*') ||request()->is('page_setting/*') ||request()->is('variations') ||request()->is('variations/*') ||request()->is('product') ||request()->is('product/*') ||request()->is('category') ||request()->is('category/*') ||request()->is('order') ||request()->is('order/*') ||request()->is('coupon') ||request()->is('coupon/*') ||request()->is('collaborator') ||request()->is('collaborator/*') ||request()->is('testimonial') ||request()->is('testimonial/*') ||request()->is('careers') ||request()->is('careers/*') ||request()->is('career_category') ||request()->is('career_category/*') ||request()->is('business_card_options') ||request()->is('business_card_options/*') ||request()->is('business_card_categories') ||request()->is('business_card_categories/*') ||request()->is('business_card_templates') ||request()->is('business_card_templates/*') ||request()->is('business_card') ||request()->is('business_card/*') ||request()->is('newsletter') ||request()->is('newsletter/*') ||request()->is('faq') ||request()->is('faq/*') ||request()->is('why_choose_us') ||request()->is('why_choose_us/*') ||request()->is('balloons_category*') ||request()->is('perfect_gift_category*') ||request()->is('e_card_category*') ||request()->is('tango_category*') ? 'block': 'none' }};">
                    @can('page-list')
                        <li class="treeview">
                            <a href="{{ route('page.index') }}"
                                class="{{ request()->is('page') || request()->is('page/*') || request()->is('page_setting/*') ? 'active' : '' }}">
                                <i class="fa fa-cog"></i> <span>Settings</span>
                            </a>
                        </li>
                    @endcan
                    <li class="treeview">
                        <a href="{{ route('admin.package_setting.index') }}"
                            class="{{ request()->is('package-settings') ? 'active' : '' }}">
                            <i class="fa fa-box-open"></i> <span>Package / Upgrade</span>
                        </a>
                    </li>
                    <li class="treeview {{ request()->is('variations') || request()->is('variations/create') || request()->is('variations/*/show') || request()->is('variations/*/edit') || request()->is('variations/*') || request()->is('product') || request()->is('product/create') || request()->is('product/*/edit') || request()->is('product/*') || request()->is('category') || request()->is('category/create') || request()->is('category/*/edit') ? 'active' : '' }}"
                        style="height: auto;">
                        <a href="#"
                            class="{{ request()->is('variations') || request()->is('variations/create') || request()->is('variations/*/show') || request()->is('variations/*/edit') || request()->is('variations/*') || request()->is('product') || request()->is('product/create') || request()->is('product/*/edit') || request()->is('product/*') || request()->is('category') || request()->is('category/create') || request()->is('category/*/edit') ? 'active' : '' }}">

                            <i class="fa fa-th"></i>
                            <span>Product Variations</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu"
                            style="display: {{ request()->is('variations') || request()->is('variations/create') || request()->is('variations/*/show') || request()->is('variations/*/edit') || request()->is('variations/*') || request()->is('product') || request()->is('product/create') || request()->is('product/*/edit') || request()->is('product/*') || request()->is('category') || request()->is('category/create') || request()->is('category/*/edit') ? 'block' : 'none' }};">

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
                                    <a href="{{ route('variations.index') }}"
                                        class="{{ request()->is('variations') || request()->is('variations/create') || request()->is('variations/*/edit') ? 'active' : '' }}">
                                        <i class="fa fa-object-ungroup"></i> <span>Variations</span>
                                    </a>
                                </li>
                            @endcan
                            @can('product-list')
                                <li class="treeview">
                                    <a href="{{ route('product.index') }}"
                                        class="{{ request()->is('product') || request()->is('product/create') || request()->is('product/*/edit') || request()->is('product/*') ? 'active' : '' }}">
                                        <i class="fa fa-product-hunt"></i> <span>Products</span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                    @can('order-list')
                        <li class="treeview">
                            <a href="{{ route('order.index') }}"
                                class="{{ request()->is('order') || request()->is('order/create') || request()->is('order/*/show') || request()->is('order/*/edit') || request()->is('order/*') ? 'active' : '' }}">
                                <i class="fa fa-shopping-bag"></i> <span>Orders</span>
                            </a>
                        </li>
                    @endcan


                    {{-- Super Admin Menu --}}
                    





                    @can('coupon-list')
                        <li class="treeview">
                            <a href="{{ route('coupon.index') }}"
                                class="{{ request()->is('coupon') || request()->is('coupon/create') || request()->is('coupon/*/edit') ? 'active' : '' }}">
                                <i class="fa fa-ticket"></i> <span>Coupons</span>
                            </a>
                        </li>
                    @endcan
                    @can('blog-list')
                        <li class="treeview">
                            <a href="{{ route('blog.index') }}"
                                class="{{ request()->is('blog') || request()->is('blog/create') || request()->is('blog/*/edit') ? 'active' : '' }}">
                                <i class="fa fa-newspaper-o"></i> <span>Blogs</span>
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
                            <a href="{{ route('collaborator.index') }}"
                                class="{{ request()->is('collaborator') || request()->is('collaborator/create') || request()->is('collaborator/*/edit') ? 'active' : '' }}">
                                <i class="fa fa-handshake-o"></i> <span>Our Collaborators</span>
                            </a>
                        </li>
                    @endcan
                    @can('testimonial-list')
                        <li class="treeview">
                            <a href="{{ route('testimonial.index') }}"
                                class="{{ request()->is('testimonial') || request()->is('testimonial/create') || request()->is('testimonial/*/edit') ? 'active' : '' }}">
                                <i class="fa fa-quote-right"></i> <span>Testimonial</span>
                            </a>
                        </li>
                    @endcan



                    <li class="treeview {{ request()->is('careers') || request()->is('careers/create') || request()->is('careers/*/show') || request()->is('careers/*/edit') || request()->is('careers/*') || request()->is('career_category') || request()->is('career_category/create') || request()->is('career_category/*/edit') ? 'active' : '' }}"
                        style="height: auto;">
                        <a href="#"
                            class="{{ request()->is('careers') || request()->is('careers/create') || request()->is('careers/*/show') || request()->is('careers/*/edit') || request()->is('careers/*') || request()->is('career_category') || request()->is('career_category/create') || request()->is('career_category/*/edit') ? 'active' : '' }}">

                            <i class="fa fa-th"></i>
                            <span>Career Applicarions</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu"
                            style="display: {{ request()->is('careers') || request()->is('careers/create') || request()->is('careers/*/show') || request()->is('careers/*/edit') || request()->is('careers/*') || request()->is('career_category') || request()->is('career_category/create') || request()->is('career_category/*/edit') ? 'block' : 'none' }};">

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
                                    <a href="{{ route('careers.index') }}"
                                        class="{{ request()->is('careers') || request()->is('careers/create') || request()->is('careers/*/show') || request()->is('careers/*/edit') || request()->is('careers/*') ? 'active' : '' }}">
                                        <i class="fa fa-graduation-cap"></i> <span>Careers</span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                    @can('product-list')
                    <li class="treeview {{ request()->is('balloons_category*') || request()->is('perfect_gift_category*') || request()->is('e_card_category*') || request()->is('tango_category*') ? 'active' : '' }}"
                        style="height: auto;">
                        <a href="#"
                            class="{{ request()->is('balloons_category*') || request()->is('perfect_gift_category*') || request()->is('e_card_category*') || request()->is('tango_category*') ? 'active' : '' }}">
                            <i class="fa fa-external-link"></i>
                            <span>Outsource Products</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu"
                            style="display: {{ request()->is('balloons_category*') || request()->is('perfect_gift_category*') || request()->is('e_card_category*') || request()->is('tango_category*') ? 'block' : 'none' }};">
                            <li class="treeview">
                                <a href="{{ route('balloons_category.index') }}"
                                    class="{{ request()->is('balloons_category*') ? 'active' : '' }}">
                                    <i class="fa fa-circle-o"></i> <span>Balloons</span>
                                </a>
                            </li>
                            <li class="treeview">
                                <a href="{{ route('perfect_gift_category.index') }}"
                                    class="{{ request()->is('perfect_gift_category*') ? 'active' : '' }}">
                                    <i class="fa fa-circle-o"></i> <span>Perfect Gifts</span>
                                </a>
                            </li>
                            <li class="treeview">
                                <a href="{{ route('e_card_category.index') }}"
                                    class="{{ request()->is('e_card_category*') ? 'active' : '' }}">
                                    <i class="fa fa-circle-o"></i> <span>E Cards</span>
                                </a>
                            </li>
                            <li class="treeview">
                                <a href="{{ route('tango_category.index') }}"
                                    class="{{ request()->is('tango_category*') ? 'active' : '' }}">
                                    <i class="fa fa-circle-o"></i> <span>Tango</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endcan
                    <!-- Business Card Templates -->
                    {{-- <li class="treeview {{ request()->is('business_card_templates') || request()->is('business_card_templates/create') || request()->is('business_card_templates/*/edit') || request()->is('business_card_templates/*/show') ? 'active' : '' }}">
                <a href="{{ route('business_card_templates.index') }}" 
                   class="{{ request()->is('business_card_templates') || request()->is('business_card_templates/create') || request()->is('business_card_templates/*/edit') || request()->is('business_card_templates/*/show') ? 'active' : '' }}">
                    <i class="fa fa-id-card"></i> <span>Business Card Templates</span>
                </a>
            </li> --}}

                    @can('newsletter-list')
                        <li class="treeview">
                            <a href="{{ route('newsletter.index') }}"
                                class="{{ request()->is('newsletter') || request()->is('newsletter/create') || request()->is('newsletter/*/show') || request()->is('newsletter/*/edit') || request()->is('newsletter/*') ? 'active' : '' }}">
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
                            <a href="{{ route('faq.index') }}"
                                class="{{ request()->is('faq') || request()->is('faq/create') || request()->is('faq/*/edit') ? 'active' : '' }}">
                                <i class="fa fa-question-circle"></i> <span>Faqs</span>
                            </a>
                        </li>
                    @endcan


                    @can('why_choose_us-list')
                        <li class="treeview">
                            <a href="{{ route('why_choose_us.index') }}"
                                class="{{ request()->is('why_choose_us') || request()->is('why_choose_us/create') || request()->is('why_choose_us/*/edit') ? 'active' : '' }}">
                                <i class="fa fa-question"></i> <span>Why Choose Us</span>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>

            <li class="treeview {{  request()->is('contactus') || request()->is('contactus/create') || request()->is('contactus/*/show') || request()->is('contactus/*/edit') || request()->is('contactus/*') ||request()->is('user') ||request()->is('user/*') || request()->is('mts-dashboard*') || request()->is('templates') || request()->is('templates/*') || request()->is('email-templates') || request()->is('email-templates/*') || request()->is('text-message-templates') || request()->is('text-message-templates/*') || request()->is('phone-script-templates') || request()->is('phone-script-templates/*') || request()->is('balloon_enquiry') || request()->is('balloon_enquiry/create') || request()->is('balloon_enquiry/*/show') || request()->is('balloon_enquiry/*/edit') || request()->is('balloon_enquiry/*') || request()->is('perfect_gift_enquiry') || request()->is('perfect_gift_enquiry/*') || request()->is('e_card_enquiry') || request()->is('e_card_enquiry/*') || request()->is('greetings_appreciation_enquiry') || request()->is('greetings_appreciation_enquiry/*') || request()->is('enquires/journey_expert/*') || request()->is('enquires/quality_logo') || request()->is('business-card-orders') ? 'active': ''}}">
                <a href="" class="{{  request()->is('contactus') || request()->is('contactus/create') || request()->is('contactus/*/show') || request()->is('contactus/*/edit') || request()->is('contactus/*') ||request()->is('user') ||request()->is('user/*') || request()->is('mts-dashboard*') || request()->is('templates') || request()->is('templates/*') || request()->is('email-templates') || request()->is('email-templates/*') || request()->is('text-message-templates') || request()->is('text-message-templates/*') || request()->is('phone-script-templates') || request()->is('phone-script-templates/*') || request()->is('balloon_enquiry') || request()->is('balloon_enquiry/create') || request()->is('balloon_enquiry/*/show') || request()->is('balloon_enquiry/*/edit') || request()->is('balloon_enquiry/*') || request()->is('perfect_gift_enquiry') || request()->is('perfect_gift_enquiry/*') || request()->is('e_card_enquiry') || request()->is('e_card_enquiry/*') || request()->is('greetings_appreciation_enquiry') || request()->is('greetings_appreciation_enquiry/*') || request()->is('enquires/journey_expert/*') || request()->is('enquires/quality_logo') || request()->is('business-card-orders') ? 'active': '' }}">
                    <i class="fa fa-gift"></i> <span>MTS Dashboard</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu" style="display: {{ request()->is('mts-dashboard*') || request()->is('templates') || request()->is('templates/*') || request()->is('email-templates') || request()->is('email-templates/*') || request()->is('text-message-templates') || request()->is('text-message-templates/*') || request()->is('phone-script-templates') || request()->is('phone-script-templates/*') || request()->is('contactus') || request()->is('contactus/create') || request()->is('contactus/*/show') || request()->is('contactus/*/edit') || request()->is('contactus/*') ||request()->is('user') ||request()->is('user/*') || request()->is('balloon_enquiry') || request()->is('balloon_enquiry/create') || request()->is('balloon_enquiry/*/edit') || request()->is('balloon_enquiry/*/show') || request()->is('perfect_gift_enquiry') || request()->is('perfect_gift_enquiry/*') || request()->is('e_card_enquiry') || request()->is('e_card_enquiry/*') || request()->is('greetings_appreciation_enquiry') || request()->is('greetings_appreciation_enquiry/*') || request()->is('enquires/journey_expert') || request()->is('enquires/quality_logo') || request()->is('business-card-orders')  ? 'block' : 'none' }};">
                     <li class="treeview {{ request()->is('user') || request()->is('user/create') || request()->is('user/*/edit') || request()->is('user/*/show')  ||request()->is('user') ||request()->is('user/*')  ? 'active' : '' }}"
                        style="height: auto;">
                        <a href="#"
                            class="{{ request()->is('user') || request()->is('user/create') || request()->is('user/*/edit') || request()->is('user/*/show') ? 'active' : '' }}">
                            <i class="fa fa-th"></i>
                            <span>All Registrations</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu"
                            style="display: {{ request()->is('user') || request()->is('user/create') || request()->is('user/*/edit') || request()->is('user/*/show')  ? 'block' : 'none' }};">

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
                            @can('user-list')
                                <li class="treeview">
                                    <a href="{{ route('user.index', ['type' => 'salesperson']) }}"
                                        class="{{ request()->is('user') && request()->get('type') == 'salesperson' ? 'active' : '' }}">
                                        <i class="fa fa-user"></i> <span>Sales Person</span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                    @can('contactus-list')
                   
                        <li class="treeview">
                            <a href="{{ route('mts-dashboard.index') . '?search=&account_type=All&status=All' }}"
                                class="{{ request()->is('mts-dashboard*') ? 'active' : '' }}">
                                <i class="fa fa-envelope"></i> <span>Resources List</span>
                            </a>
                        </li>
                        {{-- <li class="treeview">
                            <a href="{{ route('sms-replies') }}"
                                class="{{ request()->is('sms-replies') ? 'active' : '' }}">
                                <i class="fa fa-comment"></i> <span>SMS Replies</span>
                            </a>
                        </li> --}}
                        @if(Auth::user()->hasRole('Admin') || Auth::user()->hasRole('Sales Person'))
                        <li class="treeview">
                            <a href="{{ route('templates.index') }}"
                                class="{{ request()->is('templates') || request()->is('templates/*') || request()->is('email-templates') || request()->is('email-templates/*') || request()->is('text-message-templates') || request()->is('text-message-templates/*') || request()->is('phone-script-templates') || request()->is('phone-script-templates/*') ? 'active' : '' }}">
                                <i class="fa fa-envelope-o"></i> <span>Templates</span>
                            </a>
                        </li>
                        @endif
                        <li class="treeview">
                            <a href="{{ route('contactus.index') }}"
                                class="{{ request()->is('contactus') || request()->is('contactus/create') || request()->is('contactus/*/show') || request()->is('contactus/*/edit') || request()->is('contactus/*') ? 'active' : '' }}">
                                <i class="fa fa-envelope"></i> <span>Contact Us</span>
                            </a>
                        </li>
                    @endcan
                    @can('balloon_enquiry-list')
                    <li class="treeview">
                        <a href="{{route('balloon_enquiry.index')}}"
                        class="{{ request()->is('balloon_enquiry') || request()->is('balloon_enquiry/create') || request()->is('balloon_enquiry/*/show') || request()->is('balloon_enquiry/*/edit') || request()->is('balloon_enquiry/*') ? 'active' : '' }}"
                        >
                            <i class="fa fa-envelope"></i> <span>Balloon Enquiry</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="{{ route('perfect_gift_enquiry.index') }}"
                        class="{{ request()->is('perfect_gift_enquiry') || request()->is('perfect_gift_enquiry/*') ? 'active' : '' }}">
                            <i class="fa fa-envelope"></i> <span>Perfect Gift Enquiry</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="{{ route('e_card_enquiry.index') }}"
                        class="{{ request()->is('e_card_enquiry') || request()->is('e_card_enquiry/*') ? 'active' : '' }}">
                            <i class="fa fa-envelope"></i> <span>E-Cards</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="{{ route('tango_enquiry.index') }}"
                        class="{{ request()->is('tango_enquiry') || request()->is('tango_enquiry/*') ? 'active' : '' }}">
                            <i class="fa fa-envelope"></i> <span>Tango Enquiries</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="{{ route('greetings_appreciation_enquiry.index') }}"
                        class="{{ request()->is('greetings_appreciation_enquiry') || request()->is('greetings_appreciation_enquiry/*') ? 'active' : '' }}">
                            <i class="fa fa-envelope"></i> <span>Greetings &amp; Appreciation</span>
                        </a>
                    </li>
                    @endcan
                    @can('enquiry-list')
                    
                    <li class="treeview">
                        <a href="{{ route('business-card.orders') }}"
                        class="{{ request()->is('business-card-orders') || request()->is('business-card-orders*') ? 'active' : '' }}">
                            <i class="fa fa-envelope"></i>
                            <span>Business Card Order</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="{{ route('enquires.show', 'quality_logo') }}"
                        class="{{ request()->is('enquires/quality_logo') || request()->is('enquires/quality_logo/*') ? 'active' : '' }}">
                            <i class="fa fa-envelope"></i>
                            <span>Quality Logo Enquiry</span>
                        </a>
                    </li>
                    @endcan
                    @can('enquiry-list')
                    <li class="treeview">
                        <a href="{{ route('enquires.show','journey_expert') }}"
                        class="{{ request()->is('enquires/journey_expert') || request()->is('enquires/journey_expert/*') ? 'active' : '' }}">
                            <i class="fa fa-envelope"></i>
                            <span>Journey-Expert Enquiry</span>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>

            @can('notification-list')
                <li class="treeview">
                    <a href="{{ route('notification.index') }}"
                        class="{{ request()->is('notification') || request()->is('notification/create') || request()->is('notification/*/edit') || request()->is('notification/*') ? 'active' : '' }}">
                        <i class="fa fa-bell"></i> <span>Notifications</span>
                    </a>
                </li>
            @endcan

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
