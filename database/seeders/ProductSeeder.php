<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        for ($i = 0; $i < 15; $i++) {
            DB::table('products')->insert([
                'name' => $faker->name,
                'description' => $faker->sentence,
                'price' => $faker->randomFloat(2, 10, 100),
                'img' => $faker->imageUrl(),
                'category' => $faker->randomElement(['Electronics', 'Clothing', 'Home', 'Sports']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
