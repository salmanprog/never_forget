<?php $__currentLoopData = $sizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr id="id-<?php echo e($size->id); ?>">
        <td><?php echo e($sizes->firstItem()+$key); ?>.</td>
        <td><?php echo e(\Illuminate\Support\Str::limit($size->sizes??'N/A',60)); ?></td>
        <td>
            <?php if($size->status): ?>
                <span class="badge label-success">Active</span>
            <?php else: ?>
                <span class="badge label-danger">In-Active</span>
            <?php endif; ?>
        </td>
        <td><?php echo e(isset($size->hasCreatedBy)?$size->hasCreatedBy->name:'N/A'); ?></td>
        <td>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sizes-edit')): ?>
                <a href="<?php echo e(route('sizes.edit', $size->id)); ?>" data-toggle="tooltip" data-placement="top" title="Edit Sizes" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sizes-delete')): ?>
                <button class="btn btn-danger btn-xs delete" data-slug="<?php echo e($size->id); ?>" data-del-url="<?php echo e(url('sizes', $size->id)); ?>"><i class="fa fa-trash"></i> Delete</button>
            <?php endif; ?>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td colspan="5">
		Displying <?php echo e($sizes->firstItem()); ?> to <?php echo e($sizes->lastItem()); ?> of <?php echo e($sizes->total()); ?> records
        <div class="d-flex justify-content-center">
            <?php echo $sizes->links('pagination::bootstrap-4'); ?>

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
<?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\admin\sizes\search.blade.php ENDPATH**/ ?>