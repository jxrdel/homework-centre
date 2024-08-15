<?php

namespace App\Livewire;

use App\Models\Complaint;
use Livewire\Attributes\Title;
use Livewire\Component;

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
    }

    public function save(){
        // dd($this->dateofcomplaint);
        Complaint::create([
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
            'ReporterEmail' => $this->reporteremail
        ]);

        return redirect()->route('admin.forms')->with('success', 'Complaint Created Successfully');
    }
}
