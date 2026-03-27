<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="<?php echo e(route('dashboard')); ?>" class="<?php echo e(request()->is('dashboard') || request()->is('profile/*') ? 'active' : ''); ?>">
                    <i class="fa fa-home"></i> <span>Dashboard</span>
                </a>
            </li>

            <li class="treeview <?php echo e(request()->is('mts-dashboard*') || request()->is('templates') || request()->is('templates/*') || request()->is('email-templates') || request()->is('email-templates/*') || request()->is('text-message-templates') || request()->is('text-message-templates/*') || request()->is('phone-script-templates') || request()->is('phone-script-templates/*') ? 'active' : ''); ?>">
                <a href="#" class="<?php echo e(request()->is('mts-dashboard*') || request()->is('templates') || request()->is('templates/*') || request()->is('email-templates') || request()->is('email-templates/*') || request()->is('text-message-templates') || request()->is('text-message-templates/*') || request()->is('phone-script-templates') || request()->is('phone-script-templates/*') ? 'active' : ''); ?>">
                    <i class="fa fa-gift"></i> <span>MTS Dashboard</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" style="display: <?php echo e(request()->is('mts-dashboard*') || request()->is('templates') || request()->is('templates/*') || request()->is('email-templates') || request()->is('email-templates/*') || request()->is('text-message-templates') || request()->is('text-message-templates/*') || request()->is('phone-script-templates') || request()->is('phone-script-templates/*') ? 'block' : 'none'); ?>;">
                    <li class="treeview">
                        <a href="<?php echo e(route('mts-dashboard.index')); ?>" class="<?php echo e(request()->is('mts-dashboard*') && !request()->is('sms-replies') ? 'active' : ''); ?>">
                            <i class="fa fa-gift"></i> <span>My Assigned Accounts</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="<?php echo e(route('templates.index')); ?>" class="<?php echo e(request()->is('templates') || request()->is('templates/*') || request()->is('email-templates') || request()->is('email-templates/*') || request()->is('text-message-templates') || request()->is('text-message-templates/*') || request()->is('phone-script-templates') || request()->is('phone-script-templates/*') ? 'active' : ''); ?>">
                            <i class="fa fa-envelope-o"></i> <span>Templates</span>
                        </a>
                    </li>
                </ul>
            </li>
            

        </ul>
    </section>
</aside>
<?php /**PATH D:\xampp\htdocs\never-forget\resources\views/layouts/sales-person/sidebar.blade.php ENDPATH**/ ?>