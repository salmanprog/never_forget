
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
                                <th>Date of Birth</th>
                                <th>Account Type</th>
                                <th>Company Name</th>
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
                                    <td><?php echo e($user->date_of_birth ? \Carbon\Carbon::parse($user->date_of_birth)->format('M d, Y') : 'N/A'); ?></td>
                                    <td>
                                        <?php if($user->account_type == 'Company'): ?>
                                            <span class="badge badge-company">
                                                Company
                                            </span>
                                        <?php else: ?>
                                            <span class="badge badge-individual">
                                                Individual
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($user->company_name ?? 'N/A'); ?></td>
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
                                                <!-- <button type="button" class="btn btn-success btn-xs" onclick="sendText('<?php echo e($user->phone); ?>', '<?php echo e($user->name); ?>')" title="Send Text">
                                                    <i class="fa fa-comment"></i>
                                                </button> -->
                                                <button type="button" class="btn btn-success btn-xs" onclick="openSendTextModal('<?php echo e($user->phone); ?>', '<?php echo e($user->name); ?>')" title="Send Text">
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
                                <td colspan="10">
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
<div class="modal fade" id="sendTextModal" tabindex="-1" role="dialog" aria-labelledby="sendTextModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="sendTextModalLabel">Send Text</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="sendTextForm">
          <div class="form-group">
            <label for="recipientName">Name</label>
            <input type="text" class="form-control" id="recipientName" readonly>
          </div>
          <div class="form-group">
            <label for="recipientPhone">Phone</label>
            <input type="text" class="form-control" id="recipientPhone" readonly>
          </div>
          <div class="form-group">
            <label for="messageText">Message</label>
            <textarea class="form-control" id="messageText" rows="3" placeholder="Type your message"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" id="sendTextButton">Send Text</button>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<script>
 function openSendTextModal(phone, name) {
    $('#recipientName').val(name);
    $('#recipientPhone').val(phone);
    $('#messageText').val('');
    $('#sendTextModal').modal('show');
}   
$('#sendTextButton').on('click', function () {
        const phone = $('#recipientPhone').val();
        const message = $('#messageText').val();

        if (!message.trim()) {
            alert('Please enter a message.');
            return;
        }

        $.ajax({
            url: "<?php echo e(route('send-text')); ?>",
            method: "POST",
            data: {
                _token: "<?php echo e(csrf_token()); ?>",
                phone: phone,
                message: message,
            },
            beforeSend: function () {
                $('#sendTextButton').prop('disabled', true).text('Sending...');
            },
            success: function (res) {
                if (res.status) {
                    alert(res.message);
                    $('#sendTextModal').modal('hide');
                } else {
                    alert(res.message || 'Failed to send.');
                }
            },
            error: function (xhr) {
                console.error(xhr.responseText);
                alert('Something went wrong.');
            },
            complete: function () {
                $('#sendTextButton').prop('disabled', false).text('Send Text');
            }
        });
    });
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
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\admin\mts-dashboard_old\index.blade.php ENDPATH**/ ?>