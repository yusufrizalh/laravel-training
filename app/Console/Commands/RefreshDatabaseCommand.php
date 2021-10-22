<?php

namespace App\Console\Commands;

use App\Category;
use Illuminate\Console\Command;

class RefreshDatabaseCommand extends Command
{
    protected $signature = 'refresh:database';

    protected $description = 'Command untuk menyegarkan seluruh isi database dan seed';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // $this->line('Command ini dijalankan...');
        $this->call('migrate:refresh');

        $categories = collect([
            'PHP', 'Laravel', 'Framework', 'HTML', 'CSS', 'JavaScript'
        ]);
        $categories->each(function ($cat) {
            Category::create([
                'name' => $cat,
                'slug' => \Str::slug($cat),
            ]);
        });

        $this->info('Database dan Seeder sudah diperbaharui...');
    }
}
