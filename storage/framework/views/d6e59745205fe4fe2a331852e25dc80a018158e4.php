
<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
<section class="content-header">
    <div class="content-header-left">
        <h1>Add Resource</h1>
    </div>
    <div class="content-header-right">
        <?php echo $__env->make('includes.buttons.back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <a href="<?php echo e(route('admin.company_employee.index')); ?>" class="btn btn-primary btn-sm">View All</a>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?php echo $__env->make('includes.upgrade_alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                            <label for="type" class="col-sm-2 control-label">Contact Type <span style="color: red">*</span></label>
                            <div class="col-sm-8">
                                <select name="type" id="type" class="form-control">
                                    <option value="">Select type</option>
                                    <option value="employee" <?php echo e(old('type') == 'employee' ? 'selected' : ''); ?>>Employee</option>
                                    <option value="client" <?php echo e(old('type') == 'client' ? 'selected' : ''); ?>>Client</option>
                                </select>
                                <span style="color: red"><?php echo e($errors->first('type')); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="client_status" class="col-sm-2 control-label">Client Status</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="<?php echo e(old('client_status')); ?>" name="client_status" id="client_status" placeholder="Client Status">
                                <span style="color: red"><?php echo e($errors->first('client_status')); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="client_since" class="col-sm-2 control-label">Client Since</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="<?php echo e(old('client_since')); ?>" name="client_since" id="client_since" placeholder="Client Since">
                                <span style="color: red"><?php echo e($errors->first('client_since')); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="department" class="col-sm-2 control-label">Department</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="<?php echo e(old('department')); ?>" name="department" id="department" placeholder="Department">
                                <span style="color: red"><?php echo e($errors->first('department')); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="employee_id" class="col-sm-2 control-label">Employee ID</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="<?php echo e(old('employee_id')); ?>" name="employee_id" id="employee_id" placeholder="Employee ID">
                                <span style="color: red"><?php echo e($errors->first('employee_id')); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="job_title" class="col-sm-2 control-label">Job Title</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="<?php echo e(old('job_title')); ?>" name="job_title" id="job_title" placeholder="Job Title">
                                <span style="color: red"><?php echo e($errors->first('job_title')); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="hire_date" class="col-sm-2 control-label">Hire Date</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" value="<?php echo e(old('hire_date')); ?>" name="hire_date" id="hire_date">
                                <span style="color: red"><?php echo e($errors->first('hire_date')); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="employment_status" class="col-sm-2 control-label">Employment Status</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="<?php echo e(old('employment_status')); ?>" name="employment_status" id="employment_status" placeholder="Employment Status">
                                <span style="color: red"><?php echo e($errors->first('employment_status')); ?></span>
                            </div>
                        </div>
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
                            <label for="shipping_address" class="col-sm-2 control-label">Shipping Address</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="<?php echo e(old('shipping_address')); ?>" name="shipping_address" id="shipping_address" placeholder="Shipping Address">
                                <span style="color: red"><?php echo e($errors->first('shipping_address')); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="city" class="col-sm-2 control-label">City</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="<?php echo e(old('city')); ?>" name="city" id="city" placeholder="City">
                                <span style="color: red"><?php echo e($errors->first('city')); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="state" class="col-sm-2 control-label">State</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="<?php echo e(old('state')); ?>" name="state" id="state" placeholder="State">
                                <span style="color: red"><?php echo e($errors->first('state')); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="zip" class="col-sm-2 control-label">Zip</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="<?php echo e(old('zip')); ?>" name="zip" id="zip" placeholder="Zip">
                                <span style="color: red"><?php echo e($errors->first('zip')); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="date_of_birth" class="col-sm-2 control-label">DOB</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" value="<?php echo e(old('date_of_birth')); ?>" name="date_of_birth" id="date_of_birth">
                                <span style="color: red"><?php echo e($errors->first('date_of_birth')); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="work_anniversary_date" class="col-sm-2 control-label">Work Anniversary Date</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" value="<?php echo e(old('work_anniversary_date')); ?>" name="work_anniversary_date" id="work_anniversary_date">
                                <span style="color: red"><?php echo e($errors->first('work_anniversary_date')); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="favorite_color" class="col-sm-2 control-label">Favorite Color</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="<?php echo e(old('favorite_color')); ?>" name="favorite_color" id="favorite_color" placeholder="Favorite Color">
                                <span style="color: red"><?php echo e($errors->first('favorite_color')); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="hobbies" class="col-sm-2 control-label">Hobbies</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="<?php echo e(old('hobbies')); ?>" name="hobbies" id="hobbies" placeholder="Hobbies">
                                <span style="color: red"><?php echo e($errors->first('hobbies')); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="dietry_restriction" class="col-sm-2 control-label">Dietry Restriction</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="<?php echo e(old('dietry_restriction')); ?>" name="dietry_restriction" id="dietry_restriction" placeholder="Dietry Restriction">
                                <span style="color: red"><?php echo e($errors->first('dietry_restriction')); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="budget_range" class="col-sm-2 control-label">Budget Range</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="<?php echo e(old('budget_range')); ?>" name="budget_range" id="budget_range" placeholder="Budget Range">
                                <span style="color: red"><?php echo e($errors->first('budget_range')); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="gift_preferences" class="col-sm-2 control-label">Gift Preferences</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="<?php echo e(old('gift_preferences')); ?>" name="gift_preferences" id="gift_preferences" placeholder="Gift Preferences">
                                <span style="color: red"><?php echo e($errors->first('gift_preferences')); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="occasion" class="col-sm-2 control-label">Occasion</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="<?php echo e(old('occasion')); ?>" name="occasion" id="occasion" placeholder="Occasion">
                                <span style="color: red"><?php echo e($errors->first('occasion')); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="gift_send_date" class="col-sm-2 control-label">Gift Sent Date</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" value="<?php echo e(old('gift_send_date')); ?>" name="gift_send_date" id="gift_send_date">
                                <span style="color: red"><?php echo e($errors->first('gift_send_date')); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="payment_method" class="col-sm-2 control-label">Payment Method</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="<?php echo e(old('payment_method')); ?>" name="payment_method" id="payment_method" placeholder="Payment Method">
                                <span style="color: red"><?php echo e($errors->first('payment_method')); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tracking_number" class="col-sm-2 control-label">Tracking Number</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="<?php echo e(old('tracking_number')); ?>" name="tracking_number" id="tracking_number" placeholder="Tracking Number">
                                <span style="color: red"><?php echo e($errors->first('tracking_number')); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="delivery_notes" class="col-sm-2 control-label">Delivery Note</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="delivery_notes" id="delivery_notes" rows="2" placeholder="Delivery Note"><?php echo e(old('delivery_notes')); ?></textarea>
                                <span style="color: red"><?php echo e($errors->first('delivery_notes')); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="notes" class="col-sm-2 control-label">Notes</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="notes" id="notes" rows="2" placeholder="Notes"><?php echo e(old('notes')); ?></textarea>
                                <span style="color: red"><?php echo e($errors->first('notes')); ?></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label"></label>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-success pull-left" name="form1">Add resource</button>
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
            type: "Please select contact type"
        }
    });
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.company.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\admin\company_employee\create.blade.php ENDPATH**/ ?>