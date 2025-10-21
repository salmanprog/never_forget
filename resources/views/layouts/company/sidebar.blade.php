<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="{{ route('dashboard') }}" class="{{ request()->is('dashboard') || request()->is('profile/*') ? 'active' : '' }}">
                    <i class="fa fa-home"></i> <span>Dashboard</span>
                </a>
            </li>

            <li class="treeview {{ request()->is('company/employees*') ? 'active' : '' }}" style="height: auto;">
                <a href="#" class="{{ request()->is('company/employees*') ? 'active' : '' }}">
                    <i class="fa fa-users"></i>
                    <span>Employee Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" style="display: {{ request()->is('company/employees*') ? 'block' : 'none' }};">
                    <li class="treeview">
                        <a href="{{ route('company.employees.index') }}" class="{{ request()->is('company/employees') && !request()->is('company/employees/create') && !request()->is('company/employees/bulk-upload') && !request()->is('company/employees/*/edit') ? 'active' : '' }}">
                            <i class="fa fa-list"></i> <span>All Employees</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="{{ route('company.employees.create') }}" class="{{ request()->is('company/employees/create') ? 'active' : '' }}">
                            <i class="fa fa-user-plus"></i> <span>Add Employee</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="{{ route('company.employees.bulk-upload') }}" class="{{ request()->is('company/employees/bulk-upload') ? 'active' : '' }}">
                            <i class="fa fa-upload"></i> <span>Bulk Upload</span>
                        </a>
                    </li>
                </ul>
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
