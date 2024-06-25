<?php

namespace App\Livewire;

use App\Models\Student;
use Livewire\Component;

class MyChildrenList extends Component
{
    public $children;

    public function render()
    {
        return view('livewire.my-children-list');
    }

    public function mount()
    {
        $this->children = Student::all();
    }
}
