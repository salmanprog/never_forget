<?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr id="id-<?php echo e($model->slug); ?>">
        <td><?php echo e($models->firstItem()+$key); ?>.</td>

        <td width="80px"><?php echo e($model->order_number); ?></td>

        <td>
            <?php if($model->customer_id > 0 && $model->hasCustomer): ?>
                <?php echo e($model->hasCustomer->name); ?>

            <?php else: ?>
                <?php echo e($model->guest_first_name); ?> <?php echo e($model->guest_last_name); ?> (Guest)
            <?php endif; ?>
        </td>
        <td>
            <?php if($model->customer_id > 0 && $model->hasCustomer): ?>
                <?php echo e($model->hasCustomer->email); ?>

            <?php else: ?>
                <?php echo e($model->guest_email); ?>

            <?php endif; ?>
        </td>
        <td><?php echo e(date('d, m-Y H:i A', strtotime($model->created_at))); ?></td>
        <td>
            <?php if($model->order_status == 'Pending'): ?>
                <span class="badge label-info">Pending</span>
            <?php elseif($model->order_status == 'Delivered'): ?>
                <span class="badge label-warning">Delivered</span>
            <?php elseif($model->order_status == 'Completed'): ?>
                <span class="badge label-success">Completed</span>
            <?php elseif($model->order_status == 'Canceled'): ?>
                <span class="badge label-danger">Canceled</span>
            <?php endif; ?>
        </td>
        
        <td width="100px">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('order-show')): ?>
                <a href="<?php echo e(route('order.show', $model->id)); ?>" data-toggle="tooltip" data-placement="top" title="Show order" class="btn btn-info btn-xs"><i class="fa fa-eye"></i></a>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('order-edit')): ?>
                <a href="<?php echo e(route('order.edit', $model->id)); ?>" data-toggle="tooltip" data-placement="top" title="Edit order" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('order-invoice')): ?>
                <a href="<?php echo e(route('order.invoice', ['id' => $model->id])); ?>" data-toggle="tooltip" data-placement="top" title="Order Invoice" class="btn btn-warning btn-xs"><i class="fa fa-file"></i></a>
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
<?php /**PATH C:\xampp8.2\htdocs\never-forget\resources\views/admin/order/search.blade.php ENDPATH**/ ?>