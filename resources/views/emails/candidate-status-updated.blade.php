<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $content['subject'] }}</title>
</head>
<body style="margin:0; padding:0; background:#f3f4f6; font-family:Arial, sans-serif; color:#111827;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background:#f3f4f6; padding:32px 16px;">
        <tr>
            <td align="center">
                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="max-width:640px; background:#ffffff; border:1px solid #e5e7eb; border-radius:18px; overflow:hidden;">
                    <tr>
                     <td style="padding:36px 32px 28px; background:#0A0A0F; text-align:center;" align="center">
                             @php $logoPath = public_path('images/logo-email.png'); @endphp
                             @if(file_exists($logoPath))
                             <img src="{{ $message->embed($logoPath) }}" alt="Ennova - National Marketing Competition" width="170"
                                  style="display:block; margin:0 auto 22px; border:0; outline:none; max-width:170px; height:auto;">
                             @else
                             <div style="width:170px; height:47px; margin:0 auto 22px; background:#0A0A0F; border:2px solid #F97316; border-radius:10px; display:flex; align-items:center; justify-content:center; font-size:24px; font-weight:900; color:#F97316; letter-spacing:1px;">E</div>
                             @endif
                            <div style="font-size:13px; letter-spacing:.08em; text-transform:uppercase; color:{{ $content['accent'] }}; font-weight:700;">{{ $content['eyebrow'] }}</div>
                            <h1 style="margin:10px 0 0; font-size:28px; line-height:1.25; font-weight:800; color:#ffffff;">{{ $content['headline'] }}</h1>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:32px;">
                            <p style="margin:0 0 18px; font-size:16px; line-height:1.7;">Hello {{ $candidate->first_name }},</p>
                            <p style="margin:0 0 18px; font-size:16px; line-height:1.7;">{{ $content['intro'] }}</p>
                            <p style="margin:0 0 24px; font-size:16px; line-height:1.7;">{{ $content['body'] }}</p>

                            <div style="border-left:4px solid {{ $content['accent'] }}; background:#f9fafb; padding:16px 18px; border-radius:10px; margin:24px 0;">
                                <p style="margin:0; font-size:15px; line-height:1.6; color:#374151;">{{ $content['cta'] }}</p>
                            </div>

                            <p style="margin:28px 0 0; font-size:15px; line-height:1.7;">Best regards,<br><strong>The Ennova Team</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:18px 32px; border-top:1px solid #e5e7eb; color:#6b7280; font-size:12px; line-height:1.6;">
                            This email was sent automatically after an update to your application status.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
