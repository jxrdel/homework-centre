<?php

namespace App\Livewire;

use App\Models\Student;
use Livewire\Component;

class StudentViewLivewire extends Component
{
    public $id;

    public function mount($id){
        $this->id = $id;
    }
    public function render()
    {
        
        $student = Student::find($this->id);
        
        $parents = $student->parents()->get();
        
        $pickups = null;
        foreach ($parents as $parent) {
            $pickupcontacts = $parent->pickupcontacts()->get();
            if ($pickupcontacts) {
                $pickups = $pickupcontacts;
            }
        }
        // dd($pickups);
        $emergencycontact = $student->emergencyContact();
        return view('livewire.student-view-livewire', compact('student', 'emergencycontact', 'pickups'));
    }
}
