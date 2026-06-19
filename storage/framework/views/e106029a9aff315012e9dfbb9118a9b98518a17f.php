<?php $__currentLoopData = $perfectGiftEnquiries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enquiry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td><?php echo e($enquiry->user_name); ?></td>
        <td><?php echo e($enquiry->email); ?></td>
        <td>
            <?php if(!$enquiry->phone): ?>
              No Phone
            <?php endif; ?>
            <?php echo e($enquiry->phone); ?>

        </td>
        <td>
            <?php if(!$enquiry->message): ?>
                <span>No message</span>
            <?php endif; ?>
            <?php echo e($enquiry->message); ?>

        </td>
        <td><?php echo e($enquiry->created_at->format('d M Y')); ?></td>
        <td>
            <a class="btn btn-info btn-sm" href="<?php echo e(route('perfect_gift_enquiry.show', $enquiry->id)); ?>">view</a>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td colspan="5">
        Displaying <?php echo e($perfectGiftEnquiries->firstItem()); ?>

        to <?php echo e($perfectGiftEnquiries->lastItem()); ?>

        of <?php echo e($perfectGiftEnquiries->total()); ?> records

        <div class="d-flex justify-content-center">
            <?php echo $perfectGiftEnquiries->links('pagination::bootstrap-4'); ?>

        </div>
    </td>
</tr>
<?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\admin\perfect-gift-enquiry\partials\table.blade.php ENDPATH**/ ?>