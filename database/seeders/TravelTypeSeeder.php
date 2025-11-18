<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TravelTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('travel_types')->insert([
            [
                'title' => 'Cruise',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Tour',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'CP Exclusive',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'All-Inclusive',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
