<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;


    public $receipts, $username, $receipt_title;
    /**
     * Create a new message instance.
     */
    public function __construct($receipts, $username, $receipt_title)
    {
        //
        $this->receipts = $receipts;
        $this->username = $username;
        $this->receipt_title = $receipt_title;
    }


    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        // dd($this->receipt_title);
        return new Envelope(
            subject: 'Triple-s Automation, Thank You for Your Purchase of Our '. $this->receipt_title,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.invoice',
            // with:['invoice'=> $this->receipts]
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
