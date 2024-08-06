<?php

namespace App\Livewire;

use App\Models\PickupContact;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditPickupContactModal extends Component
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
    public $recordToDelete;

    public function render()
    {
        return view('livewire.edit-pickup-contact-modal');
    }

    #[On('show-edit-modal')]
    public function displayModal($id)
    {
        $this->contact = PickupContact::find($id);
        $this->id = $id;
        $this->firstname = $this->contact->FirstName;
        $this->lastname = $this->contact->LastName;
        $this->email = $this->contact->Email;
        $this->mobileno = $this->contact->MobileNo;
        $this->homeno = $this->contact->HomeNo;
        $this->workno = $this->contact->WorkNo;
        $this->address = $this->contact->Address;
        $this->picturepath = $this->contact->PicturePath;
        $this->dispatch('display-edit-modal');
    }

    public function editPickup(){

        if($this->picture){
            $this->validate([
                'picture' => 'nullable|file|mimes:png,jpg,jpeg,webp|max:1024',
            ]);
            $this->picturepath = $this->picture->store('pickup_contacts', 'public');
        }

        PickupContact::where('PickupContactID', $this->id)->update([ //Add parent 2 to database
            'FirstName' => $this->firstname,
            'LastName' => $this->lastname,
            'Email' => $this->email,
            'MobileNo' => $this->mobileno,
            'HomeNo' => $this->homeno,
            'WorkNo' => $this->workno,
            'Address' => $this->address,
            'PicturePath' => $this->picturepath,
        ]);

        $this->dispatch('close-edit-modal');
        $this->dispatch('refresh-table');
        $this->dispatch('show-message', message: 'Pickup Contact edited successfully');
    }

    public function deletePicture(){
        $this->contact->PicturePath = null;
        $this->contact->save();
        Storage::delete($this->picturepath);

        $this->dispatch('close-edit-modal');
        $this->dispatch('show-message', message: 'Picture deleted successfully');
    }
    

    #[On('show-delete-modal')]
    public function displayEditModal($id)
    {
        $this->recordToDelete = PickupContact::find($id);
        $this->dispatch('display-delete-modal');
    }

    public function deleteRecord(){
        // dd($this->recordToDelete);
        if($this->recordToDelete->PicturePath){
            Storage::delete($this->recordToDelete->PicturePath);
        }
        $this->recordToDelete->delete();
        $this->dispatch('show-message', message: 'Pickup Contact deleted successfully');
        $this->dispatch('refresh-table');
        $this->dispatch('render-create-modal');
        $this->dispatch('close-delete-modal');
    }
}
