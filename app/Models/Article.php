<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model
{
    protected $table = 'articles';
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable  = [
        'slug',
        'title',
        'category_id',
        'user_id',
        'content',
        'published',
        'published_at',
        'feature_image',
    ];


    //Define relationship to tags
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'taglinks');
    }

    //Define relationship to users
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    //Define relationship to categories
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    //set published at to current date if it is not set
    public function getPublishedAtAttribute($value)
    {
        if($value) return $value;
        return Carbon::createFromFormat('Y-m-d H:i:s', now())->format('Y-m-d');
   }



}
