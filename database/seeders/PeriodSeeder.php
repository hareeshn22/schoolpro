<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $periods = [
            [
                'school_id'  => 1,
                'name'       => 'Period 1',
                'start_time' => '08:00:00',
                'end_time'   => '08:45:00',
            ],
            [
                'school_id'  => 1,
                'name'       => 'Period 2',
                'start_time' => '08:45:00',
                'end_time'   => '09:30:00',
            ],
            [
                'school_id'  => 1,
                'name'       => 'Period 3',
                'start_time' => '09:30:00',
                'end_time'   => '10:15:00',
            ],
            [
                'school_id'  => 1,
                'name'       => 'Short Break',
                'start_time' => '10:15:00',
                'end_time'   => '10:30:00',
            ],
            [
                'school_id'  => 1,
                'name'       => 'Period 4',
                'start_time' => '10:30:00',
                'end_time'   => '11:15:00',
            ],
            [
                'school_id'  => 1,
                'name'       => 'Period 5',
                'start_time' => '11:15:00',
                'end_time'   => '12:00:00',
            ],
            [
                'school_id'  => 1,
                'name'       => 'Lunch Break',
                'start_time' => '12:00:00',
                'end_time'   => '12:45:00',
            ],
            [
                'school_id'  => 1,
                'name'       => 'Period 6',
                'start_time' => '12:45:00',
                'end_time'   => '01:30:00',
            ],
            [
                'school_id'  => 1,
                'name'       => 'Period 7',
                'start_time' => '01:30:00',
                'end_time'   => '02:15:00',
            ],
            [
                'school_id'  => 1,
                'name'       => 'Period 8',
                'start_time' => '02:15:00',
                'end_time'   => '03:00:00',
            ],
            [
                'school_id'  => 1,
                'name'       => 'Period 9',
                'start_time' => '03:00:00',
                'end_time'   => '03:45:00',
            ],
        ];

        foreach ($periods as $period) {
            \App\Models\Period::create($period);
        }

        // \App\Models\Period::insert([
        //     [
        //         'name' => 'Telugu',
        //     ],
        //     [
        //         'name' => 'Hindi',
        //     ],
        //     [
        //         'name' => 'English',
        //     ],
        //     [
        //         'name' => 'Mathematics',
        //     ],
        //     [
        //         'name' => 'Science',
        //     ],
        //     [
        //         'name' => 'Social Studies',
        //     ],
        //     [
        //         'name' => 'Arts and Crafts',
        //     ],
        //     [
        //         'name' => 'Computer',
        //     ],
        //     [
        //         'name' => 'Environmental',
        //     ],
        // ]);

    }
}
