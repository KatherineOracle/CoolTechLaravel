<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $attributes  = [
        'slug',
        'title',
    ];

    //Define relationship to articles
    public function articles() {
        return $this->hasMany('App\Models\Article');
    }

}
