<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AppointmentMailable extends Mailable
{
    use Queueable, SerializesModels;

    protected $firstName, $schedule, $refNum, $services_id;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($firstName, $schedule, $refNum, $services_id)
    {
        $this->firstName = $firstName;
        $this->schedule = $schedule;
        $this->refNum = $refNum;
        $this->services_id = $services_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = "Appointment Confirmation";
        return $this->subject($subject)
                    ->view('emails.confirmMail')
                    ->with([
                        'firstName' => $this->firstName,
                        'schedule' => $this->schedule,
                        'refNum' => $this->refNum,
                        'services_id' => $this->services_id,
                    ]);
    }
}
