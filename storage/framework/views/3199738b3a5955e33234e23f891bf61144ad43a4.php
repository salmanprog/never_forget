<?php $__currentLoopData = $balloonEnquiries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enquiry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr class="enquiry-summary-row">
    <td><?php echo e($enquiry->user_name); ?></td>
    <td><?php echo e($enquiry->email); ?></td>
    <td><?php echo e($enquiry->phone ?: '—'); ?></td>
    <td><?php echo e($enquiry->created_at->format('d M Y')); ?></td>
    <td>
        <button type="button" class="btn btn-xs btn-default btn-toggle-enquiry-detail" data-target="balloon-detail-<?php echo e($enquiry->id); ?>" aria-expanded="false">
            <i class="fa fa-chevron-down"></i> View details
        </button>
    </td>
</tr>
<tr class="enquiry-detail-row" id="balloon-detail-<?php echo e($enquiry->id); ?>" style="display: none;">
    <td colspan="5" class="bg-light">
        <div class="p-3">
            <?php if($enquiry->message): ?>
                <div class="mb-3">
                    <strong>Message:</strong>
                    <p class="mb-0 mt-1"><?php echo e($enquiry->message); ?></p>
                </div>
            <?php endif; ?>
            <?php if($enquiry->items && $enquiry->items->count() > 0): ?>
                <strong>Selected items</strong>
                <table class="table table-bordered table-condensed mt-2 mb-0">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Image</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $enquiry->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($item->balloon ? $item->balloon->title : '—'); ?></td>
                            <td>
                                <?php if($item->balloon && $item->balloon->images): ?>
                                    <img src="<?php echo e(asset('public/' . $item->balloon->images)); ?>" alt="<?php echo e($item->balloon->title ?? 'Item'); ?>" style="max-width: 80px; max-height: 80px;">
                                <?php else: ?>
                                    —
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($item->quantity ?? 0); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="mb-0 text-muted">No items.</p>
            <?php endif; ?>
        </div>
    </td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td colspan="5">
        Displaying <?php echo e($balloonEnquiries->firstItem()); ?> to <?php echo e($balloonEnquiries->lastItem()); ?> of <?php echo e($balloonEnquiries->total()); ?> records
        <div class="d-flex justify-content-center">
            <?php echo $balloonEnquiries->links('pagination::bootstrap-4'); ?>

        </div>
    </td>
</tr>
<?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\website\individual-dashboard\balloon-enquiries-partials\table.blade.php ENDPATH**/ ?>