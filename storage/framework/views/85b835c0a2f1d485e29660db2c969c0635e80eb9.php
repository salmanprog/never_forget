<!DOCTYPE html>
<html>

<head>
    <title>Travel & Experience Inquiry Received - Never Forget</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <style type="text/css">
        @import  url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap');
        
        body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
        table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
        img { -ms-interpolation-mode: bicubic; border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }
        table { border-collapse: collapse !important; }
        body { height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; background: linear-gradient(135deg, #F8FAFC 0%, #E2E8F0 100%); }
        a[x-apple-data-detectors] { color: inherit !important; text-decoration: none !important; font-size: inherit !important; font-family: inherit !important; font-weight: inherit !important; line-height: inherit !important; }

        .email-container { max-width: 600px; margin: 0 auto; background: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04); }
        .header-section { background: linear-gradient(135deg, #081e37 0%, #0a2749 100%); padding: 40px 30px; text-align: center; position: relative; }
        .header-section::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 4px; background: linear-gradient(90deg, #cfa40c 0%, #f4d03f 50%, #cfa40c 100%); }
        .welcome-title { font-family: 'Playfair Display', serif; font-size: 32px; font-weight: 700; color: #ffffff; margin: 0; line-height: 1.2; }
        .welcome-subtitle { font-family: 'Inter', sans-serif; font-size: 16px; color: #cfa40c; margin: 8px 0 0 0; font-weight: 500; }
        .content-section { padding: 40px 30px; background: #ffffff; }
        .greeting { font-family: 'Inter', sans-serif; font-size: 18px; color: #1F2937; font-weight: 600; margin: 0 0 20px 0; }
        .message-text { font-family: 'Inter', sans-serif; font-size: 16px; color: #4B5563; line-height: 1.6; margin: 0 0 20px 0; }
        .footer-section { background: #F8FAFC; padding: 30px; text-align: center; border-top: 1px solid #E5E7EB; }
        .footer-text { font-family: 'Inter', sans-serif; font-size: 14px; color: #6B7280; margin: 0; }
        .summary-box { background: #f8f9fa; border-left: 4px solid #cfa40c; padding: 20px; margin: 20px 0; border-radius: 8px; }
        .summary-box p { color: #4B5563; margin: 0 0 8px 0; font-size: 14px; font-family: 'Inter', sans-serif; }
        .summary-box p:last-child { margin-bottom: 0; }

        @media  screen and (max-width: 600px) {
            .email-container { margin: 10px; border-radius: 12px; }
            .header-section { padding: 30px 20px; }
            .welcome-title { font-size: 28px; }
            .content-section { padding: 30px 20px; }
        }
    </style>
</head>

<body style="background: linear-gradient(135deg, #F8FAFC 0%, #E2E8F0 100%); margin: 0 !important; padding: 20px 0 !important;">
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background: linear-gradient(135deg, #F8FAFC 0%, #E2E8F0 100%);">
        <tr>
            <td align="center" style="padding: 20px 0;">
                <div class="email-container">
                    <div class="header-section">
                        <h1 class="welcome-title">Never Forget</h1>
                        <p class="welcome-subtitle">Showing Appreciation</p>
                    </div>
                    <div class="content-section">
                        <p class="greeting">Hello <?php echo e($name); ?>,</p>
                        <p class="message-text">Thank you for submitting your Travel & Experience inquiry. We have received it and will get back to you shortly.</p>
                        <div class="summary-box">
                            <p><strong>Name:</strong> <?php echo e($name); ?></p>
                            <p><strong>Email:</strong> <?php echo e($email); ?></p>
                            <p><strong>Phone:</strong> <?php echo e($phone ?? 'Not provided'); ?></p>
                            <p><strong>Message:</strong> <?php echo e($inquiry_message ?? '—'); ?></p>
                        </div>
                        <p class="message-text">If you have any questions, please contact us.</p>
                        <p class="message-text">Best regards,<br><strong>NEVER FORGET Showing Appreciation</strong></p>
                    </div>
                    <div class="footer-section">
                        <p class="footer-text"><strong>Never Forget Showing Appreciation</strong></p>
                    </div>
                </div>
            </td>
        </tr>
    </table>
</body>

</html>
<?php /**PATH D:\xamp-new\htdocs\never-forget\resources\views\emails\travel-experience-confirmation.blade.php ENDPATH**/ ?>