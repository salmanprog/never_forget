<?php $__env->startSection('content'); ?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Show Business Card Category Details</h1>
	</div>
	<div class="content-header-right">
		<a href="<?php echo e(route('business_card_category.index')); ?>" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<section class="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<table class="table bordered">
					
					<tr>
						<th>Parent Category</th>
						<td>
							<?php if($business_card_category->parent_id): ?>
								<span class="badge badge-success"><?php echo e($business_card_category->hasParent->title); ?></span>
							<?php else: ?> 
								<span class="badge badge-danger">No Parent</span>
							<?php endif; ?>
						</td>
					</tr>
					<tr>
						<th>Title</th>
						<td><span class="badge badge-success"><?php echo e($business_card_category->title); ?></span></td>
					</tr> 
					 
					<tr>
						<th>Status</th>
						<td>
							<?php if($business_card_category->status): ?>
								<span class="badge badge-success">Active</span>
							<?php else: ?> 
								<span class="badge badge-danger">In-Active</span>
							<?php endif; ?>
						</td>
					</tr>
					<tr>
						<th>Date</th>
						<td>
							<span class="badge badge-success"><?php echo e(date('d, F-Y H:i:s A', strtotime($business_card_category->created_at))); ?></span>
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
<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\admin\business_card_category\show.blade.php ENDPATH**/ ?>