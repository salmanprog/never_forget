
<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
<section class="content-header">
    <div class="content-header-left">
        <h1>Bulk Upload Resources</h1>
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

            <div class="box box-info">
                <div class="box-body">
                    <div class="alert alert-info">
                        <h4><i class="icon fa fa-info"></i> Instructions:</h4>
                        <ul>
                            <li>Download the CSV template below to see the correct format</li>
                            <li>Fill in the employee data following the template format</li>
                            <li>Upload the CSV file (maximum 2MB)</li>
                            <li>Required fields: First Name, Last Name, Email, Type</li>
                            <li>Type should be either "employee" or "client"</li>
                        </ul>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <h4>Download Template</h4>
                            <a href="<?php echo e(route('admin.company_employee.download-template')); ?>" class="btn btn-success">
                                <i class="fa fa-download"></i> Download CSV Template
                            </a>
                        </div>
                    </div>
                    <hr>
                    <form action="<?php echo e(route('admin.company_employee.process-bulk-upload')); ?>" id="bulk-upload-form" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        <?php echo csrf_field(); ?>

                        <div class="form-group">
                            <label for="csv_file" class="col-sm-2 control-label">CSV File <span style="color: red">*</span></label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control" name="csv_file" id="csv_file" accept=".csv,.txt">
                                <span style="color: red"><?php echo e($errors->first('csv_file')); ?></span>
                                <small class="help-block">Select a CSV file with employee data (max 2MB)</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label"></label>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-success pull-left" name="form1">
                                    <i class="fa fa-upload"></i> Upload
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Sample CSV Format (same columns as index) -->
            <div class="box box-default">
                <div class="box-header">
                    <h3 class="box-title">Sample CSV Format</h3>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Contact Type</th>
                                    <th>Client Status</th>
                                    <th>Client Since</th>
                                    <th>Department</th>
                                    <th>Employee ID</th>
                                    <th>Job Title</th>
                                    <th>Hire Date</th>
                                    <th>Employment Status</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Shipping Address</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Zip</th>
                                    <th>DOB</th>
                                    <th>Work Anniversary Date</th>
                                    <th>Favorite Color</th>
                                    <th>Hobbies</th>
                                    <th>Dietry Restriction</th>
                                    <th>Budget Range</th>
                                    <th>Gift Preferences</th>
                                    <th>Occasion</th>
                                    <th>Gift Sent Date</th>
                                    <th>Payment Method</th>
                                    <th>Tracking Number</th>
                                    <th>Delivery Note</th>
                                    <th>Delivery Status</th>
                                    <th>Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>employee</td>
                                    <td>—</td>
                                    <td>—</td>
                                    <td>Sales</td>
                                    <td>E001</td>
                                    <td>Manager</td>
                                    <td>2020-01-15</td>
                                    <td>Active</td>
                                    <td>John</td>
                                    <td>Doe</td>
                                    <td>john.doe@example.com</td>
                                    <td>—</td>
                                    <td>—</td>
                                    <td>—</td>
                                    <td>—</td>
                                    <td>—</td>
                                    <td>—</td>
                                    <td>—</td>
                                    <td>—</td>
                                    <td>—</td>
                                    <td>—</td>
                                    <td>—</td>
                                    <td>—</td>
                                    <td>—</td>
                                    <td>—</td>
                                    <td>—</td>
                                    <td>—</td>
                                    <td>—</td>
                                    <td>—</td>
                                </tr>
                                <tr>
                                    <td>client</td>
                                    <td>—</td>
                                    <td>—</td>
                                    <td>—</td>
                                    <td>—</td>
                                    <td>—</td>
                                    <td>—</td>
                                    <td>—</td>
                                    <td>Jane</td>
                                    <td>Smith</td>
                                    <td>jane.smith@example.com</td>
                                    <td>—</td>
                                    <td>—</td>
                                    <td>—</td>
                                    <td>—</td>
                                    <td>—</td>
                                    <td>—</td>
                                    <td>—</td>
                                    <td>—</td>
                                    <td>—</td>
                                    <td>—</td>
                                    <td>—</td>
                                    <td>—</td>
                                    <td>—</td>
                                    <td>—</td>
                                    <td>—</td>
                                    <td>—</td>
                                    <td>—</td>
                                    <td>—</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<script>
$(document).ready(function() {
    $("#bulk-upload-form").validate({
        rules: {
            csv_file: {
                required: true,
                extension: "csv|txt"
            }
        },
        messages: {
            csv_file: {
                required: "Please select a CSV file",
                extension: "Please select a valid CSV file"
            }
        }
    });

    // File size validation
    $('#csv_file').change(function() {
        var file = this.files[0];
        if (file && file.size > 2 * 1024 * 1024) { // 2MB
            alert('File size must be less than 2MB');
            $(this).val('');
        }
    });
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.company.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\never-forget\resources\views/admin/company_employee/bulk-upload.blade.php ENDPATH**/ ?>