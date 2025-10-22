<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Inquiry {{ $details['body']->name }}</title>
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
    <div class="content">
        <p>Hello {{ $details['body']->name }},</p>
        
        <p>My name is <strong>{{ $details['body']->name }}</strong>.</p>
        
        <p>Here is my below Details:</p>
        <ul>
            <li><strong>Email:</strong> {{ $details['body']->email }}</li>
            <li><strong>Phone:</strong> {{ $details['body']->phone ?? 'Not specified' }}</li>
        </ul>
        
        @if(isset($details['body']->product))
        <p><strong>Product Name:</strong></p>
        <p>{{ $details['body']->product }}</p>
        @endif

        @if($details['body']->message)
        <p><strong>About the Inquiry:</strong></p>
        <p>{{ $details['body']->message }}</p>
        @endif
        
        <p>I am waiting your good response.</p>
        
        <p>Best regards,<br>
        {{ $details['body']->name }}</p>
    </div>

    <div class="footer">
        <p>If you believe you received this email in error, please ignore it.</p>
    </div>
</body>
</html>
