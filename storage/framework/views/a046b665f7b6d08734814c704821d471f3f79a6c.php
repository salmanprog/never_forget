
<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
<input type="hidden" id="page_url" value="<?php echo e(route('text-message-templates.index')); ?>">
<section class="content-header">
    <div class="content-header-left">
        <h1><?php echo e($page_title); ?></h1>
    </div>
    <div class="content-header-right">
        <?php echo $__env->make('includes.buttons.back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <a href="<?php echo e(route('templates.index')); ?>" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> <span class="ml-2">Back to Templates</span></a>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?php if(session('success')): ?>
                <div class="callout callout-success">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">NEVER FORGET – 30-Day Text Message Templates</h3>
                    <p class="text-muted" style="margin: 8px 0 0; font-size: 13px;">(Send every 3-5 days. Keep concise and friendly.)</p>
                </div>
                <div class="box-body">
                    <div class="row">
                        <?php $__currentLoopData = $templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-3 col-sm-6 col-xs-12" style="margin-bottom: 20px;">
                                <a href="<?php echo e(route('text-message-templates.show', $template['day'])); ?>" class="text-template-card" style="text-decoration: none; color: inherit; display: block;">
                                    <div class="info-box" style="min-height: 140px; border: 1px solid #ddd; border-radius: 4px; background: #fff; box-shadow: 0 1px 3px rgba(0,0,0,0.08); transition: border-color 0.2s, box-shadow 0.2s;">
                                        <span class="info-box-icon" style="background-color: #081e37; color: #cfa40c;"><i class="fa fa-comment"></i></span>
                                        <div class="info-box-content" style="margin-left: 90px;">
                                            <span class="info-box-text" style="font-size: 11px; color: #6c757d;">Day <?php echo e($template['day']); ?></span>
                                            <span class="info-box-number" style="font-size: 14px; font-weight: 600; color: #081e37; margin: 4px 0;"><?php echo e($template['focus']); ?></span>
                                            <p class="text-muted small" style="margin: 6px 0 0; font-size: 12px; line-height: 1.3; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;"><?php echo e(\Illuminate\Support\Str::limit($template['body'], 50)); ?></p>
                                            <span class="small" style="color: #cfa40c;"><i class="fa fa-arrow-right"></i> View & copy</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .text-template-card:hover .info-box {
        border-color: #cfa40c !important;
        box-shadow: 0 2px 8px rgba(207, 164, 12, 0.2) !important;
    }
    .text-template-card:hover .info-box-icon {
        background-color: #cfa40c !important;
        color: #081e37 !important;
    }
    .text-template-card .info-box {
        overflow: hidden;
    }
    .text-template-card .info-box-icon {
        height: 138px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($layout ?? 'layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\admin\text-message-templates\index.blade.php ENDPATH**/ ?>