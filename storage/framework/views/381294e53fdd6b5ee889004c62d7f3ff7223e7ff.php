<?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr id="id-<?php echo e($model->slug); ?>">
        <td><?php echo e($models->firstItem()+$key); ?>.</td>
        <td>
            <?php if($model->image): ?>
                <img src="<?php echo e(asset('public/admin/assets/images/product/'.$model->image)); ?>" alt="" style="width:80px;">
            <?php else: ?>
                <img src="<?php echo e(asset('public/admin/assets/images/product/no-photo1.jpg')); ?>" style="width:80px;">
            <?php endif; ?>
        </td>
        <td><?php echo \Illuminate\Support\Str::limit($model->name,40); ?></td>
        <td><?php echo e($model->hasCategory ? $model->hasCategory->title : 'N/A'); ?></td> 
        <td>
            <?php if($model->product_type == 1): ?>
                <span class="label label-yellow">Variable Product</span>
            <?php else: ?>
                <span class="label label-blue">Simple Product</span>
            <?php endif; ?>
        </td>
        <td>
            <?php if($model->product_type == 0): ?>
                $<?php echo e(number_format($model->product_price, 2)); ?>

            <?php else: ?>
                <?php
                    $priceRange = json_decode($model->variation_price);
                    if ($priceRange && isset($priceRange->from) && isset($priceRange->to)) {
                        echo '$' . number_format($priceRange->from, 2) . ' – $' . number_format($priceRange->to, 2);
                    } else {
                        echo 'N/A';
                    }
                ?>
            <?php endif; ?>
        </td> 
        <td>
            <?php if($model->status): ?>
                <span class="badge label-success">Active</span>
            <?php else: ?>
                <span class="badge label-danger">In-Active</span>
            <?php endif; ?>
        </td>
        <td> 
            <a href="<?php echo e(route('product.show', $model->slug)); ?>" data-toggle="tooltip" data-placement="top" title="Show product" class="btn btn-info btn-xs"><i class="fa fa-eye"></i></a>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product-edit')): ?>
                <a href="<?php echo e(route('product.edit', $model->slug)); ?>" data-toggle="tooltip" data-placement="top" title="Edit product" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> </a>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product-delete')): ?>
                <button class="btn btn-danger btn-xs delete" data-slug="<?php echo e($model->slug); ?>" data-del-url="<?php echo e(url('product', $model->slug)); ?>" data-toggle="tooltip" data-placement="top" title="Delete product"><i class="fa fa-trash"></i></button>
            <?php endif; ?>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td colspan="9">
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
<?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views/admin/product/search.blade.php ENDPATH**/ ?>