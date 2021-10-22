<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Jennifer',
            'username' => 'jennifer',
            'password' => bcrypt('Test2021'),
            'email' => 'jennifer@email.com',
        ]);
    }
}
