<?php

namespace App\Console\Commands;

use App\Mail\SchedMail;
use App\Models\Appointment;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $emails = Appointment::pluck('email')->toArray();
        $data = ['firstName'=>$this->firstName, 'schedule' => $this->schedule];
        if(Carbon::parse($email->schedule)->diffInDays(Carbon::now()) == 1){ //Or however your date field on user is called
            foreach($emails as $email){
                        Mail::to($email)->send(new SchedMail($data));
            }
        }
    }
}
