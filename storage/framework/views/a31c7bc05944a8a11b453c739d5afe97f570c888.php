<?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr id="id-<?php echo e($service->slug); ?>">
        <td><?php echo e($services->firstItem()+$key); ?>.</td>
        <td><?php echo \Illuminate\Support\Str::limit($service->name,40); ?></td>
        <td><?php echo \Illuminate\Support\Str::limit($service->description,60); ?></td>
        <td><?php echo isset($service->hasCreatedBy)?$service->hasCreatedBy->name:'N/A'; ?></td>
        <td>
            <?php if($service->status): ?>
                <span class="badge badge-success">Active</span>
            <?php else: ?>
                <span class="badge badge-danger">In-Active</span>
            <?php endif; ?>
        </td>
        <td width="250px">
            <a href="<?php echo e(route('service.show', $service->slug)); ?>" data-toggle="tooltip" data-placement="top" title="Show service" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Show</a>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('service-edit')): ?>
                <a href="<?php echo e(route('service.edit', $service->slug)); ?>" data-toggle="tooltip" data-placement="top" title="Edit service" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('service-delete')): ?>
                <a class="btn btn-danger btn-xs delete-btn" data-toggle="tooltip" data-placement="top" title="Delete service" data-service-slug="<?php echo e($service->slug); ?>"><i class="fa fa-trash"></i> Delete</a>
            <?php endif; ?>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td colspan="6">
        Displying <?php echo e($services->firstItem()); ?> to <?php echo e($services->lastItem()); ?> of <?php echo e($services->total()); ?> records
        <div class="d-flex justify-content-center">
            <?php echo $services->links('pagination::bootstrap-4'); ?>

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
<?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\admin\service\search.blade.php ENDPATH**/ ?>