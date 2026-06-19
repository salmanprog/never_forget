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
</script>
<?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\admin\styles\search.blade.php ENDPATH**/ ?>