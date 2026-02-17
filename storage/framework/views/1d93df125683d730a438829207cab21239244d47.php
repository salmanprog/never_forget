<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="<?php echo e(route('dashboard')); ?>" class="<?php echo e(request()->is('dashboard') || request()->is('profile/*') ? 'active' : ''); ?>">
                    <i class="fa fa-home"></i> <span>Dashboard</span>
                </a>
            </li>
            

            <li class="treeview">
                <a href="<?php echo e(route('member.profile.edit')); ?>"  class="<?php echo e(request()->is('member/profile/edit') ? 'active' : ''); ?>">
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
            
            <li class="treeview <?php echo e(request()->is('my-e-card-enquiries') || request()->is('my-e-card-enquiries/*') ? 'active' : ''); ?>" style="height: auto;">
                <a href="#" class="<?php echo e(request()->is('my-e-card-enquiries') || request()->is('my-e-card-enquiries/*') ? 'active' : ''); ?>">
                    <i class="fa fa-envelope"></i>
                    <span>Enquiries</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" style="display: <?php echo e(request()->is('my-e-card-enquiries') || request()->is('my-e-card-enquiries/*') ? 'block' : 'none'); ?>;">
                    <li class="treeview">
                        <a href="<?php echo e(route('my-e-card-enquiries')); ?>" class="<?php echo e(request()->is('my-e-card-enquiries') && !request()->is('my-e-card-enquiries/*') ? 'active' : ''); ?>">
                            <i class="fa fa-circle-o"></i> <span>E-Card Enquiry</span>
                        </a>
                    </li>
                </ul>
            </li>
            
            <li class="treeview">
                
                    <a class="" href="<?php echo e(route('admin.logout')); ?>"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        <span><i class="fa-solid fa-arrow-right-from-bracket" style="width: 20px;"></i></span> <?php echo e(__('Logout')); ?>

                    </a>

                    <form id="logout-form" action="<?php echo e(route('admin.logout')); ?>" method="POST" class="d-none">
                        <?php echo csrf_field(); ?>
                    </form>
            </li>
        </ul>
    </section>
</aside>
<?php /**PATH C:\xampp\htdocs\never-forget\resources\views/layouts/individual/sidebar.blade.php ENDPATH**/ ?>