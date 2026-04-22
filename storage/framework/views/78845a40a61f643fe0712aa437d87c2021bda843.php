
<?php if(session('upgrade_required') && session('upgrade_url')): ?>
    <div class="callout callout-warning">
        <h4><i class="icon fa fa-exclamation-triangle"></i> Limit reached</h4>
        <p class="mb-2">You have reached your default limit of 5 friends/family. To add more, please upgrade your package. To upgrade, go to your dashboard settings.</p>
        <p class="mb-0">
            <a href="<?php echo e(session('upgrade_url')); ?>" class="btn btn-primary">
                <i class="fa fa-arrow-up"></i> Upgrade Package
            </a>
        </p>
    </div>
<?php endif; ?>


<?php if(isset($friendsFamilyCount) && isset($limits)): ?>
    <?php if($friendsFamilyCount >= $limits['friends_family']): ?>
        <div class="callout callout-info">
            <h4><i class="icon fa fa-info-circle"></i> Resource limits</h4>
            <p class="mb-2">You have reached your default limit of <?php echo e($limits['friends_family']); ?> friends/family. To add more, please upgrade your package. To upgrade, go to your dashboard settings.</p>
            <p class="mb-0">
                <a href="<?php echo e(route('member.package-upgrade')); ?>" class="btn btn-success">
                    <i class="fa fa-arrow-up"></i> Upgrade Package
                </a>
            </p>
        </div>
    <?php endif; ?>
<?php endif; ?>
<?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\includes\upgrade_alert_individual.blade.php ENDPATH**/ ?>