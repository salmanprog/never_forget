

<?php $__env->startSection('meta'); ?>
    <meta content="" name="description">
    <meta content="" name="keywords">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<main class="inner-bg">
    <section class="inner-banner">
      <div class="container">
        <h1 class="heading fs-74" data-aos="fade-down" data-aos-easing="ease-out-cubic"
        data-aos-duration="1000">Log <span>In</span></h1>
      </div>
    </section>
</main>
<!-- Inner Page Banner  -->
<!-- Login  -->
<section class="login-sec auth-forms py-100">
    <div class="container">
        <?php if(count($errors) > 0 ): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <ul class="p-0 m-0" style="list-style: none;">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
        <?php if(session('success')): ?>
            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
        <?php endif; ?>
        <?php if(session('error')): ?>
            <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
        <?php endif; ?>
        <?php if(session('login-first')): ?>
            <div class="alert alert-danger"><?php echo e(session('login-first')); ?></div>
        <?php endif; ?>
        <div class="row align-items-center text-center text-lg-start row-gap-40 justify-content-center">
            <div class="col-lg-6">
                <div class="iner-baner-head">
                    <h3 class="heading fs-60 mb-10">WELCOME <span>TO</span></h3>
                    <h1 class="heading fs-60 mb-10">NEVER <span>FORGET</span></h1>
                    <h4 class="heading fs-60 mb-20">Showing <span>Appreciation</span></h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,  sed do <br> eiusmod tempor incididunt ut labore et dolore magna alion.</p>
                </div>
            </div>
            <div class="col-lg-6 form-bg">
                <div class="log-forms field-wrapper text-center text-lg-start">
                    
                    <h4 class="heading fs-28 mb-30"><span>Customer Login Panel</span></h4>
                    <!-- Error message -->
                    <form method="POST" action="<?php echo e(route('user-authenticate')); ?>">
                        <!-- CSRF token -->
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="user_type" value="User">
                        <div class="form-group mb-20">
                            <input type="email"  class="input-field" value="<?php echo e(old('email')); ?>" name="email" placeholder="Enter user email">
                            <span style="color: red"><?php echo e($errors->first('email')); ?></span>
                        </div>
                        <div class="form-group mb-20">
                            
                            <input type="password" id="password" class="  input-field" name="password" placeholder="Enter password">
                            <span style="color: red"><?php echo e($errors->first('password')); ?></span>
                        </div>
                        <div class="form-group mb-20">
                            <button type="submit" class="login-btn btn primary-btn mx-auto mx-lg-0" name="form1">LOGIN</button>
                        </div>
                        <div class="form-check mb-20">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label text-muted" for="flexCheckDefault">
                                Keep me logged in
                            </label>
                        </div>
                    </form>
                    <div class="form-under-btn">
                        <!--<div class="forgot"><a href="">Forgot Password?</a></div>-->
                        <p class="text-muted">Don't have an account? <a class="ms-2 heading fs-16" href="<?php echo e(route ('register')); ?>">Sign Up</a> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.website.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\never_forget\resources\views/auth/login.blade.php ENDPATH**/ ?>