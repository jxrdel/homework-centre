<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MyProfile extends Component
{
    public $user;
    public $firstname;
    public $lastname;
    public $email;
    public $mobileno;
    public $homeno;
    public $workno;
    public $ministry;
    public $department;
    public $relationship;
    public $picture;
    public $picturepath;
    public $address;
    public $vtc;

    public function render()
    {
        return view('livewire.my-profile');
    }

    public function mount(){
        $this->user = User::find(Auth::user()->id);
        $this->firstname = $this->user->FirstName;
        $this->lastname = $this->user->LastName;
        $this->email = $this->user->Email;
        $this->mobileno = $this->user->MobileNo;
        $this->homeno = $this->user->HomeNo;
        $this->workno = $this->user->WorkNo;
        $this->ministry = $this->user->Ministry;
        $this->department = $this->user->Department;
        $this->relationship = $this->user->ChildRelationship;
        $this->picturepath = $this->user->PicturePath;
        $this->address = $this->user->Address;
        $this->vtc = $this->user->CityTown;
    }
}
