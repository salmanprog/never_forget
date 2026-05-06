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
                'title' => "Teremana's Valentine's Day Campaign",
                'description' => "Teremana's Valentine's Day campaign through eCardWidget successfully combined special occasion greetings with effective branding, enhancing customer interaction.",
                'sort_order' => 1,
            ],
            [
                'images' => $base . '/02.webp',
                'title' => 'Employee Recognition eCards',
                'description' => 'Modivcare utilized eCardWidget for employee recognition, enhancing their internal appreciation program and boosting team morale.',
                'sort_order' => 2,
            ],
            [
                'images' => $base . '/03.webp',
                'title' => 'Hospital Patient and Staff Recognition eCards',
                'description' => 'Ottawa Hospital expressed gratitude to patients and staff using personalized eCards, enhancing hospital community spirit.',
                'sort_order' => 3,
            ],
            [
                'images' => $base . '/04.png',
                'title' => "Father's Day Sweepstakes",
                'description' => "Worx Power Tools leveraged eCardWidget for a Father's Day sweepstakes campaign, enhancing customer engagement and brand visibility.",
                'sort_order' => 4,
            ],
            [
                'images' => $base . '/05.jpeg',
                'title' => 'Honor Veterinarians with Tribute eCards',
                'description' => 'Open Door Veterinary Collective funded pet emergency care by offering tribute eCards, notifying honorees of contributions.',
                'sort_order' => 5,
            ],
            [
                'images' => $base . '/06.png',
                'title' => 'Spread Joy with E-Cards',
                'description' => 'The Food Bank of Waterloo Region utilized eCardWidget to allow supporters to send personalized e-cards, spreading awareness and appreciation for their cause. Perfect for birthdays, holidays, and special occasions.',
                'sort_order' => 6,
            ],
            [
                'images' => $base . '/07.jpg',
                'title' => "Virtual Mother's Day Appreciation",
                'description' => "Thomas Beach Vacations used eCardWidget to send virtual Mother's Day e-postcards, allowing customers to personalize messages and show appreciation to their mothers. This helped strengthen customer relationships and promote brand loyalty.",
                'sort_order' => 7,
            ],
            [
                'images' => $base . '/08.png',
                'title' => "Meeting for Minds Australia eCards",
                'description' => "Meeting for Minds Australia uses eCardWidget to help supporters send mental health awareness e-cards.",
                'sort_order' => 8,
            ],
            [
                'images' => $base . '/09.png',
                'title' => "Girl Guiding Scotland eCards",
                'description' => "Girl Guiding Scotland uses eCardWidget to let supporters send appreciation e-cards to volunteers across Scotland, celebrating their dedication to empowering girls.",
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