<?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr id="id-<?php echo e($employee->id); ?>">
        <td><?php echo e($employees->firstItem()+$key); ?>.</td>
        <td><?php echo e($employee->first_name); ?></td>
        <td><?php echo e($employee->last_name); ?></td>
        <td><?php echo e($employee->email); ?></td>
        <td><?php echo e($employee->phone ?? 'N/A'); ?></td>
        <td>
            <span class="badge <?php echo e($employee->type == 'employee' ? 'label-primary' : 'label-info'); ?>">
                <?php echo e(ucfirst($employee->type)); ?>

            </span>
        </td>
        <td>
            <?php if($employee->is_active): ?>
                <span class="badge label-success">Active</span>
            <?php else: ?>
                <span class="badge label-danger">Pending</span>
            <?php endif; ?>
        </td>
        <td><?php echo e($employee->invited_at ? $employee->invited_at->format('M d, Y') : 'N/A'); ?></td>
        <td>
            <a href="<?php echo e(route('admin.company_employee.edit', $employee->id)); ?>" class="btn btn-primary btn-xs">
                <i class="fa fa-edit"></i> Edit
            </a>
            <?php if(!$employee->is_active): ?>
                <a href="<?php echo e(route('admin.company_employee.resend-invitation', $employee->id)); ?>" class="btn btn-warning btn-xs">
                    <i class="fa fa-envelope"></i> Resend
                </a>
            <?php endif; ?>
            <button class="btn btn-danger btn-xs delete" data-id="<?php echo e($employee->id); ?>" data-del-url="<?php echo e(route('admin.company_employee.destroy', $employee->id)); ?>">
                <i class="fa fa-trash"></i> Delete
            </button>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td colspan="9">
        Displaying <?php echo e($employees->firstItem()); ?> to <?php echo e($employees->lastItem()); ?> of <?php echo e($employees->total()); ?> records
        <div class="d-flex justify-content-center">
            <?php echo $employees->links('pagination::bootstrap-4'); ?>

        </div>
    </td>
</tr>
<?php /**PATH D:\xampp\htdocs\never-forget\resources\views/admin/company_employee/search.blade.php ENDPATH**/ ?>