<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class RegistrationForm extends Component
{
    public $firstname;
    public $lastname;
    public $email;
    public $cellno;
    public $homeno;

    public function render()
    {
        return view('livewire.registration-form');
    }

    public function register(){
        $username = strtolower($this->firstname . '.' . $this->lastname);
        dd($username);

        User::create([
            'FirstName' => $this->firstname,
            'LastName' => $this->lastname,
            'Username' => $username,
            'Email' => $this->email,
            'CellNo' => $this->cellno,
            'HomeNo' => $this->homeno,
            'IsParent' => true,
            'IsAdmin' => false,
        ]);

    }
}
