<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Livewire\Component;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;

class ServiceCrud extends Component
{
    public $search='';
    public $showData = true;
    public $createData = false;
    public $updateData = false;

    public $service_type;
    public $description;
    public $status;
    public $image;

    public $edit_id;
    public $edit_service_type;
    public $edit_description;
    public $edit_status;
    public $old_image;
    public $new_image;

    public function render()
    {
        $images = Service::where('service_type', 'like', '%'.$this->search.'%')->orderBy('id','ASC')->paginate(5);
        return view('livewire.service-crud', ['images' => $images])->layout('layouts.app');
    }


    public function resetField()
    {
        $this->service_type = "";
        $this->description = "";
        $this->status = "";
        $this->image = "";
        $this->edit_service_type = "";
        $this->edit_description = "";
        $this->edit_status = "";
        $this->new_image = "";
        $this->old_image = "";
        $this->edit_id = "";
    }

    public function showForm()
    {
        $this->showData = false;
        $this->createData = true;
    }


    use WithFileUploads;
    public function create()
    {
        $images = new Service();
        $this->validate([
            'service_type' => 'required',
            'description' => 'required',
            'status' => 'required',
            'image' => 'required'
        ]);

        $filename = "";
        if ($this->image) {
            $filename = $this->image->store('services', 'public');
        } else {
            $filename = Null;
        }

        $images->service_type = $this->service_type;
        $images->description = $this->description;
        $images->status = $this->status == true ? '1':'0';
        $images->image = $filename;
        $result = $images->save();
        if ($result) {
            session()->flash('success', 'Added Successfully');
            $this->resetField();
            $this->showData = true;
            $this->createData = false;
        } else {
            session()->flash('error', 'Create Unsuccessfully');
        }


    }

    public function edit($id)
    {
        $this->showData = false;
        $this->updateData = true;
        $images = Service::findOrFail($id);
        $this->edit_id = $images->id;
        $this->edit_service_type = $images->service_type;
        $this->edit_description = $images->description;
        $this->edit_status = $images->status == true ? '1':'0';
        $this->old_image = $images->image;
    }

    public function update($id)
    {
        $images =Service::findOrFail($id);
        $this->validate([
            'edit_service_type' => 'required',
            'edit_description' => 'required',
            'edit_status' => 'required',
        ]);

        $filename = "";
        $destination=public_path('storage\\'.$images->image);
        if ($this->new_image != null) {
            if(File::exists($destination)){
                File::delete($destination);
            }
            $filename = $this->new_image->store('services', 'public');
        } else {
            $filename = $this->old_image;
        }

        $images->service_type = $this->edit_service_type;
        $images->description = $this->edit_description;
        $images->status = $this->edit_status;
        $images->image = $filename;
        $result = $images->save();
        if ($result) {
            session()->flash('success', 'Updated Successfully');
            $this->resetField();
            $this->showData = true;
            $this->updateData = false;
        } else {
            session()->flash('error', 'Update UnSuccessfully');
        }
    }

    public function delete($id)
    {
        $images=Service::findOrFail($id);
        $destination=public_path('storage\\'.$images->image);
        if(File::exists($destination)){
            File::delete($destination);
        }

        $result=$images->delete();
        if ($result) {
            session()->flash('Success', 'Delete Successfully');
        } else {
            session()->flash('error', 'Not Delete Successfully');
        }
    }

    public function back(){
        $this->showData = true;
        $this->createData = false;
        $this->updateData = false;
    }
}
