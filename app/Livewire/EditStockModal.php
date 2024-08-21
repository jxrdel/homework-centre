<?php

namespace App\Livewire;

use App\Models\StockItem;
use Livewire\Attributes\On;
use Livewire\Component;

class EditStockModal extends Component
{
    public $item;
    public $itemname;
    public $quantity;
    public $notes;
    public $code;
    public $addition;
    public $removal;
    public $detailsofremoval;

    public function render()
    {
        return view('livewire.edit-stock-modal');
    }

    #[On('show-edit-modal')]
    public function displayModal($id)
    {
        $this->item = StockItem::find($id);
        $this->itemname = $this->item->ItemName;
        $this->quantity = $this->item->Quantity;
        $this->notes = $this->item->Notes;
        $this->code = $this->item->Code;
        $this->addition = $this->item->Addition == 1 ? true : false;
        $this->removal = $this->item->Removal;
        $this->detailsofremoval = $this->item->DetailsOfRemoval;
        $this->dispatch('display-edit-modal');
    }

    public function editStock(){
        StockItem::where('id', $this->item->id)->update([
            'ItemName' => $this->itemname,
            'Quantity' => $this->quantity,
            'Notes' => $this->notes,
            'Code' => $this->code,
            'Addition' => $this->addition,
            'Removal' => $this->removal,
            'DetailsOfRemoval' => $this->detailsofremoval
        ]);

        $this->dispatch('close-edit-modal');
        $this->dispatch('refresh-table');
        $this->dispatch('show-message', message: 'Stock Item edited successfully');
    }
}
