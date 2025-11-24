
<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
	<section class="content-header">
		<div class="content-header-left">
			<h1>Add Salesperson</h1>
		</div>
		<div class="content-header-right">
			<a href="<?php echo e(route('user.index', ['type' => 'salesperson'])); ?>" class="btn btn-primary btn-sm">View All Salesperson</a>
		</div>
	</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="<?php echo e(route('user.store')); ?>" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				<?php echo csrf_field(); ?>

				<div class="box box-info">
					<div class="box-body">
						
						
						<div class="form-group">
							
							<div class="col-sm-8">
								<input type="hidden" class="form-control" value="<?php echo e($salesperson_roles->first()->name ?? ''); ?>" name="account_type" readonly>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">First Name <span style="color: red">*</span></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" value="<?php echo e(old('first_name')); ?>" name="first_name" placeholder="Enter user first name">
								<span style="color: red"><?php echo e($errors->first('first_name')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Last Name <span style="color: red">*</span></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" value="<?php echo e(old('last_name')); ?>" name="last_name" placeholder="Enter user last name">
								<span style="color: red"><?php echo e($errors->first('last_name')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Email <span style="color: red">*</span></label>
							<div class="col-sm-8">
								<input type="email" class="form-control" value="<?php echo e(old('email')); ?>" name="email" placeholder="Enter user email">
								<span style="color: red"><?php echo e($errors->first('email')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Phone <span style="color: red">*</span></label>
							<div class="col-sm-8">
								<input type="tel" class="form-control" value="<?php echo e(old('phone')); ?>" name="phone" placeholder="Enter user phone">
								<span style="color: red"><?php echo e($errors->first('phone')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Address <span style="color: red">*</span></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" value="<?php echo e(old('address')); ?>" name="address" placeholder="Enter user address">
								<span style="color: red"><?php echo e($errors->first('address')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Password <span style="color: red">*</span></label>
							<div class="col-sm-8">
								<input type="password" class="form-control" name="password" placeholder="Enter password">
								<span style="color: red"><?php echo e($errors->first('password')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Confirm Password <span style="color: red">*</span></label>
							<div class="col-sm-8">
								<input type="password" class="form-control" name="confirm-password" placeholder="Confirm password">
								<span style="color: red"><?php echo e($errors->first('confirm-password')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
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
					password: "required",
					confirm_password: "required",
				}
			});
		});
	</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\never-forget-13nov\resources\views/admin/user/create.blade.php ENDPATH**/ ?>