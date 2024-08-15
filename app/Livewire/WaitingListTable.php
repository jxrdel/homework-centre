<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

class WaitingListTable extends Component
{
    #[Title('Waiting List')] 

    public function render()
    {
        return view('livewire.waiting-list-table');
    }
}
