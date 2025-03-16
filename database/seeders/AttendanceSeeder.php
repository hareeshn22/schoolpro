<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $attendances = [
            [
                'school_id'  => 1,
                'student_id' => 1, // Updated to student_id
                'course_id'  => 1, // Updated to course_id
                'attenddate' => '2025-03-01',
                'timing'     => 'Morning',
                'status'     => true, // Present
            ],
            [
                'school_id'  => 1,
                'student_id' => 1, // Updated to student_id
                'course_id'  => 1, // Updated to course_id
                'attenddate'       => '2025-03-02',
                'timing'     => 'Afternoon',
                'status'     => true, // Present
            ],
            [
                'school_id'  => 1,
                'student_id' => 1, // Updated to student_id
                'course_id'  => 1, // Updated to course_id
                'attenddate'       => '2025-03-03',
                'timing'     => 'Extra',
                'status'     => false, // Absent
            ],
            [
                'school_id'  => 1,
                'student_id' => 1, // Updated to student_id
                'course_id'  => 1, // Updated to course_id
                'attenddate'       => '2025-03-04',
                'timing'     => 'Morning',
                'status'     => true, // Present
            ],
            [
                'school_id'  => 1,
                'student_id' => 1, // Updated to student_id
                'course_id'  => 1, // Updated to course_id
                'attenddate'       => '2025-03-05',
                'timing'     => 'Afternoon',
                'status'     => true,
            ],
        ];

        foreach ($attendances as $key => $attend) {
            \App\Models\Attendance::create($attend);
        }
    }
}
