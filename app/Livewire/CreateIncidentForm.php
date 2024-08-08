<?php

namespace App\Livewire;

use App\Models\IncidentReport;
use Carbon\Carbon;
use Livewire\Attributes\Title;
use Livewire\Component;

class CreateIncidentForm extends Component
{
    public $reportername;
    public $jobtitle;
    public $extno;
    public $incidentlocation;
    public $timeofincident;
    public $incidentdescription;
    public $dateofreport;
    
    #[Title('Incident Report Form')] 

    public function mount(){
        $this->dateofreport = date('Y-m-d');
    }

    public function render()
    {
        return view('livewire.create-incident-form');
    }

    public function save(){
        $timeofincident = Carbon::parse($this->timeofincident);
        $timeofincident = $timeofincident->format('Y-m-d H:i:s');
        // dd($timeofincident);

        IncidentReport::create([
            'ReporterName' => $this->reportername,
            'JobTitle' => $this->jobtitle,
            'ExtNo' => $this->extno,
            'IncidentLocation' => $this->incidentlocation,
            'TimeOfIncident' => $timeofincident,
            'IncidentDescription' => $this->incidentdescription,
            'DateOfReport' => $this->dateofreport
        ]);

        return redirect()->route('admin.forms')->with('success', 'Incident Report Created Successfully');
    }
}
