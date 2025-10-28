<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
<input type="hidden" id="page_url" value="<?php echo e(route('page.index')); ?>">
<section class="content-header">
    <div class="content-header-left">
        <h1>All Pages</h1>
    </div>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('page-create')): ?>
		<div class="content-header-right">
			<a href="<?php echo e(route('page.create')); ?>" class="btn btn-primary btn-sm">Add Page</a>
		</div>
	<?php endif; ?>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-body">
                    <div class="row">
                        	
                        <div class="d-flex col-sm-8">
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
					<table id="" class="table table-hover table-bordered table-striped">
						<thead>
							<tr>
								<th>SL</th>
								<th>Title</th>
								
                                <th>Status</th>
								<th width="140">Action</th>
							</tr>
						</thead>
						<tbody id="body">
							<?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr id="id-<?php echo e($model->slug); ?>">
									<td><?php echo e($models->firstItem()+$key); ?>.</td>
									<td><?php echo $model->title??'N/A'; ?></td>
									
									<td>
										<?php if($model->status): ?>
											<span class="badge label-success">Active</span>
										<?php else: ?>
											<span class="badge label-danger">In-Active</span>
										<?php endif; ?>
									</td>
									<td width="250px">
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('page-edit')): ?>
											<a href="<?php echo e(route('page.edit', $model->slug)); ?>" data-toggle="tooltip" data-placement="top" title="Edit page" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
										<?php endif; ?>
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('page-delete')): ?>
                                            <button class="btn btn-danger btn-xs delete" data-slug="<?php echo e($model->slug); ?>" data-del-url="<?php echo e(url('page', $model->slug)); ?>"><i class="fa fa-trash"></i> Delete</button>
										<?php endif; ?>

                                        <a href="<?php echo e(route('page_setting.show', $model->slug)); ?>" data-toggle="tooltip" data-placement="top" title="Page Setting" class="btn btn-info btn-xs"><i class="fa fa-cog"></i> Setting</a>
									</td>
								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td colspan="8">
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

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp8.2\htdocs\never-forget\resources\views/admin/page/index.blade.php ENDPATH**/ ?>