<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
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
    ];

    public static function generateUniqueUsername($firstname, $lastname)
    {
        $username = strtolower(trim($firstname) . '.' . trim($lastname));
        $baseUsername = $username;
        $counter = 1;

        // Check if the username already exists
        while (self::where('Username', $username)->exists()) {
            // Append the counter to the base username
            $username = $baseUsername . $counter;
            $counter++;
        }

        return $username;
    }

    public static function usernameExists($username)
    {
        return self::where('Username', $username)->exists();
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'UserStudent', 'UserID', 'StudentID');
    }

    public function pickupcontacts()
    {
        return $this->belongsToMany(PickupContact::class, 'UserPickupcontact', 'UserID', 'PickupContactID');
    }
    
    public function emergencyContact(): HasOne
    {
        return $this->hasOne(EmergencyContact::class, 'EmergencyContactID', 'EmergencyContactID');
    }

    public function feedbackforms()
    {
        return $this->hasMany(Feedback::class, 'ParentID', 'id');
    }
}
