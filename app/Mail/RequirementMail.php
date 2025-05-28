<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Http\Controllers\MailController;

class RequirementMail extends Mailable
{
    use Queueable, SerializesModels;


    public $emaildata, $product_url;
    /**
     * Create a new message instance.
     */
    public function __construct(array $emaildata, $product_url)
    {
        //
        $this->emaildata = $emaildata;
        $this->product_url = $product_url;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Triple-S Automation - Requirement Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.cust_requirement_mail',
            with:['emaildata'=> $this->emaildata,'product_url'=> $this->product_url]
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
