<?php

namespace VioletaskyaContact\Mail;

use Illuminate\Bus\Queueable as BaseQueueable;
use Illuminate\Mail\Mailable as BaseMailable;
use Illuminate\Queue\SerializesModels as BaseSerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use VioletaskyaContact\Models\Contact;

class ContactMail extends BaseMailable
{
    use BaseQueueable, BaseSerializesModels;

    public $contact;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('app.MAIL_FROM'))
            ->subject('VioletaSkya Contact Message')
            ->view('violetaskya-contact::contact')
            ->text('violetaskya-contact::contact_plain');
    }
}
