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
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-body">
					<table class="table bordered">
						<tr>
							<th>Name</th>
							<td><span class="badge badge-success"><?php echo e($service->name); ?></span></td>
						</tr>
						<tr>
							<th>Description</th>
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
	</div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\admin\service\show.blade.php ENDPATH**/ ?>