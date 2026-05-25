<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CodeMail extends Mailable
{
    use Queueable, SerializesModels;

    //variable pour stoker le code
    public $user;
    public $code;

    /**
     * Create a new message instance.
     */
    //recevoir lecode au moment ou il a ete cree dans le controller
    public function __construct(User $user, $code)
    {
        $this->user = $user;
        $this->code = $code;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Votre Code de verification GEST-IMMO',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.activation',
            //envoie du code a la vue
        //     with: [
        //         'code' => $this->code,
        //         // 'user'=> $this->user,
        //     ]
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
