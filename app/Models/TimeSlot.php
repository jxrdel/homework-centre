<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeSlot extends Model
{
    use HasFactory;

    protected $table = 'timeslots';

    protected $primaryKey = 'TimeSlotID';

    protected $fillable = [
        'StartTime',
        'EndTime',
        'MaxEnrollments',
    ];
}
