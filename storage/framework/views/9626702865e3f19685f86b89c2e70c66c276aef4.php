<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('meta'); ?>
    <meta content="<?php echo e($collaborator->short_description); ?>" name="description">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<style>
    .collab-detail-hero {
        background: #0B1B48;
        color: #fff;
        padding: 80px 0 50px;
        text-align: center;
    }
    .collab-detail-hero img {
        max-height: 120px;
        width: auto;
        max-width: 100%;
        object-fit: contain;
        background: #fff;
        border-radius: 12px;
        padding: 12px 20px;
        margin-bottom: 20px;
    }
    .collab-detail-hero h1 {
        font-size: 48px;
        margin-bottom: 10px;
    }
    .collab-detail-hero p {
        color: rgba(255,255,255,.85);
        max-width: 720px;
        margin: 0 auto;
    }
    .collab-section {
        padding: 70px 0;
    }
    .collab-section:nth-child(even) {
        background: #f8f9fa;
    }
    .collab-section h2 {
        color: #0B1B48;
        font-size: 36px;
        margin-bottom: 20px;
    }
    .collab-section h2 span {
        color: #F5A623;
    }
    .collab-section p,
    .collab-section .collab-body {
        color: #555;
        line-height: 1.7;
        white-space: pre-line;
    }
    .collab-bullets {
        list-style: none;
        padding: 0;
        margin: 0;
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 12px 24px;
    }
    .collab-bullets li {
        position: relative;
        padding-left: 28px;
        color: #333;
    }
    .collab-bullets li::before {
        content: '';
        position: absolute;
        left: 0;
        top: 8px;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: #F5A623;
    }
    .collab-faq-item {
        background: #fff;
        border: 1px solid #e9ecef;
        border-radius: 12px;
        padding: 18px 20px;
        margin-bottom: 12px;
    }
    .collab-faq-item h4 {
        color: #0B1B48;
        font-size: 18px;
        margin: 0 0 8px;
    }
    .collab-faq-item p {
        margin: 0;
        color: #555;
    }
    .collab-request-sec {
        padding: 70px 0;
        background: #f8f9fa;
    }
    .collab-request-form-wrapper {
        background: #fff;
        padding: 50px;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        font-family: inherit;
    }
    .collab-request-form-wrapper .heading {
        color: #0B1B48;
    }
    .collab-request-form-wrapper .form-label {
        font-weight: 600;
        color: #0B1B48;
        margin-bottom: 8px;
        font-family: inherit;
    }
    .collab-request-form-wrapper .form-control {
        border: 2px solid #e9ecef;
        border-radius: 10px;
        padding: 12px 15px;
        font-size: 16px;
        font-family: inherit;
        color: #333;
    }
    .collab-request-form-wrapper .form-control:focus {
        border-color: #0B1B48;
        box-shadow: 0 0 0 0.2rem rgba(11, 27, 72, 0.25);
    }
    .collab-request-form-wrapper .form-group {
        margin-bottom: 30px;
    }
    .collab-request-form-wrapper .btn-primary {
        background: #0B1B48;
        border: none;
        padding: 15px 40px;
        border-radius: 25px;
        font-weight: 600;
        color: #fff;
        font-family: inherit;
    }
    .collab-request-form-wrapper .btn-primary:hover {
        background: #cfa40c;
        color: #0B1B48;
    }
    .collab-request-form-wrapper .text-danger {
        font-size: 14px;
        margin-top: 5px;
        display: block;
    }
    .collab-contact-band {
        background: #0B1B48;
        color: #fff;
        text-align: center;
        padding: 60px 0;
    }
    .collab-contact-band h2 {
        color: #fff;
        margin-bottom: 12px;
    }
    @media (max-width: 767px) {
        .collab-detail-hero h1 { font-size: 32px; }
        .collab-bullets { grid-template-columns: 1fr; }
        .collab-request-form-wrapper { padding: 24px; }
    }
</style>

<section class="collab-detail-hero">
    <div class="container">
        <img src="<?php echo e($collaborator->image_url); ?>" alt="<?php echo e($collaborator->title); ?>">
        <h1><?php echo e($collaborator->title); ?></h1>
        <?php if($collaborator->short_description): ?>
            <p><?php echo e($collaborator->short_description); ?></p>
        <?php endif; ?>
    </div>
</section>

