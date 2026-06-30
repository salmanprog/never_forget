<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
<input type="hidden" id="page_url" value="<?php echo e(route('balloons_category.index')); ?>">
<?php echo $__env->make('admin.partials.outsource_category_index', [
    'createRoute' => 'balloons_category.create',
    'editRoute' => 'balloons_category.edit',
    'destroyPrefix' => 'balloons_category',
    'imageField' => 'images',
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views/admin/balloons_category/index.blade.php ENDPATH**/ ?>