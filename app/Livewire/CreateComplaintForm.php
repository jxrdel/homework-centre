<?php

namespace App\Livewire;

use App\Mail\ComplaintEmail;
use App\Models\Complaint;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Support\Str;

class CreateComplaintForm extends Component
{
    public $dateofcomplaint;
    public $voscrep;
    public $facilitiesmanager;
    public $hsrep;
    public $complainttype;
    public $complaintlocation;
    public $complaintdetails;
    public $additionalinfo;
    public $voscrepdatereferred;
    public $facilitiesmanagerdatereferred;
    public $hsrepdatereferred;
    public $reportername;
    public $reportertelno;
    public $reporterext;
    public $reporteremail;
    
    #[Title('Complaint Form')] 

    public function render()
    {
        return view('livewire.create-complaint-form');
    }

    public function mount(){
        $this->dateofcomplaint = date('Y-m-d');
        $this->reportername = auth()->user()->FirstName . ' ' . auth()->user()->LastName;
        $this->reporteremail = auth()->user()->Email;
        $this->reportertelno = auth()->user()->MobileNo;
        $this->reporterext = auth()->user()->Extension;
    }

    public function save(){
        // dd($this->dateofcomplaint);
        
        $filename = (string) Str::uuid() . '.pdf'; //Generate unique filename for PDF

        $complaint = Complaint::create([
            'DateOfComplaint' => $this->dateofcomplaint,
            'VOSCREP' => $this->voscrep,
            'FacilitiesManager' => $this->facilitiesmanager,
            'HSRep' => $this->hsrep,
            'ComplaintType' => $this->complainttype,
            'ComplaintLocation' => $this->complaintlocation,
            'ComplaintDetails' => $this->complaintdetails,
            'AdditionalInfo' => $this->additionalinfo,
            'VOSCRepDateReferred' => $this->voscrepdatereferred,
            'FacilitiesManagerDateReferred' => $this->facilitiesmanagerdatereferred,
            'HSRepDateReferred' => $this->hsrepdatereferred,
            'ReporterName' => $this->reportername,
            'ReporterTelNo' => $this->reportertelno,
            'ReporterExt' => $this->reporterext,
            'ReporterEmail' => $this->reporteremail,
            'ComplaintPath' => 'complaints/' . $filename,
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

        $pdf = Pdf::loadView('PDF.complaint', compact('complaint'))->save(public_path('storage/complaints/' . $filename));
        Mail::to('ohu@health.gov.tt')->cc($recipients)->queue(new ComplaintEmail($complaint));

        return redirect()->route('/')->with('success', 'Complaint created successfully. An email has been sent to the relevant parties.');
    }

}
