<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Career Application Response</title>
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
            background-color: #0B1B48;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }
        .content {
            background-color: #f8f9fa;
            padding: 30px;
            border-radius: 0 0 10px 10px;
        }
        .status-badge {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: bold;
            margin: 10px 0;
        }
        .status-accepted {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .status-rejected {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .status-pending {
            background-color: #fff3cd;
            color: #856404;
            border: 1px solid #ffeaa7;
        }
        .message-box {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid #0B1B48;
            margin: 20px 0;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #dee2e6;
            color: #6c757d;
            font-size: 14px;
        }
        .btn {
            display: inline-block;
            padding: 12px 24px;
            background-color: #0B1B48;
            color: white;
            text-decoration: none;
            border-radius: 25px;
            margin: 10px 0;
        }
        .btn:hover {
            background-color: #cfa40c;
            color: #0B1B48;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Never Forget</h1>
        <h2>Career Application Response</h2>
    </div>
    
    <div class="content">
        <p>Dear <strong>{{ $applicant_name }}</strong>,</p>
        
        <p>Thank you for your interest in the <strong>{{ $career_title }}</strong> position at Never Forget.</p>
        
        <div class="status-badge status-{{ $status }}">
            @if($status === 'accepted')
                ✅ Application Accepted
            @elseif($status === 'rejected')
                ❌ Application Not Selected
            @else
                ⏳ Application Under Review
            @endif
        </div>
        
        <div class="message-box">
            <h4>Message from our team:</h4>
            <p>{!! nl2br(e($response_message)) !!}</p>
        </div>
        
        @if($status === 'accepted')
            <p>We are excited about the possibility of you joining our team! Please expect to hear from us soon with next steps.</p>
        @elseif($status === 'rejected')
            <p>While we were impressed with your qualifications, we have decided to move forward with other candidates for this position. We encourage you to apply for other opportunities that match your skills and interests.</p>
        @else
            <p>We are currently reviewing applications and will be in touch soon with updates on the selection process.</p>
        @endif
        
        <p>If you have any questions, please don't hesitate to contact us.</p>
        
        <p>Best regards,<br>
        <strong>The Never Forget Team</strong></p>
    </div>
    
    <div class="footer">
        <p>This is an automated message. Please do not reply to this email.</p>
        <p>© {{ date('Y') }} Never Forget. All rights reserved.</p>
    </div>
</body>
</html>
