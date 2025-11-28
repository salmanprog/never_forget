<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Corporate Gifting Quote Request</title>
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
            border-radius: 5px 5px 0 0;
            margin-bottom: 0;
        }
        .content {
            background-color: #ffffff;
            padding: 30px;
            border: 1px solid #ddd;
            border-top: none;
            border-radius: 0 0 5px 5px;
        }
        .info-box {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            margin: 15px 0;
        }
        .info-row {
            margin: 10px 0;
            padding: 8px 0;
            border-bottom: 1px solid #e9ecef;
        }
        .info-row:last-child {
            border-bottom: none;
        }
        .label {
            font-weight: 600;
            color: #0B1B48;
            display: inline-block;
            width: 120px;
        }
        .value {
            color: #333;
        }
        .message-box {
            background-color: #fff;
            border-left: 4px solid #0B1B48;
            padding: 15px;
            margin: 20px 0;
        }
        .footer {
            margin-top: 20px;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 5px;
            font-size: 12px;
            color: #666;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2 style="margin: 0;">Corporate Gifting Quote Request</h2>
    </div>
    
    <div class="content">
        <p>Hello,</p>
        
        <p>You have received a new quote request from the Corporate Gifting Specialist form.</p>
        
        <div class="info-box">
            <div class="info-row">
                <span class="label">Name:</span>
                <span class="value">{{ $details['body']['first_name'] ?? '' }} {{ $details['body']['last_name'] ?? '' }}</span>
            </div>
            <div class="info-row">
                <span class="label">Email:</span>
                <span class="value">{{ $details['body']['email'] ?? '' }}</span>
            </div>
            <div class="info-row">
                <span class="label">Phone:</span>
                <span class="value">{{ $details['body']['phone'] ?? '' }}</span>
            </div>
        </div>

        @if(isset($details['body']['message']) && $details['body']['message'] && $details['body']['message'] != 'No additional message provided.')
        <div class="message-box">
            <p style="margin: 0 0 10px 0;"><strong>Additional Message:</strong></p>
            <p style="margin: 0; white-space: pre-wrap;">{{ $details['body']['message'] }}</p>
        </div>
        @endif
        
        <p>Please contact the customer at your earliest convenience to discuss their corporate gifting needs.</p>
        
        <p>Best regards,<br>
        Never Forget Showing Appreciation</p>
    </div>

    <div class="footer">
        <p>This is an automated email from Never Forget Showing Appreciation.</p>
        <p>Please do not reply to this email.</p>
    </div>
</body>
</html>

