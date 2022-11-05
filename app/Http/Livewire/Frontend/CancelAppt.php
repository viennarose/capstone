<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Mail\CancelMail;
use App\Models\Appointment;
use Illuminate\Support\Facades\Mail;

class CancelAppt extends Component
{

    public $refNum, $email, $firstName, $schedule, $lastName;
    public $totalSteps = 2;
    public $currentStep = 1;

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
                'firstName' => ['required'],
                'refNum' => ['required'],
                'email' => ['required', 'email']
            ]);
        }
    }
    public function cancel(){

        $appt = Appointment::where('refNum', '=', $this->refNum);
        $appt->delete();
        return redirect()->route('cancelled.appointment');


        // if('refNum' != $this->refNum){
        //     return redirect()->route('cancelled.failed');
        // }elseif('refNum' == $this->refNum){
        //     $appt = Appointment::where('refNum', '=', $this->refNum);
        //     $appt->delete();
        //     return redirect()->route('cancelled.appointment');
        //     Mail::to($this->email)->send(new CancelMail);
        // }

        // Mail::to($this->email)->send(new AppointmentMailable
        // ($this->refNum));

        // $data = ['refNum' => $this->refNum];
        //     return redirect()->route('cancelled.appointment', $data);
    }

    public function mount(){
        $this->currentStep = 1;
    }
    public function updated($propertySchedule)
    {
        $this->validateOnly($propertySchedule, [
            'refNum' => ['required'],
        ]);
    }
    public function render()
    {
        return view('livewire.frontend.cancel-appt', ['appointments' => Appointment::all()]);
    }
}
