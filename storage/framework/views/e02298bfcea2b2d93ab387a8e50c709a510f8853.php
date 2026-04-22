
<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
<input type="hidden" id="page_url" value="<?php echo e(route('admin.company_employee.index')); ?>">
<section class="content-header">
    <div class="content-header-left">
        <h1>Company Resources</h1>
    </div>
    <div class="content-header-right">
        <?php if($company): ?>
            <!-- <a href="<?php echo e(route('admin.company.edit')); ?>" class="btn btn-info btn-sm">Edit Company</a> -->
            <?php echo $__env->make('includes.buttons.back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <a href="<?php echo e(route('admin.company_employee.create')); ?>" class="btn btn-primary btn-sm">Add Resource</a>
            <a href="<?php echo e(route('admin.company_employee.bulk-upload')); ?>" class="btn btn-success btn-sm">Bulk Upload</a>
        <?php else: ?>
            <a href="<?php echo e(route('admin.company.create')); ?>" class="btn btn-primary btn-sm">Create Company</a>
        <?php endif; ?>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?php echo $__env->make('includes.upgrade_alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php if(session('success')): ?>
                <div class="callout callout-success">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <?php if(session('warning')): ?>
                <div class="callout callout-warning">
                    <?php echo e(session('warning')); ?>

                </div>
            <?php endif; ?>

            <?php if(session('error')): ?>
                <div class="callout callout-danger">
                    <?php echo e(session('error')); ?>

                </div>
            <?php endif; ?>

            <?php if(session('info')): ?>
                <div class="callout callout-info">
                    <?php echo e(session('info')); ?>

                </div>
            <?php endif; ?>

            <?php if(!$company): ?>
                <div class="box box-warning">
                    <div class="box-body text-center" style="padding: 40px;">
                        <i class="fa fa-building-o" style="font-size: 64px; color: #f39c12; margin-bottom: 20px;"></i>
                        <h3>No Company Found</h3>
                        <p>You need to create a company first before you can manage employees.</p>
                        <a href="<?php echo e(route('admin.company.create')); ?>" class="btn btn-primary btn-lg" style="margin-top: 20px;">
                            <i class="fa fa-plus"></i> Create Company
                        </a>
                    </div>
                </div>
            <?php else: ?>
                <div class="box box-info">
                    <div class="box-body">
                        <form method="GET" action="<?php echo e(route('admin.company_employee.index')); ?>">
                            <div class="row" style="margin-bottom:10px">
                                <div class="d-flex col-sm-6">
                                    <input type="text" name="search" id="search" class="form-control" placeholder="Search by name, email, or phone" value="<?php echo e(request('search')); ?>">
                                </div>
                                <div class="d-flex col-sm-3">
                                    <select name="type" id="type" class="form-control status" style="margin-bottom:5px" onchange="this.form.submit()">
                                        <option value="All" <?php echo e(request('type') == 'All' ? 'selected' : ''); ?>>All Types</option>
                                        <option value="employee" <?php echo e(request('type') == 'employee' ? 'selected' : ''); ?>>Employee</option>
                                        <option value="client" <?php echo e(request('type') == 'client' ? 'selected' : ''); ?>>Client</option>
                                    </select>
                                </div>
                                
                                
                            </div>
                        </form>
                        <div class="table-responsive">
                        <table id="" class="table table-bordered table-striped">
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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="body">
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
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<script>
$(document).ready(function() {
    // Submit form on Enter key press in search field
    $('#search').on('keypress', function(e) {
        if (e.which === 13) { // Enter key
            e.preventDefault();
            $(this).closest('form').submit();
        }
    });

    // Delete functionality
    $(document).on('click', '.delete', function() {
        var id = $(this).data('id');
        var url = $(this).data('del-url');
        
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    success: function(response) {
                        $('#id-' + id).remove();
                        Swal.fire(
                            'Deleted!',
                            'Employee has been deleted successfully.',
                            'success'
                        ).then(() => {
                            window.location.reload();
                        });
                    },
                    error: function() {
                        Swal.fire(
                            'Error!',
                            'Something went wrong while deleting the employee.',
                            'error'
                        );
                    }
                });
            }
        });
    });
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.company.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\admin\company_employee\index.blade.php ENDPATH**/ ?>