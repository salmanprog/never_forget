<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
<section class="content-header">
	<div class="content-header-left">
		<h1>Add Subscribers</h1>
	</div>
	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('newsletter-list')): ?>
	<div class="content-header-right">
		<a href="<?php echo e(route('newsletter.index')); ?>" class="btn btn-primary btn-sm">View All</a>
	</div>
	<?php endif; ?>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="<?php echo e(route('newsletter.store')); ?>" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				<?php echo csrf_field(); ?>
				<div class="box box-info">
					<div class="box-body">
						<!-- <div class="form-group">
							<label for="" class="col-sm-2 control-label">Name<span style="color: red">*</span></label>
							<div class="col-sm-9">
								<input type="text" autocomplete="off" class="form-control" name="name" value="<?php echo e(old('name')); ?>" placeholder="Enter Name">
								<span style="color: red"><?php echo e($errors->first('name')); ?></span>
							</div>
						</div> -->
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Email<span style="color: red">*</span></label>
							<div class="col-sm-9">
								<input type="email" autocomplete="off" class="form-control" name="email" value="<?php echo e(old('email')); ?>" placeholder="Enter Email">
								<span style="color: red"><?php echo e($errors->first('email')); ?></span>
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
				/* title: "required"
                description: "required" */
			}
		});
	});

	
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\admin\news_letter\create.blade.php ENDPATH**/ ?>