<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BusinessCardOption;

class BusinessCardOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Paper Stock Options
        $paperStocks = [
            [
                'option_type' => 'paper_stock',
                'option_key' => 'matte',
                'name' => 'Matte Finish',
                'description' => 'Professional matte finish perfect for business cards',
                'price_modifier' => 0.00,
                'sort_order' => 1
            ],
            [
                'option_type' => 'paper_stock',
                'option_key' => 'glossy',
                'name' => 'Glossy Finish',
                'description' => 'High-gloss finish for vibrant colors and sharp images',
                'price_modifier' => 0.05,
                'sort_order' => 2
            ],
            [
                'option_type' => 'paper_stock',
                'option_key' => 'premium',
                'name' => 'Premium Cardstock',
                'description' => 'Premium 350gsm cardstock for luxury feel',
                'price_modifier' => 0.15,
                'sort_order' => 3
            ],
            [
                'option_type' => 'paper_stock',
                'option_key' => 'kraft',
                'name' => 'Kraft Paper',
                'description' => 'Eco-friendly kraft paper with natural texture',
                'price_modifier' => 0.10,
                'sort_order' => 4
            ],
            [
                'option_type' => 'paper_stock',
                'option_key' => 'linen',
                'name' => 'Linen Finish',
                'description' => 'Textured linen finish for a classic look',
                'price_modifier' => 0.08,
                'sort_order' => 5
            ]
        ];

        // Corner Style Options
        $cornerStyles = [
            [
                'option_type' => 'corner_style',
                'option_key' => 'standard',
                'name' => 'Standard (Square)',
                'description' => 'Traditional square corners',
                'price_modifier' => 0.00,
                'sort_order' => 1
            ],
            [
                'option_type' => 'corner_style',
                'option_key' => 'rounded',
                'name' => 'Rounded Corners',
                'description' => 'Modern rounded corners',
                'price_modifier' => 0.02,
                'sort_order' => 2
            ]
        ];

        // Create all options
        foreach (array_merge($paperStocks, $cornerStyles) as $option) {
            BusinessCardOption::create($option);
        }
    }
}