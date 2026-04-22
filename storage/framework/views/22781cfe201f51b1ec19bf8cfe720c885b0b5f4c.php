<?php $__currentLoopData = $enquiries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $enquiry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td><?php echo e($enquiries->firstItem() + $key); ?>.</td>
    <td><?php echo e($enquiry->recipient_name); ?><br><small><?php echo e($enquiry->recipient_email_phone); ?></small></td>
    <td><?php echo e(optional($enquiry->eCardCategory)->title ?? '—'); ?></td>
    <td><?php echo e($enquiry->occasion); ?></td>
    <td><?php echo e(\Carbon\Carbon::parse($enquiry->send_date)->format('d M Y')); ?> <?php echo e(\Carbon\Carbon::parse($enquiry->send_time)->format('h:i A')); ?></td>
    <td>
        <?php if($enquiry->status == 'New Request'): ?>
            <span class="badge label-info">New Request</span>
        <?php elseif($enquiry->status == 'Waiting for Design'): ?>
            <span class="badge label-warning">Waiting for Design</span>
        <?php elseif($enquiry->status == 'Awaiting Client Approval'): ?>
            <span class="badge label-primary">Awaiting Client Approval</span>
        <?php elseif($enquiry->status == 'Ready to Send'): ?>
            <span class="badge label-success">Ready to Send</span>
        <?php elseif($enquiry->status == 'Completed'): ?>
            <span class="badge label-success">Completed</span>
        <?php else: ?>
            <span class="badge label-default"><?php echo e($enquiry->status); ?></span>
        <?php endif; ?>
    </td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td colspan="6">
        Displaying <?php echo e($enquiries->firstItem()); ?> to <?php echo e($enquiries->lastItem()); ?> of <?php echo e($enquiries->total()); ?> records
        <div class="d-flex justify-content-center">
            <?php echo $enquiries->links('pagination::bootstrap-4'); ?>

        </div>
    </td>
</tr>
<?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\admin\my-e-card-enquiries\partials\table.blade.php ENDPATH**/ ?>