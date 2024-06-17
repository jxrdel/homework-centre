<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    use HasFactory;


    public $timestamps = false;

    protected $table = 'Bookings';

    protected $primaryKey = 'BookingID';

    protected $fillable = [
        'BookingID',
        'Title',
        'StartDate',
        'EndDate',
        'ParentID',
    ];
}
