<?php
namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $exams = [
            [
                'school_id' => 1,
                'course_id' => 1,
                'examdate'  => Carbon::now()->addDays(10)->format('Y-m-d'),
                'name'      => 'FA1',
                'maxmarks'  => 25,
            ],
            [
                'school_id' => 1,
                'course_id' => 1,
                'examdate'  => Carbon::now()->addDays(20)->format('Y-m-d'),
                'name'      => 'FA2',
                'maxmarks'  => 25,
            ],
            [
                'school_id' => 1,
                'course_id' => 1,
                'examdate'  => Carbon::now()->addDays(30)->format('Y-m-d'),
                'name'      => 'SA1',
                'maxmarks'  => 100,
            ],
            [
                'school_id' => 1,
                'course_id' => 1,
                'examdate'  => Carbon::now()->addDays(40)->format('Y-m-d'),
                'name'      => 'SA2',
                'maxmarks'  => 100,
            ],
        ];

        foreach ($exams as $exam) {
            \App\Models\Exam::create($exam);
        }
    }
}
