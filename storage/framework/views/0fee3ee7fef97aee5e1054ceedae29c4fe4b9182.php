<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invitation Accepted - <?php echo e($company->name); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .success-card {
            max-width: 500px;
            margin: 50px auto;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .success-header {
            background: linear-gradient(135deg, #28a745, #20c997);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .success-section {
            padding: 30px;
        }
        .checkmark {
            font-size: 4rem;
            color: #28a745;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card success-card">
            <div class="success-header">
                <div class="checkmark">✓</div>
                <h2>Welcome to <?php echo e($company->name); ?>!</h2>
                <p class="mb-0">Your registration has been completed successfully.</p>
            </div>
            
            <div class="success-section">
                <h4>Registration Complete</h4>
                <p>Hello <?php echo e($employee->first_name); ?>, you have successfully joined <?php echo e($company->name); ?> as a <?php echo e(ucfirst($employee->type)); ?>.</p>
                
                <div class="alert alert-info">
                    <h5>What's Next?</h5>
                    <ul class="mb-0">
                        <li>You can now log in to your account using your email and password</li>
                        <li>Access the company dashboard to view your profile and settings</li>
                        <li>Contact your administrator if you need any assistance</li>
                    </ul>
                </div>
                
                <div class="d-grid gap-2">
                    <a href="<?php echo e(route('login')); ?>" class="btn btn-primary btn-lg">Go to Login</a>
                    <a href="<?php echo e(route('index')); ?>" class="btn btn-outline-secondary">Visit Website</a>
                </div>
                
                <div class="mt-4 text-center">
                    <small class="text-muted">
                        Thank you for joining <?php echo e($company->name); ?>!
                    </small>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\employee-invitation\success.blade.php ENDPATH**/ ?>