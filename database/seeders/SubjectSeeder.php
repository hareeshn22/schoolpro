<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = [
            [
                'name'      => 'Telugu',
                'school_id' => 1,
            ],
            [
                'name'      => 'Telugu',
                'school_id' => 2,
            ],
            [
                'name'      => 'Hindi',
                'school_id' => 1,
            ],
            [
                'name'      => 'Hindi',
                'school_id' => 2,
            ],
            [
                'name'      => 'English',
                'school_id' => 1,
            ],
            [
                'name'      => 'English',
                'school_id' => 2,
            ],
            [
                'name'      => 'Mathematics',
                'school_id' => 1,
            ],
            [
                'name'      => 'Mathematics',
                'school_id' => 2,
            ],
            [
                'name'      => 'Science',
                'school_id' => 1,
            ],
            [
                'name'      => 'Science',
                'school_id' => 2,
            ],
            [
                'name'      => 'Social Studies',
                'school_id' => 1,
            ],
            [
                'name'      => 'Social Studies',
                'school_id' => 2,
            ],
            [
                'name'      => 'Arts and Crafts',
                'school_id' => 1,
            ],
            [
                'name'      => 'Arts and Crafts',
                'school_id' => 2,
            ],
            [
                'name'      => 'Computer',
                'school_id' => 1,
            ],
            [
                'name'      => 'Computer',
                'school_id' => 2,
            ],
            [
                'name'      => 'Environmental',
                'school_id' => 1,
            ],
            [
                'name'      => 'Environmental',
                'school_id' => 2,
            ],
        ];

        foreach ($subjects as $key => $value) {
            \App\Models\Subject::create($value);
        }

       

    }
}
