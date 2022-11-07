<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RemindMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $firstName, $schedule, $refNum, $services_id;
    public function __construct($firstName, $schedule, $refNum, $services_id)
    {
        $this->firstName = $firstName;
        $this->schedule = $schedule;
        $this->refNum = $refNum;
        $this->services_id = $services_id;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function build()
    {
        $subject = "Appointment Reminder";
        return $this->subject($subject)
                    ->view('emails.remindMail')
                    ->with([
                        'firstName' => $this->firstName,
                        'schedule' => $this->schedule,
                        'refNum' => $this->refNum,
                        'services_id' => $this->services_id,
                    ]);
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
}
