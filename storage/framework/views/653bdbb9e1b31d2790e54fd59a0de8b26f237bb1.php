<header class="main-header">
    <a href="<?php echo e(route('dashboard')); ?>" class="logo">
        
        <img class="logo-lg" src="<?php echo e(asset('public/admin/assets/images/page')); ?>/<?php echo e($home_page_data['admin_header_logo']); ?>" style="width: 200px;position: absolute;left: 1%;top: 20%;" alt="">
        
    </a>

    <nav class="navbar navbar-static-top">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <span style="float:left;line-height:50px;color:#fff;padding-left:15px;font-size:18px;">Admin Panel</span>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li>
                    <a href="<?php echo e(url('/')); ?>" target="_blank">Visit Website</a>
                </li>

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php if(Auth::user()->image): ?>
                            <img src="<?php echo e(asset('public/admin/assets/img')); ?>/<?php echo e(Auth::user()->image); ?>" class="user-image" alt="user photo">
                        <?php else: ?>
                            <img src="<?php echo e(asset('public/admin/assets/img/dummy-user.png')); ?>" class="user-image" alt="user photo">
                        <?php endif; ?>
                        <span class="hidden-xs"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-footer">
                            <div>
                                <a href="<?php echo e(route('admin.profile.edit')); ?>" class="btn btn-default btn-flat">Edit Profile</a>
                            </div>
                            <div>
                                <a class="dropdown-item btn btn-default btn-flat" href="<?php echo e(route('admin.logout')); ?>"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    <?php echo e(__('Logout')); ?>

                                </a>

                                <form id="logout-form" action="<?php echo e(route('admin.logout')); ?>" method="POST" class="d-none">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>

    </nav>
</header>
<?php /**PATH C:\xampp8.2\htdocs\never-forget\resources\views/layouts/admin/header.blade.php ENDPATH**/ ?>