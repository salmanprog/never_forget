<?php

namespace Database\Seeders;

use App\Models\GreetingsAppreciationCategory;
use Illuminate\Database\Seeder;

class GreetingsAppreciationCategorySeeder extends Seeder
{
    public function run(): void
    {
        $base = 'assets/website/images/greeting_card';
        $rows = [
            ['title' => 'Thank You Cards', 'image' => $base . '/thankyou.png', 'is_other' => false],
            ['title' => 'Appreciation Cards', 'image' => $base . '/appreciation.jpg', 'is_other' => false],
            ['title' => 'Congratulations Cards', 'image' => $base . '/congratulation.jpg', 'is_other' => false],
            ['title' => 'Sympathy Cards', 'image' => $base . '/sympathy.jpg', 'is_other' => false],
            ['title' => 'Birthday Cards', 'image' => $base . '/happybirthday.png', 'is_other' => false],
            ['title' => 'Anniversary Cards', 'image' => $base . '/anniversary.webp', 'is_other' => false],
            ['title' => 'Get Well Soon Cards', 'image' => $base . '/get-well-soon-card-title.jpg', 'is_other' => false],
            ['title' => 'Other', 'image' => $base . '/get-well-soon-card-title.jpg', 'is_other' => true],
        ];

        foreach ($rows as $row) {
            GreetingsAppreciationCategory::firstOrCreate(
                ['title' => $row['title']],
                ['image' => $row['image'], 'is_other' => $row['is_other']]
            );
        }
    }
}
