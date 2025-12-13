<?php

namespace Laravel\Services;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Laravel\Mail\SendMail;

/**
 * MailService handles email sending operations.
 * Manages email confirmation and notification sending.
 *
 * @author maiteka-gr
 * @date 2024-02-25
 */
class MailService{

    /**
     * Send email confirmation to user.
     *
     * @param string $to Email address to send to
     * @param string $token Confirmation token
     * @return bool|\Illuminate\Mail\SentMessage
     */
    function sendEmailConfirmation( $to, $token ) {
        try {
            $detail = [
                'subject' => '[maiteka-gr] Verify your email address',
                'url'     => env( 'BASE_URL' ) . '/confirm?token=' . $token,
            ];

            return Mail::to( $to )->send( new SendMail( $detail ) );
        } catch ( \Exception $exception ) {
            Log::error( "sendEmailConfirmation:" . $exception->getMessage() );

            return false;
        }
    }
    
}
