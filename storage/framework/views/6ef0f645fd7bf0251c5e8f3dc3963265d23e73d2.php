<?php $__env->startSection('content'); ?>
<?php $__env->startSection('title', 'Package / Upgrade Settings'); ?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Upgrade Package Settings</h1>
	</div>
	<div class="content-header-right">
		<?php echo $__env->make('includes.buttons.back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<a href="<?php echo e(route('page.index')); ?>" class="btn btn-primary btn-sm">Website Settings</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<?php if(session('message')): ?>
				<div class="callout callout-success">
					<?php echo e(session('message')); ?>

				</div>
			<?php endif; ?>
			<?php if($errors->any()): ?>
				<div class="callout callout-danger">
					<ul class="mb-0">
						<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li><?php echo e($error); ?></li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</ul>
				</div>
			<?php endif; ?>
			<form action="<?php echo e(route('admin.package_setting.update')); ?>" class="form-horizontal" method="post" accept-charset="utf-8">
				<?php echo csrf_field(); ?>
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">Configure the single upgrade package shown to company users</h3>
					</div>
					<div class="box-body">
						<div class="form-group">
							<label for="package_name" class="col-sm-2 control-label">Package name</label>
							<div class="col-sm-9">
								<input type="text" id="package_name" name="package_name" class="form-control" value="<?php echo e(old('package_name', $package_name)); ?>" placeholder="e.g. Resource Upgrade Package">
							</div>
						</div>
						<div class="form-group">
							<label for="package_amount" class="col-sm-2 control-label">Package amount ($) <span class="text-danger">*</span></label>
							<div class="col-sm-9">
								<input type="number" step="0.01" min="0" id="package_amount" name="package_amount" class="form-control" value="<?php echo e(old('package_amount', $package_amount)); ?>" placeholder="e.g. 99" required>
								<span class="help-block">Price company users pay for this upgrade.</span>
							</div>
						</div>
						<div class="form-group">
							<label for="package_employees" class="col-sm-2 control-label">Number of employees <span class="text-danger">*</span></label>
							<div class="col-sm-9">
								<input type="number" min="1" id="package_employees" name="package_employees" class="form-control" value="<?php echo e(old('package_employees', $package_employees)); ?>" placeholder="e.g. 20" required>
								<span class="help-block">Max employees allowed after purchasing this package.</span>
							</div>
						</div>
						<div class="form-group">
							<label for="package_clients" class="col-sm-2 control-label">Number of clients <span class="text-danger">*</span></label>
							<div class="col-sm-9">
								<input type="number" min="0" id="package_clients" name="package_clients" class="form-control" value="<?php echo e(old('package_clients', $package_clients)); ?>" placeholder="e.g. 10" required>
								<span class="help-block">Max clients allowed after purchasing this package.</span>
							</div>
						</div>
					</div>
					<div class="box-footer">
						<div class="col-sm-offset-2 col-sm-9">
							<button type="submit" class="btn btn-primary">Save package settings</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\admin\package_setting\index.blade.php ENDPATH**/ ?>