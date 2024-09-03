<?php

namespace App\Livewire;

use App\Mail\IncidentEmail;
use App\Models\IncidentReport;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Support\Str;

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
        $this->reportername = auth()->user()->FirstName . ' ' . auth()->user()->LastName;
    }

    public function render()
    {
        return view('livewire.create-incident-form');
    }

    public function save(){
        $timeofincident = Carbon::parse($this->timeofincident);
        $timeofincident = $timeofincident->format('Y-m-d H:i:s');
        // dd($timeofincident);
        $filename = (string) Str::uuid() . '.pdf'; //Generate unique filename for PDF

        $incident = IncidentReport::create([
            'ReporterName' => $this->reportername,
            'JobTitle' => $this->jobtitle,
            'ExtNo' => $this->extno,
            'IncidentLocation' => $this->incidentlocation,
            'TimeOfIncident' => $timeofincident,
            'IncidentDescription' => $this->incidentdescription,
            'DateOfReport' => $this->dateofreport,
            'ReportPath' => 'incident_reports/' . $filename,
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

        $pdf = Pdf::loadView('PDF.incident', compact('incident'))->save(public_path('storage/incident_reports/' . $filename));
        Mail::to('ohu@health.gov.tt')->cc($recipients)->queue(new IncidentEmail($incident));



        return redirect()->route('admin.forms')->with('success', 'Incident Report Created Successfully');
    }
}
