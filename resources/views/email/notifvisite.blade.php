
<!DOCTYPE html>
<html>
<head>
    <title>Notification GEST-IMMO</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 10px;">
        <h2 style="color: #f97316;">Bonjour {{ $visite->nom_visiteur }},</h2>

        @if($visite->statut == 'effectuee')
            <p>Bonne nouvelle ! Votre demande de visite pour le logement a été <strong>acceptée et confirmée</strong> par le gestionnaire.</p>
            <p><strong>Détails du rendez-vous :</strong></p>
            <ul>
                <li><strong>Date et Heure :</strong> {{ date('d/m/Y H:i', strtotime($visite->date_visite)) }}</li>
            </ul>
            <p>Le gestionnaire vous attendra sur place. Veuillez être ponctuel !</p>
        @else
            <p>Nous vous informons que votre demande de visite prévue pour le {{ date('d/m/Y H:i', strtotime($visite->date_visite)) }} a été <strong>annulée ou refusée</strong>.</p>
            <p>Cela peut être dû à une indisponibilité du logement ou du créneau. N'hésitez pas à choisir un autre logement sur notre plateforme.</p>
        @endif

        <p style="margin-top: 30px; font-size: 0.9em; color: #777;">L'équipe GEST-IMMO.</p>
    </div>
</body>
</html>
