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
</script>

<?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\admin\notification\search.blade.php ENDPATH**/ ?>