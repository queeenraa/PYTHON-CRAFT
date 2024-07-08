<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed pertama
        DB::table('progress')->insert([
            'user_id' => 1,
            'courses_id' => 1,
            'quiz_id' => NULL,
            'status' => 'completed',
        ]);

        // Seed kedua
        DB::table('progress')->insert([
            'user_id' => 1,
            'courses_id' => NULL,
            'quiz_id' => 1,
            'status' => 'completed',
        ]);

        // Tambahkan seed lainnya sesuai kebutuhan
    }
}
