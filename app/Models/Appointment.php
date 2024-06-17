<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $primaryKey = 'AppointmentID'; // Primary key column name

    protected $fillable = [
        'AppointmentID',
        'Title',
        'StartDate',
        'EndDate',
        'StudentID',
    ];

    // Define the relationship to the Student model
    public function student()
    {
        return $this->belongsTo(Student::class, 'StudentID');
    }
}
