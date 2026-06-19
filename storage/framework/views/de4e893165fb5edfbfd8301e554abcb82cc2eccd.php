
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
                <?php if(session('success')): ?>
                    <div class="callout callout-success"><?php echo e(session('success')); ?></div>
                <?php endif; ?>
                <div class="box box-info">
                    <div class="box-body table-responsive">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Sender</th>
                                    <th>Recipient</th>
                                    <th>E-Card category</th>
                                    <th>Occasion</th>
                                    <th>Send Date & Time</th>
                                    <th>Status</th>
                                    <th width="100">Action</th>
                                    <th style="min-width: 200px;">Contacts</th>
                                </tr>
                            </thead>
                            <tbody id="body">
                                <?php $__currentLoopData = $enquiries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $enquiry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($enquiries->firstItem() + $key); ?></td>
                                        <td><?php echo e($enquiry->sender_name ?? 'N/A'); ?><br><small><?php echo e($enquiry->sender_email ?? ''); ?></small><?php if($enquiry->sender_phone): ?><br><small><?php echo e($enquiry->sender_phone); ?></small><?php else: ?><br><small class="text-muted">No Phone</small><?php endif; ?></td>
                                        <td><?php echo e($enquiry->recipient_name); ?><br><small><?php echo e($enquiry->recipient_email_phone); ?></small></td>
                                        <td><?php echo e(optional($enquiry->eCardCategory)->title ?? '—'); ?></td>
                                        <td><?php echo e($enquiry->occasion); ?></td>
                                        <td><?php echo e(\Carbon\Carbon::parse($enquiry->send_date)->format('d M Y')); ?> <?php echo e(\Carbon\Carbon::parse($enquiry->send_time)->format('h:i A')); ?></td>
                                        <td>
                                            <select class="form-control ecard-status-select" data-id="<?php echo e($enquiry->id); ?>" style="min-width: 180px;">
                                                <option value="New Request" <?php echo e($enquiry->status == 'New Request' ? 'selected' : ''); ?>>New Request</option>
                                                <option value="Waiting for Design" <?php echo e($enquiry->status == 'Waiting for Design' ? 'selected' : ''); ?>>Waiting for Design</option>
                                                <option value="Awaiting Client Approval" <?php echo e($enquiry->status == 'Awaiting Client Approval' ? 'selected' : ''); ?>>Awaiting Client Approval</option>
                                                <option value="Ready to Send" <?php echo e($enquiry->status == 'Ready to Send' ? 'selected' : ''); ?>>Ready to Send</option>
                                                <option value="Completed" <?php echo e($enquiry->status == 'Completed' ? 'selected' : ''); ?>>Completed</option>
                                            </select>
                                        </td>
                                        <td>
                                            <a href="<?php echo e(route('e_card_enquiry.show', $enquiry->id)); ?>" class="btn btn-info btn-sm">View</a>
                                        </td>
                                        <td>
                                            <div class="btn-group mts-contacts-btn-group" role="group">
                                                <?php if($enquiry->sender_phone): ?>
                                                    <button type="button"
                                                        class="btn btn-success btn-xs btn-open-message-modal"
                                                        title="Send Text" data-name="<?php echo e($enquiry->sender_name ?? ''); ?>"
                                                        data-last-name=""
                                                        data-phone="<?php echo e($enquiry->sender_phone); ?>">
                                                        <i class="fa fa-comment"></i>
                                                    </button>
                                                <?php endif; ?>
                                                <?php if($enquiry->sender_phone): ?>
                                                    <button type="button"
                                                        class="btn btn-primary btn-xs btn-initiate-call"
                                                        title="Make Call (Twilio)" data-phone="<?php echo e($enquiry->sender_phone); ?>"
                                                        data-name="<?php echo e($enquiry->sender_name ?? ''); ?>">
                                                        <i class="fa fa-phone"></i>
                                                    </button>
                                                <?php endif; ?>
                                                <button type="button" class="btn btn-info btn-xs btn-open-email-modal"
                                                    title="Send Email" data-email="<?php echo e($enquiry->sender_email ?? ''); ?>"
                                                    data-name="<?php echo e($enquiry->sender_name ?? ''); ?>">
                                                    <i class="fa fa-envelope"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td colspan="9">
                                        Displaying <?php echo e($enquiries->firstItem()); ?> to <?php echo e($enquiries->lastItem()); ?> of <?php echo e($enquiries->total()); ?> records
                                        <div class="d-flex justify-content-center">
                                            <?php echo $enquiries->links('pagination::bootstrap-4'); ?>

                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php echo $__env->make('includes.admin.mts-modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<?php echo $__env->make('includes.admin.mts-functions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script>
$(document).ready(function() {
    $(document).on('change', '.ecard-status-select', function() {
        var id = $(this).data('id');
        var status = $(this).val();
        var select = $(this);
        select.prop('disabled', true);
        $.ajax({
            url: '<?php echo e(url("e_card_enquiry")); ?>/' + id + '/update-status',
            type: 'POST',
            data: {
                _token: '<?php echo e(csrf_token()); ?>',
                status: status
            },
            success: function(res) {
                if (res.success) {
                    Swal.fire({ icon: 'success', title: 'Success', text: res.message, confirmButtonColor: '#081e37' });
                }
            },
            error: function() {
                Swal.fire({ icon: 'error', title: 'Error', text: 'Failed to update status.', confirmButtonColor: '#dc3545' });
                select.val(select.data('prev'));
            },
            complete: function() {
                select.prop('disabled', false);
            }
        });
    });
    $(document).on('focus', '.ecard-status-select', function() {
        $(this).data('prev', $(this).val());
    });
    $(document).on('click', '.pagination a', function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        $.ajax({
            url: url,
            type: 'GET',
            success: function(data) {
                $('#body').html(data);
            }
        });
    });
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views/admin/e-card-enquiry/index.blade.php ENDPATH**/ ?>