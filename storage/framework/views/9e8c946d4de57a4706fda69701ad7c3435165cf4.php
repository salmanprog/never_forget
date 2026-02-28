<?php $__env->startSection('title', $page_title); ?>
<style>
	.form-control {
		margin-bottom: 20px;
	}
	.alert {
		display: flex;
		justify-content: space-between;
		align-items: center;
	}
	.custom-alert-warning {
		background-color: #cfa40c !important;
		color: #fff !important;
	}
</style>
<?php $__env->startSection('content'); ?>
<section class="content-header">
	<div class="content-header-left">
		<h1>Company Profile</h1>
	</div>
	<div class="content-header-right">
		<a href="<?php echo e(route('company.profile.edit')); ?>" class="btn btn-primary btn-sm">Edit Profile</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<?php if(!$company): ?>
			<div class="callout custom-alert-warning">
				<p>No company profile found. <a href="<?php echo e(route('company.profile.edit')); ?>">Complete your profile</a> to add company information.</p>
			</div>
		<?php else: ?>
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-body">
					
					<div class="col-sm-12"><h4 style="color: #cfa40c; margin-bottom: 15px;">Basic Company Information</h4></div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Company Name <span style="color: red">*</span></label>
						<div class="col-sm-9">
							<input type="text" class="form-control" readonly value="<?php echo e($company->name ?? ''); ?>" style="background-color: #fff; cursor: default;">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Registration Number</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" readonly value="<?php echo e($company->registration_number ?? ''); ?>" style="background-color: #fff; cursor: default;">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Industry</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" readonly value="<?php echo e($company->industry ?? ''); ?>" style="background-color: #fff; cursor: default;">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Company Website</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" readonly value="<?php echo e($company->website ?? ''); ?>" style="background-color: #fff; cursor: default;">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Year Established</label>
						<div class="col-sm-9">
							<?php
								$yearDisplay = $company->year_established ?? '';
								try {
									if ($yearDisplay && strlen($yearDisplay) <= 4 && preg_match('/^\d{4}$/', $yearDisplay)) {
										$yearDisplay = \Carbon\Carbon::createFromFormat('Y', $yearDisplay)->format('F Y');
									} elseif ($yearDisplay && preg_match('/^\d{4}-\d{2}-\d{2}$/', $yearDisplay)) {
										$yearDisplay = \Carbon\Carbon::parse($yearDisplay)->format('F j, Y');
									}
								} catch (\Exception $e) {
									// keep original value if not a valid date
								}
							?>
							<input type="text" class="form-control" readonly value="<?php echo e($yearDisplay); ?>" style="background-color: #fff; cursor: default;">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Number of Employees <span style="color: red">*</span></label>
						<div class="col-sm-9">
							<input type="text" class="form-control" readonly value="<?php echo e($company->number_of_employees ?? ''); ?>" style="background-color: #fff; cursor: default;">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Company Logo (upload) <span style="color: red">*</span></label>
						<div class="col-sm-6" style="padding-top:5px">
							<?php if(!empty($company->logo)): ?>
								<img style="max-width: 80px; max-height: 80px;" src="<?php echo e(asset('public/admin/assets/images/company-logos/' . $company->logo)); ?>?v=<?php echo e($company->updated_at ? $company->updated_at->timestamp : time()); ?>" alt="Company Logo">
							<?php else: ?>
								<input type="text" class="form-control" readonly value="—" style="background-color: #fff; cursor: default;">
							<?php endif; ?>
						</div>
					</div>

					
					<hr class="col-sm-11" style="margin: 20px 0; border-color: #cfa40c;">
					<div class="col-sm-12"><h4 style="color: #cfa40c; margin-bottom: 15px;">Primary Contact Information</h4></div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Full Name</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" readonly value="<?php echo e($company->primary_contact_name ?? ''); ?>" style="background-color: #fff; cursor: default;">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Job Title</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" readonly value="<?php echo e($company->job_title ?? ''); ?>" style="background-color: #fff; cursor: default;">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Business Email <span style="color: red">*</span></label>
						<div class="col-sm-9">
							<input type="text" class="form-control" readonly value="<?php echo e($company->billing_email ?? ''); ?>" style="background-color: #fff; cursor: default;">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Direct Phone Number <span style="color: red">*</span></label>
						<div class="col-sm-9">
							<input type="text" class="form-control" readonly value="<?php echo e($company->billing_phone ?? ''); ?>" style="background-color: #fff; cursor: default;">
						</div>
					</div>
					
					<?php
						$billingNameParts = $company && trim($company->primary_contact_name ?? '') ? explode(' ', trim($company->primary_contact_name), 2) : ['', ''];
					?>
					<hr class="col-sm-11" style="margin: 20px 0; border-color: #cfa40c;">
					<div class="col-sm-12"><h4 style="color: #cfa40c; margin-bottom: 15px;">Billing Information (Required)</h4></div>
					<div class="form-group">
						<label class="col-sm-2 control-label">First Name</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" readonly value="<?php echo e($billingNameParts[0] ?? ''); ?>" style="background-color: #fff; cursor: default;">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Last Name</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" readonly value="<?php echo e($billingNameParts[1] ?? ''); ?>" style="background-color: #fff; cursor: default;">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Company</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" readonly value="<?php echo e($company->name ?? ''); ?>" style="background-color: #fff; cursor: default;">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Country</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" readonly value="<?php echo e($company->billing_country ?? ''); ?>" style="background-color: #fff; cursor: default;">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Street</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" readonly value="<?php echo e($company->billing_address_line_1 ?? ''); ?>" style="background-color: #fff; cursor: default;">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">State</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" readonly value="<?php echo e($company->state ?? ''); ?>" style="background-color: #fff; cursor: default;">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Town</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" readonly value="<?php echo e($company->city ?? ''); ?>" style="background-color: #fff; cursor: default;">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Postal Code</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" readonly value="<?php echo e($company->zip_code ?? ''); ?>" style="background-color: #fff; cursor: default;">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Phone</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" readonly value="<?php echo e($company->billing_phone ?? ''); ?>" style="background-color: #fff; cursor: default;">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Email</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" readonly value="<?php echo e($company->billing_email ?? ''); ?>" style="background-color: #fff; cursor: default;">
						</div>
					</div>

					
					<hr class="col-sm-11" style="margin: 20px 0; border-color: #cfa40c;">
					<div class="col-sm-12"><h4 style="color: #cfa40c; margin-bottom: 15px;">Personal Information</h4></div>
					<div class="form-group">
						<label class="col-sm-2 control-label">First Name <span style="color: red">*</span></label>
						<div class="col-sm-9">
							<input type="text" class="form-control" readonly value="<?php echo e($user->name ?? ''); ?>" style="background-color: #fff; cursor: default;">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Last Name</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" readonly value="<?php echo e($user->last_name ?? ''); ?>" style="background-color: #fff; cursor: default;">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Email</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" readonly value="<?php echo e($user->email ?? ''); ?>" style="background-color: #fff; cursor: default;">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Phone Number</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" readonly value="<?php echo e($user->phone ?? ''); ?>" style="background-color: #fff; cursor: default;">
						</div>
					</div>
				</div>
			</div>
			<?php endif; ?>
		</div>
	</div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.company.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\never-forget\resources\views/website/company-dashboard/profile.blade.php ENDPATH**/ ?>