<?php $__env->startSection('content'); ?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Show Billing Address Details</h1>
	</div>
	<div class="content-header-right">
		<a href="<?php echo e(route('billing_address.index')); ?>" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<section class="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<table class="table bordered">
					<tr>
						<th>First Name</th>
						<td><?php echo e($address->first_name); ?></td>
					</tr>
					<tr>
						<th>Last Name</th>
						<td><?php echo e($address->last_name); ?></td>
					</tr>
					<tr>
						<th>Company</th>
						<td><?php echo e($address->company); ?></td>
					</tr>
					<tr>
						<th>Country</th>
						<td><?php echo e($address->country); ?></td>
					</tr>
					<tr>
						<th>Street</th>
						<td><?php echo e($address->street); ?></td>
					</tr>
					<tr>
						<th>Town</th>
						<td><?php echo e($address->town); ?></td>
					</tr>
					<tr>
						<th>Postcode</th>
						<td><?php echo e($address->postcode); ?></td>
					</tr>
					<tr>
						<th>Phone</th>
						<td><?php echo e($address->phone); ?></td>
					</tr>
					<tr>
						<th>Email</th>
						<td><?php echo e($address->email); ?></td>
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
<?php echo $__env->make('layouts.individual.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\admin\billing_address\show.blade.php ENDPATH**/ ?>