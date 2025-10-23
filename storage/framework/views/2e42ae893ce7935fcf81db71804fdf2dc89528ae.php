<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
<input type="hidden" id="page_url" value="<?php echo e(route('category.index')); ?>">
<section class="content-header">
	<div class="content-header-left">
		<h1>All Categories</h1>
	</div>
	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category-create')): ?>
        <div class="content-header-right">
            <a href="<?php echo e(route('category.create')); ?>" class="btn btn-primary btn-sm">Add category</a>
        </div>
	<?php endif; ?>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-body">
                    <div class="row" style="margin-bottom: 10px;">
                        
                        <div class="d-flex col-sm-8">
                            <input type="text" id="search" class="form-control" placeholder="Search by Title">
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
								
								<th>Image</th>
								<th>Status</th>
								<th>Created by</th>
								<th width="140">Action</th>
							</tr>
						</thead>
						<tbody id="body">
							<?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr id="id-<?php echo e($model->slug); ?>">
									<td><?php echo e($models->firstItem()+$key); ?>.</td>

									<td><?php echo e(\Illuminate\Support\Str::limit($model->title,40)); ?></td>
									
									 <td>
										<?php if($model->image): ?>
											<img src="<?php echo e(asset('public/admin/assets/images/categories/'.$model->image)); ?>" alt="" style="width:60px;">
										<?php else: ?>
											<img src="<?php echo e(asset('public/admin/assets/images/default.jpg')); ?>" style="width:60px;">
										<?php endif; ?>
									</td>
									<td>
										<?php if($model->status): ?>
                                            <span class="badge label-success">Active</span>
										<?php else: ?>
											<span class="badge label-danger">In-Active</span>
										<?php endif; ?>
									</td>
                                    <td><?php echo e(isset($model->hasCreatedBy)?$model->hasCreatedBy->name:'N/A'); ?></td>
									<td width="250px">
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category-edit')): ?>
											<a href="<?php echo e(route('category.edit', $model->id)); ?>" data-toggle="tooltip" data-placement="top" title="Edit category" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
										<?php endif; ?>
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category-delete')): ?>
                                            <button class="btn btn-danger btn-xs delete" data-slug="<?php echo e($model->slug); ?>" data-del-url="<?php echo e(url('category', $model->slug)); ?>"><i class="fa fa-trash"></i> Delete</button>
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

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp8.2\htdocs\never-forget\resources\views/admin/category/index.blade.php ENDPATH**/ ?>