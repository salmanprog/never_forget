<?php
    if (Auth::user()->hasRole('Admin')) {
        $layout = 'layouts.admin.app';
    } elseif (Auth::user()->hasRole('Individual')) {
        $layout = 'layouts.individual.app';
    } elseif (Auth::user()->hasRole('Company')) {
        $layout = 'layouts.company.app';
    }elseif (Auth::user()->hasRole('Sales Person')) {
        $layout = 'layouts.sales-person.app';
    } else {
        $layout = 'layouts.sales-person.app';
    }
?>

<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
<input type="hidden" id="page_url" value="<?php echo e(route('mts-dashboard.index')); ?>">
<section class="content-header">
    <div class="content-header-left">
        <h1><?php echo e($page_title); ?></h1>
    </div> 
</section>
<style> 
    .badge-company {
        padding: 5px 10px;
        border-radius: 4px;
        background-color: #dc3545 !important;
        color: white !important;
    }
    .badge-individual {
        padding: 5px 10px;
        border-radius: 4px;
        background-color: #ffc107 !important;
        color: black !important;
    }
    .badge-unknown {
        padding: 5px 10px;
        border-radius: 4px;
        background-color: #6c757d !important;
        color: white !important;
    }
    .badge-salesperson {
        padding: 5px 10px;
        border-radius: 4px;
        background-color: #28a745 !important;
        color: white !important;
    }
</style>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?php if(session('success')): ?>
                <div class="callout callout-success">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <div class="box box-info">
                <div class="box-body">
                    <form method="GET" action="<?php echo e(route('mts-dashboard.index')); ?>">
                        <div class="row" style="margin-bottom:10px">
                            <div class="d-flex col-sm-6">
                                <input type="text" name="search" id="search" class="form-control" placeholder="Search by name, email, or phone" value="<?php echo e(request('search')); ?>">
                            </div>
                            <?php if(Auth::user()->isAdmin()): ?>
                            <div class="d-flex col-sm-3">
                                <select name="account_type" id="account_type" class="form-control account_type" style="margin-bottom:5px" onchange="this.form.submit()">
                                    <option value="All" <?php echo e(request('account_type') == 'All' ? 'selected' : ''); ?>>All Types</option>
                                    <option value="Individual" <?php echo e(request('account_type') == 'Individual' ? 'selected' : ''); ?>>Individual</option>
                                    <option value="Company" <?php echo e(request('account_type') == 'Company' ? 'selected' : ''); ?>>Company</option>
                                    <option value="Sales Person" <?php echo e(request('account_type') == 'Sales Person' ? 'selected' : ''); ?>>Sales Person</option>
                                </select>
                            </div>
                            <?php elseif(Auth::user()->hasRole('Sales Person')): ?>
                            <div class="d-flex col-sm-3">
                                <select name="account_type" id="account_type" class="form-control account_type" style="margin-bottom:5px" onchange="this.form.submit()">
                                    <option value="All" <?php echo e(request('account_type') == 'All' ? 'selected' : ''); ?>>All Types</option>
                                    <option value="Individual" <?php echo e(request('account_type') == 'Individual' ? 'selected' : ''); ?>>Individual</option>
                                    <option value="Company" <?php echo e(request('account_type') == 'Company' ? 'selected' : ''); ?>>Company</option>
                                </select>
                            </div>
                            <?php endif; ?>
                            <div class="d-flex col-sm-3">
                                <select name="status" id="status" class="form-control status" style="margin-bottom:5px" onchange="this.form.submit()">
                                    <option value="All" <?php echo e(request('status') == 'All' ? 'selected' : ''); ?>>All Status</option>
                                    <option value="1" <?php echo e(request('status') == '1' ? 'selected' : ''); ?>>Active</option>
                                    <option value="2" <?php echo e(request('status') == '2' ? 'selected' : ''); ?>>In-Active</option>
                                </select>
                            </div>
                            
                             
                        </div>
                    </form>
                    <table id="" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <!-- <th>Date of Birth</th> -->
                                 
                                <th>Account Type</th> 
                                <?php if(Auth::user()->isAdmin()): ?>
                                <th>Assigned To</th>
                                <?php endif; ?>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="body">
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($user->hasRole('Admin')): ?>
                                    <?php continue; ?>;
                                <?php endif; ?>
                                <tr id="id-<?php echo e($user->id); ?>">
                                    <td><?php echo e($users->firstItem()+$key); ?>.</td>
                                    <td><?php echo e($user->name); ?></td>
                                    <td><?php echo e($user->last_name ?? 'N/A'); ?></td>
                                    <td><?php echo e($user->email); ?></td>
                                    <td><?php echo e($user->phone ?? 'N/A'); ?></td>
                                    <!-- <td><?php echo e($user->date_of_birth ? \Carbon\Carbon::parse($user->date_of_birth)->format('M d, Y') : 'N/A'); ?></td> -->
                                    <td>
                                        <?php if($user->account_type == 'Company'): ?>
                                            <span class="badge badge-company">
                                                Company
                                            </span>
                                        <?php elseif($user->account_type == 'Sales Person'): ?>
                                            <span class="badge badge-salesperson">
                                                Sales Person
                                            </span>
                                        <?php else: ?>
                                            <span class="badge badge-individual">
                                                Individual
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                     
                                    <?php if(Auth::user()->isAdmin()): ?>
                                    <td>
                                        <select class="form-control assigned-salesperson-select" data-user-id="<?php echo e($user->id); ?>" style="min-width: 150px;">
                                            <option value="">-- Select Salesperson --</option>
                                            <?php $__currentLoopData = $salespersons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $salesperson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($salesperson->id); ?>" <?php echo e($user->assigned_to_user_id == $salesperson->id ? 'selected' : ''); ?>>
                                                    <?php echo e($salesperson->name); ?> <?php echo e($salesperson->last_name ?? ''); ?> (<?php echo e($salesperson->email); ?>)
                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </td>
                                    <?php endif; ?>
                                    <td>
                                        <?php if($user->status): ?>
                                            <span class="badge label-success">Active</span>
                                        <?php else: ?>
                                            <span class="badge label-danger">In-Active</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <?php if($user->phone): ?>
                                                <button type="button" class="btn btn-success btn-xs" onclick="sendText('<?php echo e($user->phone); ?>', '<?php echo e($user->name); ?>')" title="Send Text">
                                                    <i class="fa fa-comment"></i>
                                                </button>
                                            <?php endif; ?>
                                            <?php if($user->phone): ?>
                                                <button type="button" class="btn btn-primary btn-xs" onclick="makeCall('<?php echo e($user->phone); ?>', '<?php echo e($user->name); ?>')" title="Make Call">
                                                    <i class="fa fa-phone"></i>
                                                </button>
                                            <?php endif; ?>
                                            <button type="button" class="btn btn-info btn-xs" onclick="sendEmail('<?php echo e($user->email); ?>', '<?php echo e($user->name); ?>')" title="Send Email">
                                                <i class="fa fa-envelope"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td colspan="<?php echo e(Auth::user()->isAdmin() ? '11' : '10'); ?>">
                                    Displaying <?php echo e($users->firstItem()); ?> to <?php echo e($users->lastItem()); ?> of <?php echo e($users->total()); ?> records
                                    <div class="d-flex justify-content-center">
                                        <?php echo $users->links('pagination::bootstrap-4'); ?>

                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<script>
