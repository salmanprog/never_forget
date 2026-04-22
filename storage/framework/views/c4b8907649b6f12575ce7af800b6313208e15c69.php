<?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr class="enquiry-summary-row">
    <td><?php echo e($models->firstItem() + $key); ?>.</td>
    <td width="80px"><?php echo e($model->order_number); ?></td>
    <td><?php echo e($model->created_at->format('d M Y H:i A')); ?></td>
    <td>
        <button type="button" class="btn btn-xs btn-default btn-toggle-enquiry-detail" data-target="business-card-detail-<?php echo e($model->id); ?>" aria-expanded="false">
            <i class="fa fa-chevron-down"></i> View details
        </button>
    </td>
</tr>
<tr class="enquiry-detail-row" id="business-card-detail-<?php echo e($model->id); ?>" style="display: none;">
    <td colspan="4" class="bg-light">
        <div class="p-3">
            <?php if($model->hasOrderDetails && $model->hasOrderDetails->count() > 0): ?>
                <strong>Order line items</strong>
                <table class="table table-bordered table-condensed mt-2 mb-0">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Sub total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $model->hasOrderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <?php if($orderDetail->productsItem): ?>
                                    <?php echo e($orderDetail->productsItem->name); ?>

                                <?php elseif($orderDetail->product_slug): ?>
                                    <?php echo e($orderDetail->product_slug); ?>

                                <?php else: ?>
                                    —
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($orderDetail->quantity ?? 0); ?></td>
                            <td>$<?php echo e(number_format($orderDetail->price ?? 0, 2)); ?></td>
                            <td>$<?php echo e(number_format($orderDetail->sub_total ?? 0, 2)); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="mb-0 text-muted">No order details.</p>
            <?php endif; ?>
        </div>
    </td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td colspan="4">
        Displaying <?php echo e($models->firstItem()); ?> to <?php echo e($models->lastItem()); ?> of <?php echo e($models->total()); ?> records
        <div class="d-flex justify-content-center">
            <?php echo $models->links('pagination::bootstrap-4'); ?>

        </div>
    </td>
</tr>
<?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\website\individual-dashboard\business-card-orders-partials\table.blade.php ENDPATH**/ ?>