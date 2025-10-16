<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sport;
use Illuminate\Support\Facades\DB;


class SportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $sports = [
            // Sports
            ['name' => 'Athletics', 'category' => 'Sports', 'icon_path' => 'athletics.png'],
            ['name' => 'Badminton', 'category' => 'Sports', 'icon_path' => 'badminton.png'],
            ['name' => 'Base Ball', 'category' => 'Sports', 'icon_path' => 'base ball.png'],
            ['name' => 'Basket Ball', 'category' => 'Sports', 'icon_path' => 'basket ball.png'],
            ['name' => 'Gymnastics', 'category' => 'Sports', 'icon_path' => 'gymnastics.png'],
            ['name' => 'Skating', 'category' => 'Sports', 'icon_path' => 'skating.png'],
            ['name' => 'Swimming', 'category' => 'Sports', 'icon_path' => 'swimming.png'],
            ['name' => 'Table Tennis', 'category' => 'Sports', 'icon_path' => 'table tennis.png'],
            ['name' => 'Tennis', 'category' => 'Sports', 'icon_path' => 'tennis.png'],
            ['name' => 'Volleyball', 'category' => 'Sports', 'icon_path' => 'volleyball.png'],
            ['name' => 'Yoga', 'category' => 'Sports', 'icon_path' => 'gymnastics.png'],
            // ['name' => 'Football', 'category' => 'Sports', 'icon_path' => 'football.png'],

            // Social Arts
            ['name' => 'Dance', 'category' => 'Social Arts', 'icon_path' => 'dance.png'],
            ['name' => 'Drama', 'category' => 'Social Arts', 'icon_path' => 'drama.png'],
            ['name' => 'Music', 'category' => 'Social Arts', 'icon_path' => 'music.png'],
            ['name' => 'Painting', 'category' => 'Social Arts', 'icon_path' => 'painting.png'],
            ['name' => 'Crafting', 'category' => 'Social Arts', 'icon_path' => 'crafting.png'],

            // Daily Needs
            ['name' => 'Cooking', 'category' => 'Daily Needs', 'icon_path' => 'cooking.png'],
            ['name' => 'Cleaning', 'category' => 'Daily Needs', 'icon_path' => 'cleaning.png'],
            ['name' => 'Gardening', 'category' => 'Daily Needs', 'icon_path' => 'gardening.png'],
            ['name' => 'Shopping', 'category' => 'Daily Needs', 'icon_path' => 'shopping.png'],

            // Physical Fitness
            ['name' => 'Yoga', 'category' => 'Physical Fitness', 'icon_path' => 'yoga.png'],
            ['name' => 'Meditation', 'category' => 'Physical Fitness', 'icon_path' => 'meditation.png'],
            ['name' => 'Stretching', 'category' => 'Physical Fitness', 'icon_path' => 'stretching.png'],
            ['name' => 'Aerobics', 'category' => 'Physical Fitness', 'icon_path' => 'aerobics.png'],
            ['name' => 'Weight Training', 'category' => 'Physical Fitness', 'icon_path' => 'weight_training.png'],
        ];

        DB::table('sports')->insert($sports);



        // foreach ($sports as $sport) {
        //     Sport::create($sport);
        // }

    }
}
