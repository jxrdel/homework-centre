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
        'Title',
        'StartTime',
        'EndTime',
        'MaxEnrollments',
    ];

    public static function timeslotExists($startTime, $endTime)
    {
        return self::where('StartTime', '<=', $startTime)
                    ->where('EndTime', '>=', $endTime)
                    ->exists();
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'appointments', 'TimeSlotID', 'StudentID')
                    ->withTimestamps();
    }

    // public function timeslot()
    // {
    //     return $this->belongsTo(TimeSlot::class, 'TimeSlotID', 'TimeSlotID');
    // }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'TimeSlotID', 'TimeSlotID');
    }
}
