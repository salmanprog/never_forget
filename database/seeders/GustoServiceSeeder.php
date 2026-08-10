<?php

namespace Database\Seeders;

use App\Models\GustoOption;
use App\Models\GustoService;
use Illuminate\Database\Seeder;

class GustoServiceSeeder extends Seeder
{
    public function run()
    {
        $services = config('gusto.services', []);
        $order = 0;

        foreach ($services as $slug => $service) {
            $order++;

            $model = GustoService::updateOrCreate(
                ['slug' => $slug],
                [
                    'title' => $service['label'],
                    'description' => $service['description'] ?? null,
                    'sort_order' => $order,
                    'status' => '1',
                ]
            );

            foreach (($service['options'] ?? []) as $i => $optionTitle) {
                GustoOption::updateOrCreate(
                    [
                        'gusto_service_id' => $model->id,
                        'title' => $optionTitle,
                    ],
                    [
                        'sort_order' => $i + 1,
                        'status' => '1',
                    ]
                );
            }
        }
    }
}
