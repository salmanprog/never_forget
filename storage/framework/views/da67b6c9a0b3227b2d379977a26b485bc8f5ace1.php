<style>
    .gusto-contact-form-wrapper {
        background: #fff;
        padding: 50px;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .gusto-img-wrapper {
        text-align: center;
        margin-bottom: 20px;
    }

    .gusto-img-wrapper img {
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        max-height: 280px;
        width: auto;
        max-width: 100%;
        object-fit: contain;
        background: #fff;
        padding: 16px;
    }

    .gusto-tagline {
        color: #F5A623;
        font-weight: 600;
        font-size: 16px;
        margin-bottom: 12px;
    }

    .gusto-description {
        color: #666;
        line-height: 1.7;
        margin-bottom: 30px;
    }

    .gusto-service-block {
        border: 1px solid #e9ecef;
        border-radius: 14px;
        padding: 20px;
        margin-bottom: 20px;
        background: #f8f9fa;
    }

    .gusto-service-block__header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        margin-bottom: 14px;
        flex-wrap: wrap;
    }

    .gusto-service-block__title {
        color: #0B1B48;
        font-size: 20px;
        font-weight: 700;
        margin: 0;
    }

    .gusto-select-all {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-weight: 600;
        color: #0B1B48;
        cursor: pointer;
        margin: 0;
    }

    .gusto-options-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 8px 16px;
    }

    .gusto-option {
        display: flex;
        align-items: flex-start;
        gap: 8px;
        color: #333;
        font-size: 14px;
        margin: 0;
        cursor: pointer;
    }

    .gusto-option input,
    .gusto-select-all input {
        margin-top: 3px;
        accent-color: #0B1B48;
    }

    .gusto-contact-form-wrapper .form-label {
        font-weight: 600;
        color: #0B1B48;
        margin-bottom: 8px;
    }

    .gusto-contact-form-wrapper .form-control {
        border: 2px solid #e9ecef;
        border-radius: 10px;
        padding: 12px 15px;
        font-size: 16px;
    }

    .gusto-contact-form-wrapper .form-control:focus {
        border-color: #0B1B48;
        box-shadow: 0 0 0 0.2rem rgba(11, 27, 72, 0.25);
    }

    .gusto-contact-form-wrapper .btn-primary {
        background: #0B1B48;
        border: none;
        padding: 15px 40px;
        border-radius: 25px;
        font-weight: 600;
        color: #fff;
    }

    .gusto-contact-form-wrapper .btn-primary:hover {
        background: #cfa40c;
        color: #0B1B48;
    }

    @media (max-width: 767px) {
        .gusto-contact-form-wrapper {
            padding: 24px;
        }

        .gusto-options-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<section class="contact-sec py-150">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="gusto-img-wrapper">
                    <img src="<?php echo e(asset('public/assets/website/images/gusto-image.png')); ?>"
                        alt="Gusto" width="100%">
                </div>

                <div class="gusto-contact-form-wrapper">
                    <div class="row justify-content-center text-center">
                        <div class="col-lg-10">
                            <h2 class="heading fs-74 mb-20" data-aos="flip-left" data-aos-easing="ease-out-cubic"
                                data-aos-duration="1000">
                                Gusto
                            </h2>
                            <p class="gusto-tagline"><?php echo e(config('gusto.tagline')); ?></p>
                            <p class="gusto-description"><?php echo e(config('gusto.description')); ?></p>
                        </div>
                    </div>

                    <form action="<?php echo e(route('send.inquiry')); ?>" method="POST"
                        data-aos="fade-up" data-aos-easing="ease-out-cubic" data-aos-duration="1000"
                        id="gusto-enquiry-form" <?php if(auth()->guard()->check()): ?> data-logged-in="1" <?php endif; ?>>
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="title"
                            value="You have received new Gusto inquiry from">
                        <input type="hidden" name="identifier" value="gusto">

                        <?php if(auth()->guard()->check()): ?>
                            <input type="hidden" name="name" value="<?php echo e(old('name', Auth::user()->name ?? '')); ?>">
                            <input type="hidden" name="email" value="<?php echo e(old('email', Auth::user()->email ?? '')); ?>">
                            <input type="hidden" name="phone" value="<?php echo e(old('phone', Auth::user()->phone ?? '')); ?>">
                        <?php endif; ?>

                        <?php if(auth()->guard()->guest()): ?>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mb-30">
                                        <label for="gusto_name" class="form-label">Full Name *</label>
                                        <input type="text" name="name" id="gusto_name" class="form-control"
                                            placeholder="Enter your full name" value="<?php echo e(old('name')); ?>" required>
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
                                        <label for="gusto_email" class="form-label">Email Address *</label>
                                        <input type="email" name="email" id="gusto_email" class="form-control"
                                            placeholder="Enter your email" value="<?php echo e(old('email')); ?>" required>
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
                                <label for="gusto_phone" class="form-label">Phone Number *</label>
                                <input type="tel" name="phone" id="gusto_phone" class="form-control"
                                    placeholder="Enter your phone number" value="<?php echo e(old('phone')); ?>" required>
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
                        <?php endif; ?>

                        <?php
                            $oldServices = collect(old('services', []))->map(fn ($v) => (string) $v)->all();
                        ?>

                        <div class="mb-30">
                            <h3 class="heading fs-24 mb-20" style="color:#0B1B48;">Select Services *</h3>
                            <?php $__errorArgs = ['services'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger d-block mb-15"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                            <?php $__empty_1 = true; $__currentLoopData = ($gustoServices ?? collect()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="gusto-service-block" data-service-id="<?php echo e($service->id); ?>">
                                    <div class="gusto-service-block__header">
                                        <h4 class="gusto-service-block__title"><?php echo e($service->title); ?></h4>
                                        <label class="gusto-select-all">
                                            <input type="checkbox" class="gusto-select-all-checkbox">
                                            <span>Select All</span>
                                        </label>
                                    </div>
                                    <div class="gusto-options-grid">
                                        <?php $__currentLoopData = $service->activeOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $checkboxValue = $service->title . '::' . $option->title;
                                            ?>
                                            <label class="gusto-option">
                                                <input type="checkbox"
                                                    class="gusto-option-checkbox"
                                                    name="services[]"
                                                    value="<?php echo e($checkboxValue); ?>"
                                                    <?php echo e(in_array($checkboxValue, $oldServices, true) ? 'checked' : ''); ?>>
                                                <span><?php echo e($option->title); ?></span>
                                            </label>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <p class="text-muted">Gusto services will appear here soon.</p>
                            <?php endif; ?>
                        </div>

                        <div class="form-group mb-30">
                            <label for="gusto_message" class="form-label">Message *</label>
                            <textarea name="message" id="gusto_message" class="form-control" rows="4"
                                placeholder="Tell us about your business needs" required><?php echo e(old('message')); ?></textarea>
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

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Send Enquiry</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php if(session('success')): ?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (typeof Swal !== 'undefined') {
            Swal.fire({
                icon: 'success',
                title: 'Enquiry Sent',
                text: <?php echo json_encode(session('success'), 15, 512) ?>,
                confirmButtonColor: '#0B1B48'
            });
        }
    });
