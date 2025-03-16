<?php
namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class LeaveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $userIds = [1, 2, 3];

        foreach ($userIds as $userId) {
            \App\Models\Leave::create([
                'school_id'  => 1,
                'student_id' => $userId,
                'user_type'  => 'student',
                // 'leave_type' => 'Sick Leave',
                // 'start_date' => Carbon::now()->subDays(rand(1, 10)),
                'leavedate'  => Carbon::now(),
                'reason'     => 'Not feeling well',
            ]);
        }
        foreach ($userIds as $userId) {
            \App\Models\Leave::create([
                'school_id'  => 1,
                'teacher_id' => $userId,
                'user_type'  => 'teacher',
                // 'leave_type' => 'Sick Leave',
                // 'start_date' => Carbon::now()->subDays(rand(1, 10)),
                'leavedate'  => Carbon::now(),
                'reason'     => 'Not feeling well',
            ]);
        }

    }
}