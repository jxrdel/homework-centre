<?php

namespace App\Livewire;

use App\Models\EmergencyContact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class MyEmergencyContact extends Component
{
    use WithFileUploads;

    public $emergencycontact;
    public $emergencycontactid;
    public $ecfirstname;
    public $eclastname;
    public $ecemail;
    public $ecmobileno;
    public $echomeno;
    public $ecworkno;
    public $ecrelationship;
    public $ecpicture;
    public $ecpicturepath;

    public function render()
    {
        return view('livewire.my-emergency-contact');
    }

    public function mount(){
        $this->emergencycontact = EmergencyContact::find(Auth::user()->EmergencyContactID);

        $this->emergencycontactid = $this->emergencycontact->EmergencyContactID;
        $this->ecfirstname = $this->emergencycontact->FirstName;
        $this->eclastname = $this->emergencycontact->LastName;
        $this->ecemail = $this->emergencycontact->Email;
        $this->ecmobileno = $this->emergencycontact->MobileNo;
        $this->echomeno = $this->emergencycontact->HomeNo;
        $this->ecworkno = $this->emergencycontact->WorkNo;
        $this->ecrelationship = $this->emergencycontact->ChildRelationship;
        $this->ecpicture = null;
        $this->ecpicturepath = $this->emergencycontact->PicturePath;
    }

    public function save(){
        // dd($this->echomeno);

        if($this->ecpicture){
            $this->validate([
                'ecpicture' => 'nullable|file|mimes:png,jpg,pdf,jpeg,webp|max:1024',
            ]);
            
            $filename = $this->ecfirstname . $this->eclastname . '-' . $this->ecpicture->getClientOriginalName();
            $this->ecpicture->storeAs('public/emergency_contacts', $filename);
            // $this->filepath = 'uploads/students/' . $filename;
            $this->ecpicturepath = 'public/emergency_contacts/' . $filename;
        }

        EmergencyContact::where('EmergencyContactID', $this->emergencycontactid)->update([ //Add parent 2 to database
            'FirstName' => $this->ecfirstname,
            'LastName' => $this->eclastname,
            'Email' => $this->ecemail,
            'MobileNo' => $this->ecmobileno,
            'HomeNo' => $this->echomeno,
            'WorkNo' => $this->ecworkno,
            'ChildRelationship' => $this->ecrelationship,
            'PicturePath' => $this->ecpicturepath,
        ]);

        return redirect()->route('emergencycontact')->with('success', 'Emergency Contact saved successfully.');
    }

    public function deletePicture(){
        $this->emergencycontact->PicturePath = null;
        $this->emergencycontact->save();
        Storage::delete($this->ecpicturepath);

        return redirect()->route('emergencycontact')->with('success', 'Picture deleted successfully.');
    }
}
