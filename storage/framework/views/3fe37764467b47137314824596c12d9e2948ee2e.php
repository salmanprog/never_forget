<?php $__env->startSection('content'); ?>
<section class="content-header">
	<div class="content-header-left">
		<h1>Edit Profile</h1>
	</div>
	<div class="content-header-right">
		<?php echo $__env->make('includes.buttons.back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<a href="<?php echo e(route('admin.profile.edit')); ?>" class="btn btn-primary btn-sm">Dashboard</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<?php if(session('success')): ?>
				<div class="callout callout-success">
					<?php echo e(session('success')); ?>

				</div>
			<?php endif; ?>
			<form action="<?php echo e(route('admin.profile.update')); ?>" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				<?php echo csrf_field(); ?>

				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Role </label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" readonly value="<?php echo e(Auth::user()->hasRole('Admin')?'Admin':''); ?>">
								<span style="color: red"><?php echo e($errors->first('name')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Name <span style="color: red">*</span></label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="name" value="<?php echo e(Auth::user()->name); ?>" placeholder="Enter title">
								<span style="color: red"><?php echo e($errors->first('name')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Email </label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" readonly value="<?php echo e(Auth::user()->email); ?>" placeholder="Enter title">
								<span style="color: red"><?php echo e($errors->first('title')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Password </label>
							<div class="col-sm-9">
								<input type="password" autocomplete="off" class="form-control" name="password" placeholder="Enter new password">
								<span style="color: red"><?php echo e($errors->first('password')); ?></span>
							</div>
						</div>

						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Confirm Password </label>
							<div class="col-sm-9">
								<input type="password" autocomplete="off" class="form-control" name="confirm-password" placeholder="Confirm password">
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
	$(document).ready(function() {
		if ($(".texteditor").length > 0) {
			tinymce.init({
				selector: "textarea.texteditor",
				theme: "modern",
				height: 150,
				plugins: [
					"advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
					"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
					"save table contextmenu directionality emoticons template paste textcolor"
				],
				toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

			});
		}

		$("#regform").validate({
			rules: {
				first_name: "required",
				designation: "required",
			}
		});
	});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\never-forget\resources\views/admin/dashboard/edit.blade.php ENDPATH**/ ?>