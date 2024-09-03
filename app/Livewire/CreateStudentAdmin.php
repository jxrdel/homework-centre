<?php

namespace App\Livewire;

use App\Models\Student;
use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateStudentAdmin extends Component
{
    use WithFileUploads;

    public $parent;
    public $id;
    public $student;
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

    public $parents;

    #[Title('Create Student')] 

    public function mount(){
        $this->parents = User::where('IsParent', true)->get();
    }

    public function render()
    {
        return view('livewire.create-student-admin');
    }

    public function save(){
        
        $this->validate([
            'childpicture' => 'required|image|mimes:png,jpg,jpeg,webp|max:1024',
            'immunizationpicture' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:1024',
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

        if($this->childpicture){
            $this->childpicturepath = $this->childpicture->store('students', 'public');
        }
        
        if($this->immunizationpicture){
            $this->immunizationpicturepath = $this->immunizationpicture->store('students/immunization', 'public');
        }
        
        $newStudent = Student::create([
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
        ]);
        
        $this->parent->students()->attach($newStudent->StudentID);
        return redirect()->route('admin.students.all')->with('success', 'Student created successfully.');
    }

    public function setParent($id){
        $this->parent = User::find($id);
    }
}
