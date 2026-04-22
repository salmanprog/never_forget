
<?php $__env->startSection('title', $page_title); ?>

<?php $__env->startSection('title', 'Business Card Templates'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Business Card Templates</h3>
                    <div class="card-tools">
                        <a href="<?php echo e(route('business_card_templates.create')); ?>" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Add New Template
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <?php if(session('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo e(session('success')); ?>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php endif; ?>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Preview</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Sort Order</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td>
                                        <img src="<?php echo e(asset($template->preview_image)); ?>" 
                                             alt="<?php echo e($template->name); ?>" 
                                             class="img-thumbnail" 
                                             style="width: 80px; height: 60px; object-fit: cover;">
                                    </td>
                                    <td>
                                        <strong><?php echo e($template->name); ?></strong>
                                        <?php if($template->description): ?>
                                        <br><small class="text-muted"><?php echo e(Str::limit($template->description, 50)); ?></small>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <span class="badge badge-info"><?php echo e(ucfirst($template->category)); ?></span>
                                    </td>
                                    <td>
                                        <?php if($template->is_premium): ?>
                                        <span class="badge badge-warning">Premium</span>
                                        <?php else: ?>
                                        <span class="badge badge-success">Free</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm <?php echo e($template->is_active ? 'btn-success' : 'btn-secondary'); ?> toggle-active-btn" 
                                                data-id="<?php echo e($template->id); ?>" 
                                                data-active="<?php echo e($template->is_active); ?>">
                                            <?php echo e($template->is_active ? 'Active' : 'Inactive'); ?>

                                        </button>
                                    </td>
                                    <td><?php echo e($template->sort_order); ?></td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="<?php echo e(route('business_card_templates.show', $template)); ?>" 
                                               class="btn btn-info btn-sm" title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="<?php echo e(route('business_card_templates.edit', $template)); ?>" 
                                               class="btn btn-warning btn-sm" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="<?php echo e(route('business_card_templates.duplicate', $template)); ?>" 
                                                  method="POST" class="d-inline">
                                                <?php echo csrf_field(); ?>
                                                <button type="submit" class="btn btn-secondary btn-sm" title="Duplicate">
                                                    <i class="fas fa-copy"></i>
                                                </button>
                                            </form>
                                            <form action="<?php echo e(route('business_card_templates.destroy', $template)); ?>" 
                                                  method="POST" class="d-inline"
                                                  onsubmit="return confirm('Are you sure you want to delete this template?')">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="7" class="text-center">No templates found.</td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
$(document).ready(function() {
    // Toggle active status
    $('.toggle-active-btn').click(function() {
        const templateId = $(this).data('id');
        const isActive = $(this).data('active');
        const button = $(this);
        
        $.ajax({
            url: `/admin/business_card_templates/${templateId}/toggle-active`,
            method: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    button.data('active', response.is_active);
                    if (response.is_active) {
                        button.removeClass('btn-secondary').addClass('btn-success').text('Active');
                    } else {
                        button.removeClass('btn-success').addClass('btn-secondary').text('Inactive');
                    }
                }
            },
            error: function() {
                alert('Error updating template status');
            }
        });
    });
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\admin\business-card-templates\index.blade.php ENDPATH**/ ?>