<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ __('messages.email.reply.subject') }}</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px;">
        <h2>{{ __('messages.email.reply.subject') }}</h2>

        <p>{{ __('messages.email.reply.greeting') }} {{ $originalMessage->name }},</p>

        <p>{{ __('messages.email.reply.message') }}</p>

        <div style="background-color: #f9f9f9; padding: 15px; border-left: 4px solid #ff6b35; margin: 20px 0;">
            <p style="margin: 0; white-space: pre-wrap;">{{ $replyBody }}</p>
        </div>

        <p>{{ __('messages.email.reply.original') }}</p>
        <blockquote style="border-left: 4px solid #ccc; padding-left: 15px; margin: 20px 0; color: #666;">
            <p style="margin: 0; white-space: pre-wrap;">{{ $originalMessage->message }}</p>
        </blockquote>

        <p>{{ __('messages.email.reply.regards') }}<br>
        {{ __('messages.email.reply.team') }}</p>

        <hr style="border: none; border-top: 1px solid #eee; margin: 30px 0;">
        <p style="font-size: 12px; color: #666;">
            {{ __('messages.email.reply.footer') }}
        </p>
    </div>
</body>
</html>