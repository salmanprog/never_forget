<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Invitation to Join {{ $company->name }}</title>
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
        <h1>You're Invited!</h1>
        <h2>{{ $company->name }}</h2>
    </div>

    <div class="content">
        <p>Hello {{ $employee->first_name }},</p>
        
        <p>You have been invited to join <strong>{{ $company->name }}</strong> as a {{ $employee->type }}.</p>
        
        <p>Company Details:</p>
        <ul>
            <li><strong>Company:</strong> {{ $company->name }}</li>
            <li><strong>Industry:</strong> {{ $company->industry ?? 'Not specified' }}</li>
            <li><strong>Your Role:</strong> {{ ucfirst($employee->type) }}</li>
        </ul>
        
        @if($company->description)
        <p><strong>About the Company:</strong></p>
        <p>{{ $company->description }}</p>
        @endif
        
        <p>To accept this invitation and create your account, please click the button below:</p>
        
        <div style="text-align: center;">
            <a href="{{ $inviteUrl }}" class="button">Accept Invitation</a>
        </div>
        
        <p>If the button doesn't work, you can copy and paste this link into your browser:</p>
        <p style="word-break: break-all; background-color: #f8f9fa; padding: 10px; border-radius: 3px;">
            {{ $inviteUrl }}
        </p>
        
        <p>This invitation will expire in 7 days. If you have any questions, please contact the company administrator.</p>
        
        <p>Best regards,<br>
        {{ $company->name }} Team</p>
    </div>

    <div class="footer">
        <p>This email was sent to {{ $employee->email }} because you were invited to join {{ $company->name }}.</p>
        <p>If you believe you received this email in error, please ignore it.</p>
    </div>
</body>
</html>
