<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $primaryKey = 'StudentID'; // Primary key column name

    protected $fillable = [
        'FirstName',
        'LastName',
        'OtherNames',
        'Sex',
        'DOB',
        'SchoolName',
        'Address',
        'PicturePath',
        'DoctorName',
        'DoctorPhone',
        'DoctorAddress',
        'DoctorCity',
        'Allergies',
        'MedicalProblems',
        'Disabilities',
        'BloodType',
        'AdditionalInfo',
        'ImmunizationPath'
    ];

    // Define the relationship to the Appointment model
    public function timeslots()
    {
        return $this->belongsToMany(TimeSlot::class, 'appointments', 'StudentID', 'TimeSlotID')
                    ->withTimestamps();
    }

    public function parents()
    {
        return $this->belongsToMany(User::class, 'UserStudent', 'StudentID', 'UserID');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'StudentID', 'StudentID');
    }


}
