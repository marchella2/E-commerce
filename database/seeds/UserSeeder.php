<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin1',
            'username' => 'admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('admin123'),
            'level' => 'admin',
        ]);
    }
}
