<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AddShopOccasionCategories extends Migration
{
    private array $occasions = [
        ['title' => 'Anniversary', 'slug' => 'anniversary'],
        ['title' => 'Birthday', 'slug' => 'birthday'],
        ['title' => 'Thank you', 'slug' => 'thank-you'],
    ];

    public function up()
    {
        foreach ($this->occasions as $occasion) {
            $exists = DB::table('categories')->where('slug', $occasion['slug'])->exists();
            if ($exists) {
                continue;
            }

            DB::table('categories')->insert([
                'created_by' => 1,
                'parent_id' => '0',
                'title' => $occasion['title'],
                'slug' => $occasion['slug'],
                'image' => null,
                'status' => '1',
                'deleted_at' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    public function down()
    {
        DB::table('categories')->whereIn('slug', array_column($this->occasions, 'slug'))->delete();
    }
}
