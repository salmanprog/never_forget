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
                            <span class="badge label-primary" style="font-size: 14px; padding: 8px 12px;">Employees: <?php echo e($employeesCount); ?></span>
                        </div>
                        <div class="col-sm-6">
                            <span class="badge label-info" style="font-size: 14px; padding: 8px 12px;">Clients: <?php echo e($clientsCount); ?></span>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Contact Type</th>
                                    <th>Client Status</th>
                                    <th>Client Since</th>
                                    <th>Department</th>
                                    <th>Employee ID</th>
                                    <th>Job Title</th>
                                    <th>Hire Date</th>
                                    <th>Employment Status</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Shipping Address</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Zip</th>
                                    <th>DOB</th>
                                    <th>Work Anniversary Date</th>
                                    <th>Favorite Color</th>
                                    <th>Hobbies</th>
                                    <th>Dietry Restriction</th>
                                    <th>Budget Range</th>
                                    <th>Gift Preferences</th>
                                    <th>Occasion</th>
                                    <th>Gift Sent Date</th>
                                    <th>Payment Method</th>
                                    <th>Tracking Number</th>
                                    <th>Delivery Note</th>
                                    <th>Delivery Status</th>
                                    <th>Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($employees->firstItem() + $key); ?>.</td>
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
                                        <td>
                                            <select class="form-control input-sm delivery-status-select" data-employee-id="<?php echo e($employee->id); ?>" data-user-id="<?php echo e($companyUser->id); ?>" style="min-width: 100px;">
                                                <option value="pending" <?php echo e(($employee->delivery_status ?? '') == 'pending' ? 'selected' : ''); ?>>Pending</option>
                                                <option value="shipped" <?php echo e(($employee->delivery_status ?? '') == 'shipped' ? 'selected' : ''); ?>>Shipped</option>
                                                <option value="delivered" <?php echo e(($employee->delivery_status ?? '') == 'delivered' ? 'selected' : ''); ?>>Delivered</option>
                                                <option value="cancelled" <?php echo e(($employee->delivery_status ?? '') == 'cancelled' ? 'selected' : ''); ?>>Cancelled</option>
                                            </select>
                                        </td>
                                        <td><?php echo e(\Illuminate\Support\Str::limit($employee->notes ?? '', 30)); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="30" class="text-center">No resources found.</td>
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
        var employeeId = select.data('employee-id');
        var status = select.val();
        var url = '<?php echo e(url("user")); ?>/' + userId + '/resources/' + employeeId + '/delivery-status';
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

<?php echo $__env->make($layout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\admin\user\resources.blade.php ENDPATH**/ ?>