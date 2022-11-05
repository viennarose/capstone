<?php

namespace App\Http\Livewire;

use App\Models\Promotion;
use Livewire\Component;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;

class PromotionCrud extends Component
{
    public $search='';
    public $showData = true;
    public $createData = false;
    public $updateData = false;

    public $title;
    public $description;
    public $status;
    public $image;

    public $edit_id;
    public $edit_title;
    public $edit_description;
    public $edit_status;
    public $old_image;
    public $new_image;

    public function render()
    {
        $promotions = Promotion::where('title', 'like', '%'.$this->search.'%')->orderBy('id','ASC')->paginate(5);
        return view('livewire.promotion-crud', ['promotions' => $promotions])->layout('layouts.app');
    }


    public function resetField()
    {
        $this->title = "";
        $this->description = "";
        $this->status = "";
        $this->image = "";
        $this->edit_title = "";
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
        $promotions = new Promotion();
        $this->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
            'image' => 'required'
        ]);

        $filename = "";
        if ($this->image) {
            $filename = $this->image->store('promotions', 'public');
        } else {
            $filename = Null;
        }

        $promotions->title = $this->title;
        $promotions->description = $this->description;
        $promotions->status = $this->status == true ? '1':'0';
        $promotions->image = $filename;
        $result = $promotions->save();
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
        $promotions = Promotion::findOrFail($id);
        $this->edit_id = $promotions->id;
        $this->edit_title = $promotions->title;
        $this->edit_description = $promotions->description;
        $this->edit_status = $promotions->status == true ? '1':'0';
        $this->old_image = $promotions->image;
    }

    public function update($id)
    {
        $promotions =Promotion::findOrFail($id);
        $this->validate([
            'edit_title' => 'required',
            'edit_description' => 'required',
            'edit_status' => 'required',
        ]);

        $filename = "";
        $destination=public_path('storage\\'.$promotions->image);
        if ($this->new_image != null) {
            if(File::exists($destination)){
                File::delete($destination);
            }
            $filename = $this->new_image->store('promotions', 'public');
        } else {
            $filename = $this->old_image;
        }

        $promotions->title = $this->edit_title;
        $promotions->description = $this->edit_description;
        $promotions->status = $this->edit_status;
        $promotions->image = $filename;
        $result = $promotions->save();
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
        $promotions=Promotion::findOrFail($id);
        $destination=public_path('storage\\'.$promotions->image);
        if(File::exists($destination)){
            File::delete($destination);
        }

        $result=$promotions->delete();
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
