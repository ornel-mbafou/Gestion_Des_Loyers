{{-- resources/views/emails/verification-code.blade.php --}}
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vérification de votre compte - GEST-IMMO</title>
    <!-- Importation d'une police moderne pour les clients email qui la supportent -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body style="margin: 0; padding: 40px 20px; background-color: #f8fafc; font-family: 'Plus Jakarta Sans', 'Segoe UI', Helvetica, Arial, sans-serif; -webkit-font-smoothing: antialiased;">

    <div style="max-w: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 24px; box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.05); overflow: hidden; border: 1px solid #e2e8f0;">

        <!-- HEADER GRAPHIC & MODERN (Bleu Nuit Professionnel) -->
        <div style="background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%); padding: 48px 32px; text-align: center;">

            <!-- ICON BADGE (Accent Orange GEST-IMMO) -->
            <div style="width: 72px; height: 72px; background-color: rgba(249, 115, 22, 0.15); border: 2px solid rgba(249, 115, 22, 0.3); border-radius: 20px; display: inline-flex; align-items: center; justify-content: center; margin-bottom: 20px; box-shadow: 0 8px 16px rgba(0,0,0,0.1);">
                <span style="font-size: 32px; line-height: 1;">🏠</span>
            </div>

            <!-- TITLE -->
            <h1 style="margin: 0; font-size: 32px; font-weight: 700; color: #ffffff; letter-spacing: -0.5px;">
                GEST-IMMO
            </h1>

            <p style="margin: 8px 0 0 0; color: #94a3b8; font-size: 14px; font-weight: 500; letter-spacing: 0.5px; text-transform: uppercase;">
                Gestion immobilière 
            </p>
        </div>

        <!-- CONTENT -->
        <div style="padding: 48px 40px;">

            <h2 style="margin: 0 0 16px 0; font-size: 22px; font-weight: 700; color: #0f172a; letter-spacing: -0.5px;">
                Bienvenue {{ $user->name }} ! 👋
            </h2>

            <p style="margin: 0 0 24px 0; font-size: 15px; line-height: 1.6; color: #475569;">
                Bienvenue chez <span style="font-weight: 600; color: #f97316;">GEST-IMMO</span> ! Avant de pouvoir explorer votre nouvel espace de gestion immobilière, nous devons simplement valider votre adresse e-mail.
            </p>

            <p style="margin: 0 0 32px 0; font-size: 15px; line-height: 1.6; color: #475569;">
                Veuillez copier et saisir le code de validation à usage unique ci-dessous sur l'interface de l'application :
            </p>

            <!-- CODE BOX DETACHED & MODERN (Orange GEST-IMMO) -->
            <div style="margin: 32px 0; text-align: center;">
                <div style="display: inline-block; background-color: #fff7ed; border: 2px dashed #ffedd5; padding: 16px 36px; border-radius: 16px;">
                    <span style="font-size: 36px; font-weight: 700; color: #f97316; letter-spacing: 8px; font-family: 'Courier New', Courier, monospace;">
                        {{ $code }}
                    </span>
                </div>
            </div>

            <!-- SECURITY NOTICE -->
            <table role="presentation" style="width: 100%; border-collapse: collapse; background-color: #fef2f2; border-left: 4px solid #ef4444; border-radius: 8px; margin-bottom: 40px;">
                <tr>
                    <td style="padding: 16px;">
                        <p style="margin: 0; font-size: 13px; line-height: 1.5; color: #991b1b; font-weight: 500;">
                            <strong>🔒 Sécurité :</strong> Ce code est strictement confidentiel et expirera sous peu. Ne le partagez jamais avec un tiers. Nos équipes ne vous le demanderont jamais.
                        </p>
                    </td>
                </tr>
            </table>

            <!-- FOOTER SIGNATURE -->
            <hr style="border: 0; border-top: 1px solid #f1f5f9; margin-bottom: 32px;">

            <p style="margin: 0; font-size: 15px; line-height: 1.6; color: #475569;">
                À très vite,<br>
                <span style="font-weight: 700; color: #f97316;">L’équipe GEST-IMMO</span>
            </p>
        </div>

        <!-- SYSTEM FOOTER -->
        <div style="background-color: #f8fafc; padding: 24px 40px; text-align: center; border-top: 1px solid #f1f5f9;">
            <p style="margin: 0; font-size: 12px; color: #94a3b8; line-height: 1.5;">
                Ceci est un message automatique, merci de ne pas y répondre.<br>
                © {{ date('Y') }} GEST-IMMO.
            </p>
        </div>

    </div>
</body>

</html>
