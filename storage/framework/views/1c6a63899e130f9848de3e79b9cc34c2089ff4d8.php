<?php if(Auth::user()->isIndividual()): ?>
    
<?php elseif(Auth::user()->isCompany()): ?>
    
<?php endif; ?>

<?php $__env->startSection('title', 'View Occasion'); ?>
<?php $__env->startSection('content'); ?>
<section class="content-header">
    <h1 style="color:#c98900 !important; font-weight: 700;">View Occasion</h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo e($occasion->title); ?></h3>
                    <div class="box-tools pull-right">
                        <a href="<?php echo e(route('occasions.edit', $occasion->id)); ?>" class="btn btn-warning btn-sm">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                        <a href="<?php echo e(route('occasions.index')); ?>" class="btn btn-default btn-sm">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Occasion Type:</strong> <?php echo e($occasion->title); ?></p>
                            <p><strong>Date:</strong> <?php echo e($occasion->occasion_date->format('F d, Y')); ?></p>
                            <p><strong>Day of Week:</strong> <?php echo e($occasion->occasion_date->format('l')); ?></p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Type:</strong> 
                                <span class="label label-<?php echo e($occasion->type == 'personal' ? 'primary' : 'success'); ?>">
                                    <?php echo e(ucfirst($occasion->type)); ?>

                                </span>
                            </p>
                            <p><strong>Recurring:</strong> 
                                <?php if($occasion->is_recurring): ?>
                                    <span class="label label-success">Yes</span>
                                <?php else: ?>
                                    <span class="label label-default">No</span>
                                <?php endif; ?>
                            </p>
                            <p><strong>Created:</strong> <?php echo e($occasion->created_at->format('M d, Y')); ?></p>
                        </div>
                    </div>
                    
                    <?php if($occasion->notes): ?>
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Notes</h4>
                                <div class="well">
                                    <?php echo e($occasion->notes); ?>

                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="box-footer">
                    <a href="<?php echo e(route('occasions.edit', $occasion->id)); ?>" class="btn btn-warning">
                        <i class="fa fa-edit"></i> Edit Occasion
                    </a>
                    <form action="<?php echo e(route('occasions.destroy', $occasion->id)); ?>" method="POST" style="display: inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this occasion?')">
                            <i class="fa fa-trash"></i> Delete Occasion
                        </button>
                    </form>
                    <a href="<?php echo e(route('occasions.index')); ?>" class="btn btn-default">
                        <i class="fa fa-arrow-left"></i> Back to Occasions
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Quick Actions</h3>
                </div>
                <div class="box-body">
                    <a href="<?php echo e(route('occasions.create')); ?>" class="btn btn-primary btn-block">
                        <i class="fa fa-plus"></i> Add New Occasion
                    </a>
                    <a href="<?php echo e(route('occasions.edit', $occasion->id)); ?>" class="btn btn-warning btn-block">
                        <i class="fa fa-edit"></i> Edit This Occasion
                    </a>
                    <a href="<?php echo e(route('occasions.index')); ?>" class="btn btn-info btn-block">
                        <i class="fa fa-list"></i> View All Occasions
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.company.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.individual.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\occasions\show.blade.php ENDPATH**/ ?>