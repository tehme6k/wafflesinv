<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bottle;

class BottleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path("database/data/bottles.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Bottle::create([
                    "bottle_size" => $data['0'],
                    "label_cost" => $data['1'],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
