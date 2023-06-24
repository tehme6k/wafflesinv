<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Product::truncate();

        $csvFile = fopen(base_path("database/data/products.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Product::create([
                    "bottle_id" => $data['0'],
                    "part_number" => $data['1'],
                    "name" => $data['2'],
                    "flavor" => $data['3'],
                    "location" => $data['4'],
                    "created_by" => 1,
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }

}
