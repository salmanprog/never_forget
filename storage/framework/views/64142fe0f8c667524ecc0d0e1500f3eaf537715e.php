
<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Edit Customer</h1>
	</div>
	<div class="content-header-right">
		<?php echo $__env->make('includes.buttons.back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="<?php echo e(route('user.update', $user->id)); ?>" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				<?php echo csrf_field(); ?>
				<?php echo e(method_field('PATCH')); ?>

				<div class="box box-info">
					<div class="box-body">
						<!--<div class="form-group">
							<label for="" class="col-sm-2 control-label">Roles <span style="color: red">*</span></label>
							<div class="col-sm-8">
								<select name="roles" id="" class="form-control">
									<option value="" selected>Select role</option>
									<?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($role->id); ?>" <?php echo e((optional($user->roles->first())->id ?? null) == $role->id ? 'selected' : ''); ?>><?php echo e($role->name); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
								<span style="color: red"><?php echo e($errors->first('name')); ?></span>
							</div>
						</div>-->
						<?php if($user->account_type == 'Company'): ?>
						<?php $company = $company ?? null; ?>
						
						<div class="col-sm-12"><h4 style="color: #cfa40c; margin-bottom: 15px;">Basic Company Information</h4></div>
						<div class="form-group">
							<label for="company_name" class="col-sm-2 control-label">Company Name <span style="color: red">*</span></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="company_name" value="<?php echo e(old('company_name', optional($company)->name)); ?>" placeholder="Enter Company Name">
								<span style="color: red"><?php echo e($errors->first('company_name')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="registration_number" class="col-sm-2 control-label">Registration Number</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="registration_number" value="<?php echo e(old('registration_number', optional($company)->registration_number)); ?>" placeholder="Enter Registration Number">
								<span style="color: red"><?php echo e($errors->first('registration_number')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="industry" class="col-sm-2 control-label">Industry</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="industry" value="<?php echo e(old('industry', optional($company)->industry)); ?>" placeholder="Enter Industry">
								<span style="color: red"><?php echo e($errors->first('industry')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="company_website" class="col-sm-2 control-label">Company Website</label>
							<div class="col-sm-8">
								<input type="url" class="form-control" name="company_website" value="<?php echo e(old('company_website', optional($company)->website)); ?>" placeholder="https://example.com">
								<span style="color: red"><?php echo e($errors->first('company_website')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="year_established" class="col-sm-2 control-label">Year Established</label>
							<div class="col-sm-8">
								<?php
									$yearVal = old('year_established', optional($company)->year_established);
									if ($yearVal && strlen($yearVal) <= 4 && preg_match('/^\d{4}$/', $yearVal)) {
										$yearVal = $yearVal . '-01-01';
									}
								?>
								<input type="date" class="form-control" name="year_established" id="year_established" value="<?php echo e($yearVal); ?>" max="<?php echo e(date('Y-m-d')); ?>">
								<span style="color: red"><?php echo e($errors->first('year_established')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="number_of_employees" class="col-sm-2 control-label">Number of Employees <span style="color: red">*</span></label>
							<div class="col-sm-8">
								<input type="text" inputmode="numeric" pattern="[0-9]*" class="form-control" name="number_of_employees" maxlength="10" value="<?php echo e(old('number_of_employees', optional($company)->number_of_employees)); ?>" placeholder="Enter Number of Employees">
								<span style="color: red"><?php echo e($errors->first('number_of_employees')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="company_logo" class="col-sm-2 control-label">Company Logo (upload) <span style="color: red">*</span></label>
							<div class="col-sm-6" style="padding-top:5px">
								<input type="file" class="form-control" accept="image/*" name="company_logo" id="company_logo">
							</div>
							<?php if($company && !empty($company->logo)): ?>
							<div class="col-sm-4">
								<img style="max-width: 80px; max-height: 80px;" id="company_logo_preview" src="<?php echo e(asset('public/admin/assets/images/company-logos/' . $company->logo)); ?>?v=<?php echo e($company->updated_at ? $company->updated_at->timestamp : time()); ?>" alt="Company Logo">
							</div>
							<?php endif; ?>
							<span style="color: red"><?php echo e($errors->first('company_logo')); ?></span>
						</div>

						
						<hr class="col-sm-11" style="margin: 20px 0; border-color: #cfa40c;">
						<div class="col-sm-12"><h4 style="color: #cfa40c; margin-bottom: 15px;">Primary Contact Information</h4></div>
						<div class="form-group">
							<label for="primary_contact_name" class="col-sm-2 control-label">Full Name</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="primary_contact_name" value="<?php echo e(old('primary_contact_name', optional($company)->primary_contact_name)); ?>" placeholder="Enter Full Name">
								<span style="color: red"><?php echo e($errors->first('primary_contact_name')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="job_title" class="col-sm-2 control-label">Job Title</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="job_title" value="<?php echo e(old('job_title', optional($company)->job_title)); ?>" placeholder="Enter Job Title">
								<span style="color: red"><?php echo e($errors->first('job_title')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="primary_billing_email" class="col-sm-2 control-label">Business Email <span style="color: red">*</span></label>
							<div class="col-sm-8">
								<input type="email" class="form-control" name="billing_email" value="<?php echo e(old('billing_email', optional($company)->billing_email)); ?>" placeholder="Enter Business Email">
								<span style="color: red"><?php echo e($errors->first('billing_email')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="primary_billing_phone" class="col-sm-2 control-label">Direct Phone Number <span style="color: red">*</span></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="billing_phone" value="<?php echo e(old('billing_phone', optional($company)->billing_phone)); ?>" placeholder="Enter Direct Phone Number">
								<span style="color: red"><?php echo e($errors->first('billing_phone')); ?></span>
							</div>
						</div>

						
						<?php
							$billingNameParts = $company && trim(optional($company)->primary_contact_name ?? '') ? explode(' ', trim($company->primary_contact_name), 2) : ['', ''];
						?>
						

						
						<hr class="col-sm-11" style="margin: 20px 0; border-color: #cfa40c;">
						<div class="col-sm-12"><h4 style="color: #cfa40c; margin-bottom: 15px;">Package Limits</h4></div>
						<div class="form-group">
							<label for="user_employees_limit" class="col-sm-2 control-label">Employees limit</label>
							<div class="col-sm-8">
								<input type="number" min="1" class="form-control" name="user_employees_limit" id="user_employees_limit" value="<?php echo e(old('user_employees_limit', $user->employees ?? 10)); ?>" placeholder="e.g. 20">
								<small class="help-block">Maximum number of employees this user can add. Default: 10.</small>
								<span style="color: red"><?php echo e($errors->first('user_employees_limit')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="user_clients_limit" class="col-sm-2 control-label">Clients limit</label>
							<div class="col-sm-8">
								<input type="number" min="0" class="form-control" name="user_clients_limit" id="user_clients_limit" value="<?php echo e(old('user_clients_limit', $user->clients ?? 5)); ?>" placeholder="e.g. 10">
								<small class="help-block">Maximum number of clients this user can add. Default: 5.</small>
								<span style="color: red"><?php echo e($errors->first('user_clients_limit')); ?></span>
							</div>
						</div>
						<hr class="col-sm-11" style="margin: 20px 0; border-color: #cfa40c;">
						<?php endif; ?>
						<div class="col-sm-12"><h4 style="color: #cfa40c; margin-bottom: 15px;">Personal Information</h4></div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">First Name <span style="color: red">*</span></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" value="<?php echo e($user->name); ?>" name="name" placeholder="Enter user name">
								<span style="color: red"><?php echo e($errors->first('name')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Last Name <span style="color: red">*</span></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" value="<?php echo e($user->last_name); ?>" name="last_name" placeholder="Enter user last name">
								<span style="color: red"><?php echo e($errors->first('last_name')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Email <span style="color: red">*</span></label>
							<div class="col-sm-8">
								<input type="email" class="form-control" value="<?php echo e($user->email); ?>" name="email" placeholder="Enter user email">
								<span style="color: red"><?php echo e($errors->first('email')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Status <span style="color: red">*</span></label>
							<div class="col-sm-8">
								<select name="status" id="status" class="form-control">
									<option value="1" <?php echo e($user->status == 1 ? 'selected' : ''); ?>>Active</option>
									<option value="0" <?php echo e($user->status == 0 ? 'selected' : ''); ?>>In-Active</option>
								</select>
								<span style="color: red"><?php echo e($errors->first('status')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Password </label>
							<div class="col-sm-8">
								<input type="password" class="form-control" name="password" placeholder="Enter password">
								<span style="color: red"><?php echo e($errors->first('password')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Confirm Password </label>
							<div class="col-sm-8">
								<input type="password" class="form-control" name="confirm-password" placeholder="Confirm password">
								<span style="color: red"><?php echo e($errors->first('confirm-password')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
							<input type="hidden" class="form-control" name="user_role" value="<?php echo e(optional($user->roles->first())->name ?? ''); ?>">
								<button type="submit" class="btn btn-success pull-left" name="form1">Submit</button>
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
			$("#regform").validate({
				rules: {
					name: "required",
					email: "required",
				}
			});
		});
	</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\never-forget\resources\views/admin/user/edit.blade.php ENDPATH**/ ?>