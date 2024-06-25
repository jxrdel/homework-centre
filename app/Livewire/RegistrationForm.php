<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class RegistrationForm extends Component
{
    public $registrationform = true;
    public $isregistered = false;

    public $firstname;
    public $lastname;
    public $email;
    public $cellno;
    public $homeno;

    public $newusername = '';

    public function render()
    {
        return view('livewire.registration-form');
    }

    public function register(){
        $username = strtolower($this->firstname . '.' . $this->lastname);
        // dd($username);

        if(User::usernameExists($username)){
            $this->addError('error', 'User already exists');
        }else{

            $newuser = User::create([
                'FirstName' => $this->firstname,
                'LastName' => $this->lastname,
                'Username' => $username,
                'Email' => $this->email,
                'CellNo' => $this->cellno,
                'HomeNo' => $this->homeno,
                'IsParent' => true,
                'IsAdmin' => false,
            ]);

            $this->registrationform = false;
            $this->dispatch('show-message', message: 'Account created successfully');

            $this->newusername = $newuser->Username;

        }

    }
}
