<?php

namespace App\Livewire;

use App\Models\Appointment;
use App\Models\WaitingList;
use Livewire\Attributes\On;
use Livewire\Component;

class JoinWaitingList extends Component
{
    public $children;
    public $timeslot;
    public $student;

    public function mount(){
        $this->children = auth()->user()->students;
    }

    #[On('show-waiting-list-modal')]
    public function displayModal($id)
    {
        $this->timeslot = $id;
        $this->dispatch('display-waiting-list-modal');
    }

    public function render()
    {
        return view('livewire.join-waiting-list');
    }

    
    public function canJoinWaitingList(){
        if(Appointment::isDuplicate($this->student, $this->timeslot)){
            $this->addError('student', 'This student is already registered for this class');
            return false;
        }else if(WaitingList::isDuplicate($this->student, $this->timeslot)){
            $this->addError('student', 'This student is already on the waiting list for this class');
            return false;
        }

        return true;
    }

    public function joinWaitingList(){
        if($this->canJoinWaitingList()){
            // dd($this->student);
            WaitingList::create([
                'TimeSlotID' => $this->timeslot,
                'StudentID' => $this->student,
            ]);

            $this->dispatch('close-waiting-list-modal');
            $this->timeslot = null;
            $this->student = null;
            $this->resetValidation();
            $this->dispatch('show-message', message: 'Student added to waiting list successfully');
        }
    }
}
