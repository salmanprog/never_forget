<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invalid Invitation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .error-card {
            max-width: 500px;
            margin: 50px auto;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .error-header {
            background: linear-gradient(135deg, #dc3545, #c82333);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .error-section {
            padding: 30px;
        }
        .error-icon {
            font-size: 4rem;
            color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card error-card">
            <div class="error-header">
                <div class="error-icon">⚠</div>
                <h2>Invalid Invitation</h2>
            </div>
            
            <div class="error-section">
                <div class="alert alert-danger">
                    <h5>Invitation Problem</h5>
                    <p class="mb-0">{{ $message }}</p>
                </div>
                
                <div class="alert alert-info">
                    <h5>What can you do?</h5>
                    <ul class="mb-0">
                        <li>Contact your company administrator for a new invitation</li>
                        <li>Make sure you're using the correct invitation link</li>
                        <li>Check if the invitation has expired (invitations expire after 7 days)</li>
                    </ul>
                </div>
                
                <div class="d-grid gap-2">
                    <a href="{{ route('index') }}" class="btn btn-primary">Visit Website</a>
                    <a href="{{ route('login') }}" class="btn btn-outline-secondary">Go to Login</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
