
<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
<section class="content-header">
	<div class="content-header-left">
		<h1>Add Notification</h1>
	</div>
	<div class="content-header-right">
		<a href="<?php echo e(route('notification.index')); ?>" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="<?php echo e(route('notification.store')); ?>" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				<?php echo csrf_field(); ?>
				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
                            <label for="user_id" class="col-sm-2 control-label">User <span style="color: red">*</span></label>
							<div class="col-sm-9">
								<select name="user_id" id="user_id" class="form-control" required>
									<option value="">Select User</option>
									<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($user->id); ?>" <?php echo e(old('user_id') == $user->id ? 'selected' : ''); ?>><?php echo e($user->name); ?> (<?php echo e($user->email); ?>)</option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
								<span style="color: red"><?php echo e($errors->first('user_id')); ?></span>
							</div>
						</div>
						<div class="form-group">
                            <label for="title" class="col-sm-2 control-label">Title <span style="color: red">*</span></label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="title" id="title" value="<?php echo e(old('title')); ?>" placeholder="Enter notification title" required>
								<span style="color: red"><?php echo e($errors->first('title')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="description" class="col-sm-2 control-label">Description</label>
							<div class="col-sm-9">
								<textarea class="form-control" name="description" id="description" style="height:140px;" placeholder="Enter notification description"><?php echo e(old('description')); ?></textarea>
								<span style="color: red"><?php echo e($errors->first('description')); ?></span>
							</div>
						</div>
						<div class="form-group">
                            <label for="module" class="col-sm-2 control-label">Module</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="module" id="module" value="<?php echo e(old('module')); ?>" placeholder="Enter module name (e.g., order, product)">
								<span style="color: red"><?php echo e($errors->first('module')); ?></span>
							</div>
						</div>
						<div class="form-group">
                            <label for="module_id" class="col-sm-2 control-label">Module ID</label>
							<div class="col-sm-9">
								<input type="number" class="form-control" name="module_id" id="module_id" value="<?php echo e(old('module_id')); ?>" placeholder="Enter module ID">
								<span style="color: red"><?php echo e($errors->first('module_id')); ?></span>
							</div>
						</div>
						<div class="form-group">
                            <label for="module_slug" class="col-sm-2 control-label">Module Slug</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="module_slug" id="module_slug" value="<?php echo e(old('module_slug')); ?>" placeholder="Enter module slug">
								<span style="color: red"><?php echo e($errors->first('module_slug')); ?></span>
							</div>
						</div>
						<div class="form-group">
                            <label for="reference_module" class="col-sm-2 control-label">Reference Module</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="reference_module" id="reference_module" value="<?php echo e(old('reference_module')); ?>" placeholder="Enter reference module name">
								<span style="color: red"><?php echo e($errors->first('reference_module')); ?></span>
							</div>
						</div>
						<div class="form-group">
                            <label for="reference_id" class="col-sm-2 control-label">Reference ID</label>
							<div class="col-sm-9">
								<input type="number" class="form-control" name="reference_id" id="reference_id" value="<?php echo e(old('reference_id')); ?>" placeholder="Enter reference ID">
								<span style="color: red"><?php echo e($errors->first('reference_id')); ?></span>
							</div>
						</div>
						<div class="form-group">
                            <label for="reference_slug" class="col-sm-2 control-label">Reference Slug</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="reference_slug" id="reference_slug" value="<?php echo e(old('reference_slug')); ?>" placeholder="Enter reference slug">
								<span style="color: red"><?php echo e($errors->first('reference_slug')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="is_read" class="col-sm-2 control-label">Read Status</label>
							<div class="col-sm-9">
								<select name="is_read" id="is_read" class="form-control">
									<option value="0" <?php echo e(old('is_read') == '0' ? 'selected' : ''); ?>>Unread</option>
									<option value="1" <?php echo e(old('is_read') == '1' ? 'selected' : ''); ?>>Read</option>
								</select>
								<span style="color: red"><?php echo e($errors->first('is_read')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="is_view" class="col-sm-2 control-label">View Status</label>
							<div class="col-sm-9">
								<select name="is_view" id="is_view" class="form-control">
									<option value="0" <?php echo e(old('is_view') == '0' ? 'selected' : ''); ?>>Not Viewed</option>
									<option value="1" <?php echo e(old('is_view') == '1' ? 'selected' : ''); ?>>Viewed</option>
								</select>
								<span style="color: red"><?php echo e($errors->first('is_view')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left">Submit</button>
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
				user_id: "required",
				title: "required"
			}
		});
	});
</script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\admin\notification\create.blade.php ENDPATH**/ ?>