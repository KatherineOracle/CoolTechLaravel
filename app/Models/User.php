<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id'
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Define relationship to articles
    public function articles()
    {
        return $this->hasMany(Article::class);
    }


    //define relationship to user_role model
    public function role()
    {
        return $this->belongsTo(UserRole::class, 'role_id');
    }

    /**
     * Hash password before it is saved to database
     * @param string $value
     */
    public function setPasswordAttribute($value) {
        if($value){
        $this->attributes['password'] = Hash::make($value);
        }
    }

    /**
     * @param string $role
     * @return bool does user have required permissions or not
     */
    public function hasRole(string $role): bool
    {
        return $this->role->permission_level >= $role;
    }

}
