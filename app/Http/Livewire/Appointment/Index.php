<?php

namespace App\Http\Livewire\Appointment;

use App\Models\Service;
use Livewire\Component;
use App\Rules\DateBetween;
use App\Rules\TimeBetween;
use App\Models\Appointment;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;
use App\Mail\AppointmentMailable;
use Illuminate\Support\Facades\Mail;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;
    public $service = 'all';
    public $sched = null;
    public function loadAppointments(){

        $query = Appointment::orderBy('schedule')
            ->search($this->search);

        if($this->service != 'all'){
            $query->where('services_id', $this->service);
        }
        if($this->sched != null){
            $query->where('schedule', $this->sched);
        }

        $appointments = $query->paginate(5);
        return compact('appointments');
    }

    protected $listeners = ["selectDate" => 'getSelectedDate'];
    public function getSelectedDate( $date ) {

        $this->schedule = $date;
    }

    public $firstName, $lastName, $services_id, $schedule, $email, $contact, $refNum;
    public function setAppointment(){

        $this->validate([
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'services_id' => ['required'],
            'contact' => ['required', 'numeric'],
            'schedule' => ['required', 'date', 'unique:appointments', new DateBetween, new TimeBetween],
        ]);

        $refNum = 'SOM-'.Str::random(10);
        Appointment::create([
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'email' => $this->email,
            'services_id' => $this->services_id,
            'contact' => $this->contact,
            'schedule' => $this->schedule,
            //'refNum' => $this->refNum,
            'refNum' => $refNum ,
        ]);
        Mail::to($this->email)->send(new AppointmentMailable
        ($this->firstName, $this->schedule, $refNum, $this->services_id));
        session()->flash('message','Appointment Added Successfully');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');

    }

    public function editAppointment(int $appointment_id)
    {
        $appointment = Appointment::find($appointment_id);
        if($appointment){
            $this->appointment_id = $appointment->id;
            $this->firstName = $appointment->firstName;
            $this->lastName = $appointment->lastName;
            $this->email = $appointment->email;
            $this->services_id = $appointment->services_id;
            $this->contact = $appointment->contact;
            $this->schedule = $appointment->schedule;

        }else{
            return redirect()->to('/admin/appointments');
        }

    }
    public function updateAppointment(){
        $this->validate([
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'services_id' => ['required'],
            'contact' => ['required', 'numeric'],
            'schedule' => ['required', 'string', 'unique:appointments,schedule,'.$this->appointment_id, new DateBetween, new TimeBetween],

        ]);
        Appointment::where('id',$this->appointment_id)->update([
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'email' => $this->email,
            'services_id' => $this->services_id,
            'contact' => $this->contact,
            'schedule' => $this->schedule,
            //'refNum' => $this->refNum,
        ]);

        session()->flash('message','Appointment Updated Successfully');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }


    public function updated($propertyEmail)
    {
        $this->validateOnly($propertyEmail, [
            'email' => ['required', 'email'],
        ]);
    }

    public function deleteAppointment(int $appointment_id)
    {
        $this->appointment_id = $appointment_id;
    }

    public function destroyAppointment()
    {
        Appointment::find($this->appointment_id)->delete();
        session()->flash('message','Appointment Deleted Successfully');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function closeModal()
    {
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function resetInput()
    {
        $this->firstName = '';
        $this->lastName = '';
        $this->email = '';
        $this->services_id = '';
        $this->contact = '';
        $this->schedule = '';
        $this->refNum = '';
    }
    public function render()
    {
        $now = Carbon::now();
        $appointments = Appointment::where('firstName', 'like', '%'.$this->search.'%')
                ->orWhere('lastName', 'like', '%'.$this->search.'%')
                ->orWhere('services_id', 'like', '%'.$this->search.'%')
                ->orWhere('schedule', 'like', '%'.$this->search.'%')
                ->orderBy('schedule', 'desc')->paginate(5);
        return view('livewire.appointment.index', $this->loadAppointments(), ['appointments' => $appointments,'services'=> Service::all()]);
    }
}
