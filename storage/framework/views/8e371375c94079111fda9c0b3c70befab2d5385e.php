<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
<input type="hidden" id="page_url" value="<?php echo e(route('variations.index')); ?>">
<section class="content-header">
        <div class="content-header-left">
            <h1>All Mediums of <?php echo e($product->name); ?></h1>
        </div>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('variations-create')): ?>
            <div class="content-header-right">
                <a href="<?php echo e(route('variations.create',['slug'=>$product->slug])); ?>" class="btn btn-primary btn-sm">Add Variations</a>
            </div>
	    <?php endif; ?>
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
                    
					<table id="" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>SL</th>
								<th>Product Name</th>
								<th>Medium Name</th>
								<th>Status</th>
								<th width="140">Action</th>
							</tr>
						</thead>
						<tbody id="body">
							<?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr id="id-<?php echo e($model->id); ?>">
									<td><?php echo e($models->firstItem()+$key); ?>.</td>
                                    <td><?php echo e(isset($model->hasProduct)?$model->hasProduct->name:'N/A'); ?></td>
                                    <td><?php echo e(isset($model->hasMedium)?$model->hasMedium->title:'N/A'); ?></td>
									<td>
										<?php if($model->status): ?>
                                            <span class="badge label-success">Active</span>
                                        <?php else: ?>
                                            <span class="badge label-danger">In-Active</span>
										<?php endif; ?>
									</td> 
									<td width="250px">
										<a href="<?php echo e(route('variations.index',  ['product_id'=>$model->product_id,'medium_id'=>$model->medium_id])); ?>" data-toggle="tooltip" data-placement="top" title="View Variations" class="btn btn-info btn-xs">View Variations</a>
									</td> 
								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td colspan="12">
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

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\admin\variations\show.blade.php ENDPATH**/ ?>