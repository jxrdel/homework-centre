<?php

namespace App\Livewire;

use App\Mail\AccidentEmail;
use App\Models\AccidentReport;
use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Support\Str;

class CreateAccidentForm extends Component
{
    public $childname;
    public $childage;
    public $accidentlocation;
    public $timeofaccident;
    public $accidentdescription;
    public $injurydescription;
    public $medicalreport;
    public $remedialactions;
    public $parentnotified;
    public $reportername;
    public $jobtitle;
    public $dateofreport;

    public $students;

    
    #[Title('Accident Report Form')] 

    public function render()
    {
        return view('livewire.create-accident-form');
    }

    public function mount(){
        $this->dateofreport = date('Y-m-d');
        $this->students = Student::all();
    }

    public function save(){
        $timeofaccident = Carbon::parse($this->timeofaccident);
        $timeofaccident = $timeofaccident->format('Y-m-d H:i:s');
        // dd($timeofaccident);
        $filename = (string) Str::uuid() . '.pdf'; //Generate unique filename for PDF

        $accident = AccidentReport::create([
            'ChildName' => $this->childname,
            'ChildAge' => $this->childage,
            'AccidentLocation' => $this->accidentlocation,
            'TimeOfAccident' => $timeofaccident,
            'AccidentDescription' => $this->accidentdescription,
            'InjuryDescription' => $this->injurydescription,
            'MedicalReport' => $this->medicalreport,
            'RemedialActions' => $this->remedialactions,
            'ParentNotified' => $this->parentnotified,
            'ReporterName' => $this->reportername,
            'JobTitle' => $this->jobtitle,
            'DateOfReport' => $this->dateofreport,
            'ReportPath' => 'accident_reports/' . $filename,
        ]);

        $pdf = Pdf::loadView('PDF.accident', compact('accident'))->save(public_path('storage/accident_reports/' . $filename));
        Mail::to('jardel.regis@health.gov.tt')->queue(new AccidentEmail($accident));

        return redirect()->route('admin.forms')->with('success', 'Accident Report Created Successfully');
    }

    public function setStudent($id){

        if($id == ''){
            $this->childname = null;
            $this->childage = null;
            return;
        }
        $student = Student::find($id);
        $this->childname = $student->FirstName . ' ' . $student->LastName;
        $this->childage = Carbon::parse($student->DOB)->age;
    }
}
