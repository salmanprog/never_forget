<?php
    if (Auth::user()->hasRole('Admin')) {
        $layout = 'layouts.admin.app';
    } elseif (Auth::user()->hasRole('Individual')) {
        $layout = 'layouts.individual.app';
    } elseif (Auth::user()->hasRole('Company')) {
        $layout = 'layouts.company.app';
    } else {
        $layout = 'layouts.company.app';
    }
?>



<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
<input type="hidden" id="page_url" value="<?php echo e(route('order.index')); ?>">
<section class="content-header">
	<div class="content-header-left">
		<h1>All Orders</h1>
	</div>
	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('order-create')): ?>
	<div class="content-header-right">
		
	</div>
	<?php endif; ?>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-body">
                    <div class="row" style="margin-bottom:10px">
                        <div class="d-flex col-sm-12">
                            <input type="text" id="search" class="form-control" placeholder="Search by Order No#">
                        </div>
                        <div class="d-flex col-sm-4" style="display: none">
                            <select name="" id="status" class="form-control status" style="margin-bottom:5px">
                                <option value="All" selected>Search by status</option>
                                <option value="1">Active</option>
                                <option value="2">In-Active</option>
                            </select>
                        </div>
                    </div>
					<table id="" class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th>SL</th>
								<th>Order No#</th>
								<th>Customer </th>
								<th>Email </th>
								<th>Date</th>
                                <th>Order Status</th>
								<?php if(Auth::user()->hasRole('Admin')): ?>
									<th>Action</th>
								<?php endif; ?>
							</tr>
						</thead>
						<tbody id="body">
							<?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr id="id-<?php echo e($model->slug); ?>">
									<td><?php echo e($models->firstItem()+$key); ?>.</td>

									<td width="80px"><?php echo e($model->order_number); ?></td>
									<td>
										<?php if($model->customer_id > 0 && $model->hasCustomer): ?>
											<?php echo e($model->hasCustomer->name); ?>

										<?php else: ?>
											<?php echo e($model->guest_first_name); ?> <?php echo e($model->guest_last_name); ?> (Guest)
										<?php endif; ?>
									</td>
									<td>
										<?php if($model->customer_id > 0 && $model->hasCustomer): ?>
											<?php echo e($model->hasCustomer->email); ?>

										<?php else: ?>
											<?php echo e($model->guest_email); ?>

										<?php endif; ?>
									</td>
                                    <td><?php echo e(date('d, m-Y H:i A', strtotime($model->created_at))); ?></td>
									<td>
                                        <?php if($model->order_status == 'Pending'): ?>
                                            <span class="badge label-info">Pending</span>
                                        <?php elseif($model->order_status == 'Delivered'): ?>
                                            <span class="badge label-warning">Delivered</span>
                                        <?php elseif($model->order_status == 'Completed'): ?>
                                            <span class="badge label-success">Completed</span>
                                        <?php elseif($model->order_status == 'Canceled'): ?>
                                            <span class="badge label-danger">Canceled</span>
										<?php endif; ?>
									</td>
                                    
									<td width="100px">
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('order-show')): ?>
                                        <a href="<?php echo e(route('order.show', $model->id)); ?>" data-toggle="tooltip" data-placement="top" title="Show order" class="btn btn-info btn-xs"><i class="fa fa-eye"></i></a>
										<?php endif; ?>
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('order-edit')): ?>
                                        <a href="<?php echo e(route('order.edit', $model->id)); ?>" data-toggle="tooltip" data-placement="top" title="Edit order" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
										<?php endif; ?>
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('order-invoice')): ?>
                                        <a href="<?php echo e(route('order.invoice', ['id' => $model->id])); ?>" data-toggle="tooltip" data-placement="top" title="Order Invoice" class="btn btn-warning btn-xs"><i class="fa fa-file"></i></a>
										<?php endif; ?>
									</td>
								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td colspan="7">
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

<?php echo $__env->make($layout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp8.2\htdocs\never-forget\resources\views/admin/order/index.blade.php ENDPATH**/ ?>