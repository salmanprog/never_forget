<?php $__currentLoopData = $perfectGiftEnquiries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enquiry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td><?php echo e($enquiry->user_name); ?></td>
    <td><?php echo e($enquiry->email); ?></td>
    <td><?php echo e($enquiry->phone ?: 'No Phone'); ?></td>
    <td><?php echo e($enquiry->business_type ?: '—'); ?></td>
    <td><?php echo e($enquiry->message ?: 'No message'); ?></td>
    <td><?php echo e($enquiry->created_at->format('d M Y')); ?></td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td colspan="6">
        Displaying <?php echo e($perfectGiftEnquiries->firstItem()); ?> to <?php echo e($perfectGiftEnquiries->lastItem()); ?> of <?php echo e($perfectGiftEnquiries->total()); ?> records
        <div class="d-flex justify-content-center">
            <?php echo $perfectGiftEnquiries->links('pagination::bootstrap-4'); ?>

        </div>
    </td>
</tr>
<?php /**PATH D:\xampp\htdocs\never-forget\resources\views/website/individual-dashboard/perfect-gift-enquiries-partials/table.blade.php ENDPATH**/ ?>