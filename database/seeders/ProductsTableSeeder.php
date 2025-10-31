<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    public function run(): void
    {
        // Use local images so they always load (placed under public/images/products)
        $catalog = [
            ['name' => 'Disc Brake Kit', 'slug' => 'disc-brake-kit', 'price' => 89.99, 'stock' => 25, 'category' => 'brakes', 'img' => 'images/products/disc-brake-kit.jpg'],
            ['name' => 'All-Terrain Tire', 'slug' => 'all-terrain-tire', 'price' => 59.50, 'stock' => 40, 'category' => 'tires', 'img' => 'images/products/all-terrain-tire.jpg'],
            ['name' => 'Performance Chain', 'slug' => 'performance-chain', 'price' => 29.99, 'stock' => 75, 'category' => 'chains', 'img' => 'images/products/performance-chain.jpg'],
            ['name' => 'Rear Derailleur', 'slug' => 'rear-derailleur', 'price' => 74.00, 'stock' => 18, 'category' => 'gears', 'img' => 'images/products/rear-derailleur.jpg'],
            ['name' => 'LED Headlight', 'slug' => 'led-headlight', 'price' => 22.49, 'stock' => 50, 'category' => 'lights', 'img' => 'images/products/led-headlight.jpg'],
            ['name' => 'Safety Helmet', 'slug' => 'safety-helmet', 'price' => 49.99, 'stock' => 33, 'category' => 'helmets', 'img' => 'images/products/safety-helmet.jpg'],
            ['name' => 'Front Suspension Fork', 'slug' => 'front-suspension-fork', 'price' => 149.99, 'stock' => 10, 'category' => 'suspension', 'img' => 'images/products/front-suspension-fork.jpg'],
            ['name' => 'Grip Set', 'slug' => 'grip-set', 'price' => 12.99, 'stock' => 120, 'category' => 'accessories', 'img' => 'images/products/grip-set.jpg'],
            ['name' => 'Brake Pads', 'slug' => 'brake-pads', 'price' => 9.99, 'stock' => 200, 'category' => 'brakes', 'img' => 'images/products/brake-pads.jpg'],
            ['name' => 'Road Tire', 'slug' => 'road-tire', 'price' => 39.99, 'stock' => 60, 'category' => 'tires', 'img' => 'images/products/road-tire.jpg'],
            ['name' => 'Chain Lube', 'slug' => 'chain-lube', 'price' => 7.99, 'stock' => 150, 'category' => 'chains', 'img' => 'images/products/chain-lube.jpg'],
            ['name' => 'Gear Shifter', 'slug' => 'gear-shifter', 'price' => 54.95, 'stock' => 22, 'category' => 'gears', 'img' => 'images/products/gear-shifter.jpg'],
        ];

        foreach ($catalog as $item) {
            $category = Category::firstWhere('slug', $item['category']);
            if (!$category) {
                continue;
            }
            Product::updateOrCreate(
                ['slug' => $item['slug']],
                [
                    'category_id' => $category->id,
                    'name' => $item['name'],
                    'slug' => $item['slug'],
                    'image_url' => $item['img'],
                    'description' => 'High-quality bike spare part designed for durability and performance.',
                    'price' => $item['price'],
                    'stock' => $item['stock'],
                ]
            );
        }
    }
}


