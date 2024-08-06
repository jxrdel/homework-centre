<?php

namespace App\Livewire;

use App\Models\StockItem;
use Livewire\Component;

class CreateStockModal extends Component
{
    public $itemname;
    public $quantity;
    public $notes;

    public function render()
    {
        return view('livewire.create-stock-modal');
    }

    public function createStock(){
        // dd($this->itemname);
        StockItem::create([
            'ItemName' => $this->itemname,
            'Quantity' => $this->quantity,
            'Notes' => $this->notes
        ]);

        $this->reset();
        $this->dispatch('close-create-modal');
        $this->dispatch('refresh-table');
        $this->dispatch('show-message', message: 'Stock Item created successfully');
    }
}
