<?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr id="id-<?php echo e($permission->id); ?>">
        <td><?php echo e($permissions->firstItem()+$key); ?>.</td>
        <td><?php echo e(Str::ucfirst($permission->name)); ?></td>
        <td><?php echo e($permission->guard_name); ?></td>
        <td>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-edit')): ?>
                <a href="<?php echo e(route('permission.edit', $permission->id)); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-delete')): ?>
                <button class="btn btn-danger btn-xs delete" data-slug="<?php echo e($permission->id); ?>" data-del-url="<?php echo e(url('permission', $permission->id)); ?>"><i class="fa fa-trash"></i> Delete</button>
            <?php endif; ?>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td colspan="4">
        Displying <?php echo e($permissions->firstItem()); ?> to <?php echo e($permissions->lastItem()); ?> of <?php echo e($permissions->total()); ?> records
        <div class="d-flex justify-content-center">
            <?php echo $permissions->links('pagination::bootstrap-4'); ?>

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
<?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\admin\permission\search.blade.php ENDPATH**/ ?>