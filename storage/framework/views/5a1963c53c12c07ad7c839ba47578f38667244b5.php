<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
<input type="hidden" id="page_url" value="<?php echo e(route('testimonial.index')); ?>">
<section class="content-header">
	<div class="content-header-left">
		<h1>All Testimonials</h1>
	</div>
	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('testimonial-create')): ?>
	<div class="content-header-right">
		<a href="<?php echo e(route('testimonial.create')); ?>" class="btn btn-primary btn-sm">Add Testimonial</a>
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
								<th>Image/Video</th>
								<th>Name</th>
								
								<th>Rating</th>
								<th>Comment</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody id="body">
							<?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr id="id-<?php echo e($testimonial->slug); ?>">
									<td><?php echo e($testimonials->firstItem()+$key); ?>.</td>
									<td>
										<?php if($testimonial->image): ?>
											<img src="<?php echo e(asset('public/admin/assets/images/testimonials/'.$testimonial->image)); ?>" alt="" style="width:100px;">
										<?php elseif($testimonial->video): ?>
											<video src="<?php echo e(asset('public/admin/assets/images/testimonials/'.$testimonial->video)); ?>" style="width:120px; height:80px;" autoplay muted loop controls></video>
										<?php else: ?>
											<img src="<?php echo e(asset('public/admin/assets/images/testimonials/no-photo1.jpg')); ?>" style="width:60px;">
										<?php endif; ?>
									</td>
									<td><?php echo $testimonial->name; ?></td>
									<td>
										<div class="rating-stars">
											<?php for($i = 1; $i <= 5; $i++): ?>
												<?php if($i <= $testimonial->rating): ?>
													<i class="fas fa-star text-warning"></i>
												<?php else: ?>
													<i class="far fa-star"></i>
												<?php endif; ?>
											<?php endfor; ?>
										</div>
									</td>
									
									<td><?php echo \Illuminate\Support\Str::limit($testimonial->comment,60); ?></td>
									<td>
										<?php if($testimonial->status): ?>
											<span class="badge label-success">Active</span>
										<?php else: ?>
											<span class="badge label-danger">In-Active</span>
										<?php endif; ?>
									</td>
									<td>
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('testimonial-edit')): ?>
											<a href="<?php echo e(route('testimonial.edit', $testimonial->slug)); ?>" data-toggle="tooltip" data-placement="top" title="Edit testimonial" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
										<?php endif; ?>
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('testimonial-delete')): ?>
                                            <button class="btn btn-danger btn-xs delete" data-slug="<?php echo e($testimonial->slug); ?>" data-del-url="<?php echo e(url('testimonial', $testimonial->slug)); ?>"><i class="fa fa-trash"></i> Delete</button>
										<?php endif; ?>
									</td>
								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td colspan="7">
									Displying <?php echo e($testimonials->firstItem()); ?> to <?php echo e($testimonials->lastItem()); ?> of <?php echo e($testimonials->total()); ?> records
                                    <div class="d-flex justify-content-center">
                                        <?php echo $testimonials->links('pagination::bootstrap-4'); ?>

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

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp8.2\htdocs\never-forget\resources\views/admin/testimonial/index.blade.php ENDPATH**/ ?>