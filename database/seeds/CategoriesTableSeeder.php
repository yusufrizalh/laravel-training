<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = collect(['PHP', 'Laravel', 'Framework', 'Code', 'CSS', 'JavaScript']);
        $categories->each(function ($cat) {
            Category::create([
                'name' => $cat,
                'slug' => \Str::slug($cat),
            ]);
        });
    }
}
