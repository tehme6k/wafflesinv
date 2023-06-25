<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reason;

class ReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Reason::create([
            "reason" => "New labels",
            "action" => 'add',
            "created_by" => 1,
        ]);

        Reason::create([
            "reason" => "Replenished",
            "action" => 'add',
            "created_by" => 1,
        ]);

        Reason::create([
            "reason" => "Sent to production",
            "action" => 'remove',
            "created_by" => 1,
        ]);

        Reason::create([
            "reason" => "Thrown away",
            "action" => 'remove',
            "created_by" => 1,
        ]);
    }
}
