<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class UserRole extends Model
{
    protected $table = 'user_roles';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable  = [
        'title',
        'permission_level',
    ];

    //Define relationship to user
    public function user()
    {
        return $this->hasMany(User::class);
    }

}
