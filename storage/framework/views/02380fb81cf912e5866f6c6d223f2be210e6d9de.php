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




<?php $__env->startSection('content'); ?>
<section class="content-header">
	<div class="content-header-left">
		<h1>Resource Gifting</h1>
	</div>
	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('order-create')): ?>
	<div class="content-header-right">
		
	</div>
	<?php endif; ?>
</section>
<section class="content">
    <div class="box box-info">
        <div class="box-body">
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
                        <?php $__empty_1 = true; $__currentLoopData = $sentGifts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($key + 1); ?>.</td>
                                <td>
                                    <span class="badge <?php echo e($row->type == 'employee' ? 'label-primary' : 'label-info'); ?>">
                                        <?php echo e(ucfirst($row->type)); ?>

                                    </span>
                                </td>
                                <td><?php echo e($row->client_status ?? '—'); ?></td>
                                <td><?php echo e($row->client_since ?? '—'); ?></td>
                                <td><?php echo e($row->department ?? '—'); ?></td>
                                <td><?php echo e($row->employee_id ?? '—'); ?></td>
                                <td><?php echo e($row->job_title ?? '—'); ?></td>
                                <td><?php echo e($row->hire_date ? \Carbon\Carbon::parse($row->hire_date)->format('M d, Y') : '—'); ?></td>
                                <td><?php echo e($row->employment_status ?? '—'); ?></td>
                                <td><?php echo e($row->first_name); ?></td>
                                <td><?php echo e($row->last_name); ?></td>
                                <td><?php echo e($row->email); ?></td>
                                <td><?php echo e($row->shipping_address ?? '—'); ?></td>
                                <td><?php echo e($row->city ?? '—'); ?></td>
                                <td><?php echo e($row->state ?? '—'); ?></td>
                                <td><?php echo e($row->zip ?? '—'); ?></td>
                                <td><?php echo e($row->date_of_birth ? \Carbon\Carbon::parse($row->date_of_birth)->format('M d, Y') : '—'); ?></td>
                                <td><?php echo e($row->work_anniversary_date ? \Carbon\Carbon::parse($row->work_anniversary_date)->format('M d, Y') : '—'); ?></td>
                                <td><?php echo e($row->favorite_color ?? '—'); ?></td>
                                <td><?php echo e($row->hobbies ?? '—'); ?></td>
                                <td><?php echo e($row->dietry_restriction ?? '—'); ?></td>
                                <td><?php echo e($row->budget_range ?? '—'); ?></td>
                                <td><?php echo e($row->gift_preferences ?? '—'); ?></td>
                                <td><?php echo e($row->occasion ?? '—'); ?></td>
                                <td><?php echo e($row->gift_send_date ? \Carbon\Carbon::parse($row->gift_send_date)->format('M d, Y') : '—'); ?></td>
                                <td><?php echo e($row->payment_method ?? '—'); ?></td>
                                <td><?php echo e($row->tracking_number ?? '—'); ?></td>
                                <td><?php echo e(\Illuminate\Support\Str::limit($row->delivery_notes ?? '', 30)); ?></td>
                                <td><?php echo e(ucfirst($row->delivery_status ?? '—')); ?></td>
                                <td><?php echo e(\Illuminate\Support\Str::limit($row->notes ?? '', 30)); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="29" class="text-center">No sent gifts yet.</td>
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


<?php echo $__env->make($layout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\never-forget\resources\views/admin/employee-gifting/index.blade.php ENDPATH**/ ?>