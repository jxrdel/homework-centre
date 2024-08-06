<?php

namespace App\Livewire;

use App\Models\PickupContact;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePickupContactModal extends Component
{
    use WithFileUploads;

    public $id;
    public $contact;
    public $firstname;
    public $lastname;
    public $email;
    public $mobileno;
    public $homeno;
    public $workno;
    public $address;
    public $picturepath;
    public $picture;
    public $pickupcount;

    #[On('render-create-modal')]
    public function render()
    {
        $user = Auth::user();
        $this->pickupcount = $user->pickupcontacts()->count();
        return view('livewire.create-pickup-contact-modal');
    }

    public function save(){

        if($this->picture){
            $this->validate([
                'picture' => 'required|file|mimes:png,jpg,jpeg,webp|max:1024',
            ]);
            $this->picturepath = $this->picture->store('pickup_contacts', 'public');
        }
        
        $newrecord = PickupContact::create([ //Add parent 2 to database
            'FirstName' => $this->firstname,
            'LastName' => $this->lastname,
            'Email' => $this->email,
            'MobileNo' => $this->mobileno,
            'HomeNo' => $this->homeno,
            'WorkNo' => $this->workno,
            'Address' => $this->address,
            'PicturePath' => $this->picturepath,
        ]);

        $this->id = null;
        $this->contact = null;
        $this->firstname = null;
        $this->lastname = null;
        $this->email = null;
        $this->mobileno = null;
        $this->homeno = null;
        $this->workno = null;
        $this->address = null;
        $this->picturepath = null;
        $this->picture = null;

        $user = Auth::user();
        $user->pickupcontacts()->attach($newrecord->PickupContactID);
        $this->dispatch('close-create-modal');
        $this->dispatch('refresh-table');
        $this->dispatch('show-message', message: 'Pickup Contact edited successfully');
    }
}
