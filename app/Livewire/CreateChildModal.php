<?php

namespace App\Livewire;

use App\Models\Student;
use Livewire\Component;

class CreateChildModal extends Component
{
    public $firstname;
    public $lastname;
    public $dob;

    public function render()
    {
        return view('livewire.create-child-modal');
    }

    public function createChild(){

        // dd($this->dob);
        Student::create([
            'FirstName' => $this->firstname,
            'LastName' => $this->lastname,
            'DOB' => $this->dob,
        ]);

        $this->dispatch('close-create-modal');
        $this->dispatch('show-message', message: 'Student created successfully');
    }
}
