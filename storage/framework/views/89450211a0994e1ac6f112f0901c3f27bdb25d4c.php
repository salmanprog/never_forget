<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="<?php echo e(route('dashboard')); ?>" class="<?php echo e(request()->is('dashboard') || request()->is('profile/*') ? 'active' : ''); ?>">
                    <i class="fa fa-home"></i> <span>Dashboard</span>
                </a>
            </li>
            
            <li class="treeview">
                <a href="<?php echo e(route('order.index')); ?>" class="<?php echo e(request()->is('order') || request()->is('order/create') || request()->is('order/*/edit') ? 'active' : ''); ?>">
                    <i class="fa fa-shopping-cart"></i> <span>Orders</span>
                </a>
            </li>
 
        </ul>
    </section>
</aside>
<?php /**PATH C:\xampp8.2\htdocs\never-forget\resources\views/layouts/individual/sidebar.blade.php ENDPATH**/ ?>