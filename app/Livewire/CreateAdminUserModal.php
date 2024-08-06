<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class CreateAdminUserModal extends Component
{
    public $firstname;
    public $lastname;
    public $username;
    public $email;
    public $isadmin = true;
    public $issuperadmin;

    public function render()
    {
        return view('livewire.create-admin-user-modal');
    }
    

    public function createUser(){
        // dd($this->isadmin);
        
        User::create([
            'FirstName' => $this->firstname,
            'LastName' => $this->lastname,
            'Username' => $this->username,
            'Email' => $this->email,
            'IsAdmin' => $this->isadmin,
            'IsSuperAdmin' => $this->issuperadmin
        ]);
        
        $this->reset();
        $this->dispatch('close-create-modal');
        $this->dispatch('refresh-table');
        $this->dispatch('show-message', message: 'User created successfully');
    }

    public function updatedLastname(){
        if($this->firstname){
            $this->username = strtolower($this->firstname . '.' . $this->lastname);
            $this->email = strtolower($this->firstname . '.' . $this->lastname . '@health.gov.tt');
        }
    }

    public function updatedFirstname(){
        if($this->lastname){
            $this->username = strtolower($this->firstname . '.' . $this->lastname);
            $this->email = strtolower($this->firstname . '.' . $this->lastname . '@health.gov.tt');
        }
    }
}
