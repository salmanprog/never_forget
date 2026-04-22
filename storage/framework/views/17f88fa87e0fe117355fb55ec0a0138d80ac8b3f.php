<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Message from NEVER FORGET</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .content {
            background-color: #ffffff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .button {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 5px;
            margin: 20px 0;
        }
        .button:hover {
            background-color: #0056b3;
        }
        .footer {
            margin-top: 20px;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 5px;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Message from NEVER FORGET</h1>
    </div>

    <div class="content">
        <?php if(!empty($recipientName)): ?>
        <p>Hello <?php echo e($recipientName); ?>,</p>
        <?php endif; ?>
        <p><?php echo nl2br(e($body)); ?></p>
        <p>Best regards,<br>NEVER FORGET Showing Appreciation</p>
    </div>

    <div class="footer">
        <p>This email was sent from the NEVER FORGET admin dashboard.</p>
        <p>If you believe you received this email in error, please ignore it.</p>
    </div>
</body>
</html>
<?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\emails\mts-dashboard-email.blade.php ENDPATH**/ ?>