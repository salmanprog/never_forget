<?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr id="id-<?php echo e($model->id); ?>">
        <td><?php echo e($models->firstItem()+$key); ?>.</td>
        <td><?php echo e($model->first_name); ?></td>
        <td><?php echo e($model->last_name); ?></td>
        <td><?php echo e($model->email); ?></td>
        <td><?php echo e($model->phone); ?></td>
        <td><?php echo e($model->company); ?></td>
        <td><?php echo e($model->plans); ?></td>
        <td><?php echo e($model->quantity); ?></td>
        <td><?php echo e($model->message); ?></td>
        <td>
            <?php if($model->status): ?>
                <span class="badge label-success">Active</span>
            <?php else: ?>
                <span class="badge label-danger">In-Active</span>
            <?php endif; ?>
        </td>
        <td width="250px">
            <button class="btn btn-danger btn-xs delete" data-slug="<?php echo e($model->id); ?>" data-del-url="<?php echo e(url('contactus', $model->id)); ?>"><i class="fa fa-trash"></i> Delete</button>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td colspan="11">
        Displying <?php echo e($models->firstItem()); ?> to <?php echo e($models->lastItem()); ?> of <?php echo e($models->total()); ?> records
        <div class="d-flex justify-content-center">
            <?php echo $models->links('pagination::bootstrap-4'); ?>

        </div>
    </td>
</tr><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\admin\contact_us\search.blade.php ENDPATH**/ ?>