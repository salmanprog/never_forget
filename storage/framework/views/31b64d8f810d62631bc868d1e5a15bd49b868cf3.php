<header class="main-header">
    <a href="<?php echo e(route('dashboard')); ?>" class="logo">
        <img class="logo-lg" src="<?php echo e(asset('public/admin/assets/images/page')); ?>/<?php echo e($home_page_data['admin_header_logo']); ?>" style="width: 200px;position: absolute;left: 1%;top: 20%;" alt="">
    </a>
    <nav class="navbar navbar-static-top">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <span style="float:left;line-height:50px;color:rgb(255, 255, 255);font-weight: 600;padding-left:15px;font-size:15px;"><span class="logo-lg"><?php echo e(Auth::user()->name); ?> <?php echo e(Auth::user()->last_name); ?></span></span>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li>
                    <a href="<?php echo e(url('/')); ?>" target="_blank">Visit Website</a>
                </li>

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php if(!empty( Auth::user()->image )): ?>
                             <img  src="<?php echo e(asset('public/admin/assets/images/UserImage')); ?>/<?php echo e(Auth::user()->image); ?>" style="object-fit: cover;width: 40px;height: 40px;border-radius: 50px;margin-top: -10px;margin-right: 8px;" alt="">
                        <?php else: ?> 
                             <i class="fa fa-user-circle" style="font-size: 20px;" aria-hidden="true"></i>
                        <?php endif; ?> 
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-footer">
                            <div>
                                <a href="<?php echo e(route('member.profile.edit')); ?>" class="btn btn-default btn-flat" >Edit Profile</a>
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
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Custom Script -->
<script>
    $(document).ready(function() {
        $('.sidebar-toggle').click(function() {
            $('#header-logo').toggleClass('hide-logo');
        });
    });
</script>

<!-- CSS for hiding the logo -->
<style>
    .hide-logo {
        display: none;
    }

    @media (max-width: 425px) {
        #header-logo {
            display: block !important; /* Ensure logo stays visible */
        }
    }
    @media (max-width: 375px) {
        #header-logo {
            display: block !important; /* Ensure logo stays visible */
        }
    }
    @media (max-width: 320px) {
        #header-logo {
            display: block !important; /* Ensure logo stays visible */
        }
    }

    .sidebar-mini.sidebar-collapse .main-header .logo {
        width: 50px;
        display: none;
    }
</style><?php /**PATH C:\xampp8.2\htdocs\never-forget\resources\views/layouts/company/header.blade.php ENDPATH**/ ?>