<?php if(!empty($collaborator->overview)): ?>
<section class="collab-section" id="overview">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h2>Overview</h2>
                <div class="collab-body"><?php echo e($collaborator->overview); ?></div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php
    $services = is_array($collaborator->services) ? $collaborator->services : [];
    $features = is_array($collaborator->features) ? $collaborator->features : [];
    $benefits = is_array($collaborator->benefits) ? $collaborator->benefits : [];
    $industries = is_array($collaborator->industries_served) ? $collaborator->industries_served : [];
?>

<?php if(count($services)): ?>
<section class="collab-section" id="services">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h2>Services</h2>
                <ul class="collab-bullets">
                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($item); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if(count($features)): ?>
<section class="collab-section" id="features">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h2>Features</h2>
                <ul class="collab-bullets">
                    <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($item); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if(count($benefits)): ?>
<section class="collab-section" id="benefits">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h2>Benefits</h2>
                <ul class="collab-bullets">
                    <?php $__currentLoopData = $benefits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($item); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if(count($industries)): ?>
<section class="collab-section" id="industries">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h2>Industries <span>Served</span></h2>
                <ul class="collab-bullets">
                    <?php $__currentLoopData = $industries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($item); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if(!empty($collaborator->why_choose)): ?>
<section class="collab-section" id="why-choose">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h2>Why Choose <span>This Collaborator</span></h2>
                <div class="collab-body"><?php echo e($collaborator->why_choose); ?></div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if($collaborator->activeFaqs->count()): ?>
<section class="collab-section" id="faqs">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h2>Frequently Asked <span>Questions</span></h2>
                <?php $__currentLoopData = $collaborator->activeFaqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="collab-faq-item">
                        <h4><?php echo e($faq->question); ?></h4>
                        <?php if($faq->answer): ?>
                            <p><?php echo e($faq->answer); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<section class="collab-request-sec" id="request-info">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="collab-request-form-wrapper">
                    <div class="text-center mb-30">
                        <h2 class="heading fs-48 mb-20">Request More <span>Information</span></h2>
                        <p style="color:#666; line-height:1.7;">
                            Interested in <?php echo e($collaborator->title); ?>? Share your details and NEVER FORGET will follow up.
                        </p>
                    </div>

                    <?php if(session('getaquotemessage')): ?>
                        <div class="alert alert-success"><?php echo e(session('getaquotemessage')); ?></div>
                    <?php endif; ?>
                    <?php if(session('error')): ?>
                        <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
                    <?php endif; ?>

                    <form action="<?php echo e(route('send.collaborate.quote')); ?>" method="POST" id="collaborator-request-form">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="type" value="collaborator_inquiry">
                        <input type="hidden" name="collaborator_name" value="<?php echo e($collaborator->title); ?>">
                        <input type="hidden" name="collaborator_id" value="<?php echo e($collaborator->id); ?>">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="collab_first_name" class="form-label">First Name *</label>
                                    <input type="text" name="first_name" id="collab_first_name" class="form-control"
                                        placeholder="Enter your first name" value="<?php echo e(old('first_name')); ?>" required>
                                    <?php $__errorArgs = ['first_name'];
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
                                <div class="form-group">
                                    <label for="collab_last_name" class="form-label">Last Name *</label>
                                    <input type="text" name="last_name" id="collab_last_name" class="form-control"
                                        placeholder="Enter your last name" value="<?php echo e(old('last_name')); ?>" required>
                                    <?php $__errorArgs = ['last_name'];
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
                                <div class="form-group">
                                    <label for="collab_email" class="form-label">Email Address *</label>
                                    <input type="email" name="email" id="collab_email" class="form-control"
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
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="collab_phone" class="form-label">Phone Number *</label>
                                    <input type="tel" name="phone" id="collab_phone" class="form-control"
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
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="collab_company" class="form-label">Company Name *</label>
                            <input type="text" name="company_name" id="collab_company" class="form-control"
                                placeholder="Enter your company name" value="<?php echo e(old('company_name')); ?>" required>
                            <?php $__errorArgs = ['company_name'];
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

                        <div class="form-group">
                            <label for="collab_message" class="form-label">Message</label>
                            <textarea name="message" id="collab_message" class="form-control" rows="4"
                                placeholder="Tell us how we can help"><?php echo e(old('message')); ?></textarea>
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

<section class="collab-contact-band" id="contact-neverforget">
    <div class="container">
        <h2>Contact NEVER FORGET</h2>
        <p class="mb-30">Prefer to reach us directly? Visit our contact page and our team will assist you.</p>
        <a href="<?php echo e(route('contact-us')); ?>" class="btn primary-btn border-0">Contact NEVER FORGET</a>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.website.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\neverforget-updated\resources\views/website/collaborators/show.blade.php ENDPATH**/ ?>