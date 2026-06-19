<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
<input type="hidden" id="page_url" value="<?php echo e(route('service.index')); ?>">
<section class="content-header">
	<div class="content-header-left">
		<h1>All services</h1>
	</div>
	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('service-create')): ?>
	<div class="content-header-right">
		<a href="<?php echo e(route('service.create')); ?>" class="btn btn-primary btn-sm">Add service</a>
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
                        <div class="col-sm-1">Search:</div>
                        <div class="d-flex col-sm-6">
                            <input type="text" id="search" class="form-control" placeholder="Search">
                        </div>
                        <div class="d-flex col-sm-5">
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
								<th>Name</th>
								<th>Description</th>
								<th>Created by</th>
								<th>Status</th>
								<th width="140">Action</th>
							</tr>
						</thead>
						<tbody id="body">
							<?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr id="id-<?php echo e($service->slug); ?>">
									<td><?php echo e($services->firstItem()+$key); ?>.</td>
									<td><?php echo \Illuminate\Support\Str::limit($service->name,40); ?></td>
									<td><?php echo \Illuminate\Support\Str::limit($service->description,60); ?></td>
									<td><?php echo isset($service->hasCreatedBy)?$service->hasCreatedBy->name:'N/A'; ?></td>
									<td>
										<?php if($service->status): ?>
											<span class="badge badge-success">Active</span>
										<?php else: ?>
											<span class="badge badge-danger">In-Active</span>
										<?php endif; ?>
									</td>
									<td width="250px">
										<a href="<?php echo e(route('service.show', $service->slug)); ?>" data-toggle="tooltip" data-placement="top" title="Show service" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Show</a>
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('service-edit')): ?>
											<a href="<?php echo e(route('service.edit', $service->slug)); ?>" data-toggle="tooltip" data-placement="top" title="Edit service" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
										<?php endif; ?>
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('service-delete')): ?>
                                            <button class="btn btn-danger btn-xs delete" data-slug="<?php echo e($service->slug); ?>" data-del-url="<?php echo e(url('service', $service->slug)); ?>"><i class="fa fa-trash"></i> Delete</button>
										<?php endif; ?>
									</td>
								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td colspan="6">
									Displying <?php echo e($services->firstItem()); ?> to <?php echo e($services->lastItem()); ?> of <?php echo e($services->total()); ?> records
                                    <div class="d-flex justify-content-center">
                                        <?php echo $services->links('pagination::bootstrap-4'); ?>

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

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\admin\service\index.blade.php ENDPATH**/ ?>