<?php

namespace App\Livewire;

use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateChildModal extends Component
{
    use WithFileUploads;

    public $firstname;
    public $lastname;
    public $sex;
    public $dob;
    public $user;
    public $fileupload;
    public $filepath;

    public function render()
    {
        return view('livewire.create-child-modal');
    }

    public function createChild(){
        // $this->filepath = null;
        

        $this->validate([
            'fileupload' => 'nullable|file|mimes:png,jpg,pdf,jpeg|max:1024'
        ]);

        
        // dd('Hi');
        $newstudent = Student::create([
            'FirstName' => $this->firstname,
            'LastName' => $this->lastname,
            'Sex' => $this->sex,
            'DOB' => $this->dob,
            // 'picturepath' => $this->filepath,
        ]);

        
        if ($this->fileupload) {
            $filename = $this->firstname . $this->lastname . '-' . $this->fileupload->getClientOriginalName();
            $this->fileupload->storeAs('public/students', $filename);
            // $this->filepath = 'uploads/students/' . $filename;
            $newstudent->PicturePath = 'public/students/' . $filename;
            $newstudent->save();
        }

        $user  = User::find(Auth::user()->id);
        $user->students()->attach($newstudent->StudentID);

        $this->firstname = null;
        $this->lastname = null;
        $this->sex = null;
        $this->dob = null;
        $this->fileupload = null;
        $this->filepath = null;
        $this->dispatch('close-create-modal');
        $this->dispatch('refresh-list');
        $this->dispatch('show-message', message: 'Student created successfully');
    }
}
