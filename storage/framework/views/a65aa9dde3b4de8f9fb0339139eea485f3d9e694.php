<?php $__env->startSection('content'); ?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Show Service Details</h1>
	</div>
	<div class="content-header-right">
		<a href="<?php echo e(route('service.index')); ?>" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<section class="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<table class="table bordered">
					<tr>
						<th>Image</th>
						<td>
							<?php if($service->image): ?>
								<img src="<?php echo e(asset('public/admin/assets/images/services')); ?>/<?php echo e($service->image); ?>" alt="Slider Image" height="400px" width="500px">
							<?php else: ?> 
								<img src="<?php echo e(asset('public/admin/assets/images/services/no-photo1.jpg')); ?>" alt="Slider Image" height="400px" width="500px">
							<?php endif; ?>
						</td>
					</tr>
					<tr>
						<th>Name</th>
						<td><span class="badge badge-success"><?php echo e($service->name); ?></span></td>
					</tr>
					<tr>
						<th>Short Description</th>
						<td><?php echo $service->short_description; ?></td>
					</tr>
					<tr>
						<th>Full Description</th>
						<td><?php echo $service->description; ?></td>
					</tr>
					<tr>
						<th>Status</th>
						<td>
							<?php if($service->status): ?>
								<span class="badge badge-success">Active</span>
							<?php else: ?> 
								<span class="badge badge-danger">In-Active</span>
							<?php endif; ?>
						</td>
					</tr>
					<tr>
						<th>Date</th>
						<td>
							<span class="badge badge-success"><?php echo e(date('d, F-Y H:i:s A', strtotime($service->created_at))); ?></span>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</section>

<script>
	$(document).ready(function() {
		$('.editor_short').summernote({
			height: 150
		});
	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\admin\blog\show.blade.php ENDPATH**/ ?>