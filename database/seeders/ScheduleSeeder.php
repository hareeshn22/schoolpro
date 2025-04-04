<?php
namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $timetables = [
            // Monday
            ['school_id' => 1, 'course_id' => 1, 'period_id' => 1, 'subject_id' => 1, 'day' => 'Monday'],
            ['school_id' => 1, 'course_id' => 1, 'period_id' => 2, 'subject_id' => 2, 'day' => 'Monday'],
            ['school_id' => 1, 'course_id' => 1, 'period_id' => 3, 'subject_id' => 3, 'day' => 'Monday'],
            ['school_id' => 1, 'course_id' => 1, 'period_id' => 4, 'subject_id' => 4, 'day' => 'Monday'],
            ['school_id' => 1, 'course_id' => 1, 'period_id' => 5, 'subject_id' => 5, 'day' => 'Monday'],
            ['school_id' => 1, 'course_id' => 1, 'period_id' => 6, 'subject_id' => 6, 'day' => 'Monday'],
            ['school_id' => 1, 'course_id' => 1, 'period_id' => 7, 'subject_id' => 7, 'day' => 'Monday'],
            // Tuesday
            ['school_id' => 1, 'course_id' => 1, 'period_id' => 1, 'subject_id' => 1, 'day' => 'Tuesday'],
            ['school_id' => 1, 'course_id' => 1, 'period_id' => 2, 'subject_id' => 2, 'day' => 'Tuesday'],
            ['school_id' => 1, 'course_id' => 1, 'period_id' => 3, 'subject_id' => 3, 'day' => 'Tuesday'],
            ['school_id' => 1, 'course_id' => 1, 'period_id' => 4, 'subject_id' => 4, 'day' => 'Tuesday'],
            ['school_id' => 1, 'course_id' => 1, 'period_id' => 5, 'subject_id' => 5, 'day' => 'Tuesday'],
            ['school_id' => 1, 'course_id' => 1, 'period_id' => 6, 'subject_id' => 6, 'day' => 'Tuesday'],
            ['school_id' => 1, 'course_id' => 1, 'period_id' => 7, 'subject_id' => 7, 'day' => 'Tuesday'],
            // Wednesday
            ['school_id' => 1, 'course_id' => 1, 'period_id' => 1, 'subject_id' => 1, 'day' => 'Wednesday'],
            ['school_id' => 1, 'course_id' => 1, 'period_id' => 2, 'subject_id' => 2, 'day' => 'Wednesday'],
            ['school_id' => 1, 'course_id' => 1, 'period_id' => 3, 'subject_id' => 3, 'day' => 'Wednesday'],
            ['school_id' => 1, 'course_id' => 1, 'period_id' => 4, 'subject_id' => 4, 'day' => 'Wednesday'],
            ['school_id' => 1, 'course_id' => 1, 'period_id' => 5, 'subject_id' => 5, 'day' => 'Wednesday'],
            ['school_id' => 1, 'course_id' => 1, 'period_id' => 6, 'subject_id' => 6, 'day' => 'Wednesday'],
            ['school_id' => 1, 'course_id' => 1, 'period_id' => 7, 'subject_id' => 7, 'day' => 'Wednesday'],
            // Thursday
            ['school_id' => 1, 'course_id' => 1, 'period_id' => 1, 'subject_id' => 1, 'day' => 'Thursday'],
            ['school_id' => 1, 'course_id' => 1, 'period_id' => 2, 'subject_id' => 2, 'day' => 'Thursday'],
            ['school_id' => 1, 'course_id' => 1, 'period_id' => 3, 'subject_id' => 3, 'day' => 'Thursday'],
            ['school_id' => 1, 'course_id' => 1, 'period_id' => 4, 'subject_id' => 4, 'day' => 'Thursday'],
            ['school_id' => 1, 'course_id' => 1, 'period_id' => 5, 'subject_id' => 5, 'day' => 'Thursday'],
            ['school_id' => 1, 'course_id' => 1, 'period_id' => 6, 'subject_id' => 6, 'day' => 'Thursday'],
            ['school_id' => 1, 'course_id' => 1, 'period_id' => 7, 'subject_id' => 7, 'day' => 'Thursday'],
            // Friday
            ['school_id' => 1, 'course_id' => 1, 'period_id' => 1, 'subject_id' => 1, 'day' => 'Friday'],
            ['school_id' => 1, 'course_id' => 1, 'period_id' => 2, 'subject_id' => 2, 'day' => 'Friday'],
            ['school_id' => 1, 'course_id' => 1, 'period_id' => 3, 'subject_id' => 3, 'day' => 'Friday'],
            ['school_id' => 1, 'course_id' => 1, 'period_id' => 4, 'subject_id' => 4, 'day' => 'Friday'],
            ['school_id' => 1, 'course_id' => 1, 'period_id' => 5, 'subject_id' => 5, 'day' => 'Friday'],
            ['school_id' => 1, 'course_id' => 1, 'period_id' => 6, 'subject_id' => 6, 'day' => 'Friday'],
            ['school_id' => 1, 'course_id' => 1, 'period_id' => 7, 'subject_id' => 7, 'day' => 'Friday'],
            // Saturday
            ['school_id' => 1, 'course_id' => 1, 'period_id' => 1, 'subject_id' => 1, 'day' => 'Saturday'],
            ['school_id' => 1, 'course_id' => 1, 'period_id' => 2, 'subject_id' => 2, 'day' => 'Saturday'],
            ['school_id' => 1, 'course_id' => 1, 'period_id' => 3, 'subject_id' => 3, 'day' => 'Saturday'],
            ['school_id' => 1, 'course_id' => 1, 'period_id' => 4, 'subject_id' => 4, 'day' => 'Saturday'],
            ['school_id' => 1, 'course_id' => 1, 'period_id' => 5, 'subject_id' => 5, 'day' => 'Saturday'],
            ['school_id' => 1, 'course_id' => 1, 'period_id' => 6, 'subject_id' => 6, 'day' => 'Saturday'],
            ['school_id' => 1, 'course_id' => 1, 'period_id' => 7, 'subject_id' => 7, 'day' => 'Saturday'],
        ];

        // $timetables = [
        //     // Entries for course_id 1
        //     [
        //         'school_id'  => 1,
        //         'course_id'  => 1,
        //         'period_id'  => 1,
        //         'subject_id' => 1,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'school_id'  => 1,
        //         'course_id'  => 1,
        //         'period_id'  => 2,
        //         'subject_id' => 2,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'school_id'  => 1,
        //         'course_id'  => 1,
        //         'period_id'  => 3,
        //         'subject_id' => 3,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'school_id'  => 1,
        //         'course_id'  => 1,
        //         'period_id'  => 4,
        //         'subject_id' => 4,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'school_id'  => 1,
        //         'course_id'  => 1,
        //         'period_id'  => 5,
        //         'subject_id' => 5,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'school_id'  => 1,
        //         'course_id'  => 1,
        //         'period_id'  => 6,
        //         'subject_id' => 6,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     // Entries for course_id 2
        //     [
        //         'school_id'  => 1,
        //         'course_id'  => 2,
        //         'period_id'  => 1,
        //         'subject_id' => 1,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'school_id'  => 1,
        //         'course_id'  => 2,
        //         'period_id'  => 2,
        //         'subject_id' => 2,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'school_id'  => 1,
        //         'course_id'  => 2,
        //         'period_id'  => 3,
        //         'subject_id' => 3,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'school_id'  => 1,
        //         'course_id'  => 2,
        //         'period_id'  => 4,
        //         'subject_id' => 4,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'school_id'  => 1,
        //         'course_id'  => 2,
        //         'period_id'  => 5,
        //         'subject_id' => 5,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'school_id'  => 1,
        //         'course_id'  => 2,
        //         'period_id'  => 6,
        //         'subject_id' => 6,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     // Entries for course_id 3
        //     [
        //         'school_id'  => 1,
        //         'course_id'  => 3,
        //         'period_id'  => 1,
        //         'subject_id' => 1,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'school_id'  => 1,
        //         'course_id'  => 3,
        //         'period_id'  => 2,
        //         'subject_id' => 2,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'school_id'  => 1,
        //         'course_id'  => 3,
        //         'period_id'  => 3,
        //         'subject_id' => 3,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'school_id'  => 1,
        //         'course_id'  => 3,
        //         'period_id'  => 4,
        //         'subject_id' => 4,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'school_id'  => 1,
        //         'course_id'  => 3,
        //         'period_id'  => 5,
        //         'subject_id' => 5,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'school_id'  => 1,
        //         'course_id'  => 3,
        //         'period_id'  => 6,
        //         'subject_id' => 6,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     // Entries for course_id 4
        //     [
        //         'school_id'  => 1,
        //         'course_id'  => 4,
        //         'period_id'  => 1,
        //         'subject_id' => 1,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'school_id'  => 1,
        //         'course_id'  => 4,
        //         'period_id'  => 2,
        //         'subject_id' => 2,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'school_id'  => 1,
        //         'course_id'  => 4,
        //         'period_id'  => 3,
        //         'subject_id' => 3,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'school_id'  => 1,
        //         'course_id'  => 4,
        //         'period_id'  => 4,
        //         'subject_id' => 4,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'school_id'  => 1,
        //         'course_id'  => 4,
        //         'period_id'  => 5,
        //         'subject_id' => 5,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'school_id'  => 1,
        //         'course_id'  => 4,
        //         'period_id'  => 6,
        //         'subject_id' => 6,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     // Entries for course_id 4 with period_id 7 to 9
        //     [
        //         'school_id'  => 1,
        //         'course_id'  => 4,
        //         'period_id'  => 7,
        //         'subject_id' => 1,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'school_id'  => 1,
        //         'course_id'  => 4,
        //         'period_id'  => 8,
        //         'subject_id' => 2,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'school_id'  => 1,
        //         'course_id'  => 4,
        //         'period_id'  => 9,
        //         'subject_id' => 3,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     // Add more entries as needed
        // ];

        // \App\Models\Schedule::insert($timetables);


        // Insert the data into the schedule table
        foreach ($timetables as $key => $time) {
            
            \App\Models\Schedule::create($time);
        }
        
    }
}
