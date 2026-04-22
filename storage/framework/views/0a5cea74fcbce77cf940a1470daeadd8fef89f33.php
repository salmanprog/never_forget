<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
<section class="content-header">
    <div class="content-header-left">
        <h1><?php echo e($page_title); ?></h1>
    </div>
    <div class="content-header-right">
        <?php echo $__env->make('includes.buttons.back', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <a href="<?php echo e(route('email-templates.index')); ?>" class="btn btn-primary btn-sm">All templates</a>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border" style="background-color: #081e37; color: #fff;">
                    <h3 class="box-title" style="color: #cfa40c;">Day <?php echo e($template['day']); ?> – <?php echo e($template['focus']); ?></h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label>Subject</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="emailSubject" value="<?php echo e($template['subject']); ?>" readonly>
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-primary" id="copySubject" title="Copy subject"><i class="fa fa-copy"></i> Copy</button>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Body</label>
                        <div class="input-group" style="display: block;">
                            <textarea class="form-control" style="margin-bottom: 10px;" id="emailBody" rows="14" readonly style="resize: vertical;"><?php echo e($template['body']); ?></textarea>
                            <div style="margin-top: 8px;">
                                <button type="button" class="btn btn-success" id="copyBody" title="Copy body"><i class="fa fa-copy"></i> Copy body</button>
                                <button type="button" class="btn btn-default" id="copyAll" title="Copy subject + body"><i class="fa fa-clipboard"></i> Copy subject + body</button>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted small">
                        <i class="fa fa-info-circle"></i> Replace <code>[Customer Name]</code>, <code>[Your Name]</code>, and <code>[Your Title]</code> when sending.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<script>
$(document).ready(function() {
    function copyToClipboard(text, label) {
        if (navigator.clipboard && navigator.clipboard.writeText) {
            navigator.clipboard.writeText(text).then(function() {
                toastr.success(label + ' copied to clipboard.');
            }).catch(function() { fallbackCopy(text, label); });
        } else {
            fallbackCopy(text, label);
        }
    }
    function fallbackCopy(text, label) {
        var ta = document.createElement('textarea');
        ta.value = text;
        ta.setAttribute('readonly', '');
        ta.style.position = 'absolute';
        ta.style.left = '-9999px';
        document.body.appendChild(ta);
        ta.select();
        try {
            document.execCommand('copy');
            toastr.success(label + ' copied to clipboard.');
        } catch (e) {
            toastr.error('Could not copy. Please select and copy manually.');
        }
        document.body.removeChild(ta);
    }
    $('#copySubject').on('click', function() {
        copyToClipboard($('#emailSubject').val(), 'Subject');
    });
    $('#copyBody').on('click', function() {
        copyToClipboard($('#emailBody').val(), 'Body');
    });
    $('#copyAll').on('click', function() {
        var all = 'Subject: ' + $('#emailSubject').val() + "\n\n" + $('#emailBody').val();
        copyToClipboard(all, 'Subject and body');
    });
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($layout ?? 'layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\admin\email-templates\show.blade.php ENDPATH**/ ?>