<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Tag extends Model
{
    protected $table = 'tags';
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
    public function articles()
    {
        return $this->belongsToMany(Article::class, 'taglinks');
    }



}
