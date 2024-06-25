<?php

namespace App\Livewire;

use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateChildModal extends Component
{
    public $firstname;
    public $lastname;
    public $dob;
    public $user;

    public function render()
    {
        return view('livewire.create-child-modal');
    }

    public function createChild(){

        $newstudent = Student::create([
            'FirstName' => $this->firstname,
            'LastName' => $this->lastname,
            'DOB' => $this->dob,
        ]);

        $user  = User::find(Auth::user()->id);
        $user->students()->attach($newstudent->StudentID);

        $this->dispatch('close-create-modal');
        $this->dispatch('refresh-list');
        $this->dispatch('show-message', message: 'Student created successfully');
    }
}
