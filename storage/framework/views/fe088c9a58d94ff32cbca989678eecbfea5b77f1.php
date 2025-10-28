<style>
    .contact-form-wrapper {
        background: #fff;
        padding: 50px;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
    
    .career-info-card {
        background: #f8f9fa;
        padding: 30px;
        border-radius: 15px;
        border-left: 5px solid #0B1B48;
    }
    
    .career-title {
        color: #0B1B48;
        font-size: 24px;
        font-weight: 600;
        margin-bottom: 10px;
    }
    
    .category-badge {
        background: #F5A623;
        color: white;
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 14px;
        font-weight: 500;
    }
    
    .career-description {
        color: #666;
        line-height: 1.6;
    }
    
    .form-label {
        font-weight: 600;
        color: #0B1B48;
        margin-bottom: 8px;
    }
    
    .form-control {
        border: 2px solid #e9ecef;
        border-radius: 10px;
        padding: 12px 15px;
        font-size: 16px;
        transition: all 0.3s ease;
    }
    
    .form-control:focus {
        border-color: #0B1B48;
        box-shadow: 0 0 0 0.2rem rgba(11, 27, 72, 0.25);
    }
    
    .btn-primary {
        background: #0B1B48;
        border: none;
        padding: 15px 40px;
        border-radius: 25px;
        font-weight: 600;
        color: #fff;
        transition: all 0.3s ease;
    }
    
    .btn-primary:hover {
        background: #cfa40c;
        color: #0B1B48;
        transform: translateY(-2px);
    }
    
    .text-danger {
        font-size: 14px;
        margin-top: 5px;
    }
    
    .form-text {
        font-size: 12px;
        margin-top: 5px;
    }
    
    /* Custom SweetAlert Styling */
    .swal2-popup {
        border-radius: 20px !important;
        font-family: inherit !important;
    }
    
    .swal2-title {
        color: #0B1B48 !important;
        font-weight: 600 !important;
    }
    
    .swal2-confirm {
        background-color: #0B1B48 !important;
        border-radius: 25px !important;
        padding: 10px 30px !important;
        font-weight: 600 !important;
    }
    
    .swal2-confirm:hover {
        background-color: #cfa40c !important;
        color: #0B1B48 !important;
    }
    
    .swal2-success {
        border-color: #0B1B48 !important;
    }
    
    .swal2-success-ring {
        border-color: #0B1B48 !important;
    }
    
    .swal2-success-line-tip,
    .swal2-success-line-long {
        background-color: #0B1B48 !important;
    }
    .travel-img-wrapper img {
        border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
    max-height: 390px;
    object-fit: cover;
    }
    </style>
<section class="contact-sec py-150">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="travel-img-wrapper">
                    <img src="<?php echo e(asset('public/assets/website/images')); ?>/travel-experience.jpeg" alt="Travel & Experience" width="100%">
                </div>
                <div class="contact-form-wrapper">
                    <div class="row justify-content-center text-center">
                        <div class="col-lg-8">
                            <h2 class="heading fs-74 mb-30" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                                Inquiry for <span>Travel & Experience</span>
                            </h2>
                        </div>
                    </div>

                    <form action="<?php echo e(route('send.inquiry')); ?>" method="POST" enctype="multipart/form-data" data-aos="fade-up" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                        <?php echo csrf_field(); ?> 
                        <input type="hidden" name="title" id="title" value="You have received new journey expert user inquiry from">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mb-30">
                                    <label for="name" class="form-label">Full Name *</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter your full name" value="<?php echo e(old('name')); ?>" required>
                                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-30">
                                    <label for="email" class="form-label">Email Address *</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" value="<?php echo e(old('email')); ?>" required>
                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-30">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" name="phone" id="phone" class="form-control" placeholder="Enter your phone number" value="<?php echo e(old('phone')); ?>">
                            <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group mb-30">
                            <label for="message" class="form-label">Message</label>
                            <textarea name="message" id="message" class="form-control" rows="6" placeholder="Tell us ..."><?php echo e(old('message')); ?></textarea>
                            <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary btn-lg"> Send Inquiry <i class="fas fa-paper-plane ms-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>



<?php if(session('success')): ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'success',
            title: 'Inquiry Submitted!',
            text: '<?php echo e(session("success")); ?>',
            timer: 5000,
            showConfirmButton: true,
            confirmButtonText: 'OK',
            confirmButtonColor: '#0B1B48'
        });
    });
</script>
<?php endif; ?>

<?php if(session('error')): ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: '<?php echo e(session("error")); ?>',
            timer: 5000,
            showConfirmButton: true,
            confirmButtonText: 'OK',
            confirmButtonColor: '#d33'
        });
    });
</script>
<?php endif; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form[action="<?php echo e(route("send.inquiry")); ?>"]');
    const submitBtn = form.querySelector('button[type="submit"]');
    
    if (form && submitBtn) {
        // Form validation
        form.addEventListener('submit', function(e) {
            const name = form.querySelector('input[name="name"]').value.trim();
            const email = form.querySelector('input[name="email"]').value.trim();
            const phone = form.querySelector('input[name="phone"]').value.trim();
            
            // Basic validation
            if (!name || !email || !phone) {
                e.preventDefault();
                Swal.fire({
                    icon: 'warning',
                    title: 'Missing Information',
                    text: 'Please fill in all required fields.',
                    confirmButtonColor: '#0B1B48'
                });
                return;
            }
            
            // Email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                e.preventDefault();
                Swal.fire({
                    icon: 'warning',
                    title: 'Invalid Email',
                    text: 'Please enter a valid email address.',
                    confirmButtonColor: '#0B1B48'
                });
                return;
            }
            
            // Show loading state
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Submitting...';
            submitBtn.disabled = true;
            setTimeout(() => {
            }, 100);
        });
    }
});
</script>
<?php /**PATH C:\xampp\htdocs\never_forget\resources\views/website/partials/_journey_expert.blade.php ENDPATH**/ ?>