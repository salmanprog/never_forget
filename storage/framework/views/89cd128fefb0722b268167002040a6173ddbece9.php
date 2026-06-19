<?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr id="id-<?php echo e($model->id); ?>">
        <td><?php echo e($models->firstItem()+$key); ?>.</td>
        <td>
            <?php if($model->image): ?>
                <img src="<?php echo e(asset('public/admin/assets/images/careers/'.$model->image)); ?>" alt="" style="width:60px;">
            <?php else: ?>
                <img src="<?php echo e(asset('public/admin/assets/images/careers/no-photo1.jpg')); ?>" style="width:60px;">
            <?php endif; ?>
        </td>
        <td><?php echo \Illuminate\Support\Str::limit($model->title,40); ?></td>
        <td><?php echo e(isset($model->hasCategory) ? $model->hasCategory->title : 'N/A'); ?></td>
        <td><?php echo \Illuminate\Support\Str::limit($model->description,60); ?></td>
        <td><?php echo e(isset($model->hasCreatedBy)?$model->hasCreatedBy->name:'N/A'); ?></td>
        <td>
            <?php if($model->status): ?>
                <span class="badge label-success">Active</span>
            <?php else: ?>
                <span class="badge label-danger">In-Active</span>
            <?php endif; ?>
        </td>
        <td>
            <a href="<?php echo e(route('careers.applications.view', $model->id)); ?>" data-toggle="tooltip" data-placement="top" title="View Applications" class="btn btn-info btn-xs"><i class="fa fa-users"></i> Applications</a>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('careers-edit')): ?>
                <a href="<?php echo e(route('careers.edit', $model->id)); ?>" data-toggle="tooltip" data-placement="top" title="Edit model" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('careers-delete')): ?>
                <button class="btn btn-danger btn-xs delete" data-slug="<?php echo e($model->id); ?>" data-del-url="<?php echo e(url('careers', $model->id)); ?>"><i class="fa fa-trash"></i> Delete</button>
            <?php endif; ?>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td colspan="8">
        Displying <?php echo e($models->firstItem()); ?> to <?php echo e($models->lastItem()); ?> of <?php echo e($models->total()); ?> records
        <div class="d-flex justify-content-center">
            <?php echo $models->links('pagination::bootstrap-4'); ?>

        </div>
    </td>
</tr>
<script>
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
                            'Your file has been deleted.',
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
</script><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\admin\career\search.blade.php ENDPATH**/ ?>