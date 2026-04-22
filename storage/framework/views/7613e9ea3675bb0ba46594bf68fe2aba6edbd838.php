<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
<input type="hidden" id="page_url" value="<?php echo e(route('catering_service.index')); ?>">
<section class="content-header">
	<div class="content-header-left">
		<h1>All Catering Services</h1>
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
                    <div class="row" style="margin-bottom:10px">

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
					<table id="" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>SL</th>
								<th>First Image</th>
								<th>Second Image</th>
								<th>First Title</th>
								<th>Second Title</th>
								<th>Heading</th>
								<th>Description</th>
								<th>Status</th>
								<th>Created by</th>
								<th width="140">Action</th>
							</tr>
						</thead>
						<tbody id="body">
							<?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr id="id-<?php echo e($model->id); ?>">
									<td><?php echo e($models->firstItem()+$key); ?>.</td>
                                    <td>
										<?php if($model->first_image): ?>
											<img src="<?php echo e(asset('public/admin/assets/images/catering/'.$model->first_image)); ?>" alt="" style="width:100px;">
										<?php else: ?>
											<img src="<?php echo e(asset('public/admin/assets/images/default.jpg')); ?>" style="width:100px;">
										<?php endif; ?>
									</td>
                                    <td>
										<?php if($model->second_image): ?>
											<img src="<?php echo e(asset('public/admin/assets/images/catering/'.$model->second_image)); ?>" alt="" style="width:100px;">
										<?php else: ?>
											<img src="<?php echo e(asset('public/admin/assets/images/default.jpg')); ?>" style="width:100px;">
										<?php endif; ?>
									</td>
									<td><?php echo e(\Illuminate\Support\Str::limit($model->first_title??'N/A',60)); ?></td>
									<td><?php echo e(\Illuminate\Support\Str::limit($model->second_title??'N/A',60)); ?></td>
									<td><?php echo e(\Illuminate\Support\Str::limit($model->heading??'N/A',60)); ?></td>
									<td><?php echo \Illuminate\Support\Str::limit($model->description??'N/A',60); ?></td>
									<td>
										<?php if($model->status): ?>
											<span class="badge label-success">Active</span>
										<?php else: ?>
											<span class="badge label-danger">In-Active</span>
										<?php endif; ?>
									</td>
                                    <td><?php echo e(isset($model->hasCreatedBy)?$model->hasCreatedBy->name:'N/A'); ?></td>
									<td width="250px">
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('catering_service-edit')): ?>
											<a href="<?php echo e(route('catering_service.edit', $model->id)); ?>" data-toggle="tooltip" data-placement="top" title="Edit AboutUs" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
										<?php endif; ?>
										
									</td>
								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td colspan="9">
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

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\admin\catering\index.blade.php ENDPATH**/ ?>