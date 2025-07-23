<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SlideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $classes = [
            ['name' => 'Class 6A', 'school_id' => 1],
            ['name' => 'Class 6B', 'school_id' => 1],
            ['name' => 'Class 7A', 'school_id' => 1],
            
        ];
        foreach ($classes as $value) {
            \App\Models\Course::create($value);

        }
    }
}
