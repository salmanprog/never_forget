<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
<input type="hidden" id="page_url" value="<?php echo e(route('newsletter.index')); ?>">
<section class="content-header">
	<div class="content-header-left">
		<h1>All Subscribers</h1>
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
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="d-flex col-sm-8">
                            <input type="text" id="search" class="form-control" placeholder="Search by Email">
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
								<!-- <th>Name</th> -->
								<th>Email</th>
								<th>Status</th>
								<th width="180">Action</th>
							</tr>
						</thead>
						<tbody id="body">
							<?php $__currentLoopData = $news_letters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$news_letter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr id="id-<?php echo e($news_letter->id); ?>">
									<td><?php echo e($news_letters->firstItem()+$key); ?>.</td>
									<!-- <td><?php echo e($news_letter->name); ?></td> -->
									<td><?php echo e($news_letter->email); ?></td>
									<td>
										<?php if($news_letter->status): ?>
                                            <span class="badge label-success">Active</span>
                                        <?php else: ?>
                                            <span class="badge label-danger">In-Active</span>
										<?php endif; ?>
									</td>
									<td>
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('newsletter-edit')): ?>
											<a href="<?php echo e(route('newsletter.edit', $news_letter->id)); ?>" data-toggle="tooltip" data-placement="top" title="Edit NewsLetter" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
										<?php endif; ?>
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('newsletter-delete')): ?>
                                            <button class="btn btn-danger btn-xs delete" data-slug="<?php echo e($news_letter->id); ?>" data-del-url="<?php echo e(url('newsletter', $news_letter->id)); ?>"><i class="fa fa-trash"></i> Delete</button>
										<?php endif; ?>
									</td>
								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td colspan="6">
									Displying <?php echo e($news_letters->firstItem()); ?> to <?php echo e($news_letters->lastItem()); ?> of <?php echo e($news_letters->total()); ?> records
                                    <div class="d-flex justify-content-center">
                                        <?php echo $news_letters->links('pagination::bootstrap-4'); ?>

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

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp8.2\htdocs\never-forget\resources\views/admin/news_letter/index.blade.php ENDPATH**/ ?>