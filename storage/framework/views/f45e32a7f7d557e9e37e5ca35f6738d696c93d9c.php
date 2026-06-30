<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
<section class="content-header">
    <div class="content-header-left">
        <h1><?php echo e($page_title); ?></h1>
    </div>
    <div class="content-header-right">
        <?php echo $__env->make('includes.buttons.back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <a href="<?php echo e(route('tango_category.index')); ?>" class="btn btn-primary btn-sm">View All</a>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <form action="<?php echo e(route('tango_category.update', $model->id)); ?>" class="form-horizontal" enctype="multipart/form-data" method="post">
                <?php echo csrf_field(); ?>
                <?php echo e(method_field('PATCH')); ?>

                <div class="box box-info">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Title <span style="color:red">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="title" value="<?php echo e(old('title', $model->title)); ?>">
                                <span style="color: red"><?php echo e($errors->first('title')); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="description" rows="4"><?php echo e(old('description', $model->description)); ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Button Text</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="button_text" value="<?php echo e(old('button_text', $model->button_text ?: 'Create Tango')); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Sort Order</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="sort_order" value="<?php echo e(old('sort_order', $model->sort_order)); ?>" min="0">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Status</label>
                            <div class="col-sm-9">
                                <select name="status" class="form-control">
                                    <option value="1" <?php echo e($model->status == 1 ? 'selected' : ''); ?>>Active</option>
                                    <option value="0" <?php echo e($model->status == 0 ? 'selected' : ''); ?>>In-Active</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Image</label>
                            <div class="col-sm-6">
                                <input type="file" class="form-control" name="image" id="image" accept="image/*">
                                <span style="color: red"><?php echo e($errors->first('image')); ?></span>
                            </div>
                            <div class="col-sm-4">
                                <img id="banner_preview"
                                    src="<?php echo e($model->image ? asset('/public/' . $model->image) : asset('public/admin/assets/images/default.jpg')); ?>"
                                    style="width: 80px" alt="Preview">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-success pull-left">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<script>
    $(document).ready(function() {
        $('#image').on('change', function() {
            const [file] = this.files;
            if (file) {
                $('#banner_preview').attr('src', URL.createObjectURL(file));
            }
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views/admin/tango_category/edit.blade.php ENDPATH**/ ?>