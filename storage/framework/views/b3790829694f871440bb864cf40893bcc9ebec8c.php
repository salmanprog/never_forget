<?php $__currentLoopData = $enquiries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enquiry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr class="enquiry-summary-row">
    <td><?php echo e($enquiry->name ?? '—'); ?></td>
    <td><?php echo e($enquiry->email ?? '—'); ?></td>
    <td><?php echo e($enquiry->created_at ? $enquiry->created_at->format('d M Y') : '—'); ?></td>
    <td>
        <button type="button" class="btn btn-xs btn-default btn-toggle-enquiry-detail" data-target="journey-expert-detail-<?php echo e($enquiry->id); ?>" aria-expanded="false">
            <i class="fa fa-chevron-down"></i> View details
        </button>
    </td>
</tr>
<tr class="enquiry-detail-row" id="journey-expert-detail-<?php echo e($enquiry->id); ?>" style="display: none;">
    <td colspan="4" class="bg-light">
        <div class="p-3">
            <strong>Enquiry details</strong>
            <table class="table table-bordered table-condensed mt-2 mb-0">
                <tbody>
                    <?php if(!empty($enquiry->name)): ?>
                        <tr><th width="180">Name</th><td><?php echo e($enquiry->name); ?></td></tr>
                    <?php endif; ?>
                    <?php if(!empty($enquiry->email)): ?>
                        <tr><th width="180">Email</th><td><?php echo e($enquiry->email); ?></td></tr>
                    <?php endif; ?>
                    <?php if(!empty($enquiry->phone)): ?>
                        <tr><th width="180">Phone</th><td><?php echo e($enquiry->phone); ?></td></tr>
                    <?php endif; ?>
                    <?php if(!empty($enquiry->any_cruise_line)): ?>
                        <tr><th width="180">Any cruise line</th><td><?php echo e($enquiry->any_cruise_line); ?></td></tr>
                    <?php endif; ?>
                    <?php if(!empty($enquiry->message)): ?>
                        <tr><th width="180">Message</th><td><?php echo e($enquiry->message); ?></td></tr>
                    <?php endif; ?>
                    <?php if($enquiry->created_at): ?>
                        <tr><th width="180">Date</th><td><?php echo e($enquiry->created_at->format('d M Y H:i')); ?></td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td colspan="4">
        Displaying <?php echo e($enquiries->firstItem()); ?> to <?php echo e($enquiries->lastItem()); ?> of <?php echo e($enquiries->total()); ?> records
        <div class="d-flex justify-content-center">
            <?php echo $enquiries->links('pagination::bootstrap-4'); ?>

        </div>
    </td>
</tr>
<?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\website\individual-dashboard\journey-expert-enquiries-partials\table.blade.php ENDPATH**/ ?>