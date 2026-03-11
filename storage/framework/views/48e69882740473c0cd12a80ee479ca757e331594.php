<?php
    if (Auth::user()->hasRole('Admin')) {
        $layout = 'layouts.admin.app';
    } elseif (Auth::user()->hasRole('Individual')) {
        $layout = 'layouts.individual.app';
    } else {
        $layout = 'layouts.individual.app';
    }
?>


<?php $__env->startSection('title', $page_title); ?>
<style>
    .form-control {
        margin-bottom: 20px;
    }
</style>
<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <div class="content-header-left">
            <h1>My Profile</h1>
        </div>
        <div class="content-header-right">
            <a href="<?php echo e(route('member.profile.edit')); ?>" class="btn btn-primary btn-sm">Edit Profile</a>
            <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-primary btn-sm" style="margin-left: 10px;">Dashboard</a>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">First Name <span style="color: red">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" readonly value="<?php echo e($user->name ?? ''); ?>" style="background-color: #fff; cursor: default;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Last Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" readonly value="<?php echo e($user->last_name ?? ''); ?>" style="background-color: #fff; cursor: default;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" readonly value="<?php echo e($user->email ?? ''); ?>" style="background-color: #fff; cursor: default;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Phone Number</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" readonly value="<?php echo e($user->phone ?? ''); ?>" style="background-color: #fff; cursor: default;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($layout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\never-forget\resources\views/website/individual-dashboard/profile.blade.php ENDPATH**/ ?>