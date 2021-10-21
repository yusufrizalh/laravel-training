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

    // membuat foreign key
    public function category()
    {
        // return $this->hasOne(Category::class);
        return $this->belongsTo((Category::class));
    }
}
