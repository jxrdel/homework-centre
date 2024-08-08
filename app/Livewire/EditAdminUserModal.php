<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class EditAdminUserModal extends Component
{
    public $user;
    public $firstname;
    public $lastname;
    public $username;
    public $email;
    public $isadmin;
    public $issuperadmin;

    #[On('show-edit-modal')]
    public function displayModal($id)
    {
        $this->user = User::find($id);
        $this->firstname = $this->user->FirstName;
        $this->lastname = $this->user->LastName;
        $this->username = $this->user->Username;
        $this->email = $this->user->Email;
        $this->isadmin = $this->user->IsAdmin == 1 ? true : false;
        $this->issuperadmin = $this->user->IsSuperAdmin == 1 ? true : false;
        $this->dispatch('display-edit-modal');
    }

    public function editUser(){
        User::where('id', $this->user->id)->update([
            'FirstName' => $this->firstname,
            'LastName' => $this->lastname,
            'Username' => $this->username,
            'Email' => $this->email,
            'IsAdmin' => $this->isadmin,
            'IsSuperAdmin' => $this->issuperadmin,
        ]);

        $this->dispatch('close-edit-modal');
        $this->dispatch('refresh-table');
        $this->dispatch('show-message', message: 'User edited successfully');
    }

    public function render()
    {
        return view('livewire.edit-admin-user-modal');
    }
}
