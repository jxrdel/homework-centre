<?php

namespace App\Livewire;

use App\Models\Student;
use Livewire\Component;

class StudentEditLivewire extends Component
{
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

    public function mount($id){
        $student = Student::find($id);
        $this->childfirstname = $student->FirstName;
        $this->childlastname = $student->LastName;
        $this->childothernames = $student->OtherNames;
        $this->childdob = $student->DOB;
        $this->sexofchild = $student->Sex;
        $this->schoolname = $student->SchoolName;
        $this->childaddress = $student->Address;
        // $this->childpicture = $student->FirstName;
        $this->childpicturepath = $student->PicturePath;
        // $this->immunizationpicture = $student->FirstName;
        $this->immunizationpicturepath = $student->ImmunizationPath;

        $this->doctorname = $student->DoctorName;
        $this->doctorphone = $student->DoctorPhone;
        $this->doctoraddress = $student->DoctorAddress;
        $this->doctorvtc = $student->DoctorCity;
        $this->allergies = $student->Allergies;
        $this->medicalproblems = $student->MedicalProblems;
        $this->disabilities = $student->Disabilities;
        $this->bloodtype = $student->BloodType;
        $this->additionalinfo = $student->AdditionalInfo;
    }

    public function render()
    {
        return view('livewire.student-edit-livewire');
    }
}
