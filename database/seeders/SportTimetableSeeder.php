<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;



class SportTimetableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday'];
        $startTimes = ['03:30:00', '04:00:00', '04:30:00'];
        $endTimes = ['04:00:00', '04:30:00', '05:00:00'];


        for ($sportId = 1; $sportId <= 3; $sportId++) {
            foreach ($days as $day) {
                DB::table('sport_timetables')->insert([
                    'school_id' => 1,
                    'sport_id' => $sportId,
                    'day_of_week' => $day,
                    'start_time' => $startTimes[array_rand($startTimes)],
                    'end_time' => $endTimes[array_rand($endTimes)],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }

    }
}
