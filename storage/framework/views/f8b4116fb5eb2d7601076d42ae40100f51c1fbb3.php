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
     <td colspan="10">
        Displaying <?php echo e($users->firstItem()); ?> to <?php echo e($users->lastItem()); ?> of <?php echo e($users->total()); ?> records
        <div class="d-flex justify-content-center">
            <?php echo $users->links('pagination::bootstrap-4'); ?>

        </div>
    </td>
</tr>
<?php /**PATH C:\xampp\htdocs\never_forget\resources\views/admin/mts-dashboard/search.blade.php ENDPATH**/ ?>