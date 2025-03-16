<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
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
            ['name' => 'Class 7B', 'school_id' => 1],
            ['name' => 'Class 8A', 'school_id' => 1],
            ['name' => 'Class 8B', 'school_id' => 1],
            ['name' => 'Class 9A', 'school_id' => 1],
            ['name' => 'Class 9B', 'school_id' => 1],
            ['name' => 'Class 10A', 'school_id' => 1],
            ['name' => 'Class 6A', 'school_id' => 2],
            ['name' => 'Class 6B', 'school_id' => 2],
            ['name' => 'Class 7A', 'school_id' => 2],
            ['name' => 'Class 7B', 'school_id' => 2],
            ['name' => 'Class 8A', 'school_id' => 2],
            ['name' => 'Class 8B', 'school_id' => 2],
            ['name' => 'Class 9A', 'school_id' => 2],
            ['name' => 'Class 9B', 'school_id' => 2],
            ['name' => 'Class 10A', 'school_id' => 2],
        ];
        foreach ($classes as $value) {
            \App\Models\Course::create($value);

        }
       

    }
}
