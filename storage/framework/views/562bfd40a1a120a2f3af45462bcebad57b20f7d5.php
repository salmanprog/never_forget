<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="<?php echo e(route('dashboard')); ?>" class="<?php echo e(request()->is('dashboard') || request()->is('profile/*') ? 'active' : ''); ?>">
                    <i class="fa fa-home"></i> <span>Dashboard</span>
                </a>
            </li>
             
            <li class="treeview">
                <a href="<?php echo e(route('mts-dashboard.index')); ?>" class="<?php echo e(request()->is('mts-dashboard*') ? 'active' : ''); ?>">
                    <i class="fa fa-gift"></i> <span>MTS Dashboard</span>
                </a>
            </li>
 
        </ul>
    </section>
</aside>
<?php /**PATH C:\xampp8.2\htdocs\never-forget\resources\views/layouts/sales-person/sidebar.blade.php ENDPATH**/ ?>