<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Trainer;
use Hash;

class TrainerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $trainers = [
            // Sports
            ['school_id' => 1, 'first_name' => 'Raj', 'last_name' => 'Verma', 'email' => 'raj.verma@example.com', 'phone' => '9123456789', 'username' => 'rajverma', 'password' => Hash::make('strong456'), 'category' => 'Sports'],

            // Social Arts
            ['school_id' => 1, 'first_name' => 'Meena', 'last_name' => 'Joshi', 'email' => 'meena.joshi@example.com', 'phone' => '9871234567', 'username' => 'meenajoshi', 'password' => Hash::make('trainer123'), 'category' => 'Social Arts'],

            // Daily Needs
            ['school_id' => 1, 'first_name' => 'Amit', 'last_name' => 'Patel', 'email' => 'amit.patel@example.com', 'phone' => '9855667788', 'username' => 'amitpatel', 'password' => Hash::make('trainer123'), 'category' => 'Daily Needs'],

            // Physical Fitness
            ['school_id' => 1, 'first_name' => 'Vikram', 'last_name' => 'Shah', 'email' => 'vikram.shah@example.com', 'phone' => '9899001122', 'username' => 'vikramshah', 'password' => Hash::make('trainer123'), 'category' => 'Physical Fitness'],

        ];

        foreach ($trainers as $trainer) {
            Trainer::create($trainer);
        }


    }
}
