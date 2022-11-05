<?php
namespace App\Http\Livewire;

use App\Models\Service;
use Livewire\Component;
use App\Models\Appointment;
use Livewire\WithPagination;

class AppointmentShow extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $firstName, $lastName, $email, $contact, $appointment_id, $services_id, $schedule, $appointment;
    public $search = '';

    protected function rules()
    {
        return [
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'email' => ['required','email'],
            'services_id' => 'required',
            'contact' => 'required|numeric',
            'schedule' => 'required|string|unique:appointments,schedule'
            // 'schedule' => 'required|string|unique:appointments, schedule'.$this->appointment->id,

        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function setAppointment()
    {
        $validatedData = $this->validate();

        Appointment::create($validatedData);
        session()->flash('message','Appointment Added Successfully');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function editAppointment(int $appointment_id)
    {
        $appointment = Appointment::find($appointment_id);
        if($appointment){
            $this->validate([
                'fullName' => ['required', 'string', 'max:255'],
                'service' => ['required', 'string', 'max:255'],
                'schedule' => ['required', 'string', 'unique:appointments,schedule,'.$this->appointment->id],
                'email' => ['required', 'email'],
                'contact' => ['required', 'numeric'],
            ]);
            $this->appointment_id = $appointment->id;
            $this->firstName = $appointment->firstName;
            $this->lastName = $appointment->lastName;
            $this->email = $appointment->email;
            $this->services_id = $appointment->services_id;
            $this->contact = $appointment->contact;
            $this->schedule = $appointment->schedule;

        }else{
            return redirect()->to('/appointments');
        }

    }

    public function updateAppointment()
    {
        $validatedData = $this->validate();

        Appointment::where('id',$this->appointment_id)->update([
            'firstName' => $validatedData['firstName'],
            'lastName' => $validatedData['lastName'],
            'email' => $validatedData['email'],
            'services_id' => $validatedData['services_id'],
            'contact' => $validatedData['contact'],
            'schedule' => $validatedData['schedule'],
        ]);
        session()->flash('message','Appointment Updated Successfully');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
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
    }

    public function render()
    {
        $appointments = Appointment::where('firstName', 'like', '%'.$this->search.'%')->orderBy('schedule','ASC')->paginate(2);
        return view('livewire.appointment-show', ['appointments' => $appointments, 'services'=> Service::all(), ]);
    }
}