$(document).ready(function() {

// Action functions
function sendText(phone, name) {
    if (confirm('Send text message to ' + name + ' (' + phone + ')?')) {
        // Open SMS app on mobile devices or redirect to SMS service
        window.open('sms:' + phone, '_blank');
    }
}

function makeCall(phone, name) {
    if (confirm('Call ' + name + ' at ' + phone + '?')) {
        // Open phone app or redirect to calling service
        window.open('tel:' + phone, '_blank');
    }
}

function sendEmail(email, name) {
    if (confirm('Send email to ' + name + ' (' + email + ')?')) {
        // Open email client or redirect to email service
        window.open('mailto:' + email, '_blank');
    }
}

// Handle salesperson assignment dropdown change
$(document).on('change', '.assigned-salesperson-select', function() {
    var userId = $(this).data('user-id');
    var salespersonId = $(this).val();
    var selectElement = $(this);
    
    // Disable the select while updating
    selectElement.prop('disabled', true);
    
    var baseUrl = '<?php echo e(route("mts-dashboard.update-assigned-salesperson", ":id")); ?>';
    var url = baseUrl.replace(':id', userId);
    
    $.ajax({
        url: url,
        type: 'POST',
        data: {
            _token: '<?php echo e(csrf_token()); ?>',
            assigned_to_user_id: salespersonId
        },
        success: function(response) {
            if(response.success) {
                // Show success message with SweetAlert
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Salesperson assigned successfully',
                    confirmButtonColor: '#28a745',
                    timer: 3000,
                    timerProgressBar: true
                });
            }
        },
        error: function(xhr) {
            // Show error message with SweetAlert
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Error updating salesperson assignment. Please try again.',
                confirmButtonColor: '#dc3545'
            });
            // Revert the selection
            selectElement.val(selectElement.data('previous-value'));
        },
        complete: function() {
            // Re-enable the select
            selectElement.prop('disabled', false);
        }
    });
});

// Store previous value before change
$(document).on('focus', '.assigned-salesperson-select', function() {
    $(this).data('previous-value', $(this).val());
});
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($layout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\never-forget-13nov\resources\views/admin/mts-dashboard/index.blade.php ENDPATH**/ ?>