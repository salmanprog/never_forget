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
                <ul class="treeview-menu" style="display: <?php echo e(request()->is('company/employees*') ? 'block' : 'none'); ?>;">
                    <li class="treeview">
                        <a href="<?php echo e(route('company.employees.index')); ?>" class="<?php echo e(request()->is('company/employees') && !request()->is('company/employees/create') && !request()->is('company/employees/bulk-upload') && !request()->is('company/employees/*/edit') ? 'active' : ''); ?>">
                            <i class="fa fa-list"></i> <span>All Employees</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="<?php echo e(route('company.employees.create')); ?>" class="<?php echo e(request()->is('company/employees/create') ? 'active' : ''); ?>">
                            <i class="fa fa-user-plus"></i> <span>Add Employee</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="<?php echo e(route('company.employees.bulk-upload')); ?>" class="<?php echo e(request()->is('company/employees/bulk-upload') ? 'active' : ''); ?>">
                            <i class="fa fa-upload"></i> <span>Bulk Upload</span>
                        </a>
                    </li>
                </ul>
            </li>
            
             
            

           
            

           
            
            

            
        </ul>
    </section>
</aside>
<?php /**PATH C:\xampp8.2\htdocs\never-forget\resources\views/layouts/company/sidebar.blade.php ENDPATH**/ ?>