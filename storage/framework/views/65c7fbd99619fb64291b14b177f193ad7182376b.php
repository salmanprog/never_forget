<?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr id="id-<?php echo e($model->id); ?>">
    <td><?php echo e($models->firstItem() + $key); ?>.</td>

    <td width="80px"><?php echo e($model->order_number); ?></td>

    <td>
        <?php $__currentLoopData = $model->hasOrderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo e($orderDetail->productsItem->name ?? $orderDetail->product_slug ?? 'No Product'); ?>

            <br>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </td>

    <td>
        <?php $__currentLoopData = $model->hasOrderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo e($orderDetail->quantity); ?><br>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </td>

    <td>
        <?php $__currentLoopData = $model->hasOrderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            $<?php echo e(number_format($orderDetail->price, 2)); ?><br>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </td>

    <td><?php echo e($model->created_at->format('d, m-Y H:i A')); ?></td>

    <td>
        <span class="badge label-info"><?php echo e($model->order_status); ?></span>
    </td>

    <?php if(Auth::user()->hasRole('Admin')): ?>
    <td>
        <a href="<?php echo e(route('order.show', $model->id)); ?>" class="btn btn-info btn-xs">
            <i class="fa fa-eye"></i>
        </a>
    </td>
    <?php endif; ?>
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
</script>
<?php /**PATH C:\xampp8.2\htdocs\never-forget\resources\views/admin/business_card/search.blade.php ENDPATH**/ ?>