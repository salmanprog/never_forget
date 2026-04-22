<?php
    if (Auth::user()->hasRole('Admin')) {
        $layout = 'layouts.admin.app';
    } elseif (Auth::user()->hasRole('Individual')) {
        $layout = 'layouts.individual.app';
    } else {
        $layout = 'layouts.individual.app';
    }
?>


<?php $__env->startSection('content'); ?>
<section class="content-header">
    <div class="content-header-left">
        <h1>Friends/Family Gifting History</h1>
    </div>
    <div class="content-header-right">
        <?php echo $__env->make('includes.buttons.back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <a href="<?php echo e(route('member.friends_family.index')); ?>" class="btn btn-primary btn-sm">View All</a>
    </div>
</section>
<section class="content">
    <div class="box box-info">
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Recipient First Name</th>
                            <th>Recipient Last Name</th>
                            <th>Relationship with Client</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Occasion</th>
                            <th>Occasion Date</th>
                            <th>Gift Preferences</th>
                            <th>Favorite Color</th>
                            <th>Dietry Restrictions</th>
                            <th>Budget</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>State</th>
                            <th>ZIP</th>
                            <th>Delivery Date</th>
                            <th>Delivery Note</th>
                            <th>Message with gift</th>
                            <th>Payment Method</th>
                            <th>Tracking Number</th>
                            <th>Delivery Status</th>
                            <th>Notes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $sentGifts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($key + 1); ?>.</td>
                                <td><?php echo e($row->recipient_first_name); ?></td>
                                <td><?php echo e($row->recipient_last_name); ?></td>
                                <td><?php echo e($row->relationship_with_client ?? '—'); ?></td>
                                <td><?php echo e($row->email); ?></td>
                                <td><?php echo e($row->phone ?? '—'); ?></td>
                                <td><?php echo e($row->occasion ?? '—'); ?></td>
                                <td><?php echo e($row->occasion_date ? $row->occasion_date->format('M d, Y') : '—'); ?></td>
                                <td><?php echo e($row->gift_preferences ?? '—'); ?></td>
                                <td><?php echo e($row->favorite_color ?? '—'); ?></td>
                                <td><?php echo e($row->dietry_restrictions ?? '—'); ?></td>
                                <td><?php echo e($row->budget ?? '—'); ?></td>
                                <td><?php echo e($row->address ?? '—'); ?></td>
                                <td><?php echo e($row->city ?? '—'); ?></td>
                                <td><?php echo e($row->state ?? '—'); ?></td>
                                <td><?php echo e($row->zip ?? '—'); ?></td>
                                <td><?php echo e($row->delivery_date ? $row->delivery_date->format('M d, Y') : '—'); ?></td>
                                <td><?php echo e(\Illuminate\Support\Str::limit($row->delivery_note ?? '', 30)); ?></td>
                                <td><?php echo e(\Illuminate\Support\Str::limit($row->message_with_gift ?? '', 30)); ?></td>
                                <td><?php echo e($row->payment_method ?? '—'); ?></td>
                                <td><?php echo e($row->tracking_number ?? '—'); ?></td>
                                <td><?php echo e(ucfirst($row->delivery_status ?? '—')); ?></td>
                                <td><?php echo e(\Illuminate\Support\Str::limit($row->notes ?? '', 30)); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="23" class="text-center">No sent gifts yet.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($layout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\admin\friends_family\gifting.blade.php ENDPATH**/ ?>