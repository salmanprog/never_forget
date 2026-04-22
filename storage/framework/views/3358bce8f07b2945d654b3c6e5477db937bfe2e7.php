<?php
    if (Auth::user()->hasRole('Admin')) {
        $layout = 'layouts.admin.app';
    } elseif (Auth::user()->hasRole('Individual')) {
        $layout = 'layouts.individual.app';
    } elseif (Auth::user()->hasRole('Company')) {
        $layout = 'layouts.company.app';
    } else {
        $layout = 'layouts.company.app';
    }
?>


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
                    <div class="row" style="margin-bottom: 15px;">
                        <div class="col-sm-6">
                            <span class="badge label-info" style="font-size: 14px; padding: 8px 12px;">Friends/Family: <?php echo e($records->total()); ?></span>
                        </div>
                    </div>
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
                                <?php $__empty_1 = true; $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($records->firstItem() + $key); ?>.</td>
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
                                        <td>
                                            <select class="form-control input-sm delivery-status-select" data-id="<?php echo e($row->id); ?>" data-user-id="<?php echo e($user->id); ?>" style="min-width: 100px;">
                                                <option value="pending" <?php echo e(($row->delivery_status ?? 'pending') == 'pending' ? 'selected' : ''); ?>>Pending</option>
                                                <option value="shipped" <?php echo e(($row->delivery_status ?? '') == 'shipped' ? 'selected' : ''); ?>>Shipped</option>
                                                <option value="delivered" <?php echo e(($row->delivery_status ?? '') == 'delivered' ? 'selected' : ''); ?>>Delivered</option>
                                                <option value="cancelled" <?php echo e(($row->delivery_status ?? '') == 'cancelled' ? 'selected' : ''); ?>>Cancelled</option>
                                            </select>
                                        </td>
                                        <td><?php echo e(\Illuminate\Support\Str::limit($row->notes ?? '', 30)); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="24" class="text-center">No friends/family found.</td>
                                    </tr>
                                <?php endif; ?>
                                <?php if($records->count() > 0): ?>
                                    <tr>
                                        <td colspan="24">
                                            Displaying <?php echo e($records->firstItem()); ?> to <?php echo e($records->lastItem()); ?> of <?php echo e($records->total()); ?> records
                                            <div class="d-flex justify-content-center">
                                                <?php echo $records->links('pagination::bootstrap-4'); ?>

                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<script>
$(function() {
    $('.delivery-status-select').on('change', function() {
        var select = $(this);
        var userId = select.data('user-id');
        var id = select.data('id');
        var status = select.val();
        var url = '<?php echo e(url("user")); ?>/' + userId + '/friends-family/' + id + '/delivery-status';
        $.ajax({
            url: url,
            type: 'PATCH',
            data: { delivery_status: status, _token: '<?php echo e(csrf_token()); ?>' },
            success: function() {},
            error: function() { select.val(select.data('prev') || 'pending'); }
        });
        select.data('prev', status);
    });
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($layout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\admin\user\friends_family.blade.php ENDPATH**/ ?>