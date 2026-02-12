<?php
    if (Auth::user()->hasRole('Admin')) {
        $layout = 'layouts.admin.app';
    } elseif (Auth::user()->hasRole('Sales Person')) {
        $layout = 'layouts.sales-person.app';
    } else {
        $layout = 'layouts.admin.app';
    }
?>

<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
<section class="content-header">
    <div class="content-header-left">
        <h1><?php echo e($page_title); ?></h1>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-body">
                    <?php if($replies->isEmpty()): ?>
                        <p class="text-muted">No replies yet. When users reply to SMS sent from the MTS Dashboard, their messages will appear here.</p>
                    <?php else: ?>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>From (Phone)</th>
                                    <th>Message</th>
                                    <th>Received At</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($replies->firstItem() + $key); ?></td>
                                        <td><?php echo e($reply->from_number); ?></td>
                                        <td><?php echo e($reply->body); ?></td>
                                        <td><?php echo e($reply->created_at->format('M d, Y h:i A')); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center mt-3">
                            <?php echo $replies->links('pagination::bootstrap-4'); ?>

                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($layout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\never-forget-13nov\resources\views/admin/mts-dashboard/sms-replies.blade.php ENDPATH**/ ?>