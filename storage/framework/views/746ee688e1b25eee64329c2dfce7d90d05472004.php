<?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td><?php echo e($models->firstItem() + $key); ?>.</td>
    <td width="80px"><?php echo e($model->order_number); ?></td>
    <td>
        <?php $__currentLoopData = $model->hasOrderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($orderDetail->productsItem): ?>
                <?php echo e($orderDetail->productsItem->name); ?>

            <?php elseif($orderDetail->product_slug): ?>
                <?php echo e($orderDetail->product_slug); ?>

            <?php else: ?>
                <span class="badge badge-danger">No Product</span>
            <?php endif; ?>
            <br>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </td>
    <td>
        <?php $__currentLoopData = $model->hasOrderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            $<?php echo e(number_format($orderDetail->price, 2)); ?><br>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </td>
    <td><?php echo e($model->created_at->format('d, m-Y H:i A')); ?></td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td colspan="5">
        Displaying <?php echo e($models->firstItem()); ?> to <?php echo e($models->lastItem()); ?> of <?php echo e($models->total()); ?> records
        <div class="d-flex justify-content-center">
            <?php echo $models->links('pagination::bootstrap-4'); ?>

        </div>
    </td>
</tr>
<?php /**PATH D:\xampp\htdocs\never-forget\resources\views/website/individual-dashboard/business-card-orders-partials/table.blade.php ENDPATH**/ ?>