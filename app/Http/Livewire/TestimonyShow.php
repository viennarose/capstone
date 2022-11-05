<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Testimony;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;

class TestimonyShow extends Component
{

    public $search='';
    public $showData = true;
    public $createData = false;
    public $updateData = false;

    public $name;
    public $message;
    public $status;
    public $image;

    public $edit_id;
    public $edit_name;
    public $edit_message;
    public $edit_status;
    public $old_image;
    public $new_image;



    public function resetField()
    {
        $this->name = "";
        $this->message = "";
        $this->status = "";
        $this->image = "";
        $this->edit_name = "";
        $this->edit_message = "";
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
        $testimonies = new Testimony();
        $this->validate([
            'name' => 'required',
            'message' => 'required',
            'status' => 'required',
            'image' => 'required'
        ]);

        $filename = "";
        if ($this->image) {
            $filename = $this->image->store('testimonies', 'public');
        } else {
            $filename = Null;
        }

        $testimonies->name = $this->name;
        $testimonies->message = $this->message;
        $testimonies->status = $this->status == true ? '1':'0';
        $testimonies->image = $filename;
        $result = $testimonies->save();
        if ($result) {
            session()->flash('success', 'Added Successfully');
            $this->resetField();
            $this->showData = true;
            $this->createData = false;
        } else {
            session()->flash('error', 'Add Unsuccessfully');
        }


    }

    public function edit($id)
    {
        $this->showData = false;
        $this->updateData = true;
        $testimonies = Testimony::findOrFail($id);
        $this->edit_id = $testimonies->id;
        $this->edit_name = $testimonies->name;
        $this->edit_message = $testimonies->message;
        $this->edit_status = $testimonies->status == true ? '1':'0';
        $this->old_image = $testimonies->image;
    }

    public function update($id)
    {
        $testimonies = Testimony::findOrFail($id);
        $this->validate([
            'edit_name' => 'required',
            'edit_message' => 'required',
            'edit_status' => 'required',
        ]);

        $filename = "";
        $destination=public_path('storage\\'.$testimonies->image);
        if ($this->new_image != null) {
            if(File::exists($destination)){
                File::delete($destination);
            }
            $filename = $this->new_image->store('testimonies', 'public');
        } else {
            $filename = $this->old_image;
        }

        $testimonies->name = $this->edit_name;
        $testimonies->message = $this->edit_message;
        $testimonies->status = $this->edit_status;
        $testimonies->image = $filename;
        $result = $testimonies->save();
        if ($result) {
            session()->flash('success', 'Update Successfully');
            $this->resetField();
            $this->showData = true;
            $this->updateData = false;
        } else {
            session()->flash('error', 'Not Update Successfully');
        }
    }

    public function delete($id)
    {
        $testimonies=Testimony::findOrFail($id);
        $destination=public_path('storage\\'.$testimonies->image);
        if(File::exists($destination)){
            File::delete($destination);
        }

        $result=$testimonies->delete();
        if ($result) {
            session()->flash('success', 'Delete Successfully');
        } else {
            session()->flash('error', 'Not Delete Successfully');
        }

    }

    public function back(){
        $this->showData = true;
        $this->createData = false;
        $this->updateData = false;
    }

    public function render()
    {
        $testimonies = Testimony::where('name', 'like', '%'.$this->search.'%')->orderBy('id','ASC')->paginate(5);
        return view('livewire.testimony-show', ['testimonies' => $testimonies])->layout('layouts.app');
    }
}
