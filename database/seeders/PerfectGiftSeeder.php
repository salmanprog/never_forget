<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PerfectGiftCategory;

class PerfectGiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Re-run this to update titles/images; extra rows (old balloon data) are removed.
     */
    public function run(): void
    {
        $base = 'assets/website/images/perfect_gifts';

        $categories = [
            [
                'images' => $base . '/01.webp',
                'title' => "Target",
                'description' => "",
                'sort_order' => 1,
            ],
            [
                'images' => $base . '/02.webp',
                'title' => 'Xbox',
                'description' => '',
                'sort_order' => 2,
            ],
            [
                'images' => $base . '/03.webp',
                'title' => 'Starbucks',
                'description' => '',
                'sort_order' => 3,
            ],
            [
                'images' => $base . '/04.webp',
                'title' => "Sephora",
                'description' => "",
                'sort_order' => 4,
            ],
            [
                'images' => $base . '/05.webp',
                'title' => 'Dunkin',
                'description' => '',
                'sort_order' => 5,
            ],
            [
                'images' => $base . '/06.webp',
                'title' => 'ULTA Beauty',
                'description' => '',
                'sort_order' => 6,
            ],
            [
                'images' => $base . '/07.webp',
                'title' => "Uber Eats",
                'description' => "",
                'sort_order' => 7,
            ],
            [
                'images' => $base . '/08.webp',
                'title' => "Home Depot",
                'description' => "",
                'sort_order' => 8,
            ],
            [
                'images' => $base . '/09.webp',
                'title' => "Texas Roadhouse",
                'description' => "",
                'sort_order' => 9,
            ],
        ];

        foreach ($categories as $category) {
            PerfectGiftCategory::updateOrCreate(
                ['images' => $category['images']], // unique key
                $category
            );
        }
    }
}