<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class RegistrationForm extends Component
{
    public $parentform = true;
    public $childform = false;
    public $registrationcomplete = false;
    public $multipleparents = false; //Displays second parent/guardian field if true

    // Parent/Guardian #1 Information
    public $parentfirstname1;
    public $parentlastname1;
    public $parentemail1;
    public $parentmobileno1;
    public $parenthomeno1;
    public $parentworkno1;
    public $parentministry1 = 'Ministry of Health';
    public $parentdepartment1;
    public $parentrelationship1;
    public $parentpicture1;
    public $parentaddress1;
    public $parentvtc1;

    // Parent/Guardian #2 Information
    public $parentfirstname2;
    public $parentlastname2;
    public $parentemail2;
    public $parentmobileno2;
    public $parenthomeno2;
    public $parentworkno2;
    public $parentministry2 = 'Ministry of Health';
    public $parentdepartment2;
    public $parentrelationship2;
    public $parentpicture2;
    public $parentaddress2;
    public $parentvtc2;

    // Emergency Contact Information
    public $ecfirstname;
    public $eclastname;
    public $ecemail;
    public $ecmobileno;
    public $echomeno;
    public $ecworkno;
    public $ecrelationship;

    // Child Information
    public $childfirstname;
    public $childlastname;
    public $childothernames;
    public $childdob;
    public $sexofchild;
    public $schoolname;
    public $childaddress;

    // Child Medical Information
    public $doctorname;
    public $doctorno;
    public $doctoraddress;
    public $doctorvtc;
    public $allergies;
    public $medicalproblems;
    public $disabilities;
    public $bloodtype;

    public $newusername = '';

    public function render()
    {
        return view('livewire.registration-form');
    }

    public function registerParent(){
        $this->parentform = false;
        $this->childform = true;
        // dd("Hi");
        // $username = strtolower($this->parentfirstname1 . '.' . $this->parentlastname1);
        // // dd($username);

        // if(User::usernameExists($username)){
        //     $this->addError('error', 'User already exists');
        // }else{

        //     $newuser = User::create([
        //         'FirstName' => $this->parentfirstname1,
        //         'LastName' => $this->parentlastname1,
        //         'Username' => $username,
        //         'Email' => $this->parentemail1,
        //         'MobileNo' => $this->parentmobileno1,
        //         'HomeNo' => $this->parenthomeno1,
        //         'WorkNo' => $this->parentworkno1,
        //         'Ministry' => $this->parentministry1,
        //         'Department' => $this->parentdepartment1,
        //         'ChildRelationship' => $this->parentrelationship1,
        //         'PicturePath' => $this->parentpicture1,
        //         'Address' => $this->parentaddress1,
        //         'CityTown' => $this->parentvtc1,
        //         'IsParent' => true,
        //         'IsAdmin' => false
        //     ]);

        //     $this->parentform = false;
        //     $this->childform = true;
        //     $this->dispatch('show-message', message: 'Account created successfully');

        //     $this->newusername = $newuser->Username;

        // }

    }

    public function toggleMultipleParents(){
        if ($this->multipleparents){
            $this->multipleparents = false;
        }else{
            $this->multipleparents = true;
        }
    }
}
