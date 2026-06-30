<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
<input type="hidden" id="page_url" value="<?php echo e(route('tango_category.index')); ?>">
<?php echo $__env->make('admin.partials.outsource_category_index', [
    'createRoute' => 'tango_category.create',
    'editRoute' => 'tango_category.edit',
    'destroyPrefix' => 'tango_category',
    'imageField' => 'image',
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views/admin/tango_category/index.blade.php ENDPATH**/ ?>