<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="{{ route('dashboard') }}" class="{{ request()->is('dashboard') || request()->is('profile/*') ? 'active' : '' }}">
                    <i class="fa fa-home"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview {{ request()->is('company/resources*') ? 'active' : '' }}" style="height: auto;">
                <a href="#" class="{{ request()->is('company/resources*') ? 'active' : '' }}">
                    <i class="fa fa-users"></i>
                    <span>Resource Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" style="display: {{ request()->is('company/resources*') || request()->is('company/create') || request()->is('company/edit') ? 'block' : 'none' }};">
                    <li class="treeview">
                        <a href="{{ route('admin.company_employee.index') }}" class="{{ request()->is('company/resources') && !request()->is('company/resources/create') && !request()->is('company/resources/bulk-upload') && !request()->is('company/resources/*/edit') ? 'active' : '' }}">
                            <i class="fa fa-list"></i> <span>All Resources</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="{{ route('admin.company_employee.create') }}" class="{{ request()->is('company/resources/create') ? 'active' : '' }}">
                            <i class="fa fa-user-plus"></i> <span>Add Resource</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="{{ route('admin.company_employee.bulk-upload') }}" class="{{ request()->is('company/resources/bulk-upload') ? 'active' : '' }}">
                            <i class="fa fa-upload"></i> <span>Bulk Upload</span>
                        </a>
                    </li>
                    {{-- <li class="treeview">
                        <a href="{{ route('admin.company.edit') }}" class="{{ request()->is('company/edit') ? 'active' : '' }}">
                            <i class="fa fa-building"></i> <span>Company Settings</span>
                        </a>
                    </li> --}}
                </ul>
            </li>
            <li class="treeview">
                <a href="{{ route('company.profile') }}" class="{{ request()->is('company/profile') && !request()->is('company/profile/edit') ? 'active' : '' }}">
                    <i class="fa fa-building"></i> <span>Company Profile</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{ route('order.index') }}" class="">
                    <i class="fa fa-shopping-cart"></i> <span>Orders</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{route('employee-gifting.index')}}" class="">
                    <i class="fa fa-gift"></i> <span>Resource Gifting</span>
                </a>
            </li>
            <li class="treeview {{ request()->is('my-e-card-enquiries') || request()->is('my-e-card-enquiries/*') || request()->is('company/balloon-enquiries') || request()->is('company/perfect-gift-enquiries') || request()->is('company/business-card-orders') || request()->is('company/quality-logo-enquiries') || request()->is('company/journey-expert-enquiries') ? 'active' : '' }}" style="height: auto;">
                <a href="#" class="{{ request()->is('my-e-card-enquiries') || request()->is('my-e-card-enquiries/*') || request()->is('company/balloon-enquiries') || request()->is('company/perfect-gift-enquiries') || request()->is('company/business-card-orders') || request()->is('company/quality-logo-enquiries') || request()->is('company/journey-expert-enquiries') ? 'active' : '' }}">
                    <i class="fa fa-envelope"></i>
                    <span>All Enquiries</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" style="display: {{ request()->is('my-e-card-enquiries') || request()->is('my-e-card-enquiries/*') || request()->is('company/balloon-enquiries') || request()->is('company/perfect-gift-enquiries') || request()->is('company/business-card-orders') || request()->is('company/quality-logo-enquiries') || request()->is('company/journey-expert-enquiries') ? 'block' : 'none' }};">
                    <li class="treeview">
                        <a href="{{ route('my-e-card-enquiries') }}" class="{{ request()->is('my-e-card-enquiries') && !request()->is('my-e-card-enquiries/*') ? 'active' : '' }}">
                            <i class="fa fa-circle-o"></i> <span>E Card</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="{{ route('company.balloon-enquiries') }}" class="{{ request()->is('company/balloon-enquiries') ? 'active' : '' }}">
                            <i class="fa fa-circle-o"></i> <span>Balloons</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="{{ route('company.perfect-gift-enquiries') }}" class="{{ request()->is('company/perfect-gift-enquiries') ? 'active' : '' }}">
                            <i class="fa fa-circle-o"></i> <span>Perfect Gift</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="{{ route('company.business-card-orders') }}" class="{{ request()->is('company/business-card-orders') ? 'active' : '' }}">
                            <i class="fa fa-circle-o"></i> <span>Business Card</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="{{ route('company.quality-logo-enquiries') }}" class="{{ request()->is('company/quality-logo-enquiries') ? 'active' : '' }}">
                            <i class="fa fa-circle-o"></i> <span>Quality Logo</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="{{ route('company.journey-expert-enquiries') }}" class="{{ request()->is('company/journey-expert-enquiries') ? 'active' : '' }}">
                            <i class="fa fa-circle-o"></i> <span>Journey Expert</span>
                        </a>
                    </li>
                </ul>
            </li>
            {{-- <li class="treeview">
                <a href="{{route('account-settings-support.index')}}" class="">
                    <i class="fa fa-life-ring"></i> <span>Account Settings & Support</span>
                </a>
            </li> --}}
            <li class="treeview">
                <a class="" href="{{ route('admin.logout') }}"
                    onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                    <span><i class="fa-solid fa-arrow-right-from-bracket" style="width: 20px;"></i></span>
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>

          
             
            

           {{--  <li class="treeview">
                <a href="{{ route('billing_address.index') }}" class="{{ request()->is('billing_address') || request()->is('billing_address/create') || request()->is('billing_address/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-credit-card"></i> <span>Billing Address</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{ route('shipping_address.index') }}" class="{{ request()->is('shipping_address') || request()->is('shipping_address/create') || request()->is('shipping_address/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-truck"></i> <span>Shipping Address</span>
                </a>
            </li> --}}
            

           {{--  <li class="treeview {{ ( request()->is('jobpost') || request()->is('jobpost/create') || request()->is('jobpost/*/edit')) ? 'active' : '' }}" style="height: auto;">
                <a href="#" class="{{ ( request()->is('jobpost') || request()->is('jobpost/create') || request()->is('jobpost/*/edit')) ? 'active' : '' }}">
                    <i class="fa fa-files-o"></i>
                    <span>Contractor</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" style="display: {{ ( request()->is('jobpost') || request()->is('jobpost/create') || request()->is('jobpost/*/edit')) ? 'block' : 'none' }};">
                
                    <li class="treeview mt-2">
                        <a href="#" class="">
                            <i class="fa fa-handshake-o"></i> <span>Browse Project Jobs</span>
                        </a>
                    </li> 
        
                    <li class="treeview mt-2">
                        <a href="#" class="">
                            <i class="fa fa-handshake-o"></i> <span>My Proposals</span>
                        </a>
                    </li> 
                    

                    <li class="treeview mt-2">
                        <a href="#" class="">
                            <i class="fa fa-handshake-o"></i> <span>Profile & Qualifications</span>
                        </a>
                    </li>
                    <li class="treeview mt-2">
                        <a href="#" class="">
                            <i class="fa fa-handshake-o"></i> <span>Notifications & Updates</span>
                        </a>
                    </li>
                </ul>
            </li> --}}
            {{-- <li class="treeview">
                <a href="{{ route('advertisement.index') }}" class="{{ request()->is('advertisement') || request()->is('advertisement/create') || request()->is('advertisement/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-tasks"></i> <span>All Advertisements</span>
                </a>
            </li> --}}
            {{--  <li class="treeview">
                <a href="{{ route('user.profile.edit') }}" class="{{ request()->is('user/profile/edit') || request()->is('profile/*') ? 'active' : '' }}">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> <span>Edit Profile</span>
                </a>
            </li> --}}

            {{--<!-- <li class="treeview">
                <a href="{{ route('property.index') }}" class="{{ request()->is('property') || request()->is('property/create') || request()->is('property/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-tasks"></i> <span>All Properties</span>
                </a>
            </li> -->--}}
        </ul>
    </section>
</aside>
