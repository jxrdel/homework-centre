<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'Parents';

    protected $primaryKey = 'ParentID';

    protected $fillable = [
        'ParentID',
        'FirstName',
        'LastName',
        'Email',
        'PrimaryContact',
        'SecondaryContact',
    ];
}
