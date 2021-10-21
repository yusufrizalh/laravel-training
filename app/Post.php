<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Eloquent 
    // public function scopeLatestFirst()
    // {
    //     return $this->latest()->first();
    // }

    protected $fillable = ['title', 'slug', 'body'];
    // protected $guarded = [];
}
