<?php $__currentLoopData = $news_letters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$news_letter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr id="id-<?php echo e($news_letter->id); ?>">
        <td><?php echo e($news_letters->firstItem()+$key); ?>.</td>
        <!-- <td><?php echo e($news_letter->name); ?></td> -->
        <td><?php echo e($news_letter->email); ?></td>
        <td>
            <?php if($news_letter->status): ?>
                <span class="badge label-success">Active</span>
            <?php else: ?>
                <span class="badge label-danger">In-Active</span>
            <?php endif; ?>
        </td>
        <td>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('newsletter-edit')): ?>
                <a href="<?php echo e(route('newsletter.edit', $news_letter->id)); ?>" data-toggle="tooltip" data-placement="top" title="Edit NewsLetter" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('newsletter-delete')): ?>
                <button class="btn btn-danger btn-xs delete" data-slug="<?php echo e($news_letter->id); ?>" data-del-url="<?php echo e(url('newsletter', $news_letter->id)); ?>"><i class="fa fa-trash"></i> Delete</button>
            <?php endif; ?>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td colspan="6">
		Displying <?php echo e($news_letters->firstItem()); ?> to <?php echo e($news_letters->lastItem()); ?> of <?php echo e($news_letters->total()); ?> records
        <div class="d-flex justify-content-center">
            <?php echo $news_letters->links('pagination::bootstrap-4'); ?>

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
<?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\admin\news_letter\search.blade.php ENDPATH**/ ?>