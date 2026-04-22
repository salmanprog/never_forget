<?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr id="id-<?php echo e($testimonial->slug); ?>">
        <td><?php echo e($testimonials->firstItem()+$key); ?>.</td>
        <td>
            <?php if($testimonial->image): ?>
                <img src="<?php echo e(asset('public/admin/assets/images/testimonials/'.$testimonial->image)); ?>" alt="" style="width:60px;">
            <?php elseif($testimonial->video): ?>
                <video src="<?php echo e(asset('public/admin/assets/images/testimonials/'.$testimonial->video)); ?>" style="width:60px;" controls></video>
            <?php else: ?>
                <img src="<?php echo e(asset('public/admin/assets/images/testimonials/no-photo1.jpg')); ?>" style="width:60px;">
            <?php endif; ?>
        </td>
        <td><?php echo $testimonial->name; ?></td>
        <td>
            <div class="rating-stars">
                <?php for($i = 1; $i <= 5; $i++): ?>
                    <?php if($i <= $testimonial->rating): ?>
                        <i class="fas fa-star text-warning"></i>
                    <?php else: ?>
                        <i class="far fa-star"></i>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>
        </td>
        
        <td><?php echo \Illuminate\Support\Str::limit($testimonial->comment,60); ?></td>
        <td>
            <?php if($testimonial->status): ?>
                <span class="badge label-success">Active</span>
            <?php else: ?>
                <span class="badge label-danger">In-Active</span>
            <?php endif; ?>
        </td>
        <td>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('testimonial-edit')): ?>
                <a href="<?php echo e(route('testimonial.edit', $testimonial->slug)); ?>" data-toggle="tooltip" data-placement="top" title="Edit testimonial" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('testimonial-delete')): ?>
                <button class="btn btn-danger btn-xs delete" data-slug="<?php echo e($testimonial->slug); ?>" data-del-url="<?php echo e(url('testimonial', $testimonial->slug)); ?>"><i class="fa fa-trash"></i> Delete</button>
            <?php endif; ?>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td colspan="7">
        Displying <?php echo e($testimonials->firstItem()); ?> to <?php echo e($testimonials->lastItem()); ?> of <?php echo e($testimonials->total()); ?> records
        <div class="d-flex justify-content-center">
            <?php echo $testimonials->links('pagination::bootstrap-4'); ?>

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
<?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\admin\testimonial\search.blade.php ENDPATH**/ ?>