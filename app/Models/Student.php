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
        'DOB',
    ];

    // Define the relationship to the Appointment model
    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'StudentID');
    }
}
