<?php if(Auth::user()->isIndividual()): ?>
    
<?php elseif(Auth::user()->isCompany()): ?>
    
<?php endif; ?>

<?php $__env->startSection('title', 'Edit Occasion'); ?>
<?php $__env->startSection('content'); ?>
<section class="content-header">
    <h1 style="color:#c98900 !important; font-weight: 700;">Edit Occasion</h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Occasion Details</h3>
                </div>
                <form action="<?php echo e(route('occasions.update', $occasion->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="title">Occasion Type</label>
                            <select name="title" id="title" class="form-control" required>
                                <option value="">Select Occasion Type</option>
                                <?php $__currentLoopData = $occasionTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>" 
                                            <?php echo e(old('title', $occasion->title) == $key ? 'selected' : ''); ?>>
                                        <?php echo e($value); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group">
                            <label for="occasion_date">Date</label>
                            <input type="date" name="occasion_date" id="occasion_date" 
                                   class="form-control" 
                                   value="<?php echo e(old('occasion_date', $occasion->occasion_date->format('Y-m-d'))); ?>" required>
                            <?php $__errorArgs = ['occasion_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group">
                            <label for="notes">Notes (Optional)</label>
                            <textarea name="notes" id="notes" class="form-control" rows="3" 
                                      placeholder="Add any additional notes about this occasion"><?php echo e(old('notes', $occasion->notes)); ?></textarea>
                            <?php $__errorArgs = ['notes'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="is_recurring" value="1" 
                                           <?php echo e(old('is_recurring', $occasion->is_recurring) ? 'checked' : ''); ?>>
                                    This is a recurring occasion (e.g., yearly birthday)
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save"></i> Update Occasion
                        </button>
                        <a href="<?php echo e(route('occasions.index')); ?>" class="btn btn-default">
                            <i class="fa fa-arrow-left"></i> Back to Occasions
                        </a>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Occasion Info</h3>
                </div>
                <div class="box-body">
                    <p><strong>Created:</strong> <?php echo e($occasion->created_at->format('M d, Y')); ?></p>
                    <p><strong>Last Updated:</strong> <?php echo e($occasion->updated_at->format('M d, Y')); ?></p>
                    <p><strong>Type:</strong> <?php echo e(ucfirst($occasion->type)); ?></p>
                    <p><strong>Recurring:</strong> 
                        <?php if($occasion->is_recurring): ?>
                            <span class="label label-success">Yes</span>
                        <?php else: ?>
                            <span class="label label-default">No</span>
                        <?php endif; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.company.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.individual.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\occasions\edit.blade.php ENDPATH**/ ?>