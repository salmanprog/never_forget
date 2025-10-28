<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
<input type="hidden" id="page_url" value="<?php echo e(route('career_category.index')); ?>">
<section class="content-header">
	<div class="content-header-left">
		<h1><?php echo e($page_title); ?></h1>
	</div>
	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('career_category-create')): ?>
	<div class="content-header-right">
		<a href="<?php echo e(route('career_category.create')); ?>" class="btn btn-primary btn-sm"><?php echo e($page_title_add); ?></a>
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
					<div class="table-responsive p-0">
						<table id="" class="table table-hover table-bordered">
							<thead>
								<tr>
									<th>No.</th> 
									<th>Career Category</th> 
									<th>Status</th> 
									<th width="140">Action</th>
								</tr>
							</thead>
							<tbody id="body">
								<?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr id="id-<?php echo e($model->id); ?>">
									<td><?php echo e($models->firstItem()+$key); ?>.</td>
									<td><?php echo e(\Illuminate\Support\Str::limit($model->title,40)); ?></td>
									<td>
										<?php if($model->status): ?>
										<span class="label label-success">Active</span>
										<?php else: ?>
										<span class="label label-danger">In-Active</span>
										<?php endif; ?>
									</td>
									<!-- <td><?php echo e(isset($model->hasCreatedBy)?$model->hasCreatedBy->name:'N/A'); ?></td> -->
									<td width="250px">
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('career_category-edit')): ?>
										<a href="<?php echo e(route('career_category.edit', $model->id)); ?>" data-toggle="tooltip" data-placement="top" title="Edit Job Category" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
										<?php endif; ?>
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('career_category-delete')): ?>
										<button class="btn btn-danger btn-xs delete" data-slug="<?php echo e($model->id); ?>" data-del-url="<?php echo e(url('career_category', $model->id)); ?>"><i class="fa fa-trash"></i> Delete</button>
										<?php endif; ?>
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
	</div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp8.2\htdocs\never-forget\resources\views/admin/career_category/index.blade.php ENDPATH**/ ?>