<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


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

        // $courses = [
        //     'Pre-Nursery',
        //     'Nursery',
        //     'LKG',
        //     'UKG',
        //     'Class I',
        //     'Class II',
        //     'Class III',
        //     'Class IV',
        //     'Class V',
        //     'Class VI',
        //     'Class VII',
        //     'Class VIII',
        //     'Class IX',
        //     'Class X',
        //     'Class XI',
        //     'Class XII',
        // ];

        // foreach ($courses as $index => $courseName) {
        //     DB::table('courses')->insert([
        //         'name' => $courseName,
        //         // 'slug' => Str::slug($courseName),
        //         // 'level_order' => $index + 1,
        //         // 'created_at' => now(),
        //         // 'updated_at' => now(),
        //     ]);
        // }



    }
}
