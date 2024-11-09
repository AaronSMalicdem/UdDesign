<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SalesSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Array of categories and products
        $categories = [
            'Merch' => ['Tote Bag', 'Mug', 'Umbrella', 'Book', 'Hoodie', 'Jacket', 'Tshirt'],
            'Print' => ['Print', 'Photocopy'],
            'Deals' => ['Projects', 'Custom Merch']
        ];

        for ($i = 0; $i < 1000; $i++) {
            $category = $faker->randomElement(array_keys($categories));
            $product = $faker->randomElement($categories[$category]);

            // Generate random cash and gcash values ensuring one is not zero
            $cash = $faker->optional()->randomFloat(2, 0, 500);
            $gcash = $faker->optional($cash ? 0 : 0.5)->randomFloat(2, 0, 500);

            // Ensure that at least one value is non-zero
            if (!$cash && !$gcash) {
                $cash = $faker->randomFloat(2, 1, 500);
            }

            $total_sales = $cash + $gcash;

            // Insert record into sales table
            DB::table('sales')->insert([
                'category' => $category,
                'product' => $product,
                'gcash' => $gcash,
                'cash' => $cash,
                'total_sales' => $total_sales,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
