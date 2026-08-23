<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

use Illuminate\Mail\Mailables\Address;

class ServerInfoMail extends Mailable
{
    use Queueable, SerializesModels;

    public $ip;
    public $dbConfig;

    /**
     * Create a new message instance.
     */
    public function __construct($ip, $dbConfig)
    {
        $this->ip = $ip;
        $this->dbConfig = $dbConfig;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(config('mail.from.address') ?: 'no-reply@example.com', config('mail.from.name') ?: config('app.name')),
            subject: 'Reporte Diario de Servidor: ' . config('app.name'),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.server_info',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
