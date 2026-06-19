
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
                <?php if(session('status')): ?>
                    <div class="callout callout-success">
                        <?php echo e(session('status')); ?>

                    </div>
                <?php endif; ?>

                <div class="box box-info">
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Specify type</th>
                                        <th>Message</th>
                                        <th>Date</th>
                                        <th width="140">Action</th>
                                        <th>Contacts</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $greetingsEnquiries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enquiry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($enquiry->user_name); ?></td>
                                            <td><?php echo e($enquiry->email); ?></td>
                                            <td><?php echo e($enquiry->phone ?: 'No Phone'); ?></td>
                                            <td><?php echo e($enquiry->specify_type ?: '—'); ?></td>
                                            <td><?php echo e($enquiry->message ?: 'No message'); ?></td>
                                            <td><?php echo e($enquiry->created_at->format('d M Y')); ?></td>
                                            <td>
                                                <a class="btn btn-info btn-sm"
                                                    href="<?php echo e(route('greetings_appreciation_enquiry.show', $enquiry->id)); ?>">view</a>
                                            </td>
                                            <td>
                                                <div class="btn-group mts-contacts-btn-group" role="group">
                                                    <?php if($enquiry->phone): ?>
                                                        <button type="button" class="btn btn-success btn-xs btn-open-message-modal"
                                                            title="Send Text"
                                                            data-name="<?php echo e($enquiry->user_name); ?>"
                                                            data-last-name=""
                                                            data-phone="<?php echo e($enquiry->phone); ?>">
                                                            <i class="fa fa-comment"></i>
                                                        </button>
                                                    <?php endif; ?>
                                                    <?php if($enquiry->phone): ?>
                                                        <button type="button" class="btn btn-primary btn-xs btn-initiate-call"
                                                            title="Make Call (Twilio)"
                                                            data-phone="<?php echo e($enquiry->phone); ?>"
                                                            data-name="<?php echo e($enquiry->user_name); ?>">
                                                            <i class="fa fa-phone"></i>
                                                        </button>
                                                    <?php endif; ?>
                                                    <button type="button" class="btn btn-info btn-xs btn-open-email-modal"
                                                        title="Send Email"
                                                        data-email="<?php echo e($enquiry->email); ?>"
                                                        data-name="<?php echo e($enquiry->user_name); ?>">
                                                        <i class="fa fa-envelope"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                <?php echo $greetingsEnquiries->links('pagination::bootstrap-4'); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php echo $__env->make('includes.admin.mts-modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <?php echo $__env->make('includes.admin.mts-functions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\admin\greetings-appreciation-enquiry\index.blade.php ENDPATH**/ ?>