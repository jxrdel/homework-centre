<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockTransaction extends Model
{
    use HasFactory;

    protected $table = 'StockTransactions';

    protected $fillable = [
        'TransactionType',
        'Quantity',
        'TransactionDetails',
        'Remainder',
        'StockItemID',
        'created_by'
    ];

    public function stockItem(){
        return $this->belongsTo(StockItem::class, 'StockItemID');
    }
    
}
