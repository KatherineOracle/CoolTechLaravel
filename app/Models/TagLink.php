<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class TagLink extends Model
{
    protected $table = 'taglinks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $attributes  = [
        'article_id',
        'tag_id',
    ];



}
