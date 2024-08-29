<?php

namespace App\Livewire;

use App\Models\StockItem;
use Livewire\Attributes\Title;
use Livewire\Component;

class EditStockItem extends Component
{
    public $item;
    public $itemname;
    public $quantity;
    public $notes;
    public $code;
    public $addition;
    public $removal;
    public $detailsofremoval;

    public $transactions;
    public $transactiontype;
    public $transactionquantity;
    public $transactiondetails;
    public $remainder;

    public $isEditing = false;

    #[Title('View Stock Item')] 

    public function render()
    {
        return view('livewire.edit-stock-item');
    }

    public function mount($id){
        $this->item = StockItem::find($id);
        $this->itemname = $this->item->ItemName;
        $this->quantity = $this->item->Quantity;
        $this->notes = $this->item->Notes;
        $this->code = $this->item->Code;
        $this->addition = $this->item->Addition == 1 ? true : false;
        $this->removal = $this->item->Removal;
        $this->detailsofremoval = $this->item->DetailsOfRemoval;

        $this->transactions = $this->item->transactions;
    }

    public function save(){

        $this->item->update([
            'ItemName' => $this->itemname,
            'Quantity' => $this->quantity,
            'Notes' => $this->notes,
            'Code' => $this->code,
        ]);

        $this->isEditing = false;
        $this->dispatch('show-message', message: 'Stock item updated successfully');
    }

    public function createTransaction(){
        $this->validate([
            'transactiontype' => 'required',
            'transactionquantity' => 'required|numeric',
        ]);

        if($this->transactiontype == 'Removal' && $this->item->Quantity < $this->transactionquantity){
            $this->addError('transactionquantity', 'Quantity cannot be more than the available stock');
            return;
        }

        if($this->transactiontype == 'Removal'){
            $this->remainder = $this->item->Quantity - $this->transactionquantity;
        }else{
            $this->remainder = $this->item->Quantity + $this->transactionquantity;
        }

        $this->item->transactions()->create([
            'TransactionType' => $this->transactiontype,
            'Quantity' => $this->transactionquantity,
            'TransactionDetails' => $this->transactiondetails,
            'Remainder' => $this->remainder,
            'created_by' => auth()->user()->Username
        ]);

        $this->item->Quantity = $this->remainder;
        $this->item->save();
        $this->dispatch('show-message', message: 'Transaction created successfully');
        $this->dispatch('close-modal');
        $this->reset(['transactiontype', 'transactionquantity', 'transactiondetails', 'remainder']);

        $this->transactions = $this->item->transactions;

        $this->quantity = $this->item->Quantity;
    }
}
