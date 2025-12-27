<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BalloonsCategory;

class balloons extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $balloons = [
            [
                'title' => 'Organic Balloons Garland Grab and Go (6ft min)',
                'images' => 'assets/website/images/balloons/08.png',
            ],
            [
                'title' => 'Circle Arch',
                'images' => 'assets/website/images/balloons/04.png',
            ],
            [
                'title' => 'Organic Balloon Tunnel',
                'images' => 'assets/website/images/balloons/09.png',
            ],
            [
                'title' => 'Marquee Balloon Styling',
                'images' => 'assets/website/images/balloons/01.png',
            ],
            [
                'title' => 'Balloon Arch',
                'images' => 'assets/website/images/balloons/02.png',
            ],
            [
                'title' => 'Organic Balloon Wall',
                'images' => 'assets/website/images/balloons/10.png',
            ],
            [
                'title' => 'Party Focal Point Organic balloon garland with Shimmer wall',
                'images' => 'assets/website/images/balloons/07.png',
            ],
            [
                'title' => 'Square Frame',
                'images' => 'assets/website/images/balloons/06.png',
            ],
            [
                'title' => 'Balloon Columns',
                'images' => 'assets/website/images/balloons/05.png',
            ],
        ];
        foreach ($balloons as $item) {
            BalloonsCategory::firstOrCreate($item);
        }
    }
}
