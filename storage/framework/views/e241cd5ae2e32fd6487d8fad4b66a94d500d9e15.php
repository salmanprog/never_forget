<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.partials.outsource_category_form', [
    'formAction' => route('tango_category.store'),
    'backRoute' => 'tango_category.index',
    'defaultButtonText' => 'Create Tango',
    'previewImage' => asset('public/admin/assets/images/default.jpg'),
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views/admin/tango_category/create.blade.php ENDPATH**/ ?>