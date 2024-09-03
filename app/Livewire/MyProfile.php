<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class MyProfile extends Component
{
    use WithFileUploads;

    public $user;
    public $firstname;
    public $lastname;
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

    public function render()
    {
        return view('livewire.my-profile');
    }

    public function mount(){
        $this->user = User::find(Auth::user()->id);
        $this->firstname = $this->user->FirstName;
        $this->lastname = $this->user->LastName;
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
    }

    public function save(){
        if($this->picture){
            $this->validate([
                'picture' => 'nullable|file|mimes:png,jpg,jpeg,webp|max:1024',
            ]);

            $filename = $this->firstname . $this->lastname . '-' . $this->picture->getClientOriginalName();
            $this->picture->storeAs('public/parents', $filename);
            // $this->filepath = 'uploads/students/' . $filename;
            $this->picturepath = 'public/parents/' . $filename;
        }

        User::where('id', Auth::user()->id)->update([
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
        ]);

        return redirect()->route('myprofile')->with('success', 'Profile details saved successfully.');
    }

    public function deletePicture(){
        $this->user->PicturePath = null;
        $this->user->save();
        Storage::delete($this->picturepath);

        return redirect()->route('myprofile')->with('success', 'Picture deleted successfully.');
    }
}
