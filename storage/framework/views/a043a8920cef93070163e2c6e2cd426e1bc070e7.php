<?php $__env->startSection('title', $page_title); ?>

<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="login-box">
        <div class="login-logo">
            <b>Change Password</b>
        </div>
        <div class="card-body login-box-body">
            <form method="POST" action="<?php echo e(route('admin.change_password')); ?>">
                <?php echo csrf_field(); ?>

                <input type="hidden" name="verify_token" value="<?php echo e($verify_token); ?>">
                <div class="form-group has-feedback">
                    <label for="password" class="col-md-6 col-form-label"><?php echo e(__('Password')); ?></label>
                    <input class="form-control" placeholder="password address" name="password" type="password" autocomplete="off" autofocus>
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong style="color: red"><?php echo e($message); ?></strong>
                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="form-group has-feedback">
                    <label for="confirm-password" class="col-md-6 col-form-label"><?php echo e(__('Confirm Password')); ?></label>
                    <input class="form-control" type="password" placeholder="confirm-password" name="confirm-password" type="confirm-password" autocomplete="off" autofocus>
                    <?php $__errorArgs = ['confirm-password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong style="color: red"><?php echo e($message); ?></strong>
                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            <?php echo e(__('Save New Password')); ?>

                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('auth.admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\auth\admin\passwords\change-password.blade.php ENDPATH**/ ?>