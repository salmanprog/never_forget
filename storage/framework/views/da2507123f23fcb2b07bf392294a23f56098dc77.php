<?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr id="id-<?php echo e($model->id); ?>">
        <td><?php echo e($models->firstItem()+$key); ?>.</td>
        <td><?php echo e($model->first_name); ?> <?php echo e($model->last_name); ?></td>
        <td><?php echo \Illuminate\Support\Str::limit($model->company,20); ?></td>
        <td><?php echo \Illuminate\Support\Str::limit($model->country,30); ?></td>
        <td><?php echo \Illuminate\Support\Str::limit($model->street,50); ?></td>
        <td><?php echo \Illuminate\Support\Str::limit($model->town,50); ?></td>
        <td><?php echo \Illuminate\Support\Str::limit($model->postcode,50); ?></td>
        <td><?php echo \Illuminate\Support\Str::limit($model->phone,50); ?></td>
        <td><?php echo \Illuminate\Support\Str::limit($model->email,50); ?></td>
        <td>
            <?php if($model->status): ?>
                <span class="label label-success">Active</span>
            <?php else: ?>
                <span class="label label-danger">In-Active</span>
            <?php endif; ?>
        </td>
        <td width="250px">
            <a href="<?php echo e(route('billing_address.edit', $model->id)); ?>" data-toggle="tooltip" data-placement="top" title="Edit Billing Address" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
            <button class="btn btn-danger btn-xs delete" data-slug="<?php echo e($model->id); ?>" data-del-url="<?php echo e(url('billing_address', $model->id)); ?>"><i class="fa fa-trash"></i> Delete</button>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td colspan="10">
        Displying <?php echo e($models->firstItem()); ?> to <?php echo e($models->lastItem()); ?> of <?php echo e($models->total()); ?> records
        <div class="d-flex justify-content-center">
            <?php echo $models->links('pagination::bootstrap-4'); ?>

        </div>
    </td>
</tr>
<?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\admin\billing_address\search.blade.php ENDPATH**/ ?>