<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Réponse à votre message</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px;">
        <h2>Réponse à votre message</h2>

        <p>Bonjour {{ $originalMessage->name }},</p>

        <p>Nous avons bien reçu votre message concernant "{{ $originalMessage->subject ?? 'votre demande' }}" et nous vous répondons ci-dessous :</p>

        <div style="background-color: #f9f9f9; padding: 15px; border-left: 4px solid #ff6b35; margin: 20px 0;">
            <p style="margin: 0; white-space: pre-wrap;">{{ $replyBody }}</p>
        </div>

        <p>Pour référence, voici votre message original :</p>
        <blockquote style="border-left: 4px solid #ccc; padding-left: 15px; margin: 20px 0; color: #666;">
            <p style="margin: 0; white-space: pre-wrap;">{{ $originalMessage->message }}</p>
        </blockquote>

        <p>Cordialement,<br>
        L'équipe Ennova</p>

        <hr style="border: none; border-top: 1px solid #eee; margin: 30px 0;">
        <p style="font-size: 12px; color: #666;">
            Cet email a été envoyé automatiquement depuis le système de gestion des messages d'Ennova.
        </p>
    </div>
</body>
</html>