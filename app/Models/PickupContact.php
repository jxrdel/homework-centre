<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PickupContact extends Model
{
    use HasFactory;

    protected $table = 'pickup_contacts';

    protected $primaryKey = 'PickupContactID';

    protected $fillable = [
        'FirstName',
        'LastName',
        'Email',
        'MobileNo',
        'HomeNo',
        'WorkNo',
        'Address', 
        'PicturePath'
    ];
    

    public function users()
    {
        return $this->belongsToMany(User::class, 'UserPickupcontact', 'PickupContactID', 'UserID');
    }
}
