
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('title', $page_title); ?>

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
    </style>
<!-- Inner Page Banner  -->
<main class="inner-bg">
    <section class="inner-banner">
        <div class="container">
            <h1 class="heading fs-74" data-aos="fade-down" data-aos-easing="ease-out-cubic" data-aos-duration="1000">Career Application</h1>
        </div>
    </section>
</main>

<section class="contact-sec py-150">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="contact-form-wrapper">
                    <div class="row justify-content-center text-center">
                        <div class="col-lg-8">
                            <span class="btn des-wrapper mb-30" data-aos="flip-up" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                                Join Our Team
                            </span>
                            <h2 class="heading fs-74 mb-30" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                                Apply for <span>Position</span>
                            </h2>
                        </div>
                    </div>

                    <?php if($career): ?>
                    <div class="career-info-card mb-50" data-aos="fade-up" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                        <div class="row">
                            <div class="col-lg-8">
                                <h3 class="career-title"><?php echo e($career->title); ?></h3>
                                <?php if($career->hasCategory): ?>
                                <span class="category-badge"><?php echo e($career->hasCategory->title); ?></span>
                                <?php endif; ?>
                                <?php if($career->description): ?>
                                <p class="career-description mt-3"><?php echo $career->description; ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-4 text-end">
                                <?php if($career->image): ?>
                                <img src="<?php echo e(asset('public/admin/assets/images/careers')); ?>/<?php echo e($career->image); ?>" alt="<?php echo e($career->title); ?>" class="career-image" style="border-radius: 10px;">
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <form action="<?php echo e(route('careers.apply')); ?>" method="POST" enctype="multipart/form-data" data-aos="fade-up" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                        <?php echo csrf_field(); ?> 
                        <?php if($career): ?>
                        <input type="hidden" name="career_id" value="<?php echo e($career->id); ?>">
                        <?php else: ?>
                        <div class="form-group mb-30">
                            <label for="career_id" class="form-label">Select Position *</label>
                            <select name="career_id" id="career_id" class="form-control" required>
                                <option value="">Choose a position</option>
                                <?php $__currentLoopData = \App\Models\Career::where('status', 1)->with('hasCategory')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $careerOption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($careerOption->id); ?>"><?php echo e($careerOption->title); ?> 
                                    <?php if($careerOption->hasCategory): ?> - <?php echo e($careerOption->hasCategory->title); ?> <?php endif; ?>
                                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['career_id'];
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
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mb-30">
                                    <label for="name" class="form-label">Employer *</label>
                                    <input type="text" name="employer" id="employer" class="form-control" placeholder="Employer" value="<?php echo e(old('employer')); ?>" required>
                                    <?php $__errorArgs = ['employer'];
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
                                    <label for="email" class="form-label">Position applying for *</label>
                                    <input type="text" name="position_for_applying" id="position_for_applying" class="form-control" placeholder="Enter Position applying for" value="<?php echo e(old('position_for_applying')); ?>" required>
                                    <?php $__errorArgs = ['position_for_applying'];
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
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="heading fs-20 mb-30" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="1000"><span class="btn">PERSONAL DATA</span></h3>
                            </div>
                        </div>    
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group mb-30">
                                    <label for="name" class="form-label">Name (last, first, middle) *</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter your full name" value="<?php echo e(old('name')); ?>" required>
                                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($name); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group mb-30">
                                    <label for="name" class="form-label">City *</label>
                                    <input type="text" name="city" id="city" class="form-control" placeholder="Enter your city" value="<?php echo e(old('city')); ?>" required>
                                    <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($city); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group mb-30">
                                    <label for="name" class="form-label">State *</label>
                                    <input type="text" name="state" id="state" class="form-control" placeholder="Enter your state" value="<?php echo e(old('state')); ?>" required>
                                    <?php $__errorArgs = ['state'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($state); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group mb-30">
                                    <label for="name" class="form-label">Zip *</label>
                                    <input type="text" name="zip" id="zip" class="form-control" placeholder="Enter your zip" value="<?php echo e(old('zip')); ?>" required>
                                    <?php $__errorArgs = ['zip'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($zip); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group mb-30">
                                    <label for="name" class="form-label">Street Address and/or Mailing Address *</label>
                                    <input type="text" name="street_or_email_address" id="street_or_email_address" class="form-control" placeholder="Enter your Street Address and/or Mailing Address" value="<?php echo e(old('street_or_email_address')); ?>" required>
                                    <?php $__errorArgs = ['street_or_email_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($street_or_email_address); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group mb-30">
                                    <label for="name" class="form-label">Home Telephone Number *</label>
                                    <input type="text" name="home_phone_number" id="home_phone_number" class="form-control" placeholder="Home Telephone Number" value="<?php echo e(old('home_phone_number')); ?>">
                                    <?php $__errorArgs = ['home_phone_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($home_phone_number); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group mb-30">
                                    <label for="name" class="form-label">Business Telephone Number *</label>
                                    <input type="text" name="business_phone_number" id="business_phone_number" class="form-control" placeholder="Business Telephone Number" value="<?php echo e(old('business_phone_number')); ?>">
                                    <?php $__errorArgs = ['business_phone_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($business_phone_number); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group mb-30">
                                    <label for="name" class="form-label">Cellular Telephone Number *</label>
                                    <input type="text" name="cell_number" id="cell_number" class="form-control" placeholder="Cellular Telephone Number" value="<?php echo e(old('cell_number')); ?>" required>
                                    <?php $__errorArgs = ['cell_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($cell_number); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group mb-30">
                                    <label for="name" class="form-label">Date you can start work *</label>
                                    <input type="text" name="start_work_date" id="start_work_date" class="form-control" placeholder="Date you can start work" value="<?php echo e(old('start_work_date')); ?>">
                                    <?php $__errorArgs = ['start_work_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($start_work_date); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group mb-30">
                                    <label for="name" class="form-label">Salary Desired *</label>
                                    <input type="text" name="salary_desired" id="salary_desired" class="form-control" placeholder="Salary Desired" value="<?php echo e(old('salary_desired')); ?>">
                                    <?php $__errorArgs = ['salary_desired'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($salary_desired); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group mb-30">
                                    <label class="form-label d-block">Do you have a High School Diploma or GED? *</label>

                                    <div class="form-check form-check-inline">
                                    <input 
                                        type="radio" 
                                        name="high_school_diploma" 
                                        id="diploma_yes" 
                                        value="yes" 
                                        class="form-check-input"
                                        required
                                    >
                                    <label class="form-check-label" for="diploma_yes">Yes</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input 
                                        type="radio" 
                                        name="high_school_diploma" 
                                        id="diploma_no" 
                                        value="no" 
                                        class="form-check-input"
                                    >
                                    <label class="form-check-label" for="diploma_no">No</label>
                                    </div>

                                    <?php $__errorArgs = ['high_school_diploma'];
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
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="heading fs-20 mb-30" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="1000">POSITION INFORMATION <span>Check all that you are willing to work</span></h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group mb-30">
                                    <label class="form-label d-block"> Hours</label>

                                    <div class="form-check form-check-inline">
                                    <input 
                                        type="radio" 
                                        name="hours" 
                                        id="full_time" 
                                        value="full_time" 
                                        class="form-check-input"
                                        required
                                    >
                                    <label class="form-check-label" for="diploma_yes">Full Time</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input 
                                        type="radio" 
                                        name="hours" 
                                        id="part_time" 
                                        value="part_time" 
                                        class="form-check-input"
                                    >
                                    <label class="form-check-label" for="diploma_no">Part Time</label>
                                    </div>

                                    <?php $__errorArgs = ['high_school_diploma'];
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
                            <div class="col-lg-4">
                                <div class="form-group mb-30">
                                    <label class="form-label d-block"> Shift</label>

                                    <div class="form-check form-check-inline">
                                    <input 
                                        type="radio" 
                                        name="shift" 
                                        id="day" 
                                        value="day" 
                                        class="form-check-input"
                                        required
                                    >
                                    <label class="form-check-label" for="diploma_yes">Day</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input 
                                        type="radio" 
                                        name="shift" 
                                        id="evenings" 
                                        value="evenings" 
                                        class="form-check-input"
                                    >
                                    <label class="form-check-label" for="diploma_no">Evenings</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input 
                                        type="radio" 
                                        name="shift" 
                                        id="swing" 
                                        value="swing" 
                                        class="form-check-input"
                                    >
                                    <label class="form-check-label" for="diploma_no">Swing</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input 
                                        type="radio" 
                                        name="shift" 
                                        id="graveyard" 
                                        value="graveyard" 
                                        class="form-check-input"
                                    >
                                    <label class="form-check-label" for="diploma_no">Graveyard</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input 
                                        type="radio" 
                                        name="shift" 
                                        id="weekends" 
                                        value="weekends" 
                                        class="form-check-input"
                                    >
                                    <label class="form-check-label" for="diploma_no">Weekends</label>
                                    </div>

                                    <?php $__errorArgs = ['high_school_diploma'];
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
                            <div class="col-lg-4">
                                <div class="form-group mb-30">
                                    <label class="form-label d-block"> Status</label>

                                    <div class="form-check form-check-inline">
                                    <input 
                                        type="radio" 
                                        name="shift_status" 
                                        id="regular" 
                                        value="regular" 
                                        class="form-check-input"
                                        required
                                    >
                                    <label class="form-check-label" for="diploma_yes">Regular</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input 
                                        type="radio" 
                                        name="shift_status" 
                                        id="temporary" 
                                        value="temporary" 
                                        class="form-check-input"
                                    >
                                    <label class="form-check-label" for="diploma_no">Temporary</label>
                                    </div>

                                    <?php $__errorArgs = ['high_school_diploma'];
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
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mb-30">
                                    <label class="form-label d-block"> Are you authorized to work in the U.S. on an unrestricted basis?</label>

                                    <div class="form-check form-check-inline">
                                    <input 
                                        type="radio" 
                                        name="authorized_work" 
                                        id="authorized_work_yes" 
                                        value="yes" 
                                        class="form-check-input"
                                        required
                                    >
                                    <label class="form-check-label" for="diploma_yes">Yes</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input 
                                        type="radio" 
                                        name="authorized_work" 
                                        id="authorized_work_no" 
                                        value="no" 
                                        class="form-check-input"
                                    >
                                    <label class="form-check-label" for="diploma_no">No</label>
                                    </div>

                                    <?php $__errorArgs = ['high_school_diploma'];
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
                                    <label class="form-label d-block">Have you ever been convicted of a felony? (Convictions will not necessarily disqualify an applicant for employment.)</label>

                                    <div class="form-check form-check-inline">
                                    <input 
                                        type="radio" 
                                        name="convicted" 
                                        id="convicted_yes" 
                                        value="yes" 
                                        class="form-check-input"
                                        required
                                    >
                                    <label class="form-check-label" for="diploma_yes">Yes</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input 
                                        type="radio" 
                                        name="convicted" 
                                        id="convicted_no" 
                                        value="no" 
                                        class="form-check-input"
                                    >
                                    <label class="form-check-label" for="diploma_no">No</label>
                                    </div>

                                    <?php $__errorArgs = ['high_school_diploma'];
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
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group mb-30">
                                    <label class="form-label d-block">Have you been told the essential functions of the job or have you been viewed a copy of the job description listing the essential functions of the job?</label>

                                    <div class="form-check form-check-inline">
                                    <input 
                                        type="radio" 
                                        name="essential_function" 
                                        id="essential_function_yes" 
                                        value="yes" 
                                        class="form-check-input"
                                        required
                                    >
                                    <label class="form-check-label" for="diploma_yes">Yes</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input 
                                        type="radio" 
                                        name="essential_function" 
                                        id="essential_function_no" 
                                        value="no" 
                                        class="form-check-input"
                                    >
                                    <label class="form-check-label" for="diploma_no">No</label>
                                    </div>

                                    <?php $__errorArgs = ['high_school_diploma'];
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
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group mb-30">
                                    <label class="form-label d-block">Can you perform these essential functions of the job with or without reasonable accommodation?</label>

                                    <div class="form-check form-check-inline">
                                    <input 
                                        type="radio" 
                                        name="accommodation" 
                                        id="accommodation_yes" 
                                        value="yes" 
                                        class="form-check-input"
                                        required
                                    >
                                    <label class="form-check-label" for="diploma_yes">Yes</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input 
                                        type="radio" 
                                        name="accommodation" 
                                        id="accommodation_no" 
                                        value="no" 
                                        class="form-check-input"
                                    >
                                    <label class="form-check-label" for="diploma_no">No</label>
                                    </div>

                                    <?php $__errorArgs = ['high_school_diploma'];
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
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="heading fs-20 mb-30" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="1000">QUALIFICATIONS <span>Please list any education or training you feel relates to the position applied for that would help you perform the work, such as schools, colleges,
degrees, vocational or technical programs, and military training</span></h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                        <th></th>
                                        <th>School Name</th>
                                        <th>Degree</th>
                                        <th>Address / City / State</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <td>School</td>
                                        <td>
                                            <input type="text" id="school_1" name="school_1" class="form-control" placeholder="Enter school name">
                                        </td>
                                        <td>
                                            <input type="text" id="degree_1" name="degree_1" class="form-control" placeholder="Enter degree">
                                        </td>
                                        <td>
                                            <input type="text" id="address_1" name="address_1" class="form-control" placeholder="Enter address / city / state">
                                        </td>
                                        </tr>
                                        <tr>
                                        <td>School</td>
                                        <td>
                                            <input type="text" id="school_2" name="school_2" class="form-control" placeholder="Enter school name">
                                        </td>
                                        <td>
                                            <input type="text" id="degree_2" name="degree_2" class="form-control" placeholder="Enter degree">
                                        </td>
                                        <td>
                                            <input type="text" id="address_2" name="address_2" class="form-control" placeholder="Enter address / city / state">
                                        </td>
                                        </tr>
                                        <tr>
                                        <td>Other</td>
                                        <td>
                                            <input type="text" id="other_school" name="other_school" class="form-control" placeholder="Enter school name">
                                        </td>
                                        <td>
                                            <input type="text" id="other_degree" name="other_degree" class="form-control" placeholder="Enter degree">
                                        </td>
                                        <td>
                                            <input type="text" id="other_address" name="other_address" class="form-control" placeholder="Enter address / city / state">
                                        </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="heading fs-20 mb-30" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="1000">SPECIAL SKILLS <span>List any special skills or experience that you feel would help you in the position that you are applying for leadership, organizations/teams, etc.</span></h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group mb-30">
                                <label for="special_skills" class="form-label">Special Skills</label>
                                <textarea
                                    name="special_skills"
                                    id="special_skills"
                                    class="form-control"
                                    placeholder="Describe your special skills..."
                                    rows="4"
                                ><?php echo e(old('special_skills')); ?></textarea>

                                <?php $__errorArgs = ['special_skills'];
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
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="heading fs-20 mb-30" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="1000">REFERENCES <span>Please list three professional references not related to you, with full name, address, phone number, and relationship. If you don’t have three
professional references, then list personal, unrelated references.</span></h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                        <th>Name</th>
                                        <th>Address/City/State</th>
                                        <th>Phone</th>
                                        <th>Relationship</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <td><input type="text" id="name_1" name="name_1" class="form-control" placeholder="Enter Name"></td>
                                        <td>
                                            <input type="text" id="address_1" name="address_1" class="form-control" placeholder="Enter Address">
                                        </td>
                                        <td>
                                            <input type="text" id="phone_1" name="phone_1" class="form-control" placeholder="Enter Phone">
                                        </td>
                                        <td>
                                            <input type="text" id="relation_1" name="relation_1" class="form-control" placeholder="Enter Relation">
                                        </td>
                                        </tr>
                                        <tr>
                                        <td><input type="text" id="name_2" name="name_2" class="form-control" placeholder="Enter Name"></td>
                                        <td>
                                            <input type="text" id="address_2" name="address_2" class="form-control" placeholder="Enter Address">
                                        </td>
                                        <td>
                                            <input type="text" id="phone_2" name="phone_2" class="form-control" placeholder="Enter Phone">
                                        </td>
                                        <td>
                                            <input type="text" id="relation_2" name="relation_2" class="form-control" placeholder="Enter Relation">
                                        </td>
                                        </tr>
                                        <tr>
                                        <td><input type="text" id="name_3" name="name_3" class="form-control" placeholder="Enter Name"></td>
                                        <td>
                                            <input type="text" id="address_3" name="address_3" class="form-control" placeholder="Enter Address">
                                        </td>
                                        <td>
                                            <input type="text" id="phone_3" name="phone_3" class="form-control" placeholder="Enter Phone">
                                        </td>
                                        <td>
                                            <input type="text" id="relation_3" name="relation_3" class="form-control" placeholder="Enter Relation">
                                        </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="heading fs-20 mb-30" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="1000">WORK HISTORY <span>Start with your present or most recent employment and work back. Use separate sheet if necessary. (INCLUDE PAID AND UNPAID POSITIONS)</span></h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="heading fs-20 mb-30" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="1000">Job Title #1 </h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mb-30">
                                    <label for="name" class="form-label">Start Date (mo/day/yr)  *</label>
                                    <input type="text" name="job1_start_date" id="job1_start_date" class="form-control" placeholder="Start Date" value="<?php echo e(old('job1_start_date')); ?>" required>
                                    <?php $__errorArgs = ['job1_start_date'];
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
                                    <label for="email" class="form-label">End Date (mo/day/yr) *</label>
                                    <input type="text" name="job1_end_date" id="job1_end_date" class="form-control" placeholder="End Date" value="<?php echo e(old('job1_end_date')); ?>" required>
                                    <?php $__errorArgs = ['job1_end_date'];
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
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group mb-30">
                                    <label for="name" class="form-label">Company Name  *</label>
                                    <input type="text" name="company_name_1" id="company_name_1" class="form-control" placeholder="Company Name" value="<?php echo e(old('company_name_1')); ?>" required>
                                    <?php $__errorArgs = ['company_name_1'];
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
                            <div class="col-lg-4">
                                <div class="form-group mb-30">
                                    <label for="email" class="form-label">Supervisor’s Name *</label>
                                    <input type="text" name="supervisor_name1" id="supervisor_name1" class="form-control" placeholder="Supervisor’s Name" value="<?php echo e(old('supervisor_name1')); ?>" required>
                                    <?php $__errorArgs = ['supervisor_name1'];
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
                            <div class="col-lg-4">
                                <div class="form-group mb-30">
                                    <label for="email" class="form-label">Phone Number *</label>
                                    <input type="text" name="phone_number1" id="phone_number1" class="form-control" placeholder="Phone Number" value="<?php echo e(old('phone_number1')); ?>" required>
                                    <?php $__errorArgs = ['phone_number1'];
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
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group mb-30">
                                    <label for="name" class="form-label">City  *</label>
                                    <input type="text" name="city_1" id="city_1" class="form-control" placeholder="City" value="<?php echo e(old('city_1')); ?>" required>
                                    <?php $__errorArgs = ['city_1'];
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
                            <div class="col-lg-4">
                                <div class="form-group mb-30">
                                    <label for="email" class="form-label">State *</label>
                                    <input type="text" name="state1" id="state1" class="form-control" placeholder="State" value="<?php echo e(old('state1')); ?>" required>
                                    <?php $__errorArgs = ['state1'];
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
                            <div class="col-lg-4">
                                <div class="form-group mb-30">
                                    <label for="email" class="form-label">Zip *</label>
                                    <input type="text" name="zip1" id="zip1" class="form-control" placeholder="Zip" value="<?php echo e(old('zip1')); ?>" required>
                                    <?php $__errorArgs = ['zip1'];
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
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group mb-30">
                                    <label for="name" class="form-label">Duties  *</label>
                                    <textarea name="duties1" id="duties1" class="form-control" rows="6" placeholder="Duties..."><?php echo e(old('duties1')); ?></textarea>
                                    <?php $__errorArgs = ['duties1'];
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
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group mb-30">
                                    <label for="name" class="form-label">Reason for Leaving  *</label>
                                    <input type="text" name="reason_for_leaving_1" id="reason_for_leaving_1" class="form-control" placeholder="Reason for Leaving" value="<?php echo e(old('reason_for_leaving_1')); ?>" required>
                                    <?php $__errorArgs = ['reason_for_leaving_1'];
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
                            <div class="col-lg-4">
                                <div class="form-group mb-30">
                                    <label for="email" class="form-label">Starting Salary *</label>
                                    <input type="text" name="starting_salary1" id="starting_salary1" class="form-control" placeholder="Starting Salary" value="<?php echo e(old('starting_salary1')); ?>" required>
                                    <?php $__errorArgs = ['starting_salary1'];
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
                            <div class="col-lg-4">
                                <div class="form-group mb-30">
                                    <label for="email" class="form-label">Ending Salary *</label>
                                    <input type="text" name="ending_salary1" id="ending_salary1" class="form-control" placeholder="Ending Salary" value="<?php echo e(old('ending_salary1')); ?>" required>
                                    <?php $__errorArgs = ['ending_salary1'];
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
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group mb-30">
                                    <label class="form-label d-block">May we contact your present employer?</label>

                                    <div class="form-check form-check-inline">
                                    <input 
                                        type="radio" 
                                        name="contact_present_employer" 
                                        id="contact_present_employer_yes" 
                                        value="yes" 
                                        class="form-check-input"
                                        required
                                    >
                                    <label class="form-check-label" for="diploma_yes">Yes</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input 
                                        type="radio" 
                                        name="contact_present_employer" 
                                        id="contact_present_employer_no" 
                                        value="no" 
                                        class="form-check-input"
                                    >
                                    <label class="form-check-label" for="diploma_no">No</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input 
                                        type="radio" 
                                        name="contact_present_employer" 
                                        id="contact_present_employer_na" 
                                        value="n/a" 
                                        class="form-check-input"
                                    >
                                    <label class="form-check-label" for="diploma_no">N/A</label>
                                    </div>

                                    <?php $__errorArgs = ['high_school_diploma'];
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
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="heading fs-20 mb-30" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="1000">Job Title #2 </h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mb-30">
                                    <label for="name" class="form-label">Start Date (mo/day/yr)  *</label>
                                    <input type="text" name="job2_start_date" id="job2_start_date" class="form-control" placeholder="Start Date" value="<?php echo e(old('job2_start_date')); ?>" required>
                                    <?php $__errorArgs = ['job2_start_date'];
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
                                    <label for="email" class="form-label">End Date (mo/day/yr) *</label>
                                    <input type="text" name="job2_end_date" id="job2_end_date" class="form-control" placeholder="End Date" value="<?php echo e(old('job2_end_date')); ?>" required>
                                    <?php $__errorArgs = ['job2_end_date'];
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
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group mb-30">
                                    <label for="name" class="form-label">Company Name  *</label>
                                    <input type="text" name="company_name_2" id="company_name_2" class="form-control" placeholder="Company Name" value="<?php echo e(old('company_name_2')); ?>" required>
                                    <?php $__errorArgs = ['company_name_2'];
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
                            <div class="col-lg-4">
                                <div class="form-group mb-30">
                                    <label for="email" class="form-label">Supervisor’s Name *</label>
                                    <input type="text" name="supervisor_name2" id="supervisor_name2" class="form-control" placeholder="Supervisor’s Name" value="<?php echo e(old('supervisor_name2')); ?>" required>
                                    <?php $__errorArgs = ['supervisor_name2'];
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
                            <div class="col-lg-4">
                                <div class="form-group mb-30">
                                    <label for="email" class="form-label">Phone Number *</label>
                                    <input type="text" name="phone_number2" id="phone_number2" class="form-control" placeholder="Phone Number" value="<?php echo e(old('phone_number2')); ?>" required>
                                    <?php $__errorArgs = ['phone_number2'];
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
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group mb-30">
                                    <label for="name" class="form-label">City  *</label>
                                    <input type="text" name="city_2" id="city_2" class="form-control" placeholder="City" value="<?php echo e(old('city_2')); ?>" required>
                                    <?php $__errorArgs = ['city_2'];
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
                            <div class="col-lg-4">
                                <div class="form-group mb-30">
                                    <label for="email" class="form-label">State *</label>
                                    <input type="text" name="state2" id="state2" class="form-control" placeholder="State" value="<?php echo e(old('state2')); ?>" required>
                                    <?php $__errorArgs = ['state2'];
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
                            <div class="col-lg-4">
                                <div class="form-group mb-30">
                                    <label for="email" class="form-label">Zip *</label>
                                    <input type="text" name="zip2" id="zip2" class="form-control" placeholder="Zip" value="<?php echo e(old('zip2')); ?>" required>
                                    <?php $__errorArgs = ['zip2'];
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
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group mb-30">
                                    <label for="name" class="form-label">Duties  *</label>
                                    <textarea name="duties2" id="duties2" class="form-control" rows="6" placeholder="Duties..."><?php echo e(old('duties2')); ?></textarea>
                                    <?php $__errorArgs = ['duties2'];
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
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group mb-30">
                                    <label for="name" class="form-label">Reason for Leaving  *</label>
                                    <input type="text" name="reason_for_leaving_2" id="reason_for_leaving_2" class="form-control" placeholder="Reason for Leaving" value="<?php echo e(old('reason_for_leaving_2')); ?>" required>
                                    <?php $__errorArgs = ['reason_for_leaving_2'];
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
                            <div class="col-lg-4">
                                <div class="form-group mb-30">
                                    <label for="email" class="form-label">Starting Salary *</label>
                                    <input type="text" name="starting_salary2" id="starting_salary2" class="form-control" placeholder="Starting Salary" value="<?php echo e(old('starting_salary2')); ?>" required>
                                    <?php $__errorArgs = ['starting_salary2'];
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
                            <div class="col-lg-4">
                                <div class="form-group mb-30">
                                    <label for="email" class="form-label">Ending Salary *</label>
                                    <input type="text" name="ending_salary2" id="ending_salary2" class="form-control" placeholder="Ending Salary" value="<?php echo e(old('ending_salary2')); ?>" required>
                                    <?php $__errorArgs = ['ending_salary2'];
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
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="heading fs-20 mb-30" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="1000">Job Title #3 </h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mb-30">
                                    <label for="name" class="form-label">Start Date (mo/day/yr)  *</label>
                                    <input type="text" name="job3_start_date" id="job3_start_date" class="form-control" placeholder="Start Date" value="<?php echo e(old('job3_start_date')); ?>" required>
                                    <?php $__errorArgs = ['job3_start_date'];
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
                                    <label for="email" class="form-label">End Date (mo/day/yr) *</label>
                                    <input type="text" name="job3_end_date" id="job3_end_date" class="form-control" placeholder="End Date" value="<?php echo e(old('job3_end_date')); ?>" required>
                                    <?php $__errorArgs = ['job3_end_date'];
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
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group mb-30">
                                    <label for="name" class="form-label">Company Name  *</label>
                                    <input type="text" name="company_name_3" id="company_name_3" class="form-control" placeholder="Company Name" value="<?php echo e(old('company_name_3')); ?>" required>
                                    <?php $__errorArgs = ['company_name_3'];
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
                            <div class="col-lg-4">
                                <div class="form-group mb-30">
                                    <label for="email" class="form-label">Supervisor’s Name *</label>
                                    <input type="text" name="supervisor_name3" id="supervisor_name3" class="form-control" placeholder="Supervisor’s Name" value="<?php echo e(old('supervisor_name3')); ?>" required>
                                    <?php $__errorArgs = ['supervisor_name3'];
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
                            <div class="col-lg-4">
                                <div class="form-group mb-30">
                                    <label for="email" class="form-label">Phone Number *</label>
                                    <input type="text" name="phone_number3" id="phone_number3" class="form-control" placeholder="Phone Number" value="<?php echo e(old('phone_number3')); ?>" required>
                                    <?php $__errorArgs = ['phone_number3'];
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
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group mb-30">
                                    <label for="name" class="form-label">City  *</label>
                                    <input type="text" name="city_3" id="city_3" class="form-control" placeholder="City" value="<?php echo e(old('city_3')); ?>" required>
                                    <?php $__errorArgs = ['city_3'];
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
                            <div class="col-lg-4">
                                <div class="form-group mb-30">
                                    <label for="email" class="form-label">State *</label>
                                    <input type="text" name="state3" id="state3" class="form-control" placeholder="State" value="<?php echo e(old('state3')); ?>" required>
                                    <?php $__errorArgs = ['state3'];
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
                            <div class="col-lg-4">
                                <div class="form-group mb-30">
                                    <label for="email" class="form-label">Zip *</label>
                                    <input type="text" name="zip3" id="zip3" class="form-control" placeholder="Zip" value="<?php echo e(old('zip3')); ?>" required>
                                    <?php $__errorArgs = ['zip3'];
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
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group mb-30">
                                    <label for="name" class="form-label">Duties  *</label>
                                    <textarea name="duties3" id="duties3" class="form-control" rows="6" placeholder="Duties..."><?php echo e(old('duties3')); ?></textarea>
                                    <?php $__errorArgs = ['duties3'];
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
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group mb-30">
                                    <label for="name" class="form-label">Reason for Leaving  *</label>
                                    <input type="text" name="reason_for_leaving_3" id="reason_for_leaving_3" class="form-control" placeholder="Reason for Leaving" value="<?php echo e(old('reason_for_leaving_3')); ?>" required>
                                    <?php $__errorArgs = ['reason_for_leaving_3'];
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
                            <div class="col-lg-4">
                                <div class="form-group mb-30">
                                    <label for="email" class="form-label">Starting Salary *</label>
                                    <input type="text" name="starting_salary3" id="starting_salary3" class="form-control" placeholder="Starting Salary" value="<?php echo e(old('starting_salary3')); ?>" required>
                                    <?php $__errorArgs = ['starting_salary3'];
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
                            <div class="col-lg-4">
                                <div class="form-group mb-30">
                                    <label for="email" class="form-label">Ending Salary *</label>
                                    <input type="text" name="ending_salary3" id="ending_salary3" class="form-control" placeholder="Ending Salary" value="<?php echo e(old('ending_salary3')); ?>" required>
                                    <?php $__errorArgs = ['ending_salary3'];
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
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="heading fs-20 mb-30" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="1000">Job Title #4 </h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mb-30">
                                    <label for="name" class="form-label">Start Date (mo/day/yr)  *</label>
                                    <input type="text" name="job4_start_date" id="job4_start_date" class="form-control" placeholder="Start Date" value="<?php echo e(old('job4_start_date')); ?>" required>
                                    <?php $__errorArgs = ['job4_start_date'];
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
                                    <label for="email" class="form-label">End Date (mo/day/yr) *</label>
                                    <input type="text" name="job4_end_date" id="job4_end_date" class="form-control" placeholder="End Date" value="<?php echo e(old('job4_end_date')); ?>" required>
                                    <?php $__errorArgs = ['job4_end_date'];
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
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group mb-30">
                                    <label for="name" class="form-label">Company Name  *</label>
                                    <input type="text" name="company_name_4" id="company_name_4" class="form-control" placeholder="Company Name" value="<?php echo e(old('company_name_4')); ?>" required>
                                    <?php $__errorArgs = ['company_name_4'];
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
                            <div class="col-lg-4">
                                <div class="form-group mb-30">
                                    <label for="email" class="form-label">Supervisor’s Name *</label>
                                    <input type="text" name="supervisor_name4" id="supervisor_name4" class="form-control" placeholder="Supervisor’s Name" value="<?php echo e(old('supervisor_name4')); ?>" required>
                                    <?php $__errorArgs = ['supervisor_name4'];
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
                            <div class="col-lg-4">
                                <div class="form-group mb-30">
                                    <label for="email" class="form-label">Phone Number *</label>
                                    <input type="text" name="phone_number4" id="phone_number4" class="form-control" placeholder="Phone Number" value="<?php echo e(old('phone_number4')); ?>" required>
                                    <?php $__errorArgs = ['phone_number4'];
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
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group mb-30">
                                    <label for="name" class="form-label">City  *</label>
                                    <input type="text" name="city_4" id="city_4" class="form-control" placeholder="City" value="<?php echo e(old('city_4')); ?>" required>
                                    <?php $__errorArgs = ['city_4'];
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
                            <div class="col-lg-4">
                                <div class="form-group mb-30">
                                    <label for="email" class="form-label">State *</label>
                                    <input type="text" name="state4" id="state4" class="form-control" placeholder="State" value="<?php echo e(old('state4')); ?>" required>
                                    <?php $__errorArgs = ['state4'];
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
                            <div class="col-lg-4">
                                <div class="form-group mb-30">
                                    <label for="email" class="form-label">Zip *</label>
                                    <input type="text" name="zip4" id="zip4" class="form-control" placeholder="Zip" value="<?php echo e(old('zip4')); ?>" required>
                                    <?php $__errorArgs = ['zip4'];
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
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group mb-30">
                                    <label for="name" class="form-label">Duties  *</label>
                                    <textarea name="duties4" id="duties4" class="form-control" rows="6" placeholder="Duties..."><?php echo e(old('duties4')); ?></textarea>
                                    <?php $__errorArgs = ['duties4'];
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
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group mb-30">
                                    <label for="name" class="form-label">Reason for Leaving  *</label>
                                    <input type="text" name="reason_for_leaving_4" id="reason_for_leaving_4" class="form-control" placeholder="Reason for Leaving" value="<?php echo e(old('reason_for_leaving_4')); ?>" required>
                                    <?php $__errorArgs = ['reason_for_leaving_4'];
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
                            <div class="col-lg-4">
                                <div class="form-group mb-30">
                                    <label for="email" class="form-label">Starting Salary *</label>
                                    <input type="text" name="starting_salary4" id="starting_salary4" class="form-control" placeholder="Starting Salary" value="<?php echo e(old('starting_salary4')); ?>" required>
                                    <?php $__errorArgs = ['starting_salary4'];
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
                            <div class="col-lg-4">
                                <div class="form-group mb-30">
                                    <label for="email" class="form-label">Ending Salary *</label>
                                    <input type="text" name="ending_salary4" id="ending_salary4" class="form-control" placeholder="Ending Salary" value="<?php echo e(old('ending_salary4')); ?>" required>
                                    <?php $__errorArgs = ['ending_salary4'];
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
                        <!-- <div class="row">
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
                            <label for="resume" class="form-label">Resume/CV</label>
                            <input type="file" name="resume" id="resume" class="form-control" accept=".pdf,.doc,.docx">
                            <small class="form-text text-muted">Accepted formats: PDF, DOC, DOCX (Max size: 2MB)</small>
                            <?php $__errorArgs = ['resume'];
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
                            <label for="cover_letter" class="form-label">Cover Letter</label>
                            <textarea name="cover_letter" id="cover_letter" class="form-control" rows="6" placeholder="Tell us why you're interested in this position..."><?php echo e(old('cover_letter')); ?></textarea>
                            <?php $__errorArgs = ['cover_letter'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div> -->

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary btn-lg"> Submit Application <i class="fas fa-paper-plane ms-2"></i></button>
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
            title: 'Application Submitted!',
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
    const form = document.querySelector('form[action="<?php echo e(route("careers.apply")); ?>"]');
    const submitBtn = form.querySelector('button[type="submit"]');
    
    if (form && submitBtn) {
        // Form validation
        form.addEventListener('submit', function(e) {
            const name = form.querySelector('input[name="name"]').value.trim();
            const email = form.querySelector('input[name="email"]').value.trim();
            const careerId = form.querySelector('select[name="career_id"]') ? form.querySelector('select[name="career_id"]').value : form.querySelector('input[name="career_id"]').value;
            
            // Basic validation
            if (!name || !email || !careerId) {
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
            
            // Optional: Add a small delay to show the loading state
            setTimeout(() => {
                // The form will submit normally
            }, 100);
        });
        
        // File upload validation
        const resumeInput = form.querySelector('input[name="resume"]');
        if (resumeInput) {
            resumeInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const maxSize = 2 * 1024 * 1024; // 2MB
                    const allowedTypes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
                    
                    if (file.size > maxSize) {
                        Swal.fire({
                            icon: 'error',
                            title: 'File Too Large',
                            text: 'Please select a file smaller than 2MB.',
                            confirmButtonColor: '#0B1B48'
                        });
                        e.target.value = '';
                        return;
                    }
                    
                    if (!allowedTypes.includes(file.type)) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Invalid File Type',
                            text: 'Please select a PDF, DOC, or DOCX file.',
                            confirmButtonColor: '#0B1B48'
                        });
                        e.target.value = '';
                        return;
                    }
                }
            });
        }
    }
});
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.website.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp8.2\htdocs\never-forget\resources\views/website/career-application.blade.php ENDPATH**/ ?>