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
use Livewire\WithFileUploads;

class CreateAccidentForm extends Component
{
    use WithFileUploads;
    public $childname;
    public $childage;
    public $accidentlocation;
    public $timeofaccident;
    public $accidentdescription;
    public $injurydescription;
    public $medicalreport;
    public $medicalreportpath;
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
        $this->reportername = auth()->user()->FirstName . ' ' . auth()->user()->LastName;
    }

    public function save(){
        $this->validate([
            'medicalreport' => 'nullable|file|mimes:pdf,png,jpg,jpeg,webp|max:10024',
        ]);


        if ($this->medicalreport) {
            $this->medicalreportpath = $this->medicalreport->store('medical_reports', 'public');
        }

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
            'MedicalReport' => $this->medicalreportpath,
            'RemedialActions' => $this->remedialactions,
            'ParentNotified' => $this->parentnotified,
            'ReporterName' => $this->reportername,
            'JobTitle' => $this->jobtitle,
            'DateOfReport' => $this->dateofreport,
            'ReportPath' => 'accident_reports/' . $filename,
        ]);

        $recipients = [ 'ayana.john@health.gov.tt', 
                        'mansoor.hosein@health.gov.tt', 
                        'shamila.ramdhan@health.gov.tt',
                        'jardel.regis@health.gov.tt',
                        'maurisa.pierre@health.gov.tt',
                        'kia.boldan@health.gov.tt',
                        'kizzy.villaroel@health.gov.tt',
                        'patti-ann.williams@health.gov.tt',
                        'ortinique.cumberbatch@health.gov.tt',
                        'varma.maharaj@health.gov.tt'
                    ];

        $pdf = Pdf::loadView('PDF.accident', compact('accident'))->save(public_path('storage/accident_reports/' . $filename));
        Mail::to('ohu@health.gov.tt')->cc($recipients)->queue(new AccidentEmail($accident));

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
