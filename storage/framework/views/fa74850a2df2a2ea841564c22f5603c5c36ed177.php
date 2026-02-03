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

    /* Message modal - match admin theme (#081e37, #cfa40c) */
    #messageModal .modal-content {
        border: 1px solid #cfa40c;
        border-radius: 4px;
        box-shadow: 0 5px 15px rgba(8, 30, 55, 0.3);
    }
    #messageModal .modal-header {
        background-color: #081e37;
        color: #fff;
        border-bottom: 2px solid #cfa40c;
        padding: 12px 15px;
        display: flex;
    }
    #messageModal .modal-title {
        color: #cfa40c !important;
        font-weight: 600;
    }
    #messageModal .modal-header .close {
        color: #fff;
        opacity: 0.9;
        text-shadow: none;
        margin-left: auto;
    }
    #messageModal .modal-header .close:hover {
        color: #cfa40c;
        opacity: 1;
    }
    #messageModal .modal-body {
        background-color: #f4f4f4;
        padding: 20px;
    }
    #messageModal .modal-body label {
        color: #081e37;
        font-weight: 600;
    }
    #messageModal .modal-body .form-control-plaintext {
        color: #333;
        background: #fff;
        padding: 8px 12px;
        border: 1px solid #ddd;
        border-radius: 4px;
        margin-bottom: 0;
    }
    #messageModal .modal-body .form-control {
        border: 1px solid #ddd;
        border-radius: 4px;
    }
    #messageModal .modal-body .form-control:focus {
        border-color: #cfa40c;
        box-shadow: 0 0 0 0.2rem rgba(207, 164, 12, 0.25);
    }
    #messageModal .modal-footer {
        background-color: #fff;
        border-top: 2px solid #cfa40c;
        padding: 12px 15px;
    }
    #messageModal .modal-footer .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
        color: #fff;
    }
    #messageModal .modal-footer .btn-secondary:hover {
        background-color: #5a6268;
        border-color: #545b62;
        color: #fff;
    }
    #messageModal .modal-footer #messageModalSendBtn {
        background-color: #081e37;
        border-color: #cfa40c;
        color: #fff;
    }
    #messageModal .modal-footer #messageModalSendBtn:hover {
        background-color: #cfa40c;
        border-color: #cfa40c;
        color: #081e37;
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
                                                <button type="button" class="btn btn-success btn-xs btn-open-message-modal" title="Send Text"
                                                    data-name="<?php echo e($user->name); ?>"
                                                    data-last-name="<?php echo e($user->last_name ?? ''); ?>"
                                                    data-phone="<?php echo e($user->phone); ?>">
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

<!-- Message Modal (Bootstrap modal, themed to match admin) -->
<div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="messageModalLabel"><i class="fa fa-comment"></i> Send Message</h5>
                <button type="button" class="close ml-auto" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Name</label>
                    <p class="form-control-plaintext" id="messageModalUserName"></p>
                </div>
                <div class="form-group">
                    <label>Phone Number</label>
                    <p class="form-control-plaintext" id="messageModalUserPhone"></p>
                </div>
                <div class="form-group">
                    <label for="messageModalText">Message</label>
                    <textarea class="form-control" id="messageModalText" rows="4" placeholder="Type your message here..."></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" id="messageModalSendBtn">
                    <i class="fa fa-paper-plane"></i> Send
                </button>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<script>
$(document).ready(function() {

// Message modal: open and populate (store phone in data for send)
$(document).on('click', '.btn-open-message-modal', function() {
    var name = $(this).data('name') || '';
    var lastName = $(this).data('last-name') || '';
    var phone = $(this).data('phone') || '';
    var fullName = $.trim(name + ' ' + lastName) || 'N/A';
    $('#messageModalUserName').text(fullName);
    $('#messageModalUserPhone').text(phone);
    $('#messageModal').data('phone', phone);
    $('#messageModalText').val('');
    $('#messageModal').modal('show');
});

// Message modal: send via Twilio (AJAX to backend) — prevent any sms: link
$(document).on('click', '#messageModalSendBtn', function(e) {
    e.preventDefault();
    e.stopPropagation();
    var phone = $('#messageModal').data('phone') || $('#messageModalUserPhone').text();
    var message = $('#messageModalText').val().trim();
    if (!phone) {
        Swal.fire({ icon: 'warning', title: 'No phone', text: 'No phone number to send to.', confirmButtonColor: '#081e37' });
        return;
    }
    if (!message) {
        Swal.fire({ icon: 'warning', title: 'Empty message', text: 'Please enter a message.', confirmButtonColor: '#081e37' });
        return;
    }
    var btn = $(this);
    btn.prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Sending...');
    $.ajax({
        url: '<?php echo e(route("send-sms")); ?>',
        type: 'POST',
        data: {
            _token: '<?php echo e(csrf_token()); ?>',
            phone: phone,
            message: message
        },
        success: function(response) {
            if (response.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Sent!',
                    text: response.message || 'Message sent successfully.',
                    confirmButtonColor: '#28a745',
                    timer: 3000,
                    timerProgressBar: true
                });
                $('#messageModal').modal('hide');
            } else {
                Swal.fire({ icon: 'error', title: 'Error', text: response.message || 'Failed to send.', confirmButtonColor: '#dc3545' });
            }
        },
        error: function(xhr) {
            var msg = (xhr.responseJSON && xhr.responseJSON.message) ? xhr.responseJSON.message : 'Failed to send message. Please try again.';
            Swal.fire({ icon: 'error', title: 'Error', text: msg, confirmButtonColor: '#dc3545' });
        },
        complete: function() {
            btn.prop('disabled', false).html('<i class="fa fa-paper-plane"></i> Send');
        }
    });
});

// Action functions
function sendText(phone, name) {
    if (confirm('Send text message to ' + name + ' (' + phone + ')?')) {
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