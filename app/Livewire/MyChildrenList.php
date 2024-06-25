<?php

namespace App\Livewire;

use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class MyChildrenList extends Component
{
    public $children;


    public function render()
    {
        return view('livewire.my-children-list');
    }

    #[On('refresh-list')]
    public function mount()
    {
        $user = Auth::user();
        $this->children = $user->students;
    }
}
