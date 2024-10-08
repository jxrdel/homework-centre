<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergencyContact extends Model
{
    use HasFactory;

    protected $table = 'emergency_contacts';

    protected $primaryKey = 'EmergencyContactID';
    
    protected $fillable = [
        'FirstName',
        'LastName',
        'Email',
        'MobileNo',
        'HomeNo',
        'WorkNo',
        'ChildRelationship', 
        'PicturePath'
    ];
    
}
