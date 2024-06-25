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
        'FirstName',
        'LastName',
        'Username',
        'Email',
        'CellNo',
        'HomeNo',
        'IsParent',
        'IsAdmin',
    ];

    public static function usernameExists($username)
    {
        return self::where('Username', $username)->exists();
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'UserStudent', 'UserID', 'StudentID');
    }
}
