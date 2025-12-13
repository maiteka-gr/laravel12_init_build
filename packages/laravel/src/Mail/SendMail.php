<?php

namespace Laravel\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * SendMail handles email template rendering and sending.
 * Mailable class for sending confirmation and notification emails.
 *
 * @author maiteka-gr
 * @date 2024-02-25
 */
class SendMail extends Mailable{
    use Queueable, SerializesModels;

    protected $details;
    /**
     * Create a new message instance.
     *
     * @param array $details Email details including subject and URL
     * @return void
     */
    public function __construct( $details ) {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        return $this->subject( $this->details['subject'] )->view( 'mail_address_confirmation_message' )->with( [
            'url'      => $this->details['url'],
        ] );
    }
}
