<?php

namespace App\Mail;

use App\Models\Visite;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NotificationVisite extends Mailable
{
    use Queueable, SerializesModels;
    public $visite;
    /**
     * Create a new message instance.
     */
    public function __construct(Visite $visite)
    {
        //
        // On récupère les données de la visite injectées depuis le contrôleur
        $this->visite = $visite;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {

    // 🎯 On change le sujet du mail dynamiquement selon le statut de la visite
        $sujet = $this->visite->statut === 'effectuee'
            ? 'Votre demande de visite est Confirmée ! ✅'
            : 'Mise à jour concernant votre demande de visite ❌';

        return new Envelope(
            subject: $sujet,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.notifvisite',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
