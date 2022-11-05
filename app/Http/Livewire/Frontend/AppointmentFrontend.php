<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Service;
use Livewire\Component;
use App\Rules\DateBetween;
use App\Rules\TimeBetween;
use App\Models\Appointment;
use Illuminate\Support\Str;
use App\Mail\AppointmentMailable;
use Illuminate\Support\Facades\Mail;

class AppointmentFrontend extends Component
{
    public $firstName, $lastName, $services_id, $schedule, $email, $contact, $refNum;

    public $totalSteps = 4;
    public $currentStep = 1;

    protected $listeners = ["selectDate" => 'getSelectedDate'];
    public function getSelectedDate( $date ) {

        $this->schedule = $date;
    }
    public function mount(){
        $this->currentStep = 1;
    }

    public function increaseStep(){
        $this->resetErrorBag();
        $this->validateData();
        $this->currentStep++;
        if($this->currentStep > $this->totalSteps){
            $this->currentStep = $this->totalSteps;
        }

    }
    public function decreaseStep(){
        $this->resetErrorBag();
        $this->currentStep--;
        if($this->currentStep < 1){
            $this->currentStep = 1;
        }
    }
    public function validateData(){
        if($this->currentStep == 1){
            $this->validate([
                'services_id' => ['required'],
                'schedule' => ['required', 'string', 'unique:appointments', new DateBetween, new TimeBetween],
            ]);
        }elseif($this->currentStep == 2){
            $this->validate([
                'email' => ['required', 'email'],
                'contact' => ['required', 'numeric'],
            ]);
        }if($this->currentStep == 3){
            $this->validate([
                'firstName' => ['required', 'string', 'max:255'],
                'lastName' => ['required', 'string', 'max:255'],
            ]);
        }
    }
        public function setAppointment(){
            $this->resetErrorBag();
        $refNum = 'SOM-'.Str::random(10);
        Appointment::create([
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'email' => $this->email,
            'services_id' => $this->services_id,
            'contact' => $this->contact,
            'schedule' => $this->schedule,
            //'refNum' => $this->refNum,
            'refNum' => $refNum,
        ]);
        Mail::to($this->email)->send(new AppointmentMailable
        ($this->firstName, $this->schedule, $refNum, $this->services_id));

        $data = ['name'=>$this->firstName.' '.$this->lastName,'email'=>$this->email, 'refNum' => $refNum];
            return redirect()->route('appointment.success', $data);
    }


    public function render()
    {
        return view('livewire.frontend.appointmentfrontend', ['services' => Service::all()]);
    }
}
