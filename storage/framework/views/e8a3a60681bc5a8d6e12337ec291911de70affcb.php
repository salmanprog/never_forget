<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="<?php echo e(route('dashboard')); ?>"
                    class="<?php echo e(request()->is('dashboard') || request()->is('profile/*') ? 'active' : ''); ?>">
                    <i class="fa fa-home"></i> <span>Dashboard</span>
                </a>
            </li>
            

            <li class="treeview">
                <a href="<?php echo e(route('member.profile')); ?>"
                    class="<?php echo e(request()->path() === 'member/profile' ? 'active' : ''); ?>">
                    <i class="fa fa-shopping-cart"></i> <span>My Profile</span>
                </a>
            </li>
            <li class="treeview <?php echo e(request()->is('member/friends-family*') ? 'active' : ''); ?>" style="height: auto;">
                <a href="#" class="<?php echo e(request()->is('member/friends-family*') ? 'active' : ''); ?>">
                    <i class="fa fa-users"></i>
                    <span>Friends/Family Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" style="display: <?php echo e(request()->is('member/friends-family*') ? 'block' : 'none'); ?>;">
                    <li class="treeview">
                        <a href="<?php echo e(route('member.friends_family.index')); ?>" class="<?php echo e(request()->is('member/friends-family') && !request()->is('member/friends-family/create') && !request()->is('member/friends-family/bulk-upload') && !request()->is('member/friends-family/*/edit') ? 'active' : ''); ?>">
                            <i class="fa fa-list"></i> <span>All friends/family</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="<?php echo e(route('member.friends_family.create')); ?>" class="<?php echo e(request()->is('member/friends-family/create') ? 'active' : ''); ?>">
                            <i class="fa fa-user-plus"></i> <span>Add friends/family</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="<?php echo e(route('member.friends_family.bulk-upload')); ?>" class="<?php echo e(request()->is('member/friends-family/bulk-upload') ? 'active' : ''); ?>">
                            <i class="fa fa-upload"></i> <span>Bulk upload</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="<?php echo e(route('member.friends_family.gifting')); ?>" class="<?php echo e(request()->is('member/friends-family-gifting') ? 'active' : ''); ?>">
                    <i class="fa fa-gift"></i> <span>Friends/Family Gifting</span>
                </a>
            </li>
            <li class="treeview">
                <a href="<?php echo e(route('order.index')); ?>"
                    class="<?php echo e(request()->is('order') || request()->is('order/create') || request()->is('order/*/edit') ? 'active' : ''); ?>">
                    <i class="fa fa-shopping-cart"></i> <span>Orders</span>
                </a>
            </li>
            <li class="treeview">
                <a href="<?php echo e(route('wishlist.index')); ?>" class="">
                    <i class="fa fa-shopping-cart"></i> <span>Wishlist / Favorites</span>
                </a>
            </li>
            
            <li class="treeview <?php echo e(request()->is('my-e-card-enquiries') || request()->is('my-e-card-enquiries/*') || request()->is('member/balloon-enquiries') || request()->is('member/perfect-gift-enquiries') || request()->is('member/business-card-orders') || request()->is('member/quality-logo-enquiries') || request()->is('member/journey-expert-enquiries') ? 'active' : ''); ?>"
                style="height: auto;">
                <a href="#"
                    class="<?php echo e(request()->is('my-e-card-enquiries') || request()->is('my-e-card-enquiries/*') || request()->is('member/balloon-enquiries') || request()->is('member/perfect-gift-enquiries') || request()->is('member/business-card-orders') || request()->is('member/quality-logo-enquiries') || request()->is('member/journey-expert-enquiries') ? 'active' : ''); ?>">
                    <i class="fa fa-envelope"></i>
                    <span>All Enquiries</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu"
                    style="display: <?php echo e(request()->is('my-e-card-enquiries') || request()->is('my-e-card-enquiries/*') || request()->is('member/balloon-enquiries') || request()->is('member/perfect-gift-enquiries') || request()->is('member/business-card-orders') || request()->is('member/quality-logo-enquiries') || request()->is('member/journey-expert-enquiries') ? 'block' : 'none'); ?>;">
                    <li class="treeview">
                        <a href="<?php echo e(route('my-e-card-enquiries')); ?>"
                            class="<?php echo e(request()->is('my-e-card-enquiries') && !request()->is('my-e-card-enquiries/*') ? 'active' : ''); ?>">
                            <i class="fa fa-circle-o"></i> <span>E Card</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="<?php echo e(route('member.balloon-enquiries')); ?>"
                            class="<?php echo e(request()->is('member/balloon-enquiries') ? 'active' : ''); ?>">
                            <i class="fa fa-circle-o"></i> <span>Balloons</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="<?php echo e(route('member.perfect-gift-enquiries')); ?>"
                            class="<?php echo e(request()->is('member/perfect-gift-enquiries') ? 'active' : ''); ?>">
                            <i class="fa fa-circle-o"></i> <span>Perfect Gift</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="<?php echo e(route('member.business-card-orders')); ?>"
                            class="<?php echo e(request()->is('member/business-card-orders') ? 'active' : ''); ?>">
                            <i class="fa fa-circle-o"></i> <span>Business Card</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="<?php echo e(route('member.quality-logo-enquiries')); ?>"
                            class="<?php echo e(request()->is('member/quality-logo-enquiries') ? 'active' : ''); ?>">
                            <i class="fa fa-circle-o"></i> <span>Quality Logo</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="<?php echo e(route('member.journey-expert-enquiries')); ?>"
                            class="<?php echo e(request()->is('member/journey-expert-enquiries') ? 'active' : ''); ?>">
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
<?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\layouts\individual\sidebar.blade.php ENDPATH**/ ?>