<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
<input type="hidden" id="page_url" value="<?php echo e(route('blog.index')); ?>">
<section class="content-header">
	<div class="content-header-left">
		<h1>All Blogs</h1>
	</div>
	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('blog-create')): ?>
	<div class="content-header-right">
		<a href="<?php echo e(route('blog.create')); ?>" class="btn btn-primary btn-sm">Add Blog</a>
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
			<?php if(session('message')): ?>
				<div class="callout callout-success">
					<?php echo e(session('message')); ?>

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
								<th>Image</th>
								<th>Title</th>
								<th>Description</th>
								<th>Status</th>
								<th width="140">Action</th>
							</tr>
						</thead>
						<tbody id="body">
							<?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr id="id-<?php echo e($model->id); ?>">
									<td><?php echo e($models->firstItem()+$key); ?>.</td>
									<td>
										<?php if($model->image): ?>
											<img src="<?php echo e(asset('public/admin/assets/posts/'.$model->image)); ?>" alt="" style="width:60px; height:60px; object-fit:cover;">
										<?php else: ?>
											<img src="<?php echo e(asset('public/admin/assets/img/no-photo1.jpg')); ?>" style="width:60px;">
										<?php endif; ?>
									</td>
									<td><?php echo \Illuminate\Support\Str::limit($model->title,40); ?></td>
									<td><?php echo \Illuminate\Support\Str::limit(strip_tags($model->description),60); ?></td>
									<td>
										<?php if($model->status): ?>
											<span class="badge badge-success">Active</span>
										<?php else: ?>
											<span class="badge badge-danger">In-Active</span>
										<?php endif; ?>
									</td>
									<td width="250px">
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('blog-edit')): ?>
											<a href="<?php echo e(route('blog.edit', $model->id)); ?>" data-toggle="tooltip" data-placement="top" title="Edit blog" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
										<?php endif; ?>
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('blog-delete')): ?>
                                            <button class="btn btn-danger btn-xs delete" data-slug="<?php echo e($model->id); ?>" data-del-url="<?php echo e(url('blog', $model->id)); ?>"><i class="fa fa-trash"></i> Delete</button>
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
<script>
	$(document).ready(function() {
		$("#search").keyup(function() {
			var value = $(this).val();
			if(value.length > 2 || value.length == 0) {
				$.ajax({
					url: "<?php echo e(route('blog.index')); ?>",
					type: "GET",
					data: {
						search: value,
						status: $("#status").val()
					},
					success: function(data) {
						$("#body").html(data);
					}
				});
			}
		});

		$("#status").change(function() {
			var value = $(this).val();
			$.ajax({
				url: "<?php echo e(route('blog.index')); ?>",
				type: "GET",
				data: {
					search: $("#search").val(),
					status: value
				},
				success: function(data) {
					$("#body").html(data);
				}
			});
		});

		$(".delete").click(function() {
			var slug = $(this).attr("data-slug");
			var del_url = $(this).attr("data-del-url");
			if (confirm("Are you sure you want to delete this blog?")) {
				$.ajax({
					url: del_url,
					type: "DELETE",
					data: {
						_token: "<?php echo e(csrf_token()); ?>"
					},
					success: function(response) {
						if(response) {
							$("#id-"+slug).fadeOut();
							alert("Blog deleted successfully");
						} else {
							alert("Failed to delete blog");
						}
					}
				});
			}
		});
	});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp8.2\htdocs\never-forget\resources\views/admin/blog/index.blade.php ENDPATH**/ ?>