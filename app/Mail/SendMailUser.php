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

class SendMailUser extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $info;
    public $attachmentFile;
    public function __construct($info, $attachmentFile)
    {
        $this->info = $info;
        $this->attachmentFile = $attachmentFile;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            // from: new Address('admin@yourdomain.com', 'Admin'),
            subject: $this->info['subject'],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.sendmailuser',
            with: ['info' => $this->info],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        if ($this->attachmentFile) {
            return [
                Attachment::fromPath($this->attachmentFile->getRealPath())
                    ->as($this->attachmentFile->getClientOriginalName())
                    ->withMime($this->attachmentFile->getClientMimeType()),
            ];
        }

        return [];
    }
}
