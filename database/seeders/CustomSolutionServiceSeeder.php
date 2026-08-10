<?php

namespace Database\Seeders;

use App\Models\CustomSolutionOption;
use App\Models\CustomSolutionService;
use Illuminate\Database\Seeder;

class CustomSolutionServiceSeeder extends Seeder
{
    public function run()
    {
        $services = config('customize_solution.services', []);
        $order = 0;

        foreach ($services as $slug => $service) {
            $order++;

            $model = CustomSolutionService::updateOrCreate(
                ['slug' => $slug],
                [
                    'title' => $service['label'],
                    'description' => $service['description'] ?? null,
                    'image' => $service['image'] ?? null,
                    'sort_order' => $order,
                    'has_other_text' => !empty($service['has_text_field']),
                    'status' => '1',
                ]
            );

            foreach (($service['options'] ?? []) as $i => $optionTitle) {
                CustomSolutionOption::updateOrCreate(
                    [
                        'custom_solution_service_id' => $model->id,
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
