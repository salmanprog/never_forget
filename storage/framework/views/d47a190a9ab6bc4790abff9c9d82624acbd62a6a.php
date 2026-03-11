<?php
    if (Auth::user()->hasRole('Admin')) {
        $layout = 'layouts.admin.app';
    } elseif (Auth::user()->hasRole('Individual')) {
        $layout = 'layouts.individual.app';
    } else {
        $layout = 'layouts.individual.app';
    }
?>

<?php $__env->startSection('title', $page_title ?? 'All Friends/Family'); ?>
<?php $__env->startSection('content'); ?>
<section class="content-header">
    <div class="content-header-left">
        <h1>All Friends/Family</h1>
    </div>
    <div class="content-header-right">
        <?php echo $__env->make('includes.buttons.back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <a href="<?php echo e(route('member.friends_family.create')); ?>" class="btn btn-primary btn-sm">Add Friends/Family</a>
        <a href="<?php echo e(route('member.friends_family.bulk-upload')); ?>" class="btn btn-success btn-sm">Bulk Upload</a>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?php echo $__env->make('includes.upgrade_alert_individual', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php if(session('success')): ?>
                <div class="callout callout-success">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>
            <?php if(session('warning')): ?>
                <div class="callout callout-warning">
                    <?php echo e(session('warning')); ?>

                </div>
            <?php endif; ?>
            <?php if(session('error')): ?>
                <div class="callout callout-danger">
                    <?php echo e(session('error')); ?>

                </div>
            <?php endif; ?>
            <?php if(session('info')): ?>
                <div class="callout callout-info">
                    <?php echo e(session('info')); ?>

                </div>
            <?php endif; ?>

            <div class="box box-info">
                <div class="box-body">
                    <form method="GET" action="<?php echo e(route('member.friends_family.index')); ?>" id="search-form">
                        <div class="row" style="margin-bottom: 15px;">
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <input type="text" name="search" id="friends_family_search" class="form-control" placeholder="Search by name, email, or phone" value="<?php echo e(request('search')); ?>">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive" style="overflow-x: auto; -webkit-overflow-scrolling: touch;">
                        <table class="table table-bordered table-striped" style="margin-bottom: 0;">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Recipient First Name</th>
                                    <th>Recipient Last Name</th>
                                    <th>Relationship with Client</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Occasion</th>
                                    <th>Occasion Date</th>
                                    <th>Gift Preferences</th>
                                    <th>Favorite Color</th>
                                    <th>Dietry Restrictions</th>
                                    <th>Budget</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>ZIP</th>
                                    <th>Delivery Date</th>
                                    <th>Delivery Note</th>
                                    <th>Message with gift</th>
                                    <th>Payment Method</th>
                                    <th>Tracking Number</th>
                                    <th>Delivery Status</th>
                                    <th>Notes</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="body">
                                <?php $__empty_1 = true; $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr id="id-<?php echo e($row->id); ?>">
                                        <td><?php echo e($records->firstItem() + $key); ?>.</td>
                                        <td><?php echo e($row->recipient_first_name); ?></td>
                                        <td><?php echo e($row->recipient_last_name); ?></td>
                                        <td><?php echo e($row->relationship_with_client ?? '—'); ?></td>
                                        <td><?php echo e($row->email); ?></td>
                                        <td><?php echo e($row->phone ?? '—'); ?></td>
                                        <td><?php echo e($row->occasion ?? '—'); ?></td>
                                        <td><?php echo e($row->occasion_date ? $row->occasion_date->format('M d, Y') : '—'); ?></td>
                                        <td><?php echo e($row->gift_preferences ?? '—'); ?></td>
                                        <td><?php echo e($row->favorite_color ?? '—'); ?></td>
                                        <td><?php echo e($row->dietry_restrictions ?? '—'); ?></td>
                                        <td><?php echo e($row->budget ?? '—'); ?></td>
                                        <td><?php echo e($row->address ?? '—'); ?></td>
                                        <td><?php echo e($row->city ?? '—'); ?></td>
                                        <td><?php echo e($row->state ?? '—'); ?></td>
                                        <td><?php echo e($row->zip ?? '—'); ?></td>
                                        <td><?php echo e($row->delivery_date ? $row->delivery_date->format('M d, Y') : '—'); ?></td>
                                        <td><?php echo e(\Illuminate\Support\Str::limit($row->delivery_note ?? '', 30)); ?></td>
                                        <td><?php echo e(\Illuminate\Support\Str::limit($row->message_with_gift ?? '', 30)); ?></td>
                                        <td><?php echo e($row->payment_method ?? '—'); ?></td>
                                        <td><?php echo e($row->tracking_number ?? '—'); ?></td>
                                        <td><?php echo e(ucfirst($row->delivery_status ?? 'pending')); ?></td>
                                        <td><?php echo e(\Illuminate\Support\Str::limit($row->notes ?? '', 30)); ?></td>
                                        <td>
                                            <a href="<?php echo e(route('member.friends_family.edit', $row->id)); ?>" class="btn btn-primary btn-xs">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>
                                            <button class="btn btn-danger btn-xs delete" data-id="<?php echo e($row->id); ?>" data-del-url="<?php echo e(route('member.friends_family.destroy', $row->id)); ?>">
                                                <i class="fa fa-trash"></i> Delete
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="25" class="text-center">No friends/family found.</td>
                                    </tr>
                                <?php endif; ?>
                                <?php if($records->count() > 0): ?>
                                    <tr>
                                        <td colspan="25" style="padding: 15px; background: #f9f9f9;">
                                            <div style="margin-bottom: 10px;">Displaying <?php echo e($records->firstItem()); ?> to <?php echo e($records->lastItem()); ?> of <?php echo e($records->total()); ?> records</div>
                                            <div class="text-center">
                                                <?php echo $records->appends(request()->query())->links('pagination::bootstrap-4'); ?>

                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<script>
$(document).ready(function() {
    $('#friends_family_search').on('keypress', function(e) {
        if (e.which === 13) {
            e.preventDefault();
            $(this).closest('form').submit();
        }
    });
    // Prevent global search.js from replacing #body: use normal navigation for pagination on this page
    $(document).on('click', '.pagination a', function(e) {
        if ($('#friends_family_search').length) {
            e.preventDefault();
            e.stopPropagation();
            window.location.href = $(this).attr('href');
            return false;
        }
    }, true);

    $(document).on('click', '.delete', function() {
        var id = $(this).data('id');
        var url = $(this).data('del-url');

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
                    url: url,
                    type: 'DELETE',
                    success: function(response) {
                        $('#id-' + id).remove();
                        Swal.fire(
                            'Deleted!',
                            'Record has been deleted successfully.',
                            'success'
                        ).then(() => {
                            window.location.reload();
                        });
                    },
                    error: function() {
                        Swal.fire(
                            'Error!',
                            'Something went wrong while deleting.',
                            'error'
                        );
                    }
                });
            }
        });
    });
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($layout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\never-forget\resources\views/admin/friends_family/index.blade.php ENDPATH**/ ?>