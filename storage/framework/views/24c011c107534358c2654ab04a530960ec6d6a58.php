<?php $__env->startSection('content'); ?>
    <div class="login-box">
        <div class="login-logo">
           <img src="<?php echo e(asset('public/admin/assets/images/page')); ?>/<?php echo e($home_page_data['header_logo']); ?>" alt="logo"style="width: 250px;">
        </div>
        <div class="card-body login-box-body">
            <form method="POST" action="<?php echo e(route('user-authenticate')); ?>" class="animated-form">
                <?php echo csrf_field(); ?>

                <input type="hidden" name="user_type" value="Admin">
                <div class="animated-input">
                    <label for="email"><?php echo e(__('Email Address')); ?></label>
                    <input class="animated-field" placeholder="Email address" name="email" type="email" autocomplete="off" autofocus>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="animated-error" role="alert">
                            <strong style="color:red"><?php echo e($message); ?></strong>
                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="animated-input">
                    <label for="password"><?php echo e(__('Password')); ?></label>
                    <input class="animated-field" placeholder="Password" name="password" type="password" autocomplete="off" value="">
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="animated-error" role="alert">
                            <strong style="color:red"><?php echo e($message); ?></strong>
                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="animated-checkbox">
                    <input class="animated-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>

                    <label class="animated-check-label" for="remember">
                        <?php echo e(__('Remember Me')); ?>

                    </label>
                </div>

                <div class="animated-button-container">
                    <button type="submit" class="animated-button">
                        <?php echo e(__('Login')); ?>

                    </button>

                    <a class="animated-link" href="<?php echo e(route('admin.forgot_password')); ?>">
                        <?php echo e(__('Forgot Your Password?')); ?>

                    </a>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('auth.admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp8.2\htdocs\never-forget\resources\views/auth/admin/login.blade.php ENDPATH**/ ?>