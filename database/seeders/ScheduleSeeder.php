<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $timetables = [
            // Entries for course_id 1
            [
                'school_id' => 1,
                'course_id' => 1,
                'period_id' => 1,
                'subject_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'school_id' => 1,
                'course_id' => 1,
                'period_id' => 2,
                'subject_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'school_id' => 1,
                'course_id' => 1,
                'period_id' => 3,
                'subject_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'school_id' => 1,
                'course_id' => 1,
                'period_id' => 4,
                'subject_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'school_id' => 1,
                'course_id' => 1,
                'period_id' => 5,
                'subject_id' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'school_id' => 1,
                'course_id' => 1,
                'period_id' => 6,
                'subject_id' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Entries for course_id 2
            [
                'school_id' => 1,
                'course_id' => 2,
                'period_id' => 1,
                'subject_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'school_id' => 1,
                'course_id' => 2,
                'period_id' => 2,
                'subject_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'school_id' => 1,
                'course_id' => 2,
                'period_id' => 3,
                'subject_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'school_id' => 1,
                'course_id' => 2,
                'period_id' => 4,
                'subject_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'school_id' => 1,
                'course_id' => 2,
                'period_id' => 5,
                'subject_id' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'school_id' => 1,
                'course_id' => 2,
                'period_id' => 6,
                'subject_id' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Entries for course_id 3
            [
                'school_id' => 1,
                'course_id' => 3,
                'period_id' => 1,
                'subject_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'school_id' => 1,
                'course_id' => 3,
                'period_id' => 2,
                'subject_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'school_id' => 1,
                'course_id' => 3,
                'period_id' => 3,
                'subject_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'school_id' => 1,
                'course_id' => 3,
                'period_id' => 4,
                'subject_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'school_id' => 1,
                'course_id' => 3,
                'period_id' => 5,
                'subject_id' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'school_id' => 1,
                'course_id' => 3,
                'period_id' => 6,
                'subject_id' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Entries for course_id 4
            [
                'school_id' => 1,
                'course_id' => 4,
                'period_id' => 1,
                'subject_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'school_id' => 1,
                'course_id' => 4,
                'period_id' => 2,
                'subject_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'school_id' => 1,
                'course_id' => 4,
                'period_id' => 3,
                'subject_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'school_id' => 1,
                'course_id' => 4,
                'period_id' => 4,
                'subject_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'school_id' => 1,
                'course_id' => 4,
                'period_id' => 5,
                'subject_id' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'school_id' => 1,
                'course_id' => 4,
                'period_id' => 6,
                'subject_id' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Entries for course_id 4 with period_id 7 to 9
            [
                'school_id' => 1,
                'course_id' => 4,
                'period_id' => 7,
                'subject_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'school_id' => 1,
                'course_id' => 4,
                'period_id' => 8,
                'subject_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'school_id' => 1,
                'course_id' => 4,
                'period_id' => 9,
                'subject_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Add more entries as needed
        ];

        \App\Models\Schedule::insert($timetables);
    }
}
