<?php

namespace App\Livewire;

use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class StudentEditLivewire extends Component
{
    use WithFileUploads;

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

    public function mount($id){
        // dd($id);
        $this->student = Student::find($id);
        $this->id = $this->student->StudentID;
        $this->childfirstname = $this->student->FirstName;
        $this->childlastname = $this->student->LastName;
        $this->childothernames = $this->student->OtherNames;
        $this->childdob = $this->student->DOB;
        $this->sexofchild = $this->student->Sex;
        $this->schoolname = $this->student->SchoolName;
        $this->childaddress = $this->student->Address;
        // $this->childpicture = $this->student->FirstName;
        $this->childpicturepath = $this->student->PicturePath;
        // $this->immunizationpicture = $this->student->FirstName;
        $this->immunizationpicturepath = $this->student->ImmunizationPath;

        $this->doctorname = $this->student->DoctorName;
        $this->doctorphone = $this->student->DoctorPhone;
        $this->doctoraddress = $this->student->DoctorAddress;
        $this->doctorvtc = $this->student->DoctorCity;
        $this->allergies = $this->student->Allergies;
        $this->medicalproblems = $this->student->MedicalProblems;
        $this->disabilities = $this->student->Disabilities;
        $this->bloodtype = $this->student->BloodType;
        $this->additionalinfo = $this->student->AdditionalInfo;
    }

    public function render()
    {
        return view('livewire.student-edit-livewire');
    }

    public function save(){
        // dd('Save');
            $this->validate([
                'childpicture' => 'nullable|file|mimes:png,jpg,jpeg,webp|max:1024',
                'immunizationpicture' => 'nullable|file|mimes:png,jpg,jpeg,webp|max:1024',
            ]);
        
        if($this->childpicture){
            $this->childpicturepath = $this->childpicture->store('students', 'public');
        }
        
        if($this->immunizationpicture){
            $this->immunizationpicturepath = $this->immunizationpicture->store('students/immunization', 'public');
        }

        Student::where('StudentID', $this->id)->update([
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
        
        if ($this->student->parents->contains(Auth::user())){
            return redirect()->route('mychildren')->with('success', 'Student details saved successfully.');
        }else{
            return redirect()->route('admin.students.all')->with('success', 'Student details saved successfully.');
        }
    }
    
    public function deleteChildPicture(){
        $this->student->PicturePath = null;
        $this->student->save();
        Storage::delete($this->childpicturepath);

        return redirect()->route('student.edit', ['id' => $this->id])->with('success', 'Picture deleted successfully.');
    }
}
