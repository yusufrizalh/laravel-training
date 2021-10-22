<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /*
        # Eloquent
          - nama function pada model yang bersifat Many harus plural dan menggunakan hasMany()
          - nama function pada model yang bersifat One harus singular dan menggunakan hasOne()
        
        # Asumsi
          - dalam 1 post minimal ada 1 category
          - dalam 1 category bisa ada banyak post

        # One -> Category
        # Many -> Post
    */

    protected $fillable = ['name', 'slug'];

    // membuat foreign key
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
