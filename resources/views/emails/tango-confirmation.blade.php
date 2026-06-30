<!DOCTYPE html>
<html>
<head>
    <title>Tango Request Received - Never Forget</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
        body { margin: 0; padding: 20px 0; font-family: Arial, sans-serif; background: #f8fafc; }
        .email-container { max-width: 600px; margin: 0 auto; background: #ffffff; border-radius: 16px; overflow: hidden; }
        .header-section { background: #081e37; padding: 30px; text-align: center; color: #fff; }
        .content-section { padding: 30px; }
        .summary-box { background: #f8f9fa; border-left: 4px solid #cfa40c; padding: 20px; margin: 20px 0; }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header-section">
            <h1 style="margin:0;">Never Forget</h1>
            <p style="margin:8px 0 0;color:#cfa40c;">Showing Appreciation</p>
        </div>
        <div class="content-section">
            <p>Hello {{ $senderName }},</p>
            <p>Thank you for submitting your Tango request. We have received it and will process it shortly.</p>
            <div class="summary-box">
                @if (!empty($tangoCategoryTitle))
                    <p><strong>Tango category:</strong> {{ $tangoCategoryTitle }}</p>
                @endif
                <p><strong>Occasion:</strong> {{ $occasion }}</p>
                <p><strong>Recipient:</strong> {{ $recipientName }} ({{ $recipientEmailPhone }})</p>
                <p><strong>Send Date & Time:</strong> {{ $sendDate }} at {{ $sendTime }}</p>
                <p><strong>Card Style:</strong> {{ $cardStyle ?? 'Not specified' }}</p>
            </div>
            <p>Best regards,<br><strong>NEVER FORGET Showing Appreciation</strong></p>
        </div>
    </div>
</body>
</html>
