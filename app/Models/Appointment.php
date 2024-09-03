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
        'Attendance'
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

    public static function isClassFull($TimeSlotID)
    {
        // Get the timeslot for this appointment
        $timeslot = TimeSlot::find($TimeSlotID);

        // Count the number of appointments for this timeslot
        $currentEnrollments = Appointment::where('TimeSlotID', $TimeSlotID)->count();

        // Compare with MaxEnrollments
        return $currentEnrollments >= $timeslot->MaxEnrollments;
    }
}
