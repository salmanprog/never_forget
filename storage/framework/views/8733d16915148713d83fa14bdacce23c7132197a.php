
<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
<input type="hidden" id="page_url" value="<?php echo e(route('notification.index')); ?>">
<section class="content-header">
	<div class="content-header-left">
		<h1>All Notifications</h1>
	</div>
	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('notification-create')): ?>
	<div class="content-header-right">
		<a href="<?php echo e(route('notification.create')); ?>" class="btn btn-primary btn-sm">Add Notification</a>
	</div>
	<?php endif; ?>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<?php if(session('message')): ?>
				<div class="callout callout-success">
					<?php echo e(session('message')); ?>

				</div>
			<?php endif; ?>
			<?php if(session('error')): ?>
				<div class="callout callout-danger">
					<?php echo e(session('error')); ?>

				</div>
			<?php endif; ?>

			<div class="box box-info">
				<div class="box-body">
                    <div class="row" style="margin-bottom:10px">
                        <div class="d-flex col-sm-6">
                            <input type="text" id="search" class="form-control" placeholder="Search by title, description, or module">
                        </div>
                        <div class="d-flex col-sm-3">
                            <select name="" id="user_id" class="form-control" style="margin-bottom:5px">
                                <option value="All" selected>All Users</option>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?> (<?php echo e($user->email); ?>)</option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="d-flex col-sm-3">
                            <select name="" id="is_read" class="form-control" style="margin-bottom:5px">
                                <option value="All" selected>All Status</option>
                                <option value="1">Read</option>
                                <option value="0">Unread</option>
                            </select>
                        </div>
                    </div>
					<table id="" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>SL</th>
								<th>User</th>
								<th>Title</th>
								<th>Description</th>
								<th>Module</th>
								<th>Read Status</th>
								<th>View Status</th>
								<th>Created At</th>
								<th width="200">Action</th>
							</tr>
						</thead>
						<tbody id="body">
							<?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr id="id-<?php echo e($model->id); ?>">
									<td><?php echo e($models->firstItem()+$key); ?>.</td>
									<td><?php echo e($model->user->name ?? 'N/A'); ?><br><small><?php echo e($model->user->email ?? ''); ?></small></td>
									<td><?php echo e(\Illuminate\Support\Str::limit($model->title, 40)); ?></td>
									<td><?php echo e(\Illuminate\Support\Str::limit($model->description, 50)); ?></td>
									<td><?php echo e($model->module ?? 'N/A'); ?></td>
									<td>
										<?php if($model->is_read): ?>
											<span class="badge label-success">Read</span>
										<?php else: ?>
											<span class="badge label-warning">Unread</span>
										<?php endif; ?>
									</td>
									<td>
										<?php if($model->is_view): ?>
											<span class="badge label-success">Viewed</span>
										<?php else: ?>
											<span class="badge label-danger">Not Viewed</span>
										<?php endif; ?>
									</td>
									<td><?php echo e($model->created_at->format('M d, Y H:i')); ?></td>
									<td width="200px">
										<a href="<?php echo e(route('notification.show', $model->id)); ?>" data-toggle="tooltip" data-placement="top" title="View notification" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> View</a>
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('notification-edit')): ?>
											<a href="<?php echo e(route('notification.edit', $model->id)); ?>" data-toggle="tooltip" data-placement="top" title="Edit notification" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
										<?php endif; ?>
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('notification-delete')): ?>
                                            <button class="btn btn-danger btn-xs delete" data-slug="<?php echo e($model->id); ?>" data-del-url="<?php echo e(url('notification', $model->id)); ?>"><i class="fa fa-trash"></i> Delete</button>
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
<script>
	$(document).ready(function() {
		$("#search, #user_id, #is_read").on('keyup change', function(){
			var search = $("#search").val();
			var user_id = $("#user_id").val();
			var is_read = $("#is_read").val();
			var page_url = $("#page_url").val();
			var base_url = page_url;
			var url = base_url + "?search=" + search + "&user_id=" + user_id + "&is_read=" + is_read;
			$.ajax({
				url: url,
				type: "GET",
				success: function(response){
					$("#body").html(response);
				}
			});
		});

		//delete record
		$('.delete').on('click', function(){
			var slug = $(this).attr('data-slug');
			var delete_url = $(this).attr('data-del-url');
			Swal.fire({
				title: 'Are you sure?',
				text: "You won't be able to revert this!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
				if (result.isConfirmed) {
					$.ajaxSetup({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
					});
					$.ajax({
						url : delete_url,
						type : 'DELETE',
						success : function(response){
							if(response){
								$('#id-'+slug).hide();
								Swal.fire(
									'Deleted!',
									'Your notification has been deleted.',
									'success'
								)
							}else{
								Swal.fire(
									'Not Deleted!',
									'Sorry! Something went wrong.',
									'danger'
								)
							}
						}
					});
				}
			})
		});
	});
</script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\admin\notification\index.blade.php ENDPATH**/ ?>