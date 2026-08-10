<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Customize Your Solution Request</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 700px; margin: 0 auto; padding: 20px; }
        .header { background-color: #0B1B48; color: white; padding: 20px; text-align: center; border-radius: 5px 5px 0 0; }
        .content { background: #fff; padding: 30px; border: 1px solid #ddd; border-top: none; border-radius: 0 0 5px 5px; }
        .info-box { background: #f8f9fa; padding: 15px; border-radius: 5px; margin: 15px 0; }
        .info-row { margin: 8px 0; padding: 6px 0; border-bottom: 1px solid #e9ecef; }
        .info-row:last-child { border-bottom: none; }
        .label { font-weight: 600; color: #0B1B48; display: inline-block; min-width: 180px; }
        .services-list { margin: 0; padding-left: 20px; }
        .message-box { border-left: 4px solid #0B1B48; padding: 15px; margin: 20px 0; background: #fff; }
    </style>
</head>
<body>
    <div class="header">
        <h2 style="margin: 0;">Customize Your Solution Request</h2>
    </div>
    <div class="content">
        <p>A new custom solution request has been submitted and saved to MTS (Contact Us).</p>

        <div class="info-box">
            <div class="info-row"><span class="label">Company:</span> {{ $details['body']['company'] ?? '' }}</div>
            <div class="info-row"><span class="label">Contact Name:</span> {{ $details['body']['contact_name'] ?? '' }}</div>
            <div class="info-row"><span class="label">Job Title:</span> {{ $details['body']['job_title'] ?? '' }}</div>
            <div class="info-row"><span class="label">Email:</span> {{ $details['body']['email'] ?? '' }}</div>
            <div class="info-row"><span class="label">Phone:</span> {{ $details['body']['phone'] ?? '' }}</div>
            <div class="info-row"><span class="label">Website:</span> {{ $details['body']['website'] ?? '' }}</div>
            <div class="info-row"><span class="label">Industry:</span> {{ $details['body']['industry'] ?? '' }}</div>
            <div class="info-row"><span class="label">Employees:</span> {{ $details['body']['number_of_employees'] ?? '' }}</div>
            <div class="info-row"><span class="label">Approx. Customers:</span> {{ $details['body']['approximate_customers'] ?? '' }}</div>
            <div class="info-row"><span class="label">Estimated Budget:</span> {{ $details['body']['estimated_budget'] ?? 'N/A' }}</div>
        </div>

        <div class="message-box">
            <p style="margin: 0 0 10px 0;"><strong>Selected Services:</strong></p>
            <ul class="services-list">
                @foreach (($details['body']['services'] ?? []) as $service)
                    <li>{{ $service }}</li>
                @endforeach
            </ul>
        </div>

        @if (!empty($details['body']['other_services_text']))
            <div class="message-box">
                <p style="margin: 0 0 10px 0;"><strong>Other Services Details:</strong></p>
                <p style="margin: 0; white-space: pre-wrap;">{{ $details['body']['other_services_text'] }}</p>
            </div>
        @endif

        <div class="message-box">
            <p style="margin: 0 0 10px 0;"><strong>Business Goals:</strong></p>
            <p style="margin: 0; white-space: pre-wrap;">{{ $details['body']['business_goals'] ?? '' }}</p>
        </div>

        @if (!empty($details['body']['message']))
            <div class="message-box">
                <p style="margin: 0 0 10px 0;"><strong>Additional Notes:</strong></p>
                <p style="margin: 0; white-space: pre-wrap;">{{ $details['body']['message'] }}</p>
            </div>
        @endif
    </div>
</body>
</html>
