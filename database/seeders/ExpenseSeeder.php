<?php

namespace Database\Seeders;

use App\Models\Expense;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ExpenseSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $categories = ['OfficeUse', 'Ads', 'Maintenance', 'PrintSup', 'PackSup', 'Stocks', 'CustomSup', 'Others'];

        // Loop to create 1000 records
        for ($i = 0; $i < 1000; $i++) {
            $totalExpenses = $faker->randomFloat(2, 10, 1000); // Random expense between 10 and 1000

            // Divide the total expenses into three parts
            $printPhoto = $faker->randomFloat(2, 0, $totalExpenses);
            $uddMerch = $faker->randomFloat(2, 0, $totalExpenses - $printPhoto);
            $customDeals = $totalExpenses - ($printPhoto + $uddMerch);

            Expense::create([
                'category' => $categories[array_rand($categories)], // Randomly select a category
                'product' => $faker->word, // Random product name
                'total_expenses' => $totalExpenses,
                'print_photo' => $printPhoto,
                'udd_merch' => $uddMerch,
                'custom_deals' => $customDeals,
            ]);
        }
    }
}