</script>
<?php endif; ?>

<script>
    (function () {
        function syncSelectAll(block) {
            var options = block.querySelectorAll('.gusto-option-checkbox');
            var selectAll = block.querySelector('.gusto-select-all-checkbox');
            if (!selectAll || !options.length) return;
            var checked = block.querySelectorAll('.gusto-option-checkbox:checked').length;
            selectAll.checked = checked === options.length;
            selectAll.indeterminate = checked > 0 && checked < options.length;
        }

        document.querySelectorAll('.gusto-service-block').forEach(function (block) {
            var selectAll = block.querySelector('.gusto-select-all-checkbox');
            var options = block.querySelectorAll('.gusto-option-checkbox');

            if (selectAll) {
                selectAll.addEventListener('change', function () {
                    options.forEach(function (cb) {
                        cb.checked = selectAll.checked;
                    });
                    selectAll.indeterminate = false;
                });
            }

            options.forEach(function (cb) {
                cb.addEventListener('change', function () {
                    syncSelectAll(block);
                });
            });

            syncSelectAll(block);
        });

        var form = document.getElementById('gusto-enquiry-form');
        if (form) {
            form.addEventListener('submit', function (e) {
                var checked = form.querySelectorAll('.gusto-option-checkbox:checked').length;
                if (checked < 1) {
                    e.preventDefault();
                    if (typeof Swal !== 'undefined') {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Select a service',
                            text: 'Please select at least one Gusto service option.',
                            confirmButtonColor: '#0B1B48'
                        });
                    } else {
                        alert('Please select at least one Gusto service option.');
                    }
                }
            });
        }
    })();
</script>
<?php /**PATH D:\xamp-new\htdocs\neverforget-updated\resources\views/website/partials/_gusto.blade.php ENDPATH**/ ?>