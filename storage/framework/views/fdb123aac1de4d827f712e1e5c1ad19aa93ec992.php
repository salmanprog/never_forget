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
                    <span>Resource Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" style="display: <?php echo e(request()->is('company/employees*') || request()->is('company/create') || request()->is('company/edit') ? 'block' : 'none'); ?>;">
                    <li class="treeview">
                        <a href="<?php echo e(route('admin.company_employee.index')); ?>" class="<?php echo e(request()->is('company/employees') && !request()->is('company/employees/create') && !request()->is('company/employees/bulk-upload') && !request()->is('company/employees/*/edit') ? 'active' : ''); ?>">
                            <i class="fa fa-list"></i> <span>All Resources</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="<?php echo e(route('admin.company_employee.create')); ?>" class="<?php echo e(request()->is('company/employees/create') ? 'active' : ''); ?>">
                            <i class="fa fa-user-plus"></i> <span>Add Resource</span>
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
                <a href="<?php echo e(route('company.profile')); ?>" class="<?php echo e(request()->is('company/profile') && !request()->is('company/profile/edit') ? 'active' : ''); ?>">
                    <i class="fa fa-building"></i> <span>Company Profile</span>
                </a>
            </li>
            <li class="treeview">
                <a href="<?php echo e(route('order.index')); ?>" class="">
                    <i class="fa fa-shopping-cart"></i> <span>Orders</span>
                </a>
            </li>
            <li class="treeview">
                <a href="<?php echo e(route('employee-gifting.index')); ?>" class="">
                    <i class="fa fa-gift"></i> <span>Resource Gifting</span>
                </a>
            </li>
            <li class="treeview <?php echo e(request()->is('my-e-card-enquiries') || request()->is('my-e-card-enquiries/*') || request()->is('company/balloon-enquiries') || request()->is('company/perfect-gift-enquiries') || request()->is('company/business-card-orders') || request()->is('company/quality-logo-enquiries') || request()->is('company/journey-expert-enquiries') ? 'active' : ''); ?>" style="height: auto;">
                <a href="#" class="<?php echo e(request()->is('my-e-card-enquiries') || request()->is('my-e-card-enquiries/*') || request()->is('company/balloon-enquiries') || request()->is('company/perfect-gift-enquiries') || request()->is('company/business-card-orders') || request()->is('company/quality-logo-enquiries') || request()->is('company/journey-expert-enquiries') ? 'active' : ''); ?>">
                    <i class="fa fa-envelope"></i>
                    <span>All Enquiries</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" style="display: <?php echo e(request()->is('my-e-card-enquiries') || request()->is('my-e-card-enquiries/*') || request()->is('company/balloon-enquiries') || request()->is('company/perfect-gift-enquiries') || request()->is('company/business-card-orders') || request()->is('company/quality-logo-enquiries') || request()->is('company/journey-expert-enquiries') ? 'block' : 'none'); ?>;">
                    <li class="treeview">
                        <a href="<?php echo e(route('my-e-card-enquiries')); ?>" class="<?php echo e(request()->is('my-e-card-enquiries') && !request()->is('my-e-card-enquiries/*') ? 'active' : ''); ?>">
                            <i class="fa fa-circle-o"></i> <span>E Card</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="<?php echo e(route('company.balloon-enquiries')); ?>" class="<?php echo e(request()->is('company/balloon-enquiries') ? 'active' : ''); ?>">
                            <i class="fa fa-circle-o"></i> <span>Balloons</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="<?php echo e(route('company.perfect-gift-enquiries')); ?>" class="<?php echo e(request()->is('company/perfect-gift-enquiries') ? 'active' : ''); ?>">
                            <i class="fa fa-circle-o"></i> <span>Perfect Gift</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="<?php echo e(route('company.business-card-orders')); ?>" class="<?php echo e(request()->is('company/business-card-orders') ? 'active' : ''); ?>">
                            <i class="fa fa-circle-o"></i> <span>Business Card</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="<?php echo e(route('company.quality-logo-enquiries')); ?>" class="<?php echo e(request()->is('company/quality-logo-enquiries') ? 'active' : ''); ?>">
                            <i class="fa fa-circle-o"></i> <span>Quality Logo</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="<?php echo e(route('company.journey-expert-enquiries')); ?>" class="<?php echo e(request()->is('company/journey-expert-enquiries') ? 'active' : ''); ?>">
                            <i class="fa fa-circle-o"></i> <span>Journey Expert</span>
                        </a>
                    </li>
                </ul>
            </li>
            
            <li class="treeview">
                <a class="" href="<?php echo e(route('admin.logout')); ?>"
                    onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                    <span><i class="fa-solid fa-arrow-right-from-bracket" style="width: 20px;"></i></span>
                    <?php echo e(__('Logout')); ?>

                </a>

                <form id="logout-form" action="<?php echo e(route('admin.logout')); ?>" method="POST" class="d-none">
                    <?php echo csrf_field(); ?>
                </form>
            </li>

          
             
            

           
            

           
            
            

            
        </ul>
    </section>
</aside>
<?php /**PATH D:\xampp\htdocs\never-forget\resources\views/layouts/company/sidebar.blade.php ENDPATH**/ ?>