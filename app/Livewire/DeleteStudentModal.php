<?php

namespace App\Livewire;

use App\Models\Student;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;

class DeleteStudentModal extends Component
{
    public $student;

    public function render()
    {
        return view('livewire.delete-student-modal');
    }
    
    #[On('show-delete-modal')]
    public function displayModal($id){
        $this->student = Student::find($id);
        $this->dispatch('display-delete-modal');
    }

    public function deleteRecord(){
        if($this->student->PicturePath){
            Storage::delete($this->student->PicturePath);
        }
        
        if($this->student->ImmunizationPath){
            Storage::delete($this->student->ImmunizationPath);
        }

        $this->student->delete();
        $this->dispatch('show-message', message: 'Student deleted successfully');
        $this->dispatch('refresh-table');
        $this->dispatch('close-delete-modal');
    }
}
