
<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
    <section class="content-header">
        <div class="content-header-left">
            <h1><?php echo e($page_title); ?></h1>
        </div>
        <div class="content-header-right">
            <?php echo $__env->make('includes.buttons.back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-body">
                        <table class="table table-bordered table-striped">
                            <tr><th colspan="2">E-Card Enquiry Detail</th></tr>
                            <tr><th width="200">Status</th><td><strong><?php echo e($enquiry->status); ?></strong></td></tr>
                            <tr><th>E-Card category</th><td><?php echo e(optional($enquiry->eCardCategory)->title ?? '—'); ?></td></tr>
                            <tr><th>Occasion</th><td><?php echo e($enquiry->occasion); ?></td></tr>
                            <tr><th>Recipient Name</th><td><?php echo e($enquiry->recipient_name); ?></td></tr>
                            <tr><th>Recipient Email / Phone</th><td><?php echo e($enquiry->recipient_email_phone); ?></td></tr>
                            <tr><th>Message</th><td><?php echo e($enquiry->message ?? '—'); ?></td></tr>
                            <tr><th>Preferred Card Style</th><td><?php echo e($enquiry->card_style ?? '—'); ?></td></tr>
                            <?php if($enquiry->upload_logo_photo): ?>
                            <?php
                                $imgPath = $enquiry->upload_logo_photo;
                                $imgSrc = file_exists(public_path($imgPath)) ? asset('/public/' . $imgPath) : asset('storage/' . $imgPath);
                            ?>
                            <tr><th>Uploaded Logo / Photo</th><td><img src="<?php echo e($imgSrc); ?>" alt="Upload" style="min-width: 100px; max-width: 200px; max-height: 150px;"></td></tr>
                            <?php endif; ?>
                            <tr><th>Send Date</th><td><?php echo e(\Carbon\Carbon::parse($enquiry->send_date)->format('d M Y')); ?></td></tr>
                            <tr><th>Send Time</th><td><?php echo e(\Carbon\Carbon::parse($enquiry->send_time)->format('h:i A')); ?></td></tr>
                            <tr><th>Add Physical Gift?</th><td><?php echo e($enquiry->physical_gift); ?></td></tr>
                            <?php if($enquiry->physical_gift == 'Yes'): ?>
                            <tr><th>Physical Gift Type</th><td><?php echo e($enquiry->physical_gift_type ?? '—'); ?></td></tr>
                            <?php endif; ?>
                            <tr><th>Sender Name</th><td><?php echo e($enquiry->sender_name ?? '—'); ?></td></tr>
                            <tr><th>Sender Email</th><td><?php echo e($enquiry->sender_email ?? '—'); ?></td></tr>
                            <tr><th>Sender Phone</th><td><?php echo e($enquiry->sender_phone ?? '—'); ?></td></tr>
                            <tr><th>Company Name</th><td><?php echo e($enquiry->company_name ?? '—'); ?></td></tr>
                            <tr><th>Submitted At</th><td><?php echo e($enquiry->created_at->format('d M Y h:i A')); ?></td></tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\admin\e-card-enquiry\show.blade.php ENDPATH**/ ?>