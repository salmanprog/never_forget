<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($user->hasRole('Admin')): ?>
    <?php continue; ?>;
<?php endif; ?>
<tr id="id-<?php echo e($user->id); ?>">
    <td><?php echo e($users->firstItem()+$key); ?>.</td>
    <td><?php echo e($user->name); ?></td>
    <td><?php echo e($user->last_name??'N/A'); ?></td>
    <td><?php echo e($user->email); ?></td>
    <td>
        <?php if($user->account_type == 'Company'): ?>
            <span class="badge badge-company">
                Company
            </span>
        <?php elseif($user->account_type == 'Sales Person'): ?>
            <span class="badge badge-salesperson">
                Sales Person
            </span>
        <?php else: ?>
            <span class="badge badge-individual">
                Individual
            </span>
        <?php endif; ?>
    </td>
    <td>
        <?php if($user->status): ?>
            <span class="badge label-success">Active</span>
        <?php else: ?>
            <span class="badge label-danger">In-Active</span>
        <?php endif; ?>
    </td>
    <td>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user-edit')): ?>
            <a href="<?php echo e(route('user.edit', $user->id)); ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
        <?php endif; ?>
        
    </td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<tr>
<td colspan="8">
    Displying <?php echo e($users->firstItem()); ?> to <?php echo e($users->lastItem()); ?> of <?php echo e($users->total()); ?> records
    <div class="d-flex justify-content-center">
        <?php echo $users->links('pagination::bootstrap-4'); ?>

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
<?php /**PATH C:\xampp\htdocs\never-forget\resources\views/admin/user/search.blade.php ENDPATH**/ ?>