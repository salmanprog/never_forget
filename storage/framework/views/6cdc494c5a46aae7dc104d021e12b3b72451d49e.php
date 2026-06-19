
<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
<input type="hidden" id="page_url" value="<?php echo e(route('variations.index')); ?>">
<section class="content-header">
	<div class="content-header-left">
		<h1>All Variations</h1>
	</div>
	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('variations-create')): ?>
        <div class="content-header-right">
			<?php echo $__env->make('includes.buttons.back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <a href="<?php echo e(route('variations.create')); ?>" class="btn btn-primary btn-sm">Add Variations</a>
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
								<th width="30">SL</th> 
								<th>Name</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody id="body">
							<?php $__currentLoopData = $variations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr id="id-<?php echo e($variation->id); ?>">
									<td><?php echo e($variations->firstItem()+$key); ?>.</td>
									<td><?php echo $variation->name; ?></td>
									<td>
										<?php if($variation->status): ?>
                                            <span class="badge label-success">Active</span>
										<?php else: ?>
											<span class="badge label-danger">In-Active</span>
										<?php endif; ?>
									</td>
									<td>
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('variations-edit')): ?>
											<a href="<?php echo e(route('variations.edit', $variation->id)); ?>" data-toggle="tooltip" data-placement="top" title="Edit variation" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
										<?php endif; ?>
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('variations-delete')): ?>
                                            <button class="btn btn-danger btn-xs delete" data-slug="<?php echo e($variation->id); ?>" data-del-url="<?php echo e(url('variations', $variation->id)); ?>"><i class="fa fa-trash"></i> Delete</button>
										<?php endif; ?>
									</td>
								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td colspan="6">
									Displying <?php echo e($variations->firstItem()); ?> to <?php echo e($variations->lastItem()); ?> of <?php echo e($variations->total()); ?> records
                                    <div class="d-flex justify-content-center">
                                        <?php echo $variations->links('pagination::bootstrap-4'); ?>

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

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\admin\variations\index.blade.php ENDPATH**/ ?>