<?php

namespace App\Livewire;

use App\Models\StockItem;
use Livewire\Component;

class CreateStockModal extends Component
{
    public $itemname;
    public $quantity;
    public $notes;
    public $code;
    public $addition = true;
    public $removal;
    public $detailsofremoval;

    public function render()
    {
        return view('livewire.create-stock-modal');
    }

    public function createStock(){
        // dd($this->itemname);
        $newitem = StockItem::create([
            'ItemName' => $this->itemname,
            'Quantity' => $this->quantity,
            'Notes' => $this->notes,
            'Code' => $this->code,
            'Addition' => $this->addition,
        ]);

        $newitem->transactions()->create([
            'TransactionType' => 'Addition',
            'Quantity' => $this->quantity,
            'TransactionDetails' =>  'Initial Stock',
            'Remainder' => $this->quantity,
            'created_by' => auth()->user()->Username
        ]);

        $this->reset();
        $this->dispatch('close-create-modal');
        $this->dispatch('refresh-table');
        $this->dispatch('show-message', message: 'Stock Item created successfully');
    }
}
