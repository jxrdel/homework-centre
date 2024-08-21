<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
<<<<<<< Updated upstream
        'name',
        'email',
        'password',
=======
        'FirstName',
        'LastName',
        'Username',
        'Email',
        'MobileNo',
        'HomeNo',
        'WorkNo',
        'Ministry',
        'Department',
        'ChildRelationship',
        'PicturePath',
        'JobLetterPath',
        'Address',
        'CityTown',
        'MediaReleaseConsent',
        'EmergencyConsent',
        'IsParent',
        'IsAdmin',
        'HasWindowsLogin',
        'RegisteredBy',
        'IsSuperAdmin',
        'EmergencyContactID'
>>>>>>> Stashed changes
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
