
<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
<section class="content-header">
    <div class="content-header-left">
        <h1>Add Employee</h1>
    </div>
    <div class="content-header-right">
        <a href="<?php echo e(route('admin.company_employee.index')); ?>" class="btn btn-primary btn-sm">View All</a>
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

            <form action="<?php echo e(route('admin.company_employee.store')); ?>" id="employee-form" class="form-horizontal" method="post" accept-charset="utf-8">
                <?php echo csrf_field(); ?>

                <div class="box box-info">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="first_name" class="col-sm-2 control-label">First Name <span style="color: red">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="<?php echo e(old('first_name')); ?>" name="first_name" id="first_name" placeholder="Enter first name">
                                <span style="color: red"><?php echo e($errors->first('first_name')); ?></span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="last_name" class="col-sm-2 control-label">Last Name <span style="color: red">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="<?php echo e(old('last_name')); ?>" name="last_name" id="last_name" placeholder="Enter last name">
                                <span style="color: red"><?php echo e($errors->first('last_name')); ?></span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Email <span style="color: red">*</span></label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" value="<?php echo e(old('email')); ?>" name="email" id="email" placeholder="Enter email address">
                                <span style="color: red"><?php echo e($errors->first('email')); ?></span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="phone" class="col-sm-2 control-label">Phone</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="<?php echo e(old('phone')); ?>" name="phone" id="phone" placeholder="Enter phone number">
                                <span style="color: red"><?php echo e($errors->first('phone')); ?></span>
                            </div>
                        </div>
                        <input type="hidden" class="form-control" value="employee" name="type" id="type" placeholder="Enter type">
                        <!-- <div class="form-group">
                            <label for="type" class="col-sm-2 control-label">Type <span style="color: red">*</span></label>
                            <div class="col-sm-8">
                                <select name="type" id="type" class="form-control">
                                    <option value="" selected>Select type</option>
                                    <option value="employee" <?php echo e(old('type') == 'employee' ? 'selected' : ''); ?>>Employee</option>
                                    <option value="client" <?php echo e(old('type') == 'client' ? 'selected' : ''); ?>>Client</option>
                                </select>
                                <span style="color: red"><?php echo e($errors->first('type')); ?></span>
                            </div>
                        </div> -->
                        
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label"></label>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-success pull-left" name="form1">Add Employee</button>
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
    $("#employee-form").validate({
        rules: {
            first_name: "required",
            last_name: "required",
            email: {
                required: true,
                email: true
            },
            type: "required"
        },
        messages: {
            first_name: "Please enter first name",
            last_name: "Please enter last name",
            email: {
                required: "Please enter email address",
                email: "Please enter a valid email address"
            },
            type: "Please select employee type"
        }
    });
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.company.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\never-forget-13nov\resources\views/admin/company_employee/create.blade.php ENDPATH**/ ?>