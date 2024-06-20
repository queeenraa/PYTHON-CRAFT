<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Pastikan model User diimpor
use Illuminate\Support\Facades\Hash; // Impor Hash untuk mengenkripsi password

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
            'user_id' => '1',
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'role' => 'admin',
        ]);

        User::create([
            'user_id' => '2',
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('admin'),
            'role' => 'admin',
        ]);
        User::factory()->count(3)->create();
    }
}