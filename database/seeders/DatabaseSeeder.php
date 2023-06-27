<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Factory::create();
        for ($i = 1; $i <= 15; $i++) {
            DB::table('products')->insert([
                'name' => 'Product '.$i,
                'description' => $faker->sentence,
                'price' => $faker->randomFloat(2, 10, 100),
                'img' => "images/products/product_".$i.".jpg",
                'category' => $faker->randomElement(['Electronics', 'Clothing', 'Home', 'Sports']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
