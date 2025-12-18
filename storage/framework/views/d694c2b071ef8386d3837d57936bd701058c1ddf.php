<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="<?php echo e(route('dashboard')); ?>" class="<?php echo e(request()->is('dashboard') || request()->is('profile/*') ? 'active' : ''); ?>">
                    <i class="fa fa-home"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview <?php echo e(request()->is('company/employees*') ? 'active' : ''); ?>" style="height: auto;">
                <a href="#" class="<?php echo e(request()->is('company/employees*') ? 'active' : ''); ?>">
                    <i class="fa fa-users"></i>
                    <span>Employee Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" style="display: <?php echo e(request()->is('company/employees*') || request()->is('company/create') || request()->is('company/edit') ? 'block' : 'none'); ?>;">
                    <li class="treeview">
                        <a href="<?php echo e(route('admin.company_employee.index')); ?>" class="<?php echo e(request()->is('company/employees') && !request()->is('company/employees/create') && !request()->is('company/employees/bulk-upload') && !request()->is('company/employees/*/edit') ? 'active' : ''); ?>">
                            <i class="fa fa-list"></i> <span>All Employees</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="<?php echo e(route('admin.company_employee.create')); ?>" class="<?php echo e(request()->is('company/employees/create') ? 'active' : ''); ?>">
                            <i class="fa fa-user-plus"></i> <span>Add Employee</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="<?php echo e(route('admin.company_employee.bulk-upload')); ?>" class="<?php echo e(request()->is('company/employees/bulk-upload') ? 'active' : ''); ?>">
                            <i class="fa fa-upload"></i> <span>Bulk Upload</span>
                        </a>
                    </li>
                    
                </ul>
            </li>
            <li class="treeview">
                <a href="<?php echo e(route('member.profile.edit')); ?>" class="<?php echo e(request()->is('member/profile/edit') ? 'active' : ''); ?>">
                    <i class="fa fa-building"></i> <span>Company Profile</span>
                </a>
            </li>
            <li class="treeview">
                <a href="<?php echo e(route('bulk-orders.index')); ?>" class="">
                    <i class="fa fa-shopping-cart"></i> <span>Bulk Orders</span>
                </a>
            </li>
            <li class="treeview">
                <a href="<?php echo e(route('order-history-invoices.index')); ?>" class="">
                    <i class="fa fa-file-text"></i> <span>Order History & Invoices</span>
                </a>
            </li>
            <li class="treeview">
                <a href="<?php echo e(route('employee-gifting.index')); ?>" class="">
                    <i class="fa fa-gift"></i> <span>Employee Gifting</span>
                </a>
            </li>
            <li class="treeview">
                <a href="<?php echo e(route('account-settings-support.index')); ?>" class="">
                    <i class="fa fa-life-ring"></i> <span>Account Settings & Support</span>
                </a>
            </li>
            <li class="treeview">
                <a href="<?php echo e(route('settings.index')); ?>" class="">
                    <i class="fa fa-cog"></i> <span>Logout / Settings</span>
                </a>
            </li>

          
             
            

           
            

           
            
            

            
        </ul>
    </section>
</aside>
<?php /**PATH C:\xampp\htdocs\never-forget-13nov\resources\views/layouts/company/sidebar.blade.php ENDPATH**/ ?>