<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
<input type="hidden" id="page_url" value="<?php echo e(route('billing_address.index')); ?>">
<section class="content-header">
	<div class="content-header-left">
		<h1>All Billing Address</h1>
	</div>
	<div class="content-header-right">
		<a href="<?php echo e(route('billing_address.create')); ?>" class="btn btn-primary btn-sm">Add Billing Address</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<?php if(session('status')): ?>
				<div class="callout callout-success">
					<?php echo e(session('status')); ?>

				</div>
			<?php endif; ?>

			<div class="box box-info">
				<div class="box-body">
                    <div class="row">
                        <div class="col-sm-1">Search:</div>
                        <div class="d-flex col-sm-7">
                            <input type="text" id="search" class="form-control" placeholder="Search">
                        </div>
                        <div class="d-flex col-sm-4">
                            <select name="" id="status" class="form-control status" style="margin-bottom:5px">
                                <option value="All" selected>Search by status</option>
                                <option value="1">Active</option>
                                <option value="2">In-Active</option>
                            </select>
                        </div>
                    </div>
					<table id="" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>SL</th>
								<th>Full Name</th>
								<th>Company</th>
								<th>Country</th>
								<th>Street</th>
								<th>Town</th>
								<th>Postcode</th>
								<th>Phone</th>
								<th>Email</th>
								<th>Status</th>
								<th width="100">Action</th>
							</tr>
						</thead>
						<tbody id="body">
							<?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr id="id-<?php echo e($model->id); ?>">
									<td><?php echo e($models->firstItem()+$key); ?>.</td>
									<td><?php echo e($model->first_name); ?> <?php echo e($model->last_name); ?></td>
									<td><?php echo \Illuminate\Support\Str::limit($model->company,20); ?></td>
									<td><?php echo \Illuminate\Support\Str::limit($model->country,30); ?></td>
									<td><?php echo \Illuminate\Support\Str::limit($model->street,50); ?></td> 
									<td><?php echo \Illuminate\Support\Str::limit($model->town,50); ?></td>
									<td><?php echo \Illuminate\Support\Str::limit($model->postcode,50); ?></td>
									<td><?php echo \Illuminate\Support\Str::limit($model->phone,50); ?></td>
									<td><?php echo \Illuminate\Support\Str::limit($model->email,50); ?></td>
									<td>
										<?php if($model->status): ?>
											<span class="label label-success">Active</span>
										<?php else: ?>
											<span class="label label-danger">In-Active</span>
										<?php endif; ?>
									</td>
									<td width="250px">
										<a href="<?php echo e(route('billing_address.edit', $model->id)); ?>" data-toggle="tooltip" data-placement="top" title="Edit post" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                        <button class="btn btn-danger btn-xs delete" data-slug="<?php echo e($model->id); ?>" data-del-url="<?php echo e(url('billing_address', $model->id)); ?>"><i class="fa fa-trash"></i> Delete</button>
									</td>
								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td colspan="12">
									Displying <?php echo e($models->firstItem()); ?> to <?php echo e($models->lastItem()); ?> of <?php echo e($models->total()); ?> records
                                    <div class="d-flex justify-content-center">
                                        <?php echo $models->links('pagination::bootstrap-4'); ?>

                                    </div>
                                </td>
                            </tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.individual.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\never-forget\resources\views/admin/billing_address/index.blade.php ENDPATH**/ ?>