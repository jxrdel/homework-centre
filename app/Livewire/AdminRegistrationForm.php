<?php

namespace App\Livewire;

use App\Mail\RegistrationSuccessful;
use App\Models\EmergencyContact;
use App\Models\PickupContact;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class AdminRegistrationForm extends Component
{
    use WithFileUploads;

    public $parentform = true;
    public $emergencycontactform = false;
    public $childform = false;
    public $addchild = false;
    public $registrationcomplete = false;
    public $multipleparents = false; //Displays second parent/guardian field if true
    public $termsform = false;

    // Parent/Guardian #1 Information
    public $hasWindowsLogin;
    public $parent1;
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
    public $parentpicturepath1;
    public $parentaddress1;
    public $parentvtc1;
    public $jobletter;
    public $jobletterpath;

    // Parent/Guardian #2 Information
    public $parent2;
    public $parentfirstname2;
    public $parentlastname2;
    public $parentemail2;
    public $parentmobileno2;
    public $parenthomeno2;
    public $parentworkno2;
    public $parentministry2;
    public $parentdepartment2;
    public $parentrelationship2;
    public $parentpicture2;
    public $parentpicturepath2;
    public $parentaddress2;
    public $parentvtc2;

    // Emergency Contact Information
    public $emergencycontact;
    public $ecfirstname;
    public $eclastname;
    public $ecemail;
    public $ecmobileno;
    public $echomeno;
    public $ecworkno;
    public $ecrelationship;
    public $ecpicture;
    public $ecpicturepath;

    //Pickup Contact Modal
    public $pickupfirstname;
    public $pickuplastname;
    public $pickupemail;
    public $pickupmobileno;
    public $pickuphomeno;
    public $pickupworkno;
    public $pickupaddress;
    public $pickuppicture;
    public $pickuppicturepath;
    public $pickupcontacts = [];

    // Child Information
    public $children = [];
    public $childfirstname;
    public $childlastname;
    public $childothernames;
    public $childdob;
    public $sexofchild;
    public $schoolname;
    public $childaddress;
    public $childpicture;
    public $childpicturepath;
    public $immunizationpicture;
    public $immunizationpicturepath;

    // Child Medical Information
    public $doctorname;
    public $doctorphone;
    public $doctoraddress;
    public $doctorvtc;
    public $allergies;
    public $medicalproblems;
    public $disabilities;
    public $bloodtype;
    public $additionalinfo;

    //Terms & Conditions

    public $iagree= false;
    public $mediarelease = null;
    public $emergencyconsent = null;


    public $newusername = '';


    public function render()
    {
        return view('livewire.admin-registration-form');
    }

    public function finalRegistration(){
        // dd($this->children);

        if ($this->ecpicture) {
            // $filename = $this->ecfirstname . $this->eclastname . '-' . $this->ecpicture->getClientOriginalName();
            // $this->ecpicture->storeAs('public/emergency_contacts', $filename);
            // // $this->filepath = 'uploads/students/' . $filename;
            // $this->ecpicturepath = 'public/emergency_contacts/' . $filename;
            $this->ecpicturepath = $this->ecpicture->store('emergency_contacts', 'public');
        }

        $this->emergencycontact = EmergencyContact::create([ //Add parent 2 to database
            'FirstName' => $this->ecfirstname,
            'LastName' => $this->eclastname,
            'Email' => $this->ecemail,
            'MobileNo' => $this->ecmobileno,
            'HomeNo' => $this->echomeno,
            'WorkNo' => $this->ecworkno,
            'ChildRelationship' => $this->ecrelationship,
            'PicturePath' => $this->ecpicturepath,
        ]);

        $username = User::generateUniqueUsername($this->parentfirstname1, $this->parentlastname1); //Generates a unique username
        // dd($username);

        if ($this->parentpicture1) {
            $this->parentpicturepath1 = $this->parentpicture1->store('parents', 'public');
        }

        if ($this->jobletter) {
            $this->jobletterpath = $this->jobletter->store('parents/jobletters', 'public');
        }

        $this->parent1 = User::create([ //Add parent 1 to database
            'FirstName' => $this->parentfirstname1,
            'LastName' => $this->parentlastname1,
            'Username' => $username,
            'Email' => $this->parentemail1,
            'MobileNo' => $this->parentmobileno1,
            'HomeNo' => $this->parenthomeno1,
            'WorkNo' => $this->parentworkno1,
            'Ministry' => $this->parentministry1,
            'Department' => $this->parentdepartment1,
            'ChildRelationship' => $this->parentrelationship1,
            'PicturePath' => $this->parentpicturepath1,
            'JobLetterPath' => $this->jobletterpath,
            'Address' => $this->parentaddress1,
            'CityTown' => $this->parentvtc1,
            'MediaReleaseConsent' => $this->mediarelease,
            'EmergencyConsent' => $this->emergencyconsent,
            'EmergencyContactID' => $this->emergencycontact->EmergencyContactID,
            'IsParent' => true,
            'IsAdmin' => false,
            'HasWindowsLogin' => $this->hasWindowsLogin == 'true' ? true : false,
            'RegisteredBy' => Auth::user()->Username,
        ]);

        if($this->multipleparents){

        if ($this->parentpicture2) {
            // $filename = $this->parentfirstname2 . $this->parentlastname2 . '-' . $this->parentpicture2->getClientOriginalName();
            // $this->parentpicture2->storeAs('public/parents', $filename);
            // // $this->filepath = 'uploads/students/' . $filename;
            // $this->parentpicturepath2 = 'public/parents/' . $filename;
            $this->parentpicturepath2 = $this->parentpicture2->store('parents', 'public');
        }

            $username2 = User::generateUniqueUsername($this->parentfirstname2, $this->parentlastname2);

            $this->parent2 = User::create([ //Add parent 2 to database
                'FirstName' => $this->parentfirstname2,
                'LastName' => $this->parentlastname2,
                'Username' => $username2,
                'Email' => $this->parentemail2,
                'MobileNo' => $this->parentmobileno2,
                'HomeNo' => $this->parenthomeno2,
                'WorkNo' => $this->parentworkno2,
                'Ministry' => $this->parentministry2,
                'Department' => $this->parentdepartment2,
                'ChildRelationship' => $this->parentrelationship2,
                'PicturePath' => $this->parentpicturepath2,
                'Address' => $this->parentaddress2,
                'CityTown' => $this->parentvtc2,
                'MediaReleaseConsent' => $this->mediarelease,
                'EmergencyConsent' => $this->emergencyconsent,
                'EmergencyContactID' => $this->emergencycontact->EmergencyContactID,
                'IsParent' => true,
                'IsAdmin' => false,
                'HasWindowsLogin' => false,
                'RegisteredBy' => Auth::user()->Username,
            ]);
        }


        if(!empty($this->pickupcontacts)){
            foreach ($this->pickupcontacts as $contact){ //Save pickup contacts and attach them to parents
                $newpath = null;
                if($contact['PicturePath']){
                    $tempfile = 'public/' . $contact['PicturePath']; //Get path of temporary picture
                    $extension = pathinfo($tempfile, PATHINFO_EXTENSION); //Get extension of file
                    $uniqueFilename = (string) Str::uuid() . '.' . $extension; //Generate unique file name
                    $newpath = 'public/pickup_contacts/' . $uniqueFilename; //New path for picture
    
                    Storage::move($tempfile, $newpath);
                }

                $pickupcontact = PickupContact::create([ //Add parent 2 to database
                    'FirstName' => $contact['FirstName'],
                    'LastName' => $contact['LastName'],
                    'Email' => $contact['Email'],
                    'MobileNo' => $contact['MobileNo'],
                    'HomeNo' => $contact['HomeNo'],
                    'WorkNo' => $contact['WorkNo'],
                    'Address' => $contact['Address'],
                    'PicturePath' => $newpath,
                ]);

                $this->parent1->pickupcontacts()->attach($pickupcontact->PickupContactID); //Attach pickup contacts to parent 1

                if($this->multipleparents){
                    $this->parent2->pickupcontacts()->attach($pickupcontact->PickupContactID); //Attach pickup contacts to parent 1
                }
            }
        }

        foreach ($this->children as $child){

            $newpicturepath = null;
            $newimmunizationpath = null;
            
            if($child['PicturePath']){
                $tempfile = 'public/' . $child['PicturePath']; //Get path of temporary picture
                $extension = pathinfo($tempfile, PATHINFO_EXTENSION); //Get extension of file
                $uniqueFilename = (string) Str::uuid() . '.' . $extension; //Generate unique file name
                $newpicturepath = 'public/students/' . $uniqueFilename; //New path for picture
                Storage::move($tempfile, $newpicturepath);
            }

            if($child['ImmunizationPath']){
                $tempimmunization = 'public/' . $child['ImmunizationPath']; //Get path of temporary picture
                $extension = pathinfo($tempimmunization, PATHINFO_EXTENSION); //Get extension of file
                $uniqueFilename = (string) Str::uuid() . '.' . $extension; //Generate unique file name
                $newimmunizationpath = 'public/students/immunization/' . $uniqueFilename; //New path for picture
                Storage::move($tempimmunization, $newimmunizationpath);
            }


            $newchild = Student::create([
                'FirstName' => $child['FirstName'],
                'LastName' => $child['LastName'],
                'OtherNames' => $child['OtherNames'],
                'DOB' => $child['DOB'],
                'Sex' => $child['Sex'],
                'SchoolName' => $child['SchoolName'],
                'Address' => $child['Address'],
                'PicturePath' => $newpicturepath,
                // Medical Info
                'DoctorName' => $child['DoctorName'],
                'DoctorPhone' => $child['DoctorPhone'],
                'DoctorAddress' => $child['DoctorAddress'],
                'DoctorCity' => $child['DoctorCity'],
                'Allergies' => $child['Allergies'],
                'MedicalProblems' => $child['MedicalProblems'],
                'Disabilities' => $child['Disabilities'],
                'BloodType' => $child['BloodType'],
                'AdditionalInfo' => $child['AdditionalInfo'],
                'ImmunizationPath' => $newimmunizationpath,
            ]);

            $this->parent1->students()->attach($newchild->StudentID);

            if ($this->multipleparents){
                $this->parent2->students()->attach($newchild->StudentID);
            }
        }

            $this->newusername = $this->parent1->Username;
            $this->parentform = false;
            $this->addchild = false;
            $this->termsform = false;
            $this->childform = false;
            $this->emergencycontactform = false;
            $this->registrationcomplete = true;
            
            Mail::to($this->parent1->Email)->send(new RegistrationSuccessful($this->parent1));
            $this->dispatch('show-message', message: 'Account created successfully');

    }

    public function validateParent(){

        $this->validate([
            'parentpicture1' => 'nullable|file|mimes:png,jpg,jpeg,webp|max:3024',
            'parentpicture2' => 'nullable|file|mimes:png,jpg,jpeg,webp|max:3024'
        ]);

        $this->parentform = false;
        $this->addchild = false;
        $this->termsform = false;
        $this->emergencycontactform = false;
        $this->childform = true;
    }

    public function validateStudent(){

        $this->validate([
            'childpicture' => 'nullable|file|mimes:png,jpg,jpeg,webp|max:3024',
            'immunizationpicture' => 'nullable|file|mimes:pdf,png,jpg,jpeg,webp|max:3024',
            'childdob' => [
                'required',
                'before:today',
                function ($attribute, $value, $fail) {
                    $age = \Carbon\Carbon::parse($value)->age;
                    if ($age < 3 || $age > 17) {
                        $fail('The child must be between 3 and 17 years old.');
                        $this->dispatch('scroll-to-top');
                    }
                }
            ]
        ]);

        if ($this->childpicture) {
            $this->childpicturepath = $this->childpicture->store('temp', 'public');
        }

        if ($this->immunizationpicture) {
            $this->immunizationpicturepath = $this->immunizationpicture->store('temp', 'public');
        }

        $this->children [] = [
            'FirstName' => $this->childfirstname,
            'LastName' => $this->childlastname,
            'OtherNames' => $this->childothernames,
            'DOB' => $this->childdob,
            'Sex' => $this->sexofchild,
            'SchoolName' => $this->schoolname,
            'Address' => $this->childaddress,
            'PicturePath' => $this->childpicturepath,
            // Medical Info
            'DoctorName' => $this->doctorname,
            'DoctorPhone' => $this->doctorphone,
            'DoctorAddress' => $this->doctoraddress,
            'DoctorCity' => $this->doctorvtc,
            'Allergies' => $this->allergies,
            'MedicalProblems' => $this->medicalproblems,
            'Disabilities' => $this->disabilities,
            'BloodType' => $this->bloodtype,
            'AdditionalInfo' => $this->additionalinfo,
            'ImmunizationPath' => $this->immunizationpicturepath,
        ];
        // dd($this->children);
        $this->parentform = false;
        $this->childform = false;
        $this->termsform = false;
        $this->emergencycontactform = false;
        $this->addchild = true;

    }

    public function backBtnChildForm(){
        $this->childform = false;
        $this->termsform = false;
        $this->addchild = false;
        $this->emergencycontactform = false;
        $this->parentform = true;
    }

    public function validateEmergencyContact(){

        $this->validate([
            'ecpicture' => 'nullable|file|mimes:png,jpg,jpeg,webp|max:3024',
        ]);

        $this->parentform = false;
        $this->addchild = false;
        $this->emergencycontactform = false;
        $this->childform = false;
        $this->termsform = true;

    }

    public function createPickup(){
        // dd($this->pickupfirstname);

        if ($this->pickuppicture) {
            $this->pickuppicturepath = $this->pickuppicture->store('temp', 'public');
        }

        // dd($this->pickuppicturepath);

        $this->pickupcontacts [] = [
            'FirstName' => $this->pickupfirstname,
            'LastName' => $this->pickuplastname,
            'Email' => $this->pickupemail,
            'MobileNo' => $this->pickupmobileno,
            'HomeNo' => $this->pickuphomeno,
            'WorkNo' => $this->pickupworkno,
            'Address' => $this->pickupaddress,
            'PicturePath' => $this->pickuppicturepath,
        ];

        $this->pickupfirstname = null;
        $this->pickuplastname = null;
        $this->pickupemail = null;
        $this->pickupmobileno = null;
        $this->pickuphomeno = null;
        $this->pickupworkno = null;
        $this->pickupaddress = null;

        $this->dispatch('close-pickup-modal');
    }

    public function removePickupContact($index){

        Storage::delete('public/'.$this->pickupcontacts[$index]['PicturePath']);
        unset($this->pickupcontacts[$index]);

    }


    public function backBtnEmergencyContact(){
        $this->childform = false;
        $this->termsform = false;
        $this->emergencycontactform = false;
        $this->parentform = false;
        $this->addchild = true;
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
        $this->doctorphone = null;
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
        $this->emergencycontactform = false;
        $this->childform = true;

    }

    public function addChildNext(){
        $this->parentform = false;
        $this->addchild = false;
        $this->childform = false;
        $this->termsform = false;
        $this->emergencycontactform = true;
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
}
