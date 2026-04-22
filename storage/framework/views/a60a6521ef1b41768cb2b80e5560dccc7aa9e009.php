<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
<section class="content-header">
	<div class="content-header-left">
		<h1>Edit Profile</h1>
	</div>
	<div class="content-header-right">
		<?php echo $__env->make('includes.buttons.back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<a href="<?php echo e(route('dashboard')); ?>" class="btn btn-primary btn-sm">Dashboard</a>
	</div>
</section>
<style>
	a.password-visibility i {
		position: absolute;
		top: 8px;
		right: 28px;
		font-size: initial;
	}
	#regform .error { color: red; display: block; margin-top: 2px; }
</style>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<?php if(session('success')): ?>
				<div class="callout callout-success">
					<?php echo e(session('success')); ?>

				</div>
			<?php endif; ?>
			<?php if(session('message')): ?>
				<div class="callout callout-success">
					<?php echo e(session('message')); ?>

				</div>
			<?php endif; ?>
			<form action="<?php echo e(route('user.profile.update')); ?>" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				<?php echo csrf_field(); ?>

				<div class="box box-info">
					<div class="box-body">
						

						
						<div class="col-sm-12"><h4 style="color: #cfa40c; margin-bottom: 15px;">Basic Company Information</h4></div>
						<div class="form-group">
							<label for="company_name" class="col-sm-2 control-label">Company Name <span style="color: red">*</span></label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="company_name" id="company_name"
									value="<?php echo e(old('company_name', $company->name ?? '')); ?>" placeholder="Enter Company Name">
								<span style="color: red"><?php echo e($errors->first('company_name')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="registration_number" class="col-sm-2 control-label">Registration Number</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="registration_number"
									value="<?php echo e(old('registration_number', $company->registration_number ?? '')); ?>" placeholder="Enter Registration Number">
								<span style="color: red"><?php echo e($errors->first('registration_number')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="industry" class="col-sm-2 control-label">Industry</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="industry"
									value="<?php echo e(old('industry', $company->industry ?? '')); ?>" placeholder="Enter Industry">
								<span style="color: red"><?php echo e($errors->first('industry')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="company_website" class="col-sm-2 control-label">Company Website</label>
							<div class="col-sm-9">
								<input type="url" class="form-control" name="company_website"
									value="<?php echo e(old('company_website', $company->website ?? '')); ?>" placeholder="https://example.com">
								<span style="color: red"><?php echo e($errors->first('company_website')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="year_established" class="col-sm-2 control-label">Year Established</label>
							<div class="col-sm-9">
								<?php
									$yearVal = old('year_established', $company->year_established ?? '');
									if ($yearVal && strlen($yearVal) <= 4 && preg_match('/^\d{4}$/', $yearVal)) {
										$yearVal = $yearVal . '-01-01';
									}
								?>
								<input type="date" class="form-control" name="year_established" id="year_established"
									value="<?php echo e($yearVal); ?>" max="<?php echo e(date('Y-m-d')); ?>">
								<span style="color: red"><?php echo e($errors->first('year_established')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="number_of_employees" class="col-sm-2 control-label">Number of Employees <span style="color: red">*</span></label>
							<div class="col-sm-9">
								<input type="text" inputmode="numeric" pattern="[0-9]*" class="form-control" name="number_of_employees" id="number_of_employees"
									value="<?php echo e(old('number_of_employees', $company->number_of_employees ?? '')); ?>" placeholder="Enter Number of Employees" maxlength="10">
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
							<div class="col-sm-9">
								<input type="text" class="form-control" name="primary_contact_name"
									value="<?php echo e(old('primary_contact_name', $company->primary_contact_name ?? '')); ?>" placeholder="Enter Full Name">
								<span style="color: red"><?php echo e($errors->first('primary_contact_name')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="job_title" class="col-sm-2 control-label">Job Title</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="job_title"
									value="<?php echo e(old('job_title', $company->job_title ?? '')); ?>" placeholder="Enter Job Title">
								<span style="color: red"><?php echo e($errors->first('job_title')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="primary_billing_email" class="col-sm-2 control-label">Business Email <span style="color: red">*</span></label>
							<div class="col-sm-9">
								<input type="email" class="form-control" name="billing_email"
									value="<?php echo e(old('billing_email', $company->billing_email ?? '')); ?>" placeholder="Enter Business Email">
								<span style="color: red"><?php echo e($errors->first('billing_email')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="primary_billing_phone" class="col-sm-2 control-label">Direct Phone Number <span style="color: red">*</span></label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="billing_phone"
									value="<?php echo e(old('billing_phone', $company->billing_phone ?? '')); ?>" placeholder="Enter Direct Phone Number">
								<span style="color: red"><?php echo e($errors->first('billing_phone')); ?></span>
							</div>
						</div>

						
						<?php
							$billingNameParts = $company && trim($company->primary_contact_name ?? '') ? explode(' ', trim($company->primary_contact_name), 2) : ['', ''];
						?>
						<hr class="col-sm-11" style="margin: 20px 0; border-color: #cfa40c;">
						
						<hr class="col-sm-11" style="margin: 20px 0; border-color: #cfa40c;">
						<div class="col-sm-12"><h4 style="color: #cfa40c; margin-bottom: 15px;">Personal Information</h4></div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">First Name<span style="color: red">*</span></label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" value="<?php echo e($user->name); ?>" name="name" placeholder="Enter First Name">
								<span style="color: red"><?php echo e($errors->first('name')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Last Name</label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="last_name" value="<?php echo e($user->last_name); ?>" placeholder="Enter Last Name">
								<span style="color: red"><?php echo e($errors->first('last_name')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Email</label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" readonly value="<?php echo e($user->email); ?>" placeholder="Enter Email">
								<span style="color: red"><?php echo e($errors->first('email')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Phone Number</label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="phone"
									value="<?php echo e($user->phone); ?>" placeholder="Enter Phone Number">
								<span style="color: red"><?php echo e($errors->first('phone')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Password</label>
							<div class="col-sm-9 password-group">
								<input type="password" autocomplete="off" class="form-control password-box" name="password" placeholder="Enter new password">
								<a href="#!" class="password-visibility"><i class="fa fa-eye"></i></a>
								<span style="color: red"><?php echo e($errors->first('password')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Confirm Password</label>
							<div class="col-sm-9 password-group">
								<input type="password" autocomplete="off" class="form-control password-box" name="confirm-password" placeholder="Confirm password">
								<a href="#!" class="password-visibility"><i class="fa fa-eye"></i></a>
								<span style="color: red"><?php echo e($errors->first('confirm-password')); ?></span>
							</div>
						</div>

						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left">Save Changes</button>
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
	$(function() {
		$('.password-group').find('.password-box').each(function(index, input) {
			var $input = $(input);
			$input.parent().find('.password-visibility').click(function() {
				var change = "";
				if ($(this).find('i').hasClass('fa-eye')) {
					$(this).find('i').removeClass('fa-eye').addClass('fa-eye-slash');
					change = "text";
				} else {
					$(this).find('i').removeClass('fa-eye-slash').addClass('fa-eye');
					change = "password";
				}
				var rep = $("<input type='" + change + "' />")
					.attr('id', $input.attr('id'))
					.attr('name', $input.attr('name'))
					.attr('class', $input.attr('class'))
					.val($input.val())
					.insertBefore($input);
				$input.remove();
			});
		});
	});
	$(document).ready(function() {
		var hasExistingLogo = $('#company_logo_preview').length > 0;
		$("#regform").validate({
			rules: {
				name: "required",
				company_name: "required",
				number_of_employees: { required: true, number: true, min: 0 },
				billing_first_name: "required",
				billing_last_name: "required",
				billing_company: "required",
				billing_country: "required",
				billing_address_line_1: "required",
				billing_state: "required",
				billing_city: "required",
				billing_zip_code: "required",
				billing_email: { required: true, email: true },
				billing_phone: "required",
				company_logo: { required: !hasExistingLogo }
			},
			messages: {
				name: "First Name is required.",
				company_name: "Company Name is required.",
				number_of_employees: {
					required: "Number of Employees is required.",
					number: "Please enter a valid number.",
					min: "Number of Employees must be 0 or more."
				},
				billing_first_name: "First Name is required.",
				billing_last_name: "Last Name is required.",
				billing_company: "Company is required.",
				billing_country: "Country is required.",
				billing_address_line_1: "Street is required.",
				billing_state: "State is required.",
				billing_city: "Town is required.",
				billing_zip_code: "Postal Code is required.",
				billing_email: {
					required: "Email is required.",
					email: "Please enter a valid email address."
				},
				billing_phone: "Phone is required.",
				company_logo: "Company Logo is required."
			},
			errorClass: "error",
			validClass: "valid",
			errorElement: "span"
		});
		var companyLogo = document.getElementById('company_logo');
		if (companyLogo) {
			companyLogo.onchange = function(evt) {
				var file = evt.target.files[0];
				if (file) {
					var preview = document.getElementById('company_logo_preview');
					if (preview) preview.src = URL.createObjectURL(file);
				}
			};
		}
		var imageInput = document.getElementById('image');
		var preview = document.getElementById('profile_picture_preview');
		var placeholder = document.getElementById('profile_picture_placeholder');
		if (imageInput && preview) {
			imageInput.onchange = function(evt) {
				var file = evt.target.files && evt.target.files[0];
				if (file) {
					preview.src = URL.createObjectURL(file);
					preview.style.display = 'block';
					if (placeholder) placeholder.style.display = 'none';
				}
			};
		}
	});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.company.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\website\company-dashboard\edit.blade.php ENDPATH**/ ?>