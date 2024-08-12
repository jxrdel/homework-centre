<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaitingList extends Model
{
    use HasFactory;

    protected $table = 'WaitingList';

    protected $fillable = [
        'TimeSlotID',
        'StudentID',
        'IsAccepted',
    ];

    
    
    public static function isDuplicate($studentid, $timeslotid)
    {
        return self::where('StudentID', '=', $studentid)
                    ->where('TimeSlotID', '=', $timeslotid)
                    ->exists();
    }
}
