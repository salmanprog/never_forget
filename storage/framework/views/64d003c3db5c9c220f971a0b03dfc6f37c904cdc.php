<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
<input type="hidden" id="page_url" value="<?php echo e(route('sizes.index')); ?>">
<section class="content-header">
	<div class="content-header-left">
		<h1>All Sizes</h1>
	</div>
	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sizes-create')): ?>
        <div class="content-header-right">
            <a href="<?php echo e(route('sizes.create')); ?>" class="btn btn-primary btn-sm">Add Sizes</a>
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
                    <div class="row">
                       
                        <div class="d-flex col-sm-8">
                            <input type="text" id="search" class="form-control" placeholder="Search By Sizes">
                        </div>
                        <div class="d-flex col-sm-4">
                            <select name="" id="status" class="form-control status" style="margin-bottom:10px">
                                <option value="All" selected>Search by status</option>
                                <option value="1">Active</option>
                                <option value="0">In-Active</option>
                            </select>
                        </div>
                    </div>
					<table id="" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>#No.</th>
								<th>Sizes</th>
								<th>Status</th>
                                <th>Created by</th>
								<th width="220">Action</th>
							</tr>
						</thead>
						<tbody id="body">
							<?php $__currentLoopData = $sizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr id="id-<?php echo e($size->id); ?>">
									<td><?php echo e($sizes->firstItem()+$key); ?>.</td>
                                    <td><?php echo e(\Illuminate\Support\Str::limit($size->sizes??'N/A',60)); ?></td>
									<td>
                                        <?php if($size->status): ?>
                                            <span class="badge label-success">Active</span>
                                        <?php else: ?>
                                            <span class="badge label-danger">In-Active</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e(isset($size->hasCreatedBy)?$size->hasCreatedBy->name:'N/A'); ?></td>
                                    <td>
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sizes-edit')): ?>
											<a href="<?php echo e(route('sizes.edit', $size->id)); ?>" data-toggle="tooltip" data-placement="top" title="Edit Sizes" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
										<?php endif; ?>
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sizes-delete')): ?>
                                            <button class="btn btn-danger btn-xs delete" data-slug="<?php echo e($size->id); ?>" data-del-url="<?php echo e(url('sizes', $size->id)); ?>"><i class="fa fa-trash"></i> Delete</button>
										<?php endif; ?>
									</td>
								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td colspan="5">
									Displying <?php echo e($sizes->firstItem()); ?> to <?php echo e($sizes->lastItem()); ?> of <?php echo e($sizes->total()); ?> records
                                    <div class="d-flex justify-content-center">
                                        <?php echo $sizes->links('pagination::bootstrap-4'); ?>

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

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\admin\sizes\index.blade.php ENDPATH**/ ?>