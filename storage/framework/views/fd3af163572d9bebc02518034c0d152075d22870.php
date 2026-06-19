<?php $__env->startSection('content'); ?>
<section class="content-header">
    <div class="content-header-left">
        <h1>Page Section</h1>
    </div>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('page-create')): ?>
	<div class="content-header-right">
		<a href="<?php echo e(route('page.create')); ?>" class="btn btn-primary btn-sm">Add Page</a>
	</div>
	<?php endif; ?>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>SL</th>
								<th>Title</th>
								<th>Description</th>
								<th>Created by</th>
                                <th>Status</th>
								<th width="140">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr id="id-<?php echo e($model->id); ?>">
									<td><?php echo e($model->id); ?>.</td>
									<td><?php echo $model->title; ?></td>
									<td><?php echo \Illuminate\Support\Str::limit($model->description,60); ?></td>
                                    <td><?php echo e($model->hasCreatedBy->name); ?></td>
									<td>
										<?php if($model->status): ?>
											<span class="badge badge-success">Active</span>
										<?php else: ?>
											<span class="badge badge-danger">In-Active</span>
										<?php endif; ?>
									</td>
									<td width="250px">
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('page-edit')): ?>
											<a href="<?php echo e(route('page.edit', $model->id)); ?>" data-toggle="tooltip" data-placement="top" title="Edit page" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
										<?php endif; ?>
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('page-delete')): ?>
											<a class="btn btn-danger btn-xs delete-btn" data-toggle="tooltip" data-placement="top" title="Delete page" data-page-id="<?php echo e($model->id); ?>"><i class="fa fa-trash"></i> Delete</a>
										<?php endif; ?>

                                        <a href="<?php echo e(route('page_setting.edit', $model->id)); ?>" data-toggle="tooltip" data-placement="top" title="Page Setting" class="btn btn-info btn-xs"><i class="fa fa-cog"></i> Setting</a>
									</td>
								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
    $('.delete-btn').on('click', function(){
        var id = $(this).attr('data-page-id');
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
                $.ajax({
                    url : "<?php echo e(url('page')); ?>/"+id,
                    type : 'DELETE',
                    data: {
                            "_token": "<?php echo e(csrf_token()); ?>",
                        },
                    success : function(response){
                        if(response){
                            $('#id-'+id).hide();
                            Swal.fire(
                                'Deleted!',
                                'Slider has been deleted.',
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

    $(document).ready(function() {
        $("#example1").DataTable();
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\admin\page_setting\index.blade.php ENDPATH**/ ?>