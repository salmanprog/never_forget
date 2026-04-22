<?php $__empty_1 = true; $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <tr id="id-<?php echo e($employee->id); ?>">
        <td><?php echo e($employees->firstItem()+$key); ?>.</td>
        <td>
            <span class="badge <?php echo e($employee->type == 'employee' ? 'label-primary' : 'label-info'); ?>">
                <?php echo e(ucfirst($employee->type)); ?>

            </span>
        </td>
        <td><?php echo e($employee->client_status ?? '—'); ?></td>
        <td><?php echo e($employee->client_since ?? '—'); ?></td>
        <td><?php echo e($employee->department ?? '—'); ?></td>
        <td><?php echo e($employee->employee_id ?? '—'); ?></td>
        <td><?php echo e($employee->job_title ?? '—'); ?></td>
        <td><?php echo e($employee->hire_date ? \Carbon\Carbon::parse($employee->hire_date)->format('M d, Y') : '—'); ?></td>
        <td><?php echo e($employee->employment_status ?? '—'); ?></td>
        <td><?php echo e($employee->first_name); ?></td>
        <td><?php echo e($employee->last_name); ?></td>
        <td><?php echo e($employee->email); ?></td>
        <td><?php echo e($employee->shipping_address ?? '—'); ?></td>
        <td><?php echo e($employee->city ?? '—'); ?></td>
        <td><?php echo e($employee->state ?? '—'); ?></td>
        <td><?php echo e($employee->zip ?? '—'); ?></td>
        <td><?php echo e($employee->date_of_birth ? \Carbon\Carbon::parse($employee->date_of_birth)->format('M d, Y') : '—'); ?></td>
        <td><?php echo e($employee->work_anniversary_date ? \Carbon\Carbon::parse($employee->work_anniversary_date)->format('M d, Y') : '—'); ?></td>
        <td><?php echo e($employee->favorite_color ?? '—'); ?></td>
        <td><?php echo e($employee->hobbies ?? '—'); ?></td>
        <td><?php echo e($employee->dietry_restriction ?? '—'); ?></td>
        <td><?php echo e($employee->budget_range ?? '—'); ?></td>
        <td><?php echo e($employee->gift_preferences ?? '—'); ?></td>
        <td><?php echo e($employee->occasion ?? '—'); ?></td>
        <td><?php echo e($employee->gift_send_date ? \Carbon\Carbon::parse($employee->gift_send_date)->format('M d, Y') : '—'); ?></td>
        <td><?php echo e($employee->payment_method ?? '—'); ?></td>
        <td><?php echo e($employee->tracking_number ?? '—'); ?></td>
        <td><?php echo e(\Illuminate\Support\Str::limit($employee->delivery_notes ?? '', 30)); ?></td>
        <td><?php echo e($employee->delivery_status ?? '—'); ?></td>
        <td><?php echo e(\Illuminate\Support\Str::limit($employee->notes ?? '', 30)); ?></td>
        <td>
            <a href="<?php echo e(route('admin.company_employee.edit', $employee->id)); ?>" class="btn btn-primary btn-xs">
                <i class="fa fa-edit"></i> Edit
            </a>
            <button class="btn btn-danger btn-xs delete" data-id="<?php echo e($employee->id); ?>" data-del-url="<?php echo e(route('admin.company_employee.destroy', $employee->id)); ?>">
                <i class="fa fa-trash"></i> Delete
            </button>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <tr>
        <td colspan="30" class="text-center">No employees found.</td>
    </tr>
<?php endif; ?>
<?php if($employees->count() > 0): ?>
<tr>
    <td colspan="30">
        Displaying <?php echo e($employees->firstItem()); ?> to <?php echo e($employees->lastItem()); ?> of <?php echo e($employees->total()); ?> records
        <div class="d-flex justify-content-center">
            <?php echo $employees->links('pagination::bootstrap-4'); ?>

        </div>
    </td>
</tr>
<?php endif; ?>
<?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\admin\company_employee\search.blade.php ENDPATH**/ ?>