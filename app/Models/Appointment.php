<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $primaryKey = 'AppointmentID'; // Primary key column name

    protected $fillable = [
        'StudentID',
        'TimeSlotID',
    ];

    // Define the relationship to the Student model
    public function student()
    {
        return $this->belongsTo(Student::class, 'StudentID', 'StudentID');
    }

    public function timeslot()
    {
        return $this->belongsTo(TimeSlot::class, 'TimeSlotID', 'TimeSlotID');
    }
    
    public static function isDuplicate($studentid, $timeslotid)
    {
        return self::where('StudentID', '=', $studentid)
                    ->where('TimeSlotID', '=', $timeslotid)
                    ->exists();
    }
}
