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
    <p>Hello {{ $senderName }},</p>
    <p>Thank you for your Greetings &amp; Appreciation enquiry. We have received it and will get back to you shortly.</p>
    <div class="summary-box">
        <p><strong>Email:</strong> {{ $email }}</p>
        <p><strong>Phone:</strong> {{ $phone ?? 'Not specified' }}</p>
        <p><strong>Message:</strong> {{ $inquiry_message ?? '—' }}</p>
        @if (!empty($specify_type))
            <p><strong>Specify type:</strong> {{ $specify_type }}</p>
        @endif
        <p><strong>Items:</strong> {{ $items_summary ?? '—' }}</p>
    </div>
    <p>Best regards,<br><strong>NEVER FORGET Showing Appreciation</strong></p>
</body>

</html>
