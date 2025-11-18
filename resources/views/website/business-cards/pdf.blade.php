<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Business Card - {{ $businessCard->name }}</title>
    <style>
        @page {
            size: 3.5in 2in;
            margin: 0;
        }
        
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            width: 3.5in;
            height: 2in;
            background-color: {{ $businessCard->template->background_color ?? '#ffffff' }};
            position: relative;
            overflow: hidden;
        }
        
        .business-card {
            width: 100%;
            height: 100%;
            position: relative;
            background-color: {{ $businessCard->template->background_color ?? '#ffffff' }};
            {{ $businessCard->corner_style === 'rounded' ? 'border-radius: 8px;' : '' }}
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
        @if($businessCard->logo_path)
        <img src="{{ public_path($businessCard->logo_path) }}" alt="Logo" class="logo">
        @endif
        
        <div class="card-content">
            <div>
                <div class="name">{{ $businessCard->name }}</div>
                @if($businessCard->job_title)
                <div class="job-title">{{ $businessCard->job_title }}</div>
                @endif
                @if($businessCard->company)
                <div class="company">{{ $businessCard->company }}</div>
                @endif
            </div>
            
            <div class="contact-info">
                @if($businessCard->phone)
                <div>📞 {{ $businessCard->phone }}</div>
                @endif
                @if($businessCard->email)
                <div>✉️ {{ $businessCard->email }}</div>
                @endif
                @if($businessCard->website)
                <div>🌐 {{ $businessCard->website }}</div>
                @endif
                @if($businessCard->address)
                <div>📍 {{ $businessCard->address }}</div>
                @endif
            </div>
        </div>
        
        @if($businessCard->website)
        <div class="qr-code">
            {!! QrCode::size(100)->generate($businessCard->website) !!}
        </div>
        @endif
    </div>
</body>
</html>
