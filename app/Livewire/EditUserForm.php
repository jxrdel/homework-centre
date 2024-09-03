<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use Livewire\WithFileUploads;

class EditUserForm extends Component
{
    use WithFileUploads;

    public $user;
    public $firstname;
    public $lastname;
    public $username;
    public $email;
    public $mobileno;
    public $homeno;
    public $workno;
    public $ministry;
    public $department;
    public $relationship;
    public $picture;
    public $picturepath;
    public $address;
    public $vtc;
    public $hasWindowsLogin;
    public $mediarelease;
    public $emergencyconsent;
    public $isadmin;

    public function render()
    {
        return view('livewire.edit-user-form');
    }

    public function mount($id){
        $this->user = User::find($id);
        $this->firstname = $this->user->FirstName;
        $this->lastname = $this->user->LastName;
        $this->username = $this->user->Username;
        $this->email = $this->user->Email;
        $this->mobileno = $this->user->MobileNo;
        $this->homeno = $this->user->HomeNo;
        $this->workno = $this->user->WorkNo;
        $this->ministry = $this->user->Ministry;
        $this->department = $this->user->Department;
        $this->relationship = $this->user->ChildRelationship;
        $this->picturepath = $this->user->PicturePath;
        $this->address = $this->user->Address;
        $this->vtc = $this->user->CityTown;
        $this->hasWindowsLogin = $this->user->HasWindowsLogin;
        $this->mediarelease = $this->user->MediaReleaseConsent;
        $this->emergencyconsent = $this->user->EmergencyConsent;
        $this->isadmin = $this->user->IsAdmin;
    }

    public function save(){
        if($this->picture){
            $this->validate([
                'picture' => 'nullable|file|mimes:png,jpg,jpeg,webp|max:1024',
            ]);

            $this->picturepath = $this->picture->store('parents', 'public');
        }

        $this->validate([
            'username' => 'required|unique:users,Username,' . $this->user->id,
        ]);

        User::where('id', $this->user->id)->update([
            'Username' => $this->username,
            'FirstName' => $this->firstname,
            'LastName' => $this->lastname,
            'Email' => $this->email,
            'MobileNo' => $this->mobileno,
            'HomeNo' => $this->homeno,
            'WorkNo' => $this->workno,
            'Ministry' => $this->ministry,
            'Department' => $this->department,
            'ChildRelationship' => $this->relationship,
            'PicturePath' => $this->picturepath,
            'Address' => $this->address,
            'CityTown' => $this->vtc,
            'MediaReleaseConsent' => $this->mediarelease,
            'EmergencyConsent' => $this->emergencyconsent,
            'IsAdmin' => $this->isadmin,
            'HasWindowsLogin' => $this->hasWindowsLogin,
        ]);

        return redirect()->route('admin.parents.all')->with('success', 'Parent details saved successfully.');
    }

    public function deletePicture(){
        $this->user->PicturePath = null;
        $this->user->save();
        Storage::delete($this->picturepath);
        $this->picturepath = null;

        $this->dispatch('show-message', message: 'Picture deleted successfully');
    }
}
