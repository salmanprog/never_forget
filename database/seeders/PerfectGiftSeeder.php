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
    public function run()
    {
        $items = [
            ['title' => 'Perfect Gifts Template', 'images' => 'assets/website/images/perfect-gifts/01.png'],
        ];
        foreach ($items as $index => $item) {
            $id = $index + 1;
            PerfectGiftCategory::updateOrCreate(['id' => $id], $item);
        }

        // Remove any extra rows (e.g. old balloon-style data) so only seeder items show
        PerfectGiftCategory::where('id', '>', count($items))->delete();
    }
}