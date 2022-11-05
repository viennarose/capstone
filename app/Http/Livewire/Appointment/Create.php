<?php

namespace App\Http\Livewire\Appointment;

use App\Models\Service;
use Livewire\Component;
use App\Models\Appointment;
use Illuminate\Support\Str;

class Create extends Component
{
    public $firstName, $lastName, $services_id, $schedule, $email, $contact, $refNum;
    public function setAppointment(){
        $this->validate([
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'services_id' => ['required'],
            'contact' => ['required', 'numeric'],
            'schedule' => ['required', 'string', 'unique:appointments'],
            'refNum' => ['required', 'string', 'unique:appointments'],
        ]);
        Appointment::create([
            'firstName' => $this->firstName,
            'lastName' => $this->firstName,
            'email' => $this->email,
            'services_id' => $this->services_id,
            'contact' => $this->contact,
            'schedule' => $this->schedule,
            'refNum' => 'SOM-'.Str::random(5),
        ]);
        return redirect('/admin/appointments')->with('message', 'Created Successfully');

    }
    public function updated($propertyEmail)
    {
        $this->validateOnly($propertyEmail, [
            'email' => ['required', 'email'],
        ]);
    }
    public function render()
    {
        return view('livewire.appointment.create', ['services'=> Service::all(), ]);
    }
}
