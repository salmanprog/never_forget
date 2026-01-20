
<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
<input type="hidden" id="page_url" value="<?php echo e(route('styles.index')); ?>">
<section class="content-header">
	<div class="content-header-left">
		<h1>All Styles</h1>
	</div>
	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('styles-create')): ?>
        <div class="content-header-right">
            <a href="<?php echo e(route('styles.create')); ?>" class="btn btn-primary btn-sm">Add Style</a>
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
                            <input type="text" id="search" class="form-control" placeholder="Search by title">
                        </div>
                        <div class="d-flex col-sm-4">
                            <select name="" id="status" class="form-control status" style="margin-bottom:10px">
                                <option value="All" selected>Search by status</option>
                                <option value="1">Active</option>
                                <option value="2">In-Active</option>
                            </select>
                        </div>
                    </div>
					<table id="" class="table table-bordered table-striped table-hover">
						<thead>
							<tr>
								<th>SL</th>
								<th>Image</th>
								<th>Title</th>
								<th>Heading</th>
								<th>Description</th>
								<th>Description Images</th>
								<th>Back Image</th>
								<th>Frame Image</th>
								<th>Have Sub Style</th>
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
										<?php if($model->image): ?>
											<img src="<?php echo e(asset('public/admin/assets/images/styles/'.$model->image)); ?>" alt="" style="width:60px;">
										<?php else: ?>
											<img src="<?php echo e(asset('public/admin/assets/images/default.jpg')); ?>" style="width:60px;">
										<?php endif; ?>
									</td>
									<td><?php echo e(\Illuminate\Support\Str::limit($model->title,60)); ?></td>
                                    <td><?php echo $model->heading ? \Illuminate\Support\Str::limit($model->heading, 60) : 'N/A'; ?></td>
									<td><?php echo $model->description ? \Illuminate\Support\Str::limit($model->description, 60) : 'N/A'; ?></td>

                                    <td>
                                        <div class="image-slider">
                                            <?php if(!empty($model->description_images)): ?>
                                                <?php $__currentLoopData = json_decode($model->description_images); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <img class="slider-image" src="<?php echo e(asset('public/admin/assets/images/styles/description-image/' . $image)); ?>" alt="">
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                <img style="width: 80px" id="banner_previewww" src="<?php echo e(asset('public/admin/assets/images/default.jpg')); ?>" alt="Image Not Found">
                                            <?php endif; ?>
                                        </div>
                                    </td>

                                    <td>
										<?php if($model->back_image): ?>
											<img src="<?php echo e(asset('public/admin/assets/images/styles/back-image/'.$model->back_image)); ?>" alt="" style="width:60px;">
										<?php else: ?>
											<img src="<?php echo e(asset('public/admin/assets/images/default.jpg')); ?>" style="width:60px;">
										<?php endif; ?>
									</td>
                                    <td>
										<?php if($model->frame_image): ?>
											<img src="<?php echo e(asset('public/admin/assets/images/styles/frame-image/'.$model->frame_image)); ?>" alt="" style="width:60px;">
										<?php else: ?>
											<img src="<?php echo e(asset('public/admin/assets/images/default.jpg')); ?>" style="width:60px;">
										<?php endif; ?>
									</td>
                                    <td>
										<?php if($model->sub_style): ?>
											<span class="label label-info"><?php echo e(isset($model->hasSubStyle)?$model->hasSubStyle->title:'N/A'); ?></span>
										<?php else: ?>
											<span class="badge badge-danger">No Sub Style</span>
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
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('styles-edit')): ?>
											<a href="<?php echo e(route('styles.edit', $model->id)); ?>" data-toggle="tooltip" data-placement="top" title="Edit Style" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
										<?php endif; ?>
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('styles-delete')): ?>
                                            <button class="btn btn-danger btn-xs delete" data-slug="<?php echo e($model->id); ?>" data-del-url="<?php echo e(url('styles', $model->id)); ?>"><i class="fa fa-trash"></i> Delete</button>
										<?php endif; ?>
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

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp8.2\htdocs\never-forget\resources\views/admin/business_card/index.blade.php ENDPATH**/ ?>