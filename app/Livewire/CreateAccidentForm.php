<?php

namespace App\Livewire;

use App\Models\AccidentReport;
use Carbon\Carbon;
use Livewire\Attributes\Title;
use Livewire\Component;

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

    
    #[Title('Accident Report Form')] 

    public function render()
    {
        return view('livewire.create-accident-form');
    }

    public function mount(){
        $this->dateofreport = date('Y-m-d');
    }

    public function save(){
        $timeofaccident = Carbon::parse($this->timeofaccident);
        $timeofaccident = $timeofaccident->format('Y-m-d H:i:s');
        // dd($timeofaccident);

        AccidentReport::create([
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
            'DateOfReport' => $this->dateofreport
        ]);

        return redirect()->route('admin.forms')->with('success', 'Accident Report Created Successfully');
    }
}
