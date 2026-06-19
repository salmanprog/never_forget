
<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
<section class="content-header">
    <div class="content-header-left">
        <h1>Edit Company</h1>
    </div>
    <div class="content-header-right">
        <a href="<?php echo e(route('admin.company_employee.index')); ?>" class="btn btn-primary btn-sm">Back to Employees</a>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?php if($errors->any()): ?>
                <div class="callout callout-danger">
                    <ul style="margin-bottom: 0;">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if(session('success')): ?>
                <div class="callout callout-success">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <?php if(session('info')): ?>
                <div class="callout callout-info">
                    <?php echo e(session('info')); ?>

                </div>
            <?php endif; ?>

            <form action="<?php echo e(route('admin.company.update')); ?>" id="company-form" class="form-horizontal" method="post" accept-charset="utf-8">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="box box-info">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Company Name <span style="color: red">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="<?php echo e(old('name', $company->name)); ?>" name="name" id="name" placeholder="Enter company name">
                                <span style="color: red"><?php echo e($errors->first('name')); ?></span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="website" class="col-sm-2 control-label">Website</label>
                            <div class="col-sm-8">
                                <input type="url" class="form-control" value="<?php echo e(old('website', $company->website)); ?>" name="website" id="website" placeholder="https://example.com">
                                <span style="color: red"><?php echo e($errors->first('website')); ?></span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="address" class="col-sm-2 control-label">Address</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="address" id="address" rows="3" placeholder="Enter company address"><?php echo e(old('address', $company->address)); ?></textarea>
                                <span style="color: red"><?php echo e($errors->first('address')); ?></span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="industry" class="col-sm-2 control-label">Industry</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="<?php echo e(old('industry', $company->industry)); ?>" name="industry" id="industry" placeholder="Enter industry">
                                <span style="color: red"><?php echo e($errors->first('industry')); ?></span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="billing_email" class="col-sm-2 control-label">Billing Email</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" value="<?php echo e(old('billing_email', $company->billing_email)); ?>" name="billing_email" id="billing_email" placeholder="Enter billing email">
                                <span style="color: red"><?php echo e($errors->first('billing_email')); ?></span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="billing_phone" class="col-sm-2 control-label">Billing Phone</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="<?php echo e(old('billing_phone', $company->billing_phone)); ?>" name="billing_phone" id="billing_phone" placeholder="Enter billing phone">
                                <span style="color: red"><?php echo e($errors->first('billing_phone')); ?></span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="plan" class="col-sm-2 control-label">Plan <span style="color: red">*</span></label>
                            <div class="col-sm-8">
                                <select name="plan" id="plan" class="form-control">
                                    <option value="Basic" <?php echo e(old('plan', $company->plan) == 'Basic' ? 'selected' : ''); ?>>Basic</option>
                                    <option value="Standard" <?php echo e(old('plan', $company->plan) == 'Standard' ? 'selected' : ''); ?>>Standard</option>
                                    <option value="Enterprise" <?php echo e(old('plan', $company->plan) == 'Enterprise' ? 'selected' : ''); ?>>Enterprise</option>
                                </select>
                                <span style="color: red"><?php echo e($errors->first('plan')); ?></span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="options" class="col-sm-2 control-label">Options <span style="color: red">*</span></label>
                            <div class="col-sm-8">
                                <select name="options" id="options" class="form-control">
                                    <option value="Clientele" <?php echo e(old('options', $company->options) == 'Clientele' ? 'selected' : ''); ?>>Clientele</option>
                                    <option value="Employees" <?php echo e(old('options', $company->options) == 'Employees' ? 'selected' : ''); ?>>Employees</option>
                                    <option value="Both" <?php echo e(old('options', $company->options) == 'Both' ? 'selected' : ''); ?>>Both</option>
                                </select>
                                <span style="color: red"><?php echo e($errors->first('options')); ?></span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="description" id="description" rows="4" placeholder="Enter company description"><?php echo e(old('description', $company->description)); ?></textarea>
                                <span style="color: red"><?php echo e($errors->first('description')); ?></span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label"></label>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-success pull-left" name="form1">Update Company</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<script>
$(document).ready(function() {
    $("#company-form").validate({
        rules: {
            name: "required",
            plan: "required",
            options: "required"
        },
        messages: {
            name: "Please enter company name",
            plan: "Please select a plan",
            options: "Please select an option"
        }
    });
});
</script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.company.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\admin\company\edit.blade.php ENDPATH**/ ?>