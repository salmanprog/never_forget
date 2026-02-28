<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
<section class="content-header">
    <div class="content-header-left">
        <h1><?php echo e($page_title); ?></h1>
    </div>
    <div class="content-header-right">
        <a href="<?php echo e(route('user.index')); ?><?php echo e(request()->get('type') ? '?type=' . request()->get('type') : ''); ?>" class="btn btn-default btn-sm"><i class="fa fa-arrow-left"></i> Back to Company Users</a>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?php if(session('success')): ?>
                <div class="callout callout-success"><?php echo e(session('success')); ?></div>
            <?php endif; ?>
            <?php if(session('error')): ?>
                <div class="callout callout-danger"><?php echo e(session('error')); ?></div>
            <?php endif; ?>
            <?php if(session('info')): ?>
                <div class="callout callout-info"><?php echo e(session('info')); ?></div>
            <?php endif; ?>

            <div class="box box-info">
                <div class="box-body">
                    <p class="text-muted">Company: <strong><?php echo e($company->name); ?></strong> — User: <?php echo e($companyUser->name); ?> <?php echo e($companyUser->last_name ?? ''); ?></p>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>DOB</th>
                                <th>Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($employees->firstItem() + $key); ?>.</td>
                                    <td><?php echo e($employee->first_name); ?></td>
                                    <td><?php echo e($employee->last_name); ?></td>
                                    <td><?php echo e($employee->email); ?></td>
                                    <td><?php echo e($employee->phone ?? 'N/A'); ?></td>
                                    <td><?php echo e($employee->date_of_birth ? \Carbon\Carbon::parse($employee->date_of_birth)->format('M d, Y') : 'N/A'); ?></td>
                                    <td>
                                        <span class="badge <?php echo e($employee->type == 'employee' ? 'label-primary' : 'label-info'); ?>"><?php echo e(ucfirst($employee->type)); ?></span>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="7" class="text-center">No resources (employees) uploaded yet.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <?php if($employees->hasPages()): ?>
                        <div class="d-flex justify-content-center" style="margin-top: 15px;">
                            <?php echo $employees->links('pagination::bootstrap-4'); ?>

                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\never-forget\resources\views/admin/user/company_resources.blade.php ENDPATH**/ ?>