<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Brakes', 'slug' => 'brakes'],
            ['name' => 'Tires', 'slug' => 'tires'],
            ['name' => 'Chains', 'slug' => 'chains'],
            ['name' => 'Gears', 'slug' => 'gears'],
            ['name' => 'Lights', 'slug' => 'lights'],
            ['name' => 'Helmets', 'slug' => 'helmets'],
            ['name' => 'Suspension', 'slug' => 'suspension'],
            ['name' => 'Accessories', 'slug' => 'accessories'],
        ];

        foreach ($categories as $data) {
            Category::firstOrCreate(['slug' => $data['slug']], $data);
        }
    }
}


