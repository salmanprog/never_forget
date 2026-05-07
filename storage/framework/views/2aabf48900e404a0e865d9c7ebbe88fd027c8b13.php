<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($user->hasRole('Admin')): ?>
        <?php continue; ?>;
    <?php endif; ?>
    <tr id="id-<?php echo e($user->id); ?>">
        <td><?php echo e($users->firstItem() + $key); ?>.</td>
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
                <select class="form-control assigned-salesperson-select" data-user-id="<?php echo e($user->id); ?>"
                    style="min-width: 150px;">
                    <option value="">-- Select Salesperson --</option>
                    <?php $__currentLoopData = $salespersons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $salesperson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($salesperson->id); ?>"
                            <?php echo e($user->assigned_to_user_id == $salesperson->id ? 'selected' : ''); ?>>
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
                    <button type="button" class="btn btn-primary btn-xs btn-initiate-call" title="Make Call (Twilio)"
                        data-phone="<?php echo e($user->phone); ?>"
                        data-name="<?php echo e($user->name); ?> <?php echo e($user->last_name ?? ''); ?>">
                        <i class="fa fa-phone"></i>
                    </button>
                <?php endif; ?>
                <button type="button" class="btn btn-info btn-xs btn-open-email-modal" title="Send Email"
                    data-email="<?php echo e($user->email); ?>"
                    data-name="<?php echo e($user->name); ?> <?php echo e($user->last_name ?? ''); ?>">
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
<?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views/admin/mts-dashboard/search.blade.php ENDPATH**/ ?>