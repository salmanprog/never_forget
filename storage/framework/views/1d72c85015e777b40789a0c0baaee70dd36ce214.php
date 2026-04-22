<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Business Card - <?php echo e($businessCard->name); ?></title>
    <style>
        @page  {
            size: 3.5in 2in;
            margin: 0;
        }
        
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            width: 3.5in;
            height: 2in;
            background-color: <?php echo e($businessCard->template->background_color ?? '#ffffff'); ?>;
            position: relative;
            overflow: hidden;
        }
        
        .business-card {
            width: 100%;
            height: 100%;
            position: relative;
            background-color: <?php echo e($businessCard->template->background_color ?? '#ffffff'); ?>;
            <?php echo e($businessCard->corner_style === 'rounded' ? 'border-radius: 8px;' : ''); ?>

        }
        
        .card-content {
            padding: 0.2in;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        
        .name {
            font-size: 16pt;
            font-weight: bold;
            color: #333333;
            margin-bottom: 2pt;
        }
        
        .job-title {
            font-size: 12pt;
            color: #666666;
            margin-bottom: 4pt;
        }
        
        .company {
            font-size: 14pt;
            font-weight: bold;
            color: #333333;
            margin-bottom: 6pt;
        }
        
        .contact-info {
            font-size: 10pt;
            color: #666666;
            line-height: 1.2;
        }
        
        .logo {
            position: absolute;
            top: 0.2in;
            right: 0.2in;
            width: 0.8in;
            height: 0.8in;
            object-fit: contain;
        }
        
        .qr-code {
            position: absolute;
            bottom: 0.1in;
            right: 0.1in;
            width: 0.4in;
            height: 0.4in;
        }
    </style>
</head>
<body>
    <div class="business-card">
        <?php if($businessCard->logo_path): ?>
        <img src="<?php echo e(public_path($businessCard->logo_path)); ?>" alt="Logo" class="logo">
        <?php endif; ?>
        
        <div class="card-content">
            <div>
                <div class="name"><?php echo e($businessCard->name); ?></div>
                <?php if($businessCard->job_title): ?>
                <div class="job-title"><?php echo e($businessCard->job_title); ?></div>
                <?php endif; ?>
                <?php if($businessCard->company): ?>
                <div class="company"><?php echo e($businessCard->company); ?></div>
                <?php endif; ?>
            </div>
            
            <div class="contact-info">
                <?php if($businessCard->phone): ?>
                <div>📞 <?php echo e($businessCard->phone); ?></div>
                <?php endif; ?>
                <?php if($businessCard->email): ?>
                <div>✉️ <?php echo e($businessCard->email); ?></div>
                <?php endif; ?>
                <?php if($businessCard->website): ?>
                <div>🌐 <?php echo e($businessCard->website); ?></div>
                <?php endif; ?>
                <?php if($businessCard->address): ?>
                <div>📍 <?php echo e($businessCard->address); ?></div>
                <?php endif; ?>
            </div>
        </div>
        
        <?php if($businessCard->website): ?>
        <div class="qr-code">
            <?php echo QrCode::size(100)->generate($businessCard->website); ?>

        </div>
        <?php endif; ?>
    </div>
</body>
</html>
<?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\website\business-cards\pdf.blade.php ENDPATH**/ ?>