<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = ['Selesai', 'Menunggu Pembayaran', 'Gagal'];

        for ($i = 0; $i < 20; $i++) {
            DB::table('transactions')->insert([
                'username' => 'user' . $i,
                'jumlah_hati' => rand(1, 100),
                'total_harga' => rand(1000, 100000) / 100,
                'status' => $statuses[array_rand($statuses)],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
