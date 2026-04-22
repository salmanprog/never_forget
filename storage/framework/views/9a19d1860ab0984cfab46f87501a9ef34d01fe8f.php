<?php if(Auth::user()->isIndividual()): ?>
    
<?php elseif(Auth::user()->isCompany()): ?>
    
<?php endif; ?>

<?php $__env->startSection('title', 'Occasions'); ?>
<?php $__env->startSection('content'); ?>
<section class="content-header">
    <h1 style="color:#c98900 !important; font-weight: 700;">
        <?php if(Auth::user()->isIndividual()): ?>
            Personal Occasions
        <?php else: ?>
            Professional Occasions
        <?php endif; ?>
    </h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">All Occasions</h3>
                    <div class="box-tools pull-right">
                        <a href="<?php echo e(route('occasions.create')); ?>" class="btn btn-primary btn-sm">
                            <i class="fa fa-plus"></i> Add New Occasion
                        </a>
                    </div>
                </div>
                <div class="box-body">
                    <?php if($occasions->count() > 0): ?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Date</th>
                                        <th>Notes</th>
                                        <th>Recurring</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $occasions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $occasion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($occasion->title); ?></td>
                                            <td><?php echo e($occasion->occasion_date->format('M d, Y')); ?></td>
                                            <td><?php echo e($occasion->notes ?? 'N/A'); ?></td>
                                            <td>
                                                <?php if($occasion->is_recurring): ?>
                                                    <span class="label label-success">Yes</span>
                                                <?php else: ?>
                                                    <span class="label label-default">No</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo e(route('occasions.show', $occasion->id)); ?>" class="btn btn-sm btn-info">
                                                    <i class="fa fa-eye"></i> View
                                                </a>
                                                <a href="<?php echo e(route('occasions.edit', $occasion->id)); ?>" class="btn btn-sm btn-warning">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <form action="<?php echo e(route('occasions.destroy', $occasion->id)); ?>" method="POST" style="display: inline;">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this occasion?')">
                                                        <i class="fa fa-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <div class="text-center">
                            <div class="alert alert-info">
                                <h4>No occasions found</h4>
                                <p>You haven't added any occasions yet. Start by adding your first occasion!</p>
                                <a href="<?php echo e(route('occasions.create')); ?>" class="btn btn-primary">
                                    <i class="fa fa-plus"></i> Add Your First Occasion
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.company.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.individual.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\occasions\index.blade.php ENDPATH**/ ?>