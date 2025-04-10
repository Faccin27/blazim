<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendMailContato extends Mailable
{
    use Queueable, SerializesModels;

    public string $assunto;
    public array $formulario;
    public $anexo;

    /**
     * Create a new message instance.
     */
    public function __construct(string $assunto, array $formulario, $anexo = null)
    {
        $this->assunto = $assunto;
        $this->formulario = $formulario;
        $this->anexo = $anexo;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->assunto,
            replyTo: [
                new Address($this->formulario['email'], $this->formulario['nome'] ?? null)
            ]
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'site.emails.contato',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        $attachments = [];

        if($this->anexo === null) {

            return $attachments;
        }

        $arquivos = is_array($this->anexo) ? $this->anexo : [$this->anexo];

        foreach ($arquivos as $arquivo) {

            $attachments[] = Attachment::fromPath($arquivo->getRealPath())
                                ->as($arquivo->getClientOriginalName())
                                ->withMime($arquivo->getClientMimeType());
        }

        return $attachments;
    }
}
