<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithFileUploads;

class ServiceCreate extends Component
{
    use WithFileUploads;

    public $image;
    public $services;
    public $service_type;
    public $description;
    public $status;


    public function render()
    {
        return view('livewire.service-create');
    }

    public function create()
    {
        $validated = $this->validate([
           'service_type'=>'required|string',
           'image'=>'required|file',
           'description'=>'required|string',
           'status'=>'integer'

       ]);
        $uploadedImage = $this->image->store('public/uploads');
        $service = new Service;
        $service->service_type = $this->service_type;
        $service->image=$uploadedImage;
        $service->description = $this->description;
        // $service->status = $this->status;
        $service->status = $this->status == true ? '1':'0';
        $service->save();
        $this->resetFields();
    }


    public function resetFields()
    {
        $this->service_type ='';
        $this->description ='';
        $this->image ='';
        $this->status ='';
        $this->message = "Image uploaded successfully";
    }
}
