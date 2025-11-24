<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="<?php echo e(route('dashboard')); ?>" class="<?php echo e(request()->is('dashboard') || request()->is('profile/*') ? 'active' : ''); ?>">
                    <i class="fa fa-home"></i> <span>Dashboard</span>
                </a>
            </li>
            

            <li class="treeview">
                <a href="<?php echo e(route('myprofile.index')); ?>" class="">
                    <i class="fa fa-shopping-cart"></i> <span>My Profile</span>
                </a>
            </li>
            <li class="treeview">
                <a href="<?php echo e(route('order.index')); ?>" class="<?php echo e(request()->is('order') || request()->is('order/create') || request()->is('order/*/edit') ? 'active' : ''); ?>">
                    <i class="fa fa-shopping-cart"></i> <span>Orders</span>
                </a>
            </li>
            <li class="treeview">
                <a href="<?php echo e(route('wishlist.index')); ?>" class="">
                    <i class="fa fa-shopping-cart"></i> <span>Wishlist / Favorites</span>
                </a>
            </li>
            <li class="treeview">
                <a href="<?php echo e(route('gift-history.index')); ?>" class="">
                    <i class="fa fa-shopping-cart"></i> <span>Gift History</span>
                </a>
            </li>
            <li class="treeview">
                <a href="<?php echo e(route('notifications.index')); ?>" class="">
                    <i class="fa fa-bell"></i> <span>Notifications</span>
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
<?php /**PATH C:\xampp\htdocs\never-forget-13nov\resources\views/layouts/individual/sidebar.blade.php ENDPATH**/ ?>