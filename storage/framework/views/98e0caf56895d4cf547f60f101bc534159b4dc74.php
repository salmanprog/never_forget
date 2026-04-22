<!DOCTYPE html>
<html>

<head>
    <title>Greetings & Appreciation Enquiry - Never Forget</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
        body { font-family: Arial, sans-serif; line-height: 1.5; color: #333; }
        .summary-box { background: #f8f9fa; border-left: 4px solid #cfa40c; padding: 16px; margin: 16px 0; }
    </style>
</head>

<body>
    <p>Hello <?php echo e($senderName); ?>,</p>
    <p>Thank you for your Greetings &amp; Appreciation enquiry. We have received it and will get back to you shortly.</p>
    <div class="summary-box">
        <p><strong>Email:</strong> <?php echo e($email); ?></p>
        <p><strong>Phone:</strong> <?php echo e($phone ?? 'Not specified'); ?></p>
        <p><strong>Message:</strong> <?php echo e($inquiry_message ?? '—'); ?></p>
        <?php if(!empty($specify_type)): ?>
            <p><strong>Specify type:</strong> <?php echo e($specify_type); ?></p>
        <?php endif; ?>
        <p><strong>Items:</strong> <?php echo e($items_summary ?? '—'); ?></p>
    </div>
    <p>Best regards,<br><strong>NEVER FORGET Showing Appreciation</strong></p>
</body>

</html>
<?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\emails\greetings-appreciation-confirmation.blade.php ENDPATH**/ ?>