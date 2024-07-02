<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class RegistrationForm extends Component
{
    use WithFileUploads;

    public $parentform = true;
    public $emergencycontactform = false;
    public $childform = false;
    public $addchild = false;
    public $registrationcomplete = false;
    public $multipleparents = false; //Displays second parent/guardian field if true
    public $termsform = false;
    public $iagree= false;

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

    //Pickup Contact Modal
    public $pickupcontacts = [];

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

        $this->validate([
            'parentpicture1' => 'nullable|file|mimes:png,jpg,pdf,jpeg|max:1024'
        ]);

        $this->parentform = false;
        $this->addchild = false;
        $this->termsform = false;
        $this->childform = false;
        $this->emergencycontactform = true;

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

    public function registerStudent(){
        $this->parentform = false;
        $this->childform = false;
        $this->termsform = false;
        $this->emergencycontactform = false;
        $this->addchild = true;

    }

    public function registerEmergencyContact(){
        $this->parentform = false;
        $this->addchild = false;
        $this->termsform = false;
        $this->emergencycontactform = false;
        $this->childform = true;

    }

    public function backBtnEmergencyContact(){
        $this->childform = false;
        $this->termsform = false;
        $this->addchild = false;
        $this->emergencycontactform = false;
        $this->parentform = true;
    }

    public function backBtnChildForm(){
        $this->childform = false;
        $this->termsform = false;
        $this->addchild = false;
        $this->parentform = false;
        $this->emergencycontactform = true;
    }

    public function addChild(){

        //Clear inputs
        $this->childfirstname = null;
        $this->childlastname = null;
        $this->childothernames = null;
        $this->childdob = null;
        $this->sexofchild = null;
        $this->schoolname = null;
        $this->childaddress = null;

        $this->doctorname = null;
        $this->doctorno = null;
        $this->doctoraddress = null;
        $this->doctorvtc = null;
        $this->allergies = null;
        $this->medicalproblems = null;
        $this->disabilities = null;
        $this->bloodtype = null;

        //display child information form
        $this->parentform = false;
        $this->addchild = false;
        $this->termsform = false;
        $this->childform = true;

    }

    public function showTerms(){
        $this->parentform = false;
        $this->addchild = false;
        $this->childform = false;
        $this->termsform = true;
    }

    public function toggleAgreeTerms(){
        if ($this->iagree){
            $this->iagree = false;
        }else{
            $this->iagree = true;
        }
    }

    public function toggleMultipleParents(){
        if ($this->multipleparents){
            $this->multipleparents = false;
        }else{
            $this->multipleparents = true;
        }
    }

    public function submitForm(){
        dd($this->iagree);
    }
}
