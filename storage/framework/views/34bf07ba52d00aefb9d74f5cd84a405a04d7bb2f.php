<header class="main-header">
    <a href="<?php echo e(route('dashboard')); ?>" class="logo">
        <img class="logo-lg" src="<?php echo e(asset('public/admin/assets/images/page')); ?>/<?php echo e($home_page_data['admin_header_logo']); ?>" style="width: 200px;position: absolute;left: 1%;top: 20%;" alt="">
    </a>
    <nav class="navbar navbar-static-top">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <span style="float:left;line-height:50px;color:rgb(255, 255, 255);font-weight: 600;padding-left:15px;font-size:15px;"><span class="logo-lg"><?php echo e($companyName ?? ''); ?></span></span>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="position: relative;">
                        <i class="fa fa-bell" style="font-size: 18px;"></i>
                        <span class="label label-warning notification-count" style="position: absolute; top: 0; right: 0; background-color: #f39c12; border-radius: 50%; padding: 2px 6px; font-size: 11px; min-width: 18px; text-align: center;">0</span>
                    </a>
                    <ul class="dropdown-menu" style="width: 300px; padding: 0;">
                        <li class="header notification-header" style="background-color: #081e37; color: white; padding: 10px; text-align: center; font-weight: bold;">You have 0 notifications</li>
                        <li>
                            <ul class="menu notification-list" style="list-style: none; padding: 0; margin: 0; max-height: 300px; overflow-y: auto;">
                                <li style="padding: 10px; text-align: center; color: #999;">Loading notifications...</li>
                            </ul>
                        </li>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('notification-list')): ?>
                        <li class="footer" style="padding: 10px; text-align: center; border-top: 1px solid #eee;">
                            <a href="<?php echo e(route('notification.index')); ?>">View all</a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>
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

        // Load notification count and list
        function loadNotifications() {
            // Get notification count
            $.ajax({
                url: '<?php echo e(route("notifications.count")); ?>',
                type: 'GET',
                success: function(response) {
                    $('.notification-count').text(response.count);
                    if (response.count > 0) {
                        $('.notification-count').show();
                    } else {
                        $('.notification-count').text('0').show();
                    }
                }
            });

            // Get notification list
            $.ajax({
                url: '<?php echo e(route("notifications.list")); ?>',
                type: 'GET',
                success: function(response) {
                    $('.notification-header').text('You have ' + response.unread_count + ' unread notifications');
                    
                    var html = '';
                    if (response.notifications.length > 0) {
                        response.notifications.forEach(function(notification) {
                            var readClass = notification.is_read ? '' : 'background-color: #f0f8ff;';
                            var readBadge = notification.is_read ? '' : '<span class="badge label-warning" style="margin-left: 5px;">New</span>';
                            var notificationUrl = '<?php echo e(route("notification.show", ":id")); ?>'.replace(':id', notification.id);
                            
                            html += '<li style="padding: 10px; border-bottom: 1px solid #eee; ' + readClass + '">';
                            html += '<a href="' + notificationUrl + '" class="notification-item" data-id="' + notification.id + '" style="display: block; color: #333; text-decoration: none;">';
                            html += '<div style="font-weight: bold; margin-bottom: 5px;">' + notification.title + ' ' + readBadge + '</div>';
                            if (notification.description) {
                                html += '<div style="font-size: 12px; color: #666;">' + (notification.description.length > 50 ? notification.description.substring(0, 50) + '...' : notification.description) + '</div>';
                            }
                            html += '<div style="font-size: 11px; color: #999; margin-top: 5px;">' + new Date(notification.created_at).toLocaleString() + '</div>';
                            html += '</a>';
                            html += '</li>';
                        });
                    } else {
                        html = '<li style="padding: 10px; text-align: center; color: #999;">No notifications</li>';
                    }
                    $('.notification-list').html(html);
                }
            });
        }

        // Load notifications on page load
        loadNotifications();

        // Reload notifications every 30 seconds
        setInterval(loadNotifications, 30000);

        // Mark notification as read when clicked (before navigation)
        $(document).on('click', '.notification-item', function(e) {
            var notificationId = $(this).data('id');
            var notificationUrl = '<?php echo e(route("notifications.mark-read", ":id")); ?>'.replace(':id', notificationId);
            
            // Mark as read via AJAX (don't prevent default, let the link work)
            $.ajax({
                url: notificationUrl,
                type: 'POST',
                data: {
                    _token: '<?php echo e(csrf_token()); ?>'
                },
                async: false // Wait for this to complete before navigation
            });
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
</style><?php /**PATH D:\xampp\htdocs\never-forget\resources\views/layouts/company/header.blade.php ENDPATH**/ ?